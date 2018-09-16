
<!-- Dang xai ke css -->

<?php 
require "dbCon.php";

	$selectSen = $_POST["selectSenPHP"];
	$frDataSen = $_POST["frDataSenPHP"];
	$toDataSen = $_POST["toDataSenPHP"];
	$perPage2nd = $_POST["perPage2ndPHP"];
	$curPage2nd = $_POST["curPage2ndPHP"];
	$selectSen = strip_tags(mysqli_real_escape_string($conn, $selectSen)); 
	$frDataSen = strip_tags(mysqli_real_escape_string($conn, $frDataSen)); 
	$toDataSen = strip_tags(mysqli_real_escape_string($conn, $toDataSen));
	$perPage2nd = strip_tags(mysqli_real_escape_string($conn, $perPage2nd)); 
	$curPage2nd = strip_tags(mysqli_real_escape_string($conn, $curPage2nd)); 
	
	// $selectSen = "sensor1";
	// $frDataSen = 0;
	// $toDataSen = 100;
	// $perPage2nd = 15;
	// $curPage2nd = 1;

	$per_page = $perPage2nd;						//sotin1trang
	$cur_page = $curPage2nd;
?>

<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/Trang/update_database_2nd.css"/>
	<link rel="stylesheet" type="text/css" href="css/Trang/responsive_update_database_2nd.css"/>
</head>
<body>
	<div id="tableSQL">
		<table id="tbSQL" cellspacing="5" cellpadding="20">
			<tr id="tbSQL_row1">
				<td class="lo tbSQL_row1"><b>ID</b></td>
				<td class="tbSQL_row1"><b>Time</b></td>
				<td class="tbSQL_row1"><b><div class="sh">Humi</div><div class="lo">Humidity</div></b></td>
				<td class="tbSQL_row1"><b><div class="sh">Pres</div><div class="lo">Pressure</div></b></td>
				<td class="tbSQL_row1"><b><div class="sh">Gas</div><div class="lo">Gas</div></b></td>
				<td class="tbSQL_row1"><b><div class="sh">TempP</div><div class="lo">TemperP</div></b></td>
				<td class="tbSQL_row1"><b><div class="sh">TempH</div><div class="lo">TemperH</div></b></td>
			</tr>
			<?php
				$start = ($cur_page - 1) * $per_page;			
				$qr_sqldata = mysqli_query($conn, "SELECT * FROM sensor_tableT WHERE $selectSen >= $frDataSen AND $selectSen <= $toDataSen ORDER BY idSensor LIMIT $start, $per_page");
				//echo '<br>';
				// $nr_sqldata = mysqli_num_rows($qr_sqldata);
				//echo $nr_sqldata;
				$i_id = 1;
				while($ar_sqldata = mysqli_fetch_array($qr_sqldata))
				{
					echo '<tr id="tbSQL_row2">';
						//echo '<td>'.$ar_sqldata["id_sensor"].'</td>';
						echo '<td class="lo tbSQL_row2">'.$i_id++.'</td>';
						$timeSen = strtotime($ar_sqldata["timeSensor"]);
						echo '<td class="lo tbSQL_row2">'.date('d-m-Y H:i:s', $timeSen).'</td>';
						echo '<td class="sh tbSQL_row2">'.date('d-m H:i:s', $timeSen).'</td>';
						if($selectSen == 'sensor2')
							echo '<td class="tbSQL_row2 beColor">'.$ar_sqldata["sensor2"].'</td>';
						else
							echo '<td class="tbSQL_row2">'.$ar_sqldata["sensor2"].'</td>';

						if($selectSen == 'sensor4')
							echo '<td class="tbSQL_row2 beColor">'.$ar_sqldata["sensor4"].'</td>';
						else
							echo '<td class="tbSQL_row2">'.$ar_sqldata["sensor4"].'</td>';

						if($selectSen == 'sensor5')
							echo '<td class="tbSQL_row2 beColor">'.$ar_sqldata["sensor5"].'</td>';
						else
							echo '<td class="tbSQL_row2">'.$ar_sqldata["sensor5"].'</td>';

						if($selectSen == 'sensor1')
							echo '<td class="tbSQL_row2 beColor">'.$ar_sqldata["sensor1"].'</td>';
						else
							echo '<td class="tbSQL_row2">'.$ar_sqldata["sensor1"].'</td>';

						if($selectSen == 'sensor3')
							echo '<td class="tbSQL_row2 beColor">'.$ar_sqldata["sensor3"].'</td>';
						else
							echo '<td class="tbSQL_row2">'.$ar_sqldata["sensor3"].'</td>';
					echo '</tr>';
				}
				?>
		</table>				
	</div>
	<div id="pageSQL">
		<?php
			$qr_sqldata1 = mysqli_query($conn, "SELECT * FROM sensor_tableT WHERE $selectSen >= $frDataSen AND $selectSen <= $toDataSen ORDER BY idSensor");
			$count = mysqli_num_rows($qr_sqldata1);
			$no_of_paginations = ceil($count / $per_page);
			        // TÍNH TOÁN GIÁ TRỊ BẮT ĐẦU & KẾT THÚC VÒNG LẶP
        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }
        
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true; 
        $show_total = true;

        echo "<ul id='ul_paginations'>";
        if ($first_btn && $cur_page > 1) {
            echo "<li p='1' class='active'><i class='fas fa-angle-double-left'></i></li>";
        } else if ($first_btn) {
            echo "<li p='1' class='inactive'><i class='fas fa-angle-double-left'></i></li>";
        }
    
        // HIỂN THỊ NÚT PREVIOUS
        if ($previous_btn && $cur_page > 1) {
            $pre = $cur_page - 1;
            echo "<li p='".$pre."' class='active'><i class='fas fa-angle-left'></i></li>";
        } else if ($previous_btn) {
            echo "<li class='inactive'><i class='fas fa-angle-left'></i></li>";
        }


        for ($i = $start_loop; $i <= $end_loop; $i++) {
        
            if ($cur_page == $i)
                echo "<li p='".$i."' class='actived'> ".$i." </li>";
            else
                echo "<li p='".$i."' class='active'> ".$i." </li>";
        }
        
        // HIỂN THỊ NÚT NEXT
        if ($next_btn && $cur_page < $no_of_paginations) {
            $nex = $cur_page + 1;
            echo "<li p='".$nex."' class='active'><i class='fas fa-angle-right'></i></li>";
        } else if ($next_btn) {
            echo "<li class='inactive'><i class='fas fa-angle-right'></i></li>";
        }
 
        // HIỂN THỊ NÚT LAST
        if ($last_btn && $cur_page < $no_of_paginations) {
            echo "<li p='".$no_of_paginations."' class='active'><i class='fas fa-angle-double-right'></i></li>";
        } else if ($last_btn) {
            echo "<li p='".$no_of_paginations."' class='inactive'><i class='fas fa-angle-double-right'></i></li>";
        }
        
        echo "</ul>";
        if($show_total)
            echo "<span id='total' class='class_text_total' a='".$no_of_paginations."'>Trang <b>".$cur_page."</b>/<b>".$no_of_paginations."</b></span>";
		?>				
	</div>
</body>
</html>