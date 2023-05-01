<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<title>validate</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<body class="w3-container w3-auto">


<div class="w3-panel w3-purple">
  <h3>Yeay!!</h3>
  <p>Successfully stored.</p>
  <p>Please, ask our administration for the result.</p>
  <p>Thank you. <a href="../index.php">done</a></p>
</div>
</body>
</html>
