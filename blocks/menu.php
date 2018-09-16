<?php
//1
//2	idReport
//3	idDevice
//4	idMessage
//5 idAdmin
//6
	$UserPms = $_SESSION["User"];
	$qrPms = "
		SELECT * FROM users WHERE User = '$UserPms'
	";
	$qrPms1 = mysqli_query($conn, $qrPms);
	$qrPms2 = mysqli_fetch_array($qrPms1);
	// echo $qrPms2['idGroup'];
	if( ($qrPms2['idMessage']==0 && $page==4) || ($qrPms2['idAdmin']==0 && ($page==5||$page==6||$page==7)) || ($qrPms2['idTDevice']==0 && ($page==9)) || ($qrPms2['idDevice']==0 && $page==3) || ($qrPms2['idTRealtime']==0 && ($page==8)) || ($qrPms2['idReport']==0 && ($page==2||$page==10)) || ($qrPms2['idTReport']==0 && ($page==11||$page==12)) )
	{														  
		header('Location: ../main.php');
		exit();
	}
?>

<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/menu.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_menu.css"/>
<!-- 	<script type="text/javascript">
		$(document).ready(function(){
			$(".con").show();
			$(".cha").click(function(){
				$(this).next().slideToggle();
			});
		});
	</script> -->
</head>
<body>

	<div id="bgMenu">
		<!-- <img width="100%" height="100%" src="img/imenu.png"> -->
	</div>
	<img id='ilogo' src='img/logo.png'/>
	<img id='ilogo1' src='img/iTop31.png'/>
	<div id="fiMenu">Menu</div>

	<div id="scrollMenu">

	<ul class="nagivation">
		<div class="navFather"><img class='iconMenu' src='img/dashboard.png'/><div class='txtMenu'>Dashboard</div><i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></div>
		<div class="navSon">
			<li><a class="link liDash" href="main.php?page=1"><div class="txtDashMenu"><div class="txtloMenu">ZRealtime</div><div class="txtshMenu">Zyn</div></div></a></li>
		<?php
			if($qrPms2['idTRealtime']==1)
				echo "<li><a class='link liDash' href='main.php?page=8'><div class='txtDashMenu'><div class='txtloMenu'>TRealtime</div><div class='txtshMenu'>Mie</div></div></a></li>";
			echo "</div>";

			if($qrPms2['idDevice']==1 || $qrPms2['idTDevice']==1){
				echo "<div class='navFather'><img class='iconMenu' src='img/switch.png'/><div class='txtMenu'>Device</div><i class='fas fa-caret-down'></i><i class='fas fa-caret-up'></i></div>";
				echo "<div class='navSon'>";
				if($qrPms2['idDevice']==1)
					echo "<li><a class='link liDash' href='main.php?page=3'><div class='txtDashMenu'><div class='txtloMenu'>ZDevice</div><div class='txtshMenu'>Zyn</div></div></a></li>";
				if($qrPms2['idTDevice']==1)
					echo "<li><a class='link liDash' href='main.php?page=9'><div class='txtDashMenu'><div class='txtloMenu'>TDevice</div><div class='txtshMenu'>Mie</div></div></a></li>";
				echo "</div>";
			}
			if($qrPms2['idReport']==1)
				echo "<li><a class='link' href='main.php?page=2'><img class='iconMenu' src='img/anal.png'/><div class='txtMenu'>Report</div></a></li>";
			if($qrPms2['idTReport']==1)
				echo "<li><a class='link' href='main.php?page=11'><img class='iconMenu' src='img/anal.png'/><div class='txtMenu'>TReport</div></a></li>";
			if($qrPms2['idMessage']==1)
				echo "<li><a class='link' href='main.php?page=4'><img class='iconMenu' src='img/email.png'/><div class='txtMenu'>Message</div></a></li>";
			if($qrPms2['idAdmin']==1)
				echo "<li><a class='link' href='main.php?page=5'><img class='iconMenu' src='img/user2.png'/><div class='txtMenu'>Account</div></a></li>";
		?>
	</ul>
	</div>
</body>
</html>


<!-- <script>
function toggleNav() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script> -->



<script type="text/javascript">
$(document).ready(function(){
	$(".navFather").click(function(){

		$(this).next().slideToggle();
		$(this).next().toggleClass('opened');

	    var isVisible = $(this).next().is(".opened");
	    if (isVisible === true ){
	        $(this).find(".fa-caret-down").hide();
			$(this).find(".fa-caret-up").show();
	    }
	    else {
	        $(this).find(".fa-caret-down").show();
			$(this).find(".fa-caret-up").hide();       
	    }  
	});


	$(function(){
    // this will get the full URL at the address bar
	    var url = window.location.href; 
	    console.log(url);
	    // passes on every "a" tag 
	    $(".link").each(function() {
	            // checks if its the same on the address bar
	        if(url == (this.href)) {

	        	console.log(url);
	            $(this).closest("li").addClass("active");
	            $(this).closest(".navSon").slideToggle();
	            $(this).closest(".navSon").toggleClass('opened');

 				// e.stopPropagation();
    			// e.preventDefault();

	           	var isVisible = $(this).closest(".navSon").is(".opened");
			    if (isVisible === true ){
			        $(this).closest(".navSon").prev().find(".fa-caret-down").hide();
					$(this).closest(".navSon").prev().find(".fa-caret-up").show();
			    }
			    else {
			        $(this).closest(".navSon").prev().find(".fa-caret-down").show();
					$(this).closest(".navSon").prev().find(".fa-caret-up").hide();       
			    } 
	        }
	    });
	});



});
</script>
