<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedmin'])) {
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
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['idgejala'], $_POST['gejala'])) {
	// Could not get the data that should have been sent.
	die ('Please complete the registration form!.<a href="showgejala.php">kembali</a>');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['idgejala']) || empty($_POST['gejala'])) {
	// One or more values are empty.
	die ('Please complete the registration form.<a href="showgejala.php">kembali</a>');
}
if (preg_match('/[A-Za-z0-9]+/', $_POST['idgejala']) == 0) {
    die ('Username is not valid!.<a href="showgejala.php">kembali</a>');
}
if (strlen($_POST['idgejala']) > 3 || strlen($_POST['idgejala']) < 3) {
	die ('id gejala harus minimal 3 karakter!.<a href="showgejala.php">kembali</a>');
}
// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT Id_gejala FROM tb_gejala WHERE Id_gejala = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['idgejala']);
	$stmt->execute();
	$stmt->store_result();
	
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		$stmt->bind_result($id);
		echo 'id gejala sudah terpakai, silakan coba yang lain.<a href="ndextambahgejala.php">kembali</a>';
	} else {
		// Username doesnt exists, insert new account
		if ($stmt = $con->prepare('INSERT INTO tb_gejala (Id_gejala, gejala) VALUES (?, ?)')) {
		// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
		$stmt->bind_param('ss', $_POST['idgejala'], $_POST['gejala']);
		$stmt->execute();
		echo 'gejala berhasil ditambahkan. <a href="showgejala.php">kembali</a>';
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statements!-1';
}
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!-2';
}
$con->close();
?>
