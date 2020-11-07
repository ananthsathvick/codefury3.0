<?php
session_start();

include("db.php");
$obj=new dboperation();
$obj->connect();

?><!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

 <!-- Basic -->
  <title>Code Headed  </title>

  <!-- Define Charset -->
  <meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <meta name="description" content="Code Headed">
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

  <!-- Color Defult -->
  <link rel="stylesheet" type="text/css" href="css/colors/red.css" media="screen" />





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



  <!-- Google Maps -->
  <style>
    
	
	
	
	
	
	
	
	
	
  </style>
  <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

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
                  <a href="employer_home.php" style="font-size:14px;"> <i class="fa fa-user">  My account </i>  </a> |
                  <a  href="logout.php" style="font-size:14px;"> <i class="fa fa-sign-out">  Logout </i>  </a> <?php }?>
                  
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
              <li> <a  href="index.php">Home</a> </li>
              <li> <a href="campus_selection.php">Campus Selection</a> </li>
              <li> <a href="employer.php">Employer Login</a></li>
              <li> <a  href="candidate_login.php">Candidate Login</a></li>
              <li> <a href="client_list.php">Client List</a></li>
              <li><a href="contact.php">Contact Us</a> </li>
            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
              <li> <a  href="index.php">Home</a> </li>
              <li> <a href="campus_selection.php">Campus Selection</a> </li>
              <li> <a href="employer.php">Employer Login</a></li>
              <li> <a  href="candidate_login.php">Candidate Login</a></li>
              <li> <a href="client_list.php">Client List</a></li>
              <li><a href="contact.php">Contact Us</a> </li>
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header ( Logo & Naviagtion ) -->

    </header>
    <!-- End Header -->

    <!-- Start Map -->
  
    <!-- End Map -->

    <!-- Start Content -->
    
   
    <div id="content">
      <div class="container">

        <div class="row">




<!-- sidebar menu -->
<div class="col-md-12" style="    text-align: center;
    padding-bottom: 5px;
    margin-top: -22px;
    border-bottom: 1px dashed grey;"> 

 
           
                 <a  href="candidate_home.php"><i class="fa fa-user"></i> My Account</a> |
                 <a href="candidate_edit.php"><i class="fa fa-edit"></i> Edit Profile </a> |
                 <a href="resume/resumea.php?id=<?php echo $_SESSION['ccid'];?>" target="_blank"><i class="fa fa-eye"></i> My Resume </a> |
                 <a href="cchange_pwd.php"><i class="fa fa-key"></i> Change Password </a> |
                 
               
            <!-- /sidebar menu -->


</div>

<br/>









                   <?php
					
					 $r="select * from candidate where cid='".$_SESSION['ccid']."'";
	                 $result_qry=$obj->execute($r);
		 
	       
		             $row=mysqli_fetch_array($result_qry)
					
					
					?>



 <!--<h4 class="classic-title"><span>My Profile</span></h4>-->


          <div class="col-md-12" style="min-height:600px;">

            <!-- Classic Heading -->
                
            <!-- End Contact Form -->

            <!-- Classic Heading -->
          


              <p>
            
           <h3 style="">Dear <?php echo $row['name']; ?>,</h3>
            
            <em>Congratulations.You are in.<br/><br/>

Welcome to your dashboard.<br/>

You have signed up for a easy way to reach reputed company recruiters directly.<br/>
That's exactly what we have built and will strive to serve you better.<br/><br/>

Please edit your profile details and keep it updated time to time.<br/>
This will increase your chance of getting viewed by the recruiters.<br/>


Cheers!!
</em><br/><br/>
            <p><h3>Recent activities on your profile:</h3><br/>
 <?php $r="select a.cid,a.emp_slno,a.view_date,b.emp_slno,b.cname,b.cwebsite,c.cid from view a,employer b, candidate c where a.cid='".$_SESSION['ccid']."' and c.cid='".$_SESSION['ccid']."'and a.emp_slno=b.emp_slno ";
	                 $result_qry=$obj->execute($r);


                         $count=mysqli_num_rows($result_qry);
                         if($count<=0)
                          {echo "<h5>Currently no recruiter has viewed your profile</h2>";}
else {
?>
		 
         <div class="holder" style="    border: 0.5px solid #c3bcbc;
    padding: 10px;
    color: red;
    border-radius: 10px;
    background: #f5eded;">
     <marquee direction="down" scrolldelay="300">
              <?php
					
				   
					
					
		             while($row=mysqli_fetch_array($result_qry))
					{
					
					?>
				
				
				
                 <ul id="ticker01">
							<li><?php echo '+';?>	<?php echo $row['cname'];?> visited your Profile on <?php echo $row['view_date'];?> -Website link :<?php echo $row['cwebsite'];?></li>
							
				</ul>

					
			
				<?php }?>
                
                </marquee></div>
	
	
	<!-- jQuery via Google's CDN -->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
             
             
             
        
            </div><?php } ?>
            </div><!-- end form  -->
            </p>
            <!-- Start Contact Form -->
            
            
            
            
            
            
            <!-- End Contact Form -->


</p>




     </div>






            <div class="col-md-2">

              <!-- Start Touch Slider -->
            <!--  <div class="touch-slider" data-slider-navigation="true" data-slider-pagination="true">
                 <div class="item"><img alt="" src="images/c1.jpg"></div>
                <div class="item"><img alt="" src="images/c2.jpg"></div>
              </div>-->
              <!-- End Touch Slider -->

            </div> 








        </div>

      </div>
    </div>
    
  </div>
    
   <br/><br/>
    <!-- End content -->



    <!-- Start Footer -->
     <footer>
      <div class="container">
        <div class="row footer-widgets">

       
          
         


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


