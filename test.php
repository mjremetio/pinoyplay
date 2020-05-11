<?php
include("includes/includedFiles.php");

$query="SELECT oauth_pro FROM users WHERE email='".$_SESSION['userLoggedIn']."'";
$res=mysqli_query($con,$query);
if(mysqli_num_rows($res)>0){
	while ($row=mysqli_fetch_assoc($res)){
		echo $row['oauth_pro'];
	}
}else{
	echo "local user";
}
?>