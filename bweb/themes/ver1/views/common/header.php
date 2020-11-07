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


    <link rel="icon" type="image/png" sizes="56x56" href="<?php echo base_url(config_item('fav_icon')); ?>">
    <title><?php echo (!empty($seo_title)) ? $seo_title . ' - ' . config_item('company_name') : config_item('default_seo_title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <?php if (isset($meta) && $meta != '') : ?><?php echo $meta; ?><?php else : ?><?php echo config_item('default_meta_data'); ?><?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"> <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/bootstrap-submenu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo theme_url(); ?>css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="<?php echo theme_url(); ?>css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/dropzone.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/slick.css"> <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/custom.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="<?php echo theme_url(); ?>css/skins/midnight-blue.css"> <!-- Favicon icon -->
    <!--<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" >-->
    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dosis%7CMontserrat:200,300,400,500,600,700,800,900%7CNunito+Sans:200,300,400,600,700,800,900"> <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/ie10-viewport-bug-workaround.css"> <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="<?php echo theme_url(); ?>js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo theme_url(); ?>js/ie-emulation-modes-warning.js"></script>
    <link href="<?php echo theme_url(); ?>js/magicscroll/magicscroll.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="<?php echo theme_url(); ?>js/magicscroll/magicscroll.js" type="text/javascript"></script> <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>    <script  src="<?php echo theme_url(); ?>js/html5shiv.min.js"></script>    <script  src="<?php echo theme_url(); ?>js/respond.min.js"></script>    <![endif]--> <?php echo config_item('google_analytics'); ?>
        <style>
            @keyframes blinker {
  50% {
    opacity: 0;
  }
}
            </style>
</head>

<body>
    <div class="page_loader"></div><!-- Main header start -->
    <header class="main-header header-transparent bg-white sticky-header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light"><a class="navbar-brand logo" href="<?php echo site_url(); ?>"><img src="<?php echo base_url(config_item('site_logo')); ?>" alt="<?php echo config_item('company_name'); ?>"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav header-ml"> <?php function menu($parent_id, $pages, $slug = '')
                                                        {
                                                            foreach ($pages[$parent_id] as $menu_page) {
                                                                $active = ($menu_page->active == 1) ? 'active' : '';
                                                                if ($parent_id == 0) {
                                                                    $parent_slug = '';
                                                                    $slug = '';
                                                                } else {
                                                                    $parent_slug = $slug . '/';
                                                                }
                                                                if ($menu_page->slug == 'home') {
                                                                    $menu_page->slug = '';
                                                                }
                                                                $current_slg = site_url($parent_slug . $menu_page->slug);
                                                                if ($menu_page->template == '') {
                                                                    $current_slg = 'javascript:void(0)';
                                                                }
                                                                if ($menu_page->template == 'url_page') {
                                                                    $current_slg = $menu_page->slug;
                                                                } ?>
                                <li <?php if ($menu_page->parent_id == 0) { ?> class="nav-item <?php echo (isset($pages[$menu_page->id]) && sizeof($pages[$menu_page->id]) > 0) ? 'dropdown' : ''; ?>
                                 <?php echo $active; ?>" <?php } ?>>
                                    <a <?php if ($menu_page->parent_id > 0) {
                                                                    echo 'class="dropdown-item"';
                                                                } else { ?> class="nav-link <?php echo (isset($pages[$menu_page->id]) && sizeof($pages[$menu_page->id]) > 0) ? 'dropdown-toggle' : ''; ?>" <?php } ?> <?php if (isset($pages[$menu_page->id]) && sizeof($pages[$menu_page->id]) > 0) { ?> id="navbarDropdownMenuLink<?php echo $menu_page->id; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php } ?> href="<?php echo $current_slg; ?>" <?php echo $menu_page->new_window == 1 ? 'target="_blank"' : '';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($menu_page->slug == "build-resume") {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?> style="
                                                                        font-weight: 1000;
                                                                        font-size: large;
                                                                        color: orangered;
                                                                        margin-left: 1em;
                                                                        animation: blinker 1s linear infinite;
                                                                    " <?php } ?>>
                                        <?php echo $menu_page->title; ?></a>
                                    <?php if (isset($pages[$menu_page->id]) && sizeof($pages[$menu_page->id]) > 0) { ?>
                                        <ul class="dropdown-menu dm-2" aria-labelledby="navbarDropdownMenuLink<?php echo $menu_page->id; ?>"> <?php $parent_slug .= $menu_page->slug;
                                                                                                                                                menu($menu_page->id, $pages, $parent_slug); ?> </ul> <?php } ?>
                                </li> <?php }
                                                        } ?> <?php menu(0, $this->pages); ?>
                    </ul> <?php $company_header = $this->session->userdata('company');
                            $user_header = $this->session->userdata('user');
                            if ($company_header || $user_header) {
                                if ($company_header) { ?>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown candidate-nav">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> Hi <?php echo $company_header['name']; ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo site_url('employer/my_account') ?>">Dashboard</a>
                                        <a class="dropdown-item" href="<?php echo site_url('employer/my_profile') ?>">Edit Profile</a>
                                        <a class="dropdown-item" href="<?php echo site_url('employer/logout') ?>">Logout</a>
                                    </div>
                                </li>
                            </ul> <?php } elseif ($user_header) { ?>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown candidate-nav">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> Hi <?php echo $user_header['name']; ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo site_url('secure/my_account') ?>">Dashboard</a>
                                        <a class="dropdown-item" href="<?php echo site_url('secure/my_profile') ?>">Edit Profile</a>
                                        <a class="dropdown-item" href="<?php echo site_url('secure/logout') ?>">Logout</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <?php $check_res = $this->db->where('user_id', $user_header['id'])->get('resume')->row(); ?>
                                    <a href="<?php echo site_url('secure/create_resume?clr=1&tmp=1'); ?>" class="nav-link link-color"><?php echo ($check_res) ? '<i class="flaticon-pencil"></i> Edit Resume' : '<i class="flaticon-plus"></i> Build Resume' ?></a>
                                </li>
                            </ul> <?php } ?><?php } else { ?>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item "><a class="nav-link" href="<?php echo site_url('employer-login'); ?>">
                                        <i class="flaticon-logout"></i>Employer Login </a></li>
                                <li class="nav-item "><a class="nav-link" href="<?php echo site_url('login'); ?>">
                                        <i class="flaticon-logout"></i>Candidate Login </a></li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('login'); ?>" class="nav-link link-color"><i class="flaticon-plus"></i> Build Resume</a>
                                </li>
                            </ul> <?php } ?>
                </div>
            </nav>
        </div>
    </header><!-- Main header end -->