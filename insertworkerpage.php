<?php

include 'database.php';

   $addproduct=$_POST['addproduct']; 
   $shopproduct=$_POST['shopproduct'];
   $expense=$_POST['expense'];
   $sale=$_POST['sale']; 
   $invoice=$_POST['invoice'];
   $category=$_POST['category'];
   $unit=$_POST['unit'];
   $customer=$_POST['customer'];
   $vendor=$_POST['vendor'];
   $proloss=$_POST['proloss'];
   $statistics=$_POST['statistics'];

    $insert= mysql_query("UPDATE workerpage SET addproduct='$addproduct', shopproduct='$shopproduct', expense='$expense', sale='$sale', invoice='$invoice', category='$category', unit='$unit', customer='$customer', vendor='$vendor', proloss='$proloss', statistics='$statistics'");

    if($insert){
      echo "<script>
      alert('Successfully Added !');
      window.location.href='workersetting.php';
      </script>";
    }else {
      echo "<script>
      alert('Error in Adding...Please try again later !');
      window.location.href='workersetting.php';
      </script>";
    } 

?>
