<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" href="css/normalize.css"/> <!-- Reset CSS -->
	<link rel="stylesheet" type="text/css" href="css/admin_account.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_account.css"/>
	<link rel="stylesheet" type="text/css" href="css/edit_acc.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_edit_acc.css"/>
</head>
<body>
	<div id="contentAcc1">
		<div id="Acc1">
			<div id="Acc1A">
				<div id="Acc1A1"><b>Administrator</b></div>
			</div>

			<div id="Acc1B"><a id="btnAcc" class="link" href="main.php?page=6"><img id="btnAccImg" src="img/iconAdd.png"/><div id="btnAccName">Add new</div></a></div>

			<div id="tableUser">
				<table id="tbUser">
					<tr id="tbUser_row1">
						<td class="tbUser_row1"><b><div class="AccHidden">ID</div></b></td>
						<td class="tbUser_row1"><b>User</b></td>
						<td class="tbUser_row1"><b><div class="AccHidden">Email</div></b></td>
						<td class="tbUser_row1"><b id="Per1">Jurisdiction</b></br><div id="Per11">Report &nbsp;Device&nbsp; Message&nbsp; Admin</div><div id="Per12">Rep &nbsp;Dev &nbsp;Mes &nbsp;Adm</div></td>
						<td class="tbUser_row1"><b id="Per2"> Action </b></br><div id="Per22">&nbsp;Edit&nbsp;&nbsp;&nbsp; Delete</div><div id="Per23">Edit&nbsp;&nbsp;&nbsp; Del</div></td>
						<td class="tbUser_row1" id="Lastvs"><b><div class="AccHidden">Last-visit</div></b></td>
					</tr>
					<?php
						//$from = ($trang - 1) * $sotin1trang;			
						$qr_usrdata = mysqli_query($conn, "SELECT * FROM users ORDER BY idUser LIMIT 0,20");
						//echo '<br>';
						// $nr_usrdata = mysql_num_rows($qr_usrdata);
						// echo $nr_usrdata;
						$nr_id = 1;
						while($ar_usrdata = mysqli_fetch_array($qr_usrdata))
						{
							
							$timestamp = $ar_usrdata["Last_log"];
							$timestamp = date('d/m/Y - G:i:s', strtotime($timestamp));
							echo '<tr id="tbUser_row2">';
								//echo '<td>'.$ar_sqldata["id_sensor"].'</td>';
								echo '<td class="tbUser_row2"><div class="AccHidden">'.$nr_id.'</div></td>'; $nr_id = $nr_id + 1;
								echo '<td class="tbUser_row2">'.$ar_usrdata["User"].'</td>';
								echo '<td class="tbUser_row2"><div class="AccHidden">'.$ar_usrdata["Email"].'</div></td>';
								echo '<td class="tbUser_row2">';
						?>

							<div class="Per">
								<?php
									if($ar_usrdata["idReport"] == 1)
										echo '<img src="img/icon3.png"/>';
								?>
							</div>
							<div class="Per">
								<?php
									if($ar_usrdata["idDevice"] == 1)
										echo '<img src="img/icon3.png"/>';
								?>
							</div>
							<div class="Per">
								<?php
									if($ar_usrdata["idMessage"] == 1)
										echo '<img src="img/icon3.png"/>';
								?>
							</div>
							<div class="Per">
								<?php
									if($ar_usrdata["idAdmin"] == 1)
										echo '<img src="img/icon4.png"/>';
								?>
							</div>

							<div class="PerX">
								<?php
									if($ar_usrdata["idReport"] == 1)
										echo '<img src="img/icon33.png"/>';
								?>
							</div>
							<div class="PerX">
								<?php
									if($ar_usrdata["idDevice"] == 1)
										echo '<img src="img/icon33.png"/>';
								?>
							</div>
							<div class="PerX">
								<?php
									if($ar_usrdata["idMessage"] == 1)
										echo '<img src="img/icon33.png"/>';
								?>
							</div>
							<div class="PerX">
								<?php
									if($ar_usrdata["idAdmin"] == 1)
										echo '<img src="img/icon44.png"/>';
								?>
							</div>

						<?php
								echo '</td>';
								echo '<td class="tbUser_row2">
						<a class="edit editUsr" idEdit="'.$ar_usrdata["idUser"].'"><div class="editOut"><img src="img/icon11.png"/></div></a>
						<a class="edit" href="deleteAcc.php?idDel='.$ar_usrdata["idUser"].'" onclick="return confirm_delete()"><div class="editOut"><img src="img/icon2x.png"/></div></a></td>';
								echo '<td class="tbUser_row2" id="Lastvsmini"><div class="AccHidden">'.$timestamp.'</div></td>';
							echo '</tr>';
						}
					?>
				</table>				
			</div>
		</div>
	</div>
	<div id='popup'>
		
	</div>
	<div id="maskLayout" style=""></div>
</body>
</html>


<script type="text/javascript">
	function confirm_delete() {
	  return confirm('Do you want to del?');
	}


$(document).ready(function() {

  $(".editUsr").on('click', function() {
    showPopup();

    var idEdit = $(this).attr('idEdit');
    $.ajax({
      url: 'blocks/request_popup_infoUser.php',
      type: 'POST',
      data: {
            idEditPHP: idEdit,
      },
      success : function(data){
        $('#popup').html(data);
      }
    });
  });

  $("#maskLayout").on('click', function() {
    hidePopup();
  });

  function hidePopup() {
    $("#popup").hide();
    $("#maskLayout").hide();
  }

  function showPopup() {
    $("#popup").fadeIn();
    $("#maskLayout").fadeIn();
  }

});

</script>

<!-- <script type="text/javascript">
	function del(delid){
		if(confirm("Do you want to delete?")){
			window.location.href='deleteAcc.php?idDel=' + delid + '';
			return true;
		}
	}
</script> -->


<script type="text/javascript">
	$
</script>