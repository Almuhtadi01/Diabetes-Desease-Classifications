<?php
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
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	die ('Please complete the registration form!.<a href=index.php>kembali</a>');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	die ('Please complete the registration form.<a href=index.php>kembali</a>');
}
// Validate email address.
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	die ('Email is not valid!.<a href=index.php>kembali</a>');
}
// Validate username characters.
if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
    die ('Username is not valid!.<a href=index.php>kembali</a>');
}
// Search for white space.
if (strpos($_POST['username'], " ") !== false) {
	die ('Username is not valid!.<a href=index.php>kembali</a>');
}
// Password length limitation.
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 8) {
	die ('Password must be between 8 and 20 characters long!.<a href=index.php>kembali</a>');
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		$exist = ''.$_POST['username'].'';
		echo include("view/userexist.php");
	} else {
		// Username doesnt exists, insert new account.
		if ($stmt = $con->prepare('INSERT INTO accounts VALUES (?, ?, ?, ?, ?, ?, ?)')) {
		// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$uniqid = uniqid();
			$tanggal = date("Y/m/d");
			
			// Put some chars in user id.
			$id_unique = str_split($uniqid);
			$random_keys=array_rand($id_unique,4);
			
			function arrtostr($v1,$v2) {
				return $v1.'-'.$v2;
			}
			$id_raw = array_reduce($random_keys,'arrtostr');
			$id = $_POST['username'].$id_raw;
			
			$stmt->bind_param('sssssss', $tanggal, $id, $_POST['username'], $password, $_POST['email'], $_POST['option'], $uniqid);
			$stmt->execute();
			$activate_link = 'http://localhost/ES2/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
			$message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
			include("view/activation.php");
		} else {
			// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
			echo 'Could not prepare statement!';
		}
	}	
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!-2';
}
$con->close();
?>
