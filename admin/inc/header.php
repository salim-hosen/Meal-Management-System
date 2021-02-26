<?php
	include "config/config.php";
	include "lib/Database.php";
	include "lib/Session.php";
	Session::init();
	$chkLogin = Session::get("logStatus");
	if($chkLogin == false){
		Session::destroy();
	}
	
	include "classes/Deposit.php";
	include "classes/Bazzar.php";
	include "classes/Member.php";
	include "classes/Meal.php";
	include "helpers/Format.php";
	$dep = new Deposit();
	$baz = new Bazzar();
	$fm = new Format();
	$mem = new Member();
	$meal = new Meal();
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
				border: 1px solid blue;
				width: 50%;
				margin: 10px auto;
				padding: 1%;
			}
			.sucMsg {
				color: green;
				text-align: center;
				font-size: 1.1em;
				font-weight: bold;
				display: block;
				border: 1px solid blue;
				width: 50%;
				margin: 10px auto;
				padding: 1%;
			}
			.listImg img {
	width: 100%;
	max-width: 350px;
	margin: 30px auto;
	display: block;
	background: #333;
	padding: 1%;
	height: 450px;
}
.baz_date select {
	width: 60%;
}

.baz_date input[type="text"] {
	width: 60%;
}

.selectDate tr td:first-child {
	width: 20%;
	color: #FF1493;
}
.selectDate tr td:last-child {
	width: 20%;
}
.selectDate tr {
	background: none !important;
	width: 50%;
	margin: 0 auto;
	display: block;
}
		</style>
	</head>
	<?php
		if(isset($_GET['logout']) && $_GET['logout']=='lout'){
			Session::destroy();
		}
	?>
	<body>
		<div id="wrapper">
			<div class="container">
				<header>
					<div class="heading">
						<a href="index.php"><h2><span>Admin</span> Panel</h2></a>
					</div>
					<div class="login">
						<a href="?logout=lout">Logout</a>
					</div>
				</header>
				