<?php
    echo '<h3><a href="0.php">Home</a></h3>';
    echo "<h2>While Loops</h2>";
    $a = 1;
    while($a <= 5){
      echo $a."<br>";
      $a++;
    }
    echo "<h2>Do While Loops</h2>";
    $a = 1;
    do{
      echo $a."<br>";
      $a++;
    }while($a <= 5);

    echo "<h2>For Loop</h2>";
    for($a = 1; $a <= 5; $a++){
      echo $a."<br>";
    }
    echo "<table>";
    for($a = 1; $a <= 100; $a+=10){
      echo "<tr>";
      for($b = $a; $b < $a + 10; $b++){
        if($b == 45){
          continue;
        }
        if($b % 11 == 0){
          echo "<td style='padding:2px;'>Eleven</td>";
        }else{
          echo "<td style='padding:2px;'>".$b."</td>";
        }
        if($b ==95){
          break;
        }
      }
      echo "</tr>";
    }

    echo "</table>";

    echo "<h2>Goto Statements</h2>";
    $a = true;
    a:
    echo "1";
    echo "1";
    echo "1";
    if($a){
      echo "goto Execute repeated Action";
      $a = false;
      goto a;
    }



?>