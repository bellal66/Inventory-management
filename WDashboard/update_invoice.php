<?php

            session_start();
            $codeshop = $_SESSION['codeshop'];
            include '../database.php';

            $smoney=$_POST['Submit_money'];
            $owing_money=$_POST['owing_money'];
            $amount=$_POST['amount'];
            $bill =$_POST['bill_no'];
            $owing_money = $owing_money-$smoney;
           $sql= mysql_query("UPDATE invoice SET Submit_money='$smoney' , owing_money='$owing_money' WHERE bill_no='$bill'");
           $getname = mysql_query("SELECT * from invoice WHERE bill_no='$bill'");
           $row = mysql_fetch_array($getname);
           $name = $row['name'];

           $getbalance = mysql_query("SELECT * FROM  cash");
           while($row = mysql_fetch_array($getbalance)){
              $oldbalance = $row['balance'];}
              $newbalance = $oldbalance + $smoney;
              $date = date("Y-m-d");

              $insert_cash = mysql_query("INSERT INTO cash(name,datee,type,credit,balance,shopcode) VALUES('$name','$date','Invoice update','$smoney','$newbalance','$codeshop')");
             echo json_encode($sql);

?>