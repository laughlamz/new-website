<!-- 
Muốn xài php + js thì phải xài chung file
Khác file lỗi không hiểu token <?php ?>
-->

<?php
require "lib/dbCon.php";
ob_start();

	if( isset($_GET['s1']) )
	{
		$s1 = $_GET['s1'];
		echo $s1;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Send server</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="https://coder-z.herokuapp.com/socket.io/socket.io.js"></script>
	<!-- <script type="text/javascript" src="processSendServer.js"></script> -->
</head>
<body>
	Hello
</body>

<script type="text/javascript">
	var socket = io("https://coder-z.herokuapp.com/");

	$(document).ready(function() {
		//setTimeout(function() {
			socket.emit("client-send-sensor", <?php echo $s1; ?>)
		//}, 10);
	});
</script>
</html>

