<?php
include 'database.php';

$username=$_POST['username']; 
$password=$_POST['password']; 
$shopcode=$_POST['shopcode']; 

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql="SELECT * FROM worker WHERE name='$username' AND pass='$password' AND shopcode='$shopcode'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$row= mysql_fetch_array($result);
$shopname = $row['shopname'];

   if($count==1){
     
    session_start(); 
    $_SESSION['username'] = $username;
    $_SESSION['codeshop'] = $shopcode;
    $_SESSION['shopname'] = $shopname;
    $_SESSION['isLogin'] = true;
    header("location: WDashboard/header.php");
    header("location: WDashboard/home.php");    
    }else {
   $error= "Wrong Username or Password";
    }
?>

<!DOCTYPE html>
<html lang="en">
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
    </div>
  </div>
</nav>

    <div style="padding-top: 30px; padding-bottom: 30px;"></div>

    <div id="show">
<div class="container">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div style="margin-left: 130px;" class="col-xs-6">
                <a href="#" class="active" id="login-form-link">Login</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="workerlogin.php" method="post" role="form" style="display: block;">
                   <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="text" name="shopname" id="username" tabindex="1" class="form-control" placeholder="Shop Code" value="">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Login">
                        <center><h2 style="color: red"> <?php echo $error; ?> </h2></center>
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
 </body>
</html>