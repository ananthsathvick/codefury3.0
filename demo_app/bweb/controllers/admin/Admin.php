<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends Admin_Controller
{
    public $current_admin = false;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
        $this->current_admin = $this->session->userdata('admin');
    }

    public function index()
    {
        $this->auth->check_privilege(array('Admin_index'),true);
        $data['page_title'] = 'Administrative';
        $data['admins']     = $this->Common_model->get_tbl_list('admin');
        $this->view(config_item('admin_folder') . '/admin', $data);
    }

    public function form($id = false)
    {
        $this->auth->check_privilege(array('Admin_form'),true);

        $data              = $this->Common_model->get_tbl_fields('admin');
        $data['privilege'] = array();
        if ($id) {
            $data              = (array)$this->Common_model->get_tbl_row('admin', $id);
            $data['privilege'] = ($data['privilege'] == 'null') ? array() : json_decode($data['privilege']);
            if (empty($data)) {
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect(config_item('admin_folder') . '/admin');
            }
        }
//        print_a($data,true);
        $data['page_title']     = 'Administrative - Form';
        $data['all_privileges'] = $this->Common_model->get_tbl_tiered('privilege', array('where' => 'active=1'));

        $this->load->library(array('form_validation'));
        $this->load->helper('form');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[50]|check_field[admin||username||id||' . $id . ']');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[50]|check_field[admin||email||id||' . $id . ']');
        $this->form_validation->set_rules('access', 'Access', 'trim');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');
        $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|required|max_length[15]');        
        if ($this->input->post('password') != '' || $this->input->post('confirm') != '' || !$id) {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
            $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');
        }
        if ($this->form_validation->run() == false) {
            $this->view(config_item('admin_folder') . '/admin_form', $data);
        } else {
            $save['id']       = $id;
            $save['name']     = $this->input->post('name');
            $save['username'] = $this->input->post('username');
            $save['email']    = $this->input->post('email');
            if ($this->input->post('password') != '' || !$id) {
                $save['password'] = sha1($this->input->post('password'));
            }
//            $save['access']     = $this->input->post('access');
            $save['status']    = $this->input->post('status');
            $save['phone_no']  = $this->input->post('phone_no');
            $save['privilege'] = json_encode($this->input->post('privilege'));

            $this->Common_model->save_tbl('admin', $save);

            $this->session->set_flashdata('message', lang('message_saved'));
            redirect(config_item('admin_folder') . '/admin');
        }
    }

    public function delete($id)
    {
        $this->auth->check_privilege(array('Admin_delete'),true);
        //even though the link isn't displayed for an admin to delete themselves, if they try, this should stop them.
        if ($this->current_admin['id'] == $id) {
            $this->session->set_flashdata('message', lang('error_self_delete'));
            redirect($this->config->item('admin_folder') . '/admin');
        }
        //delete the user
        $this->Common_model->delete_tbl_id('admin', $id);
        $this->session->set_flashdata('message', lang('message_delete_success'));
        redirect($this->config->item('admin_folder') . '/admin');
    }
}
