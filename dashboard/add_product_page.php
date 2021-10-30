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
  <link rel="stylesheet" href="w3school.css">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="script.js"></script>
  <script src="script2.js"></script>
  <script>
   $(document).ready(function(){
     $("#myInput").on("keyup", function() {
       var value = $(this).val().toLowerCase();
     $("#myTable tr").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
     });
    });
   });
  </script>

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
      height: 7000px;
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
      height: 7000px;
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
       <div class="histroy" style="position: absolute; top: 10px; left: 10px; width: 245px; height: 40px;">
         <h4 style="color: white; text-align: center;"><a href="#add" style="color: black;">Add Product</a></h4>
       </div>
       <div class="histroy" style="position: absolute; top: 10px; left: 265px; width: 245px; height: 40px;">
         <h4 style="color: white; text-align: center;"><a href="#list" style="color: black;">Product List</a></h4>
       </div>


       <!-- Add product -->
       <div style="position: absolute; top: 100px; left: 10px; width: 1015px; height: 1005px; background-color: green" id="add">
         <h4 style="text-align: center; color: white;">Add Product</h4>
         <div style="position: absolute; top: 40px; left: 15px; width: 985px; height: 540px; background-color: white;">
          <style>

        .containerr {
           padding: 16px;
           background-color: white;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 5px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
         }

          input[type=text]:focus, input[type=password]:focus {
             background-color: #ddd;
             outline: none;
         }
         input[type=date]{
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
          .registerbtn {
                background-color: #4CAF50;
                color: white;
                padding: 10px 15px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 20%;
                opacity: 0.9;
           }

           .registerbtn:hover {
                opacity: 1;
            }

           </style>
           <form action="add_product.php" method="post">
              <div class="containerr">
                <label ><b>Product Name</b></label>
                <input type="text" placeholder="Enter Product Name" name="name" >

                <label><b>Buying Price</b></label>
                <input type="text" placeholder="Enter Buying Price" name="buying_price" >

                <label><b>Selling Price</b></label>
                <input type="text" placeholder="Enter Selling Price" name="selling_price" >

                <label><b>Barcode</b></label>
                <input type="text" placeholder="Enter Barcode" name="barcode" >

                <label><b>Description</b></label><br>
                <textarea name="description" style="width: 100%; background-color: #f1f1f1; height: 70px;">Enter description...</textarea><br>

                <label ><b>Preferred Vendor</b></label>
                <input type="text" placeholder="Enter vendor name" name="vendor" list="vendor" >
                <datalist id="vendor">
                <?php
                 $query  = "SELECT * from vendor WHERE shopcode='$codeshop'";   
                 $result = mysql_query($query) or die(mysql_error());
                 while ($row= mysql_fetch_array($result)){
                  $name=$row['name'];
                ?>
                <option value="<?php echo $name ?> ">

                  <?php
                    }
                  ?>
                    
                 </datalist><br>

                <label ><b>Product Category</b></label>
                <input  type="text" name="product_category" placeholder="Enter Product Category" list="category" >
                <datalist id="category">
                <?php
                 $query  = "SELECT * from category_unit WHERE shopcode='$codeshop'";   
                 $result = mysql_query($query) or die(mysql_error());
                 while ($row= mysql_fetch_array($result)){
                  $name=$row['category'];
                ?>
                <option value="<?php echo $name ?> ">

                  <?php
                    }
                  ?>
                    
                 </datalist><br>

                <label ><b>Product Unit</b></label>
                <input  type="text" name="product_unit" placeholder="Enter Product Unit" list="unit" >
                <datalist id="unit">
                <?php
                 $query  = "SELECT * from unit WHERE shopcode='$codeshop'";   
                 $result = mysql_query($query) or die(mysql_error());
                 while ($row= mysql_fetch_array($result)){
                  $name=$row['unit'];
                ?>
                <option value="<?php echo $name ?> ">

                  <?php
                    }
                  ?>
                    
                 </datalist><br>

                 <label><b>Income Account</b></label>
                <input type="text" placeholder="Enter income account" name="income_account">

                <label><b>COGS Account</b></label>
                <input type="text" placeholder="Enter cogs account" name="cogs_account">

                <div style="position: absolute; top: 795px; left: 15px; width: 250px; height: 80px;">
                  <label ><b>Expire Date</b></label>
                  <input type="date" name="expire_date" style="position: absolute; top: 22px; left: 0px;">
                </div>


                <br><br><br><br><hr>

                <button type="submit" class="registerbtn" name="add">Add</button>
                <button type="reset" class="registerbtn" style="background-color: red;">Clear</button>

                </div>
           </form>
         </div>
       </div>

       <div style="position: absolute; top: 1115px; left: 10px; width: 1015px; height: 5870px; background-color: blue" id="list">
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

         <h4 style="text-align: center; color: white;">Product List</h4>
         <input id="myInput" type="text" placeholder="Search Name.." style="margin-left: 15px; width: 200px;">
         <input id="Input" type="text" placeholder="Search Category.." onkeyup="myFunction()" style="margin-left: 15px; width: 200px;">
         <div class="w3-container"style="position: absolute; top: 90px; left: 15px; width: 985px; height: 5785px; background-color: white;" id="print">
            <table class="w3-table-all w3-centered" style="position: absolute; width: 100%; left: 0px;" id="myTable">

              <tr style="background-color: #eee;">
                <th>Name</th>
                <th>Category</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Barcode</th>
                <th>Expire Date</th>
              </tr>

              <?php 
                 $query  = "SELECT * from product WHERE shopcode='$codeshop'";   
                 $result = mysql_query($query) or die(mysql_error());
                 while ($row= mysql_fetch_array($result)) {
                  $name=$row['name'];
               ?>
             
             <tbody id="myTable">
               <tr>
                <td id="name" style="font-size: 17px;"><?php echo "<a href='./product_detail.php?name=$name'><b>$name</b></a>"; ?></td>
                <td><?php echo $row['product_category'];?></td>
                <td><?php echo $row['buying_price']; echo " Tk"; ?></td>
                <td><?php echo $row['selling_price']; echo " Tk"; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo $row['barcode']; ?></td>
                <td><?php echo $row['expire_date']; ?></td>
               </tr>
             </tbody>
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
</body>
</html>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("Input");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>