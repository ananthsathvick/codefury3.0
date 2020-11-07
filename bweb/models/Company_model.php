<?php
Class Company_model extends CI_Model
{
    // var $CI;
    function __construct()
    {
        parent::__construct();

        // $this->CI =& get_instance();
        // $this->CI->load->database(); 
        // $this->CI->load->helper('url');
    }

    function is_logged_in($redirect = false, $default_redirect = 'employer/login/')
    {
        $customer = $this->session->userdata('company');
        if (!isset($customer['id']))
        {
            //check the cookie
            if(isset($_COOKIE['Bwebcompany']))
            {
                //the cookie is there, lets log the customer back in.
                $info = $this->aes256Decrypt(base64_decode($_COOKIE['Bwebcompany']));
                $cred = json_decode($info, true);

                if(is_array($cred))
                {
                    if( $this->login($cred['email'], $cred['password']) )
                    {
                        return $this->is_logged_in($redirect, $default_redirect);
                    }
                }
            }

            //this tells ecart where to go once logged in
            if ($redirect)
            {
                $this->session->set_flashdata('redirect', $redirect);
            }
            
            if ($default_redirect)
            {   
                redirect($default_redirect);
            }
            
            return false;
        }
        else
        {
            return true;
        }
    }

    function login($email, $password, $remember=false,$activation=false)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('status', 1);
        if(!$activation) {
            $this->db->where('password', sha1($password));
        }
        $this->db->limit(1);
        $result = $this->db->get('company')->row_array();
// echo $this->db->last_query(); exit;
        if (!empty($result))
        {   
            $customer = array();
            $customer['company'] = array();
            $customer['company']['id'] = $result['id'];
            $customer['company']['name'] = $result['name'];
            $customer['company']['contact_person'] = $result['contact_person'];
            $customer['company']['email'] = $result['email'];
            $customer['company']['phone'] = $result['phone'];
            if($remember)
            {
                $loginCred = json_encode(array('email'=>$email, 'password'=>$password));
                $loginCred = base64_encode($this->aes256Encrypt($loginCred));
                //remember the user for 6 months
                $this->generateCookie($loginCred, strtotime('+6 months'));
            }
            // put our customer in the cart
            $this->session->set_userdata($customer);
            // echo $this->db->last_query(); exit;
            return true;
        }
        else
        {
            return false;
        }
    }

    function logout()
    {
        $this->session->unset_userdata('company');
    }

    function save_cr($data,$type=1)
    {
        if($type==1){
            $save['view'] = 1;
            $save['view_on'] = date('Y-m-d H:i:s');
            } else {
                $save['download'] = 1;
                $save['download_on'] = date('Y-m-d H:i:s');  
            }
        $cr = $this->db->where('user_id',$data['user_id'])->where('company_id',$data['company_id'])->get('company_resume')->row();
        if(!empty($cr)){            
        $this->db->where('id',$cr->id)->update('company_resume',$save);
        } else {
        $save['resume_id'] = $data['resume_id'];
        $save['user_id'] = $data['user_id'];
        $save['company_id'] = $data['company_id'];
        $this->db->insert('company_resume',$save);
    }   
    }

    function rc_count($id,$t)
    {
        if($t==1){
            $this->db->where('view',1);
        } else {
            $this->db->where('download',1);
        }
        $this->db->where('company_id',$id);
       return $this->db->count_all_results('company_resume');
    }

    function rc_count_user($id,$t)
    {
        if($t==1){
            $this->db->where('view',1);
        } else {
            $this->db->where('download',1);
        }
        $this->db->where('user_id',$id);
       return $this->db->count_all_results('company_resume');
    }
    function reset_password($username)
    {
        $admin = $this->get_admin_by_email($username);
        $this->load->model('Email_model');
        if ($admin)
        {
            $this->load->helper('string');
            /*$this->load->library('email');*/

            $new_password       = random_string('alnum', 8);
            $admin1['id']  = $admin['id'];
            $admin1['password']  = sha1($new_password);
            $this->save($admin1);

            /*$config= get_email_config();
            $config['mailtype'] = 'html';
            $this->email->initialize($config);*/
            $template = 'general_mail';
            $from_name = $this->config->item('company_name');
            $from = config_item('email');
            $to = $admin['email'];
            $mail_data['subject'] = config_item('company_name').': Account Password Reset';
            $mail_data['content'] = 'Greetings from Code Headed.<br/> Your account password has be reset to '.$new_password .' as requested. After login you can change your password at the profile page.' ;

            /*$this->email->message('Your password has been reset to '. $new_password .'.');
            $this->email->send()*/;

            $this->Email_model->send_email($from, $to, $template, $mail_data, $from_name, $cc = false, $bcc = false, $reply_to = false, $attached = false);
            return true;
        }
        else
        {
            return false;
        }
    }

    /*
    This function gets the admin by their username address and returns the values in an array
    it is not intended to be called outside this class
    */
    private function get_admin_by_username($username)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->limit(1);
        $result = $this->db->get('company');
        $result = $result->row_array();

        if (sizeof($result) > 0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    private function get_admin_by_email($username)
    {
        $this->db->select('*');
        $this->db->where('email', $username);
        $this->db->limit(1);
        $result = $this->db->get('company');
        $result = $result->row_array();

        if (count(array($result)) > 0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    function save($admin)
    {
        if ($admin['id'])
        {
            $this->db->where('id', $admin['id']);
            $this->db->update('company', $admin);
        }
        else
        {
            $this->db->insert('company', $admin);
        }
    }
        
}