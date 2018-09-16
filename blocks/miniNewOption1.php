<!DOCTYPE html>
<html>
<head>
	<title>Option Mini 1</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div style="background-color: pink;">Here is Option Mini 1</div>
	<div id="inOpMi1">
		
	</div>
</body>
</html>

<script type="text/javascript">
	clearInterval(c);

	var dem3 = 0;
	
	function myFunction3(){
		var x = document.getElementById("inOpMi1");
		dem3++;
		x.innerHTML = dem3;
	}


	var c = setInterval(myFunction3, 1000);
</script>