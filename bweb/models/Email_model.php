<?php

Class Email_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        //load the email package
        $this->load->add_package_path(APPPATH.'emailers/');
    }

    function send_email($from,$to,$template=false,$data=array(),$from_name=false,$cc=false,$bcc=false,$reply_to=false,$attached=false)
    {
        if(config_item('is_email')) 
        {
        $bcc = ($bcc) ? $bcc : 'jayaram.suresh@beyondweb.ind.in';

        $this->load->library('email');
        $config = get_email_config();
        $config['mailtype'] = 'html';

        $this->email->initialize($config);

        $message = ($template) ? $this->load->view($template, $data, true) : '';

        $this->email->from($from, $from_name);
        if ($reply_to) $this->email->reply_to($reply_to);
        $this->email->to($to);
        if ($cc) $this->email->cc($cc);
        $this->email->bcc($bcc);
        $this->email->subject($data['subject']);
        $this->email->message($message);
        if ($attached) $this->email->attach($attached);

        //Send mail
       if ($this->email->send()) {
           $this->email->clear();
           return true;
       } else {
//echo $this->email->print_debugger(); exit;
           $this->email->clear();
           return false;
       }
    }
        // $this->email->send();
		// echo $this->email->print_debugger(); exit;
    }
    function view_email($template=false,$data=array())
    {
        return $this->load->view($template,$data,true);
    }
}
