<?php
	require "lib/dbCon.php";
	include('header/header.php');
	session_start();
	ob_start();
?>

<?php 
	if( isset($_SESSION["User"]) ){
		header('Location: ../main.php');
	}

	if( isset($_POST["btnLogin"])){
		$usr = $_POST["usr"];
		$pwd = $_POST["pwd"];
		$qr = mysqli_query($conn, "SELECT * FROM users WHERE User = '$usr' AND Password = '$pwd'");

		if( mysqli_num_rows($qr) == 1 ){
			$row = mysqli_fetch_array($qr);
			$_SESSION["User"] = $row['User'];
			header("Location: /main.php");
			exit();
		}
		else{
			$msg = "Please check again username or password";
		}
	}

	
							
?>

<!DOCTYPE>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_login.css"/>
</head>
<body>
	<img class="bgLogin" src="img/website.jpg">
	<div id="wrapperIndex">
		<div id="link">
			<a id="about" class="link linkCss" href="/">About</a>
			<a id="blog" class="link linkCss" href="blog">Blog</a>
			<a id="contact" class="link linkCss" href="contact">Contact</a>
			<a id="login1" class="link linkCss" style="border-bottom: 2px solid white;" href="login">Login</a>
		</div>

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
				
				<button type="submit" name="btnLogin">Login</button>
				<p class="rep"><?php if(isset($msg)) echo $msg; ?></p>
				<p>Don't have account? <a id="signup" href="signup.php">Sign Up</a></p>
			</form>
		</div>
	</div>
</body>
</html>


