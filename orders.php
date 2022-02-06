<?php
    session_start();
    require("session.php");
    CheckIfIsLog();

    $admin = $bdd->query("SELECT * FROM users WHERE username='".$_SESSION['user']."' ");
    $admin = $admin->fetch();
    $deleteOrdersMsg = "";

    if($admin['isAdmin'] != 1){header("location: index.php");}

      // - When submit pressed, delete selected orders
      if(isset($_POST['submit']))
      {
        if(!empty($_POST['orderfish']))
        {    
            foreach($_POST['orderfish'] as $value)
            {
              $bdd->query("DELETE FROM orders WHERE id = '".$value."'");
            }
            $deleteOrdersMsg = "ALL SELECTED ORDERS SUCCESSFULLY DELETED !!";
        }
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
    <link rel="stylesheet" href="style/orders.css">
    <title>Lunaria | Orders</title>
</head>
<body>

    <?php 
      include "include/nav.php";
      $orders = $bdd->query("SELECT * FROM orders ORDER BY user");
    ?>
        
    <div class="content">

      <form action="" method="post">
        <table class="orderList">
          <tr>
            <td></td>
            <td class="THeader"><p>User</p></td>
            <td class="THeader"><p>Fish</p></td>
            <td class="THeader"><p>Quantity</p></td>
            <td class="THeader"><p>Price</p></td>
          </tr>
          
      <?php
        while ($orderList = $orders->fetch()){
      ?>

          <tr>
            <td>
                <input type="checkbox" name="orderfish[]" value="<?php echo $orderList['id'] ?>"> 
            </td>
            <td><?php echo $orderList['user'] ?></td>
            <td><?php echo $orderList['fish_fr'] ?></td>
            <td><?php echo $orderList['quantity'] ?></td>
            <td><?php echo $orderList['price'] ?></td>
          </tr>

          <?php
            }
          ?>
        </table>

        <input type="submit" name="submit" class="deleteOrderSubmit" value="DELETE ALL SELECTED ORDERS">
        <p class="deleteMsg"><?php echo $deleteOrdersMsg ?></p>
      </form>

      
    </div>
    
</body>
</html>