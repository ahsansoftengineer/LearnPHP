<?php 
  include "header.php"; 
  include "config.php";

  if(isset($_POST['submit'])){
    echo $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    echo $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    echo $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    echo $username = mysqli_real_escape_string($conn, $_POST['username']);
    echo $role = mysqli_real_escape_string($conn, $_POST['role']);
    $sql1 = "UPDATE user SET 
      first_name = '{$fname}', 
      last_name = '{$lname}', 
      username = '{$username}', 
      role = '{$role}' WHERE user_id = '{$user_id}'";
      if(mysqli_query($conn, $sql1)){
        header("Location: {$hostname}admin/users.php");
      } else {
        echo $sql1;
      }
  }
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Modify User Details</h1>
      </div>
      <div class="col-md-offset-4 col-md-4">
        <!-- Form Start -->
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
          <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM user WHERE user_id = '{$id}'";
            $result = mysqli_query($conn, $sql) or die("Get User Query Failed.");
            if(mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)) {
                  ?>
          <div class="form-group">
            <input type="hidden" name="user_id" class="form-control" value="<?php echo $id ?> ">
          </div>
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name'] ?>" required>
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name'] ?>" required>
          </div>
          <div class="form-group">
            <label>User Name</label>
            <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" required>
          </div>
          <div class="form-group">
            <label>User Role</label>
            <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
              <option <?php echo $row['role'] == 0 ? 'selected':'' ?>>Normal</option>
              <option <?php echo $row['role'] == 1 ? 'selected':'' ?>>Admin</option>
            </select>
          </div>
          <?php
              }
            }
          ?>
          <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
        </form>
        <!-- /Form -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>