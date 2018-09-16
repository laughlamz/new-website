<!DOCTYPE html>
<html>
<head>
	<title>Option 1</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div style="background-color: lightgray;">Here is Option 1</div>
	<div id="inOp1">
		
	</div>
	<div class="OpMi" id="OpMi1" navMiPage="3">Option Mini 1</div>
	<div class="OpMi" id="OpMi2" navMiPage="4">Option Mini 2</div>
	<div id="responeMini"></div>
</body>
</html>

<script type="text/javascript">
	clearInterval(a);

	var dem = 0;

	function myFunction(){
		var x = document.getElementById("inOp1");
		dem++;
		x.innerHTML = dem;
	}

	var a = setInterval(myFunction, 1000);


	$(".OpMi").click(function(){
		var navMiPage = $(this).attr('navMiPage');
		console.log(navMiPage);
		if(navMiPage == 3)
			$.ajax({
		      url: 'blocks/miniNewOption1.php',
		      type: 'POST',
		      success : function(data){
		      	$('#responeMini').html(data);
		      }
		    });
		else if(navMiPage == 4)
			$.ajax({
		      url: 'blocks/miniNewOption2.php',
		      type: 'POST',
		      success : function(data){
		      	$('#responeMini').html(data);
		      }
		    });
	});
</script>