<?php
  echo $id = $_GET['id'];
  include 'config.php';
  echo $sql = "DELETE FROM student WHERE sid = '{$id}'";
  $result = mysqli_query($conn, $sql) or die("Student Delete Query Failed");
  mysqli_close($conn);
  header("Location:index.php");
?>