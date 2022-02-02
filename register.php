<?php
    session_start();
    require("session.php");

    if (isset($_POST["submit"])) {
        $UserExist = $bdd->query("SELECT COUNT(*) FROM users WHERE username ='".$_POST['username']."'");
        $UserExist = $UserExist->fetch();

        if ($UserExist["COUNT(*)"] > 0) {
            $CreateAccount = "This username is taken...";
        } 
        else {
            $bdd->query("INSERT INTO users(username, password, isAdmin) VALUES('".$_POST['username']."','".$_POST['password']."',0)");
            $CreateAccount = "Your account has been created";
            
        }
    }
    else{
        $CreateAccount = "This username is taken...";
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
    <link rel="stylesheet" href="style/forms.css">
    <title>Lunaria | login</title>
</head>
<body>

    <?php include "include/nav.php" ?>

    <div class="Form">
        <form action="" method="post">

            <p class="createMsg"><?php echo $CreateAccount?></p>

            <label for="username">Username : </label>
            <input type="text" name="username" required></input>

            <label for="password">Password :</label>
            <input type="text" name="password" required></input>

            <input type="submit" name="submit" value="register">

        </form>
    </div>
    
</body>
</html>