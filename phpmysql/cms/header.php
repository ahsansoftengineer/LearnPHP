<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>News</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="css/font-awesome.css">
  <!-- Custom stlylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- HEADER -->
  <div id="header">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- LOGO -->
        <div class=" col-md-offset-4 col-md-4">
          <a href="index.php" id="logo"><img src="images/news.jpg"></a>
        </div>
        <!-- /LOGO -->
      </div>
    </div>
  </div>
  <!-- /HEADER -->
  <!-- Menu Bar -->
  <div id="menu-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class='menu'>
          <li>
            <a class="
            <?php echo isset($_GET['category_id']) | isset($_GET['author']) |
             isset($_GET['search'])  ? '' : 'active'?>" href="index.php">
              HOME
            </a>
          </li>
            <?php 
              include "config.php";
              if (isset($_GET['category_id'])) {
                  $category_id = $_GET['category_id'];
              }
                $sql = "SELECT * from category WHERE post > 0";
                $result = mysqli_query($conn, $sql) or die("Query Failed. : Category Get Header");
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {?>
               ?>
               <li>
                  <a class="<?php echo $category_id == $row['category_id'] ? 'active' : ''?>" href="category.php?category_id=<?php echo $row['category_id'] ?>">
                    <?php echo $row['category_name'] ?>
                  </a>
                </li>
              <?php
                }
              } else {
                echo "<li><a href='category.php'>No Category Found</a></li>";
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- /Menu Bar -->