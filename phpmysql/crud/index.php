<?php
include 'header.php';
?>
<div id="main-content">
  <h2>All Records</h2>

  <table cellpadding="7px">
    <thead>
      <th>Id</th>
      <th>Name</th>
      <th>Address</th>
      <th>Class</th>
      <th>Phone</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      include 'config.php';
      $sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";
      // $sql = "SELECT * FROM test";
      $result = mysqli_query($conn, $sql) or die("Student Query Failed");
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <tr>
            <td><?php echo $row['sid'] ?></td>
            <td><?php echo $row['sname'] ?></td>
            <td><?php echo $row['saddress'] ?></td>
            <td><?php echo $row['cname'] ?></td>
            <td><?php echo $row['sphone'] ?></td>
            <td>
              <a href='edit.php?id=<?php echo $row['sid'] ?>'>Edit</a>
              <a href='inline-delete.php?id=<?php echo $row['sid'] ?>'>Delete</a>
            </td>
          </tr>
        <?php }
      } else { ?>
        <tr>
          <td colspan="6">No Students Found</td>
        </tr>
      <?php }
      mysqli_close($conn); ?>
    </tbody>
  </table>
</div>
</div>
</body>

</html>