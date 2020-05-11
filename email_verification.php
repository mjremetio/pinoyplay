<?php

include('includes/config.php');

$message = '';

if(isset($_GET['activation_code']))
{
	$query = "SELECT * FROM users WHERE user_activation_code ='".$_GET['activation_code']."' ";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':user_activation_code'=>$_GET['activation_code']
		)
	);
	$no_of_row = $statement->rowCount();
	
	if($no_of_row > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if($row['status'] == 'not verified')
			{
				$update_query = "UPDATE users SET status = 'verified' WHERE id = '".$row['id']."' ";
				$statement = $connect->prepare($update_query);
				$statement->execute();
				$sub_result = $statement->fetchAll();
				if(isset($sub_result))
				{
					 $sql = "SELECT * FROM users WHERE id ='".$row['id']."' ";
				      $result = $con->query($sql);
				      if($result->num_rows > 0) {
				        while($row = $result->fetch_assoc()) {
				          $email=$row['email'];

					$_SESSION['userLoggedIn'] = $email;

                    header("location: index.php");
				        }
				      }
				}
			}
			else
			{
				$message = '<label class="text-info">Your Email Address Already Verified</label>';
			}
		}
	}
	else
	{
		$message = '<label class="text-danger">Invalid Link</label>';
	}
}

?>