<?php
function prints($array){
  echo "<pre>";
    print_r($array);
  echo "</pre>";
}
function mainHeading($Heading){
  echo '<h2>'.$Heading.'</h2>';
}
  MainHeading('<a href="0.php">Home</a>');
  MainHeading("SUPER GLOBAL Variables");
  print '
    <ol>
      <li>$_GET</li>
      <li>$_POST</li>
      <li>$_REQUEST</li>
      <li>$_SERVER</li>
      <li>$_COOKIE</li>
      <li>$_SESSION</li>
      <li>$_FILES</li>
    </ol>
  '
?>
<html>
  <head>
    <title>Form Page</title>
  </head>
  <body>
    <h2>GET REQUEST</h2>
    <form action="8.1.php" method="get">
      <table border="1">
        <tr>
          <td>Name</td>
          <td>
            <input type="text" name="fname" />
          </td>
        </tr>
        <tr>
          <td>Age</td>
          <td>
            <input type="text" name="age" />
          </td>
        </tr>
          <tr>
            <td> <input type="submit" value="GET" >  </td>
          </tr>
      </table>
    </form>
    <h2>POST REQUEST</h2>
    <form action="8.1.php" method="post">
      <table border="1">
        <tr>
          <td>Name</td>
          <td>
            <input type="text" name="fname" />
          </td>
        </tr>
        <tr>
          <td>Age</td>
          <td>
            <input type="text" name="age" />
          </td>
        </tr>
          <tr>
            <td> <input type="submit" value="POST" >  </td>
          </tr>
      </table>
    </form>
    <h2>$_SERVER Submit the Form on the Same Page</h2>
    <form action=" <?php echo $_SERVER['PHP_SELF'] ?> " method="get">
      <table border="1">
        <tr>
          <td>Name</td>
          <td>
            <input type="text" name="fname" />
          </td>
        </tr>
        <tr>
          <td>Age</td>
          <td>
            <input type="text" name="age" />
          </td>
        </tr>
          <tr>
            <td> <input type="submit" name="save" value="PHP_SELF" >  </td>
          </tr>
      </table>
    </form>
    <?php 
      if(isset($_GET['save'])){
        echo "<pre>";
          print_r($_GET);
        echo "</pre>";
      }
      echo "<pre>";
        print_r($_SERVER);
      echo "</pre>";
    ?>
  </body>
</html>


