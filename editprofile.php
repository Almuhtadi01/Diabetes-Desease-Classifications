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
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Make sure the submitted edit values are not empty.
if (empty($_POST['ename']) ||  empty($_POST['Email'])) {
	// One or more values are empty.
	die ('Please fill the edit fields!.<a href="editndex.php">kembali</a>');
}
if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
	die ('Email is not valid!.<a href=editndex.php>kembali</a>');
}
if ($stmt = $con->prepare('SELECT email FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc)
	$stmt->bind_param('s', $_POST['ename']);
	$stmt->execute();
	$stmt->store_result();
	
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {		
	// mail exists, update the password
		$stmt->bind_result($email);
		echo 'Username sudah terpakai, silahkan ganti yang lain!.<a href="editndex.php">kembali</a>';
		session_destroy();
	} else {
		if ($stmt = $con->prepare('UPDATE accounts SET username = ?, email = ? WHERE id = ?')) {
		// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
		//$password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
		//$uniqid = uniqid();
		$stmt->bind_param('sss', $_POST['ename'], $_POST['Email'], $_SESSION['id']);
		$stmt->execute();
		echo 'your profile succesfully changed, please login to make changes!. <a href=profile.php>kembali</a>';	
		}
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();

?>
