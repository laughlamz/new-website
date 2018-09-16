<?php
  require "dbCon.php";

	$qrD11 = "
		SELECT device3 FROM device_table
  	";
  	$qrD12 = mysqli_query($conn, $qrD11);
  	$qrD13 = mysqli_fetch_array($qrD12);
  	echo $qrD13['device3'];
?>