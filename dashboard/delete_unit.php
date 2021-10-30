<?php
if(isset($_GET["id"]))
  {
    $id = (string)$_GET["id"];
  }

  include '../database.php';

  $delete = mysql_query("DELETE FROM unit WHERE sl_no='$id'");
  if($delete){
    echo "<script>
    alert('Successfully Deleted !');
    window.location.href='product_unit.php';
    </script>";
  }else {
    echo "<script>
    alert('Error in Deleting...Please try again later !');
    window.location.href='product_unit.php';
    </script>";
  } 
?>