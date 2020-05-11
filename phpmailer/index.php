<?php
//index.php
include('database_connection.php');

if(!isset($_SESSION["user_id"]))
{
	header("location:login.php");
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pinoy Play</title>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		<br />
		<br />
		<h1 align="center">Welcome to Pinoy Play </h1>
		
		<a href=#><h3 align="center">Get Started</h3></a>
		
		<h4 align="center"><a href="logout.php">Logout</a></h4>
	
	</body>
	
</html>

