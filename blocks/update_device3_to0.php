<?php
	require "dbCon.php";
?>

<?php
  $qrUpD1 = "
    UPDATE device_table SET device3 = (0)
  ";
  $qrUpD2 = mysqli_query($conn, $qrUpD1);
?>