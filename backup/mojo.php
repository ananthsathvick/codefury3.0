<?php
session_start();
ob_start();
include("db.php");
$obj=new dboperation();
$obj->connect();
?>

<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php

 $r="select * from candidate where cid='".$_SESSION['can_sl']."'";
$result_qry=$obj->execute($r);
$row=mysqli_fetch_array($result_qry);

 $result = $long = $res = $part = $longu = "";

$_SESSION['cname']=$row['name'];
$_SESSION['cemail']=$row['email'];
$_SESSION['cphno']=$row['phone'];
$_SESSION['amount']=118;

$name=$_SESSION['cname'];
$email=$_SESSION['cemail'];
$phno=$_SESSION['cphno'];
$amount=$_SESSION['amount'];
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
   //echo $name;
   // echo $email;
   // echo $phno;
   // echo $amount;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');  // (THIS IS TEST ACCOUNT. SO PLEASE GIVE KEYS THAT YOU OBTAINED FROM YOUR ACCOUNT ON TEST.INSTAMOJO.COM)
curl_setopt($ch, CURLOPT_HEADER, FALSE);               
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:757846dafcc0614d82cc5c9c0b357c4d","X-Auth-Token:7b3fa36d18fb6f193ae9ee9a5e06268c"));
$payload = Array(
    'purpose' => 'UDYOG:REGISTER FEE',
    'amount' => $amount,
    'phone' => $phno,
    'buyer_name' => $name,
    'redirect_url' =>'https://www.udyogconsultancy.com/display.php', 
    'webhook' => '', 
    'send_email' => false,
    'send_sms' => false,
    'email' => $email,
    'allow_repeated_payments' => false
);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
print $response;
echo '<br>';
$decodedText = html_entity_decode($response);
$myArray = array(json_decode($response, true));
echo '<br>';
print_r($myArray);
echo '<br>';
$longu = $myArray[0]["payment_request"]["longurl"];
echo $longu;
header('Location:'.$longu);

?>

</body>
</html>