<?php
  include "config.php";
  $user_id = $_GET['id'];
  $sql1 = "DELETE FROM user WHERE user_id = '{$user_id}'";
  if(mysqli_query($conn, $sql1)){
    header("Location: {$hostname}admin/users.php");
  } else {
    echo $sql1;
  }
?>