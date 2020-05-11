<?php
include("config.php");



function sanitizeFormArtist($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function sanitizeFormAlbum($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function sanitizeFormGenre($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function sanitizeFormSongName($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}


if(isset($_POST['uploadArtists'])) {
//if submit button was pressed
	$artist = sanitizeFormArtist($_POST['artist_name']);
	$album = sanitizeFormAlbum($_POST['album_name']);
	$genre = sanitizeFormGenre($_POST['genre_name']);
	$songName = sanitizeFormSongName($_POST['song_name']);
	$duration = $_POST['duration'];
	$albumOrder = $_POST['album_order'];

	$image = $_FILES['images']['name'];

	//target fileor folder for artworks 
	$target = "assets/artwork/".basename($image);

	//varaibles for song manipulation

	$target_dir = "assets/music/";
	$musicFile=$_FILES["music"]["name"];
	$target_file = $target_dir . basename($musicFile);
	$uploadOk = 1;
	$MusicFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$query = mysqli_query($conn,"SELECT * FROM artists WHERE name='$artist'");
	// execute query check kung may artist na
  	
		if(mysqli_num_rows($query) == 1) {
			//may artist na proceed to check genre

		}else{
			$queryInsertArtist = mysqli_query($conn,"INSERT INTO `artists`(`name`) VALUES ('$artist')");
		}

	$query2 = mysqli_query($conn,"SELECT * FROM genres WHERE name='$genre'");
				
		if(mysqli_num_rows($query2) == 1) {
			//may genre present na proceed to check album
		}else{
			$queryInsertGenre = mysqli_query($conn,"INSERT INTO `genres`(`name`) VALUES ('$genre')");
		}
					
	$query3 = mysqli_query($conn,"SELECT * FROM albums WHERE title='$album'");
		
		if(mysqli_num_rows($query3) == 1) {
						//may album na, notif na present

		}else{
			//eto yung fetch the row id in genre
			$sql1 = "SELECT id FROM genres WHERE name='$genre'";
			$result = mysqli_query($conn,$sql1);

			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$genre_id=$row['id'];
				}
			}

			//eto yung fetch the row id in artists
			$sql2 = "SELECT id FROM artists WHERE name='$artist'";
			$result2 = mysqli_query($conn,$sql2);

			if (mysqli_num_rows($result2) > 0) {
				while($row = mysqli_fetch_assoc($result2)) {
					$artist_id=$row['id'];
				}
			}
			
			$queryInsertAlbum="INSERT INTO `albums` VALUES ('','$album', '$artist_id', '$genre_id', '$target')";
			$res=$conn->query($queryInsertAlbum);
				if($res==TRUE){
					//display that success yung upload ng new album
					echo "ALBUM SUCCESSFULLY ADDED !! ";
				}
			if (move_uploaded_file($_FILES['images']['tmp_name'], $target)) {
		  		echo '<script type=text/javascript>alert("image Uploaded")</script>';
		  	}else{
		  		echo '<script type=text/javascript>alert("Error Uploading Image")</script>';
		  	}
		}

	$query4 = mysqli_query($conn,"SELECT * FROM songs WHERE title='$songName'");

		if(mysqli_num_rows($query4) == 1) {
			//may song na proceed to check genre

		}else{

			//eto yung fetch the row id in album
			$sql3 = "SELECT id FROM albums WHERE title='$album'";
			$result3 = mysqli_query($conn,$sql3);

			if (mysqli_num_rows($result3) > 0) {
				while($row = mysqli_fetch_assoc($result3)) {
					$album_id=$row['id'];
				}
			
			}
			$queryInsertArtist="INSERT INTO `songs` VALUES ('','$songName','$artist_id','$album_id','$genre_id','$duration','$target_file','$albumOrder','0')";
			$ress=$conn->query($queryInsertArtist);
				if($ress==TRUE){
					//display that success yung upload ng new album
					echo "SONG SUCCESSFULLY ADDED !! ";
				}else{
					echo "SONG FAILED TO ADD !! ";
				}

		}//dulo ng queries

if(isset($_POST["music"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["music"]["size"] > 4000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($MusicFileType != "mp3" && $MusicFileType != "wav" && $MusicFileType != "m4a") {
    echo "Sorry, only MP3, WAV & M4A files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["music"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["music"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


}//dulo ni isset
?>