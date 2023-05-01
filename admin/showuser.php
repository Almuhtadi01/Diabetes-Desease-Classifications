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
				<a href="usergejala.php"><i class="fas fa-heart"></i>Pasien</a>
				<a href="showgejala.php"><i class="fas fa-sign-out-alt"></i>Gejala</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content w3-text-black">
			<center>
			<br>
			<h1>Kelola Akun</h1>
			<br>	
			</center>
		</div>
				<?php
					$sql = "SELECT * FROM accounts WHERE activation_code='activated'";
					$result = mysqli_query($conn, $sql);
					$nom = 0;
					if (mysqli_num_rows($result) > 0) {
						
    					    while($row = mysqli_fetch_array($result)) {
								$id=$row['id'];
								$nama=$row["username"];
								$password=$row["password"];
								$email=$row["email"];
								$gender=$row["gender"];
								$actcode=$row["activation_code"];
								$date=$row["date"];
								$nom +=1;
							 
							echo '<div class="content w3-text-black">';
							echo '<div>';
							
							echo '<table>';
    					    
							  echo '<tr>';
								echo '<td>Nomor	:</td>';
								echo '<td>'.$nom.'</td>';
							  echo '</tr>';
							  echo '<tr>';
								echo '<td>Username	:</td>';
								echo '<td>'.$nama.'</td>';
							  echo '</tr>';
							  echo '<tr>';
								echo '<td>Password	:</td>';
								echo '<td>'.$password.'</td>';
							  echo '</tr>';
							  echo '<tr>';
								echo '<td>Gender	:</td>';
								echo '<td>'.$gender.'</td>';
							  echo '</tr>';
							  echo '<tr>';
								echo '<td>Email	:</td>';
								echo '<td>'.$email.'</td>';
							  echo '</tr>';
							  echo '<tr>';
								echo '<td>Status	:</td>';
								echo '<td>'.$actcode.'</td>';	
							  echo '</tr>';
							  echo '<tr>';
								echo '<td>Register at	:</td>';
								echo '<td>'.$date.'</td>';	
							  echo '</tr>';
							  
							echo '</table>';
								
								echo '<div align="right"><a href=userdelete.php?ID='.$nama.' class="w3-text-red w3-btn w3-hover-red w3-medium">Hapus Akun</a></div>';
								
							echo '</div>';
							echo '</div>';
							echo '<br>';
					     }
					} else {
    					     echo "0 results";
					}
					mysqli_close($conn);
				?>
	</body>
</html>
