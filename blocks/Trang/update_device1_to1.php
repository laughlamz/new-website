<?php
	require "dbCon.php";
	
  $qrUpD1 = "
    UPDATE device_tableT SET device1 = (1)
  ";
  $qrUpD2 = mysqli_query($conn, $qrUpD1);
?>