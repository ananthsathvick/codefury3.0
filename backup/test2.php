<?php
 
include("db.php");
$obj=new dboperation();
$obj->connect();
if(isset($_POST["email"]))

 {
$user_count=0;
$result ="SELECT * FROM employer WHERE email='".$_POST["email"]."'";
$result1_qry=$obj->execute($result);
$user_count=mysqli_num_rows($result1_qry);

if($user_count>0)
{
echo "<span class='status-not-available'> Email Already exist.</span>";

}
else if($user_count==0)
{
 echo "<span class='status-available'></span>";
 
}


}
?>
