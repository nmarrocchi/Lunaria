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

      <?php 
        $orders = $bdd->query("SELECT * FROM orders WHERE user = '".$_SESSION["user"]."' ");
        $totalOrder = 0;
      ?>

      <table class="userOrder">

        <tr>
          <td colspan="2" class="orderHeader">Orders</td>
        </tr>
        <?php while($ordersFishs = $orders->fetch()){ $totalOrder += $ordersFishs["price"]?>

        <tr>
          <td><?php echo $ordersFishs["fish_fr"] ?> / <?php echo $ordersFishs["fish_eng"] ?></td>
          <td><?php echo $ordersFishs["price"] ?></td>
        </tr>

        <?php } ?>
        <tr>
          <td colspan="2" class="totalOrder"><p>Total order : <?php echo $totalOrder ?> flux</p></td>
        </tr>
      </table>

    </div>
    
</body>
</html>