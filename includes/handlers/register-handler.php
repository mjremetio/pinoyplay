<?php 
//use phpmailer;
include("includes/src/phpmailer/class.phpmailer.php");
  include("includes/src/phpmailer/class.phpmaileroauth.php");
  include("includes/src/phpmailer/class.phpmaileroauthgoogle.php");
  include("includes/src/phpmailer/class.pop3.php");
  include("includes/src/phpmailer/class.smtp.php");

  require 'includes/src/phpmailer/PHPMailerAutoload.php';

function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}



function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}
function sanitizeFormName($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormQoute($inputText) {
	$inputText = strip_tags($inputText);

	return $inputText;
}


if(isset($_POST['registerButton'])) {
	//Register button was pressed
	$firstName = sanitizeFormName($_POST['firstName']);
	$lastName = sanitizeFormString($_POST['lastName']);
	$email = $_POST['email'];
	$email2 = $_POST['email2'];
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);
	$qoute = sanitizeFormQoute($_POST['qoute']);
	$user_activation_code = md5(rand());

	$image = $_FILES['image']['name'];

	$wasSuccessful = $account->register($firstName, $lastName, $email, $email2, $password, $password2,  $image, $qoute,$user_activation_code);

	$target = "assets/images/profile-pics/".basename($image);
		

		

	if($wasSuccessful == true) {
	   		 $base_url = "https://pinoyplay.online/";
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = 'mx1.hostinger.com';
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->Username = 'email@pinoyplay.online';
			$mail->Password = 'bcqrr2018';
			$mail->setFrom('email@pinoyplay.online', 'admin pinoy play');
        //$mail->addAddress('email@pinoyplay.online', 'admin pinoy play');
			$mail->AddAddress($_POST['email'], $_POST['firstName']); 
			if ($mail->addReplyTo($_POST['email'], $_POST['firstName'])) {
				$mail->Subject = 'Email Verification';
				$mail->isHTML(true);
				$mail->WordWrap = 50;  
				$mail_body = "
				<p>Hi ".$_POST['firstName'].",</p>
				<p>Thanks for Registration. Your password is ".$_POST['password'].", This Account will work only after your email verification.</p>
				<p>Please Open this link to verified your email address - ".$base_url."email_verification.php? activation_code=".$user_activation_code."
				<p>Best Regards,<br />Pinoy Play</p>
				";
				$mail->Body = $mail_body;
				if ($mail->send()) {
					//header("Location: registration_successful.php");
					  //echo '<script type=text/javascript>alert("Registration Submitted, Pls verify your email to activate your account")</script>';
					//$message = '<label class="text-success">Register Done, Please check your mail.</label>';
					echo '<script type=text/javascript>alert("Email has successfully sent!");</script>';

				} else {
			
					//$message = '<label class="text-success">email not verified!</label>';
					echo '<script type=text/javascript>alert("email not sent!");window.location.href="register.php";</script>';
				}
			} else {

				//$msg = 'Invalid email address, message ignored.';
					echo '<script type=text/javascript>alert("Invalid email address, message ignored.");window.location.href="register.php";</script>';
			}
	  		
	    	
	    


		$_SESSION['userLoggedIn'] = $email;
		//for uploading the pictures

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	  		echo '<script type=text/javascript>alert("image Uploaded")</script>';
	  	}else{
	  		echo '<script type=text/javascript>alert("Error Uploading Image")</script>';
	  	}
	  	
       echo '<script type=text/javascript>alert("Registration Submitted, Pls check your email to activate your account");window.location.href="register.php";</script>';
  
		//header("Location: register.php");
	}
}
?>