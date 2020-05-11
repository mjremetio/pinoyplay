<?php

	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Asia/Taipei");
	// $connect = new PDO('mysql:host=mysql.hostinger.ph;dbname=u253264078_geet', 'u253264078_root', 'bcqrr2018');
		$connect = new PDO('mysql:host=localhost;dbname=geet', 'root', '');
	// $con = mysqli_connect("mysql.hostinger.ph", "u253264078_root", "bcqrr2018", "u253264078_geet");
	$con = mysqli_connect("localhost", "root", "", "geet");

if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
$googleappid = "334022851243-25gages4fcpfid1cmqv34gfhck2rm8kj.apps.googleusercontent.com"; 
$googleappsecret = "aaqjoIsrWnlgLEWwdc2Asn8K"; 
$redirectURL = "https://pinoyplay.online/authenticate.php"; 
##### Required Library #####
include_once 'src/Google/Google_Client.php';
include_once 'src/Google/contrib/Google_Oauth2Service.php';

$googleClient = new Google_Client();
$googleClient->setApplicationName('LoginwithGoogle');
$googleClient->setClientId($googleappid);
$googleClient->setClientSecret($googleappsecret);
$googleClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($googleClient);

?>