<?php
	include "connect.php";
	session_start();
	header('Cache-control: private');
	if(isset($_SESSION['user']) && $_SESSION['passwd']){
		header("location:main/index.php");
	}
?>
<html>
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>-= Gudang Beras Bang Firdam =-</title>
        <meta name="description" content="Gudang Beras Bang Firdam" />
        <meta name="keywords" content="BangDam, Firdam" />
        <meta name="author" content="Firdam" />
        <link rel="shortcut icon" href="images/icon.png"> 
        <link rel="stylesheet" type="text/css" href="css/login/style.css" />
		<link rel="stylesheet" type="text/css" href="css/login/style2.css" />
		<link rel="stylesheet" type="text/css" href="css/login/font-awesome.css" />
		<link rel="stylesheet" href="css/login/jquery-ui.css" />

		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="js/login/login.js"></script>
		<script type="text/javascript" src="js/jquery.blockUI.js"></script>
		<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
		<script type="text/javascript" src="js/modernizr.custom.63321.js"></script>
    </head>
    <body>
        <div class="container">			
			<section class="main">
			<center><img class="logo" src="images/login/logo.png" /></center>
				<form action="logproses.php" id="logsiform" name="logsiform" method="POST" class="log-form">
					<p class="field">
						<input id="uname" name="uname" required="required" type="text" maxlength="30" placeholder="Masukkan Username">
						<i class="icon-user icon-large"></i>
					</p>
						<p class="field">
						<input id="passwd" name="passwd" required="required" type="password" maxlength="32" placeholder="Masukkan Password">
						<i class="icon-lock icon-large"></i>
					</p>
					<p class="submit">
						<button type="submit" value="Login" id="btnLogin"><i class="icon-arrow-right icon-large"></i></button>
					</p>
				</form>
			</section>
        </div>
		<div class="kopiright">	
			<p align="right">&copy; 2013 Gudang Beras Bang Firdam - @Syndrom2211<br/>
			Best viewed in Mozilla Firefox 1024 x 768 Resolution.</p>
		</div>
    </body>
</html>
