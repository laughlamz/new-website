<?php
	require "lib/dbCon.php";
	include('header/header.php');
	ob_start();

	if(isset($_POST["btnLogin"])){
		$usr = $_POST["usr"];
		$pwd = $_POST["pwd"];
		$repwd = $_POST["repwd"];
		$email = $_POST["email"];
		if($pwd == $repwd) {
			$qr = mysqli_query($conn, "SELECT * FROM users WHERE User = '$usr'");
			if( mysqli_num_rows($qr) > 0 ) 
				$msg = "Username is already exists";
			else {
				$qr1 = mysqli_query($conn, "INSERT INTO users(User,Password,Email,idReport,idDevice,idMessage,idAdmin) VALUES('$usr','$pwd','$email',0,0,0,0)");
				if($qr1)
					$msg = "Register sucessful";
				else
					$msg = "Register failed";
			}
		}
		else
			$msg = "Please check your password again";
	}
?>

<!DOCTYPE>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/login.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_signup.css"/>
</head>
<body>
	<img class="bgLogin" src="img/website.jpg">
	<div id="loginF">
			<form action="#" method="POST">
				<img src="img/logo.jpg" style="width: 64px; height: 64px;">
				<h2>Welcome</h2>
				<div class="input-group">
					<input type="text" name="usr" required>
					<label for="user">Username</label>
				</div>
				<div class="input-group">
					<input type="password" name="pwd" required>
					<label>Password</label>
				</div>
				<div class="input-group">
					<input type="password" name="repwd" required>
					<label>Re-Password</label>
				</div>
				<div class="input-group">
					<input type="text" name="email" required>
					<label>Your email</label>
				</div>
				
				<button type="submit" name="btnLogin">Sign up</button>
				<p class="rep"><?php if(isset($msg)) echo $msg; ?></p>
				<p>Already have an account? | <a id="signup" href="login">Sign in</a></p>
			</form>
		</div>
</body>
</html>