<?php
  $name=$_POST['name']; 

 include 'database.php';

  $delete = mysql_query("DELETE FROM shopname WHERE shopname='$name'");
  if($delete){
    echo "<script>
    alert('Successfully Deleted !');
    window.location.href='addshop.php';
    </script>";
      
  }else {
    echo "<script>
    alert('Error in Deleting...Please try again later !');
    window.location.href='addshop.php';
    </script>";
  } 
?>