<!DOCTYPE html>
<html lang="en">
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180762124-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180762124-1');
</script>

<title><?php echo (!empty($seo_title)) ? $seo_title . ' - ' . config_item('company_name') : config_item('default_seo_title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($meta) && $meta != ''): ?>
        <?php echo $meta; ?>
    <?php else: ?>
        <?php echo config_item('default_meta_data'); ?>
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>css/bootstrap-submenu.css">

    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>css/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo theme_url();?>css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="<?php echo theme_url();?>css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="<?php echo theme_url();?>css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="<?php echo theme_url();?>css/dropzone.css">
    <link rel="stylesheet" type="text/css"  href="<?php echo theme_url();?>css/slick.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="<?php echo theme_url();?>css/skins/midnight-blue.css">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dosis%7CMontserrat:200,300,400,500,600,700,800,900%7CNunito+Sans:200,300,400,600,700,800,900">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>css/ie10-viewport-bug-workaround.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script  src="<?php echo theme_url();?>js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script  src="js/html5shiv.min.js"></script>
    <script  src="js/respond.min.js"></script>
    <![endif]-->
	<?php echo config_item('google_analytics'); ?>
</head>
<body class="bg-grea">
<div class="page_loader"></div>

<!-- Contact section start -->
<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            	<div class="col-lg-12 text-center mt-30">
                	 <!-- Logo -->
                    <a  href="<?php echo site_url(); ?>"><img src="<?php echo base_url(config_item('site_logo'));?>" alt="<?php echo config_item('company_name'); ?>"></a>
                </div>