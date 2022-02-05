<?php
  session_start();
  require("session.php");
  if(!isset($_SESSION['Logged']))
  {
    $_SESSION['Logged'] = 0;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/nav.css">
  <title>Lunaria | Home</title>
</head>
<body>

<?php include "include/nav.php" ?>
  
</body>
</html>