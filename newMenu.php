<!DOCTYPE>
<html>
<head>
	<title>Laugh Zyn</title>
	<link rel="shortcut icon" href="img/favicon1.png"> 
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" href="css/normalize.css"/> <!-- Reset CSS -->
	<link rel="stylesheet" type="text/css" href="css/newMenu.css"/>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|PT+Sans+Caption|Raleway|Source+Sans+Pro|Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<!-- <script src="https://code.highcharts.com/modules/series-label.js"></script> -->
	<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<!-- 	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->
</head>
<body>
	<div id="wrapper">
		<div class="Op" id="Op1" navPage="1"><a class='link liDash' hrefnew='/newMenu.php/newOption1'>Option1</a></div>
		<div class="Op" id="Op2" navPage="2"><a class='link liDash' hrefnew='/newMenu.php/newOption2'>Option2</a></div>
	</div>
	<div id="respone">Respone Here</div>
	

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
$(document).ready(function(){

	$(".link").click(function(e){
		var href = $(this).attr('hrefnew');
		
		console.log(href);

		window.location.href = href;
		e.preventDefault();

		if(href == "/newMenu.php/newOption1")
			$.ajax({
		      url: 'blocks/newOption1.php',
		      type: 'POST',
		      success : function(data){
		      	$('#respone').html(data);
		      	
		      }

		    });
		else if(href == "/newMenu.php/newOption2")
			$.ajax({
		      url: 'blocks/newOption2.php',
		      type: 'POST',
		      success : function(data){
		      	$('#respone').html(data);

		      }
		    });

		
	});

});
</script>







