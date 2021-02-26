<?php
	include "admin/config/config.php";
	include "admin/lib/Database.php";
	include "admin/lib/Session.php";
	include "admin/helpers/Format.php";
	include "admin/classes/Register.php";
	include "admin/classes/Deposit.php";
	include "admin/classes/Bazzar.php";
	include "admin/classes/Meal.php";
	include "admin/classes/Member.php";
	$reg = new Register();
	Session::init();
	
	$dep = new Deposit();
	$fm = new Format();
	$baz = new Bazzar();
	$meal = new Meal();
	$mem = new Member();
?>

<!doctype HTML>

<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<link rel="stylesheet" href="admin/fa/css/font-awesome.min.css" type="text/css" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	</head>
	
	<body>
		<div id="wrapper">
			<div class="container">
			<?php
				if(isset($_GET['logout']) && $_GET['logout']=="lout"){
					Session::destroy();
				}
			?>
				<header>
					<div class="heading">
						<a href="index.php"><h2>Check<span>Your</span>Meal</h2></a>
					</div>
					<div class="login">
						<?php
							if(Session::get("usrLogin")==false){
						?>
						<a href="register.php">Register</a>
						<a href="login.php">Login</a>
						<?php
							}else{
						?>
						<a href="?logout=lout">Logout</a>
						<a href="profile.php?pId=<?php echo Session::get("userId");?>">Profile</a>
						<?php
							}
						?>
					</div>
				</header>