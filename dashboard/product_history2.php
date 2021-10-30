<?php
session_start();
$codeshop = $_SESSION['codeshop'];
include '../database.php';
if(isset($_GET["itemcode"]))
  {
    $icode = (string)$_GET["itemcode"];
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
      height: 100%;
      width: 97%;
    }
    .product_list{
      margin-top: 30px;
      width: 100%;
      height: auto;
    }
    .customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

     .customers td, .customers th {
       border: 1px solid #ddd;
      }
     .customers tr:hover {background-color: #ddd;}
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
        <li class="active"><a href="home.php">Dashboard</a></li>
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
      <button style="position: absolute; left: 0;top: 30px;background-color: white; border: 1px solid white;" onclick="printContent('print')">p</button>
        <script>
         function printContent(el) {
         var restorepage = document.body.innerHTML;
         var printcontent = document.getElementById(el).innerHTML;
         document.body.innerHTML = printcontent;
         window.print();
         document.body.innerHTML = restorepage;
         }
        </script>
       <p style="margin-top: 10px;"><a href="product_history.php"><b>Back<<</b></a></p>
       <div class="product_list">
         <div>
           <input id="Input" style="width: 250px; height: 35px;" onkeyup="myFunction()" type="text" placeholder="Search...">
           <div id="print">
           <table style="margin-top: 20px; width: 100%; height: 100%;" class="customers" id="myTable">
             <thead>
              <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;">From Date</th>
                <th style="text-align: center;">Type</th>
                <th style="text-align: center;">Itemcode</th>
                <th style="text-align: center;">Quantity</th>
                <th style="text-align: center;">Avg cost</th>
                <th style="text-align: center;">Asset Value</th>
                <th style="text-align: center;">On Hand</th>
              </tr>
             </thead>
             <?php                 
                 $query  = "SELECT * from sale_itemcode WHERE shopcode='$codeshop' ORDER BY id DESC"; 
                 $result = mysql_query($query) or die(mysql_error());
                 $sale_qty=0;$sale_val=0;
                 $invoice_qty=0;$invoice_val=0;
                 $bill_qty=0;$bill_val=0;
                 while ($row= mysql_fetch_array($result)){
                   $i=0;
                   for($i=1; $i<=15; $i++){
                    $itemcode='itemcode'.$i;
                    $qty='qn'.$i;
                    $price='pe'.$i;
                    $amount='am'.$i;
                    $total_qty='tqn'.$i;
                    $name=$row[$itemcode];
                    if ($name==$icode.' '){
                      if($row['type']=='sale'){
                        $sale_qty+=$row[$qty];
                        $sale_val+=$row[$amount];
                      }
                      if($row['type']=='invoice'){
                        $invoice_qty+=$row[$qty];
                        $invoice_val+=$row[$amount];
                      }
                      if($row['type']=='bill'){
                        $bill_qty+=$row[$qty];
                        $bill_val+=$row[$amount];
                      }

               ?>
              <tbody>
               <tr id="tbody">
                <th style="text-align: center;"><?php echo $row['datee']; ?></th>
                 <th style="text-align: center;"><?php echo $row['type']; ?></th>
                 <th style="text-align: center;"><?php echo $row[$itemcode]; ?></th>
                 <?php 
                   if($row['type']=='bill'){
                 ?>
                 <th style="text-align: center;"><?php echo $row[$qty]; ?></th>
                 <?php
                  }else{
                 ?>
                 <th style="text-align: center;"><?php echo "-"; echo $row[$qty]; ?></th>
                 <?php
                   }
                 ?>
                 <th style="text-align: center;"><?php echo $row[$price]; ?></th>
                 <th style="text-align: center;"><?php echo $row[$amount]; ?></th>
                 <th style="text-align: center;"><?php echo $row[$total_qty]; ?></th>
               </tr>
              </tbody>
             <?php 
                }
               }
              }
             ?>
             <tfoot>
              <tr style="background-color: #eee;border-top:1pt solid black; color: red;">
                <th style="text-align: center;" colspan="3">Total Sale</th>
                <th style="text-align: center;"><?php echo $sale_qty; ?></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"><?php echo $sale_val; ?></th>
                <th style="text-align: center;"></th>
              </tr>
              <tr style="background-color: #eee;border-top:1pt solid black; color: red;">
                <th style="text-align: center;" colspan="3">Total Invoice</th>
                <th style="text-align: center;"><?php echo $invoice_qty; ?></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"><?php echo $invoice_val; ?></th>
                <th style="text-align: center;"></th>
              </tr>
              <tr style="background-color: #eee;border-top:1pt solid black; color: red;">
                <th style="text-align: center;" colspan="3">Total Bill</th>
                <th style="text-align: center;"><?php echo $bill_qty; ?></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"><?php echo $bill_val; ?></th>
                <th style="text-align: center;"></th>
              </tr>
             </tfoot>
          </table>
          </div>
        </div>

       </div>
     </div>
    </div>

  </div>

</body>
</html>

<script>
   $(document).ready(function(){
     $("#Input").on("keyup", function() {
       var value = $(this).val().toLowerCase();
     $("#myTable #tbody").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
     });
    });
   });
 </script>