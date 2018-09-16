<?php
  require "dbCon.php";

	$qrstaD11 = "
		SELECT staDevice2 FROM device_tableT
  	";
  	$qrstaD12 = mysqli_query($conn, $qrstaD11);
  	$qrstaD13 = mysqli_fetch_array($qrstaD12);
  	// echo $qrstaD13['staDevice2'];
  	if($qrstaD13['staDevice2'] == 1)
  		echo '<img src="img/bulbon1.png" />';
   	else if($qrstaD13['staDevice2'] == 0)
  		echo '<img src="img/bulboff1.png" />';
?>