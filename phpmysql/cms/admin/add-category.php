<?php include "header.php"; 
if(isset($_POST['save'])){
  include "config.php";
  echo $categoryName = mysqli_real_escape_string($conn, $_POST['cat']);

  $sql = "SELECT username FROM user WHERE username = '{$user}'";
  $result = mysqli_query($conn, $sql) or die("Query Failed.");
  if(mysqli_num_rows($result) > 0){
    echo "User Name Already Exsists.";
  } else {
    $sql1 = "INSERT INTO user (first_name, last_name, username, password, role)
      VALUES ('{$fname}', '{$lname}', '{$user}', '{$password}', '{$role}')";
      if(mysqli_query($conn, $sql1)){
        header("Location: {$hostname}admin/users.php");
      } else {
        echo $sql1;
      }
  }

}

?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Add New Category</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <!-- Form Start -->
        <form action="" method="POST" autocomplete="off">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="cat" class="form-control" required>
          </div>
          <input type="submit" name="save" class="btn btn-primary" value="Save" required />
        </form>
        <!-- /Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>