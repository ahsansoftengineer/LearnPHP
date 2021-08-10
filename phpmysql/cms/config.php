<?php
  $hostname = "http://localhost/a/phpmysql/cms/";
  $conn = mysqli_connect("localhost:3307", "root", "", "cms_news") or 
  die("Connection Failed");
  $pageSize = 3;
?>