<?php
function prints($array){
  echo "<pre>";
    print_r($array);
  echo "</pre>";
}
function mainHeading($Heading){
  echo '<h2>'.$Heading.'</h2>';
}
  echo '<h2><a href="0.php">Home</a></h2>';
  echo "<h2>1. PHP Core Functions</h2>";
  $employees = [
    [1,"Ahsan", "PHP Developer", 85000],
    [2,"Asim", "PHP Developer", 25000],
    [3,"Sami", "PHP Developer", 150000],
    [4,"Sumaya", "School Teacher", 25000],
  ];
  $fruits = array("banana", "mango", "chiko", 6, "banana", "mango", "banana" );
  echo " <h2>2 count()</h2> ";
  echo count($employees);
  echo " <h2>sizeof()</h2> ";
  echo sizeof($employees);
  echo " <h2>3 array_count_values()</h2> ";
  prints(array_count_values($fruits));


  echo " <h2>4 in_array('search', array, true)</h2>";
  if(in_array("banana", $fruits)){
    echo"Banana Exsist in List";
  }else {
    echo"Banana not Exsist in List";
  }
  echo "<br>";
  if(in_array("6", $fruits, true)){
    echo"'6' string Exsist in List";
  }else {
    echo"'6' string not Exsist in List b/c it was Number";
  }
  echo " <h2>5 array_replace(oldArray, newArray)</h2>";
  $vegi = ["Bhindi", "Pea"];
  $newArray = array_replace($fruits, $vegi);
  prints($newArray);
  $colors = ["purple", "yello", "pink"];
  echo " <h2>6 array_replace(oldArray, replaceArray1, replaceArray2)</h2>";
  $newArray = array_replace($fruits, $vegi, $colors);
  prints($newArray);
  echo " <h2>7 Replace Specific Index</h2>";
  echo " <h2>array_replace(oldArray, [3 =>'MyNewValue'])</h2>";
  $newArray = array_replace($fruits, [3 =>'MyNewValue']);
    prints($newArray);
  echo " <h2>Recursive Replacing Array</h2>";
  echo '<h2>8 array_replace_recursive($arrayA, ["b" => ["maroon"]]); </h2>';
  $arrayA = ["a" => ["red"], "b" => ["green", "yellow"]];
  $newArray = array_replace_recursive($arrayA, ["b" => ["maroon"]]);
    prints($newArray);
  echo '<h2>FIFO / LIFO FUNCTIONS</h2>';
  echo '<h2>9 array_pop($fruits);</h2>';
  $pop = array_pop($fruits);
  echo $pop;
  echo '<h2>10 array_push($fruits, "Cherry");</h2>';
  array_push($fruits, "Cherry");
  echo "<pre>";
    print_r($fruits);
  echo "</pre>";
  echo '<h2>11 array_shift($fruits);</h2>';
  array_shift($fruits);
  echo "<pre>";
    print_r($fruits);
  echo "</pre>";
  echo '<h2>12 array_unshift($fruits, "Pin Apple", " Alpha");</h2>';
  array_unshift($fruits,"Pin Apple", "Alpha");
  echo "<pre>";
    print_r($fruits);
  echo "</pre>";
  echo '<h2>13 array_merge($fruits, $vegi, $colors);</h2>';
  echo ' <p>In Associative Array if Arrays have same Index then they gets Merged</p> ';
  $merging = array_merge($fruits, $vegi, $colors);
  echo "<pre>";
    print_r($merging);
  echo "</pre>";
  echo '<h2>14 array_slice($merging, 1, 9);</h2>';
  echo '<p>14 array_slice($merging, -1, 3); for selecting the reverse order</p>';
  $result = array_slice($merging, 1, 9);
  echo "<pre>";
    print_r($result);
  echo "</pre>";
  echo '<h2>15 array_splice($fruits, 0, 2, $colors);</h2>';
  $result = array_splice($fruits, 0, 2, $colors);
  echo "<pre>";
    print_r($result);
  echo "</pre>";
  echo '<h2>16 array_key_exists("car", $kvp);</h2>';
  echo '<p>key_exists("car", $kvp);array_key_first("$kvp); array_key_last($kvp);</p>';
  $kvp = ["car" => "Suzuki", "bike" => "Honda", "truck" => "Toyota",  ];
  $result = array_key_exists("car", $kvp);
  echo "<pre>";
    print_r($result);
  echo "</pre>";
  $result = array_key_last($kvp);
  echo "<pre>";
    print_r($result);
  echo "</pre>";
  echo '<h2>17 array_intersect("car", $kvp);</h2>';
  echo '<p>
    <i></i>
    array_intersect_key, array_intersect_assoc, array_intersect_uassoc, 
    array_uintersect, array_uintersect_assoc, array_uintersect_uassoc
  </p>';
  $result = array_intersect_key($fruits, $merging);
  echo "<pre>";
    print_r($result);
  echo "</pre>";
  echo '<h2>18 array_diff();</h2>';
  echo '<p>
    <i></i>
    array_diff_key, array_diff_assoc, array_diff_uassoc, 
    array_diff_ukey, array_udiff array_udiff_assoc, array_udiff_uassoc
  </p>';
  $result = array_diff($fruits, $merging);
  echo "<pre>";
    print_r($result);
  echo "</pre>";


?>