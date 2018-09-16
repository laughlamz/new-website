<?php
	include('header/header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<link rel="stylesheet" href="css/blog.css"/>
</head>
<body>
	<div id="wrapperIndex">
		<div id="link">
			<a id="about" class="link linkCss" href="/">About</a>
			<a id="blog" class="link linkCss" style="border-bottom: 2px solid white;" href="blog">Blog</a>
			<a id="contact" class="link linkCss" href="contact">Contact</a>
			<a id="login1" class="link linkCss" href="login">Login</a>
		</div>
	<div id="responeAhref">
		<div class="sectionBlog" id="b1">
			<div id="scaleB1">
				<div id="nameB1">Blog</div>
				<div id="contentB1">The way i go</div>
			</div>
		</div>
		<div class="sectionBlog" id="b2">
			<div id="scaleB2">
				<div id="nameB2">Website</div>
			</div>
		</div>
		<div class="sectionBlog" id="b3">
			<div id="scaleB3">
				<div id="nameB3">Embedded system</div>
			</div>
		</div>
		<div class="sectionBlog" id="b4">
			<div id="scaleB4">
				<div id="nameB4">Robotics</div>
			</div>
		</div>
		<div class="sectionBlog" id="b5">
			<div id="scaleB5">
				<div id="nameB5">Machine Learning</div>
			</div>
		</div>
		<div class="sectionBlog" id="b6">
			<div id="scaleB6">
				<div id="nameB5">Do whatever you like and make money!</div>
				<a id="buttonB5" href="/blogger/website">Get blog now</a>
			</div>
		</div>
		<div id="scrollHome" style="display: none;"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>
	</div>
</body>
</html>


<script type="text/javascript">

	$(document).ready(function(){

	    $(window).scroll(function() {
			if ($(this).scrollTop() > $(document).height() - $(window).height() - 100)
		        $('#scrollHome').fadeIn();
		    else 
		        $('#scrollHome').fadeOut();

		    if($(this).scrollTop() > $("#b1").offset().top){
		    	console.log("c");
		    	$("#link").css("background-color", "white");
		    	$(".linkCss").css("color", "black");
		    	$("#blog").css("border-bottom", "2px solid black");
		    }
		    else{
		    	$("#link").css("background-color", "");
		    	$(".linkCss").css("color", "white");
		    	$("#blog").css("border-bottom", "2px solid white");
		    }

		});

		$('#scrollHome').click(function() {
		    $('html, body').animate({
		        scrollTop: 0
		    }, 800);
		    return false;
		});
		
		$('#contentB1').fadeIn(1000);

	});
</script>