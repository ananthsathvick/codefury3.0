<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends Base_Controller {

    function __construct()
    {
        parent::__construct();
        $this->lang->load('common');
        $this->load->library(array('form_validation'));
    }
    
	public function index()
	{
        $redirect	= $this->auth->is_logged_in(false, false);
        //if they are logged in, we send them back to the dashboard by default, if they are not logging in
        if ($redirect)
        {
            redirect($this->config->item('admin_folder').'/dashboard');
        }
	    $data['page_title'] = 'Login';

        $this->load->helper('form');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('remember', 'remember', 'trim|numeric');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login',$data);
        }
        else
        {
            $username	= $this->input->post('username');
            $password	= $this->input->post('password');
            $remember   = $this->input->post('remember');
            $redirect	= $this->input->post('redirect');
            $login		= $this->auth->login_admin($username, $password, $remember);
            if ($login)
            {
                if ($redirect == '')
                {
                    $redirect = $this->config->item('admin_folder').'/dashboard';
                }

                redirect($redirect);
            }
            else
            {
                //this adds the redirect back to flash data if they provide an incorrect credentials
                $this->session->set_flashdata('redirect', $redirect);
                $this->session->set_flashdata('error', lang('error_authentication_failed'));
                redirect($this->config->item('admin_folder').'/login');
            }
        }
	}



    function otp_verify()
    {
        $otp_id = $this->session->userdata('otp_save_id');
        if(empty($otp_id))
        {
           redirect('login');
        }

        $data['page_title']	= 'OTP Verification';

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('otp', 'OTP', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('otp_verify',$data);
        }
        else
        {
            $otp = $this->db->where('id',$otp_id)->get('app_otp')->row();
            if($otp->otp == $this->input->post('otp'))
            {
                $this->db->where('id',$otp_id)->delete('app_otp');
                $this->session->set_userdata('admin_id',$otp->customer_id);
                $this->session->unset_userdata('otp_id');

                redirect($this->config->item('admin_folder').'/login/update_password');
            }
            else
            {
                $data['error'] = '<div class="text-danger">Authentication failed</div>';
                $this->load->view('otp_verify',$data);
            }
        }

    }

    function update_password()
    {
        $admin_id = $this->session->userdata('admin_id');
        if(!$admin_id)
        {
            redirect('login');
        }

        $data['page_title'] = 'Update Password';
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('update_password',$data);
        }
        else
        {
            $save['id'] = $admin_id;
            $save['password'] = sha1($this->input->post('password'));

            $admin_type = $this->session->userdata('admin_type');
            $tbl = $admin_type == 1?'admin':'employee';

            $this->load->model('Common_model');
            $this->Common_model->save_tbl($tbl,$save);

            $this->session->set_flashdata('message','You have successfully reseted your password. Try to login with new password!');
            redirect($this->config->item('admin_folder').'/login');
        }
    }

    function check_user()
    {

        $login_type = $this->input->post('login_type');
        $username = $this->input->post('username');
        if($login_type == '1')
        {            $tbl = 'admin';        }
        else
        {            $tbl = 'employee';        }

        $this->db->where('username',$username);
        $user = $this->db->get($tbl)->num_rows();

        if($user > 0)
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('check_user','Please check the registered username!');
            return false;
        }
    }

    function logout()
    {
        $this->auth->logout();

        //when someone logs out, automatically redirect them to the login page.
        $this->session->set_flashdata('message', lang('message_logged_out'));
        redirect($this->config->item('admin_folder').'/login');
    }

    function error_page()
    {
        $data['page_title'] = '404';
        $this->load->view('error_page',$data);
    }
    
    function forgot_password()
    {
        $redirect	= $this->auth->is_logged_in(false, false);
        //if they are logged in, we send them back to the dashboard by default, if they are not logging in
        if ($redirect)
        {
            redirect($this->config->item('admin_folder').'/dashboard');
        }
        $data['page_title']	= 'Forgot Password';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Email', 'trim|required|max_length[128]|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('forgot_password',$data);
        }
        else
        {
            $success=$this->auth->reset_password($this->input->post('username'));
            if($success)
            {
                $this->session->set_flashdata('message', 'Your password has been reset. Please check your email');
                redirect(site_url($this->config->item('admin_folder').'/login/forgot_password'));
            }
            else
            {
                $this->session->set_flashdata('error','Account Not Found!');
                redirect(site_url($this->config->item('admin_folder').'/login/forgot_password'));
            }
        }
    }
}
