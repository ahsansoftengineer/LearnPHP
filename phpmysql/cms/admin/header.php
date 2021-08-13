<?php
  // Incase if User is not Logged in then Redirect User to Login Page
  include 'config.php';
  $page = basename($_SERVER['PHP_SELF']);
  $page = substr($page, 0, strpos($page, '.') );
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: {$hostname}admin/");
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>ADMIN Panel</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="../css/font-awesome.css">
  <!-- Custom stlylesheet -->
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <!-- HEADER -->
  <div id="header-admin">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- LOGO -->
        <div class="col-md-2">
          <a href="post.php"><img class="logo" src="images/news.jpg"></a>
        </div>
        <!-- /LOGO -->
        <!-- LOGO-Out -->
        <div class="col-md-offset-7  col-md-3 p-0 m-0" style="text-align: right;">
          <h5 class="p-0 m-0" style="color: white; margin:0px !important">Hello 
            <?php echo $_SESSION['first_name'] ?>
          </h5>
          <a href="logout.php" class="admin-logout p-0" 
          style="margin:0px !important; font-size:medium">logout</a>
        </div>
        <!-- /LOGO-Out -->
      </div>
    </div>
  </div>
  <!-- /HEADER -->
  <!-- Menu Bar -->
  <div id="admin-menubar">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="admin-menu">
            <li >
              <a href="post.php" class="<?php echo $page == 'post' ? 'active' : '' ?>" >Post</a>
            </li>
            <?php 
              if ($_SESSION["user_role"] == 1) {
                  ?>
            <li>
              <a href="category.php" class="<?php echo $page == 'category' ? 'active' : '' ?>" >Category</a>
            </li>
            <li>
              <a href="users.php" class="<?php echo $page == 'users' ? 'active' : '' ?>" >Users</a>
            </li>
            <?php
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- /Menu Bar -->