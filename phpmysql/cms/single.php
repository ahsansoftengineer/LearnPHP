<?php include 'header.php'; 
 include "config.php";
 $id = "";
 if(isset($_GET['id'])){
   $id = $_GET['id'];
 } else {
   $id = 1;
   // Redirect Back to the Page
 }
?>
<div id="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <!-- post-container -->
        <div class="post-container">
          <div class="post-content single-post">
          <?php
            $sql = "SELECT p.post_id, p.title, p.post_date, p.post_img, p.category, 
            p.description, c.category_name, u.first_name, u.user_id
            FROM post AS p 
            LEFT JOIN category AS c ON p.category = c.category_id 
            LEFT JOIN user AS u ON p.author = u.user_id 
            WHERE p.post_id = {$id}";
            $result = mysqli_query($conn, $sql) or die("User Query Failed");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
              <h3><?php echo $row['title'] ?></h3>
              <div class="post-information">
                <span>
                  <i class="fa fa-tags" aria-hidden="true"></i>
                  <?php echo $row['category_name'] ?>
                </span>
                <span>
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <a href='author.php?id=<?php echo $row['user_id']?>'>
                    <?php echo $row['first_name'] ?>
                  </a>
                </span>
                <span>
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                  <?php echo $row['post_date']?>
                </span>
              </div>
              <img class="single-feature-image" 
              src="admin/upload/<?php echo $row['post_img'] ?>" alt="" />
              <p class="description"><?php echo $row['description']?>
              </p>
            <?php 
              }
            } ?>
          </div>
        </div>
        <!-- /post-container -->
      </div>
      <?php include 'sidebar.php'; ?>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>