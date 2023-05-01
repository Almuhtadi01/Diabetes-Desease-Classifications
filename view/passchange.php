<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location:../index.php');
	exit();
}
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'laravel';
$DATABASE_PASS = 'lessweak!_@123';
$DATABASE_NAME = 'laravel';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data was submitted, isset() function will check if the data exists.
if (isset($_POST['password0']) != isset($_POST['password1'])) {
	die ('Please retype the form changes!.<a href=../index.php>kembali</a>');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['password0']) || empty($_POST['password1'])) {
	die ('Please complete the form changes!.<a href=../index.php>kembali</a>');
}
if (strlen($_POST['password0']) > 20 || strlen($_POST['password0']) < 8) {
	die ('Password must be between 8 and 20 characters long!.<a href=../index.php>kembali</a>');
}		
if ($stmt = $con->prepare('UPDATE accounts SET password = ? WHERE email = ?')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
	$stmt->bind_param('ss', $password, $_SESSION['email']);
	$stmt->execute();
	
	echo 'password succesfully changed, you can now login with new password. <a href=../index.php>kembali</a>';
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>
