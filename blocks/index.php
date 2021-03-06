<!DOCTYPE html>
<html>
<head>
	<title>Laugh Lâm</title>
	<link rel="shortcut icon" href="img/favicon1.png"> 
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" href="css/index.css"/>	
	<link rel="stylesheet" href="css/normalize.css"/>
	<link rel="stylesheet" href="css/about.css"/>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|PT+Sans+Caption|Raleway|Source+Sans+Pro|Poppins" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
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
		
	    var anime1, anime2 = 0;
	    $(window).scroll(function() {
		    if ($(this).scrollTop() > $(document).height() - $(window).height() - 600)
		        $('#scrollHome').fadeIn();
		    else 
		        $('#scrollHome').fadeOut();
		

		    if($(this).scrollTop() > $("#s2").offset().top - 350){
		    	if(anime1 == 0) {
		    		$('#s2').addClass('flyUp');
		    		anime1 = 1;
		    	}

		    }
		    if($(this).scrollTop() > $("#s4").offset().top - 350){
		    	if(anime2 == 0)
		    		posRb();
		    	anime2 = 1;
		    }
		    

		    if($(this).scrollTop() > $("#s1").offset().top){
		    	$("#link").css("background-color", "white");
		    	$(".linkCss").css("color", "black");
		    	$("#about").css("border-bottom", "2px solid black");
		    }
		    else{
		    	$("#link").css("background-color", "");
		    	$(".linkCss").css("color", "white");
		    	$("#about").css("border-bottom", "2px solid white");
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
		  	
		  	var elemLeftRb = document.getElementById('rb1');
		  	var elemRightRb = document.getElementById('rb2');
		  	var leftRb = 120;
		  	var rightRb = 120;
		  	function posRb() {
		  		$('#rb1').fadeIn(2000);
		  		var rb1 = setInterval(function() {
		  			if(leftRb == 200)
		  				clearInterval(rb1);
		  			else {
		  				leftRb++;
		  				elemLeftRb.style.left = leftRb + 'px';
		  			}
		  		}, 15);

		  		$('#rb2').fadeIn(2000);
		  		var rb2 = setInterval(function() {
		  			if(rightRb == 200)
		  				clearInterval(rb2);
		  			else {
		  				rightRb++;
		  				elemRightRb.style.right = rightRb + 'px';
		  			}
		  		}, 15);
		  	}

		  	





		var curImgValue = 1;
		var maxImg = 9;
		$("#ne").click(function(){
			if(curImgValue<maxImg)
		  		curImgValue++;
		  	if(curImgValue == maxImg)
		  		curImgValue = 1;
		  	src = chooseSrc(curImgValue);
		  	$("#curImg").fadeOut(10,function(){
		  		$("#curImg").attr("src",src).fadeIn(500);
		  	});

			$(".dot").each(function(){
				dotSrc = $(this).attr("p");
				if(curImgValue == dotSrc)
					$(this).css("background-color","gray");
				else
					$(this).css("background-color","lightgray");
			});
		});
		$("#pr").click(function(){
			if(curImgValue>0)
		  		curImgValue--;
		  	if(curImgValue == 0)
		  		curImgValue = 8;
		  	src = chooseSrc(curImgValue);
		  	$("#curImg").fadeOut(100,function(){
		  		$("#curImg").attr("src",src).fadeIn(500);
		  	});

			$(".dot").each(function(){
				dotSrc = $(this).attr("p");
				if(curImgValue == dotSrc)
					$(this).css("background-color","gray");
				else
					$(this).css("background-color","lightgray");
			});
		});
		

		$(".dot").click(function(){
			curImgValue = $(this).attr("p");
			src = chooseSrc(parseInt(curImgValue));
			$("#curImg").fadeOut(100,function(){
		  		$("#curImg").attr("src",src).fadeIn(500);
		  	});

		  	$(".dot").each(function(){
				dotSrc = $(this).attr("p");
				if(curImgValue == dotSrc)
					$(this).css("background-color","gray");
				else
					$(this).css("background-color","lightgray");
			});
		});



		function chooseSrc(curImgValue){
			var src;
			switch(curImgValue){
	  		case 1:
	  		{	src ="img/img/1.jpg"; break;	}
	  		case 2:
	  		{	src ="img/img/2.jpg"; break;	}
	  		case 3:
	  		{	src ="img/img/3.jpg"; break;	}
	  		case 4:
	  		{	src ="img/img/4.jpg"; break;	}
	  		case 5:
	  		{	src ="img/img/5.jpg"; break;	}
	  		case 6:
	  		{	src ="img/img/6.jpg"; break;	}
	  		case 7:
	  		{	src ="img/img/7.jpg"; break;	}
	  		case 8:
	  		{	src ="img/img/8.jpg"; break;	}
	  		default:
	  			break;
	  		}
	  		return src;
		}
	});
</script>