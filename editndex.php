<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'laravel';
$DATABASE_PASS = 'lessweak!_@123';
$DATABASE_NAME = 'laravel';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email, gender, activation_code FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $gender, $actcode);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="/w3-theme-black.css">
		<link rel="stylesheet" href="/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin w3-animate-opacity">
		<nav class="navtop">
			<div>
				<h1>Dashboard</h1>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="konsultasi.php"><i class="fas fa-heart"></i>Konsultasi</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Laman Profil</h2>
			<div>
				<p>Keterangan Akun :</p>
				<form action="editprofile.php" method="post">
				<table>
					<tr>
						<td>Username	:</td>
						<td><input type="text" name="ename" placeholder="<?=$_SESSION['name']?>" id="ename"></td>
					</tr>
					<tr>
						<td>Password	:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Gender	:</td>
						<td><?=$gender?></td>
					</tr>
					<tr>
						<td>Email	:</td>
						<td><input type="text" name="Email" placeholder="<?=$email?>" id="Email"></td>
					</tr>
					<tr>
						<td>Status	:</td>
						<td><?=$actcode?></td>
					</tr>
				</table>
					<div align="right"><input class="w3-btn w3-black w3-medium" type="submit" value="confirm"></div>
				</form>
					
			</div>
		</div>
	</body>
</html>
