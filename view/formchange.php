<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location:../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Change Pass</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../css/w3.css">
		<link rel="stylesheet" href="/w3-theme-black.css">
		
		
	</head>
	<body>
		<div class="register">
			<h1>Change password</h1>
			<form action="passchange.php" method="post" autocomplete="off">
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password0" placeholder="new password" id="password" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password1" placeholder="confirm password" id="password" required>

				<input type="submit" value="confirm">
			</form>
			<center>
				<div>
					<p><a class="w3-text-purple w3-btn w3-hover-purple" href="../index.php">batal ?</a>
				      	<button class="w3-btn w3-black w3-text-purple w3-hover-purple" onclick="document.getElementById('id01').style.display='block'">Rule !</button></p>
    				</div>
			</center>
		</div>
			<!-- Modal -->
			<div id="id01" class="w3-modal">
    			   <div class="w3-modal-content w3-card-4 w3-animate-top">
      			      <header class="w3-container w3-theme-d5"> 
        		        <span onclick="document.getElementById('id01').style.display='none'"
        			class="w3-button w3-display-topright">×</span>
        			<h4>Change password</h4>
      			      </header>
      			      <div class="w3-padding">
        			 <p>Remember to use strong and effective password!</p>
        			 <p>and dont forget your password again dear :D</p>
      			      </div>
      			      <footer class="w3-container w3-theme-d5">
        			<p>Have a nice day!</p>
      			      </footer>
    			   </div>
			</div>
			
	</body>
</html>
