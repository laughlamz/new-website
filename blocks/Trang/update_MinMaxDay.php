<?php 
require "dbCon.php";

	$inputDate = $_POST["inputDatePHP"];
	$inputDate = strip_tags(mysqli_real_escape_string($conn, $inputDate)); 


$qrsen3 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate' AND sensor1 = (SELECT MIN(sensor1) FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate')");
$qrsen4 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate' AND sensor1 = (SELECT MAX(sensor1) FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate')");

$qrsen5 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate' AND sensor2 = (SELECT MIN(sensor2) FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate')");
$qrsen6 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate' AND sensor2 = (SELECT MAX(sensor2) FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate')");

$qrsen7 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate' AND sensor3 = (SELECT MIN(sensor3) FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate')");
$qrsen8 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate' AND sensor3 = (SELECT MAX(sensor3) FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate')");

$qrsen9 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate' AND sensor4 = (SELECT MIN(sensor4) FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate')");
$qrsen10 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate' AND sensor4 = (SELECT MAX(sensor4) FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate')");

$qrsen11 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate' AND sensor5 = (SELECT MIN(sensor5) FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate')");
$qrsen12 = mysqli_query($conn,"
	SELECT * FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate' AND sensor5 = (SELECT MAX(sensor5) FROM sensor_tableT WHERE DATE(timeSensor) = '$inputDate')");

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

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/Trang/update_MinMaxDay.css"/>
</head>
<body>
	<div id="myMinMax">
        <table id="myMinMaxtb">
            <tr>
                <td></td>
                <td style="font-size:15px;color:silver;">Minimum</td>
                <td style="font-size:15px;color:silver;">Maximum</td>
            </tr>
            <tr>
                <td>Humidity</td>
                <td>
    				<div id="minHum"><?php echo $qrMinSen2["sensor2"]; ?></div>
                	<div class="timeMinMax" id="timeMinHum"><?php echo $qrMinSen2["timeSensor"]; ?></div>
                </td>
                <td>
                	<div id="maxHum"><?php echo $qrMaxSen2["sensor2"]; ?></div>
                	<div class="timeMinMax" id="timeMaxHum"><?php echo $qrMaxSen2["timeSensor"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Pressure</td>
                <td>
                	<div id="minPres"><?php echo $qrMinSen4["sensor4"]; ?></div>
                	<div class="timeMinMax" id="timeMinPres"><?php echo $qrMinSen4["timeSensor"]; ?></div>
                </td>
                <td>
                	<div id="maxPres"><?php echo $qrMaxSen4["sensor4"]; ?></div>
                	<div class="timeMinMax" id="timeMaxPres"><?php echo $qrMaxSen4["timeSensor"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Gas</td>
                <td>
                	<div id="minGas"><?php echo $qrMinSen5["sensor5"]; ?></div>
                	<div class="timeMinMax" id="timeMinGas"><?php echo $qrMinSen5["timeSensor"]; ?></div>
                </td>
                <td>
                	<div id="maxGas"><?php echo $qrMaxSen5["sensor5"]; ?></div>
                	<div class="timeMinMax" id="timeMaxGas"><?php echo $qrMaxSen5["timeSensor"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>TemperatureH</td>
                <td>
                	<div id="minTempH"><?php echo $qrMinSen1["sensor1"]; ?></div>
                	<div class="timeMinMax" id="timeMinTempH"><?php echo $qrMinSen1["timeSensor"]; ?></div>
                </td>
                <td>
                	<div id="maxTempH"><?php echo $qrMaxSen1["sensor1"]; ?></div>
                	<div class="timeMinMax" id="timeMaxTempH"><?php echo $qrMaxSen1["timeSensor"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>TemperatureP</td>
                <td>
                	<div id="minTempP"><?php echo $qrMinSen3["sensor3"]; ?></div>
                	<div class="timeMinMax" id="timeMinTempP"><?php echo $qrMinSen3["timeSensor"]; ?></div>
                </td>
                <td>
                	<div id="maxTempP"><?php echo $qrMaxSen3["sensor3"]; ?></div>
                	<div class="timeMinMax" id="timeMaxTempP"><?php echo $qrMaxSen3["timeSensor"]; ?></div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>