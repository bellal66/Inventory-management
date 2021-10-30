<?php
if(isset($_GET["id"]))
  {
    $id = (string)$_GET["id"];
  }

  include '../database.php';

  $delete = mysql_query("DELETE FROM expense WHERE id='$id'");
  if($delete){
    echo "<script>
    alert('Successfully Deleted !');
    window.location.href='expense.php';
    </script>";
  }else {
    echo "<script>
    alert('Error in Deleting...Please try again later !');
    window.location.href='expense.php';
    </script>";
  } 
?>