<?php
 
include("db.php");
$obj=new dboperation();
$obj->connect();
if(isset($_POST["email"]))

 {
$user_count=0;
 $result ="SELECT * FROM candidate WHERE email='".$_POST["email"]."'";
$result1_qry=$obj->execute($result);
$user_count=mysqli_num_rows($result1_qry);

if($user_count==1)
{
echo "<span class='status-not-available'> Email already exist.</span>";
}
else if($user_count==0)
{
 echo "<span class='status-available'></span>";
}


}
?>
