

<?php
  echo '<h3><a href="0.php">Home</a></h3>';
  print "<h1> CORE PHP </h1>";
  print  "<h2> 1. DataTypes (string, int, float, array, object) </h2>";
  $name = 'Hello Quaid-e-Azam ';
  $list = array("HTML", "CSS", "JS", 5, 3.2, array("a","b"));
  print "<h2> 2. Printing DataTypes and Values</h2>";
  var_dump($list);
  var_dump($name);
  var_dump("");
  var_dump(23);
  var_dump(23.36);
  echo "<br>";
  print "<h2>3. Comments </h2>";
  # Single Line
  /*
    Multiple Line Comment
  */
  print "<h2> 4. Reassigned Variables and DataTypes</h2>";
  $a4 = 0;
  $a4 = 2.5;
  $a4 = "My String";
  $a4 = array("abc", "efg");
  var_dump($a4);
  echo "<br>";
  print "<h2> 5. Constant Variables </h2>";
  print "<i> is using when you don't want to change to DataTypes or values of the Constant Variable doesn't requred $ Sign </i> <br>";
  define('num', 300, false);
  echo num;
  print "<h2> 6. Arthematics Operator (+, -, *, /, %, ** Power) </h2>";
  print "<h2> 6. Increment Operator (PostIncrement and PreIncrement ++,--) </h2>";
  $num6_1 = 10;
  $num6_2 = 3;
  $num6_3 = $num6_1 ** $num6_2;
  print $num6_3;
  print "<h2> 7. Assignment Operator (=, +=, -=, *=, /=, %=) </h2>";
  $num7 = 10;
  $num7 %= 3;
  print $num7;
  echo "<h2>String Operators & Concatenations</h2>";
  $v = "Hello";
  $v ." Ahsan";
  $v . " How is the Day";
  echo $v;
  print "<h2> 8. Comparision Operator (==, === DataTypes, !=, !==, <>, <, <=, >, >=, ) </h2>";
  $a = 20; $b = "20";
  echo $a !== $b;
?>