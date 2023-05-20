<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vehicle-Repair-and-Maintenance-Management-System</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/datepicker3.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<center><img src="assets/image/login-logo.png"></center>
				<div class="panel-body">
					<form action="admin/includes/login.inc.php" method="POST" >
						<fieldset>
							<div class="form-group">
								<input class="form-control" name="emailorphone" placeholder="Email/Phone" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" name="pwd" placeholder="Password"  type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<center><button name="submit" class="btn btn-success btn-lg ">Login</button></center>
							<center><p class="">Doesn't have account? <a href="admin/sign-up.php">Sign up</a></p></center>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div>	
	

<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
