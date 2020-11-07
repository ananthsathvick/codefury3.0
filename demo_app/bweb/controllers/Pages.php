<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends Front_Controller {
    function __construct()
    {
        parent::__construct();
        $this->lang->load('common');
        $this->load->library(array('form_validation'));
        $this->load->helper(array('text'));
    }
	function index()
	{
        $data['page'] = $this->Common_model->get_tbl_row('pages', array('slug' => 'home', 'status' => 1));
        if (empty($data['page'])) {
            show_404();
        }
        $data[$data['page']->template . '_template'] = true;
        $data['page_title'] = $data['page']->title;
        $data['meta'] = $data['page']->meta;
        $data['seo_title'] = (!empty($data['page']->seo_title)) ? $data['page']->seo_title : $data['page']->title;

        $ord = 'sequence ASC';
        $data['page_contents'] = $this->Common_model->get_group('page_contents', 'section', array('where' => array('tbl_id' => $data['page']->id), 'order_by' => $ord));
        $data['testimonials'] = $this->Common_model->get_tbl_list('testimonials',array('where' => array('status' => 1)));
        // $data['hom_pages'] = $this->Common_model->get_tbl_list('pages',array('sel'=>'id,title','like'=>array('display_in'=>'home'),'where'=>array('template'=>'products')));
// print_a($data,true);
        $this->view('home',$data);
	}

	function page($slug=false)
    {
        if (!$slug) {
            redirect(site_url());
        }
        $data['page'] = $this->Common_model->get_tbl_row('pages', array('slug' => $slug, 'status' => 1));
        if (empty($data['page']) || $data['page']->template=='') {
            show_404();
        }
        $data[$data['page']->template . '_template'] = true;
        $data['page_title'] = $data['page']->title;
        $data['meta'] = $data['page']->meta;
        $data['seo_title'] = (!empty($data['page']->seo_title)) ? $data['page']->seo_title : $data['page']->title;
        $ord = 'sequence ASC';
        $data['page_contents'] = $this->Common_model->get_group('page_contents', 'section', array('where' => array('tbl_id' => $data['page']->id), 'order_by' => $ord));
        
        if($data['page']->template=='about_us'){
        $data['testimonials'] = $this->Common_model->get_tbl_list('testimonials',array('where' => array('status' => 1)));
        }
        
        $this->view($data['page']->template, $data);
    }

    function candidate_list()
	{		$this->load->model('Company_model');
        $this->Company_model->is_logged_in(true);
        $this->load->helper('form');
        $this->load->model('Customer_model');        
		$data['page_title'] = 'Candidates Listing';		
        $data['perpage'] = $arr['perpage']=50;
        
            $data['cpage'] =  $arr['page'] =$this->input->get('page')>0 ? ($this->input->get('page')-1)*$arr['perpage']:0;
            $arr['order_by'] = 'id DESC';
            $data['resumes'] = $this->Customer_model->get_resumes($arr);
            // echo $this->db->last_query(); exit;
            $arr2['count'] = true;
            $data['total_rows'] = $this->Customer_model->get_resumes($arr2);
            
            $data['location'] = config_item('location');
            $data['post_date'] = config_item('post_date');
            $data['experience'] = config_item('experience');

            $data['industries']		= $this->Common_model->get_tbl_array('industry','id','name');
			// print_a($data['resumes'],true); 
		$this->view('candidate_list', $data);
	}

    function error_page()
    {
        $data['page_title'] = '404';
        $this->load->view('error_page',$data);
    }

    function quick_enquiry()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[12]|regex_match[/^[0-9]{10,11}/]',array('regex_match'=>'Contact number should be numbers with country code eg: 0xxxxxxxxxx, xxxxxxxxxx'));
        $this->form_validation->set_rules('description', 'Message', 'trim|required|max_length[250]');
        if($_POST['type']==2) {
            $this->form_validation->set_rules('subject', 'Subject', 'trim|max_length[250]');
        }
        if($_POST['type']==3) {
            $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|max_length[200]');
        }    
        $this->form_validation->set_rules('type', 'type', 'trim|required|numeric|max_length[1]');
        $this->form_validation->set_rules('url', 'url', 'trim|required|valid_url');
        $this->form_validation->set_rules('pid', 'Page', 'trim|required|numeric');
        if($this->form_validation->run() == false)
        {
            $errors = $this->form_validation->get_error_array();
            echo json_encode(array_reverse($errors));
            exit;
        }
        else
        {
            $save['id'] = false;
            $save['name'] = $this->input->post('name');            
            $save['email'] = $this->input->post('email');
            $save['phone'] = $this->input->post('phone');
            $save['type'] = $this->input->post('type');
            $save['description'] = $this->input->post('description');       
            if($_POST['type']==2) {
                $arr = array('Subject'=>$this->input->post('subject'));
                $save['contents'] = json_encode($arr);  
            } 
            if($_POST['type']==2) {
                $arr = array('Company Name'=>$this->input->post('company_name'));
                $save['contents'] = json_encode($arr);  
            }    
            $save['url'] = $this->input->post('url');
            $save['pid'] = $this->input->post('pid');
            $save['status'] = 0;
            $save['added_date'] = date('Y-m-d H:i:s');

            $this->Common_model->save_tbl('enquires',$save);

            $this->load->model('Email_model');

            /*Admin mail start*/
            $mail_data = array();
            $from = config_item('email');
//            $to ='yugesh.bweb@gmail.com';
            $to = config_item('enquiry_email');
            $template = 'general_mail';
            $mail_data['subject'] = config_item('company_name').' - Enquiry';
            $mail_data['content'] ='Name : '.$save['name']
                .'<br>Email : '.$save['email']
                .'<br>Contact Number : '.$save['phone']
                .'<br>Description : '.$save['description']
                .'<br>Enquiry URL : '.$save['url'];
                if($_POST['type']==2) {
                    $mail_data['content'] .='Subject : '.$this->input->post('subject');
                } 
                if($_POST['type']==3) {
                    $mail_data['content'] .='ompany Name : '.$this->input->post('company_name');
                } 
            $from_name = $this->config->item('company_name');
            $this->Email_model->send_email($from, $to, $template, $mail_data, $from_name, $cc = false, $bcc = false, $reply_to = false, $attached = false);
            /*Admin mail end*/

            echo json_encode(array('success_msg'=>'Thank you for your enquiry. Our team will you contact you shortly!','success_msg_redirect'=>site_url('')));
            exit;
        }
    }

    function review_form()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[12]');
        $this->form_validation->set_rules('rating', 'Rating', 'trim|required|numeric|max_length[1]');
        $this->form_validation->set_rules('description', 'Message', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('cat', 'Page Title', 'trim|numeric|max_length[11]');
//        $this->form_validation->set_rules('url', 'url', 'trim|required|valid_url');
        if($this->form_validation->run() == false)
        {
            $errors = $this->form_validation->get_error_array();
            echo json_encode(array_reverse($errors));
            exit;
        }
        else
        {
            $save['id'] = false;
            $save['name'] = $this->input->post('name');
            $save['email'] = $this->input->post('email');
            $save['phone'] = $this->input->post('phone');
            $save['rating'] = $this->input->post('rating');
            $save['description'] = $this->input->post('description');
            $save['cat_id'] = $this->input->post('cat');
            $save['status'] = 0;
            $save['added_date'] = date('Y-m-d H:i:s');

            $this->Common_model->save_tbl('reviews',$save);
            echo json_encode(array('success_msg'=>'Thank you for your review'));
            exit;
        }
    }    

    function newsletter_subscribe()
    {
        $this->load->model('Newsletter_model');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]');
        if($this->form_validation->run() == false)
        {
            $errors = $this->form_validation->get_error_array();
            echo json_encode($errors);
            exit;
        }
        else
        {
            $save['email'] = $this->input->post('email');
            $save['status'] = 1;
            $save['added_date'] = date('Y-m-d H:i:s');

            $chk = $this->Newsletter_model->save_newsletter($save);
            if($chk){
                echo json_encode(array('success_msg'=>'Thank you for subscribe our newsletter'));
                exit;
            }
            echo json_encode(array('email'=>'This email id already subscribed our newsletter'));
            exit;

        }
    }

    function test_sms()
    {
        $sms_text = 'Code Headed OTP is 12345';
        send_sms('7094013077',$sms_text);
    }
    function general_mail()
    {
        $this->load->model('email_model');
        $mail_data['subject']='Thanks For Registration';
        $mail_data['content']= 'We are Delighted to Have you on our Service list. We shall get back to you with Best offers ';
        echo $this->email_model->view_email('general_mail',$mail_data);
    }

    function test_mail()
    {
        $this->load->model('Email_model');
        $from_name=$this->config->item('company_name');
        $from=config_item('email');
        $to= 'yugesh.bweb@gmail.com';
        $template='general_mail';
        $mail_data['subject']='Thanks For Registration';
        $mail_data['content']= 'We are Delighted to Have you on our Service list. We shall get back to you with Best offers ';
        $mail_data['customer_name']= 'Yugesh';

        $this->Email_model->send_email($from,$to,$template,$mail_data,$from_name,$cc=false,$bcc=false,$reply_to=false,$attached=false);

    }

}
