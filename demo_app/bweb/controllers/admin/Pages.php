<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pages extends Admin_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->model('Common_model');
            $this->load->library(array('auth', 'form_validation'));
            $this->load->helper('form');
        }

        public function index()
        {
            $this->auth->check_privilege(array('Pages_index'),true);

            $data['page_title'] = 'Pages';
            $data['seq_script'] = TRUE;
            $w_where            = array('order_by' => 'sequence ASC');
            $data['pages']      = $this->Common_model->get_tbl_tiered('pages', $w_where);
//echo $this->db->last_query(); exit;
            $this->view(config_item('admin_folder') . '/pages', $data);
        }

        function form($id = FALSE)
        {
            $this->auth->check_privilege(array('Pages_form'),true);

            $data = $this->Common_model->get_tbl_fields('pages');
            if($id)
            {
                $data                = (array)$this->Common_model->get_tbl_row('pages', $id);
                $data['display_in']  = json_decode($data['display_in']);
                $data['category_opts']  = json_decode($data['category_opts']);
                /*print_a($data,true);*/
                if(empty($data))
                {
                    $this->session->set_flashdata('error', lang('error_not_found'));
                    redirect(config_item('admin_folder') . '/pages');
                }
            } else
            {
                $data['sequence'] = $this->Common_model->get_next_sequence('pages');
            }
//        print_a($data['sequence'],true);
            $w_where            = array('order_by' => 'sequence ASC');
            $data['pages']      = $this->Common_model->get_tbl_tiered('pages', $w_where);
            $data['page_title'] = 'Pages - Form';
            $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]|max_length[200]');
            $this->form_validation->set_rules('menu_title', 'Menu Title', 'trim');
            $this->form_validation->set_rules('template', 'Template', 'trim');
            $this->form_validation->set_rules('parent_id', 'Parent', 'trim|numeric');
            $this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');
            $this->form_validation->set_rules('sequence', 'Sequence', 'trim|numeric');
            $this->form_validation->set_rules('display_in', 'Display in', 'trim');
