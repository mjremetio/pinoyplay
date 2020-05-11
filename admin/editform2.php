<?php
include("editHandler.php");

$id=$_GET['id'];


?>


<head>
<title>Upload</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"ww
</head>
<body style="background-color: #292929;">
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


<div class="wrapper" style="padding-top: 89px; height:90%;">
<nav class="navbar  navbar-fixed-top" style="background-color: #e65d00">

  
        <header class="main-header navbar-fixed-top">
          <a href="index.php" class="logos" style="background-color: #e65d00; ">
      <!-- mini logo for sidebar mini 50x50 pixels -->
     <p>
       <img src="smalllogo.png" ></p>

    </a>
</header>
</nav>


<div  class="container" style="background-color: #292929;">

   <?php
    //fetching the data
      $sql = "SELECT * FROM songs where id='$id' ";
      $result = $conn->query($sql);
      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $getId = $row['id'];
    ?>

  <form method="POST" action="editform2.php?id=<?php echo $row['id']; ?>" >
      
      <p style="font-weight: bold; color:#e65d00; text-align: center; font-size: x-large;">EDIT SONG</p>

    <div class="form-group">
<label style="color:#e65d00;">Song Title</label>
       <input class="form-control"  type="text" name="changeTitle" placeholder="<?php echo $row['title']; ?>" required />
    </div>

   <div class="form-group">
<label style="color:#e65d00;"> Song Duration:</label>
     <input class="form-control" type="text" name="changeDuration" placeholder="<?php echo $row['duration']; ?>" required />
    </div>

  <div class="form-group">
<label style="color:#e65d00;"> Song Order:</label>
 <input class="form-control" type="text" name="changeAlOrder" placeholder="<?php echo $row['albumOrder']; ?>" required />
    </div>

  <div class="form-group">
<label style="color:#e65d00;"> Number of plays:</label>
 <input class="form-control" type="text" name="changePlays" placeholder="<?php echo $row['plays']; ?>" required />
    </div>

    <?php
    //kadugtong ng mga php tags sa taas wherein eto yung end file 
    //parang ginawan ko sya ng container kunwari haha
      }
    }else{
      //check if no data was naibalik lol
      echo"THERE WAS NO DATA";
    }
    ?>
    <div>
      <button class="btn btn-default" type="submit" name="editArtist" >UPDATE</button>
    </div>
  </form>
<form method="POST" action="dashboard.php">
  <div>
      <button class="btn btn-default" type="submit">RETURN TO DASHBOARD</button>
    </div>
</form>


</div>
</div>
</body>
