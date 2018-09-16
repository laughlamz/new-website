<?php
  require "dbCon.php";

	$qrD11 = "
		SELECT device1 FROM device_tableT
  	";
  	$qrD12 = mysqli_query($conn, $qrD11);
  	$qrD13 = mysqli_fetch_array($qrD12);
  	echo $qrD13['device1'];
?>