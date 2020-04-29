<! Logout function>

<?php
      session_start();
      session_unset();
      session_destroy();
      header("Location: /CMPE131PROJECT-master/homepage.php");

 ?>
