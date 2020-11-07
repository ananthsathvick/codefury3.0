<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Reports extends Admin_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->model('Common_model');
			$this->load->library(array('auth', 'form_validation'));
			$this->load->helper('form');


		}
		
		function google_analytics()
		{

            $this->auth->check_privilege(array('Reports_google_analytics'),true);

			$data['page_title'] = 'Google Analytics';
			$tid                = config_item('ga_view_id');
//			print_a($tid,true);
//			$tid                = 107119505;
			$this->load->library('analytics/GoogleAnalytics');
			$this->googleanalytics->get_ga($tid, array('country'), array('sessions', 'percentNewSessions', 'users', 'newUsers', 'sessionDuration', 'avgSessionDuration', 'bounceRate'));
			$data['country_session']      = $this->googleanalytics->ga->getResults();
			$data['tot_session']          = $this->googleanalytics->ga->getsessions();
			$data['tot_new_sessions']     = $this->googleanalytics->ga->getnewUsers();
			$data['percent_new_session']  = $this->googleanalytics->ga->getpercentNewSessions();
			$data['tot_users']            = $this->googleanalytics->ga->getUsers();
			$data['session_duration']     = $this->googleanalytics->ga->getsessionDuration();
			$data['avg_session_duration'] = $this->googleanalytics->ga->getavgSessionDuration();
			$data['bounce_rate']          = $this->googleanalytics->ga->getbounceRate();
			$this->googleanalytics->get_ga($tid, array('browser'), array('pageviews', 'visits'));
			$data['browser_pv_v']  = $this->googleanalytics->ga->getResults();
			$data['tot_pageviews'] = $this->googleanalytics->ga->getPageviews();
			$data['tot_visits']    = $this->googleanalytics->ga->getVisits();
			$this->googleanalytics->get_ga($tid, array('date'), array('users', 'sessions', 'pageviews'), 'date', NULL, date('Y-m-d', strtotime('-30 days')), date('Y-m-d'));
			$data['days_user'] = $this->googleanalytics->ga->getResults();
			// print_a($data,true);
			$this->view($this->config->item('admin_folder') . '/google_analytics', $data);
		}

		function orders()
        {
            $data['page_title'] = 'Orders';
            $this->load->library('datatables');
            $data['ajax_tables'] = TRUE;
            $this->datatables->select('order_number,firstname, status,ordered_on,phone,email,total')->from('orders');
            $this->datatables->datatable('orders')->style(array('class' => 'table table-striped table-bordered'));
            $this->datatables->datatable('orders')->column('Order Number', 'order_number')->column('Status','status')->column('Amount','total')->column('Ordered By','firstname')->column('Email','email')->column('phone','phone')->column('Ordered On','ordered_on');
            $this->datatables->datatable('orders')->set_options('order', '[[ 6, "desc" ]]');
            $this->datatables->init();
            $this->view(config_item('admin_folder').'/orders',$data);

        }
	}
