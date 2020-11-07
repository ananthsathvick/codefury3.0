<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Company extends Admin_Controller
{
    public $current_admin	= false;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
    }

    public function index($page=0)
    {
        $this->auth->check_privilege('Company_index', true);
        $data['page_title'] = 'Company';
        $arr['perpage']=100;
        $data['page'] = $arr['page'] =$page;
        $arr['order_by'] = 'id DESC';
        if ($this->input->get('term')!='') {
            $term = trim($this->input->get('term'),true);
            $arr2['like'] = $arr['like'] =  array('name'=>$term);
            $arr2['or_like'] = $arr['or_like'] =  array('phone'=>$term,'mobile'=>$term,'email'=>$term);
        }
        $data['company']		= $this->Common_model->get_tbl_list('company', $arr);
        /* echo $this->db->last_query(); exit; */
        $arr2['count'] = true;
        $this->load->library('pagination');
        $config = pagination_fn();
        $config['base_url'] = site_url(config_item('admin_folder').'/company/index/');
        $config['total_rows'] = $this->Common_model->get_tbl_list('company', $arr2);
        $config['per_page'] = $arr['perpage'];
        $this->pagination->initialize($config);

        //echo $this->db->last_query(); exit;
        $this->view(config_item('admin_folder').'/company', $data);
    }
    
    public function form($id=false)
    {
        $this->auth->check_privilege('Company_form', true);
        $data = $this->Common_model->get_tbl_fields('company');
        if ($id) {
            $data = (array) $this->Common_model->get_tbl_row('company', $id);
            if (empty($data)) {
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect(config_item('admin_folder').'/company');
            }
        }
//        print_a($data,true);
        $data['page_title'] = 'Company - Form';
        $this->load->library(array('form_validation'));
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[200]');
        $this->form_validation->set_message('is_unique', 'This {field} is already used');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]|check_field[company||email||id||' . $id . ']');
        $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|max_length[15]|check_field[company||phone||id||' . $id . ']');
        $this->form_validation->set_rules('mobile', 'Optional Number', 'trim|max_length[15]');
        $this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|max_length[150]');
        $this->form_validation->set_rules('desigination', 'Desigination', 'trim|max_length[150]');
        $this->form_validation->set_rules('url', 'URL', 'trim|valid_url');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');
        if ($this->input->post('password') != '' || $id== '' || $data['status']==0) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]');
        }

        if ($this->form_validation->run() == false) {
            $this->view(config_item('admin_folder').'/company_form', $data);
        } else {
            $save['id']       = $id;
            $save['name']       = $this->input->post('name');
            $save['email']       = $this->input->post('email');
            $save['phone']       = $this->input->post('phone');
            $save['mobile']       = $this->input->post('mobile');
            $save['contact_person']       = $this->input->post('contact_person');
            $save['desigination']       = $this->input->post('desigination');
            $save['url']       = $this->input->post('url');
            $save['status']       = $this->input->post('status');
            if ($this->input->post('password') != '') {
                $save['password'] = sha1($this->input->post('password'));
            }

            /*Upload*/
            $config['upload_path']		= 'uploads/company';
//            $config['allowed_types']	= "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
            $config['allowed_types']	= "gif|jpg|jpeg|png";
            $config['encrypt_name']		= true;
            $this->load->library('upload', $config);
            $uploaded	= $this->upload->do_upload('image');
            //print_a($this->upload->data());
            if ($uploaded) {
                if ($data['image'] != '') {
                    $file = 'uploads/company/'.$data['image'];
                    //delete the existing file if needed
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
                $image			= $this->upload->data();
                $save['image']	= $image['file_name'];
            }
//            else{
//                $data['error']	= $this->upload->display_errors();
//            }
            /* Upload*/
//            print_a($data,true);
            $this->Common_model->save_tbl('company', $save);
            if (!$id && $save['email']!='' || ($data['status']==0 && $save['status']==1)) {
                /*mail start*/
                $mail_data = array();
                $from = config_item('email');
//            $to ='yugesh.bweb@gmail.com';
                $to =$save['email'];
                $template = 'general_mail';
                $mail_data['subject'] = config_item('company_name').' - Employer Registration';
                $mail_data['content'] ='Thank you for register us and your account has been activate. Please click the following url to access your dashboard <br>'.site_url('employer/login/').'<br><br>Username : '.$save['email'];
                if ($save['status'] && $save['email']!='') {
                    $mail_data['content'] .='<br>Password : '.$this->input->post('password');
                }
                $from_name = $this->config->item('company_name');
                $this->Email_model->send_email($from, $to, $template, $mail_data, $from_name, $cc = false, $bcc = false, $reply_to = false, $attached = false);
                /*mail end*/
            }
            $this->session->set_flashdata('message', lang('message_saved'));
            redirect(config_item('admin_folder').'/company');
        }
    }

    public function delete($id, $img_f=false)
    {
        $this->auth->check_privilege('Company_delete', true);
        $this->Common_model->delete_tbl_id('company', $id);
        $this->session->set_flashdata('message', lang('message_delete_success'));
        redirect($this->config->item('admin_folder').'/company');
    }

    public function download_csv()
    {
        $this->auth->check_privilege('Company_download_csv', true);
        $values = $this->Common_model->get_tbl_list('company');
        header('Content-Type: "text/csv"');
        header('Content-Disposition: attachment; filename="Company.csv"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header("Content-Transfer-Encoding: binary");
        header('Pragma: public');

        echo "Name ,\t";
        echo "Contact Person ,\t";
        echo "Desigination ,\t";
        echo "Phone No ,\t";
        echo "Mobile No ,\t";
        echo "Email ,\t";
        echo "Status ,\t";
        echo "Date,\n";
        if (count($values) > 0) {
            foreach ($values as $value) {
                echo $value->name . ",\t";
                echo $value->contact_person . ",\t";
                echo $value->desigination . ",\t";
                echo $value->phone . ",\t";
                echo $value->mobile . ",\t";
                echo $value->email . ",\t";
                echo $value->status==1?"Active". ",\t":"Deactive" . ",\t";
                echo $value->added_date . ",\n";
            }
            die;
        }
        redirect(config_item('admin_folder') . '/company');
    }

    function resumes($page=0)
    {
        $this->auth->check_privilege('Company_resumes', true);
        $data['page_title'] = 'Company Resumes';
        $arr['perpage']=100;
        $data['page'] = $arr['page'] =$page;
        $arr['order_by'] = 'id DESC';        
        $arr['where']= $arr2['where'] = array('company_id'=>$this->input->get('cid'));
        $data['resumes']		= $this->Common_model->get_tbl_list('company_resume', $arr);
        /* echo $this->db->last_query(); exit; */
        $arr2['count'] = true;
        $this->load->library('pagination');
        $config = pagination_fn();
        $config['base_url'] = site_url(config_item('admin_folder').'/company/resumes/');
        $config['total_rows'] = $this->Common_model->get_tbl_list('company_resume', $arr2);
        $config['per_page'] = $arr['perpage'];
        $this->pagination->initialize($config);

        $data['viewed'] = $this->Common_model->get_tbl_list('company_resume', array('count'=>1,'where'=>array('company_id'=>$this->input->get('cid'),'view'=>1)));
        $data['downloaded'] = $this->Common_model->get_tbl_list('company_resume', array('count'=>1, 'where'=>array('company_id'=>$this->input->get('cid'),'download'=>1)));
       
        //echo $this->db->last_query(); exit;
        $this->view(config_item('admin_folder').'/company_resume', $data);
    }
}