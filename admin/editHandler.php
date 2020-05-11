<?php
include("config.php");

$idd=$_GET['id'];


if(isset($_POST['editArtist'])) {
//if submit button was pressed
	$newTitle = $_POST['changeTitle'];
	$newDuration = $_POST['changeDuration'];
	$newAlbumOrder = $_POST['changeAlOrder'];
	$newPlays = $_POST['changePlays'];


	$query = mysqli_query($conn,"UPDATE  songs SET title='$newTitle' ,duration='$newDuration' ,albumOrder='$newAlbumOrder' ,plays='$newPlays' WHERE id='$idd' ");

	header("location:editform.php");
}
?>