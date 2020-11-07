<?php
session_start();

?><!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

  <!-- Basic -->
   <title>Campus Selection Recruitment | Fresher Campus Placement | Udyog</title>

  <!-- Define Charset -->
  <meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <meta name="description" content="Udyog Provides campus selection process like on campus selection, off campus placement selection for the final year student depends upon their work hard ability and technical capability and so on.">
  <meta name="author" content="GrayGrids">


  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">

  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="css/slicknav.css" media="screen">

  <!-- Margo CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

  <!-- Responsive CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

  <!-- Css3 Transitions Styles  -->
 <!-- <link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">-->

  <!-- Color Defult -->
  <link rel="stylesheet" type="text/css" href="css/colors/red.css" media="screen" />
  
 <style type="text/css">
.fa {
  padding: 10px;
  font-size: 18px;
  width: 10px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
   color: white;
}

.fa-twitter {
   color: white;
}

.fa-google {
  color: white;
}

.fa-linkedin {
  color: white;
}

.fa-youtube {
  color: white;
}

.fa-instagram {
 color: white;
}

.fa-pinterest {
  color: white;
}


}
</style>

  <!-- Margo JS  -->
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/jquery.migrate.js"></script>
  <script type="text/javascript" src="js/modernizrr.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
  <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="js/jquery.appear.js"></script>
  <script type="text/javascript" src="js/count-to.js"></script>
  <script type="text/javascript" src="js/jquery.textillate.js"></script>
  <script type="text/javascript" src="js/jquery.lettering.js"></script>
  <script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
  <script type="text/javascript" src="js/smooth-scroll.js"></script>
  <script type="text/javascript" src="js/skrollr.js"></script>
  <script type="text/javascript" src="js/jquery.parallax.js"></script>
  <script type="text/javascript" src="js/mediaelement-and-player.js"></script>
  <script type="text/javascript" src="js/jquery.slicknav.js"></script>    

  <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<!--Google Search Console varification meta tag-->
 <meta name="google-site-verification" content="W3qBLVPsKUOcxyrrf24_LWKc9Og_DXmSclMW2HWNszc" />
  <!--Google Search Console varification meta tag ends-->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-132882225-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-132882225-1');
</script>
 <!-- Global site tag (gtag.js) - Google Analytics ends-->
 
</head>

<body>

  <!-- Container -->
  <div id="container">

    <!-- Start Header -->
    
     <header class="clearfix">

      <!-- Start Top Bar -->
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <!-- Start Contact Info -->
              <ul class="contact-details">
                           
              </ul>
              <!-- End Contact Info -->
            </div>
            <!-- .col-md-6 -->
            <div class="col-md-7" style="float:right;">
              <!-- Start Social Links -->
              <ul class="social-list"  style="float:right;">
                <li>
                  
                  <?php if(@$_SESSION['role']=='employer')
				  {?>
                  <a href="employer_home.php" style="font-size:14px;" title="Udyog Employer Login"> <i class="fa fa-user">  My account </i>  </a> |
                  <a  href="logout.php" style="font-size:14px;" title="Code Headed"> <i class="fa fa-sign-out">  Logout </i>  </a> <?php }?>
                  
                   <?php if(@$_SESSION['role']=='candidate')
				  {?>
                  <a href="candidate_home.php" style="font-size:14px;"> <i class="fa fa-user">  My account </i>  </a> |
                  <a  href="logout.php" style="font-size:14px;"> <i class="fa fa-sign-out">  Logout </i>  </a> <?php }?>
                  
                 
                </li>
              </ul>
            </div>
            <!-- .col-md-6 -->
          </div>
          <!-- .row -->
        </div>
        <!-- .container -->
     </div>
      <!-- End Top Bar -->

      <!-- Start Header ( Logo & Naviagtion ) -->
      <div class="navbar navbar-default navbar-top" role="navigation" data-spy="affix" data-offset-top="50">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand" href="index.php">
              <h1 style="font-size: 18px;margin-top: -13px;color: red;">Code Headed </h1>
              <h6><em>Executive Search Consultants</em></h6>
            </a>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Stat Search -->
            
            <!-- End Search -->
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
              <li> <a  class="active" href="index.php" title="Code Headed">Home</a> </li>
              <li> <a href="campus_selection.php" title="Campus Selection">Campus Selection</a> </li>
              <li> <a  href="employer.php" title="Employer Login">Employer Login</a></li>
              <li> <a  href="candidate_login.php" title="Candidate Login">Candidate Login</a></li>
              <li> <a href="client_list.php" title="Client List">Client List</a></li>
              <li><a href="contact.php" title="Contact us">Contact Us</a> </li>
            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
              <li> <a  class="active" href="index.php" title="Code Headed">Home</a> </li>
              <li> <a href="campus_selection.php"  title="Campus Selection">Campus Selection</a> </li>
              <li> <a  href="employer.php" title="Employer Login">Employer Login</a></li>
               <li> <a  href="candidate_login.php" title="Candidate Login">Candidate Login</a></li>
              <li> <a href="client_list.php" title="Client List">Client List</a></li>
              <li><a href="contact.php" title="Contact us">Contact Us</a> </li>
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header ( Logo & Naviagtion ) -->

    </header>
    <!-- End Header -->


    <!-- Start Page Banner -->
    <div class="page-banner" style="padding:40px 0; background: url(images/slide-02-bg.jpg) center #f9f9f9;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Campus Selection</h2>
            <p>Choose your way to success</p>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="#">
	

