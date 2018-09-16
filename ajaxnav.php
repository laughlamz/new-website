<!DOCTYPE html>
<html>
<head>
	<title>Test nhẹ</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<style>
	body, html {
    	height: 100%;
	}
	.section {        
    position:relative;
    z-index:1;
    height:500px;
    width:100%;
    background-attachment:fixed;    /* this keeps the background in place */
    background-position: center;
    background-size: cover;
    background-repeat:no-repeat;
	}
	.content {
	    position:relative;
	    z-index:2;
	    background-color:#fff;
	    border:2px solid #666;    
	    height:50%;    /* this height difference allows the bg to show through */    
	}
	.section#s1 {
	    background-image: url(/img/background1.png);  
	    height: 100%; 
	}
	.section#s2 {
	    background-image: url(/img/background2.png);
	}
	.section#s3 {  
	    background-image: url(/img/background3.png);
	}
	.section#s4 {    
	    background-image: url(/img/background8.png);
	}
	.section#s5 {    
	    background-image: url(/img/background9.png);
	}
	</style>
</head>
<body>
	<div id="link">
		<a href="p1.php" hrefName="about">page 1</a>
		<a href="p2.php" hrefName="contact">page 2</a>
	</div>
	<div id="page"></div>


	<div class="section" id="s1">

	</div>
	<div class="section" id="s2">

	</div>
	<div class="section" id="s3">
	    
	</div>
	<div class="section" id="s4">
	 
	</div>
	<div class="section" id="s5">
	   
	</div>
</body>
</html>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("a").click(function(event){
			link = $(this).attr("href");
			name = $(this).attr("hrefName");
			$.ajax({
				url: link,
			})
			.done(function(html){
				$("#page").empty().append(html);
				window.history.pushState(null, null, name);
			})
			return false;
		});
	});
</script>