<!DOCTYPE html>
<html>
<head>
	<title>Option Mini 2</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div style="background-color: pink;">Here is Option Mini 2</div>
	<div id="inOpMi2">
		
	</div>
</body>
</html>

<script type="text/javascript">
	clearInterval(d);

	var dem4 = 0;
	
	function myFunction4(){
		var x = document.getElementById("inOpMi2");
		dem4++;
		x.innerHTML = dem4;
	}


	var d = setInterval(myFunction4, 1000);
</script>