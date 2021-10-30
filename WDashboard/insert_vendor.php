<?php
session_start();
$codeshop = $_SESSION['codeshop'];
include '../database.php';
if(isset($_POST["vendor_name"]))
{
 $vendor_name = mysql_real_escape_string($_POST["vendor_name"]);
 $vendor_address = mysql_real_escape_string($_POST["vendor_address"]);
 $vendor_mobile = mysql_real_escape_string($_POST["vendor_mobile"]);
 $atc_name = mysql_real_escape_string($_POST["atc_name"]);
 $company_name = mysql_real_escape_string($_POST["company_name"]);
 $account_name = mysql_real_escape_string($_POST["account_name"]);

 $query = "INSERT INTO vendor(name,mobile,address,atc_name,company_name,account_name,shopcode) VALUES('$vendor_name','$vendor_mobile','$vendor_address','$atc_name','$company_name','$account_name','$codeshop')";
 $result = mysql_query($query);
 if($result)
 {
  echo 'Data Inserted';
 }else{
 	echo "nothing";
 }
}
?>

