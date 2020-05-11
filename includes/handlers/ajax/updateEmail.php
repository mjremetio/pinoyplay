<?php
include("../../config.php");
if(!isset($_SESSION['userLoggedIn'])) {
	echo "ERROR: Could not find User ID";
	exit();

}


if(isset($_POST['email']) && $_POST['email'] != "") {
	$usermail = $_SESSION['userLoggedIn'];
	$email = $_POST['email'];

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Email is invalid";
		exit();
	}

	$emailCheck = mysqli_query($con, "SELECT email FROM users WHERE email = '$email' AND email != '$usermail'");
	if(mysqli_num_rows($emailCheck) > 0) {
		echo "Email is already in use";
		exit();
	}

	$updateQuery = mysqli_query($con, "UPDATE users SET email = '$email' WHERE email = '$usermail'");
	echo "Update successful";
}
else {
	echo "You must provide an email";
}

$_SESSION['userLoggedIn'] = $email;

?>