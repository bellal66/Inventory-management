<?php
include 'database.php';
$name=$_POST['name']; 
$code=$_POST['code'];

$name = stripslashes($name);
$code = stripslashes($code);

          $insert= mysql_query("insert into shopname(shopname, shopcode) values ('$name','$code')");
       
           if($insert){
            echo "<script>
               alert('Successfully Added !');
               window.location.href='addshop.php';
               </script>";
      
             }else {
              echo "<script>
               alert('Error in Adding...Please try again later !');
               window.location.href='addshop.php';
               </script>";
               }    

?>
