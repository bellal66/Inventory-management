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
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
      height: 1100px;
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
    tr{
       height: 30px;
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


       <div style="position: absolute; top: 10px; left: 10px; width: 98%; height: 94.7%;">
         <p style="padding-left: 420px; padding-top: 6px; font-size: 23px; font-family: copper black;">Profit AND Loss</p><hr>
         <div  style="position: absolute; top: 63px; width: 100%; height: 96.6%;">

          <form action="proloss.php" method="post">
           <div style="position: absolute; top: 10px; word-spacing: 50px;">
             From-Date:<input style="width: 150px; height: 30px;" type="date" name="from_date" required>
             To-Date:<input style="width: 150px; height: 30px;" type="date" name="to_date" required>
             <select style="width: 150px; height: 30px;" name="check_type">
               <option></option>
               <option value="credit">Total Sales</option>
               <option value="debit">Total Cost of Goods Sold</option>
             </select>
             <input type="submit" name="submit" value="submit"><hr>
           </div>
          </form>
        <div id="print">
        <table id="example" class="display" cellspacing="0" width="100%" style="margin-top: 100px;">
         <thead>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;">From Date</th>
                <th style="text-align: center;">Type</th>
                <th style="text-align: center;">Num</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Debit</th>
                <th style="text-align: center;">Credit</th>
                <th style="text-align: center;">balance</th>
            </tr>
         </thead>

            <?php 
                 $balance_total=0;
                 $debit_total=0;
                 $credit_total=0;
              if(isset($_POST['from_date'])){

                 $from_date = $_POST['from_date'];
                 $timee=$from_date;
                 $from_date = strtotime($from_date);
                 $to_date = $_POST['to_date'];
                 $to_date = strtotime($to_date);
                 $check_type = $_POST['check_type'];
                   
                //show debit/credit
                if($check_type!=""){ 

                   for ($i=$from_date; $i<=$to_date; $i+=86400){

                     $time = (string)date("Y-m-d",$i);
                     
                     $query  = "SELECT * from cash where shopcode='$codeshop' AND datee='$time'";
                     $result = mysql_query($query) or die(mysql_error());
                     while ($row= mysql_fetch_array($result)) {

 
                    //with condition and check_type==debit

                    if ($check_type == "debit" && ($row['type']!="Expense") && ($row['type']!="Invoice update")) {
                      $balance=$row['balance'];
                      $balance_total=$balance_total+$balance;
                      $debit=$row['debit'];
                      $debit_total=$debit_total + $debit;
                      $credit_total=0;
               ?>

              <tbody>
                <tr>
                  <th style="text-align: center;"><?php echo $row['datee']; ?></th>
                  <th style="text-align: center;"><?php echo $row['type']; ?></th>
                  <th style="text-align: center;"><?php echo $row['id']; ?></th>
                  <th style="text-align: center;"><?php echo $row['name']; ?></th>
                  <th style="text-align: center;"><?php echo $debit; ?></th>
                  <th style="text-align: center;"></th>
                  <th style="text-align: center;"><?php echo $balance; ?></th>
                </tr>
              </tbody>

              <?php
                    // with condition and check_type==credit
                     
                     $balance_total=0;
                   $debit_total=0;
                   $credit_total=0;

                    }elseif($check_type == "credit" && ($row['type']!="Expense") && ($row['type']!="Invoice update")){
                      $balance=$row['balance'];
                      $balance_total=$balance_total+$balance;
                      $debit_total=0;
                      $credit=$row['credit'];
                      $credit_total=$credit_total + $credit;
                      ?>

                    <tbody>
                       <tr>
                          <th style="text-align: center;"><?php echo $row['datee']; ?></th>
                          <th style="text-align: center;"><?php echo $row['type']; ?></th>
                          <th style="text-align: center;"><?php echo $row['id']; ?></th>
                          <th style="text-align: center;"><?php echo $row['name']; ?></th>
                          <th style="text-align: center;"></th>
                          <th style="text-align: center;"><?php echo $credit; ?></th>
                          <th style="text-align: center;"><?php echo $balance; ?></th>
                       </tr>
                    </tbody>

              <?php
                    }
                   }
                  }
               ?>
                <tfoot>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
            </tr>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;" colspan="4">Total balance</th>
                <th></th>
                <th></th>
                <th style="text-align: center;"><?php echo $balance_total; ?></th>
            </tr>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;" colspan="4">Total debit</th>
                <th style="text-align: center;"><?php echo $debit_total; ?></th>
                <th></th>
                <th></th>
            </tr>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
              <th style="text-align: center;" colspan="4">Total credit</th>
              <th></th>
              <th style="text-align: center;"><?php echo $credit_total; ?></th>
              <th></th>
            </tr>
         </tfoot>
               <?php 

                  }
                  //show profit/loss
                  else{
                    $balance_total=0;
                   $debit_total=0;
                   $credit_total=0;

                    for ($i=$from_date; $i<=$to_date; $i+=86400){
                     $time = (string)date("Y-m-d",$i);
                     $query  = "SELECT * from cash where shopcode='$codeshop' AND datee='$time'";                         
                     $result = mysql_query($query) or die(mysql_error());

                     while ($row= mysql_fetch_array($result)) {
                      if($row['type']!="Invoice update"){
                      $balance=$row['balance'];
                      $balance_total=$balance_total+$balance;
                      $debit=$row['debit'];
                      $debit_total=$debit_total + $debit;
                      $credit=$row['credit'];
                      $credit_total=$credit_total + $credit;
               ?>

              <tbody>
                <tr>
                  <th style="text-align: center;"><?php echo $row['datee']; ?></th>
                  <th style="text-align: center;"><?php echo $row['type']; ?></th>
                  <th style="text-align: center;"><?php echo $row['id']; ?></th>
                  <th style="text-align: center;"><?php echo $row['name']; ?></th>
                  <th style="text-align: center;"><?php echo $debit; ?></th>
                  <th style="text-align: center;"><?php echo $credit; ?></th>
                  <th style="text-align: center;"><?php echo $balance; ?></th>
                </tr>
              </tbody>

              <?php  }
                    }
                   }
               ?>
                   <tfoot>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
            </tr>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;" colspan="4">Total balance</th>
                <th></th>
                <th></th>
                <th style="text-align: center;"><?php echo $balance_total; ?></th>
            </tr>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;" colspan="4">Total debit</th>
                <th style="text-align: center;"><?php echo $debit_total; ?></th>
                <th></th>
                <th></th>
            </tr>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
              <th style="text-align: center;" colspan="4">Total credit</th>
              <th></th>
              <th style="text-align: center;"><?php echo $credit_total; ?></th>
              <th></th>
            </tr>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
              <th style="text-align: center;" colspan="4">Profit/Loss </th>
              <th style="text-align: center;" colspan="2"><?php echo ($credit_total-$debit_total); ?></th>
              <th></th>
            </tr>
         </tfoot>
              <?php
                   $debit_total=0;
                   $credit_total=0;
                  for ($i=$from_date; $i<=$to_date; $i+=86400){
                     $time = (string)date("Y-m-d",$i);
                     $query  = "SELECT * from cash where shopcode='$codeshop' AND datee='$time'";                         
                     $result = mysql_query($query) or die(mysql_error());

                     while ($row= mysql_fetch_array($result)) {
                      if(($row['type']!="Expense") && ($row['type']!="Invoice update")){
                      $debit=$row['debit'];
                      $debit_total=$debit_total + $debit;
                      $credit=$row['credit'];
                      $credit_total=$credit_total + $credit;

                    }}}
                   
                  // new panel
                     ?>
                     <style type="text/css">
                        #income_expense {
                            border-collapse: collapse;
                           }
                        #income_expense tr, td {
                            border: 2px solid green;
                            height: 20px;
                           }
                         #income_expense tr{
                            height: 40px;
                           }

                     </style>
                       
                       <div>
                         <table id="income_expense" style="text-align: center; width: 1000px; background-color: #eee">####<br><br>

                           <tr>
                             <td colspan="5"><b>Ordinary Income/Expense</b></td>
                           </tr>

                           <tr>
                             <td rowspan="4"><b>Gross Profit</b></td>
                             <td rowspan="2"><b>Income</b></td>
                             <td><b><?php echo $credit_total; ?></b></td>
                             <td rowspan="4"><b><?php echo ($credit_total-$debit_total); ?></b></td>
                             <tr>
                                <td><b>Total = <?php echo $credit_total; ?></b></td>
                             </tr>
                             <tr>
                              <td rowspan="2"><b>COGS</b></td>
                              <td><b><?php echo $debit_total; ?></b></td>
                             </tr>
                             <tr>
                                <td><b>Total = <?php echo $debit_total; ?></b></td>
                             </tr>
                           </tr>
                           
                           <tr>
                            <?php 
                                $rowspan=0;
                                $expense_total=0;
                           for ($i=$from_date; $i<=$to_date; $i+=86400){
                                $time = (string)date("Y-m-d",$i);
                                $query  = "SELECT * from cash where shopcode='$codeshop' AND datee='$time'";                         
                                 $result = mysql_query($query) or die(mysql_error());

                                while ($row= mysql_fetch_array($result)) {
                                   if($row['type']=="Expense"){
                                     $rowspan++;
                                     $expense_total = $expense_total+$row['debit'];
                                }}}
                                $rowspan=$rowspan+1;
                            ?>
                             <td rowspan="<?php echo $rowspan; ?>"><b>Expense</b></td>
                             <td style="background-color: green; color: white;"><b>Name</b></td>
                             <td style="background-color: green; color: white;"><b>Amount</b></td>
                             <td rowspan="<?php echo $rowspan; ?>"><b><?php echo $expense_total; ?></b></td>
                             
                              <?php
                               for ($i=$from_date; $i<=$to_date; $i+=86400){
                                $time = (string)date("Y-m-d",$i);
                                $query  = "SELECT * from expense where shopcode='$codeshop' AND datee='$time'";  
                                 $result = mysql_query($query) or die(mysql_error());

                                while ($row= mysql_fetch_array($result)) {
                              ?>
                              <tr>
                               <td><b><?php echo $row['ex_description']; ?></b></td>
                               <td><b><?php echo $row['amount']; ?></b></td>
                             </tr>
                              <?php 
                                }}
                               ?>
                             
                           </tr>

                           <tr>
                             <td colspan="3"><b>Net Income </b></td>
                             <td><b><?php echo ($credit_total-$debit_total)-$expense_total; ?></b></td>
                           </tr><br>

                         </table><br>
                       </div>
                     <?php
                  // new panel end ...... start at line 314
                  }
                 }
                  // without condition limit 10
                 else{
                   $balance_total=0;
                   $debit_total=0;
                   $credit_total=0;
                   
                     $query  = "SELECT * from cash WHERE shopcode='$codeshop' ORDER BY id DESC LIMIT 10";
                        
                     $result = mysql_query($query) or die(mysql_error());
                     while ($row= mysql_fetch_array($result)) {
                      $balance=$row['balance'];
                      $balance_total=$balance_total+$balance;
                      $debit=$row['debit'];
                      $debit_total=$debit_total + $debit;
                      $credit=$row['credit'];
                      $credit_total=$credit_total + $credit;
               ?>

              <tbody>
                <tr>
                  <th style="text-align: center;"><?php echo $row['datee']; ?></th>
                  <th style="text-align: center;"><?php echo $row['type']; ?></th>
                  <th style="text-align: center;"><?php echo $row['id']; ?></th>
                  <th style="text-align: center;"><?php echo $row['name']; ?></th>
                  <th style="text-align: center;"><?php echo $debit; ?></th>
                  <th style="text-align: center;"><?php echo $credit; ?></th>
                  <th style="text-align: center;"><?php echo $balance; ?></th>
                </tr>
              </tbody>

              <?php
                   }
              ?>
                   <tfoot>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
            </tr>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;" colspan="4">Total balance</th>
                <th></th>
                <th></th>
                <th style="text-align: center;"><?php echo $balance_total; ?></th>
            </tr>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
                <th style="text-align: center;" colspan="4">Total debit</th>
                <th style="text-align: center;"><?php echo $debit_total; ?></th>
                <th></th>
                <th></th>
            </tr>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
              <th style="text-align: center;" colspan="4">Total credit</th>
              <th></th>
              <th style="text-align: center;"><?php echo $credit_total; ?></th>
              <th></th>
            </tr>
            <tr style="background-color: #eee;border-bottom:1pt solid black;">
              <th style="text-align: center;" colspan="4">Profit/Loss </th>
              <th style="text-align: center;" colspan="2"><?php echo ($credit_total-$debit_total); ?></th>
              <th></th>
            </tr>
         </tfoot>
              <?php
                 }
                 mysql_close();
              ?>
 
       </table> 
       </div>
         </div>
       </div>
     </div>
    </div>
  </div>
</body>
</html>
