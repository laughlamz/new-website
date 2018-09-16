<?php 
	$sotin1trang = 10;
	if( isset($_GET["trang"]) ){
		$trang = $_GET["trang"];
		settype($trang, "int");
	}
	else
		$trang = 1;
?>

<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/dashboard_database.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_database.css"/>
</head>
<body>
	<div id="nameSQL"><b>Database</b><a id="moreSet" href="main.php?page=10"><i class="fa fa-cogs" aria-hidden="true"></i></a></div>
	<div id="tableSQL">
		<table id="tbSQL" cellspacing="5" cellpadding="20">
			<tr id="tbSQL_row1">
				<td class="tbSQL_row1"><b>ID</b></td>
				<td class="tbSQL_row1"><b>Time</b></td>
				<td class="tbSQL_row1"><b><div id="shiTemp">iTemp</div><div id="loiTemp">iTemperature</div></b></td>
				<td class="tbSQL_row1"><b><div id="shTemp">Temp</div><div id="loTemp">Temperature</div></b></td>
				<td class="tbSQL_row1"><b><div id="shHumi">Humi</div><div id="loHumi">Humidity</div></b></td>
			</tr>
			<?php
				$from = ($trang - 1) * $sotin1trang;			
				$qr_sqldata = mysqli_query($conn, "SELECT * FROM sensor_table ORDER BY idSensor DESC LIMIT $from, $sotin1trang");
				//echo '<br>';
				// $nr_sqldata = mysql_num_rows($qr_sqldata);
				// echo $nr_sqldata;
				while($ar_sqldata = mysqli_fetch_array($qr_sqldata))
				{
					echo '<tr id="tbSQL_row2">';
						//echo '<td>'.$ar_sqldata["id_sensor"].'</td>';
						echo '<td class="tbSQL_row2">'.$ar_sqldata["idSensor"].'</td>';
						$timeSen = strtotime($ar_sqldata["timeSensor"]);
						echo '<td id="loTime" class="tbSQL_row2">'.date('d-m-Y H:i:s', $timeSen).'</td>';
						echo '<td id="shTime" class="tbSQL_row2">'.date('d-m H:i:s', $timeSen).'</td>';
						echo '<td class="tbSQL_row2">'.$ar_sqldata["sensor3"].'</td>';
						echo '<td class="tbSQL_row2">'.$ar_sqldata["sensor1"].'</td>';
						echo '<td class="tbSQL_row2">'.$ar_sqldata["sensor2"].'</td>';
					echo '</tr>';
				}
				?>
		</table>				
	</div>
	<div id="pageSQL">
		<?php
			$x = mysqli_query($conn, "SELECT idSensor FROM sensor_table");
			$tongsotin = mysqli_num_rows($x);
			$sotrang = ceil($tongsotin / $sotin1trang);
			if($trang >1)
				$btrang = $trang - 1;	//1
			else
				$btrang = $trang; 
			if($trang < $sotrang)
				$ntrang = $trang + 1;
			else
				$ntrang = $trang;	//2
			echo "<b><a href='main.php?page=2&trang=$btrang'>Back</a></b>";
			if($trang > 0 && $trang < 5){
				for($tr = 1; $tr <= 5; $tr++)
				{
					if($tr == $trang)
						echo "<a href='main.php?page=2&trang=$tr'><b id='pageCur'>$tr</b></a>";
					else
						echo "<a href='main.php?page=2&trang=$tr'> $tr </a>";
				}
			}
			if($trang >= 5 && $trang <= $sotrang-4){	// 11 12 13 14 15
				//$tr1 = $trang - 2; $tr2 = $trang - 1; $tr3 = $trang; $tr4 = $trang + 1; $tr5 = $trang + 2;
				for($tr = $trang-2; $tr <= $trang+2; $tr++)
				{
					if($tr == $trang)
						echo "<a href='main.php?page=2&trang=$tr'><b id='pageCur'>$tr</b></a>";
					else
						echo "<a href='main.php?page=2&trang=$tr'>$tr</a>";
				}
				//echo "<a href='sqldata.php?trang=$tr1'>[$tr1]</a> - ";
				//echo "<a href='sqldata.php?trang=$tr2'>[$tr2]</a> - ";
				//echo "<a href='sqldata.php?trang=$tr3'><b>[$tr3]</b></a> - ";
				//echo "<a href='sqldata.php?trang=$tr4'>[$tr4]</a> - ";
				//echo "<a href='sqldata.php?trang=$tr5'>[$tr5]</a> - ";
			}
			if($trang > $sotrang-4 && $trang <= $sotrang){
				for($tr = $sotrang-4; $tr <= $sotrang; $tr++)
				{
					if($tr == $trang)
						echo "<a href='main.php?page=2&trang=$tr'><b id='pageCur'>$tr</b></a>";
					else
						echo "<a href='main.php?page=2&trang=$tr'>$tr</a>";
				}
			}
			echo "<b><a href='main.php?page=2&trang=$ntrang'>Next</a></b>";
		?>				
	</div>
</body>
</html>