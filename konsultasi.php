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
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="css/w3.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Sistem Pakar</h1>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="profile.php"><i class="fas fa-user"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Konsultasi Penyakit Diabetes</h2>
			<p>Hi, <?=$_SESSION['name']?>!</br>
			Untuk Konsultasi silakan centang gejala dibawah :</p>
		</div>
			<div class="content">
				<h2>Apakah anda mengalami :</h2>
				<?php
		
					$sql = "SELECT * FROM tb_gejala";
					$result = mysqli_query($conn, $sql);
					echo '<div>';
					echo '<table>';
					echo '<tr>';
					echo '<td>Kode</td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td><b>Gejala</b></td>';
					echo '</tr>';
					echo '</table>';
					
					if ($jum = mysqli_num_rows($result)) {
						
    					    while($row = mysqli_fetch_array($result)) {
								
								$IDgejala=$row["Id_gejala"]; 
								$gejala=$row["gejala"];
								
								echo '<form action="check_konsul.php" method="post" autocomplete="off">';
								
								echo '<table>';
									echo '<tr>';
										echo '<td>'.$IDgejala.'</td>';
										echo '<td><input name="idgejala[]" class="w3-check" id="'.$IDgejala.'" value="'.$IDgejala.'" type="checkbox"></td>';
										echo '<td valign="top">'.$gejala.' ?</td>';
										echo '<input type="hidden" id="jum" name="jum" value='.$jum.'>';
									echo '</tr>';
								echo '</table>';
								}
								echo '<div align="right">';
									echo '<input type="submit" class="w3-btn w3-black" value="Simpan">';
								echo '</div>';
								echo '</form>';
					}
					mysqli_close($conn);
				?>
			</div>
	</body>
</html>
