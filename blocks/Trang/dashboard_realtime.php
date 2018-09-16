<?php 
    $qrsen3 ="
                SELECT MIN(sensor1), MAX(sensor1), MIN(sensor2), MAX(sensor2) FROM sensor_tableT
            ";
    $qrsen4 = mysqli_query($conn, $qrsen3);
    $qrsen5 = mysqli_fetch_array($qrsen4);

    $qrfsen = "
                SELECT * FROM sensor_tableT ORDER BY idSensor DESC Limit 8   
            ";
    $qrfsen1 = mysqli_query($conn, $qrfsen);
    
    $Asensor1 = array();
    $Asensor3 = array();
    $i = 0;
    while($qrfsen2 = mysqli_fetch_array($qrfsen1)){
        $Asensor1[$i] = $qrfsen2['sensor1'];
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
	<link rel="stylesheet" type="text/css" href="css/Trang/dashboard_realtime.css"/>
    <link rel="stylesheet" type="text/css" href="css/Trang/responsive_realtime.css"/>
    <script type="text/javascript" src="https://laughlam.herokuapp.com/socket.io/socket.io.js"></script>
    <script type="text/javascript" src="/js/processReceive.js"></script>
</head>
<body>
    <div id="content1x">
        <div id="col11x">
            <div class="col11x" id="col11x-1">
                <div class="col11x-Name" id="col11x-1-Name">Humidity</div>
                <div class="col11x-Icon" id="col11x-1-Icon"></div>
                <div class="col11x-Value">
                    <div class="col11x-VaLa" id="col11x-1-Value"></div><div class="col11x-DV">%</div>
                </div>
            </div>
            <div class="col11x" id="col11x-2">
                <div class="col11x-Name" id="col11x-2-Name">Pressure</div>
                <div class="col11x-Icon" id="col11x-2-Icon"></div>
                <div class="col11x-Value"><div class="col11x-VaLa" id="col11x-2-Value"></div><div class="col11x-DV">Pa</div></div>
            </div>
            <div class="col11x" id="col11x-3">
                <div class="col11x-Name" id="col11x-3-Name">Gas</div>
                <div class="col11x-Icon" id="col11x-3-Icon"></div>
                <div class="col11x-Value"><div class="col11x-VaLa" id="col11x-3-Value"></div><div class="col11x-DV">%</div></div>
            </div>
            <div class="col11x" id="col11x-4">
                <div class="col11x-Name" id="col11x-4-Name">TemperatureH</div>
                <div class="col11x-Icon" id="col11x-4-Icon"></div>
                <div class="col11x-Value"><div class="col11x-VaLa" id="col11x-4-Value"></div><div class="col11x-DV">°C</div></div>
            </div>
            <div class="col11x" id="col11x-5">
                <div class="col11x-Name" id="col11x-5-Name">TemperatureP</div>
                <div class="col11x-Icon" id="col11x-5-Icon"></div>
                <div class="col11x-Value"><div class="col11x-VaLa" id="col11x-5-Value"></div><div class="col11x-DV">°C</div></div>
            </div>
        </div>
    </div>
	<div id="content1">
        <div id="col12">
            <div id="nameMinMax">Daily report</div>
            <div id="myMinMax">
                <table id="myMinMaxtb">
                    <tr>
                        <td></td>
                        <td style="font-size:15px;color:silver;">Minimum</td>
                        <td style="font-size:15px;color:silver;">Maximum</td>
                    </tr>
                    <tr>
                        <td>Humidity</td>
                        <td><div id="minHum"></div><div class="timeMinMax" id="timeMinHum"></div></td>
                        <td><div id="maxHum"></div><div class="timeMinMax" id="timeMaxHum"></div></td>
                    </tr>
                    <tr>
                        <td>Pressure</td>
                        <td><div id="minPres"></div><div class="timeMinMax" id="timeMinPres"></div></td>
                        <td><div id="maxPres"></div><div class="timeMinMax" id="timeMaxPres"></div></td>
                    </tr>
                    <tr>
                        <td>Gas</td>
                        <td><div id="minGas"></div><div class="timeMinMax" id="timeMinGas"></div></td>
                        <td><div id="maxGas"></div><div class="timeMinMax" id="timeMaxGas"></div></td>
                    </tr>
                    <tr>
                        <td>TemperatureH</td>
                        <td><div id="minTempH"></div><div class="timeMinMax" id="timeMinTempH"></div></td>
                        <td><div id="maxTempH"></div><div class="timeMinMax" id="timeMaxTempH"></div></td>
                    </tr>
                    <tr>
                        <td>TemperatureP</td>
                        <td><div id="minTempP"></div><div class="timeMinMax" id="timeMinTempP"></div></td>
                        <td><div id="maxTempP"></div><div class="timeMinMax" id="timeMaxTempP"></div></td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="col11">
            <div id="nameChart11">Temperature</div>
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
                    $.getJSON("blocks/Trang/request_sensor.php", function (result){
                        sen1 = result[0].sensor1;
                        sen2 = result[0].sensor2;
                        sen3 = result[0].sensor3;
                        time = result[0].timeSensor;

                        // var x;
                        // y = parseFloat(sen2);
                        // chart.series[0].addPoint([x, y], false, true);
                        //series.remove(false, false);
                        var x1;
                        y1 = parseFloat(sen1);
                        chart.series[1].addPoint([x1, y1], false, true);
                        //series1.remove(false, false);
                        var x2;
                        y2 = parseFloat(sen3);
                        chart.series[0].addPoint([x2, y2], true, true);
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
        min: 20,
        max: 40,
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
        data: [0],
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
        data: [0],
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

 $.getJSON("blocks/Trang/request_sensor.php", function (result){
            sen1 = result[0].sensor1;
            sen2 = result[0].sensor2;
            sen3 = result[0].sensor3;
            sen4 = result[0].sensor4;
            sen5 = result[0].sensor5;
            time = result[0].timeSensor;
            
            minSen1 = result[1].sensor1; timeMinSen1 = result[1].timeSensor;
            maxSen1 = result[2].sensor1; timeMaxSen1 = result[2].timeSensor;

            minSen2 = result[3].sensor2; timeMinSen2 = result[3].timeSensor;
            maxSen2 = result[4].sensor2; timeMaxSen2 = result[4].timeSensor;

            minSen3 = result[5].sensor3; timeMinSen3 = result[5].timeSensor;
            maxSen3 = result[6].sensor3; timeMaxSen3 = result[6].timeSensor;

            minSen4 = result[7].sensor4; timeMinSen4 = result[7].timeSensor;
            maxSen4 = result[8].sensor4; timeMaxSen4 = result[8].timeSensor;

            minSen5 = result[9].sensor5; timeMinSen5 = result[9].timeSensor;
            maxSen5 = result[10].sensor5; timeMaxSen5 = result[10].timeSensor;

            var tMinS1 = timeMinSen1.split(" "); var tMaxS1 = timeMaxSen1.split(" ");
            var tMinS2 = timeMinSen2.split(" "); var tMaxS2 = timeMaxSen2.split(" ");
            var tMinS3 = timeMinSen3.split(" "); var tMaxS3 = timeMaxSen3.split(" ");
            var tMinS4 = timeMinSen4.split(" "); var tMaxS4 = timeMaxSen4.split(" ");
            var tMinS5 = timeMinSen5.split(" "); var tMaxS5 = timeMaxSen5.split(" ");
            // console.log(minSen1); console.log(minSen2); console.log(minSen3);
            // console.log(minSen4); console.log(minSen5);
            // console.log(maxSen1); console.log(maxSen2); console.log(maxSen3);
            // console.log(maxSen4); console.log(maxSen5);

            $("#col11x-1-Value").html(sen2);
            $("#col11x-2-Value").html(sen4);
            $("#col11x-3-Value").html(sen5);
            $("#col11x-4-Value").html(sen1);
            $("#col11x-5-Value").html(sen3);

            $("#minHum").html(minSen2); $("#timeMinHum").html(tMinS2[1]);
            $("#maxHum").html(maxSen2); $("#timeMaxHum").html(tMaxS2[1]);

            $("#minPres").html(minSen4); $("#timeMinPres").html(tMinS4[1]);
            $("#maxPres").html(maxSen4); $("#timeMaxPres").html(tMaxS4[1]);

            $("#minGas").html(minSen5); $("#timeMinGas").html(tMinS5[1]);
            $("#maxGas").html(maxSen5); $("#timeMaxGas").html(tMaxS5[1]);

            $("#minTempH").html(minSen1); $("#timeMinTempH").html(tMinS1[1]);
            $("#maxTempH").html(maxSen1); $("#timeMaxTempH").html(tMaxS1[1]);

            $("#minTempP").html(minSen3); $("#timeMinTempP").html(tMinS3[1]);
            $("#maxTempP").html(maxSen3); $("#timeMaxTempP").html(tMaxS3[1]);


        if (chartSpeed) {
            point = chartSpeed.series[0].points[0];
            point.update(parseFloat(sen1));
        }

        // RPM
        if (chartRpm) {
            point = chartRpm.series[0].points[0];
            point.update(parseFloat(sen2));
        }
    });



setInterval(function () {
    // Speed
    var point;
    $.getJSON("blocks/Trang/request_sensor.php", function (result){
            sen1 = result[0].sensor1;
            sen2 = result[0].sensor2;
            sen3 = result[0].sensor3;
            sen4 = result[0].sensor4;
            sen5 = result[0].sensor5;
            time = result[0].timeSensor;
            
            minSen1 = result[1].sensor1; timeMinSen1 = result[1].timeSensor;
            maxSen1 = result[2].sensor1; timeMaxSen1 = result[2].timeSensor;

            minSen2 = result[3].sensor2; timeMinSen2 = result[3].timeSensor;
            maxSen2 = result[4].sensor2; timeMaxSen2 = result[4].timeSensor;

            minSen3 = result[5].sensor3; timeMinSen3 = result[5].timeSensor;
            maxSen3 = result[6].sensor3; timeMaxSen3 = result[6].timeSensor;

            minSen4 = result[7].sensor4; timeMinSen4 = result[7].timeSensor;
            maxSen4 = result[8].sensor4; timeMaxSen4 = result[8].timeSensor;

            minSen5 = result[9].sensor5; timeMinSen5 = result[9].timeSensor;
            maxSen5 = result[10].sensor5; timeMaxSen5 = result[10].timeSensor;


            var tMinS1 = timeMinSen1.split(" "); var tMaxS1 = timeMaxSen1.split(" ");
            var tMinS2 = timeMinSen2.split(" "); var tMaxS2 = timeMaxSen2.split(" ");
            var tMinS3 = timeMinSen3.split(" "); var tMaxS3 = timeMaxSen3.split(" ");
            var tMinS4 = timeMinSen4.split(" "); var tMaxS4 = timeMaxSen4.split(" ");
            var tMinS5 = timeMinSen5.split(" "); var tMaxS5 = timeMaxSen5.split(" ");
            // console.log(minSen1); console.log(minSen2); console.log(minSen3);
            // console.log(minSen4); console.log(minSen5);
            // console.log(maxSen1); console.log(maxSen2); console.log(maxSen3);
            // console.log(maxSen4); console.log(maxSen5);

            //Use Nodejs socketio instead of ajax, but the 1st time load still keep this
            // $("#col11x-1-Value").html(sen2);
            // $("#col11x-2-Value").html(sen4);
            // $("#col11x-3-Value").html(sen5);
            // $("#col11x-4-Value").html(sen1);
            // $("#col11x-5-Value").html(sen3);

            $("#minHum").html(minSen2); $("#timeMinHum").html(tMinS2[1]);
            $("#maxHum").html(maxSen2); $("#timeMaxHum").html(tMaxS2[1]);

            $("#minPres").html(minSen4); $("#timeMinPres").html(tMinS4[1]);
            $("#maxPres").html(maxSen4); $("#timeMaxPres").html(tMaxS4[1]);

            $("#minGas").html(minSen5); $("#timeMinGas").html(tMinS5[1]);
            $("#maxGas").html(maxSen5); $("#timeMaxGas").html(tMaxS5[1]);

            $("#minTempH").html(minSen1); $("#timeMinTempH").html(tMinS1[1]);
            $("#maxTempH").html(maxSen1); $("#timeMaxTempH").html(tMaxS1[1]);

            $("#minTempP").html(minSen3); $("#timeMinTempP").html(tMinS3[1]);
            $("#maxTempP").html(maxSen3); $("#timeMaxTempP").html(tMaxS3[1]);


        if (chartSpeed) {
            point = chartSpeed.series[0].points[0];
            point.update(parseFloat(sen1));
        }

        // RPM
        if (chartRpm) {
            point = chartRpm.series[0].points[0];
            point.update(parseFloat(sen2));
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
          url: 'blocks/Trang/update_min_max_sen1.php',
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
          url: 'blocks/Trang/update_min_max_sen2.php',
          type: 'post',
          success: function(data) {
            $('#infoSen2').html(data);
            // console.log(data);
          }
        });
    }
</script>