<?php
 if($_SESSION["isLogin"]!=true){
       header("Location: index.php");
       die();
  }else{
  $shopname = $_SESSION['shopname'];
  $username = $_SESSION['username'];
  $shopcode = $_SESSION['shopcode'];
  $_SESSION['shopcode'] = $shopcode;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="png" href="s.png"/>
<style>

.topnav {
  overflow: hidden;
  background-color: white;
  height: 60px;
}
.topnav ul{
  list-style: none;
  float: left;
}
.topnav ul li{
}
</style>
</head>
<body>
<div class="topnav">
  <ul>
    <li><h3 style="font-family: copper-black;"><b>Suborno Elrctronics</b></h3></li>
  </ul>
  <div style="position: absolute; right: 185px; top: 10px;">
    <h4 style="cursor: pointer;">
      <?php 
        $name=$_SESSION['username'];
        echo $name; 
      ?>
    </h4>
  </div>
  <div style="position: absolute; right: 260px; top: 11px; height: 40px; width: 40px;">
    <img src="contact.jpg" style="height: 100%; width: 100%; border-radius: 50%">
  </div>
  <a href="signout.php">
    <div style="position: absolute; right: 100px; top: 20px; height: 40px; width: 40px;">
     <b style="cursor: pointer;">LOGOUT</b>
    </div>
  </a>
  <div style="position: absolute; right: 340px; top: 11px; height: 40px; width: 140px;">
    <h4 style="cursor: pointer;">
      <?php 
        echo $shopname; 
      ?>
    </h4>
  </div>
</div>

</body>
</html>