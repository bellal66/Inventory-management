<?php

include '../database.php';
session_start();
$namee=$_SESSION['namee'];

          $insert= mysql_query("DELETE from product where name='$namee'");
       
           if($insert){
            echo "<script>
               alert('Successfully Deleted.');
               window.location.href='add_product_page.php';
               </script>";
      
             }else {
              echo "<script>
               alert('Error in Deleting!');
               window.location.href='add_product_page.php';
               </script>";
               }    

?>
