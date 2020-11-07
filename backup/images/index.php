<?php
session_start();
include ('sticky.html');
?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

  <!-- Basic -->
  <title>Code Headed  | Home</title>

  <!-- Define Charset -->
  <meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <meta name="description" content="Code Headed">
  <meta name="author" content="GrayGrids">

  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">

  <!-- Revolution Slider -->
  <link rel="stylesheet" href="css/settings.css" type="text/css" media="screen">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">

  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="css/slicknav.css" media="screen">

  <!-- Margo CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

  <!-- Responsive CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

  <!-- Css3 Transitions Styles  -->
  <!--<link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">-->

  <!-- Color Defult -->
  <link rel="stylesheet" type="text/css" href="css/colors/red.css" media="screen" />
 
 <style>
 hr{    border-top: 1px dashed #ff5757;}
 
 .prt{color:white; text-decoration:italics;}
 
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

</head>

<body>

  <!-- Full Body Container -->
  <div id="container" style="background-color: #ffffff29;">

    <!-- Start Header Section -->
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
                  <a href="employer_home.php" style="font-size:14px;"> <i class="fa fa-user">  My account </i>  </a> |
                  <a  href="logout.php" style="font-size:14px;"> <i class="fa fa-sign-out">  Logout </i>  </a> <?php }?>
                  
                   <?php if(@$_SESSION['role']=='candidate')
				  {?>
                  <a href="candidate_home.php" style="font-size:14px;"> <i class="fa fa-user">  My account </i>  </a> |
                  <a  href="logout.php" style="font-size:14px;"> <i class="fa fa-sign-out">  Logout </i>  </a> <?php }?>
                  
                  <a  href="candidate_login.php" style="background: #f18a4f;font-size:16px;
    padding: 0px 9px;
    margin-left: 15px;
    border: 2px solid white;
    border-radius: 8px;
    margin-bottom: 7px;
    margin-top: 4px;
    box-shadow: 4px 1px 11px 0px #1d1515;" class="flash"> <i class="fa fa-sign-in" >  <b>Candidate Login</b> </i>  </a>  
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
              <li> <a  class="active" href="index.php">Home</a> </li>
              <li> <a href="campus_selection.php">Campus Selection</a> </li>
              <li> <a  href="employer.php">Employer Login</a></li>
              <li> <a href="client_list.php">Client List</a></li>
              <li><a href="contact.php">Contact Us</a> </li>
            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
              <li> <a  class="active" href="index.php">Home</a> </li>
              <li> <a href="campus_selection.php">Campus Selection</a> </li>
              <li> <a  href="employer.php">Employer Login</a></li>
              <li> <a href="client_list.php">Client List</a></li>
              <li><a href="contact.php">Contact Us</a> </li>
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header ( Logo & Naviagtion ) -->

    </header>
    <!-- End Header Section -->

    <!-- Start Home Page Slider -->
    <section id="home">
      <!-- Carousel -->
      <div id="main-slide" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#main-slide" data-slide-to="0" class="active"></li>
          
          <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
        <!--/ Indicators end-->

        <!-- Carousel inner -->
        <div class="carousel-inner">
          <div class="item active">
            <img class="img-responsive" src="images/slider/bg5.jpg" alt="slider">
            <div class="slider-content">
              <div class="col-md-12 text-center">
                <h2 class="animated2">
                  <span>Udyog <strong>Consultancy Services</strong></span>
                </h2>
                <h3 class="animated3">
                   <span>Our Goal Is Your Success</span>
                  </h3>
               <!-- <p class="animated4"><a href="contact.php" class="slider btn btn-system btn-large">Contact Now</a>
                </p>-->
              </div>
            </div>
          </div>
          <!--/ Carousel item end -->
        
          <!--/ Carousel item end -->
          <div class="item">
            <img class="img-responsive" src="images/slider/bg6.jpg" alt="slider">
            <div class="slider-content">
              <div class="col-md-12 text-center">
                <h2 class="animated7 white">
                  <span>The way of <strong>Success</strong></span>
                </h2>
                <h3 class="animated8 white">
                  <span>Why you are waiting</span>
                </h3>
                <!--<div class="">
                  <a class="animated4 slider btn btn-default btn-min-block" href="candidate_login.php">Register Now</a>
                </div>-->
              </div>
            </div>
          </div>
          <!--/ Carousel item end -->
        </div>
        <!-- Carousel inner end-->

        <!-- Controls -->
        <a class="left carousel-control" href="#main-slide" data-slide="prev">
          <span><i class="fa fa-angle-left"></i></span>
        </a>
        <a class="right carousel-control" href="#main-slide" data-slide="next">
          <span><i class="fa fa-angle-right"></i></span>
        </a>
      </div>
      <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->

    <!-- Start Services Section -->
    
    <!-- End Services Section -->


   <div>
      <div class="parallax-text-container-1">
        <div class="parallax-text-item">
          <div class="container">
            <div class="row">
                      
          
            
            
            
            
            
            
            
            
            
            
            
            
            
            
              <!-- Start Video Section Content -->
              

                <!-- Start Animations Text -->
                
                <div class="col-md-12">
                <h1> ABOUT US </h1><hr style="border:solid 0.5px #e6c0c0;">
            
                <!-- End Animations Text -->

                <!-- Start Buttons -->
                <p>
              We are pleased to introduce ourselves as result oriented hard-core Executive Search and Management Consultants based at Bangalore, the Silicon Valley of India - a hub for Software, Electronics, Telecommunications and several other industries. A job service initiative started in the year <strong>1998</strong>. 
