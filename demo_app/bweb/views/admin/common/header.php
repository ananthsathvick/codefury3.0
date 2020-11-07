<?php
defined('BASEPATH') OR exit('No direct script access allowed');?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title><?php echo $page_title; ?> - <?php echo config_item('company_name'); ?></title>
    <meta name="author" content="Beyondweb Pvt ltd"/>    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(config_item('fav_icon')); ?>">
    <link rel="icon" href="<?php echo base_url(config_item('fav_icon')); ?>" type="image/x-icon">
    <!-- Data table CSS --> <?php if (isset($ajax_tables)) { ?>
        <link rel="stylesheet" type="text/css"
              href="<?php echo base_url('assets/vendors/bower_components/tables/datatables.min.css') ?>">
        <link rel="stylesheet" type="text/css"
              href="<?php echo base_url('assets/vendors/bower_components/tables/buttons.dataTables.min.css') ?>">
        <link rel="stylesheet" type="text/css"
              href="<?php echo base_url('assets/vendors/bower_components/tables/buttons.bootstrap4.min.css') ?>">    <?php } ?>
    <!-- Toast CSS -->
    <link href="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css"
          rel="stylesheet" type="text/css">    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet"
          type="text/css"/>    <!-- Chartist CSS --><!--    <link href="-->
    <?php //echo base_url(); ?><!--assets/vendors/bower_components/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- vector map CSS --><!--    <link href="-->
    <?php //echo base_url(); ?><!--assets/vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css"/>-->
    <!-- bootstrap-tagsinput CSS -->
    <link href="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/vendors/bower_components/select2/dist/css/select2.min.css"
          rel="stylesheet" type="text/css"/>
    <?php if (isset($lead_form)) { ?><!--        <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--assets/vendors/bower_components/jquery.steps/demo/css/jquery.steps.css">--> <?php } ?>    <?php if (isset($report_page)) { ?>
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css"
              rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet"
              type="text/css"/>    <?php } ?> <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script> <?php if (isset($seq_script)) { ?>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    <?php } ?></head>
