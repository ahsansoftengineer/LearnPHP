<?php
    echo '<h3><a href="0.php">Home</a></h3>';
    echo "<h2>1. Functions</h2>";
    echo "Method Overloading is not possible in PHP";
    function hello(){
      echo "Hello Worlds";
    }
    hello();
    echo "<h2>2. Parameterize Functions</h2>";

    function yelloWorld($yello, $world){
      echo $yello." ".$world;
    }
    yelloWorld("Pakistan", "Zindabad");
    echo "<h2>3. Return Functions</h2>";
    function mycalculate($firstNumber, $secondNumber){
      return ($firstNumber + $secondNumber)."<br>";
    }
    echo mycalculate(10, 20);
    echo "<h2>4. Reference Function</h2>";
    $var = " Some String";
    function refFunction(&$param){
       $param .=" has been Modified <br>";
    }
    refFunction($var);
    echo $var;

    echo "<h2>5. Factorial</h2>";
    function recursiveFunc($param){
      if($param < 1){
        return 1;
      }
      return $param * recursiveFunc($param -1);
    }
    $result = recursiveFunc(3); 
    echo $result;

    echo "<h2>5. Global Variable</h2>";
    $var = "Global Variable Printed 2 Twice <br> ";
    function globalFunc(){
      global $var;
      echo $var;
    }
    globalFunc();
    echo $var;

?>