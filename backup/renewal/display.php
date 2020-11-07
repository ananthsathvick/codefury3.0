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
  <link rel="stylesheet" href="../asset/css/bootstrap.min.css" type="text/css" media="screen">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" media="screen">

  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="../css/slicknav.css" media="screen">

  <!-- Margo CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen">

  <!-- Responsive CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="../css/responsive.css" media="screen">

  <!-- Color Defult -->
  <link rel="stylesheet" type="text/css" href="../css/colors/red.css" media="screen" />

 


  <!-- Margo JS  -->
  <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="../js/jquery.migrate.js"></script>
  <script type="text/javascript" src="../js/modernizrr.js"></script>
  <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="../js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="../js/nivo-lightbox.min.js"></script>
  <script type="text/javascript" src="../js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="../js/jquery.appear.js"></script>
  <script type="text/javascript" src="../js/count-to.js"></script>
  <script type="text/javascript" src="../js/jquery.textillate.js"></script>
  <script type="text/javascript" src="../js/jquery.lettering.js"></script>
  <script type="text/javascript" src="../js/jquery.easypiechart.min.js"></script>
  <script type="text/javascript" src="../js/smooth-scroll.js"></script>
  <script type="text/javascript" src="../js/skrollr.js"></script>
  <script type="text/javascript" src="../js/jquery.parallax.js"></script>
  <script type="text/javascript" src="../js/mediaelement-and-player.js"></script>
  <script type="text/javascript" src="../js/jquery.slicknav.js"></script>    



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
                  <a href="../employer_home.php" style="font-size:14px;"> <i class="fa fa-user">  My account </i>  </a> |
                  <a  href="../logout.php" style="font-size:14px;"> <i class="fa fa-sign-out">  Logout </i>  </a> <?php }?>
                  
                  <?php if(@$_SESSION['role']=='candidate')
				  {?>
                  <a href="../candidate_home.php" style="font-size:14px;"> <i class="fa fa-user">  My account </i>  </a> |
                  <a  href="../logout.php" style="font-size:14px;"> <i class="fa fa-sign-out">  Logout </i>  </a> <?php }?>
                  
                  
                 
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
            <a class="navbar-brand" href="../index.php">
              <h1 style="font-size: 18px;margin-top: -13px;color: red;">Code Headed </h1>
              <h6><em>Executive Search Consultants</em></h6>
            </a>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Stat Search -->
            
            <!-- End Search -->
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
              <li> <a  href="../index.php">Home</a> </li>
              <li> <a href="../campus_selection.php">Campus Selection</a> </li>
              <li> <a href="../employer.php">Employer Login</a></li>
               <li> <a  href="../candidate_login.php">Candidate Login</a></li>
              <li> <a href="../client_list.php">Client List</a></li>
              <li><a href="../contact.php">Contact Us</a> </li>
            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
              <li> <a  href="../index.php">Home</a> </li>
              <li> <a href="../campus_selection.php">Campus Selection</a> </li>
              <li> <a href="../employer.php">Employer Login</a></li>
               <li> <a  href="../candidate_login.php">Candidate Login</a></li>
              <li> <a href="../client_list.php">Client List</a></li>
              <li><a href="../contact.php">Contact Us</a> </li>
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
            <h4 class="classic-title"><span></span></h4>

            <!-- Start Contact Form -->
            
            
            
              
        <?php

$var1 = $_GET['payment_id'];
$var2 = $_GET['payment_request_id'];

//echo $var2;
//echo '<br>';
//echo $var1;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/'.$var2);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:757846dafcc0614d82cc5c9c0b357c4d","X-Auth-Token:7b3fa36d18fb6f193ae9ee9a5e06268c"));
$response = curl_exec($ch);
curl_close($ch); 

$myArray = array(json_decode($response, true));
//echo '<br>';
//print_r($myArray);
//echo '<br>';

$payment_id = $myArray[0]["payment_request"]["payments"][0]["payment_id"];
$amount = $myArray[0]["payment_request"]["payments"][0]["amount"];
$buyer_name = $myArray[0]["payment_request"]["payments"][0]["buyer_name"];
$buyer_phone = $myArray[0]["payment_request"]["payments"][0]["buyer_phone"];
$buyer_email = $myArray[0]["payment_request"]["payments"][0]["buyer_email"];
$status = $myArray[0]["payment_request"]["payments"][0]["status"];

$DataSign = hash_hmac("sha1", $amount, "efc9102a63b643c5b10961f107373183"); 




$dt=date('Y-m-d'); 
$renewdate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt)) . " + 1 year"));
$r="select * from candidate where cid='".$_SESSION['can_sl']."'";
$result=$obj->execute($r);
$ans=mysqli_fetch_array($result);

$paymentid_t=$ans['payment_id'];
$status_t=$ans['status'];
datasign_t=$ans['datasign'];
paymentdate_t=$ans['payment_date'];
renewdate_t=$ans['renew_date'];


$s="insert into renewal_history(cid,payment_id,status,datasign,payment_date,renew_date)values('".$_SESSION['can_sl']."','$paymentid_t','$status_t','datasign_t','paymentdate_t','renewdate_t')";
$sq=$obj->execute($s);

$qry= "update  candidate set payment_id='$payment_id',status='$status',datasign='$DataSign',payment_date='$dt',renew_date='$renewdate' where cid='".$_SESSION['can_sl']."'";
$result_qry=$obj->execute($qry);

//echo "<br>Buyer name :".$buyer_name;
//echo "<br>Buyer_phone :".$buyer_phone;
//echo "<br>Buyer_email :".$buyer_email;
//echo "<br>Amount :".$amount;
//echo "<br>Payment ID :".$payment_id;
//echo "<br>Status :".$status;
//echo "<br>Data :".$DataSign;

echo "Your Payment is ";
echo  $status;
echo '<br/>';
echo "Check Your Email For Confirmation Message.";
?>
  
  <?php if($status!='Failure')
  {
  ?>
  <form role="form" id="contactForm" data-toggle="validator" class="shake" method="post" action="finish.php"> 
                   



              <button type="submit" id="submit" class="btn-system btn-large" name="finish">Finish</button>
              <div id="msgSubmit" class="h3 text-center hidden"></div> 
              <div class="clearfix"></div>   
  
  </form>
  
  
  <?php }?>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
                
            <!-- End Contact Form -->

          </div>










        </div>

      </div>
    </div>
    <!-- End content -->



    <!-- Start Footer -->
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
                <li><a href="../contact.php">Contact</a></li>
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


  <script type="text/javascript" src="../js/script.js"></script>
    

</body>

</html>


























