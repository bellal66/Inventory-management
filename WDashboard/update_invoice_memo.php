<?php
if(isset($_GET["bill"]))
  {
    $bill = (string)$_GET["bill"];
  }      
?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice_receipt</title>
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
   <?php
    include '../database.php';

    $result = mysql_query("SELECT * from invoice WHERE bill_no='$bill'");
    $row = mysql_fetch_array($result);

   ?>
   <div style="position: absolute; top: 20px; left: 60px; width: 300px; height: 200px;">
   	<p><b style="font-size: 25px;"><u>INVOICE</u></b><br><br><b style="font-size: 20px;"><u>Suborna Electronics</u></b><br>122, College Road<br>Gopalgonj,<br><b>phone# 01714032331<br>Cell No# 01714032331</b></p>
   </div>
   <div style="position: absolute; top: 38px; left: 430px; width: 300px; height: 50px;">
   	 <table id="table">
	   <tr>
	    <th style="text-align: center;">Date</th>
		 <th style="text-align: center;">Invoice No</th>
		 <th style="text-align: center;">Rep</th>
	  </tr>
	  <tr style="padding-left: 20px;">
	    <th style="border-style: groove;text-align: center;"><?php echo $row['datee']; ?></th>
		 <th style="border-style: groove;text-align: center;"><?php echo $row['bill_no']; ?></th>
		 <th style="border-style: groove;text-align: center;">------</th>
	  </tr>
	 </table>
	</div>
    
	<div style="position: absolute; top: 100px; left: 420px; width: 280px; height: 90px;">
	  <br><b style="font-size: 17px;"><u>Customer Name:</u></b>
	  <?php echo $row['name']; ?>
	  <br><b style="font-size: 17px;"><u>Address:</u></b>
	  <?php echo $row['address']; ?>
	</div>
	
   <div style="position: absolute; top: 193px; left: 30px; width: 650px; height: 200px;">
   	<table style="width: 100%; height: 100%;" id="customers">
   		<thead>
   			<tr>
   				<th style="text-align: center; width:35%;" >Description</th>
   				<th style="text-align: center; width: 22%;">Submited Money</th>
   				<th style="text-align: center; width: 22%;">Owing Money</th>
   				<th style="text-align: center; width: 22%;">Amount</th>
   			</tr>
   		</thead>
   		<tbody>
   			<tr>
   				<th><?php echo "Invoice Received Money"; ?></th>
               <th><?php echo $row['owing_money'];  ?></th>
               <th><?php echo $row['Submit_money'];  ?></th>
               <th><?php echo $row['amount']; ?></th>
   			</tr>
            <tr>
               <th></th>
               <th></th>
               <th></th>
               <th>0</th>
            </tr>
            <tr>
               <th></th>
               <th></th>
               <th></th>
               <th>0</th>
            </tr>
            <tr>
               <th></th>
               <th></th>
               <th></th>
               <th>0</th>
            </tr>
            <tr>
               <th></th>
               <th></th>
               <th></th>
               <th>0</th>
            </tr>
            <tr>
               <th></th>
               <th></th>
               <th></th>
               <th>0</th>
            </tr>
            <tr>
               <th></th>
               <th></th>
               <th></th>
               <th>0</th>
            </tr>
            <tr>
            	<th><b>Don't Worry! You Can<br>Return/Exchange Before Using.</b></th>
            	<th>--</th>
            	<th>--</th>
            	<th>--</th>
            </tr>
   		</tbody>
   	</table>
   </div>
   <br>

   <div style="position: absolute; top: 450px; left: 30px; width: 650px; height: 150px;">
   	 <div style="position: absolute; left: 40%; width: 380px; height: 70px;">
   	 	<p><b style="padding-left: 200px; font-size: 21px;">Total tk = <?php echo $row['amount'];echo " " ; ?>/=</b></p>
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