</a></li>
              <li>Campus Selection</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner -->


    <!-- Start Content -->
    <div id="content">
      <div class="container">
        <div class="page-content">


          <div class="row">

            <div class="col-md-7">

              <!-- Classic Heading -->
              <h4 ><span>Campus Recruitment</span></h4><hr style="    border-top: 1px solid #f34444;"/>

              <!-- Some Text -->
              <p style="text-align:justify;">              	

<a href="http://udyogconsultancy.com" title="Code Headed">Code Headed</a> is a prominent recruitment firm offering out of the box campus recruitment solutions to institutes and colleges in India with a vision to explore and harness the talents of young leaders.<br/>
We are specialized in organizing Campus Interviews at various educational institutions on all India basis for different streams of Engineering and Non-Engineering graduates / Master graduates depending on the requirement of our esteemed clients.<br/>
We have a dedicated team working closely with our partner companies and colleges to deliver campus drives that create value for both students and companies. 

</p>

 
            </div>
<div class="col-md-5"><center><a href="candidate_register.php" ><img src="images/3.gif" ></a></center><br/><br/></div>
	<!-- Start Contact Form -->
             
             
            
       <div class="row">

            <div class="col-md-7">

              <!-- Classic Heading -->
              <h4 ><span>Our Process of Conducting Campus Recruitment Drive:</span></h4><hr style="    border-top: 1px solid #f34444;"/>


              <p style="text-align:justify;">The initial screening and written tests are conducted by us as per client standards and requirements. The top candidates are short listed for final interview and selection.<br/>
Based on the requirements of the organization the suitable educational institutions are short listed and sent for approval for conducting the Campus Drive at convenient dates.

</p>

            </div>

           
           
           
      <div class="col-md-5">
