<?php
session_start();
$codeshop = $_SESSION['codeshop'];
include '../database.php';
if(isset($_POST["unit"]))
{
 $first_name = mysql_real_escape_string($_POST["unit"]);
 $query = "INSERT INTO unit(unit,shopcode) VALUES('$first_name','$codeshop')";
 if(mysql_query($query))
 {
  echo 'Data Inserted';
 }
}
?>