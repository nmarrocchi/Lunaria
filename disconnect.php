<?php
  session_start();
  require("session.php");

  $_SESSION['logged'] = 0;
  $_SESSION['user'] = "";

  session_destroy();

  header("location: index.php");
?>