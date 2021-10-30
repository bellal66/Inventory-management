<?php

include 'database.php';

session_start();

// username and password sent from form 
$name=$_POST['username']; 
$password=$_POST['password'];
$cpassword=$_POST['confirm_password'];
$email=$_POST['email']; 

// To protect MySQL injection (more detail about MySQL injection)
$name = stripslashes($name);
$password = stripslashes($password);
$name = mysql_real_escape_string($name);
$password = mysql_real_escape_string($password);

   $username="";
   $getusername = mysql_query("SELECT * FROM user WHERE username='$name'");
   $row = mysql_fetch_array($getusername);
   $username= $row['username'];
   $success_message="";
   $error_message="";

   if(strlen($username)>0){
           $error_message = "That username already exist!";
     }else{

            if ($password==$cpassword) {

                $insert= mysql_query("INSERT INTO user(username, password, email) VALUES ('$name','$password','$email')");
       
                     if($insert){
			             $success_message = "Successfully Registered!";
			
                        }else {
			              $error_message = "Error in registering...Please try again later!" ;
                           }		
             }else{
                  $error_message = "Password error!";
                 }	
        }

?>

<html>

 <head>
    <link href="style.css" rel="stylesheet" id="bootstrap-css">
	<link href="style2.css" rel="stylesheet">
	<link href="sign.css" rel="stylesheet">
    <script src="script.js"></script>
    <script src="script2.js"></script>
  </head>
<!------ Include the above in your HEAD tag ---------->
   <body>

   	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <li><a href="signinup.php"><span class="glyphicon glyphicon-log-in"></span>Sign in-up</a></li>
      </ul>
       
    </div>
  </div>
</nav>

   	<div style="padding-top:30px; padding-bottom: 30px;"> <center><h2><?php echo $success_message;echo $error_message;?></h2></center></div>

   	<div id="show">
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="login.php" method="post" role="form" style="display: block;">
								   <div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Login">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="regi.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
	<script>
	   $(function() {

          $('#login-form-link').click(function(e) {
		     $("#login-form").delay(100).fadeIn(100);
 		     $("#register-form").fadeOut(100);
		     $('#register-form-link').removeClass('active');
		     $(this).addClass('active');
		     e.preventDefault();
	      });
	      $('#register-form-link').click(function(e) {
		     $("#register-form").delay(100).fadeIn(100);
 		     $("#login-form").fadeOut(100);
		     $('#login-form-link').removeClass('active');
		     $(this).addClass('active');
		      e.preventDefault();
	      });

        });

	</script>
   </body>
</html>