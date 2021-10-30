<?php
session_start();
$codeshop = $_SESSION['codeshop'];
include '../database.php';
if(isset($_POST["customer_name"]))
{
 $customer_name = mysql_real_escape_string($_POST["customer_name"]);
 $customer_address = mysql_real_escape_string($_POST["customer_address"]);
 $customer_mobile = mysql_real_escape_string($_POST["customer_mobile"]);
 $customer_group = mysql_real_escape_string($_POST["customer_group"]);

 $query = "INSERT INTO customer(name,mobile,address,groupp,shopcode) VALUES('$customer_name','$customer_mobile','$customer_address','$customer_group','$codeshop')";
 $result = mysql_query($query);
 if($result)
 {
  echo 'Data Inserted';
 }else{
 	echo "nothing";
 }
}
?>

