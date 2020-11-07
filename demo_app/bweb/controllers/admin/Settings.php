<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends Admin_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
    }

	function index()
	{
        $data['cod'] = $this->input->get('t',true)!='' ? $this->input->get('t',true) : 'website';
        $data['page_title'] = ucfirst($data['cod']).' - Settings';
        $w_where = array('where'=>array('code'=>$data['cod']),'order_by'=>'sequence ASC');
        $data['w_config']  = $this->Common_model->get_tbl_list('settings',$w_where);
        $data['themes'] = array();

        $this->load->library(array('form_validation'));
        $this->load->helper('form');
        $this->form_validation->set_rules('name', 'lang:company_name', 'trim');
        if ($this->form_validation->run() == FALSE)
        {
            $data['error'] = validation_errors();
            $this->view(config_item('admin_folder').'/settings', $data);
        }
        else
        {
            $this->session->set_flashdata('message', lang('config_updated_message'));
            //print_r($this->input->post()); exit;
            $this->load->library('upload');
            foreach ($data['w_config'] as $setting)
            {
                if ($setting->type=="file") {
                    $config['upload_path'] = 'uploads/site_images/';
                    $config['allowed_types']	= '*';
                    $config['encrypt_name'] = true;
                    $this->upload->initialize($config);
                    $uploaded = $this->upload->do_upload($setting->setting_key);
                    // if(!empty($setting->setting) || $setting->setting !='' || $setting->setting !=0){
                    if ($uploaded) {
                        if($setting->setting !='') {
                            $file = 'uploads/site_images/' . $setting->setting;
                            if (file_exists($file)) {
                                unlink($file);
                            }
                        }
                        $image			= $this->upload->data();
                        $save['setting']	= 'uploads/site_images/'.$image['file_name'];
                        $this->db->where('setting_key', $setting->setting_key);
                        $this->db->update('settings', $save);
                    }
//                    if (!$uploaded ) {
//                                print_r($this->upload->display_errors()); exit;
//                    }
                }
                else
                {
                    $save['setting']=$this->input->post($setting->setting_key);
                    $this->db->where('setting_key', $setting->setting_key);
                    $this->db->update('settings', $save);
//                    echo $this->db->last_query(); exit;
                }
            }
            $this->session->set_flashdata('message', lang('message_saved'));
            redirect(config_item('admin_folder').'/settings?t='.$data['cod']);
        }
	}

    function form($id=false)
    {
        $this->load->library(array('form_validation'));
        $this->load->helper(array('form','inflector','string'));

        $data = $this->Common_model->get_tbl_fields('settings');
        if($id) {
            $data = (array) $this->Common_model->get_tbl_row('settings', $id);
            if(empty($data)){
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect(config_item('admin_folder').'/settings');
            }
        }
        $data['w_config']  = $this->Common_model->get_tbl_list('settings',array('where'=>array('code'=>'website'),'order_by'=>'sequence ASC'));
        $data['seq_script']    = TRUE;
        $data['page_title'] = 'Settings - Form';

        $this->form_validation->set_rules('name', 'lang:name', 'trim|required');
        $this->form_validation->set_rules('type', 'lang:type', 'trim|required');
        $this->form_validation->set_rules('status', 'lang:status', 'trim|required|numeric');
        $this->form_validation->set_rules('sequence', 'lang:sequence', 'trim|numeric');
        $this->form_validation->set_rules('options', 'lang:options', 'trim');

        if ($this->form_validation->run() == FALSE)
        {
            $this->view(config_item('admin_folder').'/settings_form',$data);
        }
        else {
            $save['id'] = $id;
            $save['name'] = $this->input->post('name');
            $save['code'] = $this->input->post('code');
            $save['setting_key'] = underscore(strip_quotes(str_replace(",", "_", $this->input->post('name'))));
            // $save['setting'] = $this->input->post('setting');
            $save['type'] = $this->input->post('type');
            $save['status'] = $this->input->post('status');
            $save['sequence'] = $this->input->post('sequence');
            $save['options'] = $this->input->post('options');

            $this->Common_model->save_tbl('settings',$save);

            $this->session->set_flashdata('message', lang('message_saved'));
            redirect(config_item('admin_folder').'/settings?t='.$save['code']);
        }
    }

    function delete($id)
    {
        $this->Common_model->delete_tbl_id('settings',$id);
        $this->session->set_flashdata('message', lang('message_delete_success'));
        redirect($this->config->item('admin_folder').'/settings/form');
    }

    function privilege_form()
    {
        $this->load->library(array('form_validation'));
        $this->load->helper(array('form'));
        $data['page_title'] = 'Privileges Form';
        $this->load->library('controllerlist');
        $data['ctrl_list']      = $this->controllerlist->getControllers();

        foreach($data['ctrl_list'] as $crtl => $method)
        {
            $count_res            = $this->db->where('code', $crtl)->where('type', 'controller')->get('privilege')->row('id');
            if(empty($count_res)){
                $save['name']    = $crtl;
                $save['code']    = $crtl;
                $save['type']    = 'controller';
                $save['active']  = '1';
                $this->db->insert('privilege', $save);
                $id = $this->db->insert_id();
            } else {
                $id = $count_res;
            }
            foreach($method as $item)
            {
                $count_met            = $this->db->where('code', $item)->where('parent', $crtl)->where('type', 'method')->count_all_results('privilege');
                if($count_met<1) {
                    $save1['name'] = $item;
                    $save1['code'] = $item;
                    $save1['type'] = 'method';
                    $save1['active'] = '1';
                    $save1['parent_id'] = $id;
                    $save1['parent'] = $crtl;
                    $this->db->insert('privilege', $save1);
                }
            }
        }
        $data['privilege'] = $this->Common_model->get_tbl_tiered('privilege');
//        print_a($data['privilege'],true);
        $this->form_validation->set_rules('code[]', 'lang:name', 'trim');
        $this->form_validation->set_rules('name[]', 'lang:name', 'trim');
        if ($this->form_validation->run() == FALSE)
        {
            $this->view(config_item('admin_folder').'/privilege_form',$data);
        }
        else {
            $post_arr = $this->input->post();
//            print_a($post_arr,true);
            foreach($post_arr['code'] as $key=>$code){
                $save['name'] = $post_arr['name'][$key];
                $save['active'] = isset($post_arr['active'][$key]) ? 1:0;
//                print_a($code);
//                print_a($save,true);
                $this->db->where('id',$key)->update('privilege',$save);
            }
            $this->session->set_flashdata('message', lang('message_saved'));
            redirect(config_item('admin_folder').'/admin');
//            print_a($this->input->post());
        }
    }
}
