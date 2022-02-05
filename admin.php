<?php
    session_start();
    require("session.php");
    CheckIfIsLog();

    $admin = $bdd->query("SELECT * FROM users WHERE username='".$_SESSION['user']."' ");
    $admin = $admin->fetch();
    $deleteMsg = "";

    if($admin['isAdmin'] != 1){header("location: index.php");}


    // - When submit pressed, delete selected users
    if(isset($_POST['submit']))
    {
      if(!empty($_POST['deleteUser']))
      {    
          foreach($_POST['deleteUser'] as $value)
          {
            $bdd->query("DELETE FROM users WHERE username = '".$value."'");
          }
          $deleteMsg = "ALL SELECTED USERS SUCCESSFULLY DELETED !!";
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
    <link rel="stylesheet" href="style/admin.css">
    <title>Lunaria | Admin Panel</title>
</head>
<body>

    <?php 
      include "include/nav.php";
      $users = $bdd->query("SELECT * FROM users");
    ?>
        
    <div class="content">

      <form action="" method="post">
        <table class="usersList">
          <tr>
            <td></td>
            <td class="THeader"><p>Username</p></td>
            <td class="THeader"><p>Password</p></td>
            <td class="THeader"><p>Date of Registration</p></td>
            <td class="THeader" colspan="3"><p>Status</p></td>
          </tr>
          
      <?php
        while ($userlist = $users->fetch()){
      ?>

          <tr>
            <td>
              <?php if($userlist['isAdmin'] != 1) { ?> 
                <input type="checkbox" name="deleteUser[]" value="<?php echo $userlist['username'] ?>" id="<?php echo $userlist['username'] ?>"> 
              <?php } ?>
            </td>
            <td><?php echo $userlist['username'] ?></td>
            <td><?php echo $userlist['password'] ?></td>
            <td><?php echo $userlist['registration'] ?></td>
            <td>
              <?php if($userlist['isAdmin'] == 1) { ?> <p>Admin</p> <?php } ?>
            </td>
          </tr>

          <?php
            }
          ?>
        </table>

        <input type="submit" name="submit" class="adminSubmit" value="DELETE ALL SELECTED USER">
        <p class="deleteMsg"><?php echo $deleteMsg ?></p>
      </form>

      
    </div>
    
</body>
</html>