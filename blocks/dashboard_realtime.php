<?php 
    $qrsen3 ="
                SELECT MIN(sensor1), MAX(sensor1), MIN(sensor2), MAX(sensor2) FROM sensor_table
            ";
    $qrsen4 = mysqli_query($conn, $qrsen3);
    $qrsen5 = mysqli_fetch_array($qrsen4);

    $qrfsen = "
                SELECT * FROM sensor_table ORDER BY idSensor DESC Limit 8   
            ";
    $qrfsen1 = mysqli_query($conn, $qrfsen);
    
    $Asensor1 = array();
    $Asensor2 = array();
    $Asensor3 = array();
    $i = 0;
    while($qrfsen2 = mysqli_fetch_array($qrfsen1)){
        $Asensor1[$i] = $qrfsen2['sensor1'];
        $Asensor2[$i] = $qrfsen2['sensor2'];
        $Asensor3[$i] = $qrfsen2['sensor3'];
        //echo $Asensor1[$i]." ";
        $i++;
    }

?>

<!DOCTYPE>
<html>
<head>
	<title>Laugh Lâm blogspot</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dashboard_realtime.css"/>
    <link rel="stylesheet" type="text/css" href="css/responsive_realtime.css"/>
</head>
<body>
	<div id="content1">
		<div id="col11">
            <div id="nameChart11">Temperature and Humidity</div>
			<div id="myChart1"></div>
		</div>
	</div>
	<div id="content2">
		<div id="col21">
            <div id="nameChart21">Temperature</div>
            <div id="infoSen1">
                <div class="infoSen12"><div class="infoSen13"><?php echo number_format($qrsen5[1],1); ?>°C</div>Maximum</div>
                <div class="infoSen12"><div class="infoSen13"><?php echo number_format($qrsen5[0],1); ?>°C</div>Minimum</div>
            </div>
			<div id="myChart21"></div>
		</div>
        <div id="col22">
            <div id="nameChart22">Humidity</div>
            <div id="infoSen2">
                <div class="infoSen22"><div class="infoSen23"><?php echo number_format($qrsen5[3],1); ?>%</div>Maximum</div>
                <div class="infoSen22"><div class="infoSen23"><?php echo number_format($qrsen5[2],1); ?>%</div>Minimum</div>
            </div>
            <div id="myChart22"></div>
        </div>
	</div>
	<div id="content3">
		<div id="col31">
			<div id="myChart3"></div>
		</div>
	</div>
</body>
</html>














<script>
    var chart = Highcharts.chart('myChart1', {
    chart: {
        type: 'spline',
        animation: Highcharts.svg, 
        backgroundColor: "rgb(50,60,72)",
        events: {
            load: function () {

                // var series = this.series[0];
                // var series1 = this.series[1];
                setInterval(function () {
                    $.getJSON("blocks/request_sensor.php", function (result){
                        sen1 = result[0].sensor1;
                        sen2 = result[0].sensor2;
                        sen3 = result[0].sensor3;
                        time = result[0].timeSensor;

                        var x;
                        y = parseInt(sen2);
                        chart.series[0].addPoint([x, y], false, true);
                        //series.remove(false, false);
                        var x1;
                        y1 = parseInt(sen1);
                        chart.series[2].addPoint([x1, y1], false, true);
                        //series1.remove(false, false);
                        var x2;
                        y2 = parseFloat(sen3);
                        chart.series[1].addPoint([x2, y2], true, true);
                        //series1.remove(false, false);
                    });
                }, 5000);
            }
        }
    },
    title: {
        text: '',
        style: {
        	color: "white",
        }
    },
    subtitle: {
        text: '',
        style: {
        	color: "white"
        }
    },
    xAxis: {
        categories: [],
        labels: {
             enabled: false
        }
    },
    yAxis: {
        min: 0,
        max: 100,
        title: {
            text: '',
            style: {
        	color: "white",
        }
        },
        labels: {
            formatter: function () {
                return this.value + '';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1,
            }
        }
    },
    colors: ['#44BBB6','#33CB80','#51DBFF'],
    credits: false,
    legend: {
      	itemStyle: {
       		color: 'white'
       	}
    },
    series: [
        {
            data: [<?php for($i=7; $i>=0; $i--) {echo $Asensor2[$i].",";} ?>],
            name: 'Humidity',
            marker: {
                symbol: 'square'
            }
        },
        {
            data: [<?php for($i=7; $i>=0; $i--) {echo $Asensor3[$i].",";} ?>],
            name: 'iTemp',
            marker: {
                symbol: 'circle'
            }
        },
        {
            data: [<?php for($i=7; $i>=0; $i--) {echo $Asensor1[$i].",";} ?>],
            name: 'Temperature',
            marker: {
                symbol: 'circle'
            }
        }
    ]
});

    // var updateSensor = function() { 
    //     $.getJSON("blocks/request_sensor.php", function (result){
    //         sen1 = result[0].sensor1;
    //         sen2 = result[0].sensor2;
    //         time = result[0].timeSensor;


    //         // chart.series[0].update({
    //         //     name: "Abc",    
    //         //     data: [3, 2, 7, 8, 11, 12, 17, 16, 12, 13, 6, 8]
    //         // });
    //         // var x1;
    //         // chart.series[0].addPoint([x1, Math.random()*100], true, true);
    //     });
    // }
    // setInterval(function(){updateSensor()},1000);