Our Strength lies in meeting specific requirements of the organizations in a record time with right fits. Qualified and Experienced professionals in our panel do screening and shortlist the right candidates. With this scrutinized process, the existing client organizations have appreciated our efforts for having saved their precious time and cost. Our databank is strong enough to cater Senior-Middle management executives and all levels of Software professionals or even more.
Come explore the modern era of abundant opportunities!!
 <br/><br/>
</p>




 







              </div>
              <!-- End Section Content -->
            </div>
          </div>
        </div>
      </div>
    </div>

     <!-- Start Portfolio Section -->
    <div class="section full-width-portfolio" style="border-top:0; border-bottom:0; background:#fff;padding-top:0px!important;padding-bottom:0px!important;">

      <!-- Start Big Heading -->
      <div class="big-title text-center" data-animation="fadeInDown" data-animation-delay="01">
 
        <h2>Our Belief Structure</strong></h2>
      </div>
      <!-- End Big Heading -->

      <p class="text-center">We are professional headhunters catering the specific needs of the clients with the access to proven talents across the Country. 
But perhaps our greatest strength is in our ability to innovate.  <br/>We provide complete solutions in meeting the requirements. We are committed to maintainlong-term relationship with our business partners. <br/>A constant effort to empower every individual and organization to become successful in today’sinformation age.  </p>


      <!-- Start Recent Projects Carousel -->
      <ul id="portfolio-list" data-animated="fadeIn">
        <li>
        
           <div class="prt" style="background:#ea3733;min-height:179.36px">
           <br/><span class="header">Our Vision</span><br/>
           <p class="body animated8">Code Headed</p>
            </div>
          
          <div class="portfolio-item-content">
           <div class="prt" style="background:#ea3733;min-height:179.36px"><br/><br/>Our vision is to be a global provider of innovative technology and business solutions, and create an Organization with strong Integrity, values and ethics.</div>
          </div>
          
        </li>
        <li>
         <div class="prt" style="background:#444;min-height:179.36px">
           <br/><span class="header">Our Mission</span><br/>
           <p class="body animated8">Code Headed</p>
            </div>
          
          <div class="portfolio-item-content">
           <div class="prt" style="background:#ea3733;min-height:179.36px"><br/><br/>Our mission is to work with our clients empowering their business process through leading edge technology, thereby ensure Optimal, Robust, Scalable and cost effective solutions.</div>
          </div>
        </li>
        <li>
        <div class="prt" style="background:#ea3733;min-height:179.36px">
           <br/><span class="header">Our Strength</span><br/>
           <p class="body animated8">Code Headed</p>
            </div>
          
          <div class="portfolio-item-content">
           <div class="prt" style="background:#ea3733;min-height:179.36px"><br/><br/>Our vision is to be a global provider of innovative technology and business solutions, and create an Organization with strong Integrity, values and ethics.</div>
          </div>
        </li>
        <li>
           <div class="prt" style="background:#444;min-height:179.36px">
           <br/><span class="header">Our Values</span><br/>
           <p class="body animated8">Code Headed</p>
            </div>
          
          <div class="portfolio-item-content">
           <div class="prt" style="background:#ea3733;min-height:179.36px"><br/><br/>Our vision is to be a global provider of innovative technology and business solutions, and create an Organization with strong Integrity, values and ethics.</div>
          </div>
        </li>
        
      </ul>

      <!-- End Recent Projects Carousel -->


    </div>
    <!-- End Portfolio Section -->


 

  <!-- start counter Section -->



 
 
    <div id="parallax-one" data-stellar-background-ratio="0.5"  style="background-image: url(images/parallax/bg-01.jpg);
    
    background-position: 15px -55.6px;
    min-height: 280px;
    padding-top: 46px;border-top: 2.5px solid red;">
      <div class="parallax-text-container-1">
        <div class="parallax-text-item">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="counter-item">
                  <i class="fa fa-cloud-upload"></i>
                  <div class="timer" id="item1" data-to="101" data-speed="5000"></div>
                  <h5>Resumes uploaded</h5>
                </div>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="counter-item">
                  <i class="fa fa-check"></i>
                  <div class="timer" id="item2" data-to="101" data-speed="5000"></div>
                  <h5>Registration completed</h5>
                </div>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="counter-item">
                  <i class="fa fa-code"></i>
                  <div class="timer" id="item3" data-to="51" data-speed="5000"></div>
                  <h5>Registered Employers</h5>
                </div>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="counter-item">
                  <i class="fa fa-male"></i>
                  <div class="timer" id="item4" data-to="51" data-speed="5000"></div>
                  <h5>Successful Candidates</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- end counter Section -->
