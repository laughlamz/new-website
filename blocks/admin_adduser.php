<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" href="css/normalize.css"/> <!-- Reset CSS -->
	<link rel="stylesheet" type="text/css" href="css/admin_adduser.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_admin_adduser.css"/>
</head>
<body>
	<div id="layoutAdd">
		<div id="Add">
			<form action="#" method="POST">
				<div id="addRow1A">
					<div id="Row1A"><b>Add new user</b></div>
				</div>
				<div id="addRow1B" class="Row1">
					<div id="Row1B" class="Row11">
						<div class="AddUPE">Username</div>
							<input class="inAddUPE" type="text" name="addUser" value="" size="30" />
					</div>
				</div>
				<div id="addRow1C" class="Row1">
					<div id="Row1C" class="Row11">
						<div class="AddUPE">Email</div>
							<input class="inAddUPE" type="text" name="addEmail" value="" size="30" />
					</div>
				</div>
				<div id="addRow1D" class="Row1">
					<div id="Row1D" class="Row11">
						<div class="AddUPE">Password</div>
							<input class="inAddUPE" type="Password" name="addPwd" value="" size="30" />	
					</div>				
				</div>
				<div id="addRow1E" class="Row1">
					<div id="Row1E" class="Row11">
						<div class="AddUPE">Password Confirm</div>
							<input class="inAddUPE" type="Password" name="addRePwd" value="" size="30" />	
					</div>				
				</div>
				<div id="addRowCB">
					<div class="CBox"><input type="checkbox" name="CBReport" value="1"> Report</div>
					<div class="CBox"><input type="checkbox" name="CBDevice" value="1"> Device</div>
					<div class="CBox"><input type="checkbox" name="CBMessage" value="1"> Message</div>
					<div class="CBox"><input type="checkbox" name="CBAdmin" value="1"> Admin</div>
				</div>
				<div id="addRow1F"><b>
					<div id="Row1F">
					<?php
						if(isset($_POST["btnAdd"])){
							if(isset($_POST["CBReport"])) $CBReport = $_POST["CBReport"];
							else $CBReport = 0;
							if(isset($_POST["CBDevice"])) $CBDevice = $_POST["CBDevice"];
							else $CBDevice = 0;
							if(isset($_POST["CBMessage"])) $CBMessage = $_POST["CBMessage"];
							else $CBMessage = 0;
							if(isset($_POST["CBAdmin"])) $CBAdmin = $_POST["CBAdmin"];
							else $CBAdmin = 0;
							$username = $_POST["addUser"];
							$password = $_POST["addPwd"];
							$repassword = $_POST["addRePwd"];
							$email = $_POST["addEmail"];
							if($password == $repassword){
								$qrAdd = "
									SELECT * FROM users WHERE User = '$username'
								";
								$qrAdd1 = mysqli_query($conn, $qrAdd);
								if( mysqli_num_rows($qrAdd1) > 0 ){
									echo "Tên tài khoản đã tồn tại";
								}
								else{
									$qrNewAdd = "
										INSERT INTO users(User,Password,Email,idReport,idDevice,idMessage,idAdmin) 
										VALUES('$username','$password','$email','$CBReport','$CBDevice','$CBMessage','$CBAdmin')
									";
									$qrNewAdd1 = mysqli_query($conn, $qrNewAdd);
									if($qrNewAdd1){
										echo "Đăng ký thành công";
									}
									else{
										echo "Đăng ký thất bại";
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
				<div id="addRow1G"><input id="btnAdd" type="submit" name="btnAdd" value="Submit" /></div>
			</form>
		</div>
	</div>
</body>
</html>