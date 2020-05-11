<?php 
if(!isset($_SESSION)) {
session_start();
}
if(!isset($_SESSION['userData'])){
	//header('location: index.php');
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage </title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<div class="head_left">
			<h1>Claytonecille</h1>
		</div>
	</header>
	<p class="main_title">
		Welcome to Claytonecille Website<br/>
		
	</p>
	<section class="main">
		<div class="inner">	
			
			<div class="wthree_tab_content">
				<div class="wthree_tab_content_pos">
					<div class="wthree_tab_content_pos_grid">
						<img src="<?= $_SESSION['userData']['picture'] ?>" class="profile_pic" > 
						<br>
						<h2>Hello</h2>
						<h3>I'm <?= $_SESSION['userData']['f_name']." ".$_SESSION['userData']['l_name'] ?></h3>
						<h6>Visit <a class="clor" target="_blank" href="<?= $_SESSION['userData']['url'] ?>">Google+ Profile</a></h6>
						<ul class="address">
							<li>
								<ul class="address-text">
									<li><b>Email : </b></li>
									<li><?= $_SESSION['userData']['email_id'] ?></li>
								</ul>
							</li>
							<li>
								<ul class="address-text">
									<li><b>Locale : </b></li>
									<li><?= $_SESSION['userData']['locale'] ?></li>
								</ul>
							</li>
							<li>
								<ul class="address-text">
									<li><a class="clor" href="logout.php">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div> 
	
	</section>
	<footer>
		<div class="container">
								
		</div>
	</footer>
</body>
</html>