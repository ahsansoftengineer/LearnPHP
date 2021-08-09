<?php
  include 'config.php';
  if(empty($_FILES['post_img']['name'])){
    $file_name = $_POST['old_img'];
  }else {
    $errors = array();
    $file_name = $_FILES['post_img']['name'];
    $file_size = $_FILES['post_img']['size'];
    $file_tmp_name = $_FILES['post_img']['tmp_name'];
    $file_type = $_FILES['post_img']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));
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
  // Recived Fields from FORM
  $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  // Auto Generated Fields
  $post_date = date("d M, Y");
  session_start();
  $author = $_SESSION['user_id'];
  $sql = "UPDATE post SET
    title = '{$title}', description = '{$description}', category ={$category}, 
    post_date = '{$post_date}', author = {$author}, post_img = '{$file_name}'
    WHERE post_id = {$post_id}";
  // To Run Multiple query in Database
  $result = mysqli_query($conn, $sql); 
  if($result){
    header("Location: {$hostname}admin/post.php");
  } else {
    echo 'Update Post Query Failed <br>'.$sql;
  }

?>