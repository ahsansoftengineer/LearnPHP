<?php
  include "config.php";
  $category_id = $_GET['id'];
  echo $sql1 = "DELETE FROM category WHERE category_id = {$category_id}";
  // Truncation is Requrired Wheather to to delete the Depandant Post or not
  // if(mysqli_query($conn, $sql1)){
  //   header("Location: {$hostname}admin/category.php");
  // } else {
  //   echo $sql1;
  // }
  // header("Location: {$hostname}admin/category.php");

?>