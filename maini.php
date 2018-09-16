<?php

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'laughlam');
define('DB_PASSWORD', 'yeuem042');
define('DB_NAME', 'laughlam_smarthome');

$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);


$qri = "
		SELECT * FROM sensor_table 
	";
$qri1 = mysqli_query($conn, $qri);
$qri2 = mysqli_fetch_array($qri1);

echo $qri2['idSensor'].$qri2['timeSensor'].$qri2['sensor1'].$qri2['sensor2'].'</br>';

?>