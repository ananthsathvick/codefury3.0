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

   




<?php 

if(isset($_GET['canemail']))
{
    
$a ="SELECT * FROM candidate WHERE email='".$_GET["canemail"]."'";
$a_qry=$obj->execute($a);
$count=mysqli_num_rows($a_qry);
if($count==0)
{    
     $qry= "insert into candidate(name,email,phone,phone2,date_reg)values('".$_GET['canname']."','".$_GET['canemail']."','".$_GET['phone']."','".$_GET['phone2']."','".$_GET['regdt']."')";
	     $result_qry=$obj->execute($qry);
}





$_SESSION['can_em']=$_GET['canemail'];

 $q="select * from candidate where email='".$_GET['canemail']."'";
 $qres=$obj->execute($q);
 $row=mysqli_fetch_array($qres);
 
 $_SESSION['can_sl']=$row['cid'];





if($row['email_verification']=='done'&&$row['resume_status']=='not_uploaded')
{?>

<div class="col-md-12" style="min-height:600px;">
<center><h5><em>Dear <?php echo $row['name'];?>,<br/><br/>
Your Email verification already completed.Please upload your resume by clicking on the below button.<br/><br/>
<a href="upload_resume.php?canid=<?php echo $_SESSION['can_sl'];?>" style="padding: 12px;background: #ee3733;color: white;font-size: 15px;" >Build Resume</a> <br/><br/>
Thank-you.</center>
 </h5>          
</div>

<?php }?>



<?php if($row['email_verification']=='notdone')
{ ?>

<div class="col-md-12" style="min-height:600px;">
<?php 
$r="update candidate set email_verification='done' where cid='".$_SESSION['can_sl']."'";
$result1_qry=$obj->execute($r);
if($result1_qry)
{?> <center><h5><em>Dear <?php echo $row['name'];?><br/><br/>
Your Email verification completed.Please upload your resume by clicking on the below button.<br/><br/>
<a href="upload_resume.php?canid=<?php echo $_SESSION['can_sl'];?>" style="padding: 12px;background: #ee3733;color: white;font-size: 15px;" >Build Resume</a><br/><br/>
Thank-you   </center>  </h5>  
</div>


<?php } ?>
<?php }?>






<?php if($row['email_verification']=='done'&&$row['resume_status']=='uploaded')
{?>

<div class="col-md-12" style="min-height:600px;">
<center><h5><em>Dear <?php echo $row['name'];?>,<br/><br/>
Your Email verification  and  resume uploading is already completed.<br/><br/>
<a href="payment.php?canid=<?php echo $_SESSION['can_sl'];?>" style="padding: 12px;background: #ee3733;color: white;font-size: 15px;" >PAY NOW</a><br/><br/>
Thank-you.</em></h5></center>
           
</div>

<?php }

?>

 <?php }?>




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

