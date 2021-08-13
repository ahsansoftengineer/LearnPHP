<?php 
  include "header.php"; 
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
        <h1 class="admin-heading">All Posts</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-post.php">add post</a>
      </div>
      <div class="col-md-12">
        <table class="content-table">
          <thead>
            <th>S.No.</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Author</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT p.post_id, p.title, p.post_date, p.category, c.category_name, 
            u.first_name FROM post AS p 
            LEFT JOIN category AS c ON p.category = c.category_id 
            LEFT JOIN user AS u ON p.author = u.user_id ";
            if($_SESSION["user_role"] == "0"){
              $sql .= " WHERE u.user_id = ".$_SESSION["user_id"];
            }
            $sql .= " ORDER BY post_id DESC LIMIT {$offset}, {$pageSize};";

            $result = mysqli_query($conn, $sql) or die("User Query Failed");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td class='id'><?php echo $offset+=1 ?></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['category_name'] ?></td>
              <td><?php echo $row['post_date'] ?></td>
              <td><?php echo $row['first_name'] ?></td>
              <td class='edit'>
                <a href="update-post.php?id=<?php echo $row['post_id'] ?>">
                  <i class='fa fa-edit'></i>
                </a>
              </td>
              <td class='delete'>
                <a href="delete-post.php?post_id=<?php echo $row['post_id'] ?>&category_id=<?php echo $row['category'] ?>">
                  <i class='fa fa-trash-o'></i>
                </a>
              </td>
            </tr>
            <?php 
              }
            }?>
          </tbody>
        </table>
        <?php 
            $sql1 = "SELECT COUNT(post_id) AS totalRows 
            FROM post
            LEFT JOIN user ON author = user_id";
            if($_SESSION["user_role"] == "0"){
              $sql1 .= " WHERE user_id = ".$_SESSION["user_id"];
            }
            $result1 = mysqli_query($conn, $sql1) or die("User Query Failed");
            $rows = mysqli_fetch_array($result1)[0];
            $pages = ceil($rows / $pageSize);
        ?>
        <ul class='pagination admin-pagination'>
        <?php if ($pageNo > 1) { ?>
          <li><a href="post.php?page=<?php echo($pageNo - 1) ?>">Prev</a></li>
          <?php }
            for ($page = 1; $page <= $pages; $page++) { ?>
            <li class="<?php echo $page == $pageNo ? 'active' : '' ?>">
              <a href="post.php?page=<?php echo $page ?>">
                <?php echo $page ?>
              </a>
            </li>
          <?php } 
          if ($pageNo < $pages) { ?>
              <li><a href="post.php?page=<?php echo($pageNo + 1) ?>">Next</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>