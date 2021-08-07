<?php
  echo $sid = $_POST['sid'];
  echo $sname = $_POST['sname'];
  echo $saddress = $_POST['saddress'];
  echo $sclass = $_POST['sclass'];
  echo $sphone = $_POST['sphone'];
  include 'config.php';
  echo $sql = "UPDATE student SET 
  sname = '{$sname}', saddress = '{$saddress}', sclass =  '{$sclass}',
   sphone = '{$sphone}' WHERE sid = '{$sid}'";
   echo '<br>';
  $result = mysqli_query($conn, $sql) or die("Student Update Query Failed");
  mysqli_close($conn);
  header("Location:index.php");
