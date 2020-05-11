<?php

if(isset($_POST['loginButton'])) {
	//Login button was pressed

    $email = $_POST['loginEmail'];
	$password = $_POST['loginPassword'];

	
   
    
		    $result = $account->login($email, $password);	
		    if($result == true) {
		    $_SESSION['userLoggedIn'] = $email;
		    header("Location: index.php");
	        }
		
		
	
   
    
    
    
    
}


//if(isset($_POST['loginButton'])) {
//	//Login button was pressed
//	$email = $_POST['loginEmail'];
//	$password = $_POST['loginPassword'];
//
  //  $sql = "SELECT status FROM users WHERE email='$email' AND password='$password'";
	//$res = mysqli_query($con,$sql);

//    	if (mysqli_num_rows($res) > 0) {
//    		while($row = mysqli_fetch_assoc($res)) {
 //   			$stats=$row['status'];
 //   			
 //   			 if($stats=="verified"){
  //  	$result = $account->login($email, $password);

//    	if($result == true) {
  //  		$_SESSION['userLoggedIn'] = $email;
    //		header("Location: index.php");
//    	}
  //  }
    //if($stats='not verified'){
//    else{
  //          $_SESSION['error'] = "error";
    //		header("Location: index.php");
//    }
  //  		}
    	
    //	}

   
//}


?>



