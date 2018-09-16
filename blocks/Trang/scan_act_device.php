<?php
  require "dbCon.php";
  
	$qrD11 = "
		SELECT * FROM device_tableT
  	";
  	$qrD12 = mysqli_query($conn, $qrD11);
  	$qrD13 = mysqli_fetch_array($qrD12);
//   	echo $qrD13['device1'];
//      echo $qrD13['device2'];
//      echo $qrD13['device3'];
  // 	$qrD14 = "
		// SELECT * FROM message_table
  // 	";
  // 	$qrD15 = mysqli_query($conn, $qrD14);
  // 	$qrD16 = mysqli_fetch_array($qrD15);
// 	    echo $qrD16['message'];

  	$qrDD = $qrD13['device1'].$qrD13['device2'].$qrD13['device3'];
    echo $qrDD;
?>