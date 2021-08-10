<?php 
  include "header.php"; 
  include "config.php";
  if(!$_SESSION['user_role'] == 1){
    header("Location: {$hostname}admin/post.php");
  }
  include "config.php";
  $pageNo = 1;
  if(isset($_GET['page'])){
    $pageNo = $_GET['page'];
  }
$offset = ($pageNo - 1) * $pageSize;
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">All Categories</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-category.php">add category</a>
      </div>
      <div class="col-md-12">
        <table class="content-table">
          <thead>
            <th>S.No.</th>
            <th>Category Name</th>
            <th>No. of Posts</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT * FROM category 
              ORDER BY category_id 
              DESC LIMIT {$offset}, {$pageSize};";
            $result = mysqli_query($conn, $sql) or die("Query Failed : Category GET");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td class='id'><?php echo $row['category_id'] ?></td>
              <td><?php echo $row['category_name'] ?></td>
              <td><?php echo $row['post'] ?></td>
              <td class='edit'>
                <a href='update-category.php?id=<?php echo $row['category_id'] ?>'>
                  <i class='fa fa-edit'></i>
                </a>
              </td>
              <td class='delete'>
                <a href='delete-category.php?id=<?php echo $row['category_id'] ?>'>
                  <i class='fa fa-trash-o'></i>
                </a>
              </td>
            </tr>
            <?php }}?>
          </tbody>
        </table>
        <?php 
            $sql1 = "SELECT COUNT(category_id) AS totalRows 
            FROM category ";
            $result1 = mysqli_query($conn, $sql1) or die("User Query Failed");
            $rows = mysqli_fetch_array($result1)[0];
            $pages = ceil($rows / $pageSize);
        ?>
        <ul class='pagination admin-pagination'>
        <?php if ($pageNo > 1) { ?>
          <li><a href="category.php?page=<?php echo($pageNo - 1) ?>">Prev</a></li>
          <?php }
            for ($page = 1; $page <= $pages; $page++) { ?>
            <li class="<?php echo $page == $pageNo ? 'active' : '' ?>">
              <a href="category.php?page=<?php echo $page ?>">
                <?php echo $page ?>
              </a>
            </li>
          <?php } 
          if ($pageNo < $pages) { ?>
              <li><a href="category.php?page=<?php echo($pageNo + 1) ?>">Next</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>