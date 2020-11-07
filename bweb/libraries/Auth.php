<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
    var $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->helper('url');
    }

    function is_logged_in($redirect = false, $default_redirect = true)
    {
        $admin = $this->CI->session->userdata('admin');
        if (!$admin)
        {
            //check the cookie
            if(isset($_COOKIE['LuvAdmin']))
            {
                //the cookie is there, lets log the customer back in.
                $info = $this->aes256Decrypt(base64_decode($_COOKIE['LuvAdmin']));
                $cred = json_decode($info, true);
                if(is_array($cred))
                {
                    if( $this->login_admin($cred['username'], $cred['password']) )
                    {
                        return $this->is_logged_in($redirect, $default_redirect);
                    }
                }
            }
            if ($redirect)
            {
                $this->CI->session->set_flashdata('redirect', $redirect);
            }

            if ($default_redirect)
            {

                redirect('admin/login');
                //redirect('login');
            }
            return false;
        }
        else
        {
           return true;
        }
    }

    function login_admin($username, $password, $remember=false)
    {
        // make sure the username doesn't go into the query as false or 0
        if(!$username)
        {
            return false;
        }
        $this->CI->db->select('*');
        $this->CI->db->where('username', $username);
        $this->CI->db->where('password',  sha1($password));
        $this->CI->db->limit(1);
        $result =  $this->CI->db->get('admin')->row_array();
//        if (sizeof($result) > 0)
        if (!empty($result) > 0)
        {
            $admin = array();
            $admin['admin'] = array();
            $admin['admin']['id'] = $result['id'];
            $admin['admin']['name'] = $result['name'];
            $admin['admin']['email'] = $result['email'];
            $admin['admin']['username'] = $result['username'];
            $admin['admin']['privilege'] = json_decode($result['privilege']);
            if(!is_array($admin['admin']['privilege'])){
                $admin['admin']['privilege']=array();
            }
            if($remember)
            {
                $loginCred = json_encode(array('username'=>$username, 'password'=>$password));
                $loginCred = base64_encode($this->aes256Encrypt($loginCred));
                //remember the user for 6 months
                $this->generateCookie($loginCred, strtotime('+6 months'));
            }
            $this->CI->session->set_userdata($admin);
            return true;
        }
        else
        {
            return false;
        }
    }

    function check_privilege($p,$redirect=false)
    {
        $usr =  $this->CI->session->userdata('admin');
        $user = $this->CI->db->select('privilege')->where('id', $usr['id'])->get('admin')->row_array();
        $user['privilege'] = json_decode($user['privilege']);
        // print_a($user,true);
        if(is_array($p) && count(array_intersect($p, $user['privilege']))>=1)
            {
                return true;
            }
            elseif(in_array($p,$user['privilege'])){
//                print_a($user); exit;
                return true;
            }
            else
            {
                if($redirect===true){
                    $this->CI->session->set_flashdata('error','You have no access!');
                    redirect(config_item('admin_folder'));
                } else if($redirect!==false){
                    $this->CI->session->set_flashdata('error','You have no access!');
                    redirect($redirect);
                }
                else
                {
                    return false;
                }
            }
        /*if(in_array($p,$user['privilege']))
        {
            if($redirect===true){
                redirect(config_item('admin_folder'));
            } else if($redirect!==false){
                redirect($redirect);
            }
            return true;
        }
        else {
            return false;
        }*/
    }

    function get_user($field=false)
    {
        $user =  $this->CI->session->userdata('admin');
        if(!empty($user)){
            if($field) {
                // If it's an array of values, then loop over each, to move down the customer array
                if(is_array($field)) {
                    $return = $user;
                    foreach($field as $v) {
                        if(isset($return[$v])) {
                            $return = $return[$v];
                        }
                    }
                    // ... to return the last requested value
                    return $return;
                    // ... otherwise, just return the requested value
                } elseif(isset($user[$field])) {
                    return $user[$field];
                } else{
                    return false;
                }
            }
            return $user;
        }
        else
        {
            return false;
        }

    }

    function logout()
    {
        $this->CI->session->unset_userdata('admin');
        //force expire the cookie
        $this->generateCookie('[]', time()-3600);
    }

    private function generateCookie($data, $expire)
    {
        setcookie('LuvAdmin', $data, $expire, '/', $_SERVER['HTTP_HOST']);
    }

    private function aes256Encrypt($data)
    {
        $key = config_item('encryption_key');
        $method='AES-256-CBC';
        if(32 !== strlen($key))
        {
            $key = hash('SHA256', $key, true);
        }
        $ivSize = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($ivSize);
        $encrypted = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);
        $encrypted = base64_encode($iv . $encrypted);
        return $encrypted;
    }

    private function aes256Decrypt($data) {
        $key = config_item('encryption_key');
        $method='AES-256-CBC';
        if(32 !== strlen($key))
        {
            $key = hash('SHA256', $key, true);
        }
        $data = base64_decode($data);
        $ivSize = openssl_cipher_iv_length($method);
        $iv = substr($data, 0, $ivSize);
        $data = openssl_decrypt(substr($data, $ivSize), $method, $key, OPENSSL_RAW_DATA, $iv);
        return $data;
    }
    
    function reset_password($username)
    {
        $admin = $this->get_admin_by_email($username);
        $this->CI->load->model('Email_model');
        if ($admin)
        {
            $this->CI->load->helper('string');
            /*$this->CI->load->library('email');*/

            $new_password       = random_string('alnum', 8);
            $admin1['id']  = $admin['id'];
            $admin1['password']  = sha1($new_password);
            $this->save($admin1);

            /*$config= get_email_config();
            $config['mailtype'] = 'html';
            $this->CI->email->initialize($config);*/
            $template = 'general_mail';
            $from_name = $this->CI->config->item('company_name');
            $from = config_item('email');
            $to = $admin['email'];
            $mail_data['subject'] = config_item('company_name').': Admin Password Reset';
            $mail_data['content'] = 'Greetings from Code Headed.<br/> Your administrator account password has be reset to '.$new_password .' as requested. After login you can change your password at the profile page.' ;

            /*$this->CI->email->message('Your password has been reset to '. $new_password .'.');
            $this->CI->email->send()*/;

            $this->CI->Email_model->send_email($from, $to, $template, $mail_data, $from_name, $cc = false, $bcc = false, $reply_to = false, $attached = false);
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
        $this->CI->db->select('*');
        $this->CI->db->where('username', $username);
        $this->CI->db->limit(1);
        $result = $this->CI->db->get('admin');
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
        $this->CI->db->select('*');
        $this->CI->db->where('email', $username);
        $this->CI->db->limit(1);
        $result = $this->CI->db->get('admin');
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
            $this->CI->db->where('id', $admin['id']);
            $this->CI->db->update('admin', $admin);
        }
        else
        {
            $this->CI->db->insert('admin', $admin);
        }
    }
}
