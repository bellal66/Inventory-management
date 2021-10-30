<?php
session_start();
 if($_SESSION["isLogin"]!=true){
       header("Location: index.php");
       die();
  }else{
  $shopname = $_SESSION['shopname'];
  $username = $_SESSION['username'];
  $codeshop = $_SESSION['codeshop'];
}
include '../database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="shortcut icon" type="png" href="s.png"/>
  <script src="script.js"></script>
  <script src="script2.js"></script>
  <title>Suborno Electric</title>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
      height: 800px;
      width: 500px;
    }
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
      width: 300px;
    }
        
    /* On small screens, set height to 'auto' for sidenav and grid */
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
      height: 800px;
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
     <div class="col-sm-9" id="print">
     	<button style="position: absolute; left: 0;top: 0;background-color: white; border: 1px solid white;" onclick="printContent('print')">p</button>
        <script>
         function printContent(el) {
         var restorepage = document.body.innerHTML;
         var printcontent = document.getElementById(el).innerHTML;
         document.body.innerHTML = printcontent;
         window.print();
         document.body.innerHTML = restorepage;
         }
        </script>

       <a href="proloss.php"><div style="position: absolute; top: 35px; left: 50px; width: 245px; height: 100px;">
        <img src="profitLoss.png" style="height: 60%; width: 60%">
         <div style="position: absolute; left: 50px; top: 70%; font-size: 15px;color: green"><b>ProfilLoss</b></div>
       </div></a>
       <a href="shop_product.php"><div style="position: absolute; top: 10px; left: 265px; width: 245px; height: 100px; background-color: green;">
         <img src="product.jpg" style="height: 100%; width: 100%">
         <div style="position: absolute; left: 78px; top: 95%; font-size: 15px;color: green"><b>Shop Product</b></div>
       </div></a>
       <a href="add_product_page.php#list"><div style="position: absolute; top: 10px; left: 520px; width: 245px; height: 100px; background-color: green;">
         <img src="stock.jpg" style="height: 100%; width: 100%">
         <div style="position: absolute; left: 70px; top: 95%; font-size: 15px;color: green"><b>Stock Product</b></div>
       </div></a>
       <a href="statistics.php"><div style="position: absolute; top: 10px; left: 775px; width: 245px; height: 100px; background-color: green;">
         <img src="chart.jpg" style="height: 100%; width: 100%">
         <div style="position: absolute; left: 70px; top: 95%; font-size: 15px;color: green"><b>Sale History</b></div>
       </div></a>

       <!-- Statistics bar diagram -->
       <style>
          @font-face {
             font-family: 'Roboto';
             font-style: normal;
             font-weight: 400;
               }
           #bar_part{
            position: absolute;
            left: 15px;
            top: 150px;
            width: 97%;
            height: 70%;
            background: #30303A;
           }
           #chart {
             position: absolute;
             left: 200px;
             top: 50px;
             width: 800px;
             height: 80%;
             margin: 30px auto 0;
             display: block;
             background: #30303A;
             font-family: Roboto;
             }
           #chart #numbers {
             width: 50px;
             height: 100%;
             margin: 0;
             padding: 0;
             display: inline-block;
             float: left;
               }
           #chart #numbers li {
             text-align: right;
             padding-right: 1em;
             list-style: none;
             height: 29px;
             border-bottom: 1px solid #444;
             position: relative;
             bottom: 30px;
             }
         #chart #numbers li:last-child {
           height: 30px;
          }
         #chart #numbers li span {
           color: #eee;
           position: absolute;
           bottom: 0;
           right: 10px;
          }
         #chart #bars {
           display: inline-block;
           background: rgba(0, 0, 0, 0.2);
           width: 600px;
           height: 300px;
           padding: 0;
           margin: 0;
           box-shadow: 0 0 0 1px #444;
           }
         #chart #bars li {
            display: table-cell;
            width: 100px;
            height: 300px;
            margin: 0;
            text-align: center;
            position: relative;
           }
         #chart #bars li .bar {
            display: block;
            width: 70px;
            margin-left: 15px;
            background: #ff33cc;
            position: absolute;
            bottom: 0;
            }
         #chart #bars li .bar:hover {
             background: #5AE;
             cursor: pointer;
           }
         #chart #bars li .bar:hover:before {
             color: white;
             content: attr(percentage) '%  ' attr(money) 'tk';
             position: relative;
             bottom: 20px;
           }
         #chart #bars li span {
             color: #eee;
             width: 100%;
             position: absolute;
             bottom: -2em;
             left: 0;
             text-align: center;
           }
       </style>
       <div id="bar_part">
         <div id="chart">
           <ul id="numbers">
             <li><span>200%</span></li>
             <li><span>180%</span></li>
             <li><span>160%</span></li>
             <li><span>140%</span></li>
             <li><span>120%</span></li>
             <li><span>100%</span></li>
             <li><span>80%</span></li>
             <li><span>60%</span></li>
             <li><span>40%</span></li>
             <li><span>20%</span></li>
             <li><span>0%</span></li>
           </ul>
             <?php
               $sale=$salen=0;
               $invoice=$invoicen=0;
               $shop=$shopn=0;
               $expense=$expensen=0;
               $date=date('Y-m-d');
               $query = "SELECT * FROM sale WHERE datee='$date' AND shopcode='$codeshop'";
               $result = mysql_query($query) or die(mysql_error());
               while ($row= mysql_fetch_array($result)){
                  $sale+=$row['amount'];
                  $salen++;
               }
               $query = "SELECT * FROM invoice WHERE datee='$date' AND shopcode='$codeshop'";
               $result = mysql_query($query) or die(mysql_error());
               while ($row= mysql_fetch_array($result)){
                  $invoice+=$row['amount'];
                  $invoicen++;
               }
               $query = "SELECT * FROM shop_product WHERE datee='$date' AND shopcode='$codeshop'";
               $result = mysql_query($query) or die(mysql_error());
               while ($row= mysql_fetch_array($result)){
                  $shop+=$row['amount'];
                  $shopn++;
               }
               $query = "SELECT * FROM expense WHERE datee='$date' AND shopcode='$codeshop'";
               $result = mysql_query($query) or die(mysql_error());
               while ($row= mysql_fetch_array($result)){
                  $expense+=$row['amount'];
                  $expensen++;
               }
             ?>
           <ul id="bars">
             <li><div class="bar"></div><span>Start</span></li>
             <li><div data-percentage="<?php echo $salen/2; ?>" percentage="<?php echo $salen; ?>" money="<?php echo $sale; ?>" class="bar"></div><span>Sale</span></li>
             <li><div data-percentage="<?php echo $invoicen/2; ?>" percentage="<?php echo $invoicen; ?>" money="<?php echo $invoice; ?>" class="bar"></div><span>Invoice</span></li>
             <li><div data-percentage="<?php echo $shopn/2; ?>" percentage="<?php echo $shopn; ?>" money="<?php echo $shop; ?>" class="bar"></div><span>Shop Product</span></li>
             <li><div data-percentage="<?php echo $expensen/2; ?>" percentage="<?php echo $expensen; ?>" money="<?php echo $expense; ?>" class="bar"></div><span>Expenses</span></li>
             <li><div class="bar"></div><span>End</span></li>
           </ul>
         </div>
        </div>
            <script src='bar_diagram_script.js'></script>
            <script >$(function () {
             $("#bars li .bar").each(function (key, bar) {
              var percentage = $(this).data('percentage');

              $(this).animate({
              'height': percentage + '%' },
               1000);
              });
             });
            </script>

     </div>
    </div>

  </div>

</body>
</html>