<style>

hr.style-seven {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgb(234, 234, 234),  rgba(0, 0, 0, 0));
}

</style>
<div class="col-md-12" style="    font-size: 21px;
    /* border: 2px solid #ee3733; */
    /* padding-bottom: 42px; */
    background: rgb(183, 176, 176);
    text-align: center;padding-top:35px;
    box-shadow: 9px 4px 9px 9px #e8e5e585;
    min-height: 300;" class="style-seven"/>
 <div class="col-md-6" style="border-right:1px double white;">
 <h1 class="flash1" style="color: #0e2558;"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <em>Tips for interview preparation</em></h2></div>
  <div class="col-md-6">
 <h1  class="flash1" style="color: #0e2558;"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <em>Solved papers</em></h2></div>
 
 <hr class="style-seven"><br/>
 </div>


















    <!-- Start latest post Section -->
    <div style="margin-bottom:20px;margin-top:30px;">
      <br/><div class="container">
        <div class="row">
          <div class="col-md-12"><br/>
           <h4 class=".big-title h1" style="text-align:center;font-size:30px;"><span>Campus Selection</span></h4><hr/>
           <div class="col-md-6" style="text-align: justify;">
We are pleased to introduce ourselves as Code Headed, a professional placement services organization based in Bangalore. We are in the manpower placement services industry since 1997. We have a large database of various professionals from varying disciplines under different geographical locations in India. We are prominent recruitment firm offering out of the box Campus Recruitment solutions to Institutes and Colleges in India.With a vision to explore and harness the talents of young leaders across India, we have come up with a concept of Campus Recruitment and Promotion of Institutes and Colleges looking to place their fresh candidates.Code Headed provides Campus Placement services for both the companies and the colleges who want to organize Campus Drives for hiring the candidates. <a href="campus_selection.php">Read More</a></div><div class="col-md-6">
<img src="images/campus.jpg">

</div>
           
        <br/>    <!-- End Recent Posts Carousel -->

          </div>

          
        </div>
      </div>
    </div>
    <!-- End post Section -->














