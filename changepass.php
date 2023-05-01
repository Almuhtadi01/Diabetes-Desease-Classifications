<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'laravel';
$DATABASE_PASS = 'lessweak!_@123';
$DATABASE_NAME = 'laravel';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	die ('Email is not valid!.<a href=index.php>kembali</a>');
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['email']) ) {
	// Could not get the data that should have been sent.
	die ('Please fill email field!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT email FROM accounts WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$uniqid = uniqid();
		$reset_password_link = 'http://localhost/ES2/view/formchange.php?email=' . $_POST['email'] . '&code=' . $uniqid;
		$message = '<p>Please click the following link to activate your account: <a href="' . $reset_password_link . '">' . $reset_password_link . '</a></p>';
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['email'] = $_POST['email'];
		include("view/linkchange.php");
	} else {
	     echo 'Incorrect email!.<a href="index.php">kembali</a>';
	}
} else {
    echo 'Could not prepare statement!.<a href="index.php">kembali</a>';
}	
?>
