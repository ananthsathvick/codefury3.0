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


<style type="text/css">

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



  <!-- Google Maps -->
  <style>
	@media print {
    header,footer,#localmenu,#side,#smenu {
      display: none;
    }
	
	 .btn-primary{
      display: none;
    }
	
}


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
              <li> <a class="active" href="employer.php">Employer Login</a></li>
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
              <li> <a class="active" href="employer.php">Employer Login</a></li>
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
        <div class="page-content">


          <div class="row" style="min-height:600px;">

 
 <div class="col-md-12" id="smenu" style="text-align: center;    padding-bottom: 5px;    margin-top: -22px;    border-bottom: 1px dashed grey;"> 
           
                 <a  href="employer_home.php"><i class="fa fa-user"></i> My Account</a> |
                 <a href="employer_edit.php"><i class="fa fa-edit"></i> Edit Profile </a> |
                 <a href="view_candidate.php"><i class="fa fa-eye"></i> View Candidates </a> |
                 <a href="echange_pwd.php"><i class="fa fa-key"></i> Change Password </a> |
                 
          </div>
<br/><h4 class="classic-title"><span>Candidate's Profile</span></h4>
<div class="col-md-1"></div>
            <div class="col-md-10" style="border:1.5px solid grey;padding:10px;">

              <!-- Classic Heading -->
             

              <!-- Some Text -->
                    <?php
					if(isset($_GET['vcid']))
					{
					
					
					 $p="select * from candidate where cid='".$_GET['vcid']."'";
	                 $result=$obj->execute($p);
		 
	       
		             $r=mysqli_fetch_array($result);
					
					
					?>
              
              
               <style>h3{    line-height: 35px;
    border-bottom: 0.5px solid #808080eb;border-radius:8px;}</style>


              <p>
             <div class="form-group">
            <div class="col-md-12" style="margin-bottom:5px;background: #0d71b7db;;padding-top:15px;color:white;"><h1 style="color:white;"><?php echo $r['name'];?></h1>
            <h4 style="padding-bottom:15px;color:white;"><em><?php echo $r['tagline'];?></em></h4>
            <h4 style="color:white;"><em><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $_SESSION['canemail']=$r['email'];?></em></h4>
            <h4 style="color:white;"><em><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo $r['phone'];?></em></h4>
            <hr/>
            </div>
             <div class="col-md-12"> <h3>Qualification Info</h3></div>
            <div class="col-md-3">
           
            <label style="font-size:14px;font-weight:300;padding-top:14px;color:#0d71b7db;"><em>Highest Qualification</em></label></div> 
            <div class="col-md-9" style="margin-bottom:5px;padding-top:15px;"><?php echo $r['qualification'];?></div>
            <div class="col-md-3">
           
            <label style="font-size:14px;font-weight:300;padding-top:14px;color:#0d71b7db;"><em>Year of passing</em></label></div> 
            <div class="col-md-9" style="margin-bottom:5px;padding-top:15px;"><?php echo $r['ypass'];?></div>
            
            <div class="col-md-3">
           
            <label style="font-size:14px;font-weight:300;padding-top:14px;color:#0d71b7db;"><em>Percentage / Grade point</em></label></div> 
            <div class="col-md-9" style="margin-bottom:5px;padding-top:15px;"><?php echo $r['marks'];?></div>
          
          <div class="col-md-12"> <h3>Skills & Achievements</h3></div>
          
          
            <div class="col-md-3"><label style="font-size:14px;font-weight:300;padding-top:14px;color:#0d71b7db;"><em>Skills</em></label></div> 
            <div class="col-md-9" style="margin-bottom:5px;padding-top:15px;"><?php echo $r['skills'];?></div>
           
            
            <div class="col-md-3"><label style="font-size:14px;font-weight:300;padding-top:14px;color:#0d71b7db;"><em>Achievements</em></label></div> 
            <div class="col-md-9" style="margin-bottom:5px;padding-top:15px;"><?php echo $r['achievements'];?></div>
             
            <div class="col-md-12"> <h3>Work Info</h3></div>
            <?php if($r['workstatus']=='Experienced')
			{?>
            
            <div class="col-md-3"><label style="font-size:14px;font-weight:300;padding-top:14px;color:#0d71b7db;"><em>Work Experience </em></label></div> 
            <div class="col-md-9" style="margin-bottom:5px;padding-top:15px;"><?php echo $r['wyear'];?> year ,<?php echo $r['wmonths'];?> Months. </div>
            
            <div class="col-md-3"><label style="font-size:14px;font-weight:300;padding-top:14px;color:#0d71b7db;"><em>Work Profile</em></label></div> 
            <div class="col-md-9" style="margin-bottom:5px;padding-top:15px;"><?php echo $r['exp'];?></div>
          
          <?php }?>
            
             <?php if($r['workstatus']=='Fresher')
			{?>
            
            <div class="col-md-3"><label style="font-size:14px;font-weight:300;padding-top:14px;color:#0d71b7db;"><em>Work Experience </em></label></div> 
            <div class="col-md-9" style="margin-bottom:5px;padding-top:15px;">Fresher </div>
           
          
          <?php }?>
             <div class="col-md-12"> <h3>Personal Info</h3></div>
             <div class="col-md-3"><label style="font-size:14px;font-weight:300;padding-top:14px;color:#0d71b7db;"><em>Date of birth</em></label></div> 
            <div class="col-md-9" style="margin-bottom:5px;padding-top:15px;"><?php echo $r['dob'];?></div>
            <div class="col-md-3"><label style="font-size:14px;font-weight:300;padding-top:14px;color:#0d71b7db;"><em>Languages Known</em></label></div> 
            <div class="col-md-9" style="margin-bottom:5px;padding-top:15px;"><?php echo $r['languages'];?></div>
            
            
            </div><!-- end form  -->
            </p>
              

            </div><!-- end col md 7  -->
            <span style="float:right;"><a href="javascript:window.print()" type="button" class="btn btn-primary">PRINT</a> </span> 
            
            <div class="col-md-1"></div>
            
            
            
     <?php  $r="select * from employer where emp_slno='".$_SESSION['esl']."'";
	                 $result_qry=$obj->execute($r);
					 $row=mysqli_fetch_array($result_qry);
					 $compname=$row['cname'];
					 $cweb=$row['cwebsite'];
					
$dt=date('Y-m-d'); 
$j="select * from view where cid='".$_GET['vcid']."' and emp_slno='".$_SESSION['esl']."'";
$jj=$obj->execute($j);
$jjj=mysqli_fetch_array($jj);
if(mysqli_num_rows($jj)==0)
{

$d="insert into view (cid,emp_slno,view_date) values('".$_GET['vcid']."','".$_SESSION['esl']."','$dt')";
$d1=$obj->execute($d);

// mail
			 
// the message


$email_recipients = $_SESSION['canemail'];
$email_subject = "Notification";
$enable_auto_response = false;//Make this false if you donot want auto-response.
$email_from = 'info@udyogconsultancy.com'; /*From address for the emails*/
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: $email_from \r\n";
$headers .= "Reply-To: $email_from \r\n";
$msg='<html>
         <body>
        <h2>Greetings from Udyog Consutancy.</h2>
		<h5><em>Thank you for joining us!</em></h5>
        <p><b>Congratulations! One Recruiter Viewed Your Profile<b></p>
		<p>Company Name:';
    	$msg .=$compname;
		$msg .='<br/>Company Website:';
		$msg .=$cweb;
		$msg .='</p> Regards<br/>Team Udyog</body></html>';
//Send the email!
$send =@mail(/*to*/$email_recipients, $email_subject, $msg,$headers);

	





}      
       
           
 } ?>
           <!-- <div id="side" class="col-md-5">

              <!-- Start Touch Slider -->
             <!-- <div class="touch-slider" data-slider-navigation="true" data-slider-pagination="true">
                   <div class="item"><img alt="" src="images/e1.jpg"></div>
                <div class="item"><img alt="" src="images/e2.jpg"></div>
              </div>-->
              <!-- End Touch Slider -->

            <!--</div>-->

          </div>

          <!-- Divider -->
   

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

