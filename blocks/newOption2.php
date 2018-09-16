<!DOCTYPE html>
<html>
<head>
	<title>Option 2</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div style="background-color: pink;">Here is Option 2</div>
	<div id="inOp2">
		
	</div>
</body>
</html>

<script type="text/javascript">
	clearInterval(b);

	var dem2 = 0;
	
	function myFunction2(){
		var x = document.getElementById("inOp2");
		dem2++;
		x.innerHTML = dem2;
	}


	var b = setInterval(myFunction2, 1000);
</script>