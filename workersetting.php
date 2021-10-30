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
		.container {
           display: block;
           position: relative;
           padding-left: 35px;
           margin-bottom: 12px;
           cursor: pointer;
           font-size: 22px;
           -webkit-user-select: none;
           -moz-user-select: none;
           -ms-user-select: none;
           user-select: none;
          }
         .container input {
           position: absolute;
           opacity: 0;
           cursor: pointer;
           height: 0;
           width: 0;
          }
          .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
           }
           .container:hover input ~ .checkmark {
            background-color: #ccc;
            }
           .container input:checked ~ .checkmark {
            background-color: #2196F3;
            }
           .checkmark:after {
             content: "";
             position: absolute;
             display: none;
             }
            .container input:checked ~ .checkmark:after {
             display: block;
              }
            .container .checkmark:after {
              left: 9px;
               top: 5px;
               width: 5px;
               height: 10px;
               border: solid white;
               border-width: 0 3px 3px 0;
               -webkit-transform: rotate(45deg);
               -ms-transform: rotate(45deg);
               transform: rotate(45deg);
               }
           .registerbtn {
                background-color: #4CAF50;
                color: white;
                padding: 10px 15px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 20%;
                opacity: 0.9;
           }

           .registerbtn:hover {
                opacity: 1;
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
  	 <div style="margin-left: 200px; margin-top: 100px;">
  	 	<?php
          include 'database.php';
          $query  = "SELECT * FROM workerpage";   
          $result = mysql_query($query) or die(mysql_error());
          $row= mysql_fetch_array($result);
          $check="checked";
  	 	?>
  	  <form action="insertworkerpage.php" method="post">
  	 	What Page can control ?? (Worker)<br><br><br>
  	 	<label class="container">Add Product
  	 	  <?php 
  	 	    if($row['addproduct']=='1'){
  	 	   ?>
  	 	    <input type="checkbox" checked id="1" value="1" name="addproduct">
  	 	   <?php
  	 	    }else{
  	 	   ?>
          <input type="checkbox" id="1" value="1" name="addproduct"> <span class="fa fa-lock"></span> 
  	 	  <?php
  	 	    }
  	 	  ?>
        <span class="checkmark"></span>

        </label>
        <label class="container">Shop Product
          <?php 
  	 	    if($row['shopproduct']=='1'){
  	 	   ?>
  	 	   <input type="checkbox" checked id="2" value="1" name="shopproduct">
  	 	   <?php
  	 	    }else{
  	 	   ?>
          <input type="checkbox" id="2" value="1" name="shopproduct"> <span class="fa fa-lock"></span> 
  	 	  <?php
  	 	    }
  	 	  ?>
          <span class="checkmark"></span>
        </label>
        <label class="container">Expense
          <?php 
  	 	    if($row['expense']=='1'){
  	 	   ?>
  	 	    <input type="checkbox" checked id="3" value="1" name="expense">
  	 	   <?php
  	 	    }else{
  	 	   ?>
          <input type="checkbox" id="3" value="1" name="expense"> <span class="fa fa-lock"></span> 
  	 	  <?php
  	 	    }
  	 	  ?>
          <span class="checkmark"></span>
        </label>
        <label class="container">Sale
          <?php 
  	 	    if($row['sale']=='1'){
  	 	   ?>
  	 	    <input type="checkbox" checked id="4" value="1" name="sale">
  	 	   <?php
  	 	    }else{
  	 	   ?>
          <input type="checkbox" id="4" value="1" name="sale"> <span class="fa fa-lock"></span> 
  	 	  <?php
  	 	    }
  	 	  ?>
          <span class="checkmark"></span>
        </label>
        <label class="container">Invoice Maker
          <?php 
  	 	    if($row['invoice']=='1'){
  	 	   ?>
  	 	    <input type="checkbox" checked id="5" value="1" name="invoice">
  	 	   <?php
  	 	    }else{
  	 	   ?>
          <input type="checkbox" id="5" value="1" name="invoice"> <span class="fa fa-lock"></span> 
  	 	  <?php
  	 	    }
  	 	  ?>
          <span class="checkmark"></span>
        </label>
        <label class="container">Product Category
          <?php 
  	 	    if($row['category']=='1'){
  	 	   ?>
  	 	    <input type="checkbox" checked id="6" value="1" name="category">
  	 	   <?php
  	 	    }else{
  	 	   ?>
          <input type="checkbox" id="6" value="1" name="category"> <span class="fa fa-lock"></span> 
  	 	  <?php
  	 	    }
  	 	  ?>
          <span class="checkmark"></span>
        </label>
        <label class="container">Product Unit
           <?php 
  	 	    if($row['unit']=='1'){
  	 	   ?>
  	 	    <input type="checkbox" checked id="7" value="1" name="unit">
  	 	   <?php
  	 	    }else{
  	 	   ?>
          <input type="checkbox" id="7" value="1" name="unit"> <span class="fa fa-lock"></span> 
  	 	  <?php
  	 	    }
  	 	  ?>
          <span class="checkmark"></span>
        </label>
        <label class="container">Add Customer
          <?php 
  	 	    if($row['customer']=='1'){
  	 	   ?>
  	 	    <input type="checkbox" checked id="8" value="1" name="customer">
  	 	   <?php
  	 	    }else{
  	 	   ?>
          <input type="checkbox" id="8" value="1" name="customer"> <span class="fa fa-lock"></span> 
  	 	  <?php
  	 	    }
  	 	  ?>
          <span class="checkmark"></span>
        </label>
        <label class="container">Add Vendor
          <?php 
  	 	    if($row['vendor']=='1'){
  	 	   ?>
  	 	    <input type="checkbox" checked id="9" value="1" name="vendor">
  	 	   <?php
  	 	    }else{
  	 	   ?>
          <input type="checkbox" id="9" value="1" name="vendor"> <span class="fa fa-lock"></span> 
  	 	  <?php
  	 	    }
  	 	  ?>
          <span class="checkmark"></span>
        </label>
        <label class="container">Profit / Loss
          <?php 
  	 	    if($row['proloss']=='1'){
  	 	   ?>
  	 	    <input type="checkbox" checked id="10" value="1" name="proloss">
  	 	   <?php
  	 	    }else{
  	 	   ?>
          <input type="checkbox" id="10" value="1" name="proloss"> <span class="fa fa-lock"></span> 
  	 	  <?php
  	 	    }
  	 	  ?>
          <span class="checkmark"></span>
        </label>
        <label class="container">Statistics
          <?php 
  	 	    if($row['statistics']=='1'){
  	 	   ?>
  	 	    <input type="checkbox" checked id="11" value="1" name="statistics">
  	 	   <?php
  	 	    }else{
  	 	   ?>
          <input type="checkbox" id="11" value="1" name="statistics"> <span class="fa fa-lock"></span> 
  	 	  <?php
  	 	    }
  	 	  ?>
          <span class="checkmark"></span>
        </label>

        <button type="submit" class="registerbtn" name="submit">Submit</button>
       </form>
       <?php
         mysql_close();
       ?>
  	 </div>
  </div>
</body>
</html>