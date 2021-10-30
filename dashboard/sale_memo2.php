<?php
session_start();
$codeshop = $_SESSION['codeshop'];
include '../database.php';
if(isset($_GET["id"]))
  {
    $type_no = (string)$_GET["id"];
    $namee = (string)$_GET["namee"];
    $date = (string)$_GET["date"];
  }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="script.js"></script>
  <script src="script2.js"></script>
  <style>
    .row.content {
      height: 1100px;
      width: 500px;
    }
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
      width: 300px;
    }
    @media screen and (max-width: 500px) {
      .sidenav {
        height: auto;
      }
      .row.content {height: auto;} 
    }
    .col-sm-3{
      background-color: black;
    }
    .nav{
      padding: 10px 10px;
    }
    .main-body{
      background-color: gray;
      position: absolute;
      left: 285px; top: 60px;
      height: 1100px;
      width: 1068px;
    }
    .col-sm-9{
      background-color: white;
      position: absolute;
      top: 15px;
      left: 15px;
      height: 98%;
      width: 97%;
    }
    .product_list{
      margin-top: 30px;
      width: 100%;
      height: auto;
    }
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

     #customers td, #customers th {
       border: 1px solid #ddd;
      }
     #customers tr:hover {background-color: #ddd;}
  </style>
</head>

<body>

  <!--   header -->
  <div><?php  include('header.php'); ?></div>

  <div class="row content">
    <div class="col-sm-3 sidenav">
      <ul style="list-style: none;">
      </ul>
      
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="add_product_page.php">Add Products</a></li>
        <li><a href="shop_product.php">Shop Products</a></li>
        <li><a href="expense.php">Expenses</a></li>
        <li><a href="sale.php">Sales</a></li>
        <li><a href="statistics.php">Statistics</a></li>
        <li><a href="invoice.php">invoice Maker</a></li>
        <li><a href="product_category.php">Product Categories</a></li>
        <li><a href="product_unit.php">Product Units</a></li>
        <li><a href="add_customer.php">Add Customer</a></li>
        <li><a href="add_vendor.php">Add Vendor</a></li>
        <li><a href="proloss.php">Profit/Loss</a></li>

      </ul><br>
   
    </div>
    

    <div class="main-body">
     <div class="col-sm-9">
      <button style="position: absolute; left: 0;top: 90px;background-color: white; border: 1px solid white;" onclick="printContent('print')">p</button>
        <script>
         function printContent(el) {
         var restorepage = document.body.innerHTML;
         var printcontent = document.getElementById(el).innerHTML;
         document.body.innerHTML = printcontent;
         window.print();
         document.body.innerHTML = restorepage;
         }
        </script> 

       <p style="margin-top: 10px;"><a href="sale_history.php"><b>Back<<</b></a></p>
       <p>Name: <?php echo $namee; ?></p>
       <p>Date: <?php echo $date; ?></p>
       <div class="product_list">

         <div id="print">
           <table style="width: 100%; height: 100%;" id="customers">
            <thead>
             <tr style="background-color: #ddd;">
              <th style="text-align: center; width:20%;" >Itemcode</th>
              <th style="text-align: center; width:30%;" >Description</th>
              <th style="text-align: center; width: 15%;">Qty</th>
              <th style="text-align: center; width: 15%;">Rate</th>
              <th style="text-align: center; width: 15%;">Amount</th>
             </tr>
            </thead>
            <?php 
              include '../database.php';

              $getprolist = mysql_query("SELECT * FROM  sale_itemcode WHERE shopcode='$codeshop' AND type='sale' AND type_no='$type_no' LIMIT 1");
              $row = mysql_fetch_array($getprolist);
            ?>
            <tbody>
              <?php
               if ($row['itemcode1'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode1']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds1']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn1']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe1']; ?></th>
               <th style="text-align: center;"><?php echo $row['am1']; ?></th>
             </tr>
              <?php
               }
               if ($row['itemcode2'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode2']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds2']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn2']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe2']; ?></th>
               <th style="text-align: center;"><?php echo $row['am2']; ?></th>
             </tr>
              <?php
               }
               if ($row['itemcode3'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode3']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds3']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn3']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe3']; ?></th>
               <th style="text-align: center;"><?php echo $row['am3']; ?></th>
             </tr>
             <?php
               }
               if ($row['itemcode4'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode4']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds4']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn4']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe4']; ?></th>
               <th style="text-align: center;"><?php echo $row['am4']; ?></th>
             </tr>
             <?php
              }
              if ($row['itemcode5'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode5']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds5']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn5']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe5']; ?></th>
               <th style="text-align: center;"><?php echo $row['am5']; ?></th>
             </tr>
             <?php
              }
              if ($row['itemcode6'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode6']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds6']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn6']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe6']; ?></th>
               <th style="text-align: center;"><?php echo $row['am6']; ?></th>
             </tr>
             <?php
              }
              if ($row['itemcode7'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode7']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds7']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn7']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe7']; ?></th>
               <th style="text-align: center;"><?php echo $row['am7']; ?></th>
             </tr>
             <?php
              }
              if ($row['itemcode8'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode8']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds8']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn8']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe8']; ?></th>
               <th style="text-align: center;"><?php echo $row['am8']; ?></th>
             </tr>
             <?php
              }
              if ($row['itemcode9'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode9']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds9']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn9']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe9']; ?></th>
               <th style="text-align: center;"><?php echo $row['am9']; ?></th>
             </tr>
             <?php
              }
              if ($row['itemcode10'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode10']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds10']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn10']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe10']; ?></th>
               <th style="text-align: center;"><?php echo $row['am10']; ?></th>
             </tr>
             <?php
              }
              if ($row['itemcode11'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode11']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds11']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn11']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe11']; ?></th>
               <th style="text-align: center;"><?php echo $row['am11']; ?></th>
             </tr>
             <?php
              }
              if ($row['itemcode12'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode12']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds12']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn12']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe12']; ?></th>
               <th style="text-align: center;"><?php echo $row['am12']; ?></th>
             </tr>
             <?php
              }
              if ($row['itemcode13'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode13']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds13']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn13']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe13']; ?></th>
               <th style="text-align: center;"><?php echo $row['am13']; ?></th>
             </tr>
             <?php
              }
              if ($row['itemcode14'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode14']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds14']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn14']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe14']; ?></th>
               <th style="text-align: center;"><?php echo $row['am14']; ?></th>
             </tr>
             <?php
              }
              if ($row['itemcode15'] != "") {
              ?>
             <tr>
               <th style="text-align: center;"><?php echo $row['itemcode15']; ?></th>
               <th style="text-align: center;"><?php echo $row['ds15']; ?></th>
               <th style="text-align: center;"><?php echo $row['qn15']; ?></th>
               <th style="text-align: center;"><?php echo $row['pe15']; ?></th>
               <th style="text-align: center;"><?php echo $row['am15']; ?></th>
             </tr>
             <?php
              }
             ?>
             <tr>
               <th colspan="4" style="text-align: center; color: red;">total</th>
               <th style="text-align: center; color: red;"><?php echo $row['balance']; ?></th>
             </tr>
             <?php
              mysql_close();
             ?>
            </tbody>
           </table>
        </div>

       </div>
     </div>
    </div>

  </div>

</body>
</html>

