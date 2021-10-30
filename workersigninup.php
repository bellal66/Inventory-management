<html>
 <head>
 	<title>Sign in-up</title>
    <link href="style.css" rel="stylesheet" id="bootstrap-css">
	<link href="style2.css" rel="stylesheet">
	<link href="sign.css" rel="stylesheet">
    <script src="script.js"></script>
    <script src="script2.js"></script>
  </head>
<!------ Include the above in your HEAD tag ---------->
   <body>
   	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
          </ul>
        </div>
      </div>
    </nav>
   	<div style="padding-top: 30px; padding-bottom: 30px;"></div>
   	<div id="show">
      <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div style="margin-left: 130px;" class="col-xs-6">
								<a href="#" class="active">Login</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="workerlogin.php" method="post" role="form" style="display: block;">
								   <div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="text" name="shopcode" id="username" tabindex="1" class="form-control" placeholder="Shop Code" value="">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Login">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
 </body>
</html>