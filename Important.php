<?php
  // To Redirect User to Another Page
  header("Location:index.php");
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));


?>