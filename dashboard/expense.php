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
      height: 700px;
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
      height: 700px;
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

       <center><h4>Expense</h4></center>
       <div style="position: absolute; left: 10px; top: 10px; right: 10px; width: 98%;">
         <style>
            .box{
              width:1270px;
              padding:20px;
              background-color:#fff;
              margin-top:25px;
              box-sizing:border-box;
              }
              #user_data {
                 font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                 border-collapse: collapse;
                 width: 100%;
               }
              #user_data td, #user_data th {
                 border: 1px solid #ddd;
               }
              #user_data tr:nth-child(even){background-color: #f2f2f2;}
              #user_data tr:hover {background-color: #ddd;}
         </style>

         <div class="container box" style="position: absolute; left: 10px; width: 98%;">
            
            <div align="left">
              <button type="button" name="add" id="add" class="btn btn-info">Add</button>
              <input id="myInput" type="text" placeholder="Search..." style="margin-left: 15px; width: 200px;">
            </div>
            <br />
            <div id="alert_message"></div>
            <div id="print">
            <table id="user_data" class="table table-bordered table-striped">

              <thead>
                <tr>
                  <th style="color: green; font-size: 17px;"><b>Ex-Name</b></th>
                  <th style="color: green; font-size: 17px;"><b>Ex-Description</b></th>
                  <th style="color: green; font-size: 17px;"><b>Amount</b></th>
                  <th style="color: green; font-size: 17px;"><b>Date</b></th>
                  <th></th>
                </tr>
              </thead>

              <?php 
                 $query  = "SELECT * FROM expense WHERE shopcode='$codeshop' ORDER BY id DESC LIMIT 10";   
                 $result = mysql_query($query) or die(mysql_error());
                 while ($row= mysql_fetch_array($result)) {
                  $name=$row['ex_name'];
                  $ex_description=$row['ex_description'];
                  $amount=$row['amount'];
                  $date=$row['datee'];
               ?>

              <tbody id="myTable">
                <tr>
                  <th><?php echo $name; ?></th>
                  <th><?php echo $ex_description; ?></th>
                  <th><?php echo $amount; ?></th>
                  <th><?php echo $date; ?></th>
                  <th style="width: 10%; text-align: center;"><a href="delete_expense.php?id=<?=$row['id']?>">Delete</a></th>
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

  </div>
</body>
</html>

<script type="text/javascript" language="javascript" >
  $(document).ready(function(){
    

    $('#add').click(function(){
      var html = '<tr>';
      html += '<td contenteditable id="data1"></td>';
      html += '<td contenteditable id="data2"></td>';
      html += '<td contenteditable id="data3"></td>';
      html += '<td contenteditable id="data4"><?php echo date("Y-m-d");?></td>';
      html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
      html += '</tr>';
      $('#user_data').prepend(html);
    });
    
    $(document).on('click', '#insert', function(){
      var ex_name = $('#data1').text();
      var ex_description = $('#data2').text();
      var amount = $('#data3').text();
      var date = $('#data4').text();
      if(ex_name != '' && ex_description != '' && amount != '' && date != '')
      {
        $.ajax({
          url:"insert_expense.php",
          method:"POST",
          data:{
            'ex_name':ex_name,
            'ex_description':ex_description,
            'amount':amount,
            'date':date
          },
          success:function(data)
          {
            console.log(data);
            $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
            $('#user_data').DataTable().destroy();
          }
        });
        setInterval(function(){
          $('#alert_message').html('');
        }, 5000);
      }
      else
      {
        alert("Both Fields is required");
      }
    });
    
  });
</script>