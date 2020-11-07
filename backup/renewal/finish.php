<?php
session_start();
include("db.php");
$obj=new dboperation();
$obj->connect();?>

<?php

if(isset($_POST['finish']))

{
 
 $to=$_SESSION['cemail'];
 
$msg='<html>
         <body style="color:#61125e;
    font-size: 15px;
    line-height: 2.5em;
    border: 2px solid #c7c0c0;
    padding: 15px;
    background: #f2f3dc;">
		 
		 <h4>Dear sir/madam,</h4>
<p>Thank you for your registration! <br/>
Your account has now been setup and this email contains all the information you will need in order to begin using your account.<br/><br/>

<b>New Account Information</b><br/>

Paid by:';
$msg .=$_SESSION['cname'];
$msg .='<br/>Paid to: Code Headed<br/>
Amount paid: INR 118.00<br/>
Valid till date:';
$msg .=$row['renew_date'];
$msg .='<br/><br/>';
		$msg .='</p></body></html>';
	   

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$headers = "From:Code Headed";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
// send email
@$mail1=mail($to,"Code Headed",$msg,$headers);       
         
       ?>  
         
         
         
         
         
         
         
         
		           <script type="text/javascript">
	               
				   window.location="../candidate_login.php";
				   </script>
                   
                   
                   
                    
	                 <?php	
	    }


 ?>

