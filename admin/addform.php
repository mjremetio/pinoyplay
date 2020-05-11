<?php
include("config.php");
include("artistHandler.php");


?>
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

<!DOCTYPE html>
<html>
<head>
<title>Upload</title>
  <link rel="stylesheet" type="text/css" href="assets/style.css">

</head>
<body>
<div id="content">
  <?php
    //while ($row = mysqli_fetch_array($result)) {
      //echo "<div id='img_div'>";
        //echo "<img src='images/".$row['image']."' >";
        //echo "<p>".$row['image_text']."</p>";
     // echo "</div>";
    //}
  ?>

  <form method="POST" action="addform.php" enctype="multipart/form-data" required />
      
    <div>     ADD NEW DATA</div>

    <div>
       GENRE:<input type="text" name="genre_name" required />
    </div>
<br>
    <div>
      ARTIST NAME:<input type="text" name="artist_name" required />
    </div>
<br>
    <div>
      ALBUM NAME:<input type="text" name="album_name" required />
    </div>
<br>
    <div>
      <label>Upload Album Art: </label><input type="file" name="images" />
    </div>
<br>
    <div>
      SONG NAME:<input type="text" name="song_name" required />
    </div>
<br>
    <div>
      DURATION:<input type="text" name="duration" required />
    </div>
<br>
    <div>
      ALBUM ORDER:<input type="text" name="album_order" required />
    </div>
<br>
    <div>UPLOAD MUSIC:
      <input type="file" name="music">
    </div>     
<br>
    <div>
      <button type="submit" name="uploadArtists">POST</button>
    </div>
  </form>
<form method="POST" action="dashboard.php">
  <div>
      <button type="submit">RETURN TO DASHBOARD</button>
    </div>
</form>


</div>
</body>
</html>