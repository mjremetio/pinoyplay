<?php
include("includes/includedFiles.php");
?>

<div class="userDetails">
	<div class="container borderBottom">
		<h2>UPDATE EMAIL</h2>
		<input type="text" class="email" name="email" placeholder="Email address..." value="<?php echo $userLoggedIn->getEmail(); ?>">
		<span class="message"></span>
		<button class="buttonsave" onclick="updateEmail('email')">SAVE</button>
	</div>


		<div class="container borderBottom">
		<h2>UPDATE QUOTE</h2>
		<input type="text" class="quotes" name="quotes" placeholder="Your Fancy Quote here" value="<?php echo $userLoggedIn->getQuote(); ?>">
		<span class="message"></span>
		<button class="buttonsave" onclick="updateQuote('quotes')">SAVE</button>
	</div>

	<div class="container">
		<h2>UPDATE PASSWORD</h2>
		<input type="password" class="oldPassword " name="oldPassword" placeholder="Current password">
		<input type="password" class="newPassword1 " name="newPassword1" placeholder="New password">
		<input type="password" class="newPassword2 " name="newPassword2" placeholder="Confirm password">
		<span class="message"></span>
		<button class="buttonsave" onclick="updatePassword('oldPassword', 'newPassword1', 'newPassword2')">SAVE</button>
	</div>
</div>