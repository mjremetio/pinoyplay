<?php
include("config.php");

$idd=$_GET['id'];

function sanitizePath($inputText) {
	$inputText = str_replace("assets/music/", "", $inputText);
	return $inputText;
}

	$query="SELECT * FROM `songs` where id='$idd'";
	$res=$conn->query($query);

if (mysqli_num_rows($res) > 0) {

	while($row = mysqli_fetch_assoc($res)) {
		$path=$row['path'];
	}
    $cleanPath=sanitizePath($path);

	$queryy="DELETE FROM songs WHERE id='$idd'";
	$ress=$conn->query($queryy);

	if($ress==TRUE){
		
		if (!unlink("../assets/music/".$cleanPath)){
			echo "SONG FAILED TO delete !! ";
		}else{
		echo "SONG SUCCESSFULLY delete !! ";
		}
		
	}
}
	header("location:deleteform.php");

?>