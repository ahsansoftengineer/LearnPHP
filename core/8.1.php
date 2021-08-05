<?php
  echo "<pre>";
    print_r($_GET);
    print_r($_POST);
    print_r($_REQUEST);
  echo "</pre>";
  if($_GET){
    echo $_GET['fname']."<br>";
  }
  if($_POST){
    echo $_POST['fname']."<br>";
  }
  if($_REQUEST){
    echo $_POST['fname']."<br>";
  }
?>