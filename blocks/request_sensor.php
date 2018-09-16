<?php
require "dbCon.php";
header('Content-Type: application/json');

$qrsen ="
			SELECT * FROM sensor_table ORDER BY idSensor DESC
		";
$qrsen1 = mysqli_query($conn, $qrsen);
$qrsen2 = mysqli_fetch_array($qrsen1);

$qrsen3 ="
			SELECT MIN(sensor1), MAX(sensor1), MIN(sensor2), MAX(sensor2) FROM sensor_table
		";
$qrsen4 = mysqli_query($conn, $qrsen3);
$qrsen5 = mysqli_fetch_array($qrsen4);

$data_value = array();
$data_value[0] = $qrsen2;
$data_value[1] = $qrsen5;

print json_encode($data_value);
?>