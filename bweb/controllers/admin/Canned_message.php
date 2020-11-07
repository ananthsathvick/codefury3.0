<?php
/**
 * Created by PhpStorm.
 * User: bcs
 * Date: 2/4/2020
 * Time: 5:45 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Canned_message extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->library(array('auth','form_validation'));
        $this->load->helper('form');
        $this->lang->load('common');
    }

    function index()
    {
        $this->auth->check_privilege('Canned_message_index',true);

        $data['canned_messages'] = $this->Common_model->get_tbl_list('canned_messages');
        $data['page_title'] = lang('common_canned_messages');
        $this->view($this->config->item('admin_folder').'/canned_messages', $data);
    }

    function form($id=false)
    {
        $this->auth->check_privilege('Canned_message_form',true);

        $data = $this->Common_model->get_tbl_fields('canned_messages');
        $data['deletable']  = 1;
        if($id) {
            $data = (array) $this->Common_model->get_tbl_row('canned_messages', $id);
            if(empty($data)){
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect(config_item('admin_folder').'/canned_messages');
            }
        }
        $data['page_title'] = lang('canned_message_form');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('content', 'Description', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['errors'] = validation_errors();

            $this->view($this->config->item('admin_folder').'/canned_message_form', $data);
        }
        else
        {

            $save['id']         = $id;
            $save['name']       = $this->input->post('name');
            $save['subject']    = $this->input->post('subject');
            $save['content']    = $this->input->post('content');

            //all created messages are typed to order so admins can send them from the view order page.
            if($data['deletable'])
            {
                $save['type'] = 'order';
            }
            $this->Common_model->save_tbl('canned_messages',$save);

            $this->session->set_flashdata('message', lang('message_saved_message'));
            redirect($this->config->item('admin_folder').'/canned_message');
        }
    }

    function delete_message($id)
    {
        $this->auth->check_privilege('Canned_message_delete_message',true);

        //even though the link isn't displayed for an admin to delete themselves, if they try, this should stop them.
        if ($this->current_admin['id'] == $id)
        {
            $this->session->set_flashdata('message', lang('error_self_delete'));
            redirect($this->config->item('admin_folder').'/canned_message');
        }
        //delete the user
        $this->Common_model->delete_tbl_id('canned_messages',$id);
        $this->session->set_flashdata('message', lang('message_delete_success'));
        redirect($this->config->item('admin_folder').'/canned_message');

    }
}