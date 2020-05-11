<?php 
include("includes/includedFiles.php");

    if(isset($_SESSION['error'])=="error"){
      echo' <script> alert("PLEASE VERIFY YOUR EMAIL!") </script> ';
      unset($_SESSION['error']);
  }
?>


<script>openPage("browse.php");</script>
