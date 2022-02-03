<?php
    session_start();
    require("session.php");
    CheckIfIsLog();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/account.css">
    <title>Lunaria | My Account</title>
</head>
<body>

    <?php 
      include "include/nav.php";
      $date = $bdd->query("SELECT registration FROM users WHERE username='".$_SESSION['user']."' ");
      $date = $date->fetch();
    ?>

    <div class="content">
      <img class="guest" src="img/guest.png" alt="icon">
      <p>Welcome to Lunaria <?php echo $_SESSION['user'] ?></p>
      <p>You join Lunaria the <?php echo $date[0] ?></p>
    </div>
    
</body>
</html>