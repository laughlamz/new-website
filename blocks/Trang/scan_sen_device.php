<?php
	require "dbCon.php";
	if( isset($_GET['sensor1']) && isset($_GET['sensor2']) && isset($_GET['sensor3']) )
	{
		$scan_sen1 = $_GET['sensor1'];
		$scan_sen2 = $_GET['sensor2'];
		$scan_sen3 = $_GET['sensor3'];

		$qrSen1 = "
			INSERT INTO sensor_tableT (sensor1, sensor2, sensor3) VALUES ('$scan_sen1','$scan_sen2','$scan_sen3')
		";
		mysqli_query($conn, $qrSen1);
	}
?>