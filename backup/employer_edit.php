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


          <div class="row">


 <div class="col-md-12" style="text-align: center;    padding-bottom: 5px;    margin-top: -22px;    border-bottom: 1px dashed grey;"> 
           
                 <a  href="employer_home.php"><i class="fa fa-user"></i> My Account</a> |
                 <a href="employer_edit.php"><i class="fa fa-edit"></i> Edit Profile </a> |
                 <a href="view_candidate.php"><i class="fa fa-eye"></i> View Candidates </a> |
                 <a href="echange_pwd.php"><i class="fa fa-key"></i> Change Password </a> |
                 
          </div>
<br/>

            <div class="col-md-7">

              <!-- Classic Heading -->
              <h4 class="classic-title"><span>Update Profile Info</span></h4>

              <!-- Some Text -->
                    <?php
					
					 $r="select * from employer where emp_slno='".$_SESSION['esl']."'";
	                 $result_qry=$obj->execute($r);
		 
	       
		             $row=mysqli_fetch_array($result_qry);
					
					
					?>

              
              
              <p>
            <form method="post" action="">
            
           <?php /*?> <div class="col-md-4" style="background: #8080802b;" ><label>Name:</label></div><div class="col-md-8" style="margin-bottom:5px;background: #cee2ce;"> <?php echo $row['cpname'];?></div><br/>
            <div class="col-md-4" style="background: #8080802b;"><label>Designation:</label></div><div class="col-md-8" style="margin-bottom:5px;background: #cee2ce;"><?php echo $row['cpdesignation'];?></div><br/>
            <div class="col-md-4" style="background: #8080802b;"><label>Company Name:</label></div><div class="col-md-8" style="margin-bottom:5px;background: #cee2ce;"> <?php echo $row['cname'];?></div><br/>
            <div class="col-md-4" style="background: #8080802b;"><label>Company Website:</label></div> <div class="col-md-8" style="margin-bottom:5px;background: #cee2ce;"><?php echo $row['cwebsite'];?></div><br/>
            <div class="col-md-4" style="background: #8080802b;"><label>Email:</label></div> <div class="col-md-8" style="margin-bottom:5px;background: #cee2ce;"><?php echo $row['email'];?></div><br/><?php */?>
            
            <div class="col-md-12" ><label>Contact Number:</label></div> <div class="col-md-12" style="margin-bottom:5px;"><input type="number" name="ph" value="<?php echo $row['cnumber'];?>" style="width:100%"></div>
  <div class="col-md-12" style="text-align: center;"><br/> <button type="submit" id="submit" class="btn-system btn-large" name="update">Update</button> </div>        
            
            
          </form><!-- end form  -->
            </p>
              

            </div><!-- end col md 7  -->

            <div class="col-md-5">

              <!-- Start Touch Slider -->
              <div class="touch-slider" data-slider-navigation="true" data-slider-pagination="true">
                 
                <div class="item"><img alt="" src="images/e2.jpg"></div>
              </div>
              <!-- End Touch Slider -->

            </div>

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

<?php    
if(isset($_POST['update']))
{

 $r="update employer set cnumber='".$_POST['ph']."' where emp_slno='".$_SESSION['esl']."'";
	     $result_qry=$obj->execute($r);
		 
if($result_qry){
				?> <script>
				 alert("Updated Successfully");
				   window.location=("employer_home.php");
	                </script>
					<?php 
				
	     }
				
		  else
           {
	

                    ?>
					<script>
	               alert("Something went wrong.Please try again!!");
				   
	                </script>
	                 <?php
     
           }
                    
	

}
?>