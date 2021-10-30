<?php
session_start();
$codeshop = $_SESSION['codeshop'];
include '../database.php';
if(isset($_POST['sale'])){

  $customer_name = $_POST['customer_name'];
  $address = $_POST['address'];

  //$date = $_POST['date'];
  $date = date("Y-m-d");
  $type = $_POST['type'];

  $itemcode1 = $_POST['itemcode1'];
  $quantity1 = $_POST['quantity1'];
  $description1 = $_POST['description1'];
  $price1 = $_POST['amount1'];
  $total1 = ($quantity1)*($price1);
  $buying1 = $_POST['amount1b'];

  $itemcode2 = $_POST['itemcode2'];
  $quantity2 = $_POST['quantity2'];
  $description2 = $_POST['description2'];
  $price2 = $_POST['amount2'];
  $total2 = $quantity2*$price2;
  $buying2 = $_POST['amount2b'];
 
  $itemcode3 = $_POST['itemcode3'];
  $quantity3 = $_POST['quantity3'];
  $description3 = $_POST['description3'];
  $price3 = $_POST['amount3'];
  $total3 = $quantity3*$price3;
  $buying3 = $_POST['amount3b'];

  $itemcode4 = $_POST['itemcode4'];
  $quantity4 = $_POST['quantity4'];
  $description4 = $_POST['description4'];
  $price4 = $_POST['amount4'];
  $total4 = $quantity4*$price4;
  $buying4 = $_POST['amount4b'];

  $itemcode5 = $_POST['itemcode5'];
  $quantity5 = $_POST['quantity5'];
  $description5 = $_POST['description5'];
  $price5 = $_POST['amount5'];
  $total5 = $quantity5*$price5;
  $buying5 = $_POST['amount5b'];
 
  $itemcode6 = $_POST['itemcode6'];
  $quantity6 = $_POST['quantity6'];
  $description6 = $_POST['description6'];
  $price6 = $_POST['amount6'];
  $total6 = $quantity6*$price6;
  $buying6 = $_POST['amount6b'];

  $itemcode7 = $_POST['itemcode7'];
  $quantity7 = $_POST['quantity7'];
  $description7 = $_POST['description7'];
  $price7 = $_POST['amount7'];
  $total7 = $quantity7*$price7;
  $buying7 = $_POST['amount7b'];

  $itemcode8 = $_POST['itemcode8'];
  $quantity8 = $_POST['quantity8'];
  $description8 = $_POST['description8'];
  $price8 = $_POST['amount8'];
  $total8 = $quantity8*$price8;
  $buying8 = $_POST['amount8b'];

  $itemcode9 = $_POST['itemcode9'];
  $quantity9 = $_POST['quantity9'];
  $description9 = $_POST['description9'];
  $price9 = $_POST['amount9'];
  $total9 = $quantity9*$price9;
  $buying9 = $_POST['amount9b'];

  $itemcode10 = $_POST['itemcode10'];
  $quantity10 = $_POST['quantity10'];
  $description10 = $_POST['description10'];
  $price10 = $_POST['amount10'];
  $total10 = $quantity10*$price10;
  $buying10 = $_POST['amount10b'];

  $itemcode11 = $_POST['itemcode11'];
  $quantity11 = $_POST['quantity11'];
  $description11 = $_POST['description11'];
  $price11 = $_POST['amount11'];
  $total11 = $quantity11*$price11;
  $buying11 = $_POST['amount11b'];

  $itemcode12 = $_POST['itemcode12'];
  $quantity12 = $_POST['quantity12'];
  $description12 = $_POST['description12'];
  $price12 = $_POST['amount12'];
  $total12 = $quantity12*$price12;
  $buying12 = $_POST['amount12b'];
  
  $itemcode13 = $_POST['itemcode13'];
  $quantity13 = $_POST['quantity13'];
  $description13 = $_POST['description13'];
  $price13 = $_POST['amount13'];
  $total13 = $quantity13*$price13;
  $buying13 = $_POST['amount13b'];

  $itemcode14 = $_POST['itemcode14'];
  $quantity14 = $_POST['quantity14'];
  $description14 = $_POST['description14'];
  $price14 = $_POST['amount14'];
  $total14 = $quantity14*$price14;
  $buying14 = $_POST['amount14b'];

  $itemcode15 = $_POST['itemcode15'];
  $quantity15 = $_POST['quantity15'];
  $description15 = $_POST['description15'];
  $price15 = $_POST['amount15'];
  $total15 = $quantity15*$price15;
  $buying15 = $_POST['amount15b'];

  $final_total = $total1+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9+$total10+$total11+$total12+$total13+$total14+$total15;
  $final_buying = $buying1+$buying2+$buying3+$buying4+$buying5+$buying6+$buying7+$buying8+$buying9+$buying10+$buying11+$buying12+$buying13+$buying14+$buying15;


  $getbillno = mysql_query("SELECT * FROM  sale");
  while($row = mysql_fetch_array($getbillno)){
  $oldbillno = $row['bill_no'];}
  $newbillno = $oldbillno + 1;

  $insert= mysql_query("INSERT into sale(bill_no, name, address, datee, amount, type, amount_buying, shopcode) values ('$newbillno','$customer_name','$address','$date','$final_total','$type','$final_buying','$codeshop')");

  $getbalance = mysql_query("SELECT * FROM  cash");
  while($row = mysql_fetch_array($getbalance)){
  $oldbalance = $row['balance'];}
  $newbalance = $oldbalance + $final_total;

  $insert_cash = mysql_query("INSERT INTO cash(name,datee,type,debit,credit,balance,shopcode) VALUES('$customer_name','$date','$type','$final_buying','$final_total','$newbalance','$codeshop')");


  if($insert && $insert_cash){

     $get_old_qty1 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode1'");
     $row1 = mysql_fetch_array($get_old_qty1);
     $get_old_qty1 = $row1['qty'];
     $newqty1 = $get_old_qty1 - $quantity1;
     $insert1= mysql_query("UPDATE product SET qty = '$newqty1' WHERE name = '$itemcode1'");

     $get_old_qty2 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode2'");
     $row2 = mysql_fetch_array($get_old_qty2);
     $get_old_qty2 = $row2['qty'];
     $newqty2 = $get_old_qty2 - $quantity2;
     $insert2= mysql_query("UPDATE product SET qty = '$newqty2' WHERE name = '$itemcode2'");

     $get_old_qty3 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode3'");
     $row3 = mysql_fetch_array($get_old_qty3);
     $get_old_qty3 = $row3['qty'];
     $newqty3 = $get_old_qty3 - $quantity3;
     $insert3= mysql_query("UPDATE product SET qty = '$newqty3' WHERE name = '$itemcode3'");

     $get_old_qty4 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode4'");
     $row4 = mysql_fetch_array($get_old_qty4);
     $get_old_qty4 = $row4['qty'];
     $newqty4 = $get_old_qty4 - $quantity4;
     $insert4= mysql_query("UPDATE product SET qty = '$newqty4' WHERE name = '$itemcode4'");

     $get_old_qty5 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode5'");
     $row5 = mysql_fetch_array($get_old_qty5);
     $get_old_qty5 = $row5['qty'];
     $newqty5 = $get_old_qty5 - $quantity5;
     $insert5= mysql_query("UPDATE product SET qty = '$newqty5' WHERE name = '$itemcode5'");

     $get_old_qty6 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode6'");
     $row6 = mysql_fetch_array($get_old_qty6);
     $get_old_qty6 = $row6['qty'];
     $newqty6 = $get_old_qty6 - $quantity6;
     $insert6= mysql_query("UPDATE product SET qty = '$newqty6' WHERE name = '$itemcode6'");

     $get_old_qty7 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode7'");
     $row7 = mysql_fetch_array($get_old_qty7);
     $get_old_qty7 = $row7['qty'];
     $newqty7 = $get_old_qty7 - $quantity7;
     $insert7= mysql_query("UPDATE product SET qty = '$newqty7' WHERE name = '$itemcode7'");

     $get_old_qty8 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode8'");
     $row8 = mysql_fetch_array($get_old_qty8);
     $get_old_qty8 = $row8['qty'];
     $newqty8 = $get_old_qty8 - $quantity8;
     $insert8= mysql_query("UPDATE product SET qty = '$newqty8' WHERE name = '$itemcode8'");

     $get_old_qty9 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode9'");
     $row9 = mysql_fetch_array($get_old_qty9);
     $get_old_qty9 = $row9['qty'];
     $newqty9 = $get_old_qty9 - $quantity9;
     $insert9= mysql_query("UPDATE product SET qty = '$newqty9' WHERE name = '$itemcode9'");

     $get_old_qty10 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode10'");
     $row10 = mysql_fetch_array($get_old_qty10);
     $get_old_qty10 = $row10['qty'];
     $newqty10 = $get_old_qty10 - $quantity10;
     $insert10= mysql_query("UPDATE product SET qty = '$newqty10' WHERE name = '$itemcode10'");

     $get_old_qty11 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode11'");
     $row11 = mysql_fetch_array($get_old_qty11);
     $get_old_qty11 = $row11['qty'];
     $newqty11 = $get_old_qty11 - $quantity11;
     $insert11= mysql_query("UPDATE product SET qty = '$newqty11' WHERE name = '$itemcode11'");

     $get_old_qty12 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode12'");
     $row12 = mysql_fetch_array($get_old_qty12);
     $get_old_qty12 = $row12['qty'];
     $newqty12 = $get_old_qty12 - $quantity12;
     $insert12= mysql_query("UPDATE product SET qty = '$newqty12' WHERE name = '$itemcode12'");

     $get_old_qty13 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode13'");
     $row13 = mysql_fetch_array($get_old_qty13);
     $get_old_qty13 = $row13['qty'];
     $newqty13 = $get_old_qty13 - $quantity13;
     $insert13= mysql_query("UPDATE product SET qty = '$newqty13' WHERE name = '$itemcode13'");

     $get_old_qty14 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode14'");
     $row14 = mysql_fetch_array($get_old_qty14);
     $get_old_qty14 = $row14['qty'];
     $newqty14 = $get_old_qty14 - $quantity14;
     $insert14= mysql_query("UPDATE product SET qty = '$newqty14' WHERE name = '$itemcode14'");

     $get_old_qty15 = mysql_query("SELECT * FROM  product WHERE name = '$itemcode15'");
     $row15 = mysql_fetch_array($get_old_qty15);
     $get_old_qty15 = $row15['qty'];
     $newqty15 = $get_old_qty15 - $quantity15;
     $insert15= mysql_query("UPDATE product SET qty = '$newqty15' WHERE name = '$itemcode15'");


     $insert_item = mysql_query("INSERT INTO sale_itemcode(type,type_no,datee,balance,itemcode1,itemcode2,itemcode3,itemcode4,itemcode5,itemcode6,itemcode7,itemcode8,itemcode9,itemcode10,itemcode11,itemcode12,itemcode13,itemcode14,itemcode15,qn1,qn2,qn3,qn4,qn5,qn6,qn7,qn8,qn9,qn10,qn11,qn12,qn13,qn14,qn15,ds1,ds2,ds3,ds4,ds5,ds6,ds7,ds8,ds9,ds10,ds11,ds12,ds13,ds14,ds15,pe1,pe2,pe3,pe4,pe5,pe6,pe7,pe8,pe9,pe10,pe11,pe12,pe13,pe14,pe15,am1,am2,am3,am4,am5,am6,am7,am8,am9,am10,am11,am12,am13,am14,am15,tqn1,tqn2,tqn3,tqn4,tqn5,tqn6,tqn7,tqn8,tqn9,tqn10,tqn11,tqn12,tqn13,tqn14,tqn15,shopcode) VALUES('sale','$newbillno','$date','$final_total','$itemcode1','$itemcode2','$itemcode3','$itemcode4','$itemcode5','$itemcode6','$itemcode7','$itemcode8','$itemcode9','$itemcode10','$itemcode11','$itemcode12','$itemcode13','$itemcode14','$itemcode15','$quantity1','$quantity2','$quantity3','$quantity4','$quantity5','$quantity6','$quantity7','$quantity8','$quantity9','$quantity10','$quantity11','$quantity12','$quantity13','$quantity14','$quantity15','$description1','$description2','$description3','$description4','$description5','$description6','$description7','$description8','$description9','$description10','$description11','$description12','$description13','$description14','$description15','$price1','$price2','$price3','$price4','$price5','$price6','$price7','$price8','$price9','$price10','$price11','$price12','$price13','$price14','$price15','$total1','$total2','$total3','$total4','$total5','$total6','$total7','$total8','$total9','$total10','$total11','$total12','$total13','$total14','$total15','$newqty1','$newqty2','$newqty3','$newqty4','$newqty5','$newqty6','$newqty7','$newqty8','$newqty9','$newqty10','$newqty11','$newqty12','$newqty13','$newqty14','$newqty15','$codeshop')");


  }else {
    echo "<script>
        alert('Error in Sale !');
        window.location.href='sale.php';
        </script>";
    } 
  }


