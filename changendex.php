<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="/w3-theme-black.css">
		
		
	</head>
	<body>
		<div class="register">
			<h1>email ganti password</h1>
			<form action="changepass.php" method="post" autocomplete="off">

     				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="email" name="email" placeholder="Email" id="email" required>
				<input type="submit" value="Next">
			</form>
			<center>
				<div>
					<p><a class="w3-text-purple w3-btn w3-hover-purple" href="index.php">batal ?</a>
				      	<button class="w3-btn w3-black w3-text-purple w3-hover-purple" onclick="document.getElementById('id01').style.display='block'">rule !</button></p>
    				</div>
			</center>
		</div>
			<!-- Modal -->
			<div id="id01" class="w3-modal">
    			   <div class="w3-modal-content w3-card-4 w3-animate-top">
      			      <header class="w3-container w3-theme-d5"> 
        		        <span onclick="document.getElementById('id01').style.display='none'"
        			class="w3-button w3-display-topright">×</span>
        			<h4>what email should i type !?</h4>
      			      </header>
      			      <div class="w3-padding">
        			 <p>you should type email that match or same as you register</p>
        			 <p>there is a small probabilities to forget your email id :D</p>
      			      </div>
      			      <footer class="w3-container w3-theme-d5">
        			<p>Have a nice day!</p>
      			      </footer>
    			   </div>
			</div>
			
	</body>
</html>
