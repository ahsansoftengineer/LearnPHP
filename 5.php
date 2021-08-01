<?php
  echo '<h3><a href="0.php">Home</a></h3>';
  echo "<h2>1. Array</h2>";
  $colors = array("red", 20, "blue", "12.50");
  echo $colors[0]."<br>";
  echo $colors[1]."<br>";
  echo $colors[2]."<br>";
  echo $colors[3]."<br>";
  $name = ["Ahsan", "Asim", "Furqan", "Sami"];
  for($i = 0; $i < 4; $i++){
    echo $name[$i]."<br>";
  }
  var_dump($name);
  echo "<h2>2. Associative Array</h2>";
  $employee = [
    "name" => "Ahsan",
    "gender" => "Male",
    "salary" => 25000,
    "jobTitle" => "PHP Developer" 
  ];
  echo "<pre>";
    print_r($employee);
  echo "</pre>";
  var_dump($employee);
  echo $employee["name"];

  $choices = [
    1 => "King",
    2 => "Queen",
    3 => "Joker",
    4 => "Eka"
  ];
  echo "<pre>";
    print_r($choices);
  echo "</pre>";
  foreach($choices as $key => $value){
    echo $key ." = ". $value."<br>";
  }
  echo "<h3>3. Multidimentional Array </h2>";
  $employee = [
    [1,"Ahsan", "PHP Developer", 85000],
    [2,"Asim", "PHP Developer", 25000],
    [3,"Sami", "PHP Developer", 150000],
    [4,"Sumaya", "School Teacher", 25000],
  ];
  echo "<pre>";
    print_r($employee);
  echo "</pre>";
  echo "<table>";
  echo "
    <tr>
      <td>S No</td>
      <td>Name</td>
      <td>Appointment</td>
      <td>Salary</td>
    </tr>
  ";
  for($i = 0; $i < sizeof($employee); $i++ ){
    echo "<tr>";
    for($ii = 0; $ii < sizeof($employee[$i]); $ii++ ){
      echo "<td>"; 
      echo $employee[$i][$ii];     
      echo "</td>";      

    }  
    echo "</tr>";
  }
  echo "</table>";




?>