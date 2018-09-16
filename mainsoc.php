<!DOCTYPE html>
<html>
<head>
	<title>Chat web</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="https://coder-z.herokuapp.com/socket.io/socket.io.js"></script>
	<script type="text/javascript" src="process.js"></script>
	<link rel="stylesheet" type="text/css" href="layout.css"/>
</head>
<body>
	<div id="wrapper">
		<div id="information">
			<input id="fullname" type="text" placeholder="Your name" />
			<input id="mail" type="text" placeholder="Email" />
			<input id="submit" type="button" value="Login"/>
		</div>
		<div id="infoLogout">
			<input id="logout" type="button" value="Logout"/>
		</div>
		<div id="online">
			<div style="font-weight: bold;">Online members</div>
			<div id="members">
				
			</div>
		</div>
		<div id="chatplace">
			<div style="font-weight: bold">Chat place</div>
			<div id="chatDisplay">
				
			</div>
			<div id="isTyping"></div>
			<input id="chatData" type="text"/>
			<input id="chatSubmit" type="button" value="Submit"/>
		</div>
	</div>
</body>
</html>


<!-- 
	- include lib thk socketio truoc khi dung trong process
	- keyup
	- check name login (check = arr.find)
	- splice item from obj in arr (arr = arr.filter)
-->