<?php 
  include "config.php";
    // Recived Fields from FORM
    echo $title = mysqli_real_escape_string($conn, $_POST['title']);
    echo $description = mysqli_real_escape_string($conn, $_POST['description']);
    echo $category = mysqli_real_escape_string($conn, $_POST['category']);
    // Auto Generated Fields
    echo $post_date = date("d M, Y");
    session_start();
    echo $author = $_SESSION['user_id'];
    // File Uploads
    if(isset($_FILES['post_image'])){
      $errors = array();
      $file_name = $_FILES['post_image']['name'];
      $file_size = $_FILES['post_image']['size'];
      $file_tmp_name = $_FILES['post_image']['tmp_name'];
      $file_type = $_FILES['post_image']['type'];
      echo $file_ext = strtolower(end(explode('.', $file_name)));
      $extensions = array("jpeg", "jpg", "png");
      if(!in_array($file_ext, $extensions)){
        $errors[]= "This extension file not allowed, Please Choose (JPG, JPEG & PNG)";
      }
      if($file_size > 2097125){
        $errors[]= "File Size must be < 2MB";
      }
      if(empty($errors)){
        move_uploaded_file($file_tmp_name, "upload/".$file_name);
      } else {
        print_r($errors);
        die();
      }
    }
    $sql = "INSERT INTO POST (title, description, category, post_date, author, post_img)
      VALUES ('{$title}', '{$description}', '{$category}', '{$post_date}', '{$author}', '{$file_name}');";
    $sql .= "UPDATE category SET post = post + 1 WHERE category_id = '{$category}'";
    // To Run Multiple query in Database
      if(mysqli_multi_query($conn, $sql)){
        header("Location: {$hostname}admin/post.php");
      } else {
        echo $sql;
      }
?>