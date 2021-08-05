<?php
  echo '<h3><a href="0.php">Home</a></h3>';
  echo " <h2>If Statement & String Operators</h2> ";
  $a = 20;
  $b = "20";
  if($a !== $b):
    echo "A !== B";
  endif;
  echo " <h2>Logical Operator (&&, and, ||, or, xor Exclusive OR)</h2>";
  if($a === $b ){
    echo "A === B";
  } 
  elseif($a == $b+1){
    echo "A == B";
  }else {
    echo "Else Part";
  };
  if(!($a != $b)){
    echo " <p>!(a == b)</p>";
  }
  if(1 == 2 xor 2 == 2){
    echo " <p>1 == 2 xor 2 ==2";
  }
  echo " <h2>Switch Statements</h2>";
  $weekDay = 10;
  switch($weekDay){
    case 1:
      echo"Monday";
      break;
    case 2:
      echo"Tuesday";
      break;
    case 3:
      echo"Wednesday";
      break;
    case 4:
      echo"Thursday";
      break;
    case 5:
      echo"Friday";
      break;
    case 6:
      echo"Saturday";
      break;
    case 7:
      echo"Sunday";
      break;
    default:
      echo "Out of 1-7";
  }
  echo "<br>";
  $age = 2;
  switch(true){
    case ($age > 1 and $age < 3):
      echo "age > 1 and age < 3 <br>";
      break;
    case ($age > 3 and $age < 5):
      echo "age > 3 and age < 5 <br>";
      break;
    default:
      echo "Default Printed";
      break;
  }


?>