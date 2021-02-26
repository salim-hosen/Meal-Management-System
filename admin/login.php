<?php
	include "classes/AdminLogin.php";
	include "lib/Session.php";
	Session::init();
	$adLog = new AdminLogin();
	$chkLogin = Session::get("logStatus");
	if($chkLogin == true){
		echo "<script>window.location='index.php'</script>";
	}
?>
<!doctype HTML>

<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="../css/style.css" type="text/css" />
		<link rel="stylesheet" href="css/adcss.css" type="text/css" />
		<link rel="stylesheet" href="fa/css/font-awesome.min.css" type="text/css" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
		<style>
			.errMsg {
				color: #f00c;
				font-size: 1.1em;
				text-align: center;
				font-weight: bold;
				display: block;
				margin-bottom: 10px;
			}
		</style>
	</head>
	
	<body>
		<div>
			<div class="container_admin">
				<section>
					<article class="log">
						<div class="admin_login">
						<?php
							if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
								$chkLogin = $adLog->logAdmin($_POST);
								if($chkLogin)echo $chkLogin;
							}
						?>
						<div class="loghead">
							<h2>Admin Login</h2>
						</div>
							<form action="" method="post">								
								<div class="row">
									<div class="col-1">Username</div>
									<div class="col-2"><input type="text" name="username"/></div>
								</div>
								<div class="row">
									<div class="col-1">Password</div>
									<div class="col-2"><input type="password" name="password"/></div>
								</div>
								<div class="row">
									<div class="col-1"></div>
									<div class="col-2"><input type="submit" value="Login" name="submit"/></div>
								</div>
							</form>
						</div>
					</article>
				</section>
			</div>
	</body>
</html>