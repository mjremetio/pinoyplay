<?php
ob_start();
session_start();



//Create New Database Connection
	//$conn = mysqli_connect("localhost", "root", "", "geet");
	$conn = mysqli_connect("localhost", "root", "", "geet");

//Check Connection
if($conn->connect_error) {
	die("Connection Failed: ". $conn->connect_error);
}
?>