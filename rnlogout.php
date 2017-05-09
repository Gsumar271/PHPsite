<?php
include_once 'rnheader.php';

if (isset($_SESSION['user']))
{
    destroySession();
    echo "<h3>Log out</h3> You have been logged out. Please
          <a href='index.php'>click here</a> to refresh the screen.";
}
else echo "<h3> Log out</h3> You are not logged in";


?>
