<?php 
  include "header.php";
  include "config.php";

  if(isset($_POST['save'])){
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    $sql1 = "UPDATE category SET category_name = '{$category_name}' 
      WHERE category_id = {$category_id}";
    if(mysqli_query($conn, $sql1)){
        header("Location: {$hostname}admin/category.php");
    } else {
        echo $sql1;
    }
  }
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="adin-heading"> Update Category</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <?php
            $id = 0;
            if(isset($_GET['id'])){
              $id = $_GET['id'];
            }
            $sql = "SELECT * FROM category WHERE category_id = '{$id}'";
            $result = mysqli_query($conn, $sql) or die("Get User Query Failed.");
            if(mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)) {
                  ?>
          <div class="form-group">
            <input type="hidden" name="category_id" class="form-control" 
            value="<?php echo $row['category_id'] ?>" placeholder="">
          </div>
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="category_name" class="form-control" 
            value="<?php echo $row['category_name'] ?>" required>
          </div>
          <div class="form-group">
            <label>No of Post</label>
            <input type="text" disabled class="form-control" 
            value="<?php echo $row['post'] ?>" >
          </div>
          <?php
              }
            }
          ?>
          <input type="submit" name="save" class="btn btn-primary" value="Update" required />
        </form>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>