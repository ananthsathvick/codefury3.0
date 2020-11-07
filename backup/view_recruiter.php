<?php
session_start();

include("db.php");
$obj=new dboperation();
$obj->connect();

?><!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

 <!-- Basic -->
  <title>Code Headed  </title>

  <!-- Define Charset -->
  <meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <meta name="description" content="Code Headed">
  <meta name="author" content="GrayGrids">

  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">

  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="css/slicknav.css" media="screen">

  <!-- Margo CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

  <!-- Responsive CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

  <!-- Color Defult -->
  <link rel="stylesheet" type="text/css" href="css/colors/red.css" media="screen" />





  <!-- Margo JS  -->
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/jquery.migrate.js"></script>
  <script type="text/javascript" src="js/modernizrr.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
  <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="js/jquery.appear.js"></script>
  <script type="text/javascript" src="js/count-to.js"></script>
  <script type="text/javascript" src="js/jquery.textillate.js"></script>
  <script type="text/javascript" src="js/jquery.lettering.js"></script>
  <script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
  <script type="text/javascript" src="js/smooth-scroll.js"></script>
  <script type="text/javascript" src="js/skrollr.js"></script>
  <script type="text/javascript" src="js/jquery.parallax.js"></script>
  <script type="text/javascript" src="js/mediaelement-and-player.js"></script>
  <script type="text/javascript" src="js/jquery.slicknav.js"></script>    



  <!-- Google Maps -->

  <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->



  
<style>

@import url('https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');

/*Normalize Start*/


button, input, select, textarea {
    font-size: 100%;
    margin: 0;
    vertical-align: baseline;
}
button, input {
    line-height: normal;
}
button, input[type="button"], input[type="reset"], input[type="submit"] {
    cursor: pointer;
}
button[disabled], input[disabled] {
    cursor: default;
}
input[type="checkbox"], input[type="radio"] {
    padding: 0;
}
input[type="search"] {
    -moz-box-sizing: content-box;
}
button::-moz-focus-inner, input::-moz-focus-inner {
    border: 0 none;
    padding: 0;
}
textarea {
    overflow: auto;
    vertical-align: top;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}

/*Normalize END*/







.table-box {
	overflow: hidden;
	margin: 0 auto;
	border: 1px solid #ddd;
}

.table-box table {
	text-align: left;
	width: 100%;
}

.table-box td, .table-box th {
  padding: 10px;
}

.table-box td:first-child, .table-box th:first-child {
  padding-left: 20px;
}

.table-box td:last-child, .table-box th:last-child {
  padding-right: 20px;
}

.table-box th {
  border-bottom: 1px solid #ddd;
  position: relative;
}

input[type="search"] {
   margin: 0 0 12px 0;
    width: 100%;
    border: 1px solid #bababa;
    padding: 10px;
}
input[type="search"]:focus {
	border-color: #009C7C; 
	background: #fff;
	color: #5d5d5d;
	box-shadow: 0 1px 1px rgba(60, 140, 210, 0.075) inset, 0 0 8px rgba(82, 168, 236, 0.6)
}

.input-group {
    border-collapse: separate;
    display: table;
    position: relative;
}

.input-group-addon, .input-group-btn, .input-group .form-control {
    display: table-cell;
}
.input-group-addon:not(:first-child):not(:last-child), .input-group-btn:not(:first-child):not(:last-child), .input-group .form-control:not(:first-child):not(:last-child) {
    border-radius: 0;
}
.input-group-addon, .input-group-btn {
    vertical-align: middle;
    white-space: nowrap;
    width: 1%;
}
.input-group-addon {
    background-color: #EEEEEE;
    border: 1px solid #CCCCCC;
    border-radius: 4px;
    font-size: 14px;
    font-weight: normal;
    line-height: 1;
    padding: 6px 12px;
    text-align: center;
}
.input-group-addon.input-sm {
    border-radius: 3px;
    font-size: 12px;
    padding: 5px 10px;
}
.input-group-addon.input-lg {
    border-radius: 6px;
    font-size: 18px;
    padding: 10px 16px;
}
.input-group-addon input[type="radio"], .input-group-addon input[type="checkbox"] {
    margin-top: 0;
}
.input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
}
.input-group-addon:first-child {
    border-right: 0 none;
}
.input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:last-child > .btn, .input-group-btn:last-child > .dropdown-toggle, .input-group-btn:first-child > .btn:not(:first-child) {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
}
.input-group-addon:last-child {
    border-left: 0 none;
}
.input-group-btn {
    position: relative;
    white-space: nowrap;
}
.input-group-btn > .btn {
    position: relative;
}
.input-group-btn > .btn + .btn {
    margin-left: -4px;
}


