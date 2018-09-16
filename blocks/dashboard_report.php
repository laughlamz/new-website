		<?php
			$avgTemp = array(0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0);
			$minTempWeek = 0.0;
			$maxTempWeek = 0.0;

			$avgiTemp = array(0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0);
			$miniTempWeek = 0.0;
			$maxiTempWeek = 0.0;
			
			$avgHumi = array(0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0);
			$minHumiWeek = 0.0;
			$maxHumiWeek = 0.0;

			for($i = 0; $i<7; $i++){
			 	$qrt1 = "
			 		SELECT * FROM sensor_table WHERE DATE(timeSensor) = ( CURDATE() - INTERVAL '$i' DAY )
					-- SELECT * FROM sensor_table WHERE timeSensor >= ( CURDATE() - NTERVAL 4 DAY )
					-- the same with WHERE timeSensor >= DATE_ADD(CURDATE(), INTERVAL -3 DAY);
			 	";
			 	$qrt2 = mysqli_query($conn, $qrt1);
			 	$qrt4 = mysqli_num_rows($qrt2);
			 	// $qrt5 = mysql_query("SELECT ( CURDATE() - INTERVAL 4 DAY )");
				// $qrt6 = mysql_fetch_array($qrt5);
				// echo $qrt6['( CURDATE() - INTERVAL 4 DAY )'];
			 	while($qrt3 = mysqli_fetch_array($qrt2))
				{
					$avgTemp[$i] = $avgTemp[$i] + (float)$qrt3["sensor1"];
					$avgiTemp[$i] = $avgiTemp[$i] + (float)$qrt3["sensor3"];
					$avgHumi[$i] = $avgHumi[$i] + (float)$qrt3["sensor2"];
				}
				if($qrt4 == 0){
					$avgTemp[$i] = 0;
					$avgiTemp[$i] = 0;
					$avgHumi[$i] = 0;
				}
				else{
					$avgTemp[$i] = $avgTemp[$i]/$qrt4;	
					$avgiTemp[$i] = $avgiTemp[$i]/$qrt4;	
					$avgHumi[$i] = $avgHumi[$i]/$qrt4;	
				}
				//echo $avgTemp[$i].'</br>';
			}



			$qrmm1 = "
				SELECT MIN(sensor1), MAX(sensor1) FROM sensor_table WHERE DATE(timeSensor) >= ( CURDATE() - INTERVAL 6 DAY )
			";
			$qrmm2 = mysqli_query($conn, $qrmm1);
			$qrmm3 = mysqli_fetch_array($qrmm2);
			$minTempWeek= $qrmm3[0];
			$maxTempWeek= $qrmm3[1];
			// echo $minTempWeek." ";
			// echo $maxTempWeek."</br>";

			$qrmm1 = "
				SELECT MIN(sensor2), MAX(sensor2) FROM sensor_table WHERE DATE(timeSensor) >= ( CURDATE() - INTERVAL 6 DAY )
			";
			$qrmm2 = mysqli_query($conn, $qrmm1);
			$qrmm3 = mysqli_fetch_array($qrmm2);
			$minHumiWeek= $qrmm3[0];
			$maxHumiWeek= $qrmm3[1];
			// echo $minHumiWeek." ";
			// echo $maxHumiWeek."</br>";

			$qrmm1 = "
				SELECT MIN(sensor3), MAX(sensor3) FROM sensor_table WHERE DATE(timeSensor) >= ( CURDATE() - INTERVAL 6 DAY )
			";
			$qrmm2 = mysqli_query($conn, $qrmm1);
			$qrmm3 = mysqli_fetch_array($qrmm2);
			$miniTempWeek= $qrmm3[0];
			$maxiTempWeek= $qrmm3[1];
			// echo $miniTempWeek." ";
			// echo $maxiTempWeek."</br>";



			$getd = date('d');
			$getm = date('m');
			$gety = date('y');


			$cpiTemp = $avgiTemp[0]-$avgiTemp[1];
			$cpTemp = $avgTemp[0]-$avgTemp[1];
			$cpHumi = $avgHumi[0]-$avgHumi[1];

		 ?>


