<?php
if(isset($_GET["barcode"]))
  {
    $barcode = (string)$_GET["barcode"];
    $qty = (int)$_GET["qty"];
    $name = (string)$_GET["name"];
  }
?>
<html>
  <head>
    <title>Barcode</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src='jquery.js'></script>
    <style type="text/css">
    	#maindiv{
    		
    	}
    </style>
	</head>
	<body>

        <button style="position: absolute; left: 50;top: 450px;background-color: white; border: 1px solid white;" onclick="printContent('print')">p</button>
        <script>
         function printContent(el) {
         var restorepage = document.body.innerHTML;
         var printcontent = document.getElementById(el).innerHTML;
         document.body.innerHTML = printcontent;
         window.print();
         document.body.innerHTML = restorepage;
         }
        </script>

		<div class='resp_code'>
		<center><b>Barcode Generator</b></center><br><br>
					  <script type='text/javascript'>
					  function chk(){
					  var sds = document.getElementById("dum");
					  if(sds == null){
						  alert("You are using a free package.\n You are not allowed to remove the tag.\n");
					  }
					  var sdss = document.getElementById("dumdiv");
					  if(sdss == null){
						  alert("You are using a free package.\n You are not allowed to remove the tag.\n");
						  document.getElementById("content").style.visibility="hidden";
					  }
					  }
					  window.onload=chk;
					  function get_barcode()
					  {
                        var quantity= document.getElementById('qty').value;
                        var name = document.getElementById('name').value;
						var str = document.getElementById('txtstr').value;
						var siz = document.getElementById('txtsize').value;
						var orientation = $("#orientation option:selected" ).text();
						var codetype = $("#codetype option:selected" ).text();
						if (str=='' || siz=='') {
						 alert("Enter values properly!");
						}
						else if (codetype=='Codabar') {							   								 
						  var regex = /^[0-9?=.$\/+-:]+$/;
						  if (!regex.test($("#txtstr").val())){
							alert("Codabar Accepts Only 0-9 and .$/+-:");
							document.getElementById('txtstr').value='';
						  }
						  else{
							$.ajax({
									  type: "POST",
									  url: "barcode.php",
									  data:{name:name,str:str,size:siz,orientation:orientation,codetype:codetype},
									  success: function(data){
									// alert(data);
									 if (data) {
									  var i=4;
									 	var div = "#maindiv";
									 	for(i=1; i<=quantity; i++){
									 	  var name = div + i;
									      $(name).html(data);
									    }
									     //window.localtion.reload();
									     document.getElementById('txtstr').value='';
									     document.getElementById('txtsize').value='';
									
									 }               
									  }
								  })
						  }
						}		
						else
						{
											$('.load').show();
											$("#btn").hide();
							  $.ajax({
									  type: "POST",
									  url: "barcode.php",
									  data:{name:name,str:str,size:siz,orientation:orientation,codetype:codetype},
									  success: function(data){
									// alert(data);
									 if (data) {
									 	var i=4;
									 	var div = "#maindiv";
									 	for(i=1; i<=quantity; i++){
									 	  var name = div + i;
									      $(name).html(data);
									    }
									      //window.localtion.reload();
									      document.getElementById('txtstr').value='';
									      document.getElementById('txtsize').value='';									
									 }               
									  },
									  complete: function(){
											$('.load').hide();
											$("#btn").show();                     
											}
								  })
						}			
					  }
					  function checnum(as)
					  {
						var dd = as.value;
						if(dd.lastIndexOf(" ")>=0){dd = dd.replace(" ","");as.value = dd;
						}
						if(isNaN(dd))
						{
						dd = dd.substring(0,(dd.length-1));
						as.value = dd;
						}
					  }
					   function validateForm()
					   {
						var str = document.getElementById('txtstr').value;
						var siz = document.getElementById('txtsize').value;
						if (str=='' || siz=='') {
						 alert("Enter values properly!");
						 return false;
						}
						else
						{
						 return true;
						 window.reload;
						}  
					  }
					  </script>
					   
					  <div align='left' class='frms noborders' id='content'>

					   <input id="qty" type="hidden" value="<?php echo $qty ?>">
					   <input id="name" type="hidden" value="<?php echo $name ?>">
					   <b>Enter String : </b><input type='text' value="<?php echo $barcode; ?>" name='string' maxlength='25' id='txtstr' autocomplete='off'><br>
					   <b>Select Orientation : </b>
					   <select name='orientation' id='orientation'>
						<option>Horizontal</option>
						<option>Vertical</option>
					   </select>
					   <b>Select CodeType: </b>
					   <select name='codetype' id='codetype'>
						<option>Code128</option>
						<option>Code39</option>
						<option>Code25</option>
						<option>Codabar</option>
					   </select><br>
					   <b>Enter Size : </b><input type='text' name='size' maxlength='2' onkeyup=checnum(this) id='txtsize' autocomplete='off'>
					   <div align='center'>
						<div class='load' style='display:none;'><img src='barcode-generator/loading.gif'></div>
						 <input type='submit' value='Get Barcode' onclick='get_barcode()' id='btn'>
					   </div><br>
					  </div>
					  <div id="print"> 
					    <?php 
					      $top=500;
					      $left=50;
                          for($i=1; $i<=$qty; $i++){
					    ?>
					      <div style="position: absolute; top: <?php echo $top;echo "px"; ?>; left: <?php echo $left;echo "px"; ?>; height: 100px; width: 120px;" align='center' id='<?php echo "maindiv";echo $i; ?>'>
					       </div>
					     <?php
					      $left+=120;
					      if($i%8==0){
                           $top+=90;
                           $left=50;
					       }
					      }
					    ?>
					  </div>
			<div  align='center' style="font-size: 10px;color: #dadada;" id="dumdiv"></div>
	</body>
</html>

