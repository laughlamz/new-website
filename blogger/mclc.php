<?php 
	require "../lib/dbCon.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/mclc.css"/>
</head>
</html>

<div class="blockTypeML" id="webML">
	<div class="typeML">Website</div>
	<?php
		$qr = mysqli_query($conn,"SELECT * FROM web ORDER BY id DESC LIMIT 2");
		while($qr1 = mysqli_fetch_array($qr)){
			echo "<div><a class='titML' href='website?mainp=web&idNews=".$qr1['id']."'>".$qr1['title']."</a></div>";
		}

	?>
</div>
<div class="blockTypeML" id="embedML">
	<div class="typeML">Embedded system</div>
	<?php
		$qr = mysqli_query($conn,"SELECT * FROM embed ORDER BY id DESC LIMIT 2");
		while($qr1 = mysqli_fetch_array($qr)){
			echo "<div><a class='titML' href='website?mainp=embed&idNews=".$qr1['id']."'>".$qr1['title']."</a></div>";
		}

	?>
</div>
<div class="blockTypeML" id="robotML">
	<div class="typeML">Robotics</div>
	<?php
		$qr = mysqli_query($conn,"SELECT * FROM robot ORDER BY id DESC LIMIT 2");
		while($qr1 = mysqli_fetch_array($qr)){
			echo "<div><a class='titML' href='website?mainp=robot&idNews=".$qr1['id']."'>".$qr1['title']."</a></div>";
		}

	?>
</div>
<div class="blockTypeML" id="mlearn">
	<div class="typeML">Machine Learning</div>
	<?php
		$qr = mysqli_query($conn,"SELECT * FROM mlearn ORDER BY id DESC LIMIT 2");
		while($qr1 = mysqli_fetch_array($qr)){
			echo "<div><a class='titML' href='website?mainp=mlearn&idNews=".$qr1['id']."'>".$qr1['title']."</a></div>";
		}

	?>
</div>