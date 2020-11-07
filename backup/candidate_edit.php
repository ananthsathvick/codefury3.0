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
		 
	       
		             $row=mysqli_fetch_array($result_qry);
					
					
					?>


<script src="http://code.jquery.com/jquery-latest.js"></script>
             <script type="text/javascript">
                 $(document).ready(function () {
                    $('#id_radio1').click(function () {
                       $('#div2').hide('fast');
                       $('#div1').show('fast');
                });
                $('#id_radio2').click(function () {
                      $('#div1').hide('fast');
                      $('#div2').show('fast');
                 });
               });
</script>



          <div class="col-md-10" style="min-height:600px;">

            <!-- Classic Heading -->
                
            <!-- End Contact Form -->

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Update Profile </span></h4>
            <form method="post" action="">
            <div class="col-md-4" style="background: #8080802b;"><label>Name:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="text" name="name" value="<?php echo $row['name'];?>" style="width:100%;" readonly></div><br/>
            
            
            <div class="col-md-4" style="background: #8080802b;"><label>Objective:</label></div> <div class="col-md-8" style="margin-bottom:5px;">
            
             <textarea id="msg_subject"   name="objective" maxlength="240"  style="height:100px;width:100%;"required ><?php echo $row['objective'];?></textarea>
            </div><br/>
            
             <div class="col-md-4" style="background: #8080802b;"><label>Date of birth:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="date" name="dob" value="<?php echo $row['dob'];?>" style="width:100%;" required></div><br/><br/>
            <div class="col-md-4" style="background: #8080802b;"><label>Languages Known:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="text" name="lan" value="<?php echo $row['languages'];?>" maxlength="500" style="width:100%;" required></div><br/><br/>
            
            <div class="col-md-4" style="background: #8080802b;"><label>Address:</label></div> <div class="col-md-8" style="margin-bottom:5px;"> <textarea id="msg_subject"   name="address" maxlength="55"  style="height:100px;width:100%;" required><?php echo $row['address'];?></textarea></div><br/><br/>
            
            
            
            
            <div class="col-md-4" style="background: #8080802b;"><label>Contact Number:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="number" name="ph" value="<?php echo $row['phone'];?>" style="width:100%;" required></div><br/>
            <div class="col-md-4" style="background: #8080802b;"><label>Alternate Contact Number:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="number" name="ph2" value="<?php echo $row['phone2'];?>" style="width:100%;"></div><br/>
                                   
            <div class="col-md-4" style="background: #8080802b;"><label>Basic Qualification:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="text" name="quali" value="<?php echo $row['qualification'];?>"  maxlength="100"style="width:100%;"required></div><br/>
            
             <div class="col-md-4" style="background: #8080802b;"><label>Year of passing:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="text" name="ypass" value="<?php echo $row['ypass'];?>" style="width:100%;" required></div><br/>
             
             <div class="col-md-4" style="background: #8080802b;"><label>Additional Qualification:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="text" name="quali2" value="<?php echo $row['qualification2'];?>" maxlength="100" style="width:100%;"></div><br/>
            
             <div class="col-md-4" style="background: #8080802b;"><label>Year of passing:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="text" name="ypass2" value="<?php echo $row['ypass2'];?>" style="width:100%;"></div><br/>
             
             
               <div class="col-md-4" style="background: #8080802b;"><label>Additional Qualification:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="text" name="quali3" value="<?php echo $row['qualification3'];?>" maxlength="100" style="width:100%;"></div><br/>
            
             <div class="col-md-4" style="background: #8080802b;"><label>Year of passing:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="text" name="ypass3" value="<?php echo $row['ypass3'];?>" style="width:100%;"></div><br/>
             
             
               <div class="col-md-4" style="background: #8080802b;"><label>Additional Qualification:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="text" name="quali4" value="<?php echo $row['qualification4'];?>" maxlength="100" style="width:100%;"></div><br/>
            
             <div class="col-md-4" style="background: #8080802b;"><label>Year of passing:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="text" name="ypass4" value="<?php echo $row['ypass4'];?>" style="width:100%;"></div><br/>
             
             
             
            <div class="col-md-4" style="background: #8080802b;"><label>Skills:</label></div> <div class="col-md-8" style="margin-bottom:5px;">
            <textarea id="msg_subject"   name="skills" maxlength="500"  style="height:150px;width:100%;" required><?php echo $row['skills'];?></textarea></div><br/>
          
            <div class="col-md-4" style="background: #8080802b;"><label>Achievements:</label></div> <div class="col-md-8" style="margin-bottom:5px;">
             <textarea id="msg_subject"   name="ach" maxlength="300"  style="height:150px;width:100%;"><?php echo $row['achievements'];?></textarea></div><br/><br/>
            
             
			
	<?php if($row['working_status']=='Experienced')
			{?><style>#div2{display:none;}</style>
	
            <div class="col-md-4" style="background: #8080802b;"><label>Working Status:</label></div> <div class="col-md-8" style="margin-bottom:5px;"><input type="radio" name="ws" value="Fresher" id="id_radio2">Fresher
                  <input type="radio" name="ws" value="Experienced"  id="id_radio1" checked required >Experienced</div>
              <div id="div1">
             <div class="col-md-4" style="background: #8080802b;margin-top: 6px;"><label>Professional Details:</label></div> <div class="col-md-8" style="margin-bottom:5px;">
			 
			 <textarea id="msg_subject"   name="exp" maxlength="1200"  style="height:150px;width:100%;"placeholder="Not in more than 1200 chars"><?php echo $row['exp'];?></textarea>
			 
			 
			</div><br/><br/>
             
  </div>           
    <div id="div2">
	<div class="col-md-4" style="background: #8080802b;    margin-top: 6px;"><label>Fresher Projects:</label></div> <div class="col-md-8" style="margin-bottom:5px;">
	
	<textarea id="msg_subject"   name="fp" maxlength="1200"  style="height:150px;width:100%;"placeholder="Not in more than 1200 chars"></textarea>
	
	</div>
           
             
  </div> 
              
              <?php }?>
              
              
               <?php if($row['working_status']=='Fresher')
			{?><style>#div2{display:none;}</style>
             <div class="col-md-4" style="background: #8080802b;"><label>Working Status:</label></div> <div class="col-md-8" style="margin-bottom:5px;">
             <input type="radio" name="ws" value="Fresher" id="id_radio1" checked>Fresher
 <input type="radio" name="ws" value="Experienced"  id="id_radio2"  >Experienced</div>

 
 <div id="div1">
            <div class="col-md-4" style="background: #8080802b;    margin-top: 6px;"><label>Fresher Projects:</label></div> <div class="col-md-8" style="margin-bottom:5px;">
			
			<textarea id="msg_subject"   name="fp" maxlength="1200"  style="height:150px;width:100%;"placeholder="Not in more than 1200 chars"><?php echo $row['fresher_projects'];?></textarea>
			
			</div>
             
  </div>           
    <div id="div2">
            <div class="col-md-4" style="background: #8080802b;    margin-top: 6px;"><label>Professional Details:</label></div> <div class="col-md-8" style="margin-bottom:5px;">
			
			<textarea id="msg_subject"   name="exp" maxlength="1200"  style="height:150px;width:100%;"placeholder="Not in more than 1200 chars"></textarea>
			
			
			</div>
             
  </div>          		
  <?php }?>          
            
			
              
              
              
          
             
      
            
              
 
 
            
         
           	
            
    <button type="submit" id="submit" class="btn-system btn-large" name="update">Update</button>         
           <div id="msgSubmit" class="h3 text-center hidden"></div> 
              <div class="clearfix"></div>   
            
          </form>  
            </div>
            <!-- Start Contact Form -->
            
            <!-- End Contact Form -->




          
            <div class="col-md-5">
