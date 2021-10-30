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
		#option1{
         float: left;
        }
        #option2{
         float: left;
        }
        @media (min-width:600px){
          #option1{
            width: 40%;
          }
          #option2{
            width: 50%;
          }
        }
        #shopname{
         float: left;
        }
        #shopmanage{
         float: left;
        }
        @media (min-width:600px){
          #shopname{
            width: 70%;
          }
          #shopmanage{
            width: 30%;
          }
        }
        #img{
         float: left;
        }
        #name{
         float: left;
        }
        @media (min-width:600px){
          #img{
            width: 30%;
          }
          #name{
            width: 50%;
          }
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
    <div>
      <div style="margin-left: 70%; margin-top: 30px; border: 1px solid #eee; width: 150px; height: 40px; box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);">
       <a href="#" onclick="toggle_visibility('option2');">
       	<div style="color: green; margin-left: 20px; margin-top: 14px; color: green; cursor: pointer;">
         <i class="fa fa-plus"></i> <b>NEW SHOP</b>
        </div>
       </a>
      </div>
      <div id="option1" style="margin-left: 50px; margin-top: 50px;">
      	<span style="font-size: 20px; margin-left: 20px; margin-top: 10px;">Shop Account</span><hr><hr>
        <div>
           <?php
                 include 'database.php';
                 $getshop = mysql_query("SELECT * FROM shopname");
                 while ($row= mysql_fetch_array($getshop)) {
                    $id=$row['id'];
             ?>
             <div>
               <div id="shopname">
               	<div id="img">
               		<div style="margin-left: 20px; margin-top: 20px; width: 80px; height: 80px; background-color: green">
               			<i style="margin-left: 13px; margin-top: 18px; color: white; font-size: 45px;" class="fa fa-shopping-cart"></i>
               		</div>
               	</div>
               	<div id="name">
                 <div style="margin-left: 5px; width: 200px; height: 60px;">
                   <h4 style="margin-left: 5px; width: 100px;"><?php echo $row["shopname"]; ?></h4>
                   <h5 style="margin-left: 5px; width: 100px; height: 50px;"><?php echo $row["shopcode"]; ?></h5>
               	 </div>
                </div>
               </div>
               <div id="shopmanage">
                <h5 style="float: right; margin-top: 47px;"><a href="manageaccount.php?id=<?=$id?>">Manage Account</a></h5>
               </div>
             </div><br>
            <?php
              }
              mysql_close();
            ?>
        </div> 
      </div>
      <div id="option2" style="margin-left: 50px; margin-top: 50px; display: none;">
      	<style type="text/css">
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
           <form action="addshopinsert.php" method="post">
              <div class="containerr">
                <label ><b>Shop Name</b></label>
                <input type="text" placeholder="Enter Name(Suborno)" name="name" required>

                <label><b>Shop Code</b></label>
                <input type="text" placeholder="Enter Code(S123)" name="code" required>
                <hr>

                <button type="submit" class="registerbtn">Add</button>
                <button type="reset" class="registerbtn" style="background-color: red;">Clear</button>

                </div>
           </form>
      </div>
    </div>
  </div>
</body>
</html>
<script language="JavaScript">
        function toggle_visibility(id) {
        var e = document.getElementById(id);
                  if(e.style.display == 'block')
                     e.style.display = 'none';
                  else
                     e.style.display = 'block';
        }
</script>