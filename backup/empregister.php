<?php
session_start();

include("db.php");
$obj=new dboperation();
$obj->connect();

if(isset($_POST['register']))
{




$to=$_POST['email'];

$a ="SELECT * FROM employer WHERE email='".$_POST["email"]."'";
$a_qry=$obj->execute($a);
$count=mysqli_num_rows($a_qry);
if($count>0)
{

?>
				  <script type="text/javascript">
	               alert("Email already registered. ");
				   window.location="employer.php";
				   </script> 
				   
                     <?php exit();
}
$dt=date('Y-m-d'); 
$qry= "insert into employer(cname,cwebsite,cpname,cpdesignation,email,cnumber,date_reg)values('".$_POST['cname']."','".$_POST['cwebsite']."','".$_POST['cpname']."','".$_POST['cpdesignation']."','".$_POST['email']."','".$_POST['cnumber']."','$dt')";
$res=$obj->execute($qry);
if($res)	
{	


$email_recipients = $to;
$email_subject = "Code Headed";
$enable_auto_response = false;//Make this false if you donot want auto-response.
$email_from = 'info@udyogconsultancy.com'; /*From address for the emails*/
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: $email_from \r\n";
$headers .= "Reply-To: $email_from \r\n";
	$msg='<html>
         <body>
        <h1>Greetings from Code Headed.</h1>
		<h5><em>Thank you for partnering with us!!</em></h5>
        <p>Please click on the following link for email verification.</p>
		<p>https://udyogconsultancy.com/employer_message.php?eemail=';
    	$msg .=$to;
	    $msg .='</p></body></html>';
//Send the email!
$send =@mail(/*to*/$email_recipients, $email_subject, $msg,$headers);
$send = $mail->Send(); //Send the mails
// send email


               if($send)
               {

                  ?>
				  <script type="text/javascript">
	               alert("Registration has been completed successfully.Please check your mail for confirmation.Thank you!! .");
				   window.location="employer.php";
				   </script> 
				   
                     <?php 
              }

              else
			  {
			    ?>
				<script type="text/javascript">
	               alert("Something went wrong.Please try again!! ");
				   window.location="employer.php";
				   </script> 
				   
              <?php
			  }


}
else
{

?>

<script type="text/javascript">
	               alert("Something went wrong.Please try again!!");
				   window.location="employer.php";
				   </script> 
				   
<?php


}


}
?>




