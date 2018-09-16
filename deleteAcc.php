<?php
	ob_start();
	require "lib/dbCon.php";
	$idDel = $_GET['idDel'];
	if($idDel != 1){
		$qrdel = "
			DELETE FROM users WHERE idUser='$idDel'
		";

		$qrdel1 = mysqli_query($conn, $qrdel);
	}
	header ("Location: main.php?page=5")
?>