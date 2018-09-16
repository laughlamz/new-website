<?php
require "dbCon.php";

	$idEdit = $_POST["idEditPHP"];
	$username = $_POST["usernamePHP"];
	$password = $_POST["passwordPHP"];
	$repassword = $_POST["repasswordPHP"];
	$email = $_POST["emailPHP"];

	$eCBReport = $_POST["eCBReportPHP"];
	$eCBDevice = $_POST["eCBDevicePHP"];
	$eCBMessage = $_POST["eCBMessagePHP"];
	$eCBAdmin = $_POST["eCBAdminPHP"];

	$idEdit = strip_tags(mysqli_real_escape_string($conn, $idEdit)); 
	$username = strip_tags(mysqli_real_escape_string($conn, $username)); 
	$password = strip_tags(mysqli_real_escape_string($conn, $password)); 
	$repassword = strip_tags(mysqli_real_escape_string($conn, $repassword)); 
	$email = strip_tags(mysqli_real_escape_string($conn, $email)); 
	$eCBReport = strip_tags(mysqli_real_escape_string($conn, $eCBReport)); 
	$eCBDevice = strip_tags(mysqli_real_escape_string($conn, $eCBDevice)); 
	$eCBMessage = strip_tags(mysqli_real_escape_string($conn, $eCBMessage)); 
	$eCBAdmin = strip_tags(mysqli_real_escape_string($conn, $eCBAdmin)); 

	//echo $idEdit." ".$username." ".$password." ".$repassword." ".$email." ".$eCBReport." ".$eCBDevice." ".$eCBMessage." ".$eCBAdmin;

	if($password == $repassword){
		$qrEdit = "
			SELECT * FROM users WHERE User = '$username' AND idUser != '$idEdit'
		";
		$qrEdit1 = mysqli_query($conn, $qrEdit);
		if( mysqli_num_rows($qrEdit1) > 0 ){
			echo "Tên tài khoản đã tồn tại";
		}
		else{
			$qrNewEdit = "
				UPDATE users
				SET User = '$username',
					Password = '$password',
					Email = '$email',
					idReport = '$eCBReport',
					idDevice = '$eCBDevice',
					idMessage = '$eCBMessage',
					idAdmin = '$eCBAdmin'
				WHERE idUser = '$idEdit'
			";
			$qrNewEdit1 = mysqli_query($conn, $qrNewEdit);
			if($qrNewEdit1){
				echo "Update successfully!";
			}
			else{
				echo "Update failed!";
			}
		}
	}
	else{
		echo "Please check your password again!";
	}
?>