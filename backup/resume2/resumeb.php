<?php
session_start();

include("../db.php");
$obj=new dboperation();
$obj->connect();

?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
  <title>Code Headed</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
	@media print {
   
	
	 .btn-primary{
      display: none;
    }
	#hide,#show{display: none;}
	
	
}
@media print {
   body {
      -webkit-print-color-adjust: exact;
   }
}

</style>
</head> 

<body  style="  border:1px solid grey !important;">

 <?php
					if(isset($_GET['id']))
					{
					 $r="select * from candidate where cid='".$_GET['id']."'";
	                 $result_qry=$obj->execute($r);
		 
	       
		             $row=mysqli_fetch_array($result_qry)
					
					
					?>
     
    <div class="wrapper" style="">
        <div class="sidebar-wrapper" style="  background: #42A8C0 !important; ">
            <div class="profile-container" style="      background: rgba(0, 0, 0, 0.2)!important;    color: #fff !important;">
                <img class="profile" src="" alt="" />
                <h1 class="name"  style="  color: #fff !important;"><?php echo $row['name'];?></h1>
              <!--  <h3 class="tagline">Full Stack Developer</h3>-->
            </div><!--//profile-container-->
            
            <div class="contact-container container-block" >
                <ul class="list-unstyled contact-list">
                
                <?php $string = $row['email'];

$array  = explode("@", $string);

//print_r($array);

?>
                    <li class="email" style="  color: #fff !important;"><i class="fa fa-envelope" style="  color: #fff !important;"></i>
					<?php

 echo $array[0];?><br/><?php echo "@".$array[1];?>
 

</li>
                    <li class="phone" style="  color: #fff !important;"><i class="fa fa-phone" style="  color: #fff !important;"></i><?php echo $row['phone'];?>
                    <?php if($row['phone2']!=""){?>
                    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['phone2'];} ?></li>
                    
                    <li class="linkedin" style="  color: #fff !important;"><i class="fa fa-birthday-cake" style="  color: #fff !important;"></i><?php echo $row['dob'];?></li>
                    
                    
                      <?php $string = $row['address'];

$array  = explode(",", $string);

//print_r($array);

?>

<li class="github" style="  color: #fff !important;"><i  style="  color: #fff !important;" class="fa fa-home" ></i><br/>
<?php
$no = 1;
foreach ($array as $line)
 { echo $line;?>
 <br/>
<?php
$no++;
}; ?>
</li>
                    
                   
                </ul>
            </div><!--//contact-container-->
            <div class="education-container container-block">
                <h2 class="container-block-title"  style="  color: #fff !important;">Education</h2>
                <div class="item">
                    <h4 class="degree" style="  color: #fff !important;"><?php echo $row['qualification'];?></h4>
                    <!--<h5 class="meta">University of London</h5>-->
                    <div class="time" style="  color: rgba(255, 255, 255, 0.6)!important;"><?php echo $row['ypass'];?></div>
                </div><!--//item-->
                <div class="item">
                    <h4 class="degree" style="  color: #fff !important;"><?php echo $row['qualification2'];?></h4>
                   <!-- <h5 class="meta">Bristol University</h5>-->
                    <div class="time" style="  color: rgba(255, 255, 255, 0.6) !important;"><?php echo $row['ypass2'];?></div>
                </div><!--//item-->
                
                  <div class="item">
                    <h4 class="degree" style="  color: #fff !important;"><?php echo $row['qualification3'];?></h4>
                   <!-- <h5 class="meta">Bristol University</h5>-->
                    <div class="time" style="  color: rgba(255, 255, 255, 0.6) !important;"><?php echo $row['ypass3'];?></div>
                </div><!--//item-->
                
                  <div class="item">
                    <h4 class="degree" style="  color: #fff !important;"><?php echo $row['qualification4'];?></h4>
                   <!-- <h5 class="meta">Bristol University</h5>-->
                    <div class="time" style="  color: rgba(255, 255, 255, 0.6) !important;"><?php echo $row['ypass4'];?></div>
                </div><!--//item-->
                
                
            </div><!--//education-container-->
            
            <div class="languages-container container-block">
                <h2 class="container-block-title"  style="  color: #fff !important;">Languages</h2>
                
 <?php $string = $row['languages'];

$array  = explode(",", $string);

//print_r($array);

?>                
               <p style="color:white !important;">
			   
			   <?php
$no = 1;
foreach ($array as $line)
 { echo $line;?>
 <br/>
<?php
$no++;
}; ?></p>
                    <!--<li>French <span class="lang-desc">(Professional)</span></li>
                    <li>Spanish <span class="lang-desc">(Professional)</span></li>-->
                
            </div><!--//interests-->
            
            <div class="interests-container container-block">
                <!--<h2 class="container-block-title">Interests</h2>
                <ul class="list-unstyled interests-list">
                    <li>Climbing</li>
                    <li>Snowboarding</li>
                    <li>Cooking</li>
                </ul>--> <span style="float:left;"><a href="javascript:window.print()" type="button" class="btn btn-primary">Print</a> </span> 
  
   
            </div><!--//interests-->
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper" style="background: #f3f2d3!important;">
            
            <section class="section summary-section">
                <h2 class="section-title" style="color:#2d7788!important;"><i class="fa fa-user"></i>Career Objective</h2>
                <div class="summary">
                    <p><?php echo $row['objective'];?></p>
                </div><!--//summary-->
            </section><!--//section-->
            
            <?php if($row['working_status']=='Experienced')
			{?>
            <section class="section experiences-section">
                <h2 class="section-title" style="color:#2d7788!important;"><i class="fa fa-briefcase"></i>Professional Details</h2>
                
                <!--//item-->
                <div class="summary">
                
              <p>  <?php $string = $row['exp'];

               $array  = explode(".", $string);
			   
			   
$no = 1;
foreach ($array as $line)
 { echo $line;echo '.';?>
 <br/>
<?php
$no++;
}; ?></p>
  </div>
               <!--//item-->
                
                <!--//item-->
                
            </section><!--//section-->
            
            <?php }?>
			
			
			
			<?php if($row['working_status']=='Fresher')
			{?>
            <section class="section experiences-section">
                <h2 class="section-title" style="color:#2d7788!important;"><i class="fa fa-briefcase"></i>Fresher Projects</h2>
                
                <!--//item-->
                <div class="summary">
                
              <p>  <?php $string = $row['fresher_projects'];

               $array  = explode(".", $string);
			   
			    
$no = 1;
foreach ($array as $line)
 { echo $line;echo '.';?>
 <br/>
<?php
$no++;
}; ?></p>
  </div>
               <!--//item-->
                
                <!--//item-->
                
            </section><!--//section-->			
		<?php }?>	
            
            
            
            <section class="skills-section section">
                <h2 class="section-title" style="color:#2d7788!important;"><i class="fa fa-rocket"></i>Areas of acquired skill</h2></h2>
                
                <div class="summary">
                     <p><?php echo $row['skills'];?></p>
                </div> 
            </section><!--//skills-section-->
            
            <?php if($row['achievements']!=""){?>
           <section class="section projects-section" style="margin-bottom:0px !important;">
                <h2 class="section-title" style="color:#2d7788!important;"><i class="fa fa-archive" ></i>Honors / Awards</h2>
               <div class="summary">
                   <p><?php echo $row['achievements'];?></p>
                </div><!--//item-->
            </section><!--//section--> 
            
            <?php }?>
            
            
        </div><!--//main-body-->
    </div>
 
    <footer class="footer">
        <div class="text-center">
 
                <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
                <small class="copyright" style="font-size:18px!important;color:red!important;">Powered by <i class="fa fa-heart" style="color: #fb866a!important;"></i> Code Headed.</a></small>
               
        </div><!--//container-->
    </footer><!--//footer-->
 
    <!-- Javascript -->          
 
   <?php  $r="select * from employer where emp_slno='".$_SESSION['esl']."'";
	                 $result_qry=$obj->execute($r);
					 $row=mysqli_fetch_array($result_qry);
					 $compname=$row['cname'];
					 $cweb=$row['cwebsite'];
					
$dt=date('Y-m-d'); 
$j="select * from view where cid='".$_GET['id']."' and emp_slno='".$_SESSION['esl']."'";
$jj=$obj->execute($j);
$jjj=mysqli_fetch_array($jj);
if(mysqli_num_rows($jj)==0)
{

$d="insert into view (cid,emp_slno,view_date) values('".$_GET['id']."','".$_SESSION['esl']."','$dt')";
$d1=$obj->execute($d);

// mail
			 
// the message
$msg='<html>
         <body style="color:#61125e;
    font-size: 15px;
    line-height: 2.5em;
    border: 2px solid #c7c0c0;
    padding: 15px;
    background: #f2f3dc;">
        <h2>Greetings from Udyog Consutancy.</h2>
		<h5><em>Thank you for joining us!</em></h5>
        <p><b>Congratulations! One Recruiter Viewed Your Profile<b></p>
		<p>Company Name:';
    	$msg .=$compname;
		$msg .='<br/>Company Website:';
		$msg .=$cweb;
		 $msg .='</p> Regards<br/>Team Udyog</body></html>';
	   

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$to=$_SESSION['canemail'];
$headers = "From:Code Headed";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
// send email
$mail=mail($to,"Code Headed",$msg,$headers);




}      
       
           
 } ?>
 
 
 
 
        
</body>
</html> 

