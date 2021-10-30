<?php
  session_start();
   if($_SESSION["isLogin"]!=true){
       header("Location: index.php");
       die();
    }
    $username = $_SESSION['username'];
    include 'database.php';
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
		.content2{
			margin-top: 80px;
			margin-left: 10px;
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
		.histroy{
         background-color: ;
         border: 1px solid gray;
         box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
        }
        #option1{
         float: left;
        }
        #option2{
         float: left;
        }
        @media (min-width:600px){
          #option1{
            width: 25.999%;
          }
          #option2{
            width: 30%;
          }
        }
        .container {
         top: 50px;
         border: 2px solid #ccc;
         background-color: #eee;
         border-radius: 5px;
         padding: 7px 7px 7px;
         margin: 16px 10px;
         width: 950px;
         height: 30px;
        }
        .container ul{
        	list-style: none;
        }
        .container ul li{
        	float: left;
        	width: 120px;
        	padding-bottom: 5px;
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
  	<div class="content2">
      
      <div class="histroy" id="option1" style="width: 245px; height: 40px;">
         <h4 style="text-align: center; margin-top: 9px;"><a href="#add" style="color: black;">Add Worker</a></h4>
       </div>
       <div class="histroy" id="option2" style="width: 245px; height: 40px;">
         <h4 style="text-align: center; margin-top: 9px;"><a href="#list"  style="color: black;">Worker's List</a></h4>
       </div><br>
        
       <div style="margin-top: 100px; width: 1015px; height: 610px; border: 1px solid #eee" id="add">
         <h4 style="text-align: center;">Add Worker</h4>
         <div style="background-color: white; border: 2px red">
          <style>

        .containerr {
           padding: 16px;
           background-color: white;
        }

        input[type=text], input[type=password] {
            width: 95%;
            padding: 10px;
            margin: 5px 0 5px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
         }

          input[type=text]:focus, input[type=password]:focus {
             background-color: #ddd;
             outline: none;
         }
         hr {
           border: 1px solid #f1f1f1;
           margin-bottom: 5px;
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
           .containerr b{
              text-align: center;
            }

           </style>
           <form action="add_worker.php" method="post">
              <div class="containerr">
                <label ><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pass" required>

                <label><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm Password" name="cpass" required>

                <label><b>Phon</b></label>
                <input type="text" placeholder="Enter Phon Number" name="phon" required>

                <label><b>Address</b></label>
                <input type="text" placeholder="Enter Address" name="address" required>

                <label><b>Shop Name</b></label>
                <input type="text" placeholder="Enter Shop Name" name="shopname" list="shopname" required>
                <datalist id="shopname">
                    <?php
                      $query  = "SELECT * from shopname";   
                      $result = mysql_query($query) or die(mysql_error());
                      while ($row= mysql_fetch_array($result)){
                      $name=$row['shopname'];
                    ?>
                    <option value="<?php echo $name ?> ">
                    <?php
                      }
                    ?>
                  </datalist>
                <label><b>Shop Name</b></label>
                <input type="text" placeholder="Enter Shop Code" name="shopcode" list="shopcode" required>
                <datalist id="shopcode">
                  <?php
                   $query  = "SELECT * from shopname";   
                   $result = mysql_query($query) or die(mysql_error());
                   while ($row= mysql_fetch_array($result)){
                   $code=$row['shopcode'];
                  ?>
                  <option value="<?php echo $code ?> ">
                  <?php
                    }
                  ?>
                </datalist>
                <hr>

                <button type="submit" class="registerbtn">Add</button>
                <button type="reset" class="registerbtn" style="background-color: red;">Clear</button>

                </div>
           </form>
         </div>
       </div><br>

       <div style="width: 1015px; height: 1425px; border: 1px solid #eee;" id="list">
        <button style="background-color: white; border: 1px solid white;" onclick="printContent('list')">p</button>
        <script>
         function printContent(el) {
         var restorepage = document.body.innerHTML;
         var printcontent = document.getElementById(el).innerHTML;
         document.body.innerHTML = printcontent;
         window.print();
         document.body.innerHTML = restorepage;
         }
        </script>

        <h4 style="text-align: center;">Worker's List</h4><br>
        <div class="container">
         <ul>
         	<li><span>Name</span></li>
         	<li style="width: 100px;">password</li>
         	<li style="width: 110px;">Phon</li>
         	<li style="width: 170px;">Address</li>
         	<li style="width: 130px;">Shop</li>
          <li style="width: 120px;">Shop Code</li>
         </ul>
       </div>

        <?php 
        $query  = "SELECT * from worker ";   
        $result = mysql_query($query) or die(mysql_error());
        while ($row= mysql_fetch_array($result)) {
          $namee=$row['name'];
          $name_length=strlen($namee);
      ?>

       <div class="container">
         <ul>
         	<li><span><?php echo $row['name']; ?> </span></li>
         	<li style="width: 100px;"><?php echo $row['pass']; ?></li>
         	<li style="width: 110px;"><?php echo $row['phon']; ?></li>
         	<li style="width: 170px;"><?php echo $row['address']; ?>.</li>
         	<li style="width: 130px;"><?php echo $row['shopname']; ?></li>
          <li style="width: 120px;"><?php echo $row['shopcode']; ?></li>
         	<li style="float: right;"><a href="deleteworker.php?id=<?=$row['id']?>">delete</a></li>
         </ul>
       </div>

       <?php
           }
        mysql_close(); 
       ?>
       </div>
     </div>
  </div>
</body>
</html>