<!DOCTYPE>
<html>
<head>
	<title>Laugh Lâm blogspot</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/morris.css"/>
	<script type="text/javascript" src="js/raphael.min.js"></script>
	<script type="text/javascript" src="js/morris.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dashboard_report.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_report.css"/>
<!-- 	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script> -->
</head>
<body>
	<div id="content1">
		<div id="col41" class="col4">
			<div class="nameUpDw">iTemp</div>
			<div class="valueUpDw">
				<?php 
					if($cpiTemp >= 0)
						echo "<i class='fas fa-arrow-up'></i>";
					else 
						echo "<i class='fas fa-arrow-down'></i>";
					echo number_format(abs($cpiTemp),2)."°C";
				?>
			</div>
		</div>
		<div class="col4">
			<div class="nameUpDw">Temp</div>
			<div class="valueUpDw"> 
				<?php 
					if($cpTemp >= 0)
						echo "<i class='fas fa-arrow-up'></i>";
					else 
						echo "<i class='fas fa-arrow-down'></i>";
					echo number_format(abs($cpTemp),2)."°C";
				?>
			</div>
		</div>
		<div class="col4">
			<div class="nameUpDw">Humi</div>
			<div class="valueUpDw">
				<?php 
					if($cpHumi >= 0)
						echo "<i class='fas fa-arrow-up'></i>";
					else 
						echo "<i class='fas fa-arrow-down'></i>";
					echo number_format(abs($cpHumi),2)."%";
				?>
			</div>
		</div>
		<div id="col44" class="col4"> </div>
	</div>
	<div id="content2">
		<div id="col31" class="col3">
			<div id=nameChart1><b>Donut chart</b></div>
			<div id=infoChart1><b>This's a demo chart</b></div>
			<div id="myChart1"></div>
		</div>
		<div class="col3">
			<div id=nameChart2>
				<div id="nameChart21">Avg Temperature</div>
				<div id="nameChart22">by day</div>
			</div>
			<div id=infoChart2>
				<div class="infoChart2x"><div class="infoChart21"><?php echo $maxTempWeek; ?></div><div class="infoChart22">Max</div></div>
				<div class="infoChart2x"><div class="infoChart21"><?php echo $minTempWeek; ?></div><div class="infoChart22">Min</div></div>
				<div class="infoChart2x"><div class="infoChart21"><?php echo $maxiTempWeek; ?></div><div class="infoChart22">Max.i</div></div>
				<div class="infoChart2x"><div class="infoChart21"><?php echo $miniTempWeek; ?></div><div class="infoChart22">Min.i</div></div>
			</div>
			<div id="myChart2"></div>
		</div>
		<div id="col33" class="col3">
			<div id=nameChart3>
				<div id="nameChart21">Avg Humidity</div>
				<div id="nameChart22">by day</div>
			</div>
			<div id=infoChart3>
				<div class="infoChart3x"><div class="infoChart31"><?php echo $maxHumiWeek; ?></div><div class="infoChart32">Maximum</div></div>
				<div class="infoChart3x"><div class="infoChart31"><?php echo $minHumiWeek; ?></div><div class="infoChart32">Minimum</div></div>
			</div>
			<div id="myChart3"></div>
		</div>
	</div>
	<div id="content3">
		<div id="col21" class="col12">
			<?php require "blocks/dashboard_database.php"; ?>
		</div>
		<div id="col22" class="col12">
		 <h3>Lorem Ipsum</h3></br>
		 <p>Love is something you have to passion</p>
		 <p>Love with money is a good material to be a good life</p>
		 <p>Love came from two people who understand to each other</p>
		 <h1 style="border-top: 0.1px solid gray;">Love</h1>
		 <p>&</p>
		 <h2 style="border-bottom: 0.1px solid gray">Money</h2>
		 <br>
		 <p>Enviroment Tech 4.0</p>
		</div>
	</div>
</body>
</html>

