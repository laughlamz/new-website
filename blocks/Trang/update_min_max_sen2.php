<?php
require "dbCon.php";

    $qrsen3 ="
                SELECT MIN(sensor2), MAX(sensor2) FROM sensor_tableT
            ";
    $qrsen4 = mysqli_query($conn, $qrsen3);
    $qrsen5 = mysqli_fetch_array($qrsen4);
?>

<!DOCTYPE>
<html>
<head>
	<title>Laugh Lâm blogspot</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
</head>
<body>
	<div class="infoSen12"><div class="infoSen13"><?php echo number_format($qrsen5[1],1); ?>%</div>Maximum</div>
	<div class="infoSen12"><div class="infoSen13"><?php echo number_format($qrsen5[0],1); ?>%</div>Minimum</div>
</body>
</html>