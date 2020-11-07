<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
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
    <header class="sp-header">
        <div class="sp-logo-wrap pull-left">
            <a href="<?php echo site_url(); ?>">
                <img class="brand-img" src="<?php echo base_url(config_item('site_logo')); ?>" alt="<?php echo config_item('company_name'); ?>"/>
                <span class="brand-text"><img  src="<?php echo base_url(config_item('site_logo')); ?>" alt="<?php echo config_item('company_name'); ?>"/></span>
            </a>
        </div>
       <!-- <div class="form-group mb-0 pull-right">
            <span class="inline-block pr-10">Don't have an account?</span>
            <a class="inline-block btn btn-orange btn-rounded " href="signup.html">Sign Up</a>
        </div>-->
        <div class="clearfix"></div>
    </header>
<?php $h_err = ($this->session->flashdata('error') || form_error('username') || form_error('password')) ? 'has-error':''; ?>
    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle auth-form-wrap">
                    <div class="auth-form  ml-auto mr-auto no-float card-view pt-30 pb-30">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="mb-30">
                                    <h3 class="text-center txt-dark mb-10">Sign in to <?php echo config_item('company_name'); ?></h3>
                                    <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
                                </div>
                                <div class="form-wrap">
                                    <form action="<?php echo current_url(); ?>" method="post">
                                        <div class="form-group <?php echo $h_err; ?>">
                                            <label class="control-label mb-10">Username</label>
                                            <input type="text" name="username" class="form-control" required="" placeholder="Enter Username">
                                        </div>
                                        <div class="form-group <?php echo $h_err; ?>">
                                            <label class="pull-left control-label mb-10">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
<a class="capitalize-font txt-orange block pull-right font-12" href="<?php echo admin_url('login/forgot_password'); ?>">forgot password ?</a>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="form-group">
                                            <div class="checkbox checkbox-primary pr-10 pull-left">
                                                <input type="checkbox" id="checkbox_2" name="remember" value="1">
                                                <label for="checkbox_2"> Keep me logged in</label>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-orange btn-rounded">sign in</button>
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
