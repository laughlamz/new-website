<?php
	require "dbCon.php";

	$scan_staD1 = $_GET['statusD1'];	//Normal - Just when relative with MySQL & link
	$scan_staD2 = $_GET['statusD2'];
	$scan_staD3 = $_GET['statusD3'];

	$qrStaD1 = "
		UPDATE device_tableT SET staDevice1 = '$scan_staD1', staDevice2 = '$scan_staD2', staDevice3 = '$scan_staD3'
	";
	mysqli_query($conn, $qrStaD1);
?>
