<?php
	require "dbCon.php";

  $qrUpD1 = "
    UPDATE device_table SET device1 = (0)
  ";
  $qrUpD2 = mysqli_query($conn, $qrUpD1);
?>