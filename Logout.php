<?php
   session_start();
   unset($_SESSION["Email"]);
   unset($_SESSION["Password"]);
   unset($_SESSION["score"]);
   unset($_SESSION['Question']);
   unset($_SESSION['a']);
   unset($_SESSION['b']);
   unset($_SESSION['c']);
   unset($_SESSION['d']);
   unset($_SESSION['id']);
   unset($_SESSION['duration']);
   unset($_SESSION['response']);
   header('location:index.php');
?>
