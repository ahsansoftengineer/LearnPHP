<?php
  include "config.php";
  $page = basename($_SERVER['PHP_SELF']);
  $page = substr($page, 0, strpos($page, '.') );
  $page_title = "Page Title Not Found";
  $sql_title = "";
  switch($page){
    case "single":
      if(isset($_GET['id'])){
        $sql_title = "SELECT title FROM post WHERE post_id = {$_GET['id']}";
      } break;
    case "category":
      if(isset($_GET['category_id'])){
        $sql_title = 
        "SELECT category_name FROM category WHERE category_id = {$_GET['category_id']}";
      } break;
    case "author":
      if(isset($_GET['author'])){
        $sql_title = 
        "SELECT first_name FROM user WHERE user_id = {$_GET['author']}";
      } break;
    case "search":
      if(isset($_GET['search'])){
        $page_title = $_GET['search'];
      } break;
    default :
      $page_title = "Welcome";
  }
  if($sql_title != ""){
    $result_title = mysqli_query($conn, $sql_title) or die("Title Query Failed");
    $row_title = mysqli_fetch_array($result_title);
    $page_title = $row_title[0];
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>News | <?php echo $page_title ?></title>
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
                $sql = "SELECT category_id, category_name, COUNT(post.post_id) AS posts
                FROM category
                INNER JOIN post ON category.category_id = post.category
                GROUP BY category.category_id";
                $result = mysqli_query($conn, $sql) or die("Query Failed. : Category Get Header");
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {?>
               ?>
               <li>
                  <a class="<?php echo $category_id == $row['category_id'] ? 'active' : ''?>" href="category.php?category_id=<?php echo $row['category_id'] ?>">
                    <?php echo $row['category_name'] ?>
                    <sup>(<?php echo $row['posts'] ?>)</sup>
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