var socket = io("https://coder-z.herokuapp.com/");

$(document).ready(function() {
	socket.on("server-send-sensor", function(data) {
		$('#sensor').html(data);
	});
});