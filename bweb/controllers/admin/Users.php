<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends Admin_Controller {

    var $current_admin	= false;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
    }

	function index($page=0)
	{

        $this->auth->check_privilege('Users_index',true);
        $data['page_title'] = 'Users';
        $arr['perpage']=100;
        $data['page'] = $arr['page'] =$page;
        $arr['order_by'] = 'id DESC';
        if($this->input->get('term')!=''){
            /*$arr2['like'] = $arr['like'] =  array('name'=>trim($this->input->get('term',true)));
            $arr2['or_like'] = $arr['or_like'] =  array('phone'=>trim($this->input->get('term',true)),'mobile'=>trim($this->input->get('mobile',true)),'email'=>trim($this->input->get('term',true)));*/
            $arr2['where'] = $arr['where'] = array('user_type'=>trim($this->input->get('term',true)));
        }
        $data['users']		= $this->Common_model->get_tbl_list('users',$arr);
/* echo $this->db->last_query(); exit; */
        $arr2['count'] = true;
        $this->load->library('pagination');
        $config = pagination_fn();
        $config['base_url'] = site_url(config_item('admin_folder').'/users/index/');
        $config['total_rows'] = $this->Common_model->get_tbl_list('users',$arr2);
        $config['per_page'] = $arr['perpage'];
        $this->pagination->initialize($config);

//echo $this->db->last_query(); exit;
		$this->view(config_item('admin_folder').'/users',$data);
    }
    
    function form($id=false)
    {
        $this->auth->check_privilege('Users_form',true);
        $data = $this->Common_model->get_tbl_fields('users');
        if($id) {
            $data = (array) $this->Common_model->get_tbl_row('users', $id);
            if(empty($data)){
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect(config_item('admin_folder').'/users');
            }
        }
//        print_a($data,true);
        $data['page_title'] = 'Users - Form';
        $this->load->library(array('form_validation'));
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[200]');
        $this->form_validation->set_message('is_unique', 'This {field} is already used');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]|check_field[users||email||id||' . $id . ']');
        $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|max_length[15]|check_field[users||phone||id||' . $id . ']');
		$this->form_validation->set_rules('mobile', 'Optional Number', 'trim|max_length[15]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');
        if ($this->input->post('password') != '' || $id== '')
		{
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]');
		}

        if ($this->form_validation->run() == FALSE)
        {
            $this->view(config_item('admin_folder').'/user_form',$data);
        }
        else {
            $save['id']       = $id;
            $save['name']       = $this->input->post('name');
            $save['email']       = $this->input->post('email');
            $save['phone']       = $this->input->post('phone');
            $save['mobile']       = $this->input->post('mobile');
            $save['status']       = $this->input->post('status');
            $save['searchable'] = $this->input->post('searchable');
            if ($this->input->post('password') != ''){
                $save['password'] = sha1($this->input->post('password'));
            }

            /*Upload*/
            $config['upload_path']		= 'uploads/users';
//            $config['allowed_types']	= "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
            $config['allowed_types']	= "gif|jpg|jpeg|png";
            $config['encrypt_name']		= true;
            $this->load->library('upload', $config);
            $uploaded	= $this->upload->do_upload('image');
//print_a($this->upload->data());
            if($uploaded)
            {
                if($data['image'] != '')
                {
                    $file = 'uploads/users/'.$data['image'];
                    //delete the existing file if needed
                    if(file_exists($file))
                    {
                        unlink($file);
                    }
                }
                $image			= $this->upload->data();
                $save['image']	= $image['file_name'];
            }
//            else{
//                $data['error']	= $this->upload->display_errors();
//
//            }
            /* Upload*/
//            print_a($data,true);
            $this->Common_model->save_tbl('users',$save);
            $this->session->set_flashdata('message', lang('message_saved'));
            redirect(config_item('admin_folder').'/users');
        }
    }

    function delete($id,$img_f=false)
    {
        $this->auth->check_privilege('Users_delete',true);
        //delete the user
        $this->Common_model->delete_tbl_id('users',$id);
        $this->db->where('user_id',$id)->delete('resume');
        $this->session->set_flashdata('message', lang('message_delete_success'));
        redirect($this->config->item('admin_folder').'/users');
    }

    function download_csv()
    {
        $this->auth->check_privilege('Users_download_csv',true);
        $values = $this->Common_model->get_tbl_list('Users');
        header('Content-Type: "text/csv"');
        header('Content-Disposition: attachment; filename="Users.csv"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header("Content-Transfer-Encoding: binary");
        header('Pragma: public');

        echo "Name ,\t";
        echo "Phone No ,\t";
        echo "Mobile No ,\t";
        echo "Email ,\t";
        echo "Status ,\t";
        echo "Date,\n";
        if (count($values) > 0) {
            foreach ($values as $value) {
                echo $value->name . ",\t";
                echo $value->phone . ",\t";
                echo $value->mobile . ",\t";
                echo $value->email . ",\t";
                echo $value->status==1?"Active". ",\t":"Deactive" . ",\t";
                echo $value->added_date . ",\n";
            }
            die;
        }
        redirect(config_item('admin_folder') . '/users');
    }
    
}
