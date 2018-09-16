<?php
	$qrLH = "
		SELECT * FROM loghistory ORDER BY idLog DESC LIMIT 10
	";
	$qrLH1 = mysqli_query($conn, $qrLH);
?>


<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/log_history.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_log_history.css"/>
</head>
<body>
	<div id="layLogHis">
		<div id="layLHcol-1">
			
		</div>
		<div id="layLHcol-2">
			<div id="layLHcol-2Name">
				Log History
			</div>
			<div id="layLHcol-2Info">
				<?php
					while($qrLH2 = mysqli_fetch_array($qrLH1))
					{
						if($qrLH2['statusD1'] == 'connected'){
							echo '<div id="Connected">';
								echo '<div id="Info">';
									echo '<b>Connected</b>';
									$timeLog = strtotime($qrLH2["timeLog"]);
									echo '<div class="loLog1 Info1">'.date('d-m-Y H:i:s', $timeLog).'</div>';
									echo '<div class="shLog1 Info1">'.date('d-m H:i:s', $timeLog).'</div>';
								echo '</div>';				
							echo '</div>';
						}
						else if($qrLH2['statusD1'] == 'disconnected'){
							echo '<div id="Disconnected">';
								echo '<div id="Info">';
									echo '<b>Disconnected</b>';
									$timeLog = strtotime($qrLH2["timeLog"]);
									echo '<div class="loLog1 Info1">'.date('d-m-Y H:i:s', $timeLog).'</div>';
									echo '<div class="shLog1 Info1">'.date('d-m H:i:s', $timeLog).'</div>';
								echo '</div>';				
							echo '</div>';
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>