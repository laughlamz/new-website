<?php
require "dbCon.php";
header('Content-Type: application/json');

$qrsen ="
			SELECT * FROM sensor_tableT ORDER BY idSensor DESC
		";
$qrsen1 = mysqli_query($conn, $qrsen);
$qrsen2 = mysqli_fetch_array($qrsen1);

$qrsen3 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE() AND sensor1 = (SELECT MIN(sensor1) FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE())");
$qrsen4 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE() AND sensor1 = (SELECT MAX(sensor1) FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE())");

$qrsen5 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE() AND sensor2 = (SELECT MIN(sensor2) FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE())");
$qrsen6 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE() AND sensor2 = (SELECT MAX(sensor2) FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE())");

$qrsen7 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE() AND sensor3 = (SELECT MIN(sensor3) FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE())");
$qrsen8 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE() AND sensor3 = (SELECT MAX(sensor3) FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE())");

$qrsen9 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE() AND sensor4 = (SELECT MIN(sensor4) FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE())");
$qrsen10 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE() AND sensor4 = (SELECT MAX(sensor4) FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE())");

$qrsen11 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE() AND sensor5 = (SELECT MIN(sensor5) FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE())");
$qrsen12 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE() AND sensor5 = (SELECT MAX(sensor5) FROM sensor_tableT WHERE DATE(timeSensor) = CURDATE())");

$qrMinSen1 = mysqli_fetch_array($qrsen3);
$qrMaxSen1 = mysqli_fetch_array($qrsen4);

$qrMinSen2 = mysqli_fetch_array($qrsen5);
$qrMaxSen2 = mysqli_fetch_array($qrsen6);

$qrMinSen3 = mysqli_fetch_array($qrsen7);
$qrMaxSen3 = mysqli_fetch_array($qrsen8);

$qrMinSen4 = mysqli_fetch_array($qrsen9);
$qrMaxSen4 = mysqli_fetch_array($qrsen10);

$qrMinSen5 = mysqli_fetch_array($qrsen11);
$qrMaxSen5 = mysqli_fetch_array($qrsen12);

$data_value = array();
$data_value[0] = $qrsen2;

$data_value[1] = $qrMinSen1;
$data_value[2] = $qrMaxSen1;

$data_value[3] = $qrMinSen2;
$data_value[4] = $qrMaxSen2;

$data_value[5] = $qrMinSen3;
$data_value[6] = $qrMaxSen3;

$data_value[7] = $qrMinSen4;
$data_value[8] = $qrMaxSen4;

$data_value[9] = $qrMinSen5;
$data_value[10] = $qrMaxSen5;

print json_encode($data_value);
?>