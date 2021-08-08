<?php
  include "header.php";
  if(!$_SESSION['user_role'] == 1){
    header("Location: {$hostname}admin/post.php");
  }
  include "config.php";
  $pageNo = 1;
  if(isset($_GET['page'])){
    $pageNo = $_GET['page'];
  }
  $pageSize = 5;
  $offset = ($pageNo - 1) * $pageSize;
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">All Users</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-user.php">add user</a>
      </div>
      <div class="col-md-12">
        <table class="content-table">
          <thead>
            <th>S.No.</th>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset}, {$pageSize}";
            $result = mysqli_query($conn, $sql) or die("User Query Failed");
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td class='id'><?php echo $row['user_id'] ?> </td>
                  <td><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></td>
                  <td><?php echo $row['username'] ?></td>
                  <td><?php echo $row['role'] == 1 ? 'Admin' : 'Normal' ?></td>
                  <td class='edit'>
                    <a href='update-user.php?id=<?php echo $row['user_id'] ?>'>
                      <i class='fa fa-edit'></i>
                    </a>
                  </td>
                  <td class='delete'>
                    <a href='delete-user.php?id=<?php echo $row['user_id'] ?>'>
                      <i class='fa fa-trash-o'></i>
                    </a>
                  </td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
        <?php 
            $sql1 = "SELECT COUNT(user_id) AS totalRows FROM USER";
            $result1 = mysqli_query($conn, $sql1) or die("User Query Failed");
            $rows = mysqli_fetch_array($result1)[0];
            $pages = ceil($rows / $pageSize);
        ?>
        <ul class='pagination admin-pagination'>
        <?php if ($pageNo > 1) { ?>
          <li><a href="users.php?page=<?php echo($pageNo - 1) ?>">Prev</a></li>
          <?php }
            for ($page = 1; $page <= $pages; $page++) { ?>
            <li class="<?php echo $page == $pageNo ? 'active' : '' ?>">
              <a href="users.php?page=<?php echo $page ?>">
                <?php echo $page ?>
              </a>
            </li>
          <?php } 
          if ($pageNo < $pages) { ?>
              <li><a href="users.php?page=<?php echo($pageNo + 1) ?>">Next</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>