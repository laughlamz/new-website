<?php
	require "dbCon.php";
	$qrM1 = "
		SELECT * FROM message_table 
	";
	$qrM2 = mysqli_query($conn, $qrM1);
	$qrM3 = mysqli_fetch_array($qrM2);
	echo $qrM3['message'];
?>