<?php
//Database connection for Gmail 
if(!isset($_SESSION)) {
session_start();
}
##### DB Configuration #####
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_pinoy";

##### Google App Configuration #####
//papalitan nalang po ng app id at app secret at redirect url
$googleappid = "334022851243-25gages4fcpfid1cmqv34gfhck2rm8kj.apps.googleusercontent.com"; 
$googleappsecret = "XV4bEO597epjQfCTEs5eAony"; 
$redirectURL = "http://localhost/updated_pinoyplayfinal/authenticate.php"; 

##### Create connection #####
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
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