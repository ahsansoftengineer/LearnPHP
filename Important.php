<?php
  // To Redirect User to Another Page
  header("Location:index.php");
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));
  // To Prevent from Directory Searcher add index.php file within that folder
  // Saving File within Directory
  move_uploaded_file($file_tmp_name, "upload/".$file_name);
  // Delete File from Directory
  unlink("upload/FileThatYouWhatToDelete.ext");

?>