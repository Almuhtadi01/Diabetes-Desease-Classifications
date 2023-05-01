<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>  
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="/font-awesome.min.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Sistem Pakar</h1>
				<a href="profile.php"><i class="fas fa-user"></i>Profile</a>
				<a href="konsultasi.php"><i class="fas fa-heart"></i>Konsultasi</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		
		<div class="content w3-text-black">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>