<br/>
              <!-- Start Touch Slider -->
              <div class="touch-slider" data-slider-navigation="true" data-slider-pagination="true">
                <div class="item"><img alt="Campus Selection" src="images/Campus-Selection.jpg"></div>
                <div class="item"><img alt="Campus Recruitment process" src="images/Campus-Recruitment-process.jpg"></div>
                
              </div>
              <!-- End Touch Slider -->

            </div>
                 
           
           

          </div>      
             
            <!-- End Contact Form -->


            
            
            

          </div>

          <!-- Divider -->
          <div class="hr1" style="margin-bottom:50px;"></div>

          

          <!-- Divider -->
        

          <!-- Classic Heading -->
         

          <!-- Start Team Members -->
        
          <!-- End Team Members -->

          <!-- Divider -->
       

          <!-- Start Clients Carousel -->
         
          <!-- End Clients Carousel -->


        </div>
      </div>
    </div>
    <!-- End content -->


    <!-- Start Footer Section -->
    <footer>
      <div class="container">
        <div class="row footer-widgets">

          <!-- Start Subscribe & Social Links Widget -->
          
            <div class="col-md-3">
                   <h3 style="color:red; font-weight:bold; font-size:20px">Contact Us</h3>
                   <h4 style="color:white">Address</h4>
                          <p style="color:white"><b>Code Headed</b> <br>#175 1st Floor, 15th Main Road, <br>
                          18th Cross, MC Layout, <br>
                          Vijayanagar<br>
                              Bangalore 560040 <br>
                              India</p>
            </div>
            <div class="col-md-3">  
            <h4 style="color:red; font-weight:bold; font-size:20px">Email Us</h4>
                              <a href="mailto:info@udyogconsultancy.com" title="Code Headed"><font color="white">info@udyogconsultancy.com</font></a> <br><br>
                              <h4 style="color:red; font-weight:bold; font-size:20px"">Call Us</h4>
                            
                                <a href="tel:+91 9148885744"><font color="white">+91 9148885744</font></a>
                        
                            
            </div>
            
           <div class="col-md-3">  
            <h4 style="color:red; font-weight:bold; font-size:20px">Quick Links</h4>
                              
                                  <ul>
              <li> <a href="index.php" title="Code Headed"><font color="white">Home</font></a> </li>
              <li> <a href="campus_selection.php" title="Campus Selection"><font color="white">Campus Selection</font></a> </li>
              <li> <a  href="employer.php" title="Employer Login"><font color="white">Employer Login</font></a></li>
              <li> <a  href="candidate_login.php" title="Candidate Login"><font color="white">Candidate Login</font></a></li>
              <li> <a href="client_list.php" title="Client List"><font color="white">Client List</font></a></li>
              <li><a href="contact.php" title="Contact us"><font color="white">Contact Us</font></a> </li>
            </ul>
            </div>
            
            <div class="col-md-3"> 
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.013925838814!2d77.53454061408358!3d12.970960590856262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3dddcf1db557%3A0xbf8eb84d1170c16f!2s15th+Main+Rd+%26+18th+Cross+Rd%2C+MRCR+Layout%2C+MC+Layout%2C+Vijaya+Nagar%2C+Bengaluru%2C+Karnataka+560040!5e0!3m2!1sen!2sin!4v1548323310475" width="380" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            
          </div>
            
            <!-- .col-md-3 -->
            
             <div class="row" style="text-align:center">
             <h4 style="color:red; font-weight:bold; font-size:20px;">CONNECT WITH US</h4>
                <!-- Add font awesome icons -->
                    <a href="https://www.facebook.com/Udyog-Consultancy-1607480702671744/" class="fa fa-facebook"></a>
                    <a href="https://twitter.com/udyogconsultan1" class="fa fa-twitter"></a>
                    <a href="https://plus.google.com/108246763057100973271" class="fa fa-google"></a>
                    <a href="https://www.linkedin.com/in/udyog-consultancy-services/" class="fa fa-linkedin"></a>
                    <a href="https://www.youtube.com/channel/UCq9WmuDOe7tfQ7mFebplv4w" class="fa fa-youtube"></a>
                    <a href="https://www.instagram.com/udyogconsultancyservices/" class="fa fa-instagram"></a>
                    <a href="https://www.pinterest.com/udyogconsultancyservices/" class="fa fa-pinterest"></a>
            </div>
           
        


        </div>
        <!-- .row -->

        <!-- Start Copyright -->
        <div class="copyright-section">
          <div class="row">
            <div class="col-md-6">
              <p>Copyright 2018. All Rights Reserved.</p>
            </div>
            <div class="col-md-6">
              <ul class="footer-nav">
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- End Copyright -->

      </div>
    </footer>
    <!-- End Footer -->

  </div>
  <!-- End Container -->

  <!-- Go To Top Link -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>


  <script type="text/javascript" src="js/script.js"></script>

</body>

</html>