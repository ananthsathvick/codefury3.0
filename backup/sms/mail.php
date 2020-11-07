
<?php
include 'library.php'; // include the library file
include "classes/class.phpmailer.php"; // include the class name
if(isset($_POST["send"])){
echo "hi";
	
//	$subt=$_POST["subject"];
	
	
	$mail	= new PHPMailer; // call the class 
	$mail->IsSMTP(); 
	$mail->Host = "udyogconsultancy.com"; //Hostname of the mail server for eg :- example.com
	$mail->Port = 465; //Port of the SMTP like to be 25, 80, 465 or 587
	$mail->SMTPAuth = false; //Whether to use SMTP authentication
	$mail->Username = "info@udyogconsultancy.com"; //Username for SMTP authentication any valid email created in your domain eg :-webmaster@mail.com
	$mail->Password = "sri@2018"; //Password for SMTP authentication
	$mail->AddReplyTo("info@udyogconsultancy.com","Srinidhi"); //reply-to address
	
	//$mail->AddReplyTo("webmaster@example.com", "Care"); //reply-to address
	
	$mail->SentFrom("info@udyogconsultancy.com, support@sunsys.in","Udyog"); //From address of the mail
	// put your while loop here like below,
	$mail->Subject = "Code Headed"; //Subject od your mail
    $mail->AddAddress("1991rincywilson@gmail.com", ""); //To address who will receive this email
	$message="Hi pls verify thie email link";
	$name="Team Udyog";
	$phone="8884551156";
	$mail->MsgHTML("<b>".$message."</b><br>(Name :-".$name."<br>Phone :-".$phone.")"); //Put your body of the message you can place html code here
	/*$mail->AddAttachment("images/asif18-logo.png"); //Attach a file here if any or comment this line, */
	$send = $mail->Send(); //Send the mails
	if($send){
		//echo '<center><h3 style="color:#009933;">Mail sent successfully</h3></center>';
		//header("location: contact.php");
		?> <script>
    alert("Message has been sent");
	window.location = 'www.gmail.com';
 </script><?php
 

 
	}
	else{
		//echo '<center><h3 style="color:#FF3300;">Mail error: </h3></center>'.$mail->ErrorInfo;
		?> <script>
    alert("Error in sending message");
	window.location = 'godaddy.com';
 </script><?php
	}
}
?>