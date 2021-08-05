<h2>DESTROYING SESSIONS</h2>
<?php
  session_start();
  session_unset();
  session_destroy();
  echo "Session is Distroyed"
?>
<a href="10.1.php">Check Session</a>
