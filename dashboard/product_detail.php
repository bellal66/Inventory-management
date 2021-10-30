<?php
session_start();
$namee="";
if(isset($_GET["name"]))
  {
    $namee = (string)$_GET["name"];
  }      
  $_SESSION['namee'] = $namee;
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
      height: 97%;
      width: 97%;
    }
    .containerr {
      padding: 16px;
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
    input {
      width: 50%;
      height: 30px;
      padding: 10px;
      margin: 5px 0 5px 0;
      display: inline-block;
      border: none;
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
      <p style="margin-top: 10px;"><a href="add_product_page.php#list"><b>Back<<</b></a></p>
      <form method="POST" id="frmrecord">
        <div class="containerr">
          <h4 style="text-align: center;">Product Detail</h4><br><br>
          <?php 
            include '../database.php';
            $query  = "SELECT * from product where name='$namee'";  

            $result = mysql_query($query) or die(mysql_error());
            if (mysql_num_rows($result) > 0) {

              while($row =mysql_fetch_array($result)) {

          ?>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label ><b>Product Name:</b></label>
            <?php $product_name=$row['name']; ?>
            <input type="text" name="pname" value="<?php echo $row['name']; ?>">
          </div><br>

          
          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Buying Price:</b></label>
            <input type="text" name="buying_price" value="<?php echo $row['buying_price']; ?>">
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Selling Price:</b></label>
            <input type="text" name="selling_price" value="<?php echo $row['selling_price']; ?>">
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Quantity:</b></label>
            <?php
               $qty=$row['qty'];
            ?>
            <input type="text" name="qty" value="<?php echo $row['qty']; ?>">
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Income Account:</b></label>
            <input type="text" name="income_account" value="<?php echo $row['income_account']; ?>">
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Cogs Account:</b></label>
            <input type="text" name="cogs_account" value="<?php echo $row['cogs_account']; ?>">
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Barcode:</b></label>
            <?php
               $barcode=$row['barcode'];
            ?>
            <input type="text" name="barcode" value="<?php echo $row['barcode']; ?>">
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Product Category:</b></label>
            <input type="text" name="product_category" value="<?php echo $row['product_category']; ?>">
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Product Unit:</b></label>
            <input type="text" name="product_unit" value="<?php echo $row['product_unit']; ?>">
          </div><br>

          <div style="width: 40%; padding: 7px; margin: 1px 0 1px 0; display: inline-block;border: none; background: #f1f1f1; font-size: 15px;">
            <label><b>Expire Date:</b></label>
            <input type="date" name="expire_date" value="<?php echo $row['expire_date']; ?>">
          </div><br>

          <?php 
              }
            }
          ?>
        </div><hr>
        <div>
          <button style="background-color: green; color: white; width: 150px; height: 40px;"><a style="color: white;" href="barcode/index.php?barcode=<?= $barcode;?>&&qty=<?= $qty?>&&name=<?= $product_name?>" target="_blank">Barcode Generate</a></button>
          <button style="background-color: green; color: white; width: 150px; height: 40px;" id="submit" type="submit" name="submit">Edit Product</button>
          <button style="background-color: green; color: white; width: 150px; height: 40px;" onclick="window.location.href='product_delete.php'">Delete product</button>
        </div>
    </form>

        <!-- Modal screen Script-->
            <script>
                var modal = document.getElementById('myModal');
                var btn = document.getElementById("myBtn");
                var span = document.getElementsByClassName("close")[0];
                btn.onclick = function() {
                      modal.style.display = "block";
                     }
                span.onclick = function() {
                      modal.style.display = "none";
                    }
                window.onclick = function(event) {
                  if (event.target == modal) {
                       modal.style.display = "none";
                      }
                   }
            </script>

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
                  url: 'product_edit.php',
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