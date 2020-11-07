<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends Admin_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library(array('auth'));
        $this->load->model('Common_model');
        $this->load->model('Report_model');
    }

	public function index()
	{
        $data['dashboard'] = TRUE;
	    $data['page_title'] = 'Dashboard';

        $data['total_enquires'] = $this->Report_model->count_enquires();
        $data['rec_drive'] = $this->Report_model->count_enquires(array('type'=>3));   
        $data['contact_enquires'] = $this->Report_model->count_enquires(array('type'=>2));

        $data['total_emp'] = $this->Report_model->count_emp();
        $data['total_users'] = $this->Report_model->count_users();
        $data['total_resumes'] = $this->Report_model->count_resumes();
        $data['newsletters'] = $this->Report_model->count_newsletters();
        $data['testimonials'] = $this->Report_model->count_testimonials();
        
       
       
        

        $data['enquires'] = $this->Common_model->get_tbl_list('enquires',array('perpage'=>10,'order_by'=>'added_date DESC'));

//        $q=array_fill(1, 12,0);
//        print_a($q); exit;
//	    print_a($data,true);
		$this->view(config_item('admin_folder').'/dashboard',$data);
	}

    function organize($tbl)
    {
        $data = $this->input->post('menus');
        $this->Common_model->organize($data,$tbl);
    }
   
}
