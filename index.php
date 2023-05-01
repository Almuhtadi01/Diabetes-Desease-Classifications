<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/w3.css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
			<center>
			<p><a class="w3-text-purple w3-btn w3-hover-purple" href="changendex.php">lupa password ?</a>
			<a class="w3-text-green w3-btn w3-hover-green" href="register.html">Register ?</a></p>
			</center>
		</div>
	</body>
</html>
