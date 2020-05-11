<?php 
require_once 'includes/config.php';


//Google API Validation
if(isset($_GET['code'])){
	$googleClient->authenticate($_GET['code']);
	$_SESSION['token'] = $googleClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}
############ Set Google access token ############
if (isset($_SESSION['token'])) {
	$googleClient->setAccessToken($_SESSION['token']);
}


if ($googleClient->getAccessToken()) {
	############ Fetch data from graph api  ############
	try {
		$gpUserProfile = $google_oauthV2->userinfo->get();
	}
	catch (\Exception $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		header("Location: ./");
		exit;
	}
	############ Store data in database  ############
	$oauthpro = "google";
	$oauthid = $gpUserProfile['id'] ?? '';
	$f_name = $gpUserProfile['given_name'] ?? '';
	$l_name = $gpUserProfile['family_name'];
	$email_id = $gpUserProfile['email'] ?? '';
	$locale = $gpUserProfile['locale'] ?? '';
	$cover = '';
	$picture = "Gmail.png";
	$url = $gpUserProfile['link'] ?? '';
	$sql = "SELECT * FROM users WHERE email='$email_id' or oauthid='".$gpUserProfile['id']."'";
	$result = $con->query($sql);
	if ($result->num_rows == 1) {
	     	header('location: register.php');
	   
	} else {
	    mysqli_query($con,"INSERT INTO users VALUES ('','$f_name', '$l_name', '$email_id','','','$picture','Gmail User','verified','','$oauthpro', '$oauthid','$locale', '$cover', '$url')"); 
		    
	

	}
	$res = $con->query($sql);
	$userData = $res->fetch_assoc();
	$_SESSION['userData'] = $userData;

	if(isset($_SESSION['userData'])){ 
		if($_SESSION['userData']==true){
		$_SESSION['userLoggedIn'] = $email_id;
 		header('location: index.php');
		}
} 
}
	 else {
	header("Location:/");
}


?>