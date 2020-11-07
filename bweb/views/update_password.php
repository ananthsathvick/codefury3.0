<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php echo $page_title; ?> - <?php echo config_item('company_name'); ?></title>
    <meta name="author" content="Beyondweb Pvt ltd"/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(config_item('fav_icon')); ?>">
    <link rel="icon" href="<?php echo base_url(config_item('fav_icon')); ?>" type="image/x-icon">

    <!-- vector map CSS -->
    <link href="<?php echo base_url('assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css">
</head>
<body>
<!--Preloader-->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!--/Preloader-->

<div class="wrapper  pa-0">
    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle ">
                    <div class="auth-form  ml-auto mr-auto no-float card-view pt-30 pb-30">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="sp-logo-wrap text-center pa-0 mb-30">
                                    <a href="<?php echo site_url(); ?>">
                                        <img class="brand-img" src="<?php echo base_url(config_item('site_logo')); ?>" alt="<?php echo config_item('company_name'); ?>"/>
                                        <span class="brand-text"><img  src="<?php echo base_url(config_item('site_logo')); ?>" alt="<?php echo config_item('company_name'); ?>"/></span>
                                    </a>
                                </div>
                                <div class="mb-30">
                                    <h3 class="text-center txt-dark mb-10">Update your new password</h3>
                                </div>
                                <?php $h_err = ($this->session->flashdata('error') || form_error('username') || form_error('login_type')) ? 'has-error':''; ?>
                                <div class="form-wrap">
                                    <form action="<?php echo site_url('login/update_password'); ?>" method="post">

                                        <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputEmail_2">Enter Password</label>
                                            <input type="password" name="password" class="form-control <?php echo $h_err; ?>"   placeholder="Enter Registered Username">
                                            <?php echo form_error('password'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputEmail_2">Enter Confirm Password</label>
                                            <input type="password" name="confirm" class="form-control <?php echo $h_err; ?>"   placeholder="Enter Registered Username">
                                            <?php echo form_error('confirm'); ?>
                                        </div>

                                       <div class="form-group">
<!--                                            <a class="capitalize-font txt-orange block mb-10 pull-right font-12" href="--><?php //echo site_url('login'); ?><!--">Login</a>-->
                                            <!--<a class="btn btn-primary btn-rounded pull-left" href="<?php /*echo site_url('login'); */?>">Return to Login</a>-->
                                            <button type="submit" class="btn btn-orange btn-rounded pull-right">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>

    </div>
    <!-- /Main Content -->
</div>
<!-- /#wrapper -->

<!-- JavaScript -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js'); ?>"></script>

<!-- Slimscroll JavaScript -->
<script src="<?php echo base_url('assets/js/jquery.slimscroll.js'); ?>"></script>

<!-- Init JavaScript -->
<script src="<?php echo base_url('assets/js/init.js'); ?>"></script>
</body>
</html>