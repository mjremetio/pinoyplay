<?php
	include("includes/config.php");
	include("includes/classes/User.php");
	include("includes/classes/Artist.php");
	include("includes/classes/Album.php");
	include("includes/classes/Song.php");
	include("includes/classes/Playlist.php");

//session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
	$email = $userLoggedIn->getEmail();
	echo "<script>userLoggedIn = '$email';</script>";
}
else {
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Pinoyplay! Tangkilikin ang sariling atin!</title>
	<link rel="icon" href="../assets/images/icons/play.png" type="image/x-icon"/>
	<link rel="shortcut icon" href="../assets/images/icons/play.png" type="image/x-icon"/>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/script.js"></script>
</head>

<body>

	<div id="mainContainer">

		<div id="topContainer">
	
			<?php include("includes/navBarContainer.php"); ?>

	

			<div id="mainViewContainer">
				
<div class="menue">
    <div class="container-fluid">
		<div class="naverbar-header">

		    
		       <p>
			 <img src="smalllogo.png" ></p>
			
		</div>
	</div>
</div>
		<div id="mainContent">
				
