<?php
 session_start(); 
  $_SESSION['isLogin'] = false;
  header("location:index.php");
?>