?>

<!DOCTYPE html>
<html>
<head>
  <title>Sale_receipt</title>
  <style>
      #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

     #customers td, #customers th {
       border: 1px solid #ddd;
      }

     #customers tr:nth-child(even){background-color: #f2f2f2;}
     #customers tr:hover {background-color: #ddd;}
   </style>
</head>
<body>
   <div style="position: absolute; top: 20px; left: 60px; width: 300px; height: 200px;">
    <p><b style="font-size: 20px;"><u>Suborna Electronics</u></b><br>122, College Road<br><u>Gopalgonj.</u><br><br><b style="font-size: 17px;"><u>Customer Name:</u></b><?php echo "  "; echo $customer_name; ?><br><b><u>Address:</u></b><?php echo "  "; echo $address; ?></p>
   </div>
   <div style="position: absolute; top: 20px; left: 480px; width: 300px; height: 200px;">
     <p><b style="font-size: 20px;"><u>Cash Sales Memo</u></b><br><br>Date: <?php echo $date;?><br>Sale No: <?php echo $newbillno;?><br>Rep:<br>Payment Method:</p>
   </div>

   <div style="position: absolute; top: 160px; left: 30px; width: 650px; height: 420px;">
    <table style="width: 100%; height: 100%;" id="customers">
      <thead>
        <tr>
          <th style="text-align: center; width:50%;" >Description</th>
          <th style="text-align: center; width: 15%;">Qty</th>
          <th style="text-align: center; width: 15%;">Rate</th>
          <th style="text-align: center; width: 15%;">Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th><?php echo $description1; ?></th>
          <th><?php echo $quantity1; ?></th>
          <th><?php echo $price1; ?></th>
          <th><?php echo $total1; ?></th>
        </tr>
        <tr>
          <th><?php echo $description2; ?></th>
          <th><?php echo $quantity2; ?></th>
          <th><?php echo $price2; ?></th>
          <th><?php echo $total2; ?></th>
        </tr>
        <tr>
          <th><?php echo $description3; ?></th>
          <th><?php echo $quantity3; ?></th>
          <th><?php echo $price3; ?></th>
          <th><?php echo $total3; ?></th>
        </tr>
        <tr>
          <th><?php echo $description4; ?></th>
          <th><?php echo $quantity4; ?></th>
          <th><?php echo $price4; ?></th>
          <th><?php echo $total4; ?></th>
        </tr>
        <tr>
          <th><?php echo $description5; ?></th>
          <th><?php echo $quantity5; ?></th>
          <th><?php echo $price5; ?></th>
          <th><?php echo $total5; ?></th>
        </tr>
        <tr>
          <th><?php echo $description6; ?></th>
          <th><?php echo $quantity6; ?></th>
          <th><?php echo $price6; ?></th>
          <th><?php echo $total6; ?></th>
        </tr>
        <tr>
          <th><?php echo $description7; ?></th>
          <th><?php echo $quantity7; ?></th>
          <th><?php echo $price7; ?></th>
          <th><?php echo $total7; ?></th>
        </tr>
        <tr>
          <th><?php echo $description8; ?></th>
          <th><?php echo $quantity8; ?></th>
          <th><?php echo $price8; ?></th>
          <th><?php echo $total8; ?></th>
        </tr>
        <tr>
          <th><?php echo $description9; ?></th>
          <th><?php echo $quantity9; ?></th>
          <th><?php echo $price9; ?></th>
          <th><?php echo $total9; ?></th>
        </tr>
        <tr>
          <th><?php echo $description10; ?></th>
          <th><?php echo $quantity10; ?></th>
          <th><?php echo $price10; ?></th>
          <th><?php echo $total10; ?></th>
        </tr>
        <tr>
          <th><?php echo $description11; ?></th>
          <th><?php echo $quantity11; ?></th>
          <th><?php echo $price11; ?></th>
          <th><?php echo $total11; ?></th>
        </tr>
        <tr>
          <th><?php echo $description12; ?></th>
          <th><?php echo $quantity12; ?></th>
          <th><?php echo $price12; ?></th>
          <th><?php echo $total12; ?></th>
        </tr>
        <tr>
          <th><?php echo $description13; ?></th>
          <th><?php echo $quantity13; ?></th>
          <th><?php echo $price13; ?></th>
          <th><?php echo $total13; ?></th>
        </tr>
        <tr>
          <th><?php echo $description14; ?></th>
          <th><?php echo $quantity14; ?></th>
          <th><?php echo $price14; ?></th>
          <th><?php echo $total14; ?></th>
        </tr>
        <tr>
          <th><?php echo $description15; ?></th>
          <th><?php echo $quantity15; ?></th>
          <th><?php echo $price15; ?></th>
          <th><?php echo $total15; ?></th>
        </tr>
            <tr>
              <th><b>Don't Worry! You Can<br>Return/Exchange Before Using.</b></th>
            </tr>
      </tbody>
    </table>
   </div>
   <br>

   <div style="position: absolute; top: 590px; left: 30px; width: 650px; height: 150px;">
     <div style="position: absolute; left: 40%; width: 380px; height: 70px;">
      <p><b style="padding-left: 200px; font-size: 21px;">Total tk = <?php echo $final_total;echo " "; ?>/=</b></p>
     </div>
     <div style="position: absolute; top: 80px; left: 20px; width: 150px; height: 70px;">
      <p style="text-align: center;"><u>Cell No</u><br>01714032331</p>
     </div>
     <div style="position: absolute; top: 80px; left: 180px; width: 150px; height: 70px;">
      <p style="text-align: center;"><u>Phon</u><br>01781805342</p>
     </div>
     <div style="position: absolute; top: 80px; left: 340px; width: 180px; height: 70px;">
      <p style="text-align: center;"><u>E-mail</u><br>subornoelectric@gmail.com</p>
     </div>
     <div style="position: absolute; top: 108px; left: 590px; width: 50px; height: 30px;">
      <button onclick="myFunction()">Print</button>
     </div>
   </div>
   <script>
     function myFunction() {
        window.print();
     }
   </script>
</body>
</html>