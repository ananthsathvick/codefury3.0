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

    <link href="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css"
          rel="stylesheet" type="text/css">
    <style>
        .has-error{color: red;}
    </style>
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
                                    <h3 class="text-center txt-dark mb-10">Need help with your password?</h3>
                                    <p class="text-center txt-grey nonecase-font">Enter the registered email id  you use for <?php echo config_item('company_name'); ?>, and we’ll help you create a new password.</p>
                                </div>
                                <?php $h_err = ($this->session->flashdata('error') || form_error('username') || form_error('login_type')) ? 'has-error':''; ?>
                                <div class="form-wrap">
                                    <form action="<?php echo admin_url('login/forgot_password'); ?>" method="post">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputEmail_2">Enter Email</label>
                                            <input type="text" name="username" class="form-control "   placeholder="Enter Registered Email">
                                            <span class="<?php echo $h_err; ?>"><?php echo form_error('username'); ?></span>
                                        </div>

                                       <div class="form-group">
<!--                                            <a class="capitalize-font txt-orange block mb-10 pull-right font-12" href="--><?php //echo site_url('login'); ?><!--">Login</a>-->
                                            <a class="btn btn-primary btn-rounded pull-left" href="<?php echo admin_url('login'); ?>">Return to Login</a>
                                            <button type="submit" class="btn btn-orange btn-rounded pull-right">Submit</button>
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

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<!-- Slimscroll JavaScript -->
<script src="<?php echo base_url('assets/js/jquery.slimscroll.js'); ?>"></script>

<!-- Init JavaScript -->
<script src="<?php echo base_url('assets/js/init.js'); ?>"></script>

<script>

    $(document).ready(function () {

        <?php if($this->session->flashdata('message')) { ?>

        $.toast({

            heading: 'Success',

            text: '<?php echo trim(preg_replace('/\r|\n/', ' ', $this->session->flashdata('message')));?>',

            position: 'top-right',

            loaderBg: '#ff6849',

            icon: 'success',

            hideAfter: 3500,

            stack: 6

        });

        <?php } ?>

        <?php if($this->session->flashdata('error')) { ?>

        $.toast({

            heading: '',

            text: '<?php echo trim(preg_replace('/\r|\n/', ' ', $this->session->flashdata('error'))); ?>',

            position: 'top-right',

            loaderBg: '#ff6849',

            icon: 'error',

            hideAfter: 3500

        });

        <?php } ?>

        <?php if(function_exists('validation_errors') && validation_errors() != '') { ?>

        $.toast({

            heading: '',

            text: '<?php echo trim(preg_replace('/\r|\n/', ' ', validation_errors())); ?>',

            position: 'top-right',

            loaderBg: '#ff6849',

            icon: 'error',

            hideAfter: 35000000

        });

        <?php } ?>

        <?php if(!empty($error)) { ?>

        $.toast({

            heading: '',

            text: '<?php echo trim(preg_replace('/\r|\n/', ' ', $error)); ?>',

            position: 'top-right',

            loaderBg: '#ff6849',

            icon: 'error',

            hideAfter: 3500

        });

        <?php } ?>

        <?php if($this->session->flashdata('info_message')) { ?>

        $.toast({

            heading: '',

            text: '<?php echo trim(preg_replace('/\r|\n/', ' ', $this->session->flashdata('info_message'))); ?>',

            position: 'top-right',

            loaderBg: '#ff6849',

            icon: 'info',

            hideAfter: 3000,

            stack: 6

        });

        <?php } ?>



    });

</script>
</body>
</html>