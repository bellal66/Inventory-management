<?php

include '../database.php';
session_start();
$namee=$_SESSION['namee'];

$pname=$_POST['pname'];
$buying_price=$_POST['buying_price'];
$buying_price=(int)$buying_price;
$selling_price=$_POST['selling_price'];
$selling_price=(int)$selling_price;
$qty=$_POST['qty'];
$income_account=$_POST['income_account'];
$cogs_account=$_POST['cogs_account'];
$barcode=$_POST['barcode'];
$product_category=$_POST['product_category'];
$product_unit=$_POST['product_unit'];
$expire_date=$_POST['expire_date'];

          $insert= mysql_query("UPDATE product set name='$pname', buying_price='$buying_price', selling_price='$selling_price', barcode='$barcode', qty='$qty', income_account='$income_account', cogs_account='$cogs_account', product_category='$product_category', product_unit='$product_unit', expire_date='$expire_date' where name='$namee'");

          echo json_encode($insert);
?>