<br/><br/>
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
<?php    
if(isset($_POST['update']))
{
if($_POST['fp']=='' and $_POST['exp']=='')
{
?> <script>
				 alert("Please fill up Fresher Projects/Professional Details fields.");
				   window.location=("candidate_edit.php");
	                </script>
					<?php 

}


 $r="update candidate set objective='".$_POST['objective']."',qualification='".$_POST['quali']."',ypass='".$_POST['ypass']."',qualification2='".$_POST['quali2']."',ypass2='".$_POST['ypass2']."',qualification3='".$_POST['quali3']."',ypass3='".$_POST['ypass3']."',qualification4='".$_POST['quali4']."',ypass4='".$_POST['ypass4']."',skills='".$_POST['skills']."',exp='".$_POST['exp']."',achievements='".$_POST['ach']."',languages='".$_POST['lan']."',dob='".$_POST['dob']."',address='".$_POST['address']."', phone='".$_POST['ph']."',phone2='".$_POST['ph2']."',working_status='".$_POST['ws']."',fresher_projects='".$_POST['fp']."' where cid='".$_SESSION['ccid']."'";
	     $result_qry=$obj->execute($r);
		 
if($result_qry){
				?> <script>
				 alert("Your details updated successfully");
				   window.location=("candidate_edit.php");
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
