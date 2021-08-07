<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
  <?php
      include 'config.php';
      $stu_id = $_GET['id'];
      $sql = "SELECT * FROM student WHERE sid = {$stu_id}";
      $result = mysqli_query($conn, $sql) or die("Update Student Unsuccessful.");
      if (mysqli_num_rows($result) > 0) {
          while ($r = mysqli_fetch_assoc($result)) {
              ?>
    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="sid" value="<?php echo $r['sid'] ?>"/>
          <input type="text" name="sname" value="<?php echo $r['sname'] ?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="saddress" value="<?php echo $r['saddress'] ?>"/>
      </div>
      <div class="form-group">
          <label>Class</label>
          <select name="sclass">
              <option value="" selected disabled>Select Class</option>
              <?php 
              $sql1 = "SELECT * FROM studentclass";
              $result1 = mysqli_query($conn, $sql1) or die("Update Student Unsuccessful.");
              if (mysqli_num_rows($result1) > 0) {
                  while ($r1 = mysqli_fetch_assoc($result1)) {
                      ?>
                <option <?php echo $r1['cid'] == $r['sclass'] ? 'selected' : '' ?> 
                  value="<?php echo $r1['cid'] ?>">
                  <?php echo $r1['cname'] ?>
                </option>
              <?php
                  }
              }
              ?>
          </select>
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="sphone" value="<?php echo $r['sphone'] ?>"/>
      </div>
      <input class="submit" type="submit" value="Update"/>
    </form>
    <?php
          }
      }
    ?>
</div>
</div>
</body>
</html>
