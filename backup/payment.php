<?php
session_start();
include("db.php");
$obj=new dboperation();
$obj->connect();
$_SESSION['alogged']=0;
$_SESSION['mlogged']=0;
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

          <div class="col-md-12" style="min-height:800px;">

            <!-- Classic Heading -->
           

            <!-- Start Contact Form -->
            
            
           <?php if(isset($_GET['canid']))
                    {
                     $_SESSION['can_sl']=$_GET['canid'];
					 $r="select * from candidate where cid='".$_SESSION['can_sl']."'";
						$result_qry=$obj->execute($r);
						$row=mysqli_fetch_array($result_qry);
					 if($row['status']=='Credit')
					 {?><em><h5>Dear <?php echo $row['name'];?>,<br/><br/>
                        Your payment is already recevied successfully.<br/><br/>
                        Thank-you.</h5><br/></em>
				   
					 
					 
					<?php }
					if($row['status']!='Credit')
					{
					?>

             <strong> Dear <?php echo $row['name'];?>,<br/></strong>
              Your resume has been uploaded successfully.<br/>Kindly proceed for completing the payment process.<br/>Incase you are facing a failed transaction you have to repeat the process by clicking on the link provided in your mail.<br/>
              Thank-you.<br/>
              <form method="post" action="mojo.php">
             
                   <div class="form-group">
                <div class="controls">
               
                 <label><em><strong>Terms & Conditions</strong></em></label><br/> <textarea style="width:100%;height:200px;padding:10px;font-size:10px;">In using this website you are deemed to have read and agreed to the following terms and conditions:
1. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance in the most appropriate manner. 
2. We accept Visa and Master Credit Card, Debit Cards and Net banking as mode of payments which are processed through our payment gateway partner. No information pertaining to payment is shared with us as you fill all the payment related information on your bank's site.
3. All transactions on the Code Headed website, monetary and otherwise, are non-refundable, non-exchangeable and non-reversible.
4. The Company reserves the right to change these conditions from time to time as it sees fit and your continued use of the site will signify your acceptance of any adjustment to these terms. User is required to check terms and conditions at every visit. No notification communication will be done subject to change in terms and conditions.
</textarea>
                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div class="form-group">
                <div class="controls">
               
                        <label>I agree </label>
                        <input type="checkbox" id="agree"  required data-error="Please tic">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
  

              <button type="submit" id="submit" class="btn-system btn-large" name="login">Pay Now</button>
              <div id="msgSubmit" class="h3 text-center hidden"></div> 
              <div class="clearfix"></div>   
              </form>
                
              <?php }  
	    }?>   <!-- End Contact Form -->

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

























