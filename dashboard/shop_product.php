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
    .row.content {
      height: 950px;
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
      height: 950px;
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
        <li><a href="#">Shop Products</a></li>
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
    
       
     <div style="position: absolute; top: 10px; left: 10px; width: 1015px; height: 895px; background-color: green" id="add">
      <p style="padding-left: 450px; padding-top: 6px; color: white; font-size: 23px; font-family: copper black;">Shop Product</p>
      <div style="position: absolute; top: 50px; left: 15px; width: 985px; height: 825px; background-color: #eee;">
        <style>

        .containerr {
           padding: 16px;
           background-color: white;
        }

        input[type=text], input[type=password] {
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
         select{
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
           <form action="insert_shop_product.php" method="post">
              <div class="containerr">

                Vendor Name:
                <input style="width:61%;height:34px;" type="text" name="vendor_name" list="customer" required>
                <datalist id="customer">
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
                    
                 </datalist>
                
                <div style="position: absolute; left: 230px; top: 67px; width: 500px; height: 100px;">
                  Address:
                  <input type="text" name="address" style="width: 80%; height: 60px;" list="address">
                  <datalist id="address">
                <?php
                 $query  = "SELECT * from vendor WHERE shopcode='$codeshop'";   
                 $result = mysql_query($query) or die(mysql_error());
                 while ($row= mysql_fetch_array($result)){
                  $name=$row['address'];
                ?>
                <option value="<?php echo $name ?> ">

                  <?php
                    }
                  ?>
                    
                 </datalist>
                </div>

                <br><br>
                <div style="">
                    Date::
                  <input type="date" name="date" style="width: 150px; height: 40px; background-color: #ddd">
                </div>


                
                
                <br><br>

          <table border="1">

            <style type="text/css">
              input[type=text]{
                margin:4px 4px 4px 4px;
                line-height:normal;
                height:25px;
                border-radius: 10%;
              }
               input{
                border:0;
                margin: 4px 4px 0 8px;
                width: 40px;
               }
            </style>
            <thead>
              <tr style="background-color: #eee!important; height: 30px;">
                <th style="width: 30px; text-align: center;" class="no">No</th>
                <th style="width: 175px; text-align: center;">Item Code</th>
                <th style="width: 325px; text-align: center;">Description</th>
                <th style="width: 125px; text-align: center;">Quantity</th>
                <th style="width: 125px; text-align: center;">Price Each</th>
                <th style="width: 120px; text-align: center;">Amount</th>
              </tr>
            </thead>


            
           <!-- Salling form -->
           <!-- form no 1 -->


          <tbody>
            <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">1</td>
             <td id="itemcode1">
              <input style="width:175px;text-align:center;"class="form-control itemcode1"type="text"name="itemcode1" list="productname1">
              <datalist id="productname1">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode1').keyup(function () {
                  var itemcode1 = 0;
                  $('.itemcode1').each(function() {
                    itemcode1 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode1},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price1").val(rep.selling_price); 
                       $("#description1").val(rep.description); 
                    } 
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description1" name="description1"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity1"type="text"name="quantity1">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price1"type="text"id="Price1" name="amount1"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total1"name="total1"disabled /></td>

             <script type="text/javascript">  
               $('.price1,.quantity1').keyup(function () {
                 var sum1 = 0;
                 $('.price1').each(function() {
                   sum1 = Number($(this).val());
                 });
                 $('.quantity1').each(function() {
                  sum1 *= Number($(this).val());
                 });
                 $('#total1').val(sum1);   
                 });
             </script> 
            </tr>
 

           <!-- form no 2 -->


            <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">2</td>
             <td id="itemcode2">
              <input style="width:175px;text-align:center;"class="form-control itemcode2"type="text"name="itemcode2" list="productname2">
              <datalist id="productname2">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode2').keyup(function () {
                  var itemcode2 = 0;
                  $('.itemcode2').each(function() {
                    itemcode2 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode2},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price2").val(rep.selling_price); 
                       $("#description2").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>



             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description2" name="description2"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity2"type="text"name="quantity2">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price2"type="text"id="Price2" name="amount2"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total2"name="total2"disabled /></td>

             <script type="text/javascript">  
               $('.price2,.quantity2').keyup(function () {
                 var sum2 = 0;
                 $('.price2').each(function() {
                   sum2 = Number($(this).val());
                 });
                 $('.quantity2').each(function() {
                  sum2 *= Number($(this).val());
                 });
                 $('#total2').val(sum2);   
                 });
             </script>
            </tr>

            

            <!-- form no 3 -->



            <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">3</td>
             <td id="itemcode3">
              <input style="width:175px;text-align:center;"class="form-control itemcode3"type="text"name="itemcode3" list="productname3">
              <datalist id="productname3">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode3').keyup(function () {
                  var itemcode3 = 0;
                  $('.itemcode3').each(function() {
                    itemcode3 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode3},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price3").val(rep.selling_price); 
                       $("#description3").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description3" name="description3"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity3"type="text"name="quantity3">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price3"type="text"id="Price3" name="amount3"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total3"name="total3"disabled /></td>

             <script type="text/javascript">  
               $('.price3,.quantity3').keyup(function () {
                 var sum3 = 0;
                 $('.price3').each(function() {
                   sum3 = Number($(this).val());
                 });
                 $('.quantity3').each(function() {
                  sum3 *= Number($(this).val());
                 });
                 $('#total3').val(sum3);   
                 });
             </script>
            </tr>
 

            <!-- form no 4 -->


             <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">4</td>
             <td id="itemcode4">
              <input style="width:175px;text-align:center;"class="form-control itemcode4"type="text"name="itemcode4" list="productname4">
              <datalist id="productname4">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode4').keyup(function () {
                  var itemcode4 = 0;
                  $('.itemcode4').each(function() {
                    itemcode4 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode4},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price4").val(rep.selling_price); 
                       $("#description4").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description4" name="description4"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity4"type="text"name="quantity4">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price4"type="text"id="Price4" name="amount4"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total4"name="total4"disabled /></td>

             <script type="text/javascript">  
               $('.price4,.quantity4').keyup(function () {
                 var sum4 = 0;
                 $('.price4').each(function() {
                   sum4 = Number($(this).val());
                 });
                 $('.quantity4').each(function() {
                  sum4 *= Number($(this).val());
                 });
                 $('#total4').val(sum4);   
                 });
             </script>
            </tr>



            <!-- form no 5 -->


             <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">5</td>
             <td id="itemcode5">
              <input style="width:175px;text-align:center;"class="form-control itemcode5"type="text"name="itemcode5" list="productname5">
              <datalist id="productname5">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode5').keyup(function () {
                  var itemcode5 = 0;
                  $('.itemcode5').each(function() {
                    itemcode5 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode5},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price5").val(rep.selling_price); 
                       $("#description5").val(rep.description); 
                    } 
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description5" name="description5"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity5"type="text"name="quantity5">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price5"type="text"id="Price5" name="amount5"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total5"name="total5"disabled /></td>

             <script type="text/javascript">  
               $('.price5,.quantity5').keyup(function () {
                 var sum5 = 0;
                 $('.price5').each(function() {
                   sum5 = Number($(this).val());
                 });
                 $('.quantity5').each(function() {
                  sum5 *= Number($(this).val());
                 });
                 $('#total5').val(sum5);   
                 });
             </script>
            </tr>


            <!-- form no 6 -->


             <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">6</td>
             <td id="itemcode6">
              <input style="width:175px;text-align:center;"class="form-control itemcode6"type="text"name="itemcode6" list="productname6">
              <datalist id="productname6">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode6').keyup(function () {
                  var itemcode6 = 0;
                  $('.itemcode6').each(function() {
                    itemcode6 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode6},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price6").val(rep.selling_price); 
                       $("#description6").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description6" name="description6"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity6"type="text"name="quantity6">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price6"type="text"id="Price6" name="amount6"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total6"name="total6"disabled /></td>

             <script type="text/javascript">  
               $('.price6,.quantity6').keyup(function () {
                 var sum6 = 0;
                 $('.price6').each(function() {
                   sum6 = Number($(this).val());
                 });
                 $('.quantity6').each(function() {
                  sum6 *= Number($(this).val());
                 });
                 $('#total6').val(sum6);   
                 });
             </script>
            </tr>


            <!-- form no 7 -->


             <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">7</td>
             <td id="itemcode7">
              <input style="width:175px;text-align:center;"class="form-control itemcode7"type="text"name="itemcode7" list="productname7">
              <datalist id="productname7">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode7').keyup(function () {
                  var itemcode7 = 0;
                  $('.itemcode7').each(function() {
                    itemcode7 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode7},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price7").val(rep.selling_price); 
                       $("#description7").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description7" name="description7"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity7"type="text"name="quantity7">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price7"type="text"id="Price7" name="amount7"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total7"name="total7"disabled /></td>

             <script type="text/javascript">  
               $('.price7,.quantity7').keyup(function () {
                 var sum7 = 0;
                 $('.price7').each(function() {
                   sum7 = Number($(this).val());
                 });
                 $('.quantity7').each(function() {
                  sum7 *= Number($(this).val());
                 });
                 $('#total7').val(sum7);   
                 });
             </script>
            </tr>


            <!-- form no 8 -->


            <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">8</td>
             <td id="itemcode8">
              <input style="width:175px;text-align:center;"class="form-control itemcode8"type="text"name="itemcode8" list="productname8">
              <datalist id="productname8">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode8').keyup(function () {
                  var itemcode8 = 0;
                  $('.itemcode8').each(function() {
                    itemcode8 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode8},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price8").val(rep.selling_price); 
                       $("#description8").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description8" name="description8"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity8"type="text"name="quantity8">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price8"type="text"id="Price8" name="amount8"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total8"name="total8"disabled /></td>

             <script type="text/javascript">  
               $('.price8,.quantity8').keyup(function () {
                 var sum8 = 0;
                 $('.price8').each(function() {
                   sum8 = Number($(this).val());
                 });
                 $('.quantity8').each(function() {
                  sum8 *= Number($(this).val());
                 });
                 $('#total8').val(sum8);   
                 });
             </script>
            </tr>


            <!-- form no 9 -->


            <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">9</td>
             <td id="itemcode9">
              <input style="width:175px;text-align:center;"class="form-control itemcode9"type="text"name="itemcode9" list="productname9">
              <datalist id="productname9">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode9').keyup(function () {
                  var itemcode9 = 0;
                  $('.itemcode9').each(function() {
                    itemcode9 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode9},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price9").val(rep.selling_price); 
                       $("#description9").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description9" name="description9"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity9"type="text"name="quantity9">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price9"type="text"id="Price9" name="amount9"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total9"name="total9"disabled /></td>

             <script type="text/javascript">  
               $('.price9,.quantity9').keyup(function () {
                 var sum9 = 0;
                 $('.price9').each(function() {
                   sum9 = Number($(this).val());
                 });
                 $('.quantity9').each(function() {
                  sum9 *= Number($(this).val());
                 });
                 $('#total9').val(sum9);   
                 });
             </script>
            </tr>


            <!-- form no 10 -->


            <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">10</td>
             <td id="itemcode10">
              <input style="width:175px;text-align:center;"class="form-control itemcode10"type="text"name="itemcode10" list="productname10">
              <datalist id="productname10">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode10').keyup(function () {
                  var itemcode10 = 0;
                  $('.itemcode10').each(function() {
                    itemcode10 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode10},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price10").val(rep.selling_price); 
                       $("#description10").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description10" name="description10"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity10"type="text"name="quantity10">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price10"type="text"id="Price10" name="amount10"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total10"name="total10"disabled /></td>

             <script type="text/javascript">  
               $('.price10,.quantity10').keyup(function () {
                 var sum10 = 0;
                 $('.price10').each(function() {
                   sum10 = Number($(this).val());
                 });
                 $('.quantity10').each(function() {
                  sum10 *= Number($(this).val());
                 });
                 $('#total10').val(sum10);   
                 });
             </script>
            </tr>

            
            <!-- form no 11 -->

            
            <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">11</td>
             <td id="itemcode11">
              <input style="width:175px;text-align:center;"class="form-control itemcode11"type="text"name="itemcode11" list="productname11">
              <datalist id="productname11">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode11').keyup(function () {
                  var itemcode11 = 0;
                  $('.itemcode11').each(function() {
                    itemcode11 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode11},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price11").val(rep.selling_price); 
                       $("#description11").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description11" name="description11"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity11"type="text"name="quantity11">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price11"type="text" id="Price11"name="amount11"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total11"name="total11"disabled /></td>

             <script type="text/javascript">  
               $('.price11,.quantity11').keyup(function () {
                 var sum11 = 0;
                 $('.price11').each(function() {
                   sum11 = Number($(this).val());
                 });
                 $('.quantity11').each(function() {
                  sum11 *= Number($(this).val());
                 });
                 $('#total11').val(sum11);   
                 });
             </script>
            </tr>


            <!-- form no 12 -->

            
            <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">12</td>
             <td id="itemcode12">
              <input style="width:175px;text-align:center;"class="form-control itemcode12"type="text"name="itemcode12" list="productname12">
              <datalist id="productname12">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode12').keyup(function () {
                  var itemcode12 = 0;
                  $('.itemcode12').each(function() {
                    itemcode12 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode12},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price12").val(rep.selling_price); 
                       $("#description12").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description12" name="description12"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity12"type="text"name="quantity12">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price12"type="text"id="Price12" name="amount12"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total12"name="total12"disabled /></td>

             <script type="text/javascript">  
               $('.price12,.quantity12').keyup(function () {
                 var sum12 = 0;
                 $('.price12').each(function() {
                   sum12 = Number($(this).val());
                 });
                 $('.quantity12').each(function() {
                  sum12 *= Number($(this).val());
                 });
                 $('#total12').val(sum12);   
                 });
             </script>
            </tr>


            <!-- form no 13 -->

             

            <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">13</td>
             <td id="itemcode13">
              <input style="width:175px;text-align:center;"class="form-control itemcode13"type="text"name="itemcode13" list="productname13">
              <datalist id="productname13">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode13').keyup(function () {
                  var itemcode13 = 0;
                  $('.itemcode13').each(function() {
                    itemcode13 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode13},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price13").val(rep.selling_price); 
                       $("#description13").val(rep.description); 
                    } 
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description13" name="description13"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity13"type="text"name="quantity13">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price13"type="text"id="Price13" name="amount13"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total13"name="total13"disabled /></td>

             <script type="text/javascript">  
               $('.price13,.quantity13').keyup(function () {
                 var sum13 = 0;
                 $('.price13').each(function() {
                   sum13 = Number($(this).val());
                 });
                 $('.quantity13').each(function() {
                  sum13 *= Number($(this).val());
                 });
                 $('#total13').val(sum13);   
                 });
             </script>
            </tr>


            <!-- form no 14 -->

             

            <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">14</td>
             <td id="itemcode14">
              <input style="width:175px;text-align:center;"class="form-control itemcode14"type="text"name="itemcode14" list="productname14">
              <datalist id="productname14">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode14').keyup(function () {
                  var itemcode14 = 0;
                  $('.itemcode14').each(function() {
                    itemcode14 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode14},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price14").val(rep.selling_price); 
                       $("#description14").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description14" name="description14"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity14"type="text"name="quantity14">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price14"type="text"id="Price14" name="amount14"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total14"name="total14"disabled /></td>

             <script type="text/javascript">  
               $('.price14,.quantity14').keyup(function () {
                 var sum14 = 0;
                 $('.price14').each(function() {
                   sum14 = Number($(this).val());
                 });
                 $('.quantity14').each(function() {
                  sum14 *= Number($(this).val());
                 });
                 $('#total14').val(sum14);   
                 });
             </script>
            </tr>


            <!-- form no 15 -->

            
            <tr style="padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd">
             <td style=" text-align: center;">15</td>
             <td id="itemcode15">
              <input style="width:175px;text-align:center;"class="form-control itemcode15"type="text"name="itemcode15" list="productname15">
              <datalist id="productname15">
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
             </td>

              
             <script type="text/javascript">
               
               $(function () {

                $('.itemcode15').keyup(function () {
                  var itemcode15 = 0;
                  $('.itemcode15').each(function() {
                    itemcode15 = $(this).val();
                  });  

                 console.log('starting ajax');

                 $.ajax({                                      
                    url: 'get_price_from_database.php',  
                    type: "POST",
                    data: {itemcode:itemcode15},                      
                    success: function(json)  {
                      console.log(json);
                      var rep = JSON.parse(json);
                       $("#Price15").val(rep.selling_price); 
                       $("#description15").val(rep.description); 
                    }  
                  });

                 });
               });
             </script>


             <td style=" text-align: center;">
               <input style="background-color: white; text-align: center; width: 90%;" id="description15" name="description15"  />
             </td>
             <td style=" text-align: center;">
              <input style="width:105px;text-align:center;"class="form-control quantity15"type="text"name="quantity15">
             </td>
             <td><input style="width:125px;text-align:center;"class="form-control price15"type="text" id="Price15"name="amount15"></td>
             <td><input style="background-color:white;text-align:center;width:100px;"id="total15"name="total15"disabled /></td>

             <script type="text/javascript">  
               $('.price15,.quantity15').keyup(function () {
                 var sum15 = 0;
                 $('.price15').each(function() {
                   sum15 = Number($(this).val());
                 });
                 $('.quantity15').each(function() {
                  sum15 *= Number($(this).val());
                 });
                 $('#total15').val(sum15);   
                 });
             </script>
            </tr>


            <!-- final money of form -->

          </tbody>

              <tfoot>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center;">----</td>
                <td></td>
              </tfoot>

        </table>

                <br><hr>

                <button type="submit" class="registerbtn" name="shop_product" style="background-color: green">Submit Shop</button>
                <button type="reset" class="registerbtn" style="background-color: red;">Clear Form</button>  
              
              </div>
           </form>  
      </div>  
     </div>

     </div>
    </div>

  </div>

</body>
</html>