<body><!-- Preloader -->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div><!-- /Preloader --><?php $admin_url = site_url(config_item('admin_folder')); ?>
<div class="wrapper theme-2-active navbar-top-light">    <!-- Top Menu Items -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="nav-wrap">
            <div class="mobile-only-brand pull-left">
                <div class="nav-header pull-left">
                    <div class="logo-wrap"><a href="<?php echo site_url(); ?>"> <img class="brand-img"
                                                                                     src="<?php echo base_url(config_item('site_logo')); ?>"
                                                                                     alt="<?php echo config_item('company_name'); ?>"/>
                            <span class="brand-text"><img src="<?php echo base_url(config_item('site_logo')); ?>"
                                                          alt="<?php echo config_item('company_name'); ?>"/></span> </a>
                    </div>
                </div>
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left"
                   href="javascript:void(0);"><i class="ti-align-left"></i></a>
                <!--                <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>-->
                <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i
                            class="ti-more"></i></a>
                <!-- <form id="search_form" role="search" class="top-nav-search collapse pull-left">					 <div class="input-group">						 <input type="text" name="example-input1-group2" class="form-control" placeholder="Search">						 <span class="input-group-btn">							 <button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>							 </span>					 </div>				 </form>-->
            </div>
            <div id="mobile_only_nav"
                 class="mobile-only-nav pull-right">                <?php $quick_enq_cnt = $this->db->where('type', 1)->where('status', 0)->count_all_results('enquires');
                $contact_enq_cnt = $this->db->where('type', 2)->where('status', 0)->count_all_results('enquires');
                $page_enq_cnt = $this->db->where('type', 3)->where('status', 0)->count_all_results('enquires');
                $product_enq_cnt = $this->db->where('type', 4)->where('status', 0)->count_all_results('enquires'); ?>
                <ul class="nav navbar-right top-nav pull-right">
                    <li class="dropdown alert-drp"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="ti-bell top-nav-icon"></i><span
                                    class="top-nav-icon-badge"><?php echo $quick_enq_cnt + $contact_enq_cnt + $page_enq_cnt; ?></span></a>
                        <ul class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn"
                            data-dropdown-out="bounceOut">
                            <li>
                                <div class="notification-box-head-wrap"><span
                                            class="notification-box-head pull-left inline-block">notifications</span>
                                    <!--<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>-->
                                    <div class="clearfix"></div>
                                    <hr class="light-grey-hr ma-0"/>
                                </div>
                            </li>
                            <li>
                                <div class="streamline message-nicescroll-bar">                                    <?php if ($product_enq_cnt > 0) { ?>
                                        <div class="sl-item"><a
                                                    href="<?php echo site_url(config_item('admin_folder') . '/forms/enquires?t=4'); ?>">
                                                <div class="icon bg-yellow"><i class="ti-user"></i></div>
                                                <div class="sl-content"><span
                                                            class="inline-block capitalize-font  pull-left truncate head-notifications"><?php echo $product_enq_cnt; ?> Product enquiries</span>
                                                    <!--<span class="inline-block font-11  pull-right notifications-time">4pm</span>-->
                                                    <div class="clearfix"></div>
                                                    <p class="truncate">Product Eneuires</p></div>
                                            </a></div>
                                        <hr class="light-grey-hr ma-0"/>                                    <?php } ?>                                    <?php if ($contact_enq_cnt > 0) { ?>
                                        <div class="sl-item"><a
                                                    href="<?php echo site_url(config_item('admin_folder') . '/forms/enquires?t=2'); ?>">
                                                <div class="icon bg-blue"><i class="zmdi zmdi-email"></i></div>
                                                <div class="sl-content"><span
                                                            class="inline-block capitalize-font  pull-left truncate head-notifications"><?php echo $contact_enq_cnt; ?> new Contact enquiries</span>
                                                    <!--<span class="inline-block font-11  pull-right notifications-time">4pm</span>-->
                                                    <div class="clearfix"></div>
                                                    <p class="truncate"> List of Contact enquiries </p></div>
                                            </a></div>
                                        <hr class="light-grey-hr ma-0"/>                                    <?php }
                                    if ($page_enq_cnt > 0) { ?>
                                        <div class="sl-item"><a
                                                    href="<?php echo site_url(config_item('admin_folder') . '/forms/enquires?t=3'); ?>">
                                                <div class="icon bg-blue"><i class="zmdi zmdi-email"></i></div>
                                                <div class="sl-content"><span
                                                            class="inline-block capitalize-font  pull-left truncate head-notifications"><?php echo $page_enq_cnt; ?> new Page enquiries</span>
                                                    <!--<span class="inline-block font-11  pull-right notifications-time">4pm</span>-->
                                                    <div class="clearfix"></div>
                                                    <p class="truncate"> List of Page enquiries </p></div>
                                            </a></div>
                                        <hr class="light-grey-hr ma-0"/>                                    <?php } ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown auth-drp"><a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img
                                    src="<?php echo base_url(); ?>assets/img/avatar2.png" alt="user_auth"
                                    class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
                        <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX"
                            data-dropdown-out="flipOutX">
                            <li><a href="<?php echo site_url(); ?>" target="_blank"><i class="zmdi zmdi-card"></i><span>Frontend</span></a>
                            </li>
                            <li><a href="<?php echo $admin_url . '/admin'; ?>"><i class="zmdi zmdi-account"></i><span>Administrative</span></a>
                            </li>                           <!--                            <li>-->
                            <!--                                <a href="inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span></a>-->
                            <!--                            </li>-->
                            <li><a href="<?php echo $admin_url . '/settings'; ?>"><i
                                            class="zmdi zmdi-settings"></i><span>Settings</span></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo admin_url('login/logout'); ?>"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    <!-- /Top Menu Items -->    <!-- Left Sidebar Menu -->
    <div class="fixed-sidebar-left">
        <ul class="nav navbar-nav side-nav nicescroll-bar">
            <li class="navigation-header"><span>Main</span>
                <hr/>
            </li> <?php if ($this->auth->check_privilege('Dashboard_index')) { ?>
                <li><a class="active" href="<?php echo $admin_url; ?>">
                        <div class="pull-left"><i class="ti-dashboard mr-20"></i><span
                                    class="right-nav-text">Dashboard</span></div>
                        <div class="clearfix"></div>
                    </a></li>            <?php }
            if ($this->auth->check_privilege(array('Reports_google_analytics'))) { ?>                    <!-- <li>                        <a href="<?php //echo $admin_url . '/reports/google_analytics'; ?>">                            <div class="pull-left">                                <i class="ti-bar-chart mr-20"></i><span class="right-nav-text">Google Analytics</span></div>                            <div class="clearfix"></div>                        </a>                    </li> -->                <?php }
            if ($this->auth->check_privilege('Pages_index')) { ?>
                <li><a href="<?php echo $admin_url . '/pages'; ?>">
                        <div class="pull-left"><i class="ti-list mr-20"></i><span class="right-nav-text">Pages</span>
                        </div>
                        <div class="clearfix"></div>
                    </a></li>                <?php }
            if ($this->auth->check_privilege('Pages_industry')) { ?>
                <li><a href="<?php echo $admin_url . '/pages/industry'; ?>">
                        <div class="pull-left"><i class="ti-list mr-20"></i><span class="right-nav-text">Industry</span>
                        </div>
                        <div class="clearfix"></div>
                    </a></li>                <?php }
            if ($this->auth->check_privilege('Users_index')) { ?>
                <li><a href="<?php echo $admin_url . '/users'; ?>">
                        <div class="pull-left"><i class="ti-user mr-20"></i><span class="right-nav-text">Users</span>
                        </div>
                        <div class="clearfix"></div>
                    </a></li>                <?php }
            if ($this->auth->check_privilege('Company_index')) { ?>
                <li><a href="<?php echo $admin_url . '/company'; ?>">
                        <div class="pull-left"><i class="ti-alarm-clock mr-20"></i><span
                                    class="right-nav-text">Employer</span></div>
                        <div class="clearfix"></div>
                    </a></li>                <?php }
            if ($this->auth->check_privilege(array('Forms_index', 'Forms_testimonials', 'Forms_enquires', 'Forms_career'))) { ?>
                <li><a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr">
                        <div class="pull-left"><i class="ti-check-box  mr-20"></i><span
                                    class="right-nav-text">Forms</span></div>
                        <div class="pull-right"><i class="ti-angle-down "></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="ui_dr"
                        class="collapse collapse-level-1 two-col-list">                            <?php if ($this->auth->check_privilege('Forms_index')) { ?>
                            <li><a href="<?php echo $admin_url . '/forms'; ?>">Newsletters</a>
                            </li>                            <?php }
                        if ($this->auth->check_privilege('Forms_enquires')) { ?>
                            <li><a href="<?php echo $admin_url . '/forms/enquires'; ?>">Enquires</a>
                            </li>                            <?php }
                        if ($this->auth->check_privilege('Forms_testimonials')) { ?>
                            <li><a href="<?php echo $admin_url . '/forms/testimonials'; ?>">Testimonials</a>
                            </li>                            <?php } ?>
                    </ul>
                </li>                <?php } ?>
            <li class="navigation-header mt-20"><span>Administrative</span>
                <hr/>
            </li> <?php if ($this->auth->check_privilege('Admin_index')) { ?>
                <li><a href="<?php echo $admin_url . '/admin'; ?>">
                        <div class="pull-left"><i class="ti-shield mr-20"></i><span class="right-nav-text">Administrative</span>
                        </div>
                        <div class="clearfix"></div>
                    </a></li>
                <li><a href="<?php echo $admin_url . '/reports/orders'; ?>">
                        <div class="pull-left"><i class="ti-money mr-20"></i><span class="right-nav-text">Orders</span>
                        </div>
                        <div class="clearfix"></div>
                    </a></li>                <?php }
            if ($this->auth->check_privilege('Settings_index')) { ?>
                <li><a href="<?php echo $admin_url . '/settings'; ?>">
                        <div class="pull-left"><i class="ti-settings mr-20"></i><span
                                    class="right-nav-text">Settings</span></div>
                        <div class="clearfix"></div>
                    </a></li>                <?php }
            if ($this->auth->check_privilege('Settings_index')) { ?>
                <li><a href="<?php echo $admin_url . '/settings?t=email'; ?>">
                        <div class="pull-left"><i class="ti-email mr-20"></i><span
                                    class="right-nav-text">Email Settings</span></div>
                        <div class="clearfix"></div>
                    </a></li>                <?php }
            if ($this->auth->check_privilege('Settings_index')) { ?>
            <li><a href="<?php echo $admin_url . '/settings?t=sms'; ?>">
                    <div class="pull-left"><i class="ti-envelope mr-20"></i><span
                                class="right-nav-text">SMS Settings</span></div>
                    <div class="clearfix"></div>
                </a></li>
            <?php }            if ($this->auth->check_privilege('Canned_message_index')) { ?><!--            <li>--><!--                <a href="--><?php //echo $admin_url . '/canned_message'; ?><!--">--><!--                    <div class="pull-left">--><!--                        <i class="ti-email mr-20"></i><span class="right-nav-text">E-Mailers Templates</span></div>--><!--                    <div class="clearfix"></div>--><!--                </a>--><!--            </li>--> <?php } ?>
        </ul>
    </div>    <!-- /Left Sidebar Menu -->    <!-- Main Content -->
    <div class="page-wrapper">