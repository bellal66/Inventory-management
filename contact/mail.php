<?php 
  
  $mess= "";
if (isset($_POST['submit'])) {
    $email = $_POST['mail']; 
    $name= $_POST['name'];
    
    $subject = 'Form Submission';
    $message = $_POST['message'];
    $to = "bsmrstubellal31853211@gmail.com";
    $headers = "From:" . $email;
    
    $messagee="Name: ".$name."\n"."Message: ".$message ;

    if (mail($to, $subject, $messagee, $headers)) {

        $mess="Mail succesfully send.";
    }else {
     
      $mess="Mail send fail.";
    } 
  }
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Sudarshan">
    <link rel="icon" type="image/png" href="images/logo.png" />

    <title>Contact Us</title>

    <!-- Theme CSS -->
    <link href="base_style.css" rel="stylesheet">
    <link href="form.css" rel="stylesheet">
    <link href="snackbar.css" rel="stylesheet">
    
    <script type="text/javascript" src="csi.min.js"></script>

    
</head>

<body>
    <div id="mainPart">
        <div id="page_heading">
            <p><a href="http://localhost/raihanvai">Home</a></p>
        </div>
         <!-- Main Content -->
        <div class="container">

            <div class="sidenav">
                <div class="panel-header-silver">
                    <h2>Information</h2>
                </div>
                <div style="color:#000;padding:20px;font-size:14px;">
                    <div><b>Office Address</b><br> suborna electronics, Gopalganj, Dhaka, Bangladesh
                    </div>
                    <hr>
                    <div><b>Phone</b><br> 01700000000
                    </div>
                    <hr>
                    <div><b>Email</b><br>
                        <a href="#">raihanvai@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="center_content">
                <div class="content_panel">
                    <div class="panel-header-blue">
                        <h2>Write to us</h2>
                    </div>
                    <div style="padding:20px;overflow:hidden;display:block;">
                        <form class="form-main" action="mail.php">
                            <input type="hidden" name="what" value="feedback" />
                            <div class="form-item">
                                <div class="form-left">
                                    <label><big>Full Name:</big></label>
                                </div>
                                <div class="form-right">
                                    <input class="txtbox" type="text" name="name" id="fd_name" size="20" required>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-left">
                                    <label><big>Email Address:</big></label>
                                </div>
                                <div class="form-right">
                                    <input class="txtbox" type="email" name="mail" id="fd_email" size="20" required>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-left">
                                    <label><big>Message:</big></label>
                                </div>
                                <div class="form-right">
                                    <textarea class="txtbox" rows="4" cols="50" name="message"></textarea>
                                </div>
                            </div>
                            <div id="buttons">
                                <input class="greenbtn" type="submit" value="Submit" name="submit" id="add" />
                                <input class="orangebtn" type="reset" value="Clear" id="clear" />
                                <h2><?php echo $mess; ?></h2>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="mapholder" class="content_panel">
                    <div class="panel-header-blue">
                        <h2>Find us here</h2>
                    </div>
                    <div id="myMap" style="height:300px;">
                        <script src='https://www.google.com/maps/@23.0083789,89.8294735,288m/data=!3m1!1e3'></script>

                        <!--<script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=68bfaaf98509fb66da80e271636e4fa100f14b81'></script>-->
                        <script type='text/javascript'>
                            function init_map() {
                                var myOptions = {
                                    zoom: 15,
                                    center: new google.maps.LatLng(22.9661, 89.8171),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                };
                                map = new google.maps.Map(document.getElementById('myMap'), myOptions);
                                marker = new google.maps.Marker({
                                    map: map,
                                    position: new google.maps.LatLng(22.9661, 89.8171)
                                });
                                infowindow = new google.maps.InfoWindow({
                                    content: '<strong>shuborna Electronics</strong><br>Gopalganj<br>'
                                });
                                google.maps.event.addListener(marker, 'click', function() {
                                    infowindow.open(map, marker);
                                });
                                infowindow.open(map, marker);
                            }
                            google.maps.event.addDomListener(window, 'load', init_map);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>