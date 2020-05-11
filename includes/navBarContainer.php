 <link rel="stylesheet" href="assets\font-awesome-4.7.0\css\font-awesome.min.css">
<div id="navBarContainer">
	<nav class="navBar">

		<!-- ETO YUNG START NG PICTURE-->
		<span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
			<?php
			//gumawa ako ng function named getProfilePic 
			//eto sa baba yung nagpapalabas ng picture from database
			echo '<img src="assets/images/profile-pics/'.basename( $userLoggedIn->getProfilePic() ).'"/>';
			?>
			
		</span>
	

			

		<div class="navItemuser">
			<?php

				$query="SELECT oauth_pro FROM users WHERE email='".$_SESSION['userLoggedIn']."'";
				$res=mysqli_query($con,$query);
				if(mysqli_num_rows($res)>0){
					while ($row=mysqli_fetch_assoc($res)){
						$userss="google";
						if($userss==$row['oauth_pro']){
							//header("location:settings2.php");
							?>
				<span role="link" tabindex="0"  class="navItemLinkname" ><i class="ion contacts"></i><?php echo $userLoggedIn->getFirstName(); ?>
				</span>					
							<?php
						}else{
							?>

				<span role="link" tabindex="0"  class="navItemLinkname"><i class="fa fa-user-circle-o" aria-hidden="true">   </i><?php echo $userLoggedIn->getFirstName(); ?>
				</span>
							<?php
						}
					}
				}
				?>

			</div>


		<div class="group">


			<div class="navItem">
				<span role='link' tabindex='0' 
					onclick="openPage('search.php')" class="navItemLink">
					<i class="fa fa-search fa-1x" aria-hidden="true"></i>  Search
					
				</span>

			</div>

		</div>

		<div class="group">
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink"><i class="fa fa-folder-open"></i> Browse Albums
				</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">
				<i class="fa fa-music" aria-hidden="true"></i> My Playlists
				</span>
			</div>
<hr>
<div class="navItem">
			<?php

				$query="SELECT oauth_pro FROM users WHERE email='".$_SESSION['userLoggedIn']."'";
				$res=mysqli_query($con,$query);
				if(mysqli_num_rows($res)>0){
					while ($row=mysqli_fetch_assoc($res)){
						$userss="google";
						if($userss==$row['oauth_pro']){
							//header("location:settings2.php");
							?>
				<span role="link" tabindex="0" onclick="openPage('settings2.php')" class="navItemLink" ><i class="fa fa-cog" aria-hidden="true"></i> Settings
				</span>					
							<?php
						}else{
							?>

				<span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><i class="fa fa-cog" aria-hidden="true"></i> Settings
				</span>
							<?php
						}
					}
				}
				?>

			</div>


<div class="navItem">
	<i class="fa fa-sign-out" aria-hidden="true"> </i>
				<span role="link" tabindex="0" onclick="logoutconfirm()" class="navItemLink">Logout
				</span>
			</div>

	
			
<div class="navItem">

				<h4 style="text-align:center;">"<a><?php echo $userLoggedIn->getQuote(); ?></a>"</h4>
			

			</div>
	</nav>
</div>

<script>
function logoutconfirm() {
    var msg;
    if (confirm("Are you sure you want to\nlogout?")) {
       logout()
    } else {
        
    }
   
}
</script>