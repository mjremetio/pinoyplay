<?php
include("config.php");

    $idd=$_GET['id'];
	$query="DELETE FROM users WHERE id='$idd'";
	$res=$conn->query($query);

	if($res==TRUE){
		$_SESSION['notif']="notif";
		//echo'<script> alert("Delete Successful!"); </script>';
		header("location:accountform.php");
	}else{
		echo'<script> alert("Error occured!"); </script>';
	}

?>