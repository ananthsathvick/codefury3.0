<?php
session_start();
include("db.php");
$obj=new dboperation();
$obj->connect();?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Code Headed! | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
              <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit">Log In</button>
                <!--<a class="reset_pass" href="#">Lost your password?</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Code Headed!</h1>
                  <p>©2018 All Rights Reserved.Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
<?php    
if(isset($_POST['submit']))
{

 $r="select * from admin where username='".$_POST['username']."' && password='".$_POST['password']."' ";
	     $result_qry=$obj->execute($r);
		 if(mysqli_num_rows($result_qry)==1)
          {
	         $row=mysqli_fetch_array($result_qry);
				
				 
				
				?> <script>
				   window.location=("home.php");
	                </script>
					<?php 
				
				
			}	
				
		  if(mysqli_num_rows($result_qry)<=0)
           {
	

                    ?>
					<script>
	               alert("Wrong Username Or Password!!!");
	                </script>
	                 
					 <?php
     
           }
                    
	

}
?>