<script>
	new Morris.Donut({
	  element: 'myChart1',
	  data: [
	    {label: '2016', value: 20 },
	    {label: '2017', value: 50 },
	    {label: '2018', value: 90 },
	  ],
	  xkey: 'year',
	  ykeys: ['value'],
      resize: true,
      labelColor: 'white',
      colors: [
	    '#E87C68',
	    '#33ACCB',
	    '#EEA562'
	  ],
	  backgroundColor: 'rgb(50,60,72)',
      formatter: function (x) { return x + "billion$"}
	});

	new Morris.Bar({
	  element: 'myChart2',
	  data: [
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 6), $gety); echo date('d/m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgTemp[6],2); ?>, b: <?php echo number_format($avgiTemp[6],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 5), $gety); echo date('d/m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgTemp[5],2); ?>, b: <?php echo number_format($avgiTemp[5],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 4), $gety); echo date('d/m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgTemp[4],2); ?>, b: <?php echo number_format($avgiTemp[4],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 3), $gety); echo date('d/m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgTemp[3],2); ?>, b: <?php echo number_format($avgiTemp[3],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 2), $gety); echo date('d/m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgTemp[2],2); ?>, b: <?php echo number_format($avgiTemp[2],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 1), $gety); echo date('d/m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgTemp[1],2); ?>, b: <?php echo number_format($avgiTemp[1],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 0), $gety); echo date('d/m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgTemp[0],2); ?>, b: <?php echo number_format($avgiTemp[0],2); ?> }
	  ],
	  xkey: 'x',
	  ykeys: ['a','b'],
	  labels: ['Temp','iTemp'],
      resize: true,
      ymin: 0,
      ymax: 45,
      hideHover: true,
      barColors: function(row, series, type) {
		  if(series.key == 'a')
		  	return 'rgb(0, 163, 255)';
		  else if (series.key =='b')
		  	return 'rgb(4, 162, 179)';
		  else
		  	return 'rgb(0, 163, 120)';
		},
	  barOpacity: 0.92,
	  barSizeRatio: 0.5,
	  barRadius: [1, 1, 1, 1, 1, 1],
	  gridTextColor: 'gray',
	 //  barColors: [
  //     	'rgb(0, 163, 255)',
  //     	'rgb(0, 163, 255)',
  //     	'rgb(0, 163, 255)'
  //     ]
	 //  barColors: function (row, series, type) {
		// // console.log("--> "+row.label, series, type);
		// if(row.label == "2008") return "#AD1D28";
		// else if(row.label == "2009") return "#DEBB27";
		// else if(row.label == "2010") return "#fec04c";
	 //  }
	 //  barColors: function (row, series, type) {
  //   	if (type === 'bar') {
  //     		var red = Math.ceil(255 * row.y / this.ymax);
  //     		return 'rgb(200,' + red + ',100)';
  //   	}
  //   	else {
  //     		return '#000';
  //   	}
  // 	  }
		});

	new Morris.Area({
	  element: 'myChart3',
	  data: [
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 6), $gety); echo date('d-m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgHumi[6],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 5), $gety); echo date('d-m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgHumi[5],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 4), $gety); echo date('d-m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgHumi[4],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 3), $gety); echo date('d-m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgHumi[3],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 2), $gety); echo date('d-m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgHumi[2],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 1), $gety); echo date('d-m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgHumi[1],2); ?> },
	    {x: '<?php $dateint = mktime(0, 0, 0, $getm, ($getd - 0), $gety); echo date('d-m', $dateint);  ?>'
	    	, a: <?php echo number_format($avgHumi[0],2); ?> }
	  ],
	  xkey: 'x',
	  ykeys: ['a'],
	  // xLabelFormat: function(date) {
   //        return date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear(); 
   //    },
   //    dateFormat: function(date) {
   //        d = new Date(date);
   //        return d.getDate()+'/'+(d.getMonth()+1)+'/'+date.getFullYear(); 
   //    },
	  xLabels: "day",
	  parseTime: false,
	  labels: ['Humi'],
      resize: true,
      ymin: 0,
      ymax: 100,
      hideHover: true,
      behaveLikeLine: true,
      fillOpacity: 0.7,
      lineColors: ['rgb(0, 163, 255)'],
      pointFillColors: ['rgb(0, 163, 255)'],
      // pointStrokeColors: ['gray'],  
	});
</script>