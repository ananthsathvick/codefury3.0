<html>
   <form action="" method="post">
<b>" While clicking on the below button u can send  a msg "</b><br/><br/>
<button type="submit" id="submit" name="send" value="send"class="btn-system btn-large" style="float:left;width:50%;background:green;color:white;padding:10px;">Click here to send mail</button>
</form>


</html>
    





<?php
if(isset($_POST['send']))
{


$email_recipients = "careers@vibgyorsystech.com";

$email_subject = "Test0";

$enable_auto_response = false;//Make this false if you donot want auto-response.
$email_from = 'info@udyogconsultancy.com'; /*From address for the emails*/


$email_body = "You have received ";
    
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email_from \r\n";
//Send the email!
@mail(/*to*/$email_recipients, $email_subject, $email_body,$headers);


}
?>