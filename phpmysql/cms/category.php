<?php include 'header.php'; 
 $pageNo = 1;
 $category_id = 1;
 if(isset($_GET['page'])){
   $pageNo = $_GET['page'];
 }
 if(isset($_GET['category_id'])){
   $category_id = $_GET['category_id'];
 }
 $offset = ($pageNo - 1) * $pageSize;
?>
<div id="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <!-- post-container -->
        <div class="post-container">
        <?php
           $sql = "SELECT category_name FROM category WHERE category_id = {$category_id}";
           $result = mysqli_query($conn, $sql) or die("Category Failed: GET");
           if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                 echo "<h2 class='page-heading'>{$row['category_name']}</h2>";
               }
           }
            $sql = "SELECT p.post_id, p.title, p.post_date, p.category, p.description, 
            p.author, p.post_img, c.category_name, u.first_name 
            FROM post AS p 
            LEFT JOIN category AS c ON p.category = c.category_id 
            LEFT JOIN user AS u ON p.author = u.user_id 
            WHERE c.category_id = {$category_id}
            ORDER BY post_id DESC LIMIT {$offset}, {$pageSize};";

            $result = mysqli_query($conn, $sql) or die("Get Failed: POST");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="post-content">
          <div class="row">
              <div class="col-md-4">
                <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>">
                  <img src="admin/upload/<?php echo $row['post_img'] ?>" 
                    alt="<?php echo $row['post_img'] ?>" />
                </a>
              </div>
              <div class="col-md-8">
                <div class="inner-content clearfix">
                  <h3><a href="single.php?id=<?php echo $row['post_id'] ?>"><?php echo $row['title'] ?></a></h3>
                  <div class="post-information">
                    <span>
                      <i class="fa fa-tags" aria-hidden="true"></i>
                      <a href='category.php?category_id=<?php echo $row['category']?>'><?php echo $row['category_name'] ?></a>
                    </span>
                    <span>
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <a href='author.php?author=<?php echo $row['author']?>'><?php echo $row['first_name'] ?></a>
                    </span>
                    <span>
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      <?php echo $row['post_date'] ?>
                    </span>
                  </div>
                  <p class="description"><?php echo substr($row['description'], 0, 130);  ?></p>
                  <a class='read-more pull-right' 
                  href="single.php?id=<?php echo $row['post_id'] ?>">read more</a>
                </div>
              </div>
            </div>
          </div>
          <?php
                }
            } else {
              echo '<h2>No Records Found</h2> ';
            }
            $sql1 = "SELECT COUNT(post_id) AS totalRows FROM post 
            WHERE category = {$category_id}";
            $result1 = mysqli_query($conn, $sql1) or die("User Query Failed");
            $rows = mysqli_fetch_assoc($result1)['totalRows'];
            $pages = ceil($rows / $pageSize);
        ?>
        <ul class='pagination admin-pagination'>
        <?php if ($pageNo > 1) { ?>
          <li><a href="category.php?category_id=<?php echo($category_id) ?>&page=<?php echo($pageNo - 1) ?>">Prev</a></li>
          <?php }
            for ($page = 1; $page <= $pages; $page++) { ?>
            <li class="<?php echo $page == $pageNo ? 'active' : '' ?>">
              <a href="category.php?category_id=<?php echo($category_id) ?>&page=<?php echo($page) ?>">
                <?php echo $page ?>
              </a>
            </li>
          <?php } 
          if ($pageNo < $pages) { ?>
              <li><a href="category.php?category_id=<?php echo($category_id) ?>&page=<?php echo($pageNo + 1) ?>">Next</a></li>
          <?php } ?>
        </ul>
        </div>
        <!-- /post-container -->
      </div>
      <?php include 'sidebar.php'; ?>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>