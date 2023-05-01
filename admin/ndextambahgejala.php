<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedmin'])) {
	header('Location:../index.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'laravel';
$DATABASE_PASS = 'lessweak!_@123';
$DATABASE_NAME = 'laravel';
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Konsultasi</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="../css/w3.css">
	</head>
	<body class="w3-container">
		<nav class="navtop">
			<div>
				<h1>Admin's</h1>
				<a href="homeadmin.php"><i class="fas fa-home"></i>Home</a>
				<a href="profadmin.php"><i class="fas fa-user"></i>Profil</a>
				<a href="showuser.php"><i class="fas fa-pen"></i>Manage</a>
				<a href="usergejala.php"><i class="fas fa-heart"></i>Pasien</a>
				<a href="showgejala.php"><i class="fas fa-sign-out-alt"></i>Gejala</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content w3-text-black">
			<h2>Home Page</h2>
			<p>Hi, <?=$_SESSION['adname']?>!</br>
			Untuk menambah gejala silakan isi form dibawah :</p>
		</div>
		
			<div class="content w3-text-cyan ">
				<h2>Form tambah gejala :</h2>
				<div>
				<form action="tambahgejala.php" method="post">
				<table>
					<tr>
						<td><label for="idgejala">
							<i class="fas fa-code"></i>
						</label><input type="text" name="idgejala" id="IDgejala" placeholder="kode gejala" required></td>
					</tr>
					<tr>
						<td><label for="gejala">
							<i class="fas fa-pen"></i>
						</label><input type="text" name="gejala" id="Gejala" placeholder="gejala" required></td>
					</tr>
				</table>
					<input class="w3-btn w3-black w3-small" type="submit" value="Tambah">
				</form>
				</div>
			</div>
	</body>
</html>
