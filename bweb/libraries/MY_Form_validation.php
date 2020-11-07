<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
    public function __construct($rules = array())
    {
        // Pass the $rules to the parent constructor.
        parent::__construct($rules);
        // $this->CI is assigned in the parent constructor, no need to do it here.
    }

    public function check_field($str,$pram)
    {
        $arr = explode('||', $pram);
        $this->CI->db->limit(1);
        $this->CI->db->where($arr[1],$str);
        if(isset($arr[2]) && isset($arr[3]) && $arr[2]!='' && $arr[3] !='') {
            $this->CI->db->where($arr[2].' !=', $arr[3]);
        }
        $row = $this->CI->db->get($arr[0])->num_rows();
        /*echo $this->CI->db->last_query(); exit;*/
        if ($row >=1)
        {
            $this->CI->form_validation->set_message('check_field', 'The {field} already exists');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function get_error_array()
    {
        return $this->_error_array;
    }
}