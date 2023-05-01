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
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	die ('Please fill both the username and password field!');
}
$sql = "SELECT * FROM accounts";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
   $row = mysqli_fetch_array($result);
   if(isset($_POST['username']) != $row['username']) {
	echo 'Incorrect username and password!.<a href="index.php">kembali</a>';
   }
}
$id=$row['id']; 
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if ($_POST['username'] == "admin" or $_POST['username'] == "ADMIN") {
		if (password_verify($_POST['password'], $password)) {
		session_regenerate_id();
		$_SESSION['loggedmin'] = TRUE;
		$_SESSION['adname'] = $_POST['username'];
		$_SESSION['idm'] = $id;
		header('Location: admin/homeadmin.php');
		} else {
		    echo 'Incorrect password.<a href="index.php">kembali</a>';
		}

	} else {
		if (password_verify($_POST['password'], $password)) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		header('Location: home.php');
		} else {
		    echo 'Incorrect password.<a href="index.php">kembali</a>';
		}
	}
} else {
   echo 'Incorrect username and password!.<a href="index.php">kembali</a>';
}
$stmt->close();
}

?>
