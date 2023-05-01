<?php
// We need to use sessions, so you should always start sessions using the below code.
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location:../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<title>validate</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3.css">
<body class="w3-container w3-auto">


<div class="w3-panel w3-text-black w3-yellow">
  <h3>Link to change password</h3>
  <p><?php echo $message;?></p>
  <p>Please check your email or databases to change your password account!</p>
</div>
</body>
</html>
