<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Add New Post</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <!-- Form -->
        <form action="add-post-save.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="description"> Description</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control">
              <option value="-1" selected disabled> Select Category</option>
              <?php 
                include 'config.php';
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql) or die("Select Category Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                <option value="<?php echo $row['category_id'] ?>">
                  <?php echo $row['category_name'] ?>
                </option>
              <?php
                    }
                }?>
            </select>
          </div>
          <div class="form-group">
            <label for="post_image">Post image</label>
            <input type="file" name="post_image" required>
          </div>
          <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
        </form>
        <!--/Form -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>