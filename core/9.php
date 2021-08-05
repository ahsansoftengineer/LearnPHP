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
  MainHeading("PHP COOKIES");
  echo "<i>setcookie(name, value, expire, path, domain, secure, httponly)</i>";
  // To Set Cookies
  setcookie('user', 'Yahoo Baba', time() + (86400 * 30), "/" );
  setcookie('admin', 'Yahoo Baba Admin', time() + (86400 * 30), "/" );
  setcookie('cookieToDelete', 'Delete This Cookie by removing time', time() + (86400 * 30), "/" );
  

?>
<html>
<head>
  <title>setcookie</title>
</head>
<body>
    <h2>
      <?php
        if(isset($_COOKIE['user'])){
          echo "User Cookie is set".$_COOKIE['user'];
        } else {
          echo "User Cookie is not Set";
        }
        // To Delete Cookie
        // setcookie('user', '', time() - (86400 * 30), "/" );
        // setcookie('admin', '', time() - (86400 * 30), "/" );
        // setcookie('delete', '', time() - (86400 * 30), "/" );
        setcookie('cookieToDelete', '', time() - (86400 * 30), "/" );

      ?>
      <pre>
        <?php
          print_r($_COOKIE)
        ?>
      </pre>


    </h2>
</body>
</html>