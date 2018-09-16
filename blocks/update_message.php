<?php
	require "dbCon.php";

	$message = $_POST["messagePHP"];
	$message = strip_tags(mysqli_real_escape_string($conn, $message)); 

	$qrUpM1 = "
    	UPDATE message_table SET message = '$message'
  	";
  	$qrUpM2 = mysqli_query($conn, $qrUpM1);
  	
?>