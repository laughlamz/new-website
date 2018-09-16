<?php 
	if( isset($_GET['idEdit']) ){
		$idEdit = $_GET['idEdit'];
	}
	else
		$idEdit = 10;				//Xem lai

	if($idEdit == 1)
		header ("Location: main.php?page=5");
	else if($idEdit != 1){
		$qrEdit5 = "
			SELECT * FROM users WHERE idUser = '$idEdit'
		";
		$qrEdit6 = mysqli_query($conn, $qrEdit5);
		$qrEdit7 = mysqli_fetch_array($qrEdit6);
	}
?>

<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" href="css/normalize.css"/> <!-- Reset CSS -->
	<link rel="stylesheet" type="text/css" href="css/edit_acc.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_edit_acc.css"/>
</head>
<body>
	<div id="layoutEdit">
		<div id="Edit">
			<form action="#" method="POST">
				<div id="editRow1A">
					<div id="eRow1A"><b>Edit user</b></div>
				</div>
				<div id="editRow1B" class="eRow1">
					<div id="eRow1B" class="eRow11">
						<div class="EditUPE">Username</div>
							<input class="inEditUPE" type="text" name="editUser" <?php echo'value="'.$qrEdit7['User'].'"'; ?> size="30" />
					</div>
				</div>
				<div id="editRow1C" class="eRow1">
					<div id="eRow1C" class="eRow11">
						<div class="EditUPE">Email</div>
							<input class="inEditUPE" type="text" name="editEmail" <?php echo'value="'.$qrEdit7['Email'].'"'; ?> size="30" />
					</div>
				</div>
				<div id="editRow1D" class="eRow1">
					<div id="eRow1D" class="eRow11">
						<div class="EditUPE">Password</div>
							<input class="ineditUPE" type="Password" name="editPwd" <?php echo'value="'.$qrEdit7['Password'].'"'; ?>  size="30" />	
					</div>				
				</div>
				<div id="editRow1E" class="eRow1">
					<div id="eRow1E" class="eRow11">
						<div class="EditUPE">Password Confirm</div>
							<input class="inEditUPE" type="Password" name="editRePwd" <?php echo'value="'.$qrEdit7['Password'].'"'; ?> size="30" />	
					</div>				
				</div>
				<div id="editRowCB">
					<?php
						if($qrEdit7['idReport']==1)
							echo '<div class="eCBox"><input type="checkbox" name="eCBReport" value="1" checked> Report</div>';
						else
							echo '<div class="eCBox"><input type="checkbox" name="eCBReport" value="1"> Report</div>';
						if($qrEdit7['idDevice']==1)
							echo '<div class="eCBox"><input type="checkbox" name="eCBDevice" value="1" checked> Device</div>';
						else
							echo '<div class="eCBox"><input type="checkbox" name="eCBDevice" value="1"> Device</div>';
						if($qrEdit7['idMessage']==1)
							echo '<div class="eCBox"><input type="checkbox" name="eCBMessage" value="1" checked> Message</div>';
						else
							echo '<div class="eCBox"><input type="checkbox" name="eCBMessage" value="1"> Message</div>';
						if($qrEdit7['idAdmin']==1)
							echo '<div class="eCBox"><input type="checkbox" name="eCBAdmin" value="1" checked> Admin</div>';
						else
							echo '<div class="eCBox"><input type="checkbox" name="eCBAdmin" value="1"> Admin</div>';	
					?>
				</div>
				<div id="editRow1F"><b>
					<div id="eRow1F">
					<?php
						if(isset($_POST["btnEdit"])){
							if(isset($_POST["eCBReport"])) $eCBReport = $_POST["eCBReport"];
							else $eCBReport = 0;
							if(isset($_POST["eCBDevice"])) $eCBDevice = $_POST["eCBDevice"];
							else $eCBDevice = 0;
							if(isset($_POST["eCBMessage"])) $eCBMessage = $_POST["eCBMessage"];
							else $eCBMessage = 0;
							if(isset($_POST["eCBAdmin"])) $eCBAdmin = $_POST["eCBAdmin"];
							else $eCBAdmin = 0;
							$username = $_POST["editUser"];
							$password = $_POST["editPwd"];
							$repassword = $_POST["editRePwd"];
							$email = $_POST["editEmail"];
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
										echo "Cập nhật thành công";
									}
									else{
										echo "Cập nhật thất bại";
									}
								}
							}
							else{
								echo "Nhập sai mật khẩu";
							}
						}
					?>
					</div>
				</b></div>
				<div id="editRow1G"><input id="btnEdit" type="submit" name="btnEdit" value="Update" /></div>
			</form>
		</div>
	</div>
</body>
</html>