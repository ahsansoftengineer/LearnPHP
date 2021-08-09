<?php include "header.php";?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <?php
          $post_id = $_GET['id'];
          $sql = "SELECT p.title, p.description, p.post_img, p.category, 
          c.category_name
          FROM post AS p 
          LEFT JOIN category AS c ON p.category = c.category_id 
          WHERE p.post_id = {$post_id}";
          $result = mysqli_query($conn, $sql) or die("Update Post Query Failed");
          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) { ?>
          <form action="update-post-save.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
              <input type="hidden" name="post_id" class="form-control" 
              value="<?php echo $post_id ?>">
            </div>
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" name="title" class="form-control" id="exampleInputUsername" value="<?php echo $row['title'] ?>">
            </div>
            <div class="form-group">
              <label for=""> Description</label>
              <textarea name="description" class="form-control" required rows="5"><?php echo $row['description'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="">Category</label>
              <select name="category" class="form-control">
              <option value="-1" selected disabled> Select Category</option>
              <?php 
                include 'config.php';
                $sql1 = "SELECT * FROM category";
                $result1 = mysqli_query($conn, $sql1) or die("Select Category Failed.");
                if (mysqli_num_rows($result1) > 0) {
                    while ($rows = mysqli_fetch_assoc($result1)) {
                        ?>
                <option
                  <?php echo $rows['category_id'] == $row['category'] ? 'selected' : '' ?>
                  value="<?php echo $rows['category_id'] ?>">
                  <?php echo $rows['category_name'] ?>
                </option>
              <?php
                    }
                }?>
            </select>
            </div>
            <div class="form-group">
              <label for="">Post image</label>
              <input type="file" name="post_img">
              <img src="upload/<?php echo $row['post_img'] ?>" height="150px">
              <input type="hidden" name="old_img" value="<?php echo $row['post_img'] ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
          </form>
        <?php 
          }
        }?>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>