.input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:last-child > .btn, .input-group-btn:last-child > .dropdown-toggle, .input-group-btn:first-child > .btn:not(:first-child) {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
}
.input-group-addon, .input-group-btn, .input-group .form-control {
    display: table-cell;
}
.input-group .form-control {
    margin-bottom: 0;
    width: 100%;
}


//*Alert*//




@media all and (max-width: 768px) {

.table-box td:first-child, .table-box th:first-child {
    padding-left: 10px;
}
table, thead, tbody, th, td, tr {
	display: block;
}
/*
th {
	color: #fff;
	background: #009C7C;
}*/
table {
	position: relative; 
	padding-bottom: 0;
	border: none;
	box-shadow: 0 0 10px rgba(0,0,0,.2);
}

.table-box th {
    border-right: 1px solid #ddd;
    position: relative;
}


thead {
	float: left;
	white-space: nowrap;
}
tbody {
	overflow-x: auto;
	overflow-y: hidden;
	position: relative;
	white-space: nowrap;
}
tr {
	display: inline-block;
	vertical-align: top;
}
th {
	border-bottom: 1px solid #a39485;
}
td {
	border-bottom: 1px solid #e5e5e5;
}
}



</style>





</head>

<body>

  <!-- Container -->
  <div id="container">

    <!-- Start Header -->
    
     <header class="clearfix">

      <!-- Start Top Bar -->
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <!-- Start Contact Info -->
              <ul class="contact-details">
                           
              </ul>
              <!-- End Contact Info -->
            </div>
            <!-- .col-md-6 -->
            <div class="col-md-7" style="float:right;">
              <!-- Start Social Links -->
              <ul class="social-list"  style="float:right;">
                <li>
                  
                  <?php if(@$_SESSION['role']=='employer')
				  {?>
                  <a href="employer_home.php" style="font-size:14px;"> <i class="fa fa-user">  My account </i>  </a> |
                  <a  href="logout.php" style="font-size:14px;"> <i class="fa fa-sign-out">  Logout </i>  </a> <?php }?>
                  
                  <?php if(@$_SESSION['role']=='candidate')
				  {?>
                  <a href="candidate_home.php" style="font-size:14px;"> <i class="fa fa-user">  My account </i>  </a> |
                  <a  href="logout.php" style="font-size:14px;"> <i class="fa fa-sign-out">  Logout </i>  </a> <?php }?>
                  
                  
                 
                </li>
              </ul>
            </div>
            <!-- .col-md-6 -->
          </div>
          <!-- .row -->
        </div>
        <!-- .container -->
     </div>
      <!-- End Top Bar -->

      <!-- Start Header ( Logo & Naviagtion ) -->
      <div class="navbar navbar-default navbar-top" role="navigation" data-spy="affix" data-offset-top="50">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand" href="index.php">
              <h1 style="font-size: 18px;margin-top: -13px;color: red;">Code Headed </h1>
              <h6><em>Executive Search Consultants</em></h6>
            </a>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Stat Search -->
            
            <!-- End Search -->
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
              <li> <a  href="index.php">Home</a> </li>
              <li> <a href="campus_selection.php">Campus Selection</a> </li>
              <li> <a href="employer.php">Employer Login</a></li>
              <li> <a  href="candidate_login.php">Candidate Login</a></li>
              <li> <a href="client_list.php">Client List</a></li>
              <li><a href="contact.php">Contact Us</a> </li>
            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
              <li> <a  href="index.php">Home</a> </li>
              <li> <a href="campus_selection.php">Campus Selection</a> </li>
              <li> <a href="employer.php">Employer Login</a></li>
              <li> <a  href="candidate_login.php">Candidate Login</a></li>
              <li> <a href="client_list.php">Client List</a></li>
              <li><a href="contact.php">Contact Us</a> </li>
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header ( Logo & Naviagtion ) -->

    </header>
    <!-- End Header -->

    <!-- Start Map -->
  
    <!-- End Map -->

    <!-- Start Content -->
    <div id="content">
      <div class="container">

        <div class="row">




