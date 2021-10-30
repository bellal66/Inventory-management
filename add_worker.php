<?php
include 'database.php';
session_start();

$name=$_POST['name']; 
$password=$_POST['pass'];
$cpassword=$_POST['cpass'];
$phon=$_POST['phon']; 
$address=$_POST['address'];
$shopname=$_POST['shopname'];
$shopcode=$_POST['shopcode'];

$name = stripslashes($name);
$password = stripslashes($password);
$name = mysql_real_escape_string($name);
$password = mysql_real_escape_string($password);

    if ($password==$cpassword) {

          $insert= mysql_query("insert into worker(name, pass, phon, address, shopname, shopcode) values ('$name','$password','$phon','$address','$shopname','$shopcode')");
       
           if($insert){
            echo "<script>
               alert('Successfully Added !');
               window.location.href='worker.php';
               </script>";
             }else {
              echo "<script>
               alert('Error in Adding...Please try again later !');
               window.location.href='worker.php';
               </script>";
               }    
      }else{
         echo "<script>
               alert('Password error !');
               window.location.href='worker.php';
               </script>";
      }  
?>
