
<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");
  include("includes/classes/User.php");

  $account = new Account($con);

  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");
  


  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
  
    //if(isset($_SESSION['error'])=="error"){
      //echo' <script> alert("PLEASE VERIFY YOUR EMAIL!") </script> ';
     // unset($_SESSION['error']);
  //}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pinoyplay Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/boot.min.js"></script>
  <link rel="stylesheet" type="text/css" href="front.css">
  <link rel="stylesheet" type="text/css" href="assets/video/videoplayer.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" href="assets\font-awesome-4.7.0\css\font-awesome.min.css">
  <script src="assets/js/register.js"></script>
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oxygen:400,300,700">
  <link rel="stylesheet" href="assets/video/css/style.css">
  <link rel="stylesheet" href="assets/css/style.css">
  
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Vampiro+One" rel="stylesheet">
  <link href="css/one-page-wonder.min.css" rel="stylesheet">
<style>
* {
    box-sizing: border-box;
}

.row {
    display: flex;
}

/* Create two equal columns that sits next to each other */
.column {
    flex: 50%;
    padding: 10px;
    /* Should be removed. Only for demonstration */
}
</style>


</head>
<body>

<nav class="navbar navbar-fixed-top"  style="background-color: rgba(29, 29, 29, 0); z-index: 2;" >
  <div class="container-fluid">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
      </button>
      <p class="navbar-brand" ><img src="smalllogo.png" ></p>
      
    </div>

    <div class="collapse navbar-collapse navbar-right " id="myNavbar">
    
      <ul class="nav navbar-nav navbar-right ">
     <li><a data-toggle="modal" data-target="#myModal_Login" style="color:white; font-weight:600; padding-top: 20px; "><?php echo $account->getError(Constants::$loginFailed); ?></a></li>  
        <li><a data-toggle="modal" data-target="#myModal_Login" style="color:white; font-weight:600; padding-top: 20px;"> <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
        
        <li><a data-toggle="modal" data-target="#myModal" style="color:white; font-weight:600; padding-top: 20px;"><i class="fa fa-id-card" aria-hidden="true"></i> Sign Up</a></li>
         <li><a data-toggle="modal" data-target="#noticeModal" style="color:white; font-weight:600; padding-top: 20px;"> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> DISCLAIMER</a></li>




      </ul>
    </div>
  </div>
  
  
  
</nav>


 
   

  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
<div class="modal-header" style=" background-image: url('images/logbgSign.png')">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h2 class ="modal-title"><img src="smalllogo.png" Sign Up now! ></h2>

          <h4 class="modal-title "><i class="fa fa-user-circle" aria-hidden="true"></i>Sign Up</h4>
 
        </div>
        <div class="modal-body">
          <p>It's Easy</p>
          <div class="container-fluid">

<!-- BORRE INJECT YUNG REGISTER FUNCTIONS hanggang line 170-->
<form id="registerForm" action="register.php" method="POST" enctype="multipart/form-data">
  <div class = "row">
  <div class="column">

 

  <div class="form-group">
    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
    <label for="firstName">First name</label>
    <input class="form-control" id="firstName" name="firstName" type="text" placeholder="Juan" value="<?php getInputValue('firstName') ?>" required>
  </div>

  <div class="form-group">
    <?php echo $account->getError(Constants::$lastNameCharacters); ?>

    <label for="lastName">Last name</label>
    <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Dela Cruz" value="<?php getInputValue('lastName') ?>" required>
 </div>

 <div class="form-group">
   <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
   <?php echo $account->getError(Constants::$emailInvalid); ?>
   <?php echo $account->getError(Constants::$emailTaken); ?>
   <label for="email">Email</label>
   <input class="form-control" id="email" name="email" type="email" placeholder="juandc@gmail.com" value="<?php getInputValue('email') ?>" required>
 </div>

 <div class="form-group">
  <label for="email2">Confirm email</label>
  <input class="form-control" id="email2" name="email2" type="email" placeholder="juandc@gmail.com" value="<?php getInputValue('email2') ?>" required>
 </div>
