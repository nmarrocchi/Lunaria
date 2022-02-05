<div class="nav">
    <a href="index.php"><img class="Logo" src="img/Banner.png" alt="Logo"></a>

<?php 

  if ($_SESSION['Logged'] == 1)
  {

?>
  <a href="disconnect.php"><p>Disconnect</p></a>
  <a href="account.php"><p>My Account</p></a>
  <a href="marketplace.php"><p>Marketplace</p></a>
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