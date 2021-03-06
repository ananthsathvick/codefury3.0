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

 
<style>
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "test1.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

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
              <i class="fa fa-bars"></i>            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand" href="index.php">
              <h1 style="font-size: 18px;margin-top: -13px;color: red;">Code Headed </h1>
              <h6><em>Executive Search Consultants</em></h6>
            </a>          </div>
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

   






  <div class="col-md-12" style="min-height:600px;">

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Candidate Details</span></h4>

            <!-- Start Contact Form -->
            
            
             <form role="form" id="contactForm" data-toggle="validator" class="shake" action="" method="post">
             
             
             <div class="col-md-8">
              <div class="form-group">
                <div class="controls">
                  <input type="text" id="name" placeholder="Name" name="name" required data-error="Please enter your name">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              </div>
              
              
              
              
              
                <div class="col-md-8">
              <div class="form-group">
                <div   id="frmCheckUsername">
               
                  <input type="email" class="email" id="email" name="email" placeholder="Email" required data-error="Please enter your email"  onBlur="checkAvailability()"> 
                  <div class="help-block with-errors"> <span id="user-availability-status"></span></div>
                </div>
              </div>
              </div>
              
              
              
              
              
              
              
              
              
           
               
              
             
              
              <div class="col-md-8">
              <div class="form-group">
                <div class="controls">
                  <input type="tel" pattern="^\d{10}$" id="msg_subject" placeholder="Contact (Enter ten digit number)"  name="number" required data-error="Please enter your contact number">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              </div>
             
            
              <div class="col-md-8">
              <div class="form-group">
                <div class="controls">
                  <input type="tel" pattern="^\d{10}$" id="msg_subject" placeholder="Alternate Contact (Enter ten digit number)"  name="number2">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              </div>
              
              
              
              
              
              
              
              
              
              
<div class="col-md-12" >
              <button type="submit" id="submit" name="register" value="register"class="btn-system btn-large">Submit</button>
              <div id="msgSubmit" class="h3 text-center hidden"></div> 
              <div class="clearfix"></div>   
</div>


            </form> 
            <!-- End Contact Form -->
          </div>



        </div>

      </div>
    </div>
    <!-- End content -->
<br/>
 
</div>
    <!-- Start Footer -->
     <footer>
      <div class="container">
        <div class="row footer-widgets">        </div>
        <!-- .row -->

        <!-- Start Copyright -->
        <div class="copyright-section">
          <div class="row">
            <div class="col-md-6">
              <p>Copyright 2018 All Rights Reserved</p>
            </div>
            <div class="col-md-6">
              <ul class="footer-nav">
                <li><a href="#">Contact</a></li>
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
<?php    
if(isset($_POST['register']))
{



$a ="SELECT * FROM candidate WHERE email='".$_POST["email"]."'";
$a_qry=$obj->execute($a);
$count=mysqli_num_rows($a_qry);
if($count>0)
{

?>
				  <script type="text/javascript">
	               alert("Email already registered.Check your mail for uploading resume.");
				   
				   </script> 
				   
                     <?php exit();
}

$dt=date('Y-m-d'); 

 // the message
			 
$email_recipients = $_POST['email'];
$email_subject = "Code Headed";
$enable_auto_response = false;//Make this false if you donot want auto-response.
$email_from = 'info@udyogconsultancy.com'; /*From address for the emails*/
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: $email_from \r\n";
$headers .= "Reply-To: $email_from \r\n";
$msg='<html>
         <body>
        <p>Hello,<br/>Greetings from Code Headed.<br/>We are pleased to have you onboard!!<br/>Please ';
		$msg .='<a href="https://udyogconsultancy.com/cemailverify.php?canname=';
		$msg .=$_POST['name'];
		
		$msg .='&canemail=';
		$msg .=$_POST['email'];
		
		$msg .='&phone=';
		$msg .=$_POST['number'];
		
		$msg .='&phone2=';
		$msg .=$_POST['number2'];
		
		$msg .='&regdt=';
		$msg .=$dt;
		$msg .='">Click here</a> to verify your email address and upload your resume.';
	    
		$msg .='<br/><em>Have an awesome day!</em><br/><br/>Regards,<br/>Team Udyog.</p></body></html>';
//Send the email!
$send =@mail(/*to*/$email_recipients, $email_subject, $msg,$headers);

	if($send){
	
		?> <script>
     alert("Please check your mail for further proceedings.Thank you.");
	 window.location=("candidate_register.php");
 </script><?php
 

 
	}
	else{
		
		?> <script>
    alert("Error in email verification!!!");
	window.location=("candidate_register.php");
 </script><?php
	}			 
			 
			 

		
		}
				
		 
                    
	


?>
