<div class="banner">
  <a href="index.php"><img class="Logo" src="img/Banner.png" alt="Logo"></a>

  <div class="nav">
  <?php 

    if ($_SESSION['Logged'] == 1)
    {

  ?>

    <a href="marketplace.php"><p>Marketplace</p></a>
    <a href="account.php"><p>My Account</p></a>

    <?php 
      $admin = $bdd->query("SELECT * FROM users WHERE username='".$_SESSION['user']."' ");
      $admin = $admin->fetch();
      if ($admin['isAdmin'] == 1)
      {

    ?>
      <a href="admin.php"><p>Admin Panel</p></a>
      <a href="orders.php"><p>Orders</p></a>
    <?php 
    
      }
      
    ?>

    <a href="disconnect.php"><p>Disconnect</p></a>
    
  <?php
    }
    else{
  ?>
      <a href="login.php"><p>login</p></a>
      <a href="register.php"><p>Register</p></a>
  <?php
      }
  ?>
  </div>
</div>