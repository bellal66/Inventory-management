<?php
if($_SESSION["isLogin"]!=true){
       header("Location: index.php");
       die();
  }
    include '../database.php';

    if( isset( $_POST['submit'] ) ){

      $year = $_POST['year'];

      	$sendtable = "SELECT * FROM statistics WHERE year='" . $year . "'"; 
        $result = mysql_query($sendtable);
        $row = mysql_fetch_array($result);

    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Year chart</title>
	<style>
          @font-face {
             font-family: 'Roboto';
             font-style: normal;
             font-weight: 400;
               }
           #bar_partt{
            position: absolute;
            left: 150px;
            top: 30px;
            width: 97%;
            height: 40%;
            background: #black;
           }
           #chartt {
             position: absolute;
             left: 150px;
             top: 50px;
             width: 800px;
             height: 86%;
             margin: 30px auto 0;
             display: block;
             background: black;
             font-family: Roboto;
             }
           #chartt #numbers {
             width: 50px;
             height: 100%;
             margin: 0;
             padding: 0;
             display: inline-block;
             float: left;
               }
           #chartt #numbers li {
             text-align: right;
             padding-right: 1em;
             list-style: none;
             height: 29px;
             border-bottom: 1px solid #444;
             position: relative;
             bottom: 30px;
             }
         #chartt #numbers li:last-child {
           height: 30px;
          }
         #chartt #numbers li span {
           color: #eee;
           position: absolute;
           bottom: 0;
           right: 10px;
          }
         #chartt #bars {
           display: inline-block;
           background: rgba(0, 0, 0, 0.2);
           width: 600px;
           height: 300px;
           padding: 0;
           margin: 0;
           box-shadow: 0 0 0 1px #444;
           }
         #chartt #bars li {
            display: table-cell;
            width: 100px;
            height: 300px;
            margin: 0;
            text-align: center;
            position: relative;
           }
         #chartt #bars li .bar {
            display: block;
            width: 20px;
            margin-left: 5px;
            background: #ff33cc;
            position: absolute;
            bottom: 0;
            }
         #chartt #bars li .bar:hover {
             background: #5AE;
             cursor: pointer;
           }
         #chartt #bars li .bar:hover:before {
             color: white;
             content: attr(data-percentage) '%';
             position: relative;
             bottom: 15px;
           }
         #chartt #bars li span {
             color: #eee;
             width: 100%;
             position: absolute;
             bottom: -2em;
             left: 0;
             text-align: center;
           }
       </style>
</head>
<body>
  <div style="position: absolute; top: 50px; left: 30px; width: 1300px; height: 800px; background-color: black;">
  	  <div id="bar_partt">
         <div id="chartt">
           <ul id="numbers">
             <li><span>100%</span></li>
             <li><span>90%</span></li>
             <li><span>80%</span></li>
             <li><span>70%</span></li>
             <li><span>60%</span></li>
             <li><span>50%</span></li>
             <li><span>40%</span></li>
             <li><span>30%</span></li>
             <li><span>20%</span></li>
             <li><span>10%</span></li>
             <li><span>0%</span></li>
           </ul>
             
           <ul id="bars">
             <li><div class="bar"></div><span>Start</span></li>
             <li><div data-percentage="<?php echo $row['january']; ?>" class="bar"></div><span>Jan</span></li>
             <li><div data-percentage="<?php echo $row['february']; ?>" class="bar"></div><span>Feb</span></li>
             <li><div data-percentage="<?php echo $row['march']; ?>" class="bar"></div><span>Mrc</span></li>
             <li><div data-percentage="<?php echo $row['appril']; ?>" class="bar"></div><span>Apr</span></li>
             <li><div data-percentage="<?php echo $row['may']; ?>" class="bar"></div><span>May</span></li>
             <li><div data-percentage="<?php echo $row['june']; ?>" class="bar"></div><span>Jun</span></li>
             <li><div data-percentage="<?php echo $row['july']; ?>" class="bar"></div><span>Jul</span></li>
             <li><div data-percentage="<?php echo $row['august']; ?>" class="bar"></div><span>Aug</span></li>
             <li><div data-percentage="<?php echo $row['september']; ?>" class="bar"></div><span>Sep</span></li>
             <li><div data-percentage="<?php echo $row['october']; ?>" class="bar"></div><span>Oct</span></li>
             <li><div data-percentage="<?php echo $row['nobember']; ?>" class="bar"></div><span>Nob</span></li>
             <li><div data-percentage="<?php echo $row['december']; ?>" class="bar"></div><span>Dec</span></li>
             <li><div class="bar"></div><span>End</span></li>
           </ul>
         </div>
        </div>
  </div>
</body>
</html>
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