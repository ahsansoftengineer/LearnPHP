<h2>PHP FILES</h2>
<a href="0.php">Home</a>
<?php
  if(isset($_FILES['image'])){
    echo "<pre>";
      print_r($_FILES);
    echo "</pre>";
    echo $_FILES['image']['name'];
    move_uploaded_file(
      $_FILES['image']['tmp_name'], 
      'upload/'.$_FILES['image']['name']
    );
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Files Upload</title>
</head>
<body>
  <form action="" method="POST" enctype="multipart/form-data" >
    <input type="file" name="image">
    <input type="submit" value="Upload the File" />
  </form>
</body>
</html>