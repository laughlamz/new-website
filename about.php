<!DOCTYPE html>
<html>
<head>
	<title>About</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="shortcut icon" href="img/favicon1.png"> 
	<link rel="stylesheet" href="css/normalize.css"/>
	<link rel="stylesheet" href="css/about.css"/>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|PT+Sans+Caption|Raleway|Source+Sans+Pro|Poppins" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
</head>
<body>
	<div class="section" id="s1">
		<div id="scaleS1">
			<div id="cenS1">
				<div id="introPic">
				<div style="display: none;" id="layoutPic">
					<div id="layPic">
						<div id="pic"></div>
					</div>
				</div>
				<div style="display: none;" id="myInformation1" class="myInfomation"><h1>Hello World - I am Son</h1></div>
				</div>
				<div class="myInfomation"><h2>I'm one of the developer in our universe</h2></div>
				<div class="myInfomation"><h3>My passion is about Embedded system, Website, Robotics, Machine Learning and a little Art</h3></div>
				<div class="myInfomation"><h4>Nice to meet you :)</h4></div>
			</div>
		</div>
	</div>
	<div class="section" id="s2">
		<div id="scaleS2">
			<div id="cenS2">
				<div class="s2" id="s2Cont">
					<h1>IOT System</h1>
					<h2>To control somewhere you want</h2>
					<h2>To sense something you need</h2>
					<br>
					<h1>Machine Learning</h1>
					<h2>To analyze and find out a hole big picture</h2>
				</div>
				<div class="s2">
					<div style="display: none;" id="s2Pic"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="section" id="s3">
		<div id="scaleS3">
			<div id="opaHide">
				<div class="s3-txt" id="s3-1">ZYN</div>
				<div class="s3-txt" id="s3-2">IOT Solution</div>
				<div class="s3-txt" id="s3-3">You can mornitor all the sensor everywhere in your house!<br>Even can control your house anytime! </div>
			</div>
		</div>
	</div>
	<div class="section" id="s4">
		<div id="scaleS4">
			<div id="cenS5">
			<div id="nameS4">
				<h1 style="margin-bottom: 0px; margin-top: 0px;">Robotics</h1><br>
				<h3 style="margin-bottom: 0px; margin-top: 0px;">Robotics is a branch of engineering that involves the conception, design, manufacture, and operation of robots. This field overlaps with electronics, computer science, artificial intelligence, mechatronics, nanotechnology and bioengineering</h3>
			</div>
			<div id="icon1st">
				<div class="icon3"><i class="fa beColor fa-heart" aria-hidden="true"></i> Incredible</div>
				<div class="icon3"><i class="fa beColor fa-cog" aria-hidden="true"></i> Accurate</div>
				<div class="icon3"><i class="fa beColor fa-power-off" aria-hidden="true"></i> Powerful</div>
			</div>
			<div id="icon2nd">
				<div class="icon4"><i class="fa beColor fa-camera" aria-hidden="true"></i> Vision</div>
				<div class="icon4"><i class="fa beColor fa-signal" aria-hidden="true"></i> Communication</div>
				<div class="icon4"><i class="fa beColor fa-book" aria-hidden="true"></i> Logical</div>
			</div>
			</div>
		</div>
	</div>
	<div class="section" id="s5">
		<div id="scaleS5">
			<div id="nameS5">Let's discovery</div>
		</div>
	</div>
	<div id="scrollHome" style="display: none;"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>
</body>
</html>


<script type="text/javascript">
	$('html, body').animate({
		scrollTop: $("#s1").offset().top
	}, 10);

	$(document).ready(function(){
		// window.onscroll = function() {myFunction()};
		// function myFunction() {
		//     if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
		//     	// $('html, body').animate({
		// 	    //     scrollTop: $("#s3").offset().top
		// 	    // }, 1000);
		// 	    console.log("a");
		//     } else {
		//         console.log("b");
		//     }
		// }

	    // $('html, body').animate({
	    //     scrollTop: $("#s3").offset().top
	    // }, 1000);


	    $("#link").css("background-color", "");
		$(".linkCss").css("color", "white");
		

	    $(window).scroll(function() {
		    if ($(this).scrollTop() > $(document).height() - $(window).height() - 100)
		        $('#scrollHome').fadeIn();
		    else 
		        $('#scrollHome').fadeOut();

		    if($(this).scrollTop() > $("#s2").offset().top - 350){
		    	console.log("a");
		    	s2function();
		    }

		    if($(this).scrollTop() > $("#s1").offset().top){
		    	console.log("b");
		    	$("#link").css("background-color", "white");
		    	$(".linkCss").css("color", "black");
		    }
		    else{
		    	$("#link").css("background-color", "");
		    	$(".linkCss").css("color", "white");
		    }

		});
	   
		console.log($(document).height());
		console.log($(window).height());
		$('#scrollHome').click(function() {
		    $('html, body').animate({
		        scrollTop: 0
		    }, 800);
		    return false;
		});


		
		  var elem = document.getElementById("myInformation1");
		  $('#myInformation1').fadeIn(1500);
		  var pos_right = 0;
		  var id = setInterval(frame, 25);
		  function frame() {
		    if (pos_right == 18) {
		      clearInterval(id);
		    } else {
		      pos_right++; 
		      elem.style.right = pos_right + 'px'; 
		    }
		  }

		  var elem1 = document.getElementById("layoutPic");
		  $('#layoutPic').fadeIn(1500);
		  var pos_bot = 0;
		  var id1 = setInterval(frame1, 25);
		  function frame1() {
		    if (pos_bot == 18) {
		      clearInterval(id1);
		    } else {
		      pos_bot++;
		      elem1.style.bottom =  pos_bot + 'px'; 
		    }
		  }

			var elemS2 = document.getElementById("s2Pic");
			var pos_botS2Pic = 0;
		  function s2function(){
		  	$('#s2Pic').fadeIn(1800);
		  	var idS2Pic = setInterval(function(){
		  		if(pos_botS2Pic == 30)
		  			clearInterval(idS2Pic);
		  		else{
		  			pos_botS2Pic = pos_botS2Pic + 0.5;
		  			elemS2.style.bottom = pos_botS2Pic + 'px';
		  			console.log(pos_botS2Pic);
		  		}

		  	}, 55);
		  }
		  
		
	});
</script>