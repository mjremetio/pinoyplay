<?php
//register.php
use phpmailer;
include('include/config.php');
require 'phpmailer/PHPMailerAutoload.php';

$message = '';

if(isset($_POST["register"]))
{
	$query = "
	SELECT * FROM register_user 
	WHERE user_email = :user_email
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':user_email'	=>	$_POST['user_email']
		)
	);
	$no_of_row = $statement->rowCount();
	if($no_of_row > 0)
	{
		$message = '<label class="text-danger">Email Already Exits</label>';
	}
	else
	{
		$user_password = rand(100000,999999);
		$user_encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
		$user_activation_code = md5(rand());
		$insert_query = "
		INSERT INTO register_user 
		(user_name, user_email, user_password, user_activation_code, user_email_status) 
		VALUES (:user_name, :user_email, :user_password, :user_activation_code, :user_email_status)
		";
		$statement = $connect->prepare($insert_query);
		$statement->execute(
			array(
				':user_name'			=>	$_POST['user_name'],
				':user_email'			=>	$_POST['user_email'],
				':user_password'		=>	$user_encrypted_password,
				':user_activation_code'	=>	$user_activation_code,
				':user_email_status'	=>	'not verified'
			)
		);
        $result = $statement->fetchAll();
        
        if(isset($result))
        {
        $base_url = "https://pinoyplay.online/phpmailer/";
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'mx1.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'email@pinoyplay.online';
        $mail->Password = 'bcqrr2018';
        $mail->setFrom('email@pinoyplay.online', 'admin pinoy play');
        //$mail->addAddress('email@pinoyplay.online', 'admin pinoy play');
        $mail->AddAddress($_POST['user_email'], $_POST['user_name']); 
        if ($mail->addReplyTo($_POST['user_email'], $_POST['user_name'])) {
        $mail->Subject = 'Email Verification';
        $mail->isHTML(true);
        $mail->WordWrap = 50;  
        $mail_body = "
			<p>Hi ".$_POST['user_name'].",</p>
			<p>Thanks for Registration. Your password is ".$user_password.", This password will work only after your email verification.</p>
			<p>Please Open this link to verified your email address - ".$base_url."email_verification.php?activation_code=".$user_activation_code."
			<p>Best Regards,<br />Pinoy Play</p>
			";
        $mail->Body = $mail_body;
        if ($mail->send()) {
          $message = '<label class="text-success">Register Done, Please check your mail.</label>';
      
        } else {
          $message = '<label class="text-success">email not verified!</label>';
        }
        } else {
        $msg = 'Invalid email address, message ignored.';
        }

    }}}?>