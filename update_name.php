<?php

include 'database.php';
session_start();

$name=$_POST['name']; 
$password=$_POST['password'];

$name = stripslashes($name);
$password = stripslashes($password);

   $getpassword = mysql_query("SELECT * FROM user WHERE password='$password'");
   $row = mysql_fetch_array($getpassword);
   $cpassword= $row['password'];


    if ($password==$cpassword) {

          $insert= mysql_query("update user set username='$name' where password='$password'");
       
           if($insert){
            echo "<script>
               alert('Successfully Updated !');
               window.location.href='account.php';
               </script>";
      
             }else {
              echo "<script>
               alert('Error in Updating...Please try again later !');
               window.location.href='account.php';
               </script>";
               }    
      }else{
         echo "<script>
               alert('Password error !');
               window.location.href='account.php';
               </script>";
      }  

?>
