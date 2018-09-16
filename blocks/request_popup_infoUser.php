
<!-- Dang xai ke css  SELECT * FROM `sensor_tableT` WHERE Second(timeSensor) % 900 = 0 --> 

<?php 
require "dbCon.php";

	$idEdit = $_POST["idEditPHP"];
	$idEdit = strip_tags(mysqli_real_escape_string($conn, $idEdit)); 
			
	$qrEdit6 = mysqli_query($conn, "SELECT * FROM users WHERE idUser = '$idEdit'");
	$qrEdit7 = mysqli_fetch_array($qrEdit6);
?>

<!DOCTYPE html>
<html>
<head>
	
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
							<input class="inEditUPE" type="text" id="editUser" <?php echo'value="'.$qrEdit7['User'].'"'; ?> size="30" />
					</div>
				</div>
				<div id="editRow1C" class="eRow1">
					<div id="eRow1C" class="eRow11">
						<div class="EditUPE">Email</div>
							<input class="inEditUPE" type="text" id="editEmail" <?php echo'value="'.$qrEdit7['Email'].'"'; ?> size="30" />
					</div>
				</div>
				<div id="editRow1D" class="eRow1">
					<div id="eRow1D" class="eRow11">
						<div class="EditUPE">Password</div>
							<input class="ineditUPE" type="Password" id="editPwd" <?php echo'value="'.$qrEdit7['Password'].'"'; ?> size="30" />	
					</div>				
				</div>
				<div id="editRow1E" class="eRow1">
					<div id="eRow1E" class="eRow11">
						<div class="EditUPE">Password Confirm</div>
							<input class="inEditUPE" type="Password" id="editRePwd" <?php echo'value="'.$qrEdit7['Password'].'"'; ?> size="30" />	
					</div>				
				</div>
				<div id="editRowCB">
					<?php
						if($qrEdit7['idReport']==1)
							echo '<div class="eCBox"><input type="checkbox" id="eCBReport" name="eCBReport" value="1" checked> Report</div>';
						else
							echo '<div class="eCBox"><input type="checkbox" id="eCBReport" name="eCBReport" value="0"> Report</div>';
						if($qrEdit7['idDevice']==1)
							echo '<div class="eCBox"><input type="checkbox" id="eCBDevice" name="eCBDevice" value="1" checked> Device</div>';
						else
							echo '<div class="eCBox"><input type="checkbox" id="eCBDevice" name="eCBDevice" value="0"> Device</div>';
						if($qrEdit7['idMessage']==1)
							echo '<div class="eCBox"><input type="checkbox" id="eCBMessage" name="eCBMessage" value="1" checked> Message</div>';
						else
							echo '<div class="eCBox"><input type="checkbox" id="eCBMessage" name="eCBMessage" value="0"> Message</div>';
						if($qrEdit7['idAdmin']==1)
							echo '<div class="eCBox"><input type="checkbox" id="eCBAdmin" name="eCBAdmin" value="1" checked> Admin</div>';
						else
							echo '<div class="eCBox"><input type="checkbox" id="eCBAdmin" name="eCBAdmin" value="0"> Admin</div>';	
					?>
				</div>
				<div id="editRow1F"><b>
					<div id="eRow1F">
					
					</div>
				</b></div>
				<div id="editRow1G"><div id="btnEdit">Update</div></div>
			</form>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function() {

	  $("#btnEdit").on('click', function() {

	  	var idEdit = <?php echo $idEdit; ?>;
	    var username = $("#editUser").val();
	    var email = $("#editEmail").val();
	    var password = $("#editPwd").val();
	    var repassword = $("#editRePwd").val();

	    if ($('#eCBReport').is(":checked"))
	    	var eCBReport = 1;
	    else
	    	var eCBReport = 0;
	    if ($('#eCBDevice').is(":checked"))
	    	var eCBDevice = 1;
	    else
	    	var eCBDevice = 0;
	    if ($('#eCBMessage').is(":checked"))
	    	var eCBMessage = 1;
	    else
	    	var eCBMessage = 0;
	    if ($('#eCBAdmin').is(":checked"))
	    	var eCBAdmin = 1;
	    else
	    	var eCBAdmin = 0;

	    // console.log("btnEdit is clicking");
	    // console.log(idEdit);
	    // console.log(username);
	    // console.log(email);
	    // console.log(password);
	    // console.log(repassword);
	    // console.log(eCBReport);
	    // console.log(eCBDevice);
	    // console.log(eCBMessage);
	    // console.log(eCBAdmin);

	    $.ajax({
	      url: 'blocks/request_popup_edit.php',
	      type: 'POST',
	      data: {
	      		idEditPHP: idEdit,
	            usernamePHP: username,
	            emailPHP: email,
	            passwordPHP: password,
	            repasswordPHP: repassword,
	            eCBReportPHP: eCBReport,
	            eCBDevicePHP: eCBDevice,
	            eCBMessagePHP: eCBMessage,
	            eCBAdminPHP: eCBAdmin,
	      },
	      success : function(data){
	        $('#eRow1F').html(data);
	        if(data == "Update successfully!")
	        	window.location.reload();
	      }
	    });
	  });	

});
</script>