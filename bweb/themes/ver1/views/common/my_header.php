<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180762124-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180762124-1');
</script>




<link rel="icon" type="image/png" sizes="56x56" href="<?php echo base_url(config_item('fav_icon')); ?>">
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
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url();?>css/custom.css">

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

    <script src="<?php echo theme_url();?>js/jquery-2.2.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.min.js"></script>
</head>
<body>


<div class="page_loader"></div>

<!-- Main header start 1-->
<header class="main-header header-2 fixed-header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo pad-0" href="<?php echo site_url(); ?>">
            <img src="<?php echo base_url(config_item('site_logo'));?>" alt="<?php echo config_item('company_name'); ?>"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
                    <li class="nav-item dropdown">
                        <a href="<?php echo site_url('secure/my_account'); ?>" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown active">
                    <?php  $user_header =  $this->session->userdata('user'); $check_res = $this->db->where('user_id',$user_header['id'])->get('resume')->row(); ?>
                                    <a class="nav-link" href="<?php echo site_url('secure/create_resume?clr=1&tmp=1'); ?>"><?php echo ($check_res)?'Edit Resume':'Add Resume';?></a>
                                    
                    </li>

                    <li class="nav-item dropdown">
                    <?php if(!empty($resume)){ ?>
                                    <a class="nav-link" href="<?php echo !empty($resume->user_id) ? site_url('download-resume?K=' . base64_encode($resume->id)) : '#'; ?>">Download Resume</a>
                                    
                    </li> 

                    <li class="nav-item dropdown">
                    <a class="nav-link" target="_blank" href="<?php echo !empty($resume->user_id) ? site_url('canditate-details?K=' . base64_encode($resume->id)) : '#'; ?>">Preview Resume</a>
                                <?php }?>
                    </li>   


                    <li class="nav-item dropdown">
                        <a href="companies-viewed.php" class="nav-link">Compines Viewed</a>
                    </li>                    
                </ul>
                <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
                    <ul>
                    <?php $usr = $this->session->userdata('user');
                     if(isset($emp_header)){ ?>
                        <li>
                            <div class="dropdown btns">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo theme_url();?>img/new-images/male.jpg" alt="avatar">
                                    Hi, <?php $usr = $this->session->userdata('company'); echo $usr['name']; ?>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo site_url('employer/my_account'); ?>">Dashboard</a>
                                    <!-- <a class="dropdown-item" href="#">Messages</a> -->
                                    <!-- <a class="dropdown-item" href="#">Bookmark</a> -->
                                    <a class="dropdown-item" href="<?php echo site_url('employer/my_profile'); ?>">Edit profile</a>
                                    <a class="dropdown-item" href="<?php echo site_url('employer/logout'); ?>">Logout</a>
                                </div>
                            </div>
                        </li> 
                    <?php } elseif(!empty($usr)) { ?>
                     <li>
                            <div class="dropdown btns">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo theme_url();?>img/new-images/male.jpg" alt="avatar">
                                    Hi, <?php echo $usr['name']; ?>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo site_url('secure/my_account'); ?>">Dashboard</a>
                                    
                                    <!-- <a class="dropdown-item" href="#">Messages</a> -->
                                    <!-- <a class="dropdown-item" href="#">Bookmark</a> -->
                                    <a class="dropdown-item" href="<?php echo site_url('secure/my_profile'); ?>">Edit profile</a>
                                    <a class="dropdown-item" href="<?php echo site_url('secure/logout'); ?>">Logout</a>
                                </div>
                            </div>
                        </li> 
                     <?php } ?>                       
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Dashboard start -->
<div class="dashboard<?php echo isset($boxview) ? ' bg-grea':''; ?>">
    <div class="container<?php echo isset($boxview) ? '':'-fluid'; ?>">