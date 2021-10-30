<?php
session_start();
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
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
      height: 1500px;
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
    .sale_list{
      cursor: pointer;
    }
    .sale_list:hover{
       background-color: #eee;
    }
    .histroy{
      background-color: ;
      border: 1px solid gray;
      box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
    }
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
      <button style="position: absolute; left: 0;top: 200px;background-color: white; border: 1px solid white;" onclick="printContent('print')">p</button>
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
         <p style="padding-left: 420px; padding-top: 6px; font-size: 23px; font-family: copper black;">Sale History</p><hr>
         <div  style="position: absolute; top: 63px; width: 100%; height: 96.6%;">
          <form action="sale_history.php" method="post">
           <div style="position: absolute; top: 10px; word-spacing: 50px;">
             From-Date:<input style="width: 150px; height: 30px;" type="date" name="from_date" required>
             To-Date:<input style="width: 150px; height: 30px;" type="date" name="to_date" required>
             Customer-Name:<input type="text" name="customer_name" list="customer">
             <datalist id="customer">
                <?php
                 $query  = "SELECT * from customer WHERE shopcode='$codeshop'";   
                 $result = mysql_query($query) or die(mysql_error());
                 while ($row= mysql_fetch_array($result)){
                  $name=$row['name'];
                ?>
                <option value="<?php echo $name ?> ">

                  <?php
                    }
                  ?>
                    
                 </datalist>
             <input type="submit" name="submit" value="submit"><hr>
           </div>
          </form>

        <div id="print">
        <table id="example" class="display" cellspacing="0" width="100%" style="margin-top: 100px;">
         <thead>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;">From Date</th>
                <th style="text-align: center;">Shop No</th>
                <th style="text-align: center;">Customer Name</th>
                <th style="text-align: center;">Customer Address</th>
                <th style="text-align: center;">Amount</th>
            </tr>
         </thead>

         <tbody>
            <?php 
                 $total=0;
              if(isset($_POST['from_date'])){

                 $from_date = $_POST['from_date'];
                 $timee=$from_date;
                 $from_date = strtotime($from_date);
                 $to_date = $_POST['to_date'];
                 $to_date = strtotime($to_date);
                 $customer_name = $_POST['customer_name'];
                   

                  for ($i=$from_date; $i<=$to_date; $i+=86400){

                     $time = (string)date("Y-m-d",$i);

                     if($customer_name!=""){
                        $query  = "SELECT * from sale where shopcode='$codeshop' AND datee='$time' AND name='$customer_name'";
                     }else{
                        $query  = "SELECT * from sale where shopcode='$codeshop' AND datee='$time'"; 
                     }
                        
                     $result = mysql_query($query) or die(mysql_error());
                     while ($row= mysql_fetch_array($result)) {
                      $amount=$row['amount'];
                      $total=$total+$amount;
               ?>

              <tbody>
                <tr class="sale_list">
                  <th style="text-align: center;"><?php echo $row['datee']; ?></th>
                  <th style="text-align: center;"><?php echo $row['bill_no']; ?></th>
                  <a href="sale_memo2.php?id=<?= $row['bill_no']?>&&namee=<?= $row['name']?>&&date=<?= $row['datee']?>"><th style="text-align: center;"><?php echo $row['name']; ?></th></a>
                  <th style="text-align: center;"><?php echo $row['address']; ?></th>
                  <th style="text-align: center;"><?php echo $amount; ?></th>
                </tr>
              </tbody>

              <?php
                   }
                  }
                 }else{

                     $query  = "SELECT * from sale WHERE shopcode='$codeshop' ORDER BY bill_no DESC LIMIT 10"; 
                        
                     $result = mysql_query($query) or die(mysql_error());
                     while ($row= mysql_fetch_array($result)) {
                      $amount=$row['amount'];
                      $total=$total+$amount;
               ?>

              <tbody>
                <tr class="sale_list">
                  <th style="text-align: center;"><?php echo $row['datee']; ?></th>
                  <th style="text-align: center;"><?php echo $row['bill_no']; ?></th>
                  <th style="text-align: center;"><a href="sale_memo2.php?id=<?= $row['bill_no']?>&&namee=<?= $row['name']?>&&date=<?= $row['datee']?>"><?php echo $row['name']; ?></a></th>
                  <th style="text-align: center;"><?php echo $row['address']; ?></th>
                  <th style="text-align: center;"><?php echo $amount; ?></th>
                </tr>
              </tbody>

              <?php
                   }
                  }
                 mysql_close();
              ?>
         </tbody>

         <tfoot>
            <tr style="background-color: #eee;border-top:1pt solid black;">
                <th style="text-align: center;">To Date</th>
                <th style="text-align: center;">Shop No</th>
                <th style="text-align: center;">Customer Name</th>
                <th style="text-align: center;">Customer Address</th>
                <th style="text-align: center;">Total = <?php echo $total; ?></th>
            </tr>
         </tfoot>
 
       </table> 
       </div>
         </div>
       </div>

    </div>
  </div>

</body>
</html>