<!-- Start Testimonials Section -->



   <div class="parallax" style="margin-bottom:20px;background-image: url(images/parallax/bg-01.jpg);padding-bottom:20px;">
      <div class="container">
        <div class="row">
         

          <div class="col-md-12">

            <!-- Classic Heading -->
            <h4 class=".big-title h1" style="text-align:center;font-size:30px;"><span>Testimonials</span></h4><hr/>

            <!-- Start Testimonials Carousel -->
            <div class="custom-carousel show-one-slide touch-carousel" data-appeared-items="1">
              <!-- Testimonial 1 -->
              <div class="classic-testimonials item">
               <img src="images/testimonial.png" width="100">
                <div class="testimonial-content">
               
               
                  <p><strong><em style="font-size: 14px;">An excellent job portal with valued resumes to ease the Recruitment and Selection process.A perfect partner to work with. </em></strong></p>
                </div>
                <div class="testimonial-author" style="color:#ee3733"><span>- A Certified Client -</span></div>
              </div>
              <!-- Testimonial 2 -->
              <div class="classic-testimonials item">
              <img src="images/testimonial.png" width="100">
                <div class="testimonial-content">
                  <p><strong><em style="font-size: 14px;">The job portal provides relevant and more specific matches for the openings. We thank Code Headed for providing quality service over the years.</em></strong> </p>
                </div>
                <div class="testimonial-author" style="color:#ee3733"><span>- A Happy Customer -</span></div>
              </div>
              <!-- Testimonial 3 -->
            
            </div>
            <!-- End Testimonials Carousel -->

          </div>
        </div>
      </div>
    </div>
    <!-- End Testimonials Section -->























    <!-- Start Team Member Section -->
   
  
    
    <!-- End Pricing Table Section -->


    <!-- Start Client/Partner Section -->
    <br/>
    <div class="partner">
      <div class="container">
        <div class="row">

          <!-- Start Big Heading -->
          <div class="big-title text-center">
            <h1>Our Happy <strong>Clients</strong></h1>
            <p class="title-desc">Partners We Work With</p>
          </div>
          <!-- End Big Heading -->

          <!--Start Clients Carousel-->
          <div class="our-clients">
            <div class="clients-carousel custom-carousel touch-carousel navigation-3" data-appeared-items="5" data-navigation="true">

              <!-- Client 2 -->
              <div class="client-item item">
                <a href="#"><img src="images/accenture.jpg" alt="" /></a>
              </div>

              <!-- Client 3 -->
              <div class="client-item item">
              <a href="#"><img src="images/motorola.jpg" alt="" /></a>
              </div>
			
              
              <div class="client-item item">
              <a href="#"><img src="images/tek.jpg" alt="" /></a>
              </div>
              <div class="client-item item">
              <a href="#"><img src="images/wipro.jpeg" alt="" /></a>
              </div>
              <div class="client-item item">
              <a href="#"><img src="images/hathway.jpg" alt="" /></a>
              </div>
              <div class="client-item item">
              <a href="#"><img src="images/HP.jpg" alt="" /></a>
              </div>
              <div class="client-item item">
              <a href="#"><img src="images/bh.jpg" alt="" /></a>
              </div>
              <div class="client-item item">
              <a href="#"><img src="images/Spicelogo.jpg" alt="" /></a>
              </div>
              <!-- Client 4 -->
             

              <!-- Client 5 -->
              <div class="client-item item">
                <a href="#"><img src="images/siemens.jpg" alt="" /></a>
              </div>

              <!-- Client 6 -->
              <div class="client-item item">
               <a href="#"><img src="images/sap.png" alt="" /></a>
              </div>

              <!-- Client 7 -->
              <div class="client-item item">
                <a href="#"><img src="images/yahoo.png" alt="" /></a>
              </div>

              <!-- Client 8 -->
              <div class="client-item item">
                <a href="#"><img src="images/samsung.png" alt="" /></a>
              </div>






            </div>
          </div>
          <!-- End Clients Carousel -->
        </div>
        <!-- .row -->
      </div>
      <!-- .container -->
    </div>
    <!-- End Client/Partner Section -->


    <!-- Start Footer Section -->
    <footer>
      <div class="container">
        <div class="row footer-widgets">

          <!-- Start Subscribe & Social Links Widget -->
          
          <!-- .col-md-3 -->
          <!-- End Subscribe & Social Links Widget -->


          <!-- Start Twitter Widget -->
          
          <!-- .col-md-3 -->
          <!-- End Twitter Widget -->


          <!-- Start Flickr Widget -->
          
          <!-- .col-md-3 -->
          <!-- End Flickr Widget -->


          <!-- Start Contact Widget -->
          
          <!-- .col-md-3 -->
          <!-- End Contact Widget -->


        </div>
        <!-- .row -->

        <!-- Start Copyright -->
        <div class="copyright-section">
          <div class="row">
            <div class="col-md-6">
              <p>Copyright 2018 All Rights Reserved</p>
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