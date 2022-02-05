<?php
    session_start();
    require("session.php");
    CheckIfCanLog();

    if (isset($_POST["submit"])) {
        $UserExist = $bdd->query("SELECT COUNT(*) FROM users WHERE username ='".$_POST['username']."'");
        $UserExist = $UserExist->fetch();

        if ($UserExist["COUNT(*)"] > 0) {
            $_SESSION['Logged'] = 1;
            $_SESSION['user'] = $_POST['username'];
            header("location: index.php");
        } 
        else {
            $CreateAccount = "Account not found, please first create your account";
            
        }
    }
    else{
        $CreateAccount = "";
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
    <title>Lunaria | Login</title>
</head>
<body>

    <?php include "include/nav.php" ?>

    <div class="Form">
        <form action="" method="post">

            <p class="loginMsg"><?php echo $CreateAccount?></p>

            <label for="username">Username : </label>
            <input type="text" name="username" required></input>

            <label for="password">Password :</label>
            <input type="text" name="password" required></input>

            <input type="submit" name="submit" value="Login">

        </form>
    </div>
    
</body>
</html>