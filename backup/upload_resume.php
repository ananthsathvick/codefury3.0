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
<script src="http://code.jquery.com/jquery-latest.js"></script>
             <script type="text/javascript">
                 $(document).ready(function () {
				 
				 $( "#div2" ).hide();
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


 

     
  

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Build Resume</span></h4>

            <!-- Start Contact Form -->
            <?php if(isset($_GET['canid']))
			{
			$_SESSION['can_sl']=$_GET['canid'];?>
           
             <form role="form" id="contactForm" data-toggle="validator" class="shake" action="" method="post">
             
             
          <div class="col-md-4" style="min-height:600px;">
               
               
             
              
              <h4>Qualification info</h4>
                     <div class="form-group">
                     
                <div class="controls"><label style="color: #1284bb;font-weight: bold;">Basic Qualification :<span style="color:red">*</span></label>
                  <textarea id="msg_subject" placeholder="Qualification"  name="qualification" maxlength="100" required data-error="Please enter your qualification" style="height: 44px"></textarea>
                  <div class="help-block with-errors"></div>
                
              </div>
              </div>
              
              
             
                     <div class="form-group">
                    
                <div class="controls"><label style="color: #1284bb;font-weight: bold;">Year of passing :<span style="color:red">*</span></label>
                   <select name="ypass" required>
                    <option value="">select</option>
                  <option value="1980">1980</option>
                   <option value="1981">1981</option>
                    <option value="1982">1982</option>
                     <option value="1983">1983</option>
                      <option value="1984">1984</option>
                       <option value="1985">1985</option>
                        <option value="1986">1986</option>
                         <option value="1987">1987</option>
                          <option value="1988">1988</option>
                           <option value="1989">1989</option> 
                           <option value="1990">1990</option>
                           <option value="1991">1991</option>
                           <option value="1992">1992</option>
                           <option value="1993">1993</option>
                           <option value="1994">1994</option>
                           <option value="1995">1995</option>
                           <option value="1996">1996</option>
                           <option value="1997">1997</option>
                           <option value="1998">1998</option>
                           <option value="1999">1999</option>
                           <option value="2000">2000</option>
                            <option value="2001">2001</option>
                             <option value="2002">2002</option>
                              <option value="2003">2003</option>
                               <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                 <option value="2006">2006</option>
                                  <option value="2007">2007</option>
                                   <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                     <option value="2010">2010</option>
                                      <option value="2011">2011</option>
                                      <option value="2012">2012</option>
                                      <option value="2013">2013</option>
                                      <option value="2014">2014</option>
                                      <option value="2015">2015</option>
                                      <option value="2016">2016</option>
                                      <option value="2017">2017</option>
                                      <option value="2018">2018</option>
                                      
                  
                  </select>
                  <div class="help-block with-errors"></div>
                
              </div>
              </div>
              
             
             
              
              
                     <div class="form-group">
                     
                <div class="controls"><label style="color: #1284bb;font-weight: bold;">Additional Qualification :</label>
                  <textarea id="msg_subject" placeholder="Qualification"  name="qualification2" maxlength="100"  style="height: 44px"></textarea>
                  <div class="help-block with-errors"></div>
                
              </div>
              </div>
              
              
             
                     <div class="form-group">
                    
                <div class="controls"><label style="color: #1284bb;font-weight: bold;">Year of passing :</label>
                 <select name="ypass2">
                  <option value="">select</option>
                  <option value="1980">1980</option>
                   <option value="1981">1981</option>
                    <option value="1982">1982</option>
                     <option value="1983">1983</option>
                      <option value="1984">1984</option>
                       <option value="1985">1985</option>
                        <option value="1986">1986</option>
                         <option value="1987">1987</option>
                          <option value="1988">1988</option>
                           <option value="1989">1989</option> 
                           <option value="1990">1990</option>
                           <option value="1991">1991</option>
                           <option value="1992">1992</option>
                           <option value="1993">1993</option>
                           <option value="1994">1994</option>
                           <option value="1995">1995</option>
                           <option value="1996">1996</option>
                           <option value="1997">1997</option>
                           <option value="1998">1998</option>
                           <option value="1999">1999</option>
                           <option value="2000">2000</option>
                            <option value="2001">2001</option>
                             <option value="2002">2002</option>
                              <option value="2003">2003</option>
                               <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                 <option value="2006">2006</option>
                                  <option value="2007">2007</option>
                                   <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                     <option value="2010">2010</option>
                                      <option value="2011">2011</option>
                                      <option value="2012">2012</option>
                                      <option value="2013">2013</option>
                                      <option value="2014">2014</option>
                                      <option value="2015">2015</option>
                                      <option value="2016">2016</option>
                                      <option value="2017">2017</option>
                                      <option value="2018">2018</option>
                                      
                  
                  </select>
                  <div class="help-block with-errors"></div>
                
              </div>
              
              </div>
              
              
   <div class="form-group">
                     
                <div class="controls"><label style="color: #1284bb;font-weight: bold;">Additional Qualification :</label>
                  <textarea id="msg_subject" placeholder="Qualification"  name="qualification3" maxlength="100"  style="height: 44px"></textarea>
                  <div class="help-block with-errors"></div>
                
              </div>
              </div>
              
              
             
                     <div class="form-group">
                    
                <div class="controls"><label style="color: #1284bb;font-weight: bold;">Year of passing :</label>
                 <select name="ypass3">
                  <option value="">select</option>
                  <option value="1980">1980</option>
                   <option value="1981">1981</option>
                    <option value="1982">1982</option>
                     <option value="1983">1983</option>
                      <option value="1984">1984</option>
                       <option value="1985">1985</option>
                        <option value="1986">1986</option>
                         <option value="1987">1987</option>
                          <option value="1988">1988</option>
                           <option value="1989">1989</option> 
                           <option value="1990">1990</option>
                           <option value="1991">1991</option>
                           <option value="1992">1992</option>
                           <option value="1993">1993</option>
                           <option value="1994">1994</option>
                           <option value="1995">1995</option>
                           <option value="1996">1996</option>
                           <option value="1997">1997</option>
                           <option value="1998">1998</option>
                           <option value="1999">1999</option>
                           <option value="2000">2000</option>
                            <option value="2001">2001</option>
                             <option value="2002">2002</option>
                              <option value="2003">2003</option>
                               <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                 <option value="2006">2006</option>
                                  <option value="2007">2007</option>
                                   <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                     <option value="2010">2010</option>
                                      <option value="2011">2011</option>
                                      <option value="2012">2012</option>
                                      <option value="2013">2013</option>
                                      <option value="2014">2014</option>
                                      <option value="2015">2015</option>
                                      <option value="2016">2016</option>
                                      <option value="2017">2017</option>
                                      <option value="2018">2018</option>
                                      
                  
                  </select>
                  <div class="help-block with-errors"></div>
                
              </div>            
              
              </div>
              
       <div class="form-group">
                     
                <div class="controls"><label style="color: #1284bb;font-weight: bold;">Additional Qualification :</label>
                  <textarea id="msg_subject" placeholder="Qualification"  name="qualification4" maxlength="100"  style="height: 44px"></textarea>
                  <div class="help-block with-errors"></div>
                
              </div>
              </div>
              
              
             
                     <div class="form-group">
                    
                <div class="controls"><label style="color: #1284bb;font-weight: bold;">Year of passing :</label>
                 <select name="ypass4">
                  <option value="">select</option>
                  <option value="1980">1980</option>
                   <option value="1981">1981</option>
                    <option value="1982">1982</option>
                     <option value="1983">1983</option>
                      <option value="1984">1984</option>
                       <option value="1985">1985</option>
                        <option value="1986">1986</option>
                         <option value="1987">1987</option>
                          <option value="1988">1988</option>
                           <option value="1989">1989</option> 
                           <option value="1990">1990</option>
                           <option value="1991">1991</option>
                           <option value="1992">1992</option>
                           <option value="1993">1993</option>
                           <option value="1994">1994</option>
                           <option value="1995">1995</option>
                           <option value="1996">1996</option>
                           <option value="1997">1997</option>
                           <option value="1998">1998</option>
                           <option value="1999">1999</option>
                           <option value="2000">2000</option>
                            <option value="2001">2001</option>
                             <option value="2002">2002</option>
                              <option value="2003">2003</option>
                               <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                 <option value="2006">2006</option>
                                  <option value="2007">2007</option>
                                   <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                     <option value="2010">2010</option>
                                      <option value="2011">2011</option>
                                      <option value="2012">2012</option>
                                      <option value="2013">2013</option>
                                      <option value="2014">2014</option>
                                      <option value="2015">2015</option>
                                      <option value="2016">2016</option>
                                      <option value="2017">2017</option>
                                      <option value="2018">2018</option>
                                      
                  
                  </select>
                  <div class="help-block with-errors"></div>
                
              </div>        
              
            </div>  
              
              
              
              
              
              
              
              
              
              
              
              
              
              
           
              
              
               <h4>Personal info</h4>
    
    
     <div class="form-group">
                <div class="controls">
                  <label style="color: #1284bb;font-weight: bold;">Date of birth :<span style="color:red">*</span></label><br/> <input type ="date" name="dob" required style="width:100%;">
                  <div class="help-block with-errors"></div>
                </div>
              
              </div>
              
              
              <div class="form-group">
                <div class="controls">
                 <label style="color: #1284bb;font-weight: bold;">Address :<span style="color:red">*</span></label>
                  <textarea id="msg_subject" placeholder=""  name="address"  required data-error="Please enter your address separated  by a comma" maxlength="55" style="height: 65px"></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              
              </div>
 
               <div class="form-group">
                <div class="controls">
                 <label style="color: #1284bb;font-weight: bold;">Languages Known :<span style="color:red">*</span></label>
                  <textarea id="msg_subject" placeholder=""  name="lang" maxlength="200" required data-error="Please enter your languages known separated by a comma" style="height: 44px"></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              
              </div>
              
              
              
              
              
              
              

              </div>
              
              
              
             <div class="col-md-8" style="min-height:600px;"> 
              
                 <div class="form-group">
                <div class="controls"><label style="color: #1284bb;font-weight: bold;">Objective :<span style="color:red">*</span></label>
                  <textarea id="msg_subject" placeholder="Not in more than 240 characters..."  name="objective" maxlength="240" required data-error="Please enter your objective" style="height: 100px"></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              
              </div>
           <h4>Skills and Achievements</h4>
                    <div class="form-group">
                <div class="controls"><label style="color: #1284bb;font-weight: bold;">Skill Sets<span style="color:red">*</span></label>
                  <textarea id="msg_subject" placeholder="Not in more than 500 chars"  name="skills" maxlength="500" required data-error="Please enter your skills" style="height:200px"></textarea>
                  <div class="help-block with-errors"></div>
               
              </div>
              </div>
              
              
                  <div class="form-group">
                <div class="controls"><label style="color: #1284bb;font-weight: bold;">Achievements</label>
                  <textarea id="msg_subject" placeholder="Not in more than 300 chars"   maxlength="300" name="ach"  style="height:200px"></textarea>
                  <div class="help-block with-errors"></div>
                </div>
             
              </div>
			  
			   <h4>Working Status</h4>
              
              
              <div class="form-group">
                <div class="controls">
                  <input type="radio" name="ws" value="Fresher" id="id_radio1" required checked >Fresher
                  <input type="radio" name="ws" value="Experienced"  id="id_radio2"   >Experienced
                  <div class="help-block with-errors"></div>
                </div>
           
              </div>
		
			  
              <div  class="form-group">
<h4 id="div1" >Fresher Projects<span style="color:red">*</span></h4>
<h4  id="div2">Professional Details<span style="color:red">*</span></h4>
                <div class="controls">
                
           
                  <textarea id="msg_subject" placeholder="Not in more than 1200 chars" maxlength="1200" name="fp"  style="height:254px" required></textarea>
                  <div class="help-block with-errors"></div>
                </div>
           
              </div>
              
              
                  
              
        
  </div>  
  
  
 

  
  
  
            
              
<div class="col-md-12" >
              <button type="submit" id="submit" name="register" value="register"class="btn-system btn-large" style="float:right;">Submit</button>
              <div id="msgSubmit" class="h3 text-center hidden"></div> 
              <div class="clearfix"></div>   
</div>

<span id="user-availability-status"></span>
              
   </div>           
              
              
               
               
               
               
               
                </form> <?php }?>
            <!-- End Contact Form -->
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



$dt=date('Y-m-d'); 
$a=$_POST['ws'];
if($a=='Fresher')
{
$f=$_POST['fp'];
$e="";
}

else if($a=='Experienced')
{
$e=$_POST['fp'];
$f="";
}



  $qry= "update candidate set objective='".$_POST['objective']."',qualification='".$_POST['qualification']."',ypass='".$_POST['ypass']."',qualification2='".$_POST['qualification2']."',ypass2='".$_POST['ypass2']."',qualification3='".$_POST['qualification3']."',ypass3='".$_POST['ypass3']."',qualification4='".$_POST['qualification4']."',ypass4='".$_POST['ypass4']."',skills='".$_POST['skills']."',working_status='".$_POST['ws']."',fresher_projects='$f',exp='$e',achievements='".$_POST['ach']."',languages='".$_POST['lang']."',dob='".$_POST['dob']."',address='".$_POST['address']."',resume_status='uploaded' where cid='".$_SESSION['can_sl']."'";
	     $result_qry=$obj->execute($qry);
		 if($result_qry)
          {
	        
			 $r="select * from candidate where cid='".$_SESSION['can_sl']."'";
	         $result1_qry=$obj->execute($r);
			 $row=mysqli_fetch_array($result1_qry);
			 $_SESSION['can_sl']=$row['cid'];
			 $_SESSION['can_em']=$row['email'];
			 $_SESSION['cname']=$row['name'];
			  
$to= $_SESSION['can_em'];
$email_recipients = $_SESSION['can_em'];
$email_subject = "Code Headed";
$enable_auto_response = false;//Make this false if you donot want auto-response.
$email_from = 'info@udyogconsultancy.com'; /*From address for the emails*/
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: $email_from \r\n";
$headers .= "Reply-To: $email_from \r\n";
	$msg='<html>
         <body>
        <p>Dear candidate,</p>
		<p>Your resume has been uploaded to our portal.<br/>
        You can setup an account with us for further services.</p>
        <p>Please click here to become a member:';
	    
		$msg .='<a href="https://www.udyogconsultancy.com/payment.php?canid=';
		$msg .=$_SESSION['can_sl'];
		$msg .='">Click here</a><br/><br/>';
		$msg .='Thank you for availing us.</body></html>';
//Send the email!
$send =@mail(/*to*/$email_recipients, $email_subject, $msg,$headers);


	   



if($send)	{		
			 
			

				?> <script>
				 alert("Thank-you.Your resume has been uploaded successfully.");
				  window.location=("payment.php?canid=<?php echo $_SESSION['can_sl'];?>");
	                </script>
					<?php 
			
			
				
	    } 
		

		
		}
				
		  else
           {
	

                    ?>
					<script>
	               alert("Something went wrong.Upload resume details again.");
	                </script>
	                 <?php
     
           }
                    
	

}
?>
