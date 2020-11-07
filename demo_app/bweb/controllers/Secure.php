<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secure extends Front_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->lang->load('common');
        $this->load->library(array('form_validation'));
        // $this->load->helper(array('text'));
        $this->load->helper('string');
        $this->load->model('Customer_model');
        $this->user = $this->session->userdata('user');
    }

    function index()
    {
        show_404();
    }

    function social_login($provider = false)
    {
        if ($provider == false) {
            redirect(site_url());
        }
        $redirect = $this->Customer_model->is_logged_in(false, false);
        if ($redirect) {
            redirect('secure/my_account/');
        }
        //Facebook
        if ($provider == 'Facebook') {
            $app_id = $this->config->item('fb_appid');
            $app_secret = $this->config->item('fb_appsecret');
            $provider = $this->oauth2->provider($provider, array('id' => $app_id, 'secret' => $app_secret));
            //$save['login_type']=2;
        } //google
        else if ($provider == 'Google') {
            $app_id = $this->config->item('googleplus_appid');
            $app_secret = $this->config->item('googleplus_appsecret');
            $provider = $this->oauth2->provider($provider, array('id' => $app_id, 'secret' => $app_secret,));
            //$save['login_type']=3;
        }
        if (!$this->input->get('code')) {
            $provider->authorize();
            redirect(site_url() . '?error');
        } else {
            $token = $provider->access($_GET['code']);
            $user = $provider->get_user_info($token);
            if ($user['email'] == Null || $user['email'] == '') {
                echo '<script type="text/javascript"> window.close();</script>';
            } else {
//				echo '<pre>'; print_r($user);
                $save['social_id'] = $user['uid'];
                $save['name'] = $user['first_name'] . ' - ' . $user['last_name'];
                $save['email'] = $user['email'];
                // $save['social_image']      =$user['image'];
                // $save['active']	=$this->config->item('new_customer_status');
                $save['active'] = 1;
                $this->Customer_model->save_social($save);
                if ($this->Customer_model->login_social($save['email'], $save['social_id'])) {
                    echo '<script type="text/javascript">localStorage.setItem("cuslog", "1"); opener.location.reload(); window.close();</script>';
                }
            }
            //redirect($redirect);
        }
    }

    function login($ajax = false)
    {
        //find out if they're already logged in, if they are redirect them to the my account page
        $redirect = $this->Customer_model->is_logged_in(false, false);
        //if they are logged in, we send them back to the my_account by default, if they are not logging in
        if ($redirect) {
            redirect('secure/my_account/');
        }

        $data['page_title'] = 'Login';
        $data['redirect'] = $this->session->flashdata('redirect');
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
                $this->view('my_account/login', $data);
            }
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            // $remember   = $this->input->post('remember');
            $redirect = $this->input->post('redirect');
            $login = $this->Customer_model->login($email, $password);

            if ($login) {
                if ($redirect == '') {
                    $redirect = 'secure/my_account';
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
                    redirect('secure/login');
                }
            }
        }
    }
    
    function login_app($code=false,$id=false)
    {
        $data['page_title']	= 'Login';
        $data['gift_cards_enabled'] = $this->gift_cards_enabled;

        $this->load->helper('form');
        $data['redirect']	= $this->session->flashdata('redirect');
        $submitted 		= $this->input->post('submitted');
        if ($code)
        {
            $email		= $this->input->post('email');
            $password	= $this->input->post('password');
            $remember   = $this->input->post('remember');
            $redirect	= $this->input->post('redirect');
            $login		= $this->Customer_model->login_app($code,$id);

            if ($login)
            {
                print_r($login);
                $this->load->view('login');
            }
        }
        else {
            redirect(site_url());
        }
    }

    function register($ajax = false)
    {
        //find out if they're already logged in, if they are redirect them to the my account page
        $redirect = $this->Customer_model->is_logged_in(false, false);
        //if they are logged in, we send them back to the my_account by default, if they are not logging in
        if ($redirect) {
            redirect('secure/my_account/');
        }

        $data['page_title'] = 'Register';
        $data['redirect'] = $this->session->flashdata('redirect');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[120]');
        $this->form_validation->set_message('is_unique', 'This {field} is already registered');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]|is_unique[users.email]');
        $this->form_validation->set_rules('phone', 'Contact Number', 'trim|required|max_length[120]|is_unique[users.phone]|regex_match[/^[0-9]{10,11}/]',array('regex_match'=>'Contact number should be numbers with country code eg: 0xxxxxxxxxx, +91xxxxxxxxxx'));
        $this->form_validation->set_rules('mobile', 'Alternate Number', 'trim|max_length[120]|regex_match[/^[0-9]{10,11}/]',array('regex_match'=>'Alternate number should be numbers with country code eg: 0xxxxxxxxxx, +91xxxxxxxxxx'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == false) {
            if ($ajax) {
                $errors = $this->form_validation->get_error_array();
                echo json_encode(array_reverse($errors));
                exit;
            } else {
                $data['errors'] = $this->form_validation->get_error_array();
                $this->set_template('login');
                $this->view('my_account/register', $data);
            }
        } else {
            $save['name'] = $this->input->post('name');
            $save['email'] = $this->input->post('email');
            $save['phone'] = $this->input->post('phone');
            $save['mobile'] = $this->input->post('mobile');
            $save['password'] = sha1($this->input->post('password'));;
            $save['status'] = 0;
            $save['added_date'] = date('Y-m-d H:i:s');
            $save['otp'] = random_string('numeric', 4);
            $save['otp'] = md5(rand());
            // $remember   = $this->input->post('remember');
            $id = $this->Common_model->save_tbl('users', $save);
            $arr['reg_otp'] = $save['otp'];
            $arr['id'] = $id;
            $arr['email'] = $save['email'];
            $this->session->set_userdata('register', $arr);

            $mail_data = array();
            $from = config_item('email');
//            $to ='yugesh.bweb@gmail.com';
            $to =$arr['email'];
            $template = 'general_mail';
            $mail_data['subject'] = config_item('company_name').' - Candidate Registration';
            $mail_data['content'] ='Greetings from Code Headed.<br/>We are pleased to have you onboard!!<br/>Please select the following URL to activate your account <a href="'. site_url('secure/account_activation/'.$save['otp']) .'">'. site_url('secure/account_activation/'.$save['otp']) .'</a>' ;
            //  $mail_data['content'] ='Thank you for register us. Please click the following url to access your dashboard <br>'.site_url('employer/login/');

            $from_name = $this->config->item('company_name');
            $this->Email_model->send_email($from, $to, $template, $mail_data, $from_name, $cc = false, $bcc = false, $reply_to = false, $attached = false);

/*            $sms_text = config_item('otp_sms');
            $sms_text = str_replace('{otp}', $save['otp'], $sms_text);
            send_sms($save['mobile'], $sms_text);*/

            /*$this->session->set_flashdata('message', 'Please enter otp');
            redirect('secure/register_otp');*/
            $this->session->set_flashdata('message', 'Activation details sent to the email');
            redirect('secure/login');
        }
    }

    function account_activation($slug)
    {
        $data['page_title'] = 'Page Activation';

        $user = $this->db->where('otp',$slug)->get('users')->row();
//        echo $this->db->last_query();
//        print_a($user,true);
        if(!$user){
            $this->session->set_flashdata('error','Account not found');
            redirect(site_url('secure/login'));
        }

        $this->db->set(array('status'=>1,'otp'=>''))->where('id',$user->id)->update('users');
        $this->session->set_flashdata('message','Account activated please login to continue!');
        redirect(site_url('secure/login'));
    }


    function register_otp($ajax = false)
    {
        if (empty($this->session->userdata('register'))) {
            redirect('secure/my_account/');
        }

        $data['page_title'] = 'Register';
        $data['redirect'] = $this->session->flashdata('redirect');
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
            $save['otp'] = $this->input->post('otp');
            $reg_details = $this->session->userdata('register');
            /* print_a($reg_details,true); */
            $res = $this->Common_model->get_tbl_row('users', array('email' => $reg_details['email'], 'otp' => $save['otp']));
            if (!empty($res)) {
                $sav['id'] = $res->id;
                $sav['otp'] = '';
                $sav['status'] = 1;
                $this->Common_model->save_tbl('users', $sav);
                $this->session->unset_userdata('register');
                $arr['id'] = $res->id;
                $arr['name'] = $res->name;
                $arr['email'] = $res->email;
                $arr['phone'] = $res->phone;
                $arr['mobile'] = $res->mobile;
                $this->session->set_userdata('user', $arr);
            }
            $this->session->set_flashdata('message', 'Thank you for registering us');
            redirect('secure/my_account');
        }
    }

    function my_account()
    {
        $this->load->model('Company_model');
        $this->Customer_model->is_logged_in(true);
        $data['page_title'] = 'Dashboard';

        $data['tot_download'] = $this->Company_model->rc_count_user($this->user['id'], 2);
        $data['tot_view'] = $this->Company_model->rc_count_user($this->user['id'], 1);
        $arr['perpage'] = 20;
        $arr['order_by'] = 'id DESC';
        $arr['where'] = array('user_id' => $this->user['id']);
        $data['c_resumes'] = $this->Common_model->get_tbl_list('company_resume', $arr);
        $data['resume'] = $this->Common_model->get_tbl_row('resume', array('user_id' => $this->user['id'], 'expired' => 0));
// echo $this->db->last_query();
        $this->set_template('my');
        $this->view('my_account/dashboard', $data);
    }

    function my_profile()
    {
        $this->Customer_model->is_logged_in(true);
        $data['page_title'] = 'Profile';
        $id = $this->user['id'];
        $data['user'] = $this->Common_model->get_tbl_row('users', $id);

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[120]');
        $this->form_validation->set_message('is_unique', 'This {field} is already used');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]|check_field[users||email||id||' . $id . ']');
        $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|max_length[15]|check_field[users||phone||id||' . $id . ']');
        $this->form_validation->set_rules('mobile', 'Optional Number', 'trim|max_length[15]');

        if ($this->input->post('password') != '') {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]');
        }

        if ($this->form_validation->run() == false) {
            $data['errors'] = $this->form_validation->get_error_array();
            $this->set_template('my');
            $this->view('my_account/profile', $data);
        } else {
            $save['id'] = $id;
            $save['name'] = $this->input->post('name');
            $save['email'] = $this->input->post('email');
            $save['phone'] = $this->input->post('phone');
            $save['mobile'] = $this->input->post('mobile');

            if ($this->input->post('password') != '') {
                $save['password'] = sha1($this->input->post('password'));
            }

            // $remember   = $this->input->post('remember');
            $id = $this->Common_model->save_tbl('users', $save);
            $this->session->set_flashdata('message', 'Profile has been successfully updated');
            redirect('secure/my_profile');
        }
    }

    function my_companies()
    {
        $this->load->model('Company_model');
        $this->Customer_model->is_logged_in(true);
        $data['page_title'] = 'Companies Viewed';

        $data['perpage'] = $arr['perpage'] = 50;
        $data['cpage'] = $arr['page'] = $this->input->get('page') > 0 ? ($this->input->get('page') - 1) * $arr['perpage'] : 0;
        $arr['order_by'] = 'id DESC';
        $arr['where'] = $arr2['where'] = array('user_id' => $this->user['id']);
        $data['c_resumes'] = $this->Common_model->get_tbl_list('company_resume', $arr);
        // echo $this->db->last_query(); exit;
        $arr2['count'] = true;
        $data['total_rows'] = $this->Common_model->get_tbl_list('company_resume', $arr2);

        $this->set_template('my');
        $this->view('my_account/my_companies', $data);
    }

    function resume_format()
    {
        $this->Customer_model->is_logged_in(true);
        $data['page_title'] = 'Profile';
        $id = $this->user['id'];
        $this->set_template('my');
        $this->view('my_account/resume_format', $data);
    }

    function create_resume()
    {
        $this->load->helper('form');
        $this->Customer_model->is_logged_in(true);
        $data['page_title'] = 'Profile';
        $id = $this->user['id'];
        $data['resume_clr'] = 1;

        $resume_clr = $this->input->get('clr');
        $clr = config_item('resume_clr');
        if (isset($clr[$resume_clr])) {
            $data['resume_clr'] = $clr[$resume_clr];
        }
        $data['cresume'] = true;
        $data['resume'] = (array)$this->Common_model->get_tbl_row('resume', array('user_id' => $id));
        if (empty($data['resume'])) {
            $data['resume'] = $this->Common_model->get_tbl_fields('resume');
        } else {
            $data['resume']['work_exp'] = json_decode($data['resume']['work_exp'], true);
            $data['resume']['education'] = json_decode($data['resume']['education'], true);
            $data['resume']['achievements'] = json_decode($data['resume']['achievements'], true);
            $data['resume']['awards'] = json_decode($data['resume']['awards'], true);
        }
        $data['color_id'] = $resume_clr;
        $data['industries'] = $this->Common_model->get_tbl_array('industry', 'id', 'name');
        // $clr = 'ssa';
        // print_a($data['resume'],true);
        $this->set_template('my');
        $this->view('my_account/create_resume', $data);
    }

    function resform($id = false)
    {
        //echo "hiihi resfpr"; exit;
        $this->load->helper('form');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|numeric|max_length[15]');
        $this->form_validation->set_rules('mobile', 'Alternate Phone Number', 'trim|numeric|max_length[15]');
        $this->form_validation->set_rules('industry', 'Industry', 'trim|numeric');
        $this->form_validation->set_rules('tot_experience', 'Total Years Of Experience', 'trim|numeric');
        $this->form_validation->set_rules('objectives', 'Objectives', 'trim|max_length[300]');
        $this->form_validation->set_rules('languages', 'Languages', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[300]');
        $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[30]');
        $this->form_validation->set_rules('state', 'State', 'trim|required|max_length[25]');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('passport_no', 'Passport Number', 'trim');
        $this->form_validation->set_rules('pincode', 'Pincode', 'trim|numeric|max_length[6]');
        $this->form_validation->set_rules('company_exp', 'Number of Companies you have worked', 'trim|numeric|max_length[1]');
        $this->form_validation->set_rules('skills', 'Skills', 'trim|max_length[500]');
        $this->form_validation->set_rules('expertise', 'Area of Expertise', 'trim|max_length[250]');
        $this->form_validation->set_rules('awards[]', 'Awards', 'trim');
        $this->form_validation->set_rules('achievements[]', 'Achievements', 'trim');
        $this->form_validation->set_rules('hobbies', 'Hobbies', 'trim');

        if (!empty($_POST['education']) && $_POST['edu_level'] > 0) {
            $edu = $_POST['edu_level'];
            // $edu = $_POST['education'];
            // foreach ($edu as $key=>$ed){
            for ($key = 1; $key <= $edu; $key++) {
                $this->form_validation->set_rules('education[' . $key . '][institute]', 'Institute ' . $key, 'trim|max_length[60]');
                $this->form_validation->set_rules('education[' . $key . '][degree]', 'Degree ' . $key, 'trim|max_length[60]');
                $this->form_validation->set_rules('education[' . $key . '][branch]', 'Branch ' . $key, 'trim|max_length[60]');
                $this->form_validation->set_rules('education[' . $key . '][edu_f_date]', 'Education - From Date ' . $key, 'trim|max_length[15]');
                $this->form_validation->set_rules('education[' . $key . '][edu_t_date]', 'Education - To Date ' . $key, 'trim|max_length[15]');
                $this->form_validation->set_rules('education[' . $key . '][p_description]', 'Description ' . $key, 'trim|max_length[250]');
            }
        }
        if (!empty($_POST['company_exp']) && $_POST['company_exp'] > 0) {
            $exp = $_POST['company_exp'] > 5 ? 5 : $_POST['company_exp'];
            for ($r = 1; $r <= $exp; $r++) {
                $this->form_validation->set_rules('work_exp[' . $r . '][job_title]', 'Job Title ' . $r, 'trim|required|max_length[70]');
                $this->form_validation->set_rules('work_exp[' . $r . '][company]', 'Company ' . $r, 'trim|required|max_length[50]');
                $this->form_validation->set_rules('work_exp[' . $r . '][exp_f_date]', 'Experience - From Date ' . $r, 'trim|required');
                $this->form_validation->set_rules('work_exp[' . $r . '][exp_t_date]', 'Experience - To Date ' . $r, 'trim');
                $this->form_validation->set_rules('work_exp[' . $r . '][w_description]', 'Description ' . $r, 'trim|max_length[250]');
            }
        } else {
            $this->form_validation->set_rules('cp_title', 'College Title', 'trim|required');
            $this->form_validation->set_rules('cp_description', 'College project description', 'trim|required');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->set_template('panel');
            $errors = array_reverse($this->form_validation->get_error_array());
            echo json_encode($errors);
        } else {
            // print_a($_POST,true);
            // $save['id'] = $id;
            $save['user_id'] = $this->user['id'];
            $save['name'] = $this->input->post('name');
            $save['email'] = $this->input->post('email');
            $save['phone'] = $this->input->post('phone');
            $save['mobile'] = $this->input->post('mobile');
            $save['tot_experience'] = $this->input->post('tot_experience');
            $save['industry_id'] = $this->input->post('industry');
            $save['objectives'] = $this->input->post('objectives');
            $save['languages'] = $this->input->post('languages');
            $save['address'] = $this->input->post('address');
            $save['city'] = $this->input->post('city');
            $save['state'] = $this->input->post('state');
            $save['gender'] = $this->input->post('gender') == 'Male' ? 1 : 2;
            $save['passport_no'] = $this->input->post('passport_no');
            $save['pincode'] = $this->input->post('pincode');
            $save['company_exp'] = $this->input->post('company_exp');
            $save['skills'] = $this->input->post('skills');
            $save['expertise'] = $this->input->post('expertise');
            $save['awards'] = json_encode($this->input->post('awards'));
            $save['achievements'] = json_encode($this->input->post('achievements'));
            $save['edu_level'] = $this->input->post('edu_level');
            $save['education'] = json_encode($this->input->post('education'));
            $save['work_exp'] = json_encode($this->input->post('work_exp'));
            $save['cp_title'] = $this->input->post('cp_title');
            $save['cp_description'] = $this->input->post('cp_description');
            $save['hobbies'] = $this->input->post('hobbies');

            $save['added_date'] = date('Y-m-d H:i:s');
            $save['color_id'] = $this->input->post('color_id');
            $save['res_color'] = $this->input->post('res_color');
            $save['status'] = 1;
            
           // print_r($save);
            
 // print_a($save,true);
            $id = $this->Common_model->save_tbl_res('resume', $save);
            $from = config_item('email');
//            $to ='yugesh.bweb@gmail.com';
            $to = $save['email'];
//                        $to ='periasamy.beyondweb@gmail.com';
            $template = 'general_mail';
            $mail_data['subject'] = config_item('company_name') . ' - Resume Uploaded Successfully';

            $mail_data['content'] = '<p>Dear candidate,</p><br/><p>Your resume has been uploaded to our portal.<br/>';

            $from_name = $this->config->item('company_name');
            $this->Email_model->send_email($from, $to, $template, $mail_data, $from_name, $cc = false, $bcc = false, $reply_to = false, $attached = false);
            $this->session->set_flashdata('message', 'Your profile has been saved successfully');
            echo json_encode(array('success_msg_redirect' => site_url('secure/resume_preview')));
        }
    }

    function resume_preview()
    {
        $this->Customer_model->is_logged_in(true);
        $data['page_title'] = 'Resume Perview';
        $data['boxview'] = true;
        $id = $this->user['id'];
        $data['resume'] = $this->Common_model->get_tbl_row('resume', array('user_id' => $id));
        if (empty($data['resume'])) {
            $this->session->set_flashdata('error', 'NO resume found');
            redirect('secure/my_account');
        }
        $data['work_exp'] = json_decode($data['resume']->work_exp, true);
        $data['education'] = json_decode($data['resume']->education, true);
        $data['achievements'] = json_decode($data['resume']->achievements, true);
        $data['awards'] = json_decode($data['resume']->awards, true);
        // print_a($data['resume'],true);
        $this->set_template('my');
        $this->view('my_account/resume_preview', $data);
    }

    function resume_preview_admin($id = false)
    {
        $this->auth->is_logged_in(uri_string());
        $data['page_title'] = 'Resume Perview';
        $data['boxview'] = true;
        $data['resume'] = $this->Common_model->get_tbl_row('resume', array('user_id' => $id));
        if (empty($data['resume'])) {
            $this->session->set_flashdata('error', 'NO resume found');
            show_404();
        }
        $data['adm_login'] = true;
        $data['work_exp'] = json_decode($data['resume']->work_exp, true);
        $data['education'] = json_decode($data['resume']->education, true);
        $data['achievements'] = json_decode($data['resume']->achievements, true);
        $data['awards'] = json_decode($data['resume']->awards, true);
        // print_a($data['resume'],true);
        $this->set_template('my');
        $this->view('my_account/resume_preview', $data);
    }

    function deactive_acc()
    {
        $this->Customer_model->is_logged_in(true);
        // print_a($this->user,true);
        $this->db->where('id', $this->user['id'])->update('users', array('status' => 0));
        $this->Customer_model->logout();
        redirect('secure/login');
    }

    function logout()
    {
        $this->Customer_model->logout();
        redirect('secure/login');
    }

    function payment()
    {
        if (!config_item('enable_payment')) {
            redirect(site_url('secure/my_account'));
        }
        $this->Customer_model->is_logged_in(true);
        $data['page_title'] = 'Payment';
        $id = $this->user['id'];
        $data['user_id'] = $this->user['id'];
        $user = $this->db->where('id', $id)->get('users')->row();

        if ($user) {
            if ($user->payment_status == 1 && (date('Y-m-d', strtotime($user->expiry_date)) > date('Y-m-d'))) {

                $this->session->set_flashdata('Message', 'User already paid for the subscription');
                redirect(site_url('secure/my_account'));
            }
        } else {
            $this->session->set_flashdata('error', 'User not found');
            redirect(site_url('secure/my_account'));
        }

        $this->set_template('my');
        $this->view('my_account/payment', $data);
    }

    function process_payment()
    {
        $this->load->library('Instamojo');
        $this->Customer_model->is_logged_in(true);
        $id = $this->user['id'];
        $data['user_id'] = $this->user['id'];
        $user = $this->db->where('id', $id)->get('users')->row();
//print_a($user,true);
        if ($user) {
            if ($user->payment_status == 1 && date('Y-m-d', strtotime($user->expiry_date)) < date('Y-m-d')) {
                //echo 'test1'; exit;
                $this->session->set_flashdata('Message', 'User already paid for the subscription');
                redirect(site_url('secure/my_account'));
            }
        } else {
            $this->session->set_flashdata('error', 'User not found');
            redirect(site_url('secure/my_account'));
        }
        $name = $user->name;
        $phno = $user->phone;
        $email = $user->email;
        $redirect_url = site_url('secure/payment_success');
        $amount = config_item('payment_amount');

        $payload = Array(
            'purpose' => 'UDYOG:REGISTER FEE',
            'amount' => $amount,
            'phone' => $phno,
            'buyer_name' => $name,
            'redirect_url' => $redirect_url,
            'webhook' => '',
            'send_email' => false,
            'send_sms' => false,
            'email' => $email,
            'allow_repeated_payments' => false
        );
//        $params = array('api_key'=>'test_a5fdd887d774606e963a75b2313','auth_token'=>'test_0864809c8940b721a8dc7a7e469');
        $this->load->library('Instamojo');
//        $api = new Instamojo\Instamojo('test_a5fdd887d774606e963a75b2313', 'test_0864809c8940b721a8dc7a7e469');
        try {
            $response = $this->instamojo->paymentRequestCreate($payload);
            redirect($response['longurl']);
        } catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
    }

    function payment_success()
    {
        $this->Customer_model->is_logged_in(true);
        $this->load->library('Instamojo');
        $payment_id = $this->input->get('payment_id');
        $payment_request_id = $this->input->get('payment_request_id');
        $response = $this->instamojo->paymentRequestPaymentStatus($payment_request_id, $payment_id);
        $data['page_title'] = 'Payment Details';
        $data['payment_status'] = $response['payment']['status'];

        if ($response['payment']['status'] === 'Credit') {
            $save = array();
            $save['order_number'] = $response['payment']['payment_id'];
            $save['status'] = $response['payment']['status'];
            $save['customer_id'] = $this->user['id'];
            $save['ordered_on'] = date('Y-m-d H:i:s', strtotime($response['created_at']));
            $save['total'] = $response['amount'];
            $save['payment_info'] = json_encode($response);
            $save['firstname'] = $response['payment']['buyer_name'];
            $save['phone'] = $response['payment']['buyer_phone'];
            $save['email'] = $response['payment']['buyer_email'];
//        print_a($save);
            $this->db->insert('orders', $save);
            $order_id = $this->db->insert_id();
            $sav = array();
            $sav['order_id'] = $order_id;
            $sav['payment_status'] = 1;
            $sav['payment_date'] = $save['ordered_on'];
            $sav['user_type'] = 1;
            $sav['searchable'] =1;
            $sav['expiry_date'] = date('Y-m-d', strtotime($save['ordered_on'] . " + 365 day"));
            $this->db->where('id', $this->user['id'])->update('users', $sav);

            $this->load->model('Email_model');
            /*Admin mail start*/
            $mail_data = array();
            $from = config_item('email');
//            $to ='yugesh.bweb@gmail.com';
            $to = $save['email'];
            $template = 'general_mail';
            $mail_data['subject'] = config_item('company_name') . ' - Payment Successful';
            /*$mail_data['content'] ='Name : '.$save['name']
                .'<br>Email : '.$save['email']
                .'<br>Contact Number : '.$save['phone'];*/

            $mail_data['content'] = 'Payment Amount Rs.'.config_item('payment_amount').' received for registration';

            $from_name = $this->config->item('company_name');
            $this->Email_model->send_email($from, $to, $template, $mail_data, $from_name, $cc = false, $bcc = false, $reply_to = false, $attached = false);
//        print_a($sav,true);
        }
        $this->payment_status($response['payment']['status']);
    }

    function payment_status($status)
    {
        $data['page_title'] = 'Payment Confirmation';
        $data['status'] = 'credit';

        $this->set_template('my');
        $this->view('my_account/payment_status', $data);
    }
    
    function forgot_password()
    {
        $redirect = $this->Customer_model->is_logged_in(false, false);
        //if they are logged in, we send them back to the dashboard by default, if they are not logging in
        if ($redirect) {
            redirect('secure/my_account/');
        }

        $data['page_title']	= 'Forgot Password';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Email', 'trim|required|max_length[128]|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('my_account/forgot_password',$data);
        }
        else
        {
            $success=$this->Customer_model->reset_password($this->input->post('username'));
            if($success)
            {
                $this->session->set_flashdata('message', 'Your password has been reset. Please check your email');
                redirect(site_url('secure/forgot_password'));
            }
            else
            {
                $this->session->set_flashdata('error','Account Not Found!');
                redirect(site_url('login/forgot_password'));
            }
        }
    }

}
