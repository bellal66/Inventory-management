<?php
session_start();
$namee="";
if(isset($_GET["bill"]))
  {
    $bill = (string)$_GET["bill"];
  }      
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="w3school.css">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="script.js"></script>
  <script src="script2.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
      height: 700px;
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
      height: 700px;
      width: 1068px;
    }
    .col-sm-9{
      background-color: white;
      position: absolute;
      top: 15px;
      left: 15px;
      height: 97%;
      width: 97%;
    }
    .containerr {
      padding: 16px;
      padding-top: 80px;
      background-color: white;
     }
     .container label{
      width: 100%;
      padding: 10px;
      margin: 5px 0 5px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
      }
    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 5px;
     }
    .modal {
     display: none; 
     position: fixed; 
     z-index: 1; 
     padding-top: 100px; 
     left: 0;
     top: 0;
     width: 100%; 
     height: 100%; 
     overflow: auto; 
     background-color: rgb(0,0,0); 
     background-color: rgba(0,0,0,0.4); 
      }
    .modal-content {
     background-color: #fefefe;
     margin: auto;
     padding: 20px;
     border: 1px solid #888;
     width: 80%;
      }
   .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
      }
    .close:hover,
    .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    }
    input[type=text] {
      width: 50%;
      padding: 10px;
      margin: 5px 0 5px 0;
      display: inline-block;
      border: none;
    }
    input[type=submit] {
      width: 40%;
      padding: 10px;
      margin: 5px 0 5px 0;
      display: inline-block;
      border: none;
    }
    .memo a{
      width: 40%;
      padding: 10px;
      margin: 5px 0 5px 0;
      display: inline-block;
      border: none;
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

       <div class="containerr">

        <form id="frmrecord" method="post">

          <h4 style="text-align: center;">Invoice Detail</h4><br><br>
          <?php 
            include '../database.php';
            $query  = "SELECT * from invoice where bill_no='$bill'";  

            $result = mysql_query($query) or die(mysql_error());
            if (mysql_num_rows($result) > 0) {

              while($row =mysql_fetch_array($result)) {
                
          ?>
          
          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label ><b>Customer Name:</b></label>
            <?php echo $row['name']; ?>
          </div><br>

          
          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Customer Address:</b></label>
            <?php echo $row['address']; ?>
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Submitted Money:</b></label>
            <input type="text" id="Submit_money" style="border-radius: 10%;" name="Submit_money" value="<?php echo $row['Submit_money']; ?>" required>
            
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Owing Money:</b></label>
            <?php echo $row['owing_money']; ?>
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Amount:</b></label>
            <?php echo $row['amount']; ?>
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Date:</b></label>
            <?php echo $row['datee']; ?>
          </div><br><br>

          <input type="hidden" name="amount" id="amount" value="<?php echo $row['amount']; ?>">
          <input type="hidden" name="bill_no" value="<?php echo $row['bill_no']; ?>">
          <input style="background-color: green; color: white;" id="submit" type="submit" name="submit" value="submit">

          <?php 
              }
            }
          ?>
        </form>

        <div class="memo">
          <a href="update_invoice_memo.php?bill=<?=$bill?>" style="background-color: green; color: white; text-align: center;" target="_blanck">memo</a>
        </div>

      </div><hr>
     </div>
    </div>

  </div>
</body>
</html>

             <script>

              jQuery(document).ready(function ($) {
                   $("#frmrecord").submit(function (event) {
                event.preventDefault();
               var formData = new FormData($(this)[0]);
               $.ajax({
                  url: 'update_invoice.php',
                  type: 'POST',
                  data: formData,
                  async: true,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function (returndata) 
                  {
                    alert(returndata);
                  },
                  error: function(){
                  alert("error in ajax form submission");
                                    }
               });
              return false;
           });
         });
       </script>