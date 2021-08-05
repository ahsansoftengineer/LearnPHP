<h2>CREATE SESSION</h2>
<a href="0.php">Home</a>
<?php
    session_start();
    $_SESSION['Ahsan'] = "This string is Stored in Session";
    echo $_SESSION['Ahsan'];
?>
<a href="10.1.php">Check Session</a>'