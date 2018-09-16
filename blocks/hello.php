<?php
	if( isset($_POST["btnThoat"]) ){
		$Usr = $_SESSION["User"];
		mysqli_query($conn, "UPDATE users SET Last_log = NOW() WHERE User = '$Usr'");
		session_unset($_SESSION["User"]);
		header('Location: ../index.php');
		exit();
	}
	if( !isset($_SESSION["User"]) ){
		header('Location: ../index.php');
		exit();
	}
?>

<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/hello.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_hello.css"/>
</head>
<body>
		<div id="infoAcc">
			<div id="statusConn"></div>
		</div>
		<div id="thoat">
			<span class="CLASSprofile" id="profile" onclick="toggleProfile()">
				<img id="picUser" src="img/iTop.png" alt="user-img" class="img-profile">
			</span>				
		</div>
		<div class="CLASSmorepf" id="IDmorepf">
			<div class="profileAcc" id="xinchao">Hi, <?php echo $_SESSION["User"]; ?></div>
			<span class="profileAcc" id="VbtnStyle">Style</span>
			<a class="profileAcc" href="#" id="setAcc">Setting</a>
			<div id="lineAcc"></div>
			<form action="#" method="POST">
				<input class="profileAcc" id="btnThoat" type="submit" name="btnThoat" value="Logout"/>
			</form>
		</div>	
</body>
</html>

<script type="text/javascript">
	setInterval(function(){ getUpConn(); }, 1000);       //Act Device 1
	function getUpConn()
	{
		$.ajax({
		  url: 'blocks/update_connect.php',
		  type: 'post',
		  success: function(data) {
		    $('#statusConn').html(data);
		    // console.log(data);
		  }
		});
	}
</script>



<script>
function toggleProfile() {
    var x = document.getElementById("IDmorepf");
    if (x.className === "CLASSmorepf") {
        x.className += " responsive";
    } else {
        x.className = "CLASSmorepf";
    }

    var x = document.getElementById("profile");
    if (x.className === "CLASSprofile") {
        x.className += " responsive";
    } else {
        x.className = "CLASSprofile";
    }
}



window.onclick = function(event) {
  if (!event.target.matches('#picUser')) {
  	console.log("not click button out");

    var dropdowns = document.getElementsByClassName("CLASSmorepf");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('responsive')) {
        openDropdown.classList.remove('responsive');
      }
    }

    var dropdowns1 = document.getElementsByClassName("CLASSprofile");
    var i;
    for (i = 0; i < dropdowns1.length; i++) {
      var openDropdown1 = dropdowns1[i];
      if (openDropdown1.classList.contains('responsive')) {
        openDropdown1.classList.remove('responsive');
      }
    }



  }
}


</script>


<script type="text/javascript">
	// $(document).mouseup(function (e)
	// {
	//     var container = $("#IDmorepf");
	//     var container1 = $("#thoat"); 

	//     if (!container.is(e.target) && !container1.is(e.target)) // if the target of the click isn't the container...
	//     // ... nor a descendant of the container
	//     {
	//         var x = document.getElementById("IDmorepf");
	//         if (x.className === "CLASSmorepf") {}
	//         else{
	//         	x.className = "CLASSmorepf";
	//         }

	//         var x = document.getElementById("profile");
	//        	if (x.className === "CLASSprofile") {}
	//         else{
	//         	x.className = "CLASSprofile";
	//         }
	//     }
	// }); 
	// $("body").click(function(){
	// 	var x = document.getElementById("IDmorepf");
	//     if (x.className === "CLASSmorepf") {
	        
	//     }
	//     else {
	//         x.className = "CLASSmorepf";
	//     }

	//     var x = document.getElementById("profile");
	//     if (x.className === "CLASSprofile") {
	        
	//     } 
	//     else {
	//         x.className = "CLASSprofile";
	//     }
	// });

	// Prevent events from getting pass .popup
	// $(".popup").click(function(e){
	// 	e.stopPropagation();
	// });
</script>