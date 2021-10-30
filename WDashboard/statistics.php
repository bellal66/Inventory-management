<?php
session_start();
$codeshop = $_SESSION['codeshop'];
if($_SESSION["isLogin"]!=true){
       header("Location: index.php");
       die();
  }
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
  <link rel="stylesheet" href="font-awesome.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <title>Statistics</title>
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
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
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
      height: 100%;
      width: 1068px;
    }
    .col-sm-9{
      background-color: white;
      position: absolute;
      top: 15px;
      left: 15px;
      height: 98.5%;
      width: 97%;
    }
    .histroy{
      background-color: ;
      border: 1px solid gray;
      box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
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
       <?php
        $query  = "SELECT * FROM workerpage WHERE id='1'";   
        $result = mysql_query($query) or die(mysql_error());
        $row= mysql_fetch_array($result);
        if($row['statistics']==1){
       ?>
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

       <style>
          @font-face {
             font-family: 'Roboto';
             font-style: normal;
             font-weight: 400;
               }
           #bar_part{
            position: absolute;
            left: 15px;
            top: 110px;
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

    <?php
        }else{
       ?>
        <div>
         <div style="margin-left: 30%; margin-top: 20%; color: red; font-family: copper black; font-size: 30px;">
           Sorry That's Lock <i class="fa fa-lock"></i>
         </div>
        </div>
       <?php
         }
       ?>
     </div>
    </div>
  </div>
</body>
</html>

