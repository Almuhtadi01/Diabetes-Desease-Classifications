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
		<title>Profile Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../css/w3.css">
		<link rel="stylesheet" href="/w3-theme-black.css">
		<link rel="stylesheet" href="/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="w3-container w3-animate-opacity">
		<nav class="navtop">
			<div>
				<h1>Admin's</h1>
				<a href="homeadmin.php"><i class="fas fa-home"></i>Home</a>
				<a href="profadmin.php"><i class="fas fa-user"></i>Profil</a>
				<a href="showuser.php"><i class="fas fa-pen"></i>Manage</a>
				<a href="showgejala.php"><i class="fas fa-sign-out-alt"></i>Gejala</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content w3-text-orange">
			<center>
			<br>
			<h1>Kelola Pasien</h1>
			<br>	
			</center>
		</div>
		
			<?php
					$sql = "SELECT * FROM accounts WHERE activation_code='activated'";
					$result = mysqli_query($conn, $sql);
					
					if (mysqli_num_rows($result) > 0) {
    			
    					while($row = mysqli_fetch_array($result)) {
							
							$nama=$row['username'];
							$id=$row['id'];
							echo '<div class="content">';
							echo '<div>';
							echo '<table>';
								echo '<tr>';
									echo '<td>Nama :</td>';
									echo '<td>'.$nama.'</td>';
								echo '</tr>';
							echo '</table>';
							echo '<table>';
								echo '<tr>';
								
									echo '<td>Gejala : </td>';
							
							$nsql = "SELECT id_gejala FROM tb_konsul WHERE id_pasien='$id'";
							$results = mysqli_query($conn, $nsql);
							
							if (mysqli_num_rows($results) > 0) {
								$row1 = mysqli_fetch_array($results);
								$ctg = explode(",",$row1['id_gejala']);
								$lg = count($ctg);
								for($g=0;$g<$lg;$g++) {
									echo '<td>'.$ctg[$g].'</td>';
									echo '<td><input type="checkbox" checked="checked"></td>';
								}
								echo '</tr>';
								echo '</table>';
								
								echo '<table>';
								echo '<tr>';
									echo '<td>Penyakit :</td>';
									
									$qsql = "SELECT penyakit FROM tb_konsul WHERE id_pasien='$id'";
									$qresult = mysqli_query($conn, $qsql);									
									$row_p = mysqli_fetch_array($qresult);
	
									echo '<td>'.$row_p['penyakit'].'<td>';
									
								echo '</table>';
								
									echo '<div align="right"><a href=gejaladelete.php?ID='.$id.' class="w3-text-red w3-btn w3-hover-red w3-medium">Hapus Gejala</a></div>';
									
								} else {
									echo '<td>tidak ada input gejala</td>';
									echo '</table>';
								}
								echo '</tr>';
						echo '</div>';
						echo '</div>';
					    }
					}
			?>
	</body>
</html>
