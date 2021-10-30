<?php

session_start();
$codeshop = $_SESSION['codeshop'];
include '../database.php';

$name=$_POST['name'];
$buying_price=$_POST['buying_price'];
$buying_price=(int)$buying_price;
$selling_price=$_POST['selling_price'];
$selling_price=(int)$selling_price;
$barcode=$_POST['barcode'];
$description = $_POST['description'];
$preferred_vendor = $_POST['vendor'];
$product_category=$_POST['product_category'];
$product_unit=$_POST['product_unit'];
$income_account = $_POST['income_account'];
$cogs_account = $_POST['cogs_account'];
$date=$_POST['expire_date'];
$qty = "0";


          $insert= mysql_query("insert into product(name, buying_price, selling_price, barcode, description, product_category, product_unit, expire_date, income_account, cogs_account, preferred_vendor, qty, shopcode) values ('$name','$buying_price','$selling_price','$barcode','$description','$product_category','$product_unit','$date','$income_account','$cogs_account','$preferred_vendor','$qty','$codeshop')");
       
           if($insert){
            echo "<script>
               alert('Successfully Added !');
               window.location.href='add_product_page.php';
               </script>";
      
             }else {
              echo "<script>
               alert('Error in Adding...Please try again later !');
               window.location.href='add_product_page.php';
               </script>";
               }    

?>
