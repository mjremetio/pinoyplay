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
 
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="assets/custom.css">
  <link rel="stylesheet" href="assets/jquery.datatable.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body style="background-color:   #232323; ">
<div class="wrapper " style="background-color:   #232323;   padding-top: 89px;">

 
  <nav class="navbar  navbar-fixed-top" style="background-color: #e65d00">
 <header class="main-header navbar-fixed-top">
  <a href="index.php" class="logos" style="background-color: #e65d00; ">
       
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../smalllogo.png" alt="Mountain View" ></span>

    </a>
</header>
</nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="container" >

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
                  <li  ><a href="dashboard.php" style="color:white;"><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</a></li>

                  <li type="button "data-toggle="modal" data-target="#addsong" ><a style="color:white;"><i class="fa fa-plus" aria-hidden="true"></i> <i class="fa fa-music" aria-hidden="true"></i> Add New Song</a></li>
                  <li  class="active" ><a href="editform.php" style="color:white;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Song</a></li>
                  <li><a href="deleteform.php" style="color:white;"><i class="fa fa-times" aria-hidden="true"></i>Delete Song</a></li>
                  <li><a href="accountform.php" style="color:white;"><i class="fa fa-id-card" aria-hidden="true"></i>Manage Accounts</a></li>
                  <li><a href="logout.php" style="color:white;"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

            <h3>Song List</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th class="thcolor">Title</th>
                      <th class="thcolor">Duration</th>
                      <th class="thcolor"> Album Order</th>
                      <th class="thcolor">plays</th>
                      <th class="thcolor">Edit</th>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM songs";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['duration']; ?></td>
                        <td><?php echo $row['albumOrder']; ?></td>
                        <td><?php echo $row['plays']; ?></td>
                      
                        <!--<td> <button class="btn btn-info" href="editform2.php?id=<?php echo $row['id']; ?>">Edit</button></td>
                        edit button is non functional at the moment-->
                        <td><a href="editform2.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                      
                      </tr>  
                     <?php
                        }
                      }
                    ?>
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>


  </div>
  <!-- /.content-wrapper -->

 </div>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
 
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
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
<div class="modal fade" id="addsong" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#e65d00;">Uploading New Music</h4>
        </div>
        <div class="modal-body">


           <form method="POST" action="dashboard.php" enctype="multipart/form-data"/>
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