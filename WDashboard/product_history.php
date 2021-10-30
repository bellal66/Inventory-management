<?php
session_start();
if($_SESSION["isLogin"]!=true){
       header("Location: index.php");
       die();
  }
$codeshop = $_SESSION['codeshop'];
include '../database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="script.js"></script>
  <script src="script2.js"></script>
  <title>Statistics</title>
  <style>
    .row.content {
      height: 1500px;
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
      height: 1500px;
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
    tr{
      height: 30px;
    }
    .invoice_list{
      cursor: pointer;
    }
    .invoice_list:hover{
      background-color: #eee;
    }
    .histroy{
      background-color: ;
      border: 1px solid gray;
      box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
    }
    .customers {
        cursor: pointer;
    }
   .customers tr:hover {background-color: #eee;}
   @media print {
      a[href]:after {
        content: none !important;
      }
    }
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
      <button style="position: absolute; left: 0;top: 170px;background-color: white; border: 1px solid white;" onclick="printContent('print')">p</button>
        <script>
         function printContent(el) {
         var restorepage = document.body.innerHTML;
         var printcontent = document.getElementById(el).innerHTML;
         document.body.innerHTML = printcontent;
         window.print();
         document.body.innerHTML = restorepage;
         }
        </script>

       <div class="histroy" style="position: absolute; top: 10px; left: 10px; width: 245px; height: 40px;">
         <h4 style="text-align: center;"><a href="shop_product_history.php" style="color: black;">Shop History</a></h4>
       </div>
       <div class="histroy" style="position: absolute; top: 10px; left: 265px; width: 245px; height: 40px;">
         <h4 style="text-align: center;"><a href="sale_history.php" style="color: black;">Sale History</a></h4>
       </div>
       <div class="histroy" style="position: absolute; top: 10px; left: 520px; width: 245px; height: 40px;">
         <h4 style="text-align: center;"><a href="invoice_history.php" style="color: black;">Invoice History</a></h4>
       </div>
       <div class="histroy" style="position: absolute; top: 10px; left: 775px; width: 245px; height: 40px;">
         <h4 style="text-align: center;"><a href="product_history.php" style="color: black;">Product History</a></h4>
       </div>


       <div style="position: absolute; top: 70px; left: 10px; width: 98%; height: 94.7%;">
         <p style="padding-left: 420px; padding-top: 6px; font-size: 23px; font-family: copper black;">product History</p><hr>
         <div  style="position: absolute; top: 63px; width: 100%; height: 96.6%;">
           <div style="position: absolute; top: 10px;">
             <input id="Input" style="margin-left: 45px; width: 250px; height: 35px;" onkeyup="myFunction()" type="text" list="Productcode" placeholder="Search Itemcode">
             <datalist id="Productcode">
                <?php
                 $query  = "SELECT * from product WHERE shopcode='$codeshop'";   
                 $result = mysql_query($query) or die(mysql_error());
                 while ($row= mysql_fetch_array($result)){
                  $name=$row['name'];
                ?>
                <option value="<?php echo $name ?> ">

                  <?php
                    }
                  ?>
                    
                 </datalist>
           </div>
        
        <div id="print">
        <table cellspacing="0" width="100%" style="margin-top: 70px;" id="myTable" class="customers">
         <thead>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;">From Date</th>
                <th style="text-align: center;">Type</th>
                <th style="text-align: center;">Itemcode</th>
                <th style="text-align: center;">Quantity</th>
                <th style="text-align: center;">Avg cost</th>
                <th style="text-align: center;">Asset Value</th>
                <th style="text-align: center;">On Hand</th>
                <th style="text-align: center;"></th>
            </tr>
         </thead>
            
              <?php 
                include '../database.php';
                
                 $query  = "SELECT * from sale_itemcode WHERE shopcode='$codeshop' ORDER BY id DESC LIMIT 7"; 
                 $result = mysql_query($query) or die(mysql_error());
                 while ($row= mysql_fetch_array($result)){
                   $i=0;
                   for($i=1; $i<=15; $i++){
                    $itemcode='itemcode'.$i;
                    $qty='qn'.$i;
                    $price='pe'.$i;
                    $amount='am'.$i;
                    $total_qty='tqn'.$i;
                    if($row[$itemcode]!=""){
                      $name=$row[$itemcode];
               ?>
         <tbody>
           <tr id="tbody">
             <th style="text-align: center;"><?php echo $row['datee']; ?></th>
                <th style="text-align: center;"><?php echo $row['type']; ?></th>
                <th style="text-align: center;"><a href="product_history2.php?itemcode=<?=$name?>"><?php echo $name; ?></a></th>
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
            <tr style="background-color: #eee;border-top:1pt solid black;">
                <th style="text-align: center;">To Date</th>
                <th style="text-align: center;">Type</th>
                <th style="text-align: center;">Itemcode</th>
                <th style="text-align: center;">Quantity</th>
                <th style="text-align: center;">Avg cost</th>
                <th style="text-align: center;">Asset Value</th>
                <th style="text-align: center;">On Hand</th>
            </tr>
         </tfoot>
 
       </table> <br><br>
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
