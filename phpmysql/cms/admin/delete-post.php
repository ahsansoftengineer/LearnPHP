<?php
  include "config.php";
  $post_id = $_GET['post_id'];
  $category_id = $_GET['category_id'];
  $sql = "SELECT * FROM post WHERE post_id = {$post_id}";
  $result = mysqli_query($conn, $sql) or die("Query Failed : SELECT POST");
  $row = mysqli_fetch_assoc($result);
  // Deleting Image from Directory
  unlink("upload/".$row['post_img']);
  $sql1 = "DELETE FROM post WHERE post_id = {$post_id};
    UPDATE category SET post = post - 1 WHERE category_id = {$category_id};
  ";
  if(mysqli_multi_query($conn, $sql1)){
    header("Location: {$hostname}admin/post.php");
  } else {
    echo $sql1;
  }
?>