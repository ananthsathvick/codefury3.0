
<?php
session_start();

include("../db.php");
$obj=new dboperation();
$obj->connect();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Code Headed</title>
<link type="text/css" rel="stylesheet" href="css/blue.css" />

<!--[if IE 7]>
<link href="css/ie7.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/print.css" media="print"/>
<![endif]-->
<!--[if IE 6]>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/cufon.yui.js"></script>
<script type="text/javascript" src="js/scrollTo.js"></script>
<script type="text/javascript" src="js/myriad.js"></script>
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
		Cufon.replace('h1,h2');
</script>

 <style>
 @media print {
   body {
      -webkit-print-color-adjust: exact;
   }
}
	@media print {
   
	
	 .btn-primary{
      display: none;
    }
	
	.social{display:none;}
	#hide,#show{display: none;}
	.wrapper-mid,.wrapper-top,.wrapper-bottom{background:none;border:none;}
	.self .name{padding-bottom:20px;}
}


</style>
</head>
<body>
<?php
	
					 $r="select * from candidate where cid='".$_GET['id']."'";
	                 $result_qry=$obj->execute($r);   
		             $row=mysqli_fetch_array($result_qry)
					
					
?>
<!-- Begin Wrapper -->
<div id="wrapper">
  <div class="wrapper-top"></div>
  <div class="wrapper-mid">
    <!-- Begin Paper -->
    <div id="paper">
      <div class="paper-top"></div>
      <div id="paper-mid">
        <div class="entry">
          <!-- Begin Image -->
          <!--img class="portrait" src="images/image.jpg" alt="John Smith" />
          <!-- End Image -->
          <!-- Begin Personal Information -->
          <div class="self">
            <h1 class="name"><?php echo $row['name'];?> <br />
             <!-- <span>Interactive Designer</span>--></h1>
            <ul>
			   <li class="db"><?php echo date('d/m/Y',strtotime($row['dob']));?></li>
              <li class="ad"><?php echo $row['address'];?></li>
             
			 
              
            </ul>
			
          </div>
		  
		     <div class="self">
           
             <!-- <span>Interactive Designer</span>-->
            <ul class="cc" style="float:right;">
					
              
			   <li class="mail"><?php echo $row['email'];?></li>
			   <li class="tel">+<?php echo $row['phone'];?></li>
			  <?php if($row['phone2']!=""){?>
              <li class="tel">+<?php echo $row['phone2'];?></li>
			  <?php }?>
            </ul>
			
          </div>
		  
		  
		  
		  
		  
          <!-- End Personal Information -->
          <!-- Begin Social -->
          <div class="social">
            <ul>
              
              <li><a class='north' href="javascript:window.print()" title="Print"><img src="images/icn-print.jpg" alt="" /></a></li>
              </ul>
			  
			  
			  
			  
          </div>
          <!-- End Social -->
        </div>
		
		
        <!-- Begin 1st Row -->
        <div class="entry">
		
          <em><h2>Career Objective</h2></em>
          <p><?php echo $row['objective'];?></p>
        </div>
       
        <div class="entry">
		
			<?php if($row['working_status']=='Experienced')
			{?>
          <em><h2>Professional details</h2></em>
          <p>     <?php echo $string = $row['exp'];

                   ?>
</p>

<?php }?>



<?php if($row['working_status']=='Fresher')
			{?>
          <em><h2>Fresher Projects</h2></em>
          <p>     <?php echo $string = $row['fresher_projects'];  ?>

</p>

<?php }?>

















        </div>
        <!-- End 3rd Row -->
        <!-- Begin 4th Row -->
		
		 <!-- End 2nd Row -->
        <!-- Begin 3rd Row -->
        <div class="entry">
          <em><h2>Skills</h2></em>
          <p><?php echo $row['skills'];?></p>
        </div>
        <!-- End 3rd Row -->
        <!-- Begin 4th Row -->
		 <!-- End 2nd Row -->
        <!-- Begin 3rd Row -->
		<?php if($row['achievements']!=""){?>
        <div class="entry">
          <em><h2>Honors / Awards</h2></em>
          <p><?php echo $row['achievements'];?></p>
        </div>
		<?php }?>
		
		 <!-- End 1st Row -->
        <!-- Begin 2nd Row -->
        <div class="entry">
          <em><h2>Education</h2></em>
		  
      <div style="margin-left:56px;"> <div class="content" style="padding-top:0px;">
            <h3 style="width:191px;margin-right: 25px;"><?php echo $row['ypass'];?></h3>
            <p style="float:none;"><?php echo $row['qualification'];?><br />
             <!-- <em>Master in Communication Design</em>--></p>
          </div>
		  <?php if($row['qualification2']!=""){?>
          <div class="content">
           <h3 style="width:191px;margin-right: 25px;"><?php echo $row['ypass2'];?></h3>
          <p style="float:none;"><?php echo $row['qualification2'];?><br />
             </p>
          </div>
		  <?php }?>
		  
		   <?php if($row['qualification3']!=""){?>
		   <div class="content">
           <h3 style="width:191px;margin-right: 25px;"><?php echo $row['ypass3'];?></h3>
       <p style="float:none;"><?php echo $row['qualification3'];?><br />
             </p>
          </div>
		  
		  <?php }?>
		   <?php if($row['qualification4']!=""){?>
		   <div class="content">
           <h3 style="width:191px;margin-right: 25px;"><?php echo $row['ypass4'];?></h3>
           <p style="float:none;"><?php echo $row['qualification4'];?><br />
             </p>
          </div>
		  <?php  }?>
        </div></div>
        <!-- End 2nd Row -->
        <!-- Begin 3rd Row -->
		
		
		
		
		
		
		
        <!-- End 3rd Row -->
        <!-- Begin 4th Row -->
		
        <div class="entry">
          <em><h2>Languages</h2></em>
		  <?php $string = $row['languages'];

                $array  = explode(",", $string);

//print_r($array);

?>           
		  
		  
		  
          <ul class="skills">
 <?php
$no = 1;
foreach ($array as $line)
 {
 
  ?>
  
<li>  <?php  echo $line;?>  </li>
 
<?php  $no++;  };   ?>
		  
              
            </ul>
			<br/><br/>
          <div class="content">
            <h3></h3>
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("small").hide();
    });
    $("#show").click(function(){
        $("small").show();
    });
});
</script>
	
             <p style="text-align:center;margin-right:40px;"><small class="copyright" style="font-size:10px!important;color:rgba(123, 144, 181, 1) !important;">Powered by <i class="fa fa-heart" style="color: #fb866a!important;"></i> Code Headed.</a></small>
               <br/> <button id="hide">Hide</button>
                <button id="show">Show</button></p>
	  
          </div>
        </div>
        <!-- End 4th Row -->
         <!-- Begin 5th Row -->
       
        <!-- Begin 5th Row -->
      </div>
      <div class="clear"></div>
      <div class="paper-bottom">
	  
	  
	  
	  </div>
    </div>
    <!-- End Paper -->
  </div>
 
  <div class="wrapper-bottom">
   
  </div>
</div>
<div id="message"><a href="#top" id="top-link">Go to Top</a></div>
<!-- End Wrapper -->







</body>
</html>
