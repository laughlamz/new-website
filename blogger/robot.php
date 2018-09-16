<?php
	require "../lib/dbCon.php";
	$qr = mysqli_query($conn,"SELECT * FROM robot ORDER BY id DESC");
	$qr1 = mysqli_fetch_array($qr);

	if( isset($_GET["idNews"]) ){
		$idNews = $_GET["idNews"];
	}
	else
		$idNews = 1;

	if($idNews >= $qr1['id'] || $idNews < 1)
		$idNews = $qr1['id'];

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/generalOne.css">
</head>
</html>

<?php
	$qr = mysqli_query($conn,"SELECT * FROM robot WHERE id = $idNews");
	$qr1 = mysqli_fetch_array($qr);	
		echo "<div id='title'>".$qr1['title']."</div>";
		echo "<div id='time'>".$qr1['time']."</div>";
		echo "<div id='content'>".$qr1['content']."</div>";
?>

