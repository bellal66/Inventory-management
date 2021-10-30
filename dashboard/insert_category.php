<?php
session_start();
$codeshop = $_SESSION['codeshop'];
include '../database.php';
if(isset($_POST["cname"]))
{
 $first_name = mysql_real_escape_string($_POST["cname"]);
 $query = "INSERT INTO category_unit(category,shopcode) VALUES('$first_name','$codeshop')";
 if(mysql_query($query))
 {
  echo 'Data Inserted';
 }
}
?>