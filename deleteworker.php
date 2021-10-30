<?php
if(isset($_GET["id"]))
  {
    $id = (string)$_GET["id"];
  }

  include 'database.php';

  $delete = mysql_query("DELETE FROM worker WHERE id='$id'");
  if($delete){
    echo "<script>
    alert('Successfully Deleted !');
    window.location.href='worker.php';
    </script>";
      
  }else {
    echo "<script>
    alert('Error in Deleting...Please try again later !');
    window.location.href='worker.php';
    </script>";
  } 
?>