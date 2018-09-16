<?php
	require "../lib/dbCon.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/generalTwo.css"/>
</head>
</html>

<?php
	$qr = mysqli_query($conn,"SELECT * FROM robot ORDER BY id DESC");
	while($qr1 = mysqli_fetch_array($qr)){	
		echo "<div class='blockEach'>";
		echo "<a id='title' href='website?mainp=robot&idNews=".$qr1['id']."'>".$qr1['title']."</a>";
		echo "<div id='time'>".$qr1['time']."</div>";
		echo "<div id='sum'>".$qr1['summary']."</div>";	
		echo "</div>";
	}
?>
