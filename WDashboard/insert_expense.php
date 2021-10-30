<?php
session_start();
$codeshop = $_SESSION['codeshop'];
include '../database.php';

if(isset($_POST["ex_name"]))
{
 $ex_name = mysql_real_escape_string($_POST["ex_name"]);
 $ex_description = mysql_real_escape_string($_POST["ex_description"]);
 $amount = mysql_real_escape_string($_POST["amount"]);
 $date = mysql_real_escape_string($_POST["date"]);

 $query = "INSERT INTO expense(ex_name,ex_description,amount,datee,shopcode) VALUES('$ex_name','$ex_description','$amount','$date','$codeshop')";
 $result = mysql_query($query);

  $getbalance = mysql_query("SELECT * FROM  cash");
  while($row = mysql_fetch_array($getbalance)){
  $oldbalance = $row['balance'];}
  $newbalance = $oldbalance - $amount;

  $insert_cash = mysql_query("INSERT INTO cash(name,datee,type,debit,balance,shopcode) VALUES('$ex_name','$date','Expense','$amount','$newbalance','$codeshop')"); 

 if($result && $insert_cash)
 {
  echo 'Data Inserted';
 }else{
 	echo "nothing";
 }
}
?>

