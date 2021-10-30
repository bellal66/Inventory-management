<?php
include 'database.php';
session_start();

$npassword=$_POST['npassword']; 
$opassword=$_POST['opassword'];

$npassword = stripslashes($npassword);
$opassword = stripslashes($opassword);

   $getpassword = mysql_query("SELECT * FROM user WHERE password='$opassword'");
   $row = mysql_fetch_array($getpassword);
   $cpassword= $row['password'];


    if ($opassword==$cpassword) {

          $insert= mysql_query("update user set password='$npassword' where password='$opassword'");
       
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
