<?php
  //signout
  setcookie('user', '', time() - 3600, '/');
  header('Location: ./home.php');
?>