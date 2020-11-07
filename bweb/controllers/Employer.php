<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

require_once BASEPATH.'core/CodeIgniter.php';


use \mikehaertl\wkhtmlto\Pdf;

class Employer extends Front_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->lang->load('common');
        $this->load->library(array('form_validation'));
        // $this->load->helper(array('text'));
        $this->load->helper('string');
        $this->load->model('Company_model');
        $this->company = $this->session->userdata('company');
    }
    public function index()
    {
        show_404();
    }


    public function login($ajax = false)
    {
        //find out if they're already logged in, if they are redirect them to the my account page
        $redirect    = $this->Company_model->is_logged_in(false, false);
        //if they are logged in, we send them back to the my_account by default, if they are not logging in
        if ($redirect) {
            redirect('employer/my_account/');
        }

        $data['page_title']    = 'Login';
        $data['redirect']    = $this->session->flashdata('redirect');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[120]');
        // $this->form_validation->set_rules('remember', 'Remember', 'trim|numeric|max_length[1]');

        if ($this->form_validation->run() == false) {
            if ($ajax) {
                $errors = $this->form_validation->get_error_array();
                echo json_encode(array_reverse($errors));
                exit;
            } else {
                $data['errors'] = $this->form_validation->get_error_array();
                $this->set_template('login');
                $this->view('my_company/login', $data);
            }
        } else {
            $email        = $this->input->post('email');
            $password    = $this->input->post('password');
            // $remember   = $this->input->post('remember');
            $redirect    = $this->input->post('redirect');
            $login        = $this->Company_model->login($email, $password);

            if ($login) {
                if ($redirect == '') {
                    $redirect = 'employer/my_account';
                }
                //to login via ajax
                if ($ajax) {
                    die('true');
                    //					die(json_encode(array('result'=>true)));
                } else {
                    redirect($redirect);
                }
            } else {
                if ($ajax) {
                    die('false');
                } else {
                    $this->session->set_flashdata('redirect', $redirect);
                    $this->session->set_flashdata('error', 'Login Failed');
                    redirect('employer/login');
                }
            }
        }
    }

    public function register($ajax = false)
    {
        //find out if they're already logged in, if they are redirect them to the my account page
        $redirect    = $this->Company_model->is_logged_in(false, false);
        //if they are logged in, we send them back to the my_account by default, if they are not logging in
        if ($redirect) {
            redirect('secure/my_account');
        }

        $data['page_title']    = 'Register';
        $data['redirect']    = $this->session->flashdata('redirect');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('url', 'Company URL', 'trim|required');
        $this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required|max_length[200]');
        $this->form_validation->set_rules('desigination', 'Desigination', 'trim|required|max_length[200]');
        $this->form_validation->set_message('is_unique', 'This email id is already registered');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]|is_unique[company.email]');
        $this->form_validation->set_rules('phone', 'Contact Numberd', 'trim|required|max_length[120]|is_unique[company.phone]|regex_match[/^[0-9]{10,11}/]', array('regex_match' => 'Contact number should be numbers with country code eg: 0xxxxxxxxxx, xxxxxxxxxx'));
        $this->form_validation->set_rules('mobile', 'Alternate Number', 'trim|max_length[120]|regex_match[/^[0-9]{10,11}/]', array('regex_match' => 'Alternate number should be numbers with country code eg: 0xxxxxxxxxx, xxxxxxxxxx'));
        $this->form_validation->set_rules('tc', 'Terms and conditions', 'trim|required|numeric|max_length[1]');

        if ($this->form_validation->run() == false) {
            if ($ajax) {
                $errors = $this->form_validation->get_error_array();
                echo json_encode(array_reverse($errors));
                exit;
            } else {
                $data['errors'] = $this->form_validation->get_error_array();
                $this->set_template('login');
                $this->view('my_company/login', $data);
            }
        } else {
            $save['name']        = $this->input->post('name');
            $save['url']        = $this->input->post('url');
            $save['contact_person']        = $this->input->post('contact_person');
            $save['desigination']        = $this->input->post('desigination');
            $save['email']    = $this->input->post('email');
            $save['phone']    = $this->input->post('phone');
            $save['mobile']    = $this->input->post('mobile');
            $save['password']    = sha1('udyogc');
            $save['status']    = 0;
            $save['added_date']    = date('Y-m-d H:i:s');
            $save['otp'] = random_string('numeric', 4);
            // $remember   = $this->input->post('remember');
            $id = $this->Common_model->save_tbl('company', $save);
            $arr['reg_otp'] = $save['otp'];
            $arr['id'] = $id;
            $arr['email'] = $save['email'];
            $this->session->set_userdata('company_reg', $arr);

            $mail_data = array();
            $from = config_item('email');
            //            $to ='yugesh.bweb@gmail.com';
            $to = $arr['email'];
            $template = 'general_mail_emp';
            $mail_data['subject'] = config_item('company_name') . ' - Employer Registration';
            $mail_data['content'] = 'Thank you for registering with us. Our team will contact you soon';
            //  $mail_data['content'] ='Thank you for register us. Please click the following url to access your dashboard <br>'.site_url('employer/login/');

            $from_name = $this->config->item('company_name');
            $this->Email_model->send_email($from, $to, $template, $mail_data, $from_name, $cc = false, $bcc = false, $reply_to = false, $attached = false);
            /*mail end*/
            $this->session->set_flashdata('message', 'Thank you for registering with us, Our team will contact you soon.');
            //            $this->session->set_flashdata('message', 'Please enter OTP');
            redirect('employer/login');
        }
    }

    public function register_otp($ajax = false)
    {
        if (empty($this->session->userdata('company_reg'))) {
            redirect('employer/my_account/');
        }

        $data['redirect']    = $this->session->flashdata('redirect');
        $this->form_validation->set_rules('otp', 'OTP', 'trim|required|numeric|max_length[6]');
        if ($this->form_validation->run() == false) {
            if ($ajax) {
                $errors = $this->form_validation->get_error_array();
                echo json_encode(array_reverse($errors));
                exit;
            } else {
                $data['errors'] = $this->form_validation->get_error_array();
                $this->set_template('login');
                $this->view('my_account/otp', $data);
            }
        } else {
            $save['otp']    = $this->input->post('otp');
            $reg_details = $this->session->userdata('company_reg');
            /* print_a($reg_details,true); */
            $res = $this->Common_model->get_tbl_row('company', array('email' => $reg_details['email'], 'otp' => $save['otp']));
            if (!empty($res)) {
                $sav['id'] = $res->id;
                $sav['otp'] = '';
                $sav['status'] = 0;
                $this->Common_model->save_tbl('company', $sav);
                $this->session->unset_userdata('company_reg');
                $arr['id']    = $res->id;
                $arr['name']        = $res->name;
                $arr['contact_person']        = $res->contact_person;
                $arr['email']    = $res->email;
                $arr['phone']    = $res->phone;
                $arr['mobile']    = $res->mobile;
                $this->session->set_userdata('company', $arr);
            }
            /*mail start*/
            $mail_data = array();
            $from = config_item('email');
            //            $to ='yugesh.bweb@gmail.com';
            $to = $arr['email'];
            $template = 'general_mail_emp';
            $mail_data['subject'] = config_item('company_name') . ' - Employer Registration';
            $mail_data['content'] = 'Thank you for registering with us. Our team will contact you soon';
            //  $mail_data['content'] ='Thank you for register us. Please click the following url to access your dashboard <br>'.site_url('employer/login/');

            $from_name = $this->config->item('company_name');
            $this->Email_model->send_email($from, $to, $template, $mail_data, $from_name, $cc = false, $bcc = false, $reply_to = false, $attached = false);
            /*mail end*/
            $this->session->set_flashdata('message', 'Thank you for registering us');
            redirect('employer/my_account');
        }
    }

    public function my_account()
    {
        $this->Company_model->is_logged_in(true);
        $data['page_title'] = 'Dashboard';
        $data['emp_header'] = true;
        $data['tot_download'] = $this->Company_model->rc_count($this->company['id'], 2);
        $data['tot_view'] = $this->Company_model->rc_count($this->company['id'], 1);
        // $arr['perpage']=5;
        // $arr['order_by'] = 'id DESC';
        $data['resumes'] = array();
        if ($this->input->get('from') != '' && $this->input->get('to') != '') {
            // $arr['where']= array('company_id'=>$this->company['id']);
            $from_date  = date('Y-m-d', strtotime($this->input->get('from')));
            $end_date   = date('Y-m-d', strtotime($this->input->get('to')));
            $arr['where'] = 'company_id = ' . $this->company['id'] . ' AND (DATE(view_on) BETWEEN "' . $from_date . '" AND "' . $end_date . '" OR DATE(download_on) BETWEEN "' . $from_date . '" AND "' . $end_date . '")';
            $data['resumes'] = $this->Common_model->get_tbl_list('company_resume', $arr);
        }

        // echo $this->db->last_query(); exit;
        // print_a($data['resumes'],true);
        $this->set_template('my');
        $this->view('my_company/dashboard', $data);
    }

    public function my_profile()
    {
        $this->Company_model->is_logged_in(true);
        $data['emp_header'] = true;
        $data['page_title'] = 'Profile';
        $id = $this->company['id'];
        $data['company'] = $this->Common_model->get_tbl_row('company', $id);

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[120]');
        $this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required|max_length[120]');
        $this->form_validation->set_rules('desigination', 'Contact Person Designation', 'trim|required|max_length[120]');
        $this->form_validation->set_message('is_unique', 'This {field} is already used');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]|check_field[company||email||id||' . $id . ']|regex_match[/^[0-9]{10,11}/]', array('regex_match' => 'Contact number should be numbers with country code eg: 0xxxxxxxxxx, xxxxxxxxxx'));
        $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|max_length[15]|check_field[company||phone||id||' . $id . ']|regex_match[/^[0-9]{10,11}/]', array('regex_match' => 'Optional number should be numbers with country code eg: 0xxxxxxxxxx, xxxxxxxxxx'));
        $this->form_validation->set_rules('mobile', 'Optional Number', 'trim|max_length[15]');
        //$this->form_validation->set_rules('url', 'URL', 'trim|valid_url');

        if ($this->input->post('password') != '') {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]');
        }

        if ($this->form_validation->run() == false) {
            $data['errors'] = $this->form_validation->get_error_array();
            $this->set_template('my');
            $this->view('my_company/profile', $data);
        } else {
            $save['id'] = $id;
            //$save['name']		= $this->input->post('name');
            $save['contact_person']        = $this->input->post('contact_person');
            $save['desigination']        = $this->input->post('desigination');
            if ($data['company']->email != $this->input->post('email')) {
                $save['email']    = $this->input->post('email');
                $save['status'] = 0;
            }
            $save['phone']    = $this->input->post('phone');
            $save['mobile']    = $this->input->post('mobile');
            //$save['url']	= $this->input->post('url');

            if ($this->input->post('password') != '') {
                $save['password'] = sha1($this->input->post('password'));
            }

            // $remember   = $this->input->post('remember');
            $id = $this->Common_model->save_tbl('company', $save);
            $this->session->set_flashdata('message', 'Profile has been successfully updated');
            redirect('employer/my_account');
            /*redirect('employer/my_profile');*/
        }
    }

    public function user_list()
    {
        $this->Company_model->is_logged_in(true);
        $data['page_title'] = 'Candidate List';
        $data['emp_header'] = true;
        $data['perpage'] = $arr['perpage'] = 50;
        $data['cpage'] =  $arr['page'] = $this->input->get('page') > 0 ? ($this->input->get('page') - 1) * $arr['perpage'] : 0;
        $arr['order_by'] = 'id DESC';
        $arr['where'] = $arr2['where'] = array('company_id' => $this->company['id']);
        $data['resumes'] = $this->Common_model->get_tbl_list('company_resume', $arr);
        // echo $this->db->last_query(); exit;
        $arr2['count'] = true;
        $data['total_rows'] = $this->Common_model->get_tbl_list('company_resume', $arr2);


        $this->set_template('my');
        $this->view('my_company/candidate_list', $data);
    }

    public function download_resume()
    {
        // $data['resume_id'] = 'dsfgvds';
        // echo $this->load->view('my_company/download_resume',$data,true);
        // exit;
        //$this->Company_model->is_logged_in(true);
        $en_id = $this->input->get('K');
        $id    = base64_decode($en_id);
        $data['resume'] = $this->Common_model->get_tbl_row('resume', $id);
        // print_r($data['resume']);
        // return "HEHEEHE";
        if (empty($data['resume'])) {
            redirect(site_url());
        }
        $redirect    = $this->Company_model->is_logged_in(false, false);
        if ($redirect) {
            $save['resume_id'] = $data['resume']->id;
            $save['user_id'] = $data['resume']->user_id;
            $save['company_id'] = $this->company['id'];

            // $data['resume']->tmp_id = '1';

            $this->Company_model->save_cr($save, 2);
        }


        $this->load->library('pdf');

        $this->load->helper('file');
        // print_a(json_decode($data['resume']->work_exp, true),true);        
        $data['work_exp'] = json_decode($data['resume']->work_exp, true);
        $data['education'] = json_decode($data['resume']->education, true);
        $data['achievements'] = json_decode($data['resume']->achievements, true);
        $data['awards'] = json_decode($data['resume']->awards, true);

        if ($data['resume']->company_exp >= 3) {
            $data['font_size'] = '20px';
            $data['line_height'] = '24px';
        } elseif ($data['resume']->company_exp >= 2) {
            $data['font_size'] = '22px';
            $data['line_height'] = '26px';
        } else {
            $data['font_size'] = '22px';
            $data['line_height'] = '28px';
        }
        // $skills =  explode(',',$data['resume']->skills); 
        // print_a($skills,true);

        if (!empty($data['resume'])) {
            $this->set_template('my');
            $file_view = $this->load->view('my_company/download_resume', $data, true);
            // $file_view = $this->load->view('my_account/resume_preview', $data, true);
            // echo $file_view; exit;
            /*$file_name = $data['resume']->id.'_resume';*/

            $file_name = $data['resume']->name . '_' . $data["resume"]->tot_experience . 'yrs';
            // $this->pdf->set_base_path(theme_url()."css/bootstrap.min.css");

            // $this->pdf->loadHtml($file_view);
            // $this->pdf->render();


            // $this->pdf->stream($file_name.'.pdf');


            // $pdf = new Pdf($file_view);
            // echo $data['resume']->tmp_id;
            // exit;
            if($data['resume']->tmp_id == '1' || $data['resume']->tmp_id == '10')
            {
                $pdf = new Pdf(array(
                    //'no-outline',         // Make Chrome not complain
                    'outline',
    
                    'user-style-sheet' => theme_url() . 'css/bootstrap.min.css',
                ));

            }
            else
            {
                $pdf = new Pdf(array(
                    //'no-outline',         // Make Chrome not complain
                    
                    'outline',
                    'margin-top'    => 0,
                    'margin-right'  => 0,
                    'margin-bottom' => 0,
                    'margin-left'   => 0,
    
                    'user-style-sheet' => theme_url() . 'css/bootstrap.min.css',
                ));

            }
            
            $pdf->addPage($file_view);

        //    $this->output->set_content_type('application/pdf')->set_output(($pdf->toString()));
        //    exit;
            if (!$pdf->send($file_name . '.pdf')) {
                $error = $pdf->getError();
                // ... handle error here
                echo($error);
            }
        } else {
            echo "FAIL";
            return false;
        }

        // $this->load->library('user_agent');
        // redirect($this->agent->referrer());
    }

    public function canditate_details()
    {
        //$this->Company_model->is_logged_in(true);
        $data['page_title'] = 'Candidate Details';
        $en_id = $this->input->get('K');
        $id    = base64_decode($en_id);
        $data['resume'] = $this->Common_model->get_tbl_row('resume', $id);
        if (empty($data['resume'])) {
            redirect(site_url());
        }
        $data['work_exp'] = json_decode($data['resume']->work_exp, true);
        $data['education'] = json_decode($data['resume']->education, true);
        $data['achievements'] = json_decode($data['resume']->achievements, true);
        $data['awards'] = json_decode($data['resume']->awards, true);
        

        $redirect    = $this->Company_model->is_logged_in(false, false);
        if ($redirect) {
            $save['resume_id'] = $data['resume']->id;
            $save['user_id'] = $data['resume']->user_id;
            $save['company_id'] = $this->company['id'];

            $this->Company_model->save_cr($save, 1);
        }

        
        // $data['similar_resumes'] = $this->Common_model->similar_resumes($data['resume']->skills);
        // echo $this->db->last_query();
        // $data['industries']		= $this->Common_model->get_tbl_array('industry','id','name');

        if ($data['resume']->company_exp >= 3) {
            $data['font_size'] = '16px';
            $data['line_height'] = '20px';
        } elseif ($data['resume']->company_exp >= 2) {
            $data['font_size'] = '18px';
            $data['line_height'] = '22px';
        } else {
            $data['font_size'] = '20px';
            $data['line_height'] = '24px';
        }
        $this->load->view('candidate_details', $data);
    }

    public function deactive_acc()
    {
        $this->Company_model->is_logged_in(true);
        // print_a($this->user,true);
        $this->db->where('id', $this->company['id'])->update('company', array('status' => 0));
        $this->Company_model->logout();
        redirect('employer/login');
    }


    public function logout()
    {
        $this->Company_model->logout();
        redirect('employer-login');
    }

    function send_admin_email()
    {
        $this->form_validation->set_rules('email_content', 'Email Content', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Please enter the message');
            redirect('employer/my_account');
        } else {
            $this->load->model('Email_model');
            $from_name = $this->company['name'];
            $to = config_item('email');
            $from =  $this->company['email'];
            $template = 'general_mail_emp';
            $mail_data['subject'] = 'Mail from employer';
            $mail_data['content'] = $this->input->post('email_content');

            $this->Email_model->send_email($from, $to, $template, $mail_data, $from_name, $cc = false, $bcc = false, $reply_to = false, $attached = false);

            $this->session->set_flashdata('message', 'Mail has been sent successfully');
            redirect('employer/my_account');
        }
    }

    function forgot_password()
    {
        $redirect = $this->Company_model->is_logged_in(false, false);
        //if they are logged in, we send them back to the dashboard by default, if they are not logging in
        if ($redirect) {
            redirect('employer/my_account/');
        }

        $data['page_title']    = 'Forgot Password';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Email', 'trim|required|max_length[128]|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('my_company/forgot_password', $data);
        } else {
            $success = $this->Company_model->reset_password($this->input->post('username'));
            if ($success) {
                $this->session->set_flashdata('message', 'Your password has been reset. Please check your email');
                redirect(site_url('employer/forgot_password'));
            } else {
                $this->session->set_flashdata('error', 'Account Not Found!');
                redirect(site_url('employer/forgot_password'));
            }
        }
    }
}
