<?php
include("config.php");
include("artistHandler.php");

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();


}

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="assets/custom.css">
  <style>
* {
    box-sizing: border-box;
}

.rowmodal {
    display: flex;
}

/* Create two equal columns that sits next to each other */
.columnmodal {
    flex: 50%;
    padding: 10px;
    /* Should be removed. Only for demonstration */
}
</style>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body style="background-color: #292929">
<div class="wrapper" style="padding-top: 89px; height:90%;">

<nav class="navbar  navbar-fixed-top" style="background-color: #e65d00">

  
        <header class="main-header navbar-fixed-top">
          <a href="index.php" class="logos" style="background-color: #e65d00; ">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../smalllogo.png" alt="Mountain View" ></span>

    </a>
</header>
</nav>
  <!-- Content Wrapper. Contains page content -->
  <div class="container">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid" style="background-color: #000000; ">
              <div class="box-header with-border">
                <h3 class="box-title" style="color:white;">Welcome <b>Admin           
                  <i class="fa fa-user-circle-o" aria-hidden="true"></i></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active" ><a href="dashboard.php" style="color:white;"><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</a></li>

                  <li type="button "data-toggle="modal" data-target="#addsong" ><a style="color:white;"><i class="fa fa-plus" aria-hidden="true"></i> <i class="fa fa-music" aria-hidden="true"></i> Add New Song</a></li>
                  <li><a href="editform.php" style="color:white;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Song</a></li>    
                  <li><a href="deleteform.php" style="color:white;"><i class="fa fa-times" aria-hidden="true"></i>Delete Song</a></li>
                  <li><a href="accountform.php" style="color:white;"><i class="fa fa-id-card" aria-hidden="true"></i>Manage Accounts</a></li>
                  <li><a href="logout.php" style="color:white;"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 padding-2" style="background-color: #3e3e3e;">

            <h3 style="color:white;">PinoyPlay Data View</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="info-box" style="background-color:white;">
                  <span class="info-box-icon" style="background-color: #e65d00;"><i class="ion ion-ios-albums"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Current Album Count</span>
                    <!--fetch info from datase-->
                    <?php
                      $sql = "SELECT * FROM albums WHERE id >= '1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>                
              </div>
              <div class="col-md-6">
                <div class="info-box" style="background-color:white;">
                  <span class="info-box-icon" style="background-color: #e65d00;"><i class="ion ion-man"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Current Artist Count</span>
                    <!--fetch info from datase-->
                    <?php
                      $sql = "SELECT * FROM artists WHERE id >= '1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                    
                  </div>
                </div>                
              </div>
              <div class="col-md-6">
                <div class="info-box" style="background-color:white;">
                  <span class="info-box-icon " style="background-color: #e65d00;"><i class="ion ion-ios-color-filter"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Current Genre Count</span>
                    <!--fetch info from datase-->
                    <?php
                      $sql = "SELECT * FROM genres WHERE id >= '1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box" style="background-color:white;">
                  <span class="info-box-icon " style="background-color: #e65d00;"><i class="ion ion-ios-musical-notes"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Current Song Count</span>
                    <!--fetch info from datase-->
                    <?php
                      $sql = "SELECT * FROM songs WHERE id >='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box" style="background-color:white;">
                  <span class="info-box-icon" style="background-color: #e65d00;"><i class="ion ion-person-add"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Current User Count</span>
                    <!--fetch info from datase-->
                    <?php
                      $sql = "SELECT * FROM users";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box" style="background-color:white;">
                  <span class="info-box-icon " style="background-color: #e65d00;"><i class="ion ion-ios-browsers"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Current Playlist Count</span>
                    <!--fetch info from datase-->
                    <?php
                      $sql = "SELECT * FROM playlists";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
            </div>
</div>
          </div>
        </div>
     </section>
     
     <p style="color:white;">
</p>
</div>
</div>
    <!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

</body>


<div class="modal fade" id="addsong" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#e65d00;">Uploading New Music</h4>
        </div>
        <div class="modal-body">


<form method="POST" action="dashboard.php" enctype="multipart/form-data" required />
  <div class = "rowmodal">
    <div class="columnmodal">


      <div class="form-group">
  <label style="color:#e65d00;">Genre Name</label>
        <input class="form-control" type="text" name="genre_name" required />
      </div>
      <div class="form-group">
      <label style="color:#e65d00;">Artist/Band Name</label>
      <input class="form-control" type="text" name="artist_name" required />
      </div> 

      <div class="form-group">
          <label style="color:#e65d00;">Album Name</label>
          <input class="form-control" type="text" name="album_name" required />
      </div>

      <div class="form-group">
        <label style="color:#e65d00;">Upload Album Art: </label><input class="form-control" type="file" name="images" />
      </div>
      </div>
      <div class ="columnmodal">
  <div class="form-group">
        <label style="color:#e65d00;">Song Title</label>
        <input class="form-control" type="text" name="song_name" required />
      </div>

      <div class="form-group">
          <label style="color:#e65d00;">Duration</label>
          <input class="form-control" type="text" name="duration" required />
      </div class="form-group">

      <div class="form-group">
         <label style="color:#e65d00;">Track Order</label>
         <input class="form-control" type="text" name="album_order" required />
      </div>

      <div class="form-group"> 
        <label style="color:#e65d00">Upload Music File</label>
        <input class="form-control" type="file" name="music">
      </div>     

     
    </div>
     </div>
      <div class="form-group">
        <button  class="btn btn-default" type="submit" name="uploadArtists">Start</button>
      </div>
  </form>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>