</script>


<script type="text/javascript">

var gaugeOptions = {
    chart: {
        backgroundColor: "rgb(50,60,72)",
        type: 'solidgauge'
    },

    title: null,

    pane: {
        center: ['50%', '90%'],
        size: '135%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#4c5a67',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {
        stops: [
            [0.1, '#33ACCB'], // green
            [0.5, '#00CBFF'], // yellow
            [0.9, '#3371CB'] // red
        ],
        lineWidth: 0,
        minorTickInterval: null,
        tickAmount: 2,
        title: {
            y: -70
        },
        labels: {
            x: 0,
            y: 20
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
                useHTML: true
            }
        }
    }
};

// The speed gauge
var chartSpeed = Highcharts.chart('myChart21', Highcharts.merge(gaugeOptions, {
    yAxis: {
        min: 0,
        max: 100,
        title: {
            text: ''
        }
    },

    credits: {
        enabled: false
    },

    series: [{
        name: 'Speed',
        data: [<?php
            $qr = "
                SELECT * FROM sensor_table ORDER BY idSensor DESC
            ";
            $qr1 = mysqli_query($conn, $qr);
            $qr2 = mysqli_fetch_array($qr1);
            echo $qr2['sensor1'];
        ?>],
        dataLabels: {
            format: '<div style="text-align:center"><span style="font-size:30px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || '#00CBFF') + '">{y}</span><br/>' +
                   '<span style="font-size:12px;color:silver">°C</span></div>'
        },
        tooltip: {
            valueSuffix: ' km/h'
        }
    }]

}));

// The RPM gauge
var chartRpm = Highcharts.chart('myChart22', Highcharts.merge(gaugeOptions, {
    yAxis: {
        min: 0,
        max: 100,
        title: {
            text: ''
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'RPM',
        data: [<?php
            $qr = "
                SELECT * FROM sensor_table ORDER BY idSensor DESC
            ";
            $qr1 = mysqli_query($conn, $qr);
            $qr2 = mysqli_fetch_array($qr1);
            echo $qr2['sensor2'];
        ?>],
        dataLabels: {
            format: '<div style="text-align:center"><span style="font-size:30px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || '#00CBFF') + '">{y:.1f}</span><br/>' +
                   '<span style="font-size:12px;color:silver">% RH</span></div>'
        },
        tooltip: {
            valueSuffix: ' revolutions/min'
        }
    }]

}));


// Bring life to the dials
setInterval(function () {
    // Speed
    var point;
    $.getJSON("blocks/request_sensor.php", function (result){
            sen1 = result[0].sensor1;
            sen2 = result[0].sensor2;
            time = result[0].timeSensor;

            // minSen1 = result[1][0];
            // maxSen1 = result[1][1];
            // minSen2 = result[1][2];
            // maxSen2 = result[1][3];

        if (chartSpeed) {
            point = chartSpeed.series[0].points[0];
            point.update(parseInt(sen1));
        }

        // RPM
        if (chartRpm) {
            point = chartRpm.series[0].points[0];
            point.update(parseInt(sen2));
        }
    });

    // if (chartRpm) {
    //     point = chartRpm.series[0].points[0];
    //     inc = Math.random() - 0.5;
    //     newVal = point.y + inc;

    //     if (newVal < 0 || newVal > 5) {
    //         newVal = point.y - inc;
    //     }

    //     point.update(newVal);
    // }
}, 5000);
// setInterval(function(){
    // console.log(minSen1);
    // console.log(maxSen1);
    // console.log(minSen2);
    // console.log(maxSen2);
// },2000);

</script>



<script type="text/javascript">
    setInterval(function(){ getUpdMMSen1(); }, 5000);       //Act Device 2
    function getUpdMMSen1()
    {
        $.ajax({
          url: 'blocks/update_min_max_sen1.php',
          type: 'post',
          success: function(data) {
            $('#infoSen1').html(data);
            // console.log(data);
          }
        });
    }

    setInterval(function(){ getUpdMMSen2(); }, 5000);       //Act Device 2
    function getUpdMMSen2()
    {
        $.ajax({
          url: 'blocks/update_min_max_sen2.php',
          type: 'post',
          success: function(data) {
            $('#infoSen2').html(data);
            // console.log(data);
          }
        });
    }
</script>