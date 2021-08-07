<?php 
  echo $sname = $_POST['sname'];
  echo $saddress = $_POST['saddress'];
  echo $sclass = $_POST['class'];
  echo $sphone = $_POST['sphone'];
  include 'config.php';
  echo $sql = "INSERT INTO 
    student(sname, saddress, sclass, sphone)
    VALUES('{$sname}', '{$saddress}', '{$sclass}', '{$sphone}')";
  $result = mysqli_query($conn, $sql) or die("Student Add Query Failed");
  mysqli_close($conn);
  header("Location:index.php");
?>