</div>

<div class="column">
  <div class="form-group">
    <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>

    <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
    <?php echo $account->getError(Constants::$passwordCharacters); ?>
    <label for="password">Password</label>
    <input class="form-control" id="password" name="password" type="password" placeholder="" required>
  </div>

  <div class="form-group">
    <label for="password2">Confirm password</label>
    <input class="form-control" id="password2" name="password2" type="password" placeholder="Re-Type Password" required>
  </div>
  <div class="form-group">
    <label for="qoute">Insert Qoute</label>
    <input class="form-control" id="qoute" name="qoute" type="textarea" placeholder="qoute" required>
  </div>

  <div class="form-group">
    <label>Profile Picture <i class="fa fa-picture-o" aria-hidden="true"></i></label><input class="btn btn-filer" type="file" name="image" />
  </div>
    
 <button type="submit" name="registerButton" class="btn btn-default"><i class="fa fa-id-card-o" aria-hidden="true"></i> Register</button>
</div>
</div>
</form>

  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  





  <!-- Modal LOGIN -->
  <div class="modal fade" id="myModal_Login" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header" style=" background-image: url('images/logbg.png')">
          

          <h2 class ="modal-title"><img src="smalllogo.png" Sign Up now! ></h2>

          <h4 class="modal-title ">Login</h4>
 
        </div>
        <div class="modal-body" >
          <p>"Tangkilikin ang sariling atin!"</p>
          <div class="container-fluid">

<form id="loginForm" action="register.php" method="POST">
 <div class="form-group" >
   <label for="loginEmail"><i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
 
   <input class="form-control" id="loginEmail" name="loginEmail" type="text" placeholder="jdcruz@gmail.com" value="<?php getInputValue('loginEmail') ?>" required>
 </div>
   <div class="form-group">
     <label for="loginPassword"> <i class="fa fa-lock" aria-hidden="true"></i> Password</label>
     <input type="password" class="form-control" id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
   </div>
 <button type="submit" name="loginButton" class="btn btn-default"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>                                         
            <?php 
              //Google Session 
                  require_once 'includes/config.php';
                  $loginURL="";
                  $authUrl = $googleClient->createAuthUrl();
                  $loginURL = filter_var($authUrl, FILTER_SANITIZE_URL);
            ?>
  <a href="<?= htmlspecialchars($loginURL); ?>" class="btn btn-gmailer"><i class="fa fa-google-plus-square" aria-hidden="true"></i> Login With Google</a>
      
</form>
 

  </div>
        </div>

      
        <div class="modal-footer">
                 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
   <!-- Modal -->
  <div class="modal fade" id="noticeModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
<div class="modal-header" style=" background-image: url('images/noticeBg.png')">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h2 class ="modal-title"><img src="smalllogo.png" Sign Up now! ></h2>

          <h4 class="modal-title" style="color:white;">NOTICE!</h4>
 
        </div>
        <div class="modal-body">
          <h2><strong>DISCLAIMER</strong></h2><p>
         All rights reserved. No copyright infringement intended in using music and images in the website. This website or any portion thereof may not be for commercial use nevertheless was just part of the subject requirement and for EDUCATIONAL PURPOSES ONLY.<br><br>By pressing I agree, you have read and understand the terms and is bound to come after this disclaimer.</p>
          
          <div class="container-fluid">



  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-agree" data-dismiss="modal">I Agree</button>                                    
        </div>
      </div>
      
    </div>
  </div>



<!-- Modal About -->
 <div class="modal fade " id="aboutModal" role="dialog">
    <div class="modal-dialog modal-lg ">
    
      <!-- Modal content-->
      <div class="modal-content-about" >
