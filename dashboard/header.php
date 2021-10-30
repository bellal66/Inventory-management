<?php
include '../database.php';
 $codeshop = $_SESSION['codeshop'];
 $query  = "SELECT * FROM shopname WHERE shopcode='$codeshop'";   
 $result = mysql_query($query) or die(mysql_error());
 $row= mysql_fetch_array($result);
 $shopname=$row['shopname'];
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
  <div style="position: absolute; right: 85px; top: 10px;">
    <h4 style="cursor: pointer;">
      <?php 
        $name=$_SESSION['username'];
        echo $name; 
      ?>
    </h4>
  </div>
  <div style="position: absolute; right: 160px; top: 11px; height: 40px; width: 40px;">
    <img src="contact.jpg" style="height: 100%; width: 100%; border-radius: 50%">
  </div>
  <div style="position: absolute; right: 240px; top: 11px; height: 40px; width: 140px;">
    <h4 style="cursor: pointer;">
      <?php 
        echo $shopname; 
      ?>
    </h4>
  </div>

</body>
</html>