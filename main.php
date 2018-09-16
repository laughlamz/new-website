<?php
	require "lib/dbCon.php";
	session_start();
	ob_start();
	
	if( isset($_GET["page"]) ){
		$page = $_GET["page"];
	}
	else
		$page = 1;
?>
<!DOCTYPE>
<html>
<head>
	<title>Laugh Zyn</title>
	<link rel="shortcut icon" href="img/favicon1.png"> 
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" href="css/normalize.css"/> <!-- Reset CSS -->
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_main.css"/>	
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
		<div id="topbar">
			<div id="leftbar">
				
			</div>
			<div id="leftbar1">
				<div id="infoCurPage">
					<span id="leftNav" onclick="toggleNav()">&#9776;</span>
					<div id="txtCurPage">
					<?php
						if($page == 1)
							echo "Realtime";
						else if($page == 2)
							echo "Report";
						else if($page == 3)
							echo "Device";
						else if($page == 4)
							echo "Message";
						else if($page == 5 || $page == 6 || $page == 7)
							echo "Admin";
						else if($page == 8)
							echo "RealtimeT";
						else if($page == 9)
							echo "DeviceT";	
						else if($page == 10)
							echo "Up MySQL";
						else if($page == 11)
							echo "ReportT";
						else if($page == 12)
							echo "Up sqlT";	
					?>
					</div>
					<!-- <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a> -->
				</div>
			</div>
			<div id="rightbar">
				<?php require "blocks/hello.php"; ?>
			</div>
		</div>
		<div class="CLASSleftmenu" id="IDleftmenu">
		<div id="leftmenu">
			<?php require "blocks/menu.php"; ?>
		</div>
		</div>
		<div class="CLASScontentpage" id="IDcontentpage">
		<div id="contentpage">
			<?php
				if($page == 1)
					require "blocks/dashboard_realtime.php";
				else if($page == 2)
					require "blocks/dashboard_report.php";
				else if($page == 3)
					require "blocks/control_device.php";
				else if($page == 4)
					require "blocks/log_history.php";
				else if($page == 5)
					require "blocks/admin_account.php";
				else if($page == 6)
					require "blocks/admin_adduser.php";
				else if($page == 7)
					require "blocks/edit_acc.php";
				else if($page == 8)
					require "blocks/Trang/dashboard_realtime.php";
				else if($page == 9)
					require "blocks/Trang/control_device.php";
				else if($page == 10)
					require "blocks/upgrade_database.php";
				else if($page == 11)
					require "blocks/Trang/dashboard_report.php";
				else if($page == 12)
					require "blocks/Trang/upgrade_database.php";
			?>
			<div id="contentfoot">
				<footer class="footer"> Laugh Lâm ©2018 For the IOT Family. All Rights Reserved. </footer>
			</div>
  			<div class="clear"></div>
		</div>
		</div>
	</div>
</body>
</html>

<!-- <script type="text/javascript">
	$(function() {
	  var menuVisible = false;
	  $('#leftbar').click(function() {
	    if (menuVisible) {
	      $('#leftmenu').css({'display':'none'});
	      menuVisible = false;
	      return;
	    }
	    $('#leftmenu').css({'display':'block'});
	    menuVisible = true;
	  });
	  $('#leftmenu').click(function() {
	    $(this).css({'display':'none'});
	    menuVisible = false;
	  });
	});
</script> -->

<!-- <script type="text/javascript">
	function toggleNav() {
		var x = document.getElementById("contentpage");
	    if(x.style.paddingLeft === "0px"){
	      document.getElementById("contentpage").style.paddingLeft = "50px";
	      document.getElementById("leftmenu").style.display = "block";
	    }
	    else{
	      document.getElementById("contentpage").style.paddingLeft = "0px";
	      document.getElementById("leftmenu").style.display= "none";    
	    }
	}
</script> -->

<script>
function toggleNav() {
    var x = document.getElementById("IDleftmenu");
    if (x.className === "CLASSleftmenu") {
        x.className += " responsive";
    } else {
        x.className = "CLASSleftmenu";
    }

    var y = document.getElementById("IDcontentpage");
    if (y.className === "CLASScontentpage") {
        y.className += " responsive";
    } else {
        y.className = "CLASScontentpage";
    }

	if( $('.navSon').is('.opened') ){
		$(this).find(".fa-caret-up").show();
		$(this).find(".fa-caret-down").hide();
	}
	else{
		$(this).find(".fa-caret-up").hide();
		$(this).find(".fa-caret-down").show();
	}
}
</script>