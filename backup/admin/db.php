<?php
class dboperation
{
var $con;
var $db;
var $result;
   function connect()
{
$this->con=mysqli_connect("localhost","udyogcon_sri","sri@123") or die("Error in connection");
$this->db=mysqli_select_db($this->con,"udyogcon_database") or die("Error in database selection");
}//end constructor

function execute($sql)
       {
           $this->result=mysqli_query($this->con,$sql);
           return $this->result;
       }
  }
?>