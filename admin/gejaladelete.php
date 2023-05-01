<?php
//include("showuser.php");
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedmin'])) {
	header('Location: ../index.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'laravel';
$DATABASE_PASS = 'lessweak!_@123';
$DATABASE_NAME = 'laravel';
// Try and connect using the info above.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (!$conn) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$dlid=$_GET['ID'];
$dsql = "DELETE FROM tb_konsul WHERE id_pasien='$dlid'";

if (mysqli_query($conn, $dsql) === TRUE) { 
	header('location: usergejala.php');
} else {
	echo "Error deleting record :".mysqli_error($conn); echo '<br>';
	header('location: homeadmin.php');
}
?>
