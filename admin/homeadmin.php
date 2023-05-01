<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedmin'])) {
	header('Location: ../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>  
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="/w3.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="/font-awesome.min.css">
	</head>
	<body class="w3-container w3-text-black">
		<nav class="navtop">
			<div class="w3-text-red">
				<h1>Admin's</h1>
				<a href="profadmin.php"><i class="fas fa-user"></i>Profile</a>
				<a href="showuser.php"><i class="fas fa-pen"></i>Manage</a>
				<a href="usergejala.php"><i class="fas fa-heart"></i>Pasien</a>
				<a href="showgejala.php"><i class="fas fa-sign-out-alt"></i>Gejala</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Hello, Admin's!</p>
		</div>
	</body>
</html>
