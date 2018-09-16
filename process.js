var socket = io("https://coder-z.herokuapp.com/");

$(document).ready(function() {
$('#information').show();
$('#logout').hide();
$('#online').hide();
$('#chatplace').hide();
var typingTime;

	$('#submit').click(function() {
		socket.emit("client-login", 
			{
				fullname: $('#fullname').val(),
				mail: $('#mail').val()
			}
		);
	});
	$('#logout').click(function() {
		socket.emit("client-logout");
		$('#information').show();
		$('#logout').hide();
		$('#online').hide();
		$('#chatplace').hide();
		$('#fullname').val('');		$('#mail').val('');
	});

	socket.on("server-login-fail", function() {
		alert("Please choose another name!");
	});
	socket.on("server-login-success", function() {
		$('#information').hide(500);
		$('#logout').show(1500);
		$('#online').show(1500);
		$('#chatplace').show(1500);
	});
	socket.on("server-online", function(data) {
		var members = data.map(function(x) {
			return '<li>' + x.fullname + '</li>';
		});
		$('#members').html(members);
	});

	$('#chatSubmit').click(function() {
		socket.emit("client-chat-submit", $('#chatData').val());
		$('#chatData').val('');
	});
	socket.on("server-chat-display", function(data) {
		var content = '<span class="who">' + data.who + ': </span>' + '<span class="who">' + data.what + '</span><br/>' 
		$('#chatDisplay').append(content);
	});

	$('#chatData').on('keyup', function() {
		if( this.value.length > 0 )
			socket.emit("client-typing");
	});

	socket.on("server-typing", function() {
		$('#isTyping').html('...Some one is typing');
		clearTimeout(typingTime);
		typingTime = setTimeout(function() {
			$('#isTyping').html('');
		}, 3000);
	});
	
});