<!-- sidebar menu -->
<div class="col-md-12" style="    text-align: center;
    padding-bottom: 5px;
    margin-top: -22px;
    border-bottom: 1px dashed grey;"> 
           
                    <a  href="candidate_home.php"><i class="fa fa-user"></i> My Account</a> |
                 <a href="candidate_edit.php"><i class="fa fa-edit"></i> Edit Profile </a> |
                 <a href="view_recruiter.php"><i class="fa fa-eye"></i> Recruiters Viewed </a> |
                 <a href="cchange_pwd.php"><i class="fa fa-key"></i> Change Password </a> |
                 
               
            <!-- /sidebar menu -->


</div>

<br/>









                 








          <div class="col-md-12" style="min-height:600px;" >
<br/>



 <?php $r="select a.cid,a.emp_slno,a.view_date,b.emp_slno,b.cname,b.cwebsite,c.cid from view a,employer b, candidate c where a.cid='".$_SESSION['ccid']."' and c.cid='".$_SESSION['ccid']."'and a.emp_slno=b.emp_slno";
	                 $result_qry=$obj->execute($r);


                         $count=mysqli_num_rows($result_qry);
                         if($count<=0)
                          {echo "<center><h2>Currently no recruiter has viewed your profile</h2></center>";}
else {
?>
		 
         
           <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter using keywords" /> 
	<section class="table-box">
		<table class="order-table">
			<thead>
				<tr>
                    <th>Sl.No</th>
					<th>Company Name</th>
					<th>Website</th>
					<th>Last Visited Date</th>
					
				</tr>
			</thead>
			<tbody>
              <?php
					
				  $i=1;
					
					
		             while($row=mysqli_fetch_array($result_qry))
					{
					
					?>
				<tr>
                   <td><?php echo $i++;?></td>
					<td><?php echo $row['cname'];?></td>
					<td><?php echo $row['cwebsite'];?></td>
					<td><?php echo $row['view_date'];?></td>
					
				</tr>
				<?php }?>
			</tbody>
		</table>
	
	
	<!-- jQuery via Google's CDN -->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
             
             
             
        
            </div><?php } ?>
            <!-- Start Contact Form -->
            
            <!-- End Contact Form -->



<br/>
          </div>



        </div>

      </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
  
    
    
    <!-- End content -->



    <!-- Start Footer -->
     <footer>
      <div class="container">
        <div class="row footer-widgets">

       


        </div>
        <!-- .row -->

        <!-- Start Copyright -->
        <div class="copyright-section">
          <div class="row">
            <div class="col-md-6">
              <p>Copyright 2018 All Rights Reserved</p>
            </div>
            <div class="col-md-6">
              <ul class="footer-nav">
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- End Copyright -->

      </div>
    </footer>
    <!-- End Footer -->

  </div>
  <!-- End Container -->

  <!-- Go To Top Link -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>


 
  

</body>

</html>
<?php    
if(isset($_POST['resetp']))
{
if($_POST['password1']==$_POST['password2'])
{
 $r="update candidate set password='".$_POST['password1']."' where cid='".$_SESSION['ccid']."'";
	     $result_qry=$obj->execute($r);
		 
if($result_qry){
				?> <script>
				 alert("Updated Successfully");
				   window.location=("candidate_home.php");
	                </script>
					<?php 
				
	     }
				
		  else
           {
	

                    ?>
					<script>
	               alert("Something went wrong.Please try again!!");
				   
	                </script>
	                 <?php
     
         }
		 
		 
		   }
                    
	if($_POST['password1']!=$_POST['password2'])
	{
	?>
					<script>
	               alert("Sorry.Password is not matching.Try again!!");
				   
	                </script>
	                 <?php
	
	
	}

}
?>

