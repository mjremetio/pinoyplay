<?php 
include("includes/includedFiles.php");
?>


<h3 class="pageHeadingBig">Today's Feature Albums</h3>

<div class="gridViewContainer">

	<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

		while($row = mysqli_fetch_array($albumQuery)) {
			



			echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")''>
						<img style='border-radius: 10px;' src='" . $row['artworkPath'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>

					
					</span>

				</div>";



		}
	?>
</div>

<script>

