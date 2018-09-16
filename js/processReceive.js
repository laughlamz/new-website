var socket = io("https://laughlam.herokuapp.com/");

$(document).ready(function() {
	socket.on("server-sensor-data-1", function(data) {
		$('#col11x-1-Value').html(data.sen1);
		$('#col11x-2-Value').html(data.sen2);
		$('#col11x-3-Value').html(data.sen3);
		$('#col11x-4-Value').html(data.sen4);
		$('#col11x-5-Value').html(data.sen5);
		console.log('socIO');
		
		$.ajax({
			url: 'blocks/Trang/scan_all.php',
			type: 'post',
			data: {
				sensor1: data.sen1,
				sensor2: data.sen2,
				sensor3: data.sen3,
				sensor4: data.sen4,
				sensor5: data.sen5
			},
			success: function(data) {
				console.log('data back',data);
			}
		});

	});
});