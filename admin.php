<?php
  session_start();
   if($_SESSION["isLogin"]!=true){
       header("Location: index.php");
       die();
    }
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="shortcut icon" type="png" href="s.png"/>
    <link rel="stylesheet" href="font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<style type="text/css">
	    body{
	    	margin: 0;
	    	padding: 0;
	    }
	    #header{
		   top: 0;
		   left: 0;
		   position: fixed;
           width: 100%;
           height: 60px;
           border-bottom:3px solid #ccc;
           background-color: white;
		}
		#content{
			margin-top: 70px;
			margin-left: 0;
		}
		.header{
			list-style: none;
		}
		.header li{
			float: left;
		}
		.header li a{
			display: block;
			color: #191919;
			text-decoration: none;
			font-size: 17px;
            padding: 8px 15px;
		}
		.active{
			background-color: green;
			border-radius: 25px;
		}
		#sidenav{
		   top: 70px;
		   left: 0;
		   position: fixed;
           width: 200px;
           height: 88%;
           border-right:3px solid #ccc;
		}
		#content{
			margin-top: 70px;
			margin-left: 210px;
			height: auto;
		}
		.sidenav_meno{
            padding: 0;
            margin: 0;
            width: 190px;
			list-style: none;
			display: block;
		}
		.sidenav_meno_2{
            margin: 0;
			list-style: none;
			display: block;
		}
		.sidenav_meno li a{
			display: block;
			color: #191919;
			text-decoration: none;
			font-size: 17px;
            padding: 8px 5px;
		}
		.sidenav_meno li a:hover{
			background-color: green;
			border-radius: 25px;
			margin-left: 10px;
			color: white;
		}
		.sidenav_meno_2 li a{
            display: block;
			color: #191919;
			text-decoration: none;
			font-size: 17px;
            padding: 6px 3px;
		}
		.active{
			background-color: green;
			border-radius: 25px;
		}
	</style>
</head>
<body>
  <div id="header">
  	<ul class="header">
  		<li style="font-size: 25px; font-family: cooper black;"><b>Suborno Electronics</b></li>
  		<li style="margin-left: 850px;"><a href="signout.php" class="active"><span style="color: white;">Sign Out</span> <i class="fa fa-smile-o" style="color: white;"></i></a></li>
  	</ul>
  </div>
  <div id="sidenav">
  	<ul class="sidenav_meno">
  		<li class="active"><a href="admin.php"><i class="fa fa-home"></i> <span>Profile</span></a></li>
  		<li><a href="addshop.php"><i class="fa fa-shopping-cart"></i> <span>Add Shop</span></a></li>
  		<li><a href="worker.php"><i class="fa fa-user-plus"></i> <span>Worker</span></a></li>
  		<li><a href="account.php"><i class="fa fa-bank"></i> <span>Account Setting</span></a></li>
  		<li><a href="workersetting.php"><i class="fa fa-gears"></i> <span>Worker Setting</span></a></li>
  	</ul>
  </div>
  <div id="content">
  	
  </div>
</body>
</html>