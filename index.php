<?php
	include('header/header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laugh Lâm</title>
	<link rel="stylesheet" href="css/about.css"/>
</head>
<body>
	<div id="wrapperIndex">
		<div id="link">
			<a id="about" class="link linkCss" style="border-bottom: 2px solid white;" href="/">About</a>
			<a id="blog" class="link linkCss" href="blog">Blog</a>
			<a id="contact" class="link linkCss" href="contact">Contact</a>
			<a id="login1" class="link linkCss" href="login">Login</a>
		</div>
	<div id="responeAhref">
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
				<div id="rb1"></div>
				<div id="rb2"></div>
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
		<div class="section" id="s6">
			<div id="scaleS6">
				<div id="cenS6">
					<div id="nameS6">Life with a little ART</div>
					<div id="curEdgeImg1">
						<div id="pr">&#10094;</div>
						<div id="ne">&#10095;</div>
						<img id="curImg" src="img/img/1.jpg"/>
					</div>
					<div id="curEdgeImg2">
						<div class="dot" p="1"></div>
						<div class="dot" p="2"></div>
						<div class="dot" p="3"></div>
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
	</div>
</body>
</html>



<script type="text/javascript">

	$(document).ready(function(){
		
	    var anime1 = 0, anime2 = 0;
	    $(window).scroll(function() {
		    if ($(this).scrollTop() > $(document).height() - $(window).height() - 600)
		        $('#scrollHome').fadeIn();
		    else 
		        $('#scrollHome').fadeOut();
		

		    if($(this).scrollTop() > $("#s2").offset().top - 350) {
		    	if(anime1 == 0) {
		    		$("#s2Pic").addClass('flyUp').fadeIn();
		    		anime1 = 1;
		    	}

		    }
		    if($(this).scrollTop() > $("#s4").offset().top - 350) {
		    	if(anime2 == 0){
		    		$("#rb1").addClass('goLeft').fadeIn(1000);
		    		$("#rb2").addClass('goRight').fadeIn(1000);
		    		anime2 = 1;
		    	}
		    }
		    

		    if($(this).scrollTop() > $("#s1").offset().top) {
		    	$("#link").css("background-color", "white");
		    	$(".linkCss").css("color", "black");
		    	$("#about").css("border-bottom", "2px solid black");
		    }
		    else {
		    	$("#link").css("background-color", "");
		    	$(".linkCss").css("color", "white");
		    	$("#about").css("border-bottom", "2px solid white");
		    }

		});
	   
		// console.log($(document).height());
		// console.log($(window).height());

		$('#scrollHome').click(function() {
		    $('html, body').animate({
		        scrollTop: 0
		    }, 800);
		    return false;
		});

		$('#layoutPic').fadeIn();
		$('#myInformation1').fadeIn();
		
	});
</script>