<?php

    include '../database.php';

    if( isset( $_POST['itemcode'] ) ){

      $itemcode = $_POST['itemcode'];

      	$sendtable = "SELECT * FROM product WHERE name='" . $itemcode . "' OR barcode='" . $itemcode . "' LIMIT 1"; 
        $result = mysql_query($sendtable);
        $row = mysql_fetch_array($result);
         
         echo json_encode($row);
    }

?>
