<?php
class Base_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //kill any references to the following methods
        $mthd = $this->router->method;
        if ($mthd == 'view' || $mthd == 'partial' || $mthd == 'set_template') {
            show_404();
        }
        //load base libraries, helpers and models
        $this->load->database();
        $site_settings = $this->db->select('setting_key,setting')->where('code','website')->where('status',1)->get('settings')->result();
        foreach ($site_settings as $set) {
            $this->config->set_item($set->setting_key, $set->setting);
        }
        $this->load->library(array('session','auth'));
        $this->load->helper(array('language','date','formatting_helper','inflector'));
        $this->load->model(array('Common_model','Email_model'));
        $this->config->set_item('admin_folder','admin');
//        print_a(config_item('site_logo'),true);

       /* Encryption*/
//        $this->load->library('encryption');
//        $key = bin2hex($this->encryption->create_key(16));
//        echo $key;
//        echo '<br>';
//        echo hex2bin($key); exit;
        /*End*/
    }
}

class Front_Controller extends Base_Controller
{
    private $template;
    function __construct()
    {
        parent::__construct();
        //load the theme package
        $this->load->add_package_path(APPPATH.'themes/'.config_item('theme').'/');
        $this->load->model(array('Page_model'));
        $this->pages = $this->Page_model->get_pages_tiered(1,'menu');
//        print_a($this->pages,true);
//        $this->lang->load('common');

    }

    function view($view, $vars = array(), $string = false)
    {
        //if there is a template, use it.
        $template = '';
        if ($this->template) {
            $template = $this->template . '_';
        }

        if ($string) {
            $result = $this->load->view('common/' . $template . 'header', $vars, true);
            $result .= $this->load->view($view, $vars, true);
            $result .= $this->load->view('common/' . $template . 'footer', $vars, true);

            return $result;
        } else {
            $this->load->view('common/' . $template . 'header', $vars);
            $this->load->view($view, $vars);
            $this->load->view('common/' . $template . 'footer', $vars);
        }
        //reset $this->template to blank
        $this->template = false;
    }

    /* Template is a temporary prefix that lasts only for the next call to view */
    function set_template($template)
    {
        $this->template = $template;
    }

    function partial($view, $vars = array(), $string=false)
    {
        if($string)
        {
            return $this->load->view($view, $vars, true);
        }
        else
        {
            $this->load->view($view, $vars);
        }
    }
}

class Admin_Controller extends Base_Controller
{
    private $template;
    function __construct()
    {
        parent::__construct();
        $this->auth->is_logged_in(uri_string());
        $this->lang->load('common');
        $this->admin = $this->session->userdata('admin');
        if($this->uri->segment(1)!=config_item('admin_folder')){
            redirect(config_item('admin_folder'));
        }
    }

    function view($view, $vars = array(), $string = false)
    {
        //if there is a template, use it.
        $template = '';
        if ($this->template) {
            $template = $this->template . '_';
        }

        if ($string) {
            $result = $this->load->view(config_item('admin_folder') . '/common/' . $template . 'header', $vars, true);
            $result .= $this->load->view($view, $vars, true);
            $result .= $this->load->view(config_item('admin_folder') . '/common/' . $template . 'footer', $vars, true);

            return $result;
        } else {
            $this->load->view(config_item('admin_folder') . '/common/' . $template . 'header', $vars);
            $this->load->view($view, $vars);
            $this->load->view(config_item('admin_folder') . '/common/' . $template . 'footer', $vars);
        }

        //reset $this->template to blank
        $this->template = false;
    }

    /* Template is a temporary prefix that lasts only for the next call to view */
    function set_template($template)
    {
        $this->template = $template;
    }
}