<div class="modal-header-about" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h2 class ="modal-title center-group"><img style = "height: 110px; height: 110px; " src="bsu.png"  ><img style = "height: 110px; height: 110px; " src="bsusc.png"  >
           </h2> <h2 class ="modal-title center-group"  style="padding-top: 10px; color: #671e1e;">Bulacan State University Sarmiento Campus</h2>

          
 
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="column">
            <span  class="aboutlogo center-group" ><img src="assets/images/about/eloi.jpg"></span>
            <span > <h5 style="text-align: center;"><strong>Eloisa Quiambao</strong></h5>
            <p style="text-align: center;">Team Leader</p></span>
            </div>
            <div class="column">
            <span  class="aboutlogo center-group" ><img src="assets/images/about/borre.jpg"></span>
            <span > <h5 style="text-align: center;"><strong>Timothy Kaen Borre</strong></h5>
            <p style="text-align: center;">Back End Developer</p></span>
            </div>
            <div class="column">
            <span  class="aboutlogo center-group" ><img src="assets/images/about/rem.jpg"></span>
            <span > <h5 style="text-align: center;"><strong>Mark Joseph Remetio</strong></h5>
            <p style="text-align: center;">Back End Support</p></span>
            </div>
            <div class="column">
            <span  class="aboutlogo center-group" ><img src="assets/images/about/thony.jpg"></span>
            <span > <h5 style="text-align: center;"> <strong>Thony John Costales</strong></h5>
            <p style="text-align: center;">Front End Developer</p></span>
            </div>
            <div class="column">
            <span  class="aboutlogo center-group" ><img src="assets/images/about/chugs.jpg"></span>
            <span > <h5 style="text-align: center;"><strong>Adrian Ramos</strong></h5>
            <p style="text-align: center;">Information Security</p></span>
            </div>
          </div>
       <h4 style="text-align: center;">BSIT-3A2 SOFTWARE ENGINEERING CLASS OF 2018</h4>
        <div class="modal-footer">
          
          <span  class="aboutlogo center-group" ><img src="assets/images/about/joan.jpg"></span>
            <span > <h5 style="text-align: center;"><strong>Joan F. Galopo</strong></h5>
                                    <h4 style="text-align: center;">Class Instructor</h4>
        </div>
      </div>
      
    </div>
  </div></div>







<div style=" background: linear-gradient(rgba(97, 97, 97, 0.19), rgba(243, 134, 0, 0.18)); z-index: -1; height:647px;">
<div class="container" style=" padding-top: 50px; ">
  <div class="jumbotron" style="background-color:rgba(210, 105, 30, 0); text-align: center;  ">

    <h1 style="color:white; font-family: 'Vampiro One', cursive;"> Welcome </h1>      
    <p style="color:white;">Stream Original Pinoy Music straight from our website</p>
 <a data-toggle="modal" data-target="#aboutModal" style="color:white; font-weight:600; padding-top: 20px;"> <i class="fa fa-users" aria-hidden="true"></i> About The Developers</a>
  </div>
      
</div> 
<div> <br><br><br><br><br><br><br><br><br><br><br><br></div>


<video id="my-video" class="video" muted loop >
  <source src="assets/video/motion1.mp4" type="video/mp4">
  <source src="assets/video/motion1.ogv" type="video/ogg">
  <source src="assets/video/motion1.webm" type="video/webm">
</video><!-- /video -->

   <footer class="py-5 bg-black">
      <div class="container">
        <p class="m-0 text-center text-white small" style="color:white; font-weight: Bolder;">Copyright &copy; Pinoyplay.online</p>
      </div>
      <!-- /.container -->
    </footer>


<script>
(function() {
  /**
   * Video element
   * @type {HTMLElement}
   */
  var video = document.getElementById("my-video");

  /**
   * Check if video can play, and play it
   */
  video.addEventListener( "canplay", function() {
    video.play();
  });
})();
</script>



</div>

</body>
</html>