//        $this->form_validation->set_rules('new_window', 'New Window', 'trim|numeric');
//        $this->form_validation->set_rules('description', 'Description', 'trim');
            $this->form_validation->set_rules('seo_title', 'SEO Title', 'trim');
            $this->form_validation->set_rules('slug', 'Slug', 'trim');
            $this->form_validation->set_rules('meta', 'Meta Tags', 'trim');
            $this->form_validation->set_rules('duration', 'Duration', 'trim');
            $this->form_validation->set_rules('tags', 'Tags', 'trim');
            if($this->form_validation->run() == FALSE)
            {
                $this->view(config_item('admin_folder') . '/page_form', $data);
            } else
            {
                $this->load->helper('text');
                //first check the slug field
                $slug = $this->input->post('slug');
                $slug = $this->input->post('slug');
                if($this->input->post('template')=="url_page"){
                    $save['slug'] =$slug;
                } else {
                //if it's empty assign the name field
                if(empty($slug) || $slug == '')
                {
                    $slug = $this->input->post('title');
                }
                $slug = url_title(convert_accented_characters($slug), 'dash', TRUE);
                //validate the slug
                $this->load->model('Routes_model');
                if($id)
                {
                    $save['slug'] = $this->Routes_model->validate_slug('pages', $slug, $id);
                } else
                {
                    $save['slug'] = $this->Routes_model->validate_slug('pages', $slug);
                }
            }
                $save['id']               = $id;
                $save['title']            = $this->input->post('title');
                $save['template']         = $this->input->post('template');
                $save['type']             = $this->input->post('type');
                $save['parent_id']        = $this->input->post('parent_id');
                $save['status']           = $this->input->post('status');
                $save['sequence']         = $this->input->post('sequence');
                $save['display_in']       = json_encode($this->input->post('display_in'));
                //$save['category_opts']       = json_encode($this->input->post('category_opts'));
                $save['seo_title']   = ($this->input->post('seo_title') == '') ? $this->input->post('title') : $this->input->post('seo_title');
                $save['meta']        = $this->input->post('meta');
                //$save['duration']        = $this->input->post('duration');
                $save['tags']        = $this->input->post('tags');
                $save['excerpt']        = $this->input->post('excerpt');
                /*Upload*/
                $config['upload_path']   = 'uploads/page_contents';
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['encrypt_name']  = TRUE;
                $this->load->library('upload', $config);
                $uploaded = $this->upload->do_upload('image');
                if($uploaded)
                {
                    if($data['icon'] != '')
                    {
                        $file = 'uploads/page_contents/' . $data['image'];
                        //delete the existing file if needed
                        if(file_exists($file))
                        {
                            unlink($file);
                        }
                    }
                    $image                          = $this->upload->data();
                    $save['image'] = $image['file_name'];
                }
                /*Upload*/
                $uploaded = $this->upload->do_upload('icon');
                if($uploaded)
                {
                    if($data['icon'] != '')
                    {
                        $file = 'uploads/page_contents/' . $data['icon'];
                        //delete the existing file if needed
                        if(file_exists($file))
                        {
                            unlink($file);
                        }
                    }
                    $image                          = $this->upload->data();
                    $save['icon'] = $image['file_name'];
                }
                $this->Common_model->save_tbl('pages', $save);
                $this->session->set_flashdata('message', lang('message_saved'));
                redirect(config_item('admin_folder') . '/pages');
            }
        }

        function delete($id)
        {
            $this->auth->check_privilege(array('Pages_delete'),true);
            //delete the user
            $this->load->model('Page_model');
            $this->Page_model->delete($id);
            $this->session->set_flashdata('message', lang('message_delete_success'));
            redirect($this->config->item('admin_folder') . '/pages');
        }

        function delete_image($id)
        {
            $this->auth->check_privilege(array('Pages_delete_image'),true);

            $this->Common_model->delete_image('pages', $id, 'image');
            redirect($this->config->item('admin_folder') . '/pages/form/' . $id);
        }

        function delete_icon($id)
        {
            $this->auth->check_privilege(array('Pages_delete_icon'),true);

            $this->Common_model->delete_image('pages', $id, 'icon');
            redirect($this->config->item('admin_folder') . '/pages/form/' . $id);
        }

        function page_contents($tbl_id)
        {
            $this->auth->check_privilege(array('Pages_page_contents'),true);
            $data['seq_script']    = TRUE;
            $w_where               = array('order_by' => 'sequence ASC', 'where' => array('tbl_id' => $tbl_id));
            $data['page_contents'] = $this->Common_model->get_tbl_list('page_contents', $w_where);
            $data['tblid']         = $tbl_id;
            $data['tbl_content']   = $this->Common_model->get_tbl_row('pages', $tbl_id, 'title,template');
            //print_a($data,true);
            $data['page_title'] = 'Page Contents - ' . $data['tbl_content']->title;
            $this->view(config_item('admin_folder') . '/page_contents', $data);
        }

        function pc_form($tbl_id, $id = FALSE)
        {
            $this->load->helper('text');
            $this->auth->check_privilege(array('Pages_pc_form'),true);
            $data           = $this->Common_model->get_tbl_fields('page_contents');
            $data['tbl_id'] = $tbl_id;
            if($id)
            {
                $data             = (array)$this->Common_model->get_tbl_row('page_contents', $id);
                $data['contents'] = ($data['contents'] != '') ? json_decode($data['contents']) : '';
                if(empty($data))
                {
                    $this->session->set_flashdata('error', lang('error_not_found'));
                    redirect(config_item('admin_folder') . '/pages/page_contents/' . $tbl_id);
                }
            } else
            {
                $data['sequence'] = $this->Common_model->get_next_sequence('page_contents', array('tbl_id' => $tbl_id));
            }
            $data['tbl_content'] = $this->Common_model->get_tbl_row('pages', $tbl_id, 'title,template,tags');
    //    print_a($data,true);
            $data['page_title'] = 'Page Content Form - ' . $data['tbl_content']->title;
            $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]|max_length[200]');
            $this->form_validation->set_rules('section', 'Section', 'trim|required');
            $this->form_validation->set_rules('sequence', 'Sequence', 'trim|numeric');
            $this->form_validation->set_rules('description', 'Description', 'trim');
            $this->form_validation->set_rules('content_type', 'Description Type', 'trim');
            if($this->form_validation->run() == FALSE)
            {
                $this->view(config_item('admin_folder') . '/pc_form', $data);
            } else
            {
//            print_a($_POST);
//            print_a($this->input->post('contents[]'),true);
                $save['id']          = $id;
               // $save['tbl']         = $data['tbl'];
                $save['tbl_id']      = $data['tbl_id'];
                $save['title']       = $this->input->post('title');
                $save['section']     = $this->input->post('section');
                $save['sequence']    = $this->input->post('sequence');
                $save['content_type'] = $this->input->post('content_type');
                $save['description'] = $this->input->post('description');
                $save['tags'] = $this->input->post('tags');
                $save['contents']    = json_encode($this->input->post('contents[]'));
                /*Upload*/
                $config['upload_path'] = 'uploads/page_contents';
//            $config['allowed_types']	= "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
                $config['allowed_types'] = "gif|jpg|jpeg|png|webp";
                $config['encrypt_name']  = TRUE;
                $this->load->library('upload', $config);
                $uploaded = $this->upload->do_upload('image');
                if($uploaded)
                {
                    if($data['image'] != '')
                    {
                        $file = 'uploads/page_contents/' . $data['image'];
                        //delete the existing file if needed
                        if(file_exists($file))
                        {
                            unlink($file);
                        }
                    }
                    $image         = $this->upload->data();
                    $save['image'] = $image['file_name'];
                }
                /*else{
                    $data['error']	= $this->upload->display_errors();
                    print_a( $data['error'],true);
                }*/
                /* Upload*/
//            print_a($data,true);
                $this->Common_model->save_tbl('page_contents', $save);
                $this->session->set_flashdata('message', lang('message_saved'));
                redirect(config_item('admin_folder') . '/pages/page_contents/' . $tbl_id);
            }
        }

        function pc_delete($id)
        {
            $this->auth->check_privilege(array('Pages_pc_delete'),true);
            $this->load->library('user_agent');
            //delete the user
            $this->Common_model->delete_tbl_id('page_contents', $id);
            $this->session->set_flashdata('message', lang('message_delete_success'));
//        echo $this->agent->referrer(); exit;
            redirect($this->agent->referrer());
        }

        function related_pages($id=false)
        {
            $this->load->model('Page_model');
            $data['related_cats'] = array();
            $related_cats = $this->Common_model->get_tbl_row('pages',$id,'title,related_pages');
            if($related_cats->related_pages!='') {
                $data['related_cats'] = json_decode($related_cats->related_pages);
            }
            $data['related']      = $this->Page_model->get_related_cats($id,'id,title');
            $data['page_title'] = 'Related Pages - '.$related_cats->title;
            $this->form_validation->set_rules('related[]','Related Products','trim');
            if($this->form_validation->run()==false) {
                $this->view(config_item('admin_folder') . '/related_pages', $data);
//            print_a($data['related_cats']);
            }
            else{
                $save['id'] = $id;
                $save['related_pages'] = json_encode($this->input->post('related'));
                $this->Common_model->save_tbl('pages',$save);
                redirect(config_item('admin_folder').'/pages');
            }
        }

        function common_pc()
        {
            $this->auth->check_privilege(array('Pages_common_pc'),true);
            $data['seq_script']    = TRUE;
            $w_where               = array('order_by' => 'sequence ASC');
            $data['page_contents'] = $this->Common_model->get_tbl_list('common_pc', $w_where);            
            //print_a($data,true);
            $data['page_title'] = 'Page Contents';
            $this->view(config_item('admin_folder') . '/common_pc', $data);
        }

        function common_pc_form($id = FALSE)
        {
            $this->load->helper('text');
            $this->auth->check_privilege(array('Pages_common_pc_form'),true);
            $data           = $this->Common_model->get_tbl_fields('common_pc');           
            if($id)
            {
                $data             = (array)$this->Common_model->get_tbl_row('common_pc', $id);
                $data['templates']  = json_decode($data['templates']);
                $data['contents'] = ($data['contents'] != '') ? json_decode($data['contents']) : '';
                if(empty($data))
                {
                    $this->session->set_flashdata('error', lang('error_not_found'));
                    redirect(config_item('admin_folder') . '/pages/common_pc/' . $id);
                }
            } else
            {
                $data['sequence'] = $this->Common_model->get_next_sequence('common_pc', array('id' => $id));
            }
            // $data['tbl_content'] = $this->Common_model->get_tbl_row('common_pc', $id, 'title,templates');
//        print_a($data,true);
            $data['page_title'] = 'Page Content Form';
            $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]|max_length[200]');
            $this->form_validation->set_rules('section', 'Section', 'trim|required');
            $this->form_validation->set_rules('sequence', 'Sequence', 'trim|numeric');
            $this->form_validation->set_rules('description', 'Description', 'trim');
            $this->form_validation->set_rules('content_type', 'Description Type', 'trim');
            if($this->form_validation->run() == FALSE)
            {
                $this->view(config_item('admin_folder') . '/common_pc_form', $data);
            } else
            {
//            print_a($_POST);
//            print_a($this->input->post('contents[]'),true);
                $save['id']          = $id;
                $save['templates']       = json_encode($this->input->post('templates'));
                $save['title']       = $this->input->post('title');
                $save['section']     = $this->input->post('section');
                $save['sequence']    = $this->input->post('sequence');
                $save['content_type'] = $this->input->post('content_type');
                $save['description'] = $this->input->post('description');
                $save['contents']    = json_encode(array_filter($this->input->post('contents[]')));
                /*Upload*/
                $config['upload_path'] = 'uploads/page_contents';
//            $config['allowed_types']	= "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
                $config['allowed_types'] = "gif|jpg|jpeg|png|webp";
                $config['encrypt_name']  = TRUE;
                $this->load->library('upload', $config);
                $uploaded = $this->upload->do_upload('image');
                if($uploaded)
                {
                    if($data['image'] != '')
                    {
                        $file = 'uploads/page_contents/' . $data['image'];
                        //delete the existing file if needed
                        if(file_exists($file))
                        {
                            unlink($file);
                        }
                    }
                    $image         = $this->upload->data();
                    $save['image'] = $image['file_name'];
                }
                /*else{
                    $data['error']	= $this->upload->display_errors();
                    print_a( $data['error'],true);
                }*/
                /* Upload*/
//            print_a($data,true);
                $this->Common_model->save_tbl('common_pc', $save);
                $this->session->set_flashdata('message', lang('message_saved'));
                redirect(config_item('admin_folder') . '/pages/common_pc' );
            }
        }

        function common_pc_delete($id)
        {
            $this->auth->check_privilege(array('Pages_common_pc_delete'),true);
            $this->load->library('user_agent');
            //delete the user
            $this->Common_model->delete_tbl_id('common_pc_delete', $id);
            $this->session->set_flashdata('message', lang('message_delete_success'));
//        echo $this->agent->referrer(); exit;
            redirect($this->agent->referrer());
        }


    function industry($page=0)
    {
        $this->auth->check_privilege('Pages_industry',true);
        $data['page_title'] = 'Industry';
        $arr['perpage']=100;
        $data['page'] = $arr['page'] =$page;
        $arr['order_by'] = 'id DESC';        
        $data['industry']		= $this->Common_model->get_tbl_list('industry',$arr);

        $arr2['count'] = true;
        $this->load->library('pagination');
        $config = pagination_fn();
        $config['base_url'] = site_url(config_item('admin_folder').'/pages/industry/');
        $config['total_rows'] = $this->Common_model->get_tbl_list('industry',$arr2);
        $config['per_page'] = $arr['perpage'];
        $this->pagination->initialize($config);

        $this->view(config_item('admin_folder').'/industry',$data);
    }

    function industry_form($id=false)
    {
        $this->auth->check_privilege('Pages_industry_form',true);
        $data = $this->Common_model->get_tbl_fields('industry');
        if($id) {
            $data = (array)$this->Common_model->get_tbl_row('industry', $id);
            if(empty($data)){
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect(config_item('admin_folder').'pages/industry');
            }
        }
//        print_a($data,true);
        $data['page_title'] = 'Industry - Form';
        $this->load->library(array('form_validation'));
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[200]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE)
        {
            $this->view(config_item('admin_folder').'/industry_form',$data);
        }
        else 
        {
            $save['id']       = $id;
            $save['name']       = $this->input->post('name');
            $save['status']       = $this->input->post('status');

//            print_a($data,true);
            $this->Common_model->save_tbl('industry',$save);
            $this->session->set_flashdata('message', lang('message_saved'));
            redirect(config_item('admin_folder').'/pages/industry');
        }
    }  
    
    function delete_industry($id)
    {
        $this->auth->check_privilege('Pages_delete',true);
        //delete the user
        $this->Common_model->delete_tbl_id('industry',$id);
        $this->session->set_flashdata('message', lang('message_delete_success'));
        redirect($this->config->item('admin_folder').'/pages/industry');
    }


}
