<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forms extends Admin_Controller {

    var $current_admin	= false;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
    }

	function index($page=0)
	{

        $this->auth->check_privilege('Forms_index',true);
        $data['page_title'] = 'Newsletter Subscriptions';
        $arr['perpage']=100;
        $data['page'] = $arr['page'] =$page;
        $arr['order_by'] = 'id DESC';
        if($this->input->get('term')!=''){
            $arr2['like'] = $arr['like'] =  array('email'=>trim($this->input->get('term',true)));
        }
        $data['newsletters']		= $this->Common_model->get_tbl_list('newsletter',$arr);

        $arr2['count'] = true;
        $this->load->library('pagination');
        $config = pagination_fn();
        $config['base_url'] = site_url(config_item('admin_folder').'/forms/index/');
        $config['total_rows'] = $this->Common_model->get_tbl_list('newsletter',$arr2);
        $config['per_page'] = $arr['perpage'];
        $this->pagination->initialize($config);

//echo $this->db->last_query(); exit;
		$this->view(config_item('admin_folder').'/newsletter',$data);
	}

    function delete($tbl,$id,$img_f=false)
    {
        $this->auth->check_privilege('Forms_delete',true);
        $redirect = $this->input->get('redirect');
        //delete the user
        $this->Common_model->delete_tbl_id($tbl,$id,$img_f);
        $this->session->set_flashdata('message', lang('message_delete_success'));
        redirect($this->config->item('admin_folder').'/forms/'.$redirect);
    }

    function download_csv()
    {
        $this->auth->check_privilege('Forms_download_csv',true);
        $values = $this->Common_model->get_tbl_list('newsletter');
        header('Content-Type: "text/csv"');
        header('Content-Disposition: attachment; filename="Newsletter.csv"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header("Content-Transfer-Encoding: binary");
        header('Pragma: public');

        echo "Email ,\t";
        echo "Status ,\t";
        echo "Date,\n";
        if (count($values) > 0) {
            foreach ($values as $value) {
                echo $value->email . ",\t";
                echo $value->status==1?"Subscribed":"Un Subscribed" . ",\t";
                echo $value->added_date . ",\n";
            }
            die;
        }
        redirect(config_item('admin_folder') . '/forms');
    }

    function testimonials($page=0)
    {
        $this->auth->check_privilege('Forms_testimonials',true);
        $data['page_title'] = 'Testimonials';
        $arr['perpage']=100;
        $data['page'] = $arr['page'] =$page;
        $arr['order_by'] = 'id DESC';

        if($this->input->get('term')!=''){
            $arr2['like'] = $arr['like'] =  array('name'=>trim($this->input->get('term',true)));
            $arr2['or_like'] = $arr['or_like'] =  array('description'=>trim($this->input->get('term',true)));
            $arr2['or_like'] = $arr['or_like'] =  array('place'=>trim($this->input->get('term',true)));
            $arr2['or_like'] = $arr['or_like'] =  array('ratings'=>trim($this->input->get('term',true)));
        }
        $data['testimonials']		= $this->Common_model->get_tbl_list('testimonials',$arr);

        $arr2['count'] = true;
        $this->load->library('pagination');
        $config = pagination_fn();
        $config['base_url'] = site_url(config_item('admin_folder').'/forms/testimonials/');
        $config['total_rows'] = $this->Common_model->get_tbl_list('testimonials',$arr2);
        $config['per_page'] = $arr['perpage'];
        $this->pagination->initialize($config);

//echo $this->db->last_query(); exit;
        $this->view(config_item('admin_folder').'/testimonials',$data);
    }

    function testimonial_form($id=false)
    {
        $this->auth->check_privilege('Forms_testimonial_form',true);
        $data = $this->Common_model->get_tbl_fields('testimonials');
        if($id) {
            $data = (array) $this->Common_model->get_tbl_row('testimonials', $id);
            if(empty($data)){
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect(config_item('admin_folder').'/testimonials');
            }
        }
//        print_a($data,true);
        $data['page_title'] = 'Testimonials - Form';
        $this->load->library(array('form_validation'));
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[200]');
        $this->form_validation->set_rules('ratings', 'Ratings', 'trim|required|numeric');
        $this->form_validation->set_rules('place', 'Place', 'trim|max_length[100]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');
        $this->form_validation->set_rules('description', 'Description', 'trim');

        if ($this->form_validation->run() == FALSE)
        {
            $this->view(config_item('admin_folder').'/testimonials_form',$data);
        }
        else {
            $save['id']       = $id;
            $save['name']       = $this->input->post('name');
            $save['ratings']       = $this->input->post('ratings');
            $save['place']       = $this->input->post('place');
            $save['status']       = $this->input->post('status');
            $save['description']       = $this->input->post('description');

            /*Upload*/
            $config['upload_path']		= 'uploads/testimonials';
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
                    $file = 'uploads/testimonials/'.$data['image'];
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
            $this->Common_model->save_tbl('testimonials',$save);
            $this->session->set_flashdata('message', lang('message_saved'));
            redirect(config_item('admin_folder').'/forms/testimonials');
        }
    }

    function enquires($page=0)
    {
        $this->auth->check_privilege('Forms_enquires',true);
        if($this->input->get('t')!=''){
            $arr2['where'] = $arr['where'] =  array('type'=>trim($this->input->get('t',true)));
        }
        $this->load->helper('form');
        $data['page_title'] = 'Page Enquires';
        $arr['perpage']=100;
        $data['page'] = $arr['page'] =$page;
        $arr['order_by'] = 'status ASC, added_date DESC';

//        $arr2['where'] = $arr['where'] =  array('type'=>2);
        if($this->input->get('term')!=''){
            $arr2['like'] = $arr['like'] =  array('name'=>trim($this->input->get('term',true)));
            $arr2['or_like'] = $arr['or_like'] =  array('email'=>trim($this->input->get('term',true)));
        }
        $data['enquiries']		= $this->Common_model->get_tbl_list('enquires',$arr);
        $data['redirect'] = 'enquires';
        $arr2['count'] = true;
        $this->load->library('pagination');
        $config = pagination_fn();
        $config['base_url'] = site_url(config_item('admin_folder').'/forms/enquires/');
        $config['total_rows'] = $this->Common_model->get_tbl_list('enquires',$arr2);
        $config['per_page'] = $arr['perpage'];
        $this->pagination->initialize($config);

//echo $this->db->last_query(); exit;
        $this->view(config_item('admin_folder').'/enquires',$data);
    }

    function update_enquiry()
    {
        $save['id'] = $this->input->post('id');
        $save['status'] = $this->input->post('val');
        $this->Common_model->save_tbl('enquires',$save);
        echo 1;
    }

}
