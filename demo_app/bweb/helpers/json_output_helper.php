<?php
function json_output($statusHeader, $response)
{
    $ci =& get_instance();
    $ci->output->set_content_type('application/json');
    $ci->output->set_status_header($statusHeader);
    $ci->output->set_output(json_encode($response));
}

function send_api_mail($mail_type, $to, $to_name = false, $data=array(),$cc=false)
{
    $ci =& get_instance();
    $ci->load->model('Email_model');

    $id = 1;

    if ($mail_type == 'signup_template') {
        $id = 1;
    }
    if ($mail_type == 'otp_template') {
        $id = 3;
    }
    if($mail_type == 'agent_status')
    {
        $id = 6;
    }
    $res = $ci->db->where('id', $id)->get('canned_messages');
    $row = $res->row_array();

    // {site_name}
    $row['subject'] = str_replace('{site_name}', config_item('company_name'), $row['subject']);
    $row['content'] = str_replace('{site_name}', config_item('company_name'), $row['content']);
    if(!empty($data))
    {
        if(!empty($data['replace']))
        {
            foreach($data['replace'] as $key=>$val)
            {
                $row['subject'] = str_replace($key, $val, $row['subject']);
                $row['content'] = str_replace($key, $val, $row['content']);
            }
        }
       /* if ($mail_type == 'otp_template') {
            $row['content'] = str_replace('{otp}', $otp, $row['content']);
        }*/
    }



    $from_name = $ci->config->item('company_name');
    $from = config_item('email');

    $template = $row['template'];
    $mail_data['subject'] = $row['subject'];
    $mail_data['content'] = $row['content'];
    if ($to_name) {
        $mail_data['customer_name'] = $to_name;
    } else {
        $mail_data['customer_name'] = 'User';
    }

    return $ci->Email_model->send_email($from, $to, $template, $mail_data, $from_name, $cc , $bcc = 'vasudevan@beyondweb.ind.in', $reply_to = false, $attached = false);


}

function generatePassword($length, $strength)
{
    $vowels = 'aeuy';
    $consonants = 'bdghjmnpqrstvz';
    if ($strength & 1) {
        $consonants .= 'BDGHJLMNPQRSTVWXZ';
    }
    if ($strength & 2) {
        $vowels .= "AEUY";
    }
    if ($strength & 4) {
        $consonants .= '23456789';
    }
    if ($strength & 8) {
        $consonants .= '@#$%';
    }
    $password = '';
    $alt = time() % 2;
    for ($i = 0; $i < $length; $i++) {
        if ($alt == 1) {
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        } else {
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}

function generatePIN($digits = 4)
{
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while ($i < $digits) {
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}
