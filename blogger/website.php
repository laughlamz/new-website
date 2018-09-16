<?php
	require "../lib/dbCon.php";
	ob_start();

	if( isset($_GET["mainp"]) ){
		$mainp = $_GET["mainp"];
	}
	else
		$mainp = "abc";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blogger</title>
	<link rel="shortcut icon" href="/img/favicon1.png"> 
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" href="/css/normalize.css"/>
	<link rel="stylesheet" href="/css/website.css"/>
	<link href="https://fonts.googleapis.com/css?family=Montserrat|PT+Sans+Caption|Raleway|Source+Sans+Pro|Poppins" rel="stylesheet">
</head>
<body>
	<div id="menuTop">
		<a class="menuTop" style="padding-left: 10px;background: linear-gradient(90deg, #606c88 10%, #3f4c6b 10%);" href="/blogger/website">Home</a>
		<a class="menuTop" href="?mainp=webml">Website</a>
		<a class="menuTop" href="?mainp=embedml">Embedded</a>
		<a class="menuTop" href="?mainp=robotml">Robotics</a>
		<a class="menuTop" href="?mainp=mlearnml">Machine Learning</a>
	</div>
	<div id="wrapper">	
		<div id="col">
			<div id="col1">
			<?php
				if($mainp == "abc" )
					require "introBlog.php";
				else
					require "mclc.php";
			?>	
			</div>
			<div id="col2">		

				<?php
					switch ($mainp) {
						case 'webml':
							require "webml.php";
							break;
						case 'web':
							require "web.php";
							break;
						case 'embedml':
							require "embedml.php";
							break;
						case 'embed':
							require "embed.php";
							break;
						case 'robotml':
							require "robotml.php";
							break;
						case 'robot':
							require "robot.php";
							break;
						case 'mlearnml':
							require "mlearnml.php";
							break;
						case 'mlearn':
							require "mlearn.php";
							break;
						
						default:
							require "mclc.php";
							break;
					}
					
				?>
			</div>
		</div>
	</div>
</body>
</html>