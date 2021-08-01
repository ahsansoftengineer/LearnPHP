<?php
  echo '<h2><a href="0.php">Home</a></h2>';
  echo "<h2>1. List</h2>";
  $employees = [
    [1,"Ahsan", "PHP Developer", 85000],
    [2,"Asim", "PHP Developer", 25000],
    [3,"Sami", "PHP Developer", 150000],
    [4,"Sumaya", "School Teacher", 25000],
  ];
  $workers = [
    ["id"=>1,"name"=>"Ahsan", "appointment"=>"PHP Developer", "salary"=>1254],
    ["id"=>2,"name"=>"Asim", "appointment"=>"Clerk", "salary"=>2000],
    ["id"=>3,"name"=>"Mobin", "appointment"=>"Technician", "salary"=>9000],
    ["id"=>4,"name"=>"Ibrahim", "appointment"=>"Student", "salary"=>7500],
  ];
  foreach($employees as list($id, $name, $appointment, $salary)){
    echo "$id, $name, $appointment, $salary <br>";
  }
  foreach($workers as list("id" => $id, "name" => $name, "appointment" => $appointment, "salary" => $salary)){
    echo "$id, $name, $appointment, $salary <br>";
  }
?>