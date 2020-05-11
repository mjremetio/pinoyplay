<?php
include("../../config.php");
if(!isset($_SESSION['userLoggedIn'])) {
	echo "ERROR: Could not find User Email";
	exit();

}


if(isset($_POST['quote']) && $_POST['quote'] != "") {
	$usermail = $_SESSION['userLoggedIn'];
	$quote = $_POST['quote'];


	$updateQuery = mysqli_query($con, "UPDATE users SET quote = '$quote' WHERE email = '$usermail'");

	echo "Update quote successful";

	echo "Result will appear after page refresh";

}
else {
	$updateQuery = mysqli_query($con, "UPDATE users SET quote = ' ' WHERE email = '$usermail'");
	echo "Update quote successful";

}

?>
