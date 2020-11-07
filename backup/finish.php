<?php
session_start();
include("db.php");
$obj=new dboperation();
$obj->connect();?>

<?php

if(isset($_POST['submit']))

{
 $pass1=generate_random_password();
  $to=$_SESSION['cemail'];
 $r="select * from candidate where email='".$_SESSION['cemail']."'";
 $result_qry=$obj->execute($r);
 $row=mysqli_fetch_array($result_qry);
 
 
 $email_recipients =$_SESSION['cemail'];
$email_subject = "Code Headed";
$enable_auto_response = false;//Make this false if you donot want auto-response.
$email_from = 'info@udyogconsultancy.com'; /*From address for the emails*/
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: $email_from \r\n";
$headers .= "Reply-To: $email_from \r\n";
 $msg='<html>
         <body>
		 
<h4>Thank you ';$msg .=$_SESSION['cname'];$msg .= ' for uploading your resume.</h4>
<p>All the best!!<br/>

Received: INR 118.00<br/>
Valid till date:';
$msg .=$row['renew_date'];
$msg .='<br/><br/>';

$msg .='<b>Login Details</b><br/>
Username: ';
$msg .=$_SESSION['cemail'];
$msg .=' <br/>
Password: ';
$msg .=$pass1;
$msg .='<br/><br/>
Thank you for choosing us.<br/>Team Udyog</p><p>DISCLAIMER: The sender of this email Code Headed is an initiative to connect
job seekers to organizations directly. We are neither job providers nor we guarantee any kind of job
placements.</p>';
$msg .='</body></html>';
//Send the email!


 
 

	   



$qry= "UPDATE candidate SET password='$pass1' WHERE email='".$_SESSION['cemail']."'";
$res=$obj->execute($qry);
if($res)	
		{
		 
		 
 // send email
$send =@mail(/*to*/$email_recipients, $email_subject, $msg,$headers);

 ?>
  <script type="text/javascript">
	               alert("Account registration completed successfully.Please login using registered mail ID and password sent to your mail.Thank you.");
				   window.location="candidate_login.php";
				   </script>

	                 <?php	
	    }
}




 ?>

<?php
  function generate_random_password($length = 10) {
    $alphabets = range('A','Z');
    $numbers = range('0','9');
    $additional_characters = array('_','.');
    $final_array = array_merge($alphabets,$numbers,$additional_characters);
         
    $password = '';
  
    while($length--) {
      $key = array_rand($final_array);
      $password .= $final_array[$key];
    }
  
    return $password;
  }
  //echo 'Random password generated is "<b>' . generate_random_password(8) . '</b>".';
?>
