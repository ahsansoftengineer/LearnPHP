<?php
  echo '<h2><a href="0.php">Home</a></h2>';
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
  echo "<h2>3. Multidimensional Array For Loop</h2>";
  $employees = [
    [1,"Ahsan", "PHP Developer", 85000],
    [2,"Asim", "PHP Developer", 25000],
    [3,"Sami", "PHP Developer", 150000],
    [4,"Sumaya", "School Teacher", 25000],
  ];
  echo "<pre>";
    print_r($employees);
  echo "</pre>";
  echo "
  <table>
    <tr>
      <td>S No</td>
      <td>Name</td>
      <td>Appointment</td>
      <td>Salary</td>
    </tr>
  ";
  for($i = 0; $i < sizeof($employees); $i++ ){
    echo "<tr>";
    for($ii = 0; $ii < sizeof($employees[$i]); $ii++ ){
      echo "<td>"; 
      echo $employees[$i][$ii];     
      echo "</td>";      
    }  
    echo "</tr>";
  }
  echo "</table>";

  echo "<h2>4. Multidimensional Array Foreach </h2>";
  
  echo "
  <table>
  <tr>
    <td>S No</td>
    <td>Name</td>
    <td>Appointment</td>
    <td>Salary</td>
  </tr>
";
  foreach($employees as $employee){
    echo "<tr>";
    foreach($employee as $field){
      echo "<td>$field</td>"; 
    }
    echo "</tr>";
  }
  echo "</table>";

  echo "<h2>5. Multidimensional Assosiative Array </h2>";
  $students = [
    "Ahsan" => [
      "physics" => 85,
      "maths" => 40,
      "chemistry" => 70,
    ],
    "Sami" => [
      "physics" => 85,
      "maths" => 90,
      "chemistry" => 92,
    ],
    "Qasim" => [
      "physics" => 30,
      "maths" => 20,
      "chemistry" => 40,
    ],
  ];
  echo "<pre>";
    print_r($students);
  echo "</pre>";

  echo "
  <table>
    <tr>
      <th>Name</th>
      <th>Physics</th>
      <th>Maths</th>
      <th>Chemistry</th>
    </tr>
  ";
  foreach($students as $name => $student){
    echo "<tr>";
      echo "<th>$name</th>"; 
      foreach($student as $field){
      echo "<td>$field</td>"; 
    }
    echo "</tr>";
  }
  echo "</table>";



?>