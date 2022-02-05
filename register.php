<?php
    session_start(); 
    require("session.php");
    CheckIfCanLog();

    if (isset($_POST["submit"])) {
        $UserExist = $bdd->query("SELECT COUNT(*) FROM users WHERE username ='".$_POST['username']."'");
        $UserExist = $UserExist->fetch();

        if ($UserExist["COUNT(*)"] > 0) {
            $CreateAccount = "This username is taken...";
        } 
        else {
            $date = date('Y-m-d H:i:s');
            $bdd->query("INSERT INTO users(username, password, registration, isAdmin) VALUES('".$_POST['username']."','".$_POST['password']."','".$date."',0)");
            $CreateAccount = "Your account has been created";
            
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
    <title>Lunaria | Register</title>
</head>
<body>

    <?php include "include/nav.php" ?>

    <div class="Form">
        <form action="" method="post">

            <p class="createMsg"><?php echo $CreateAccount?></p>

            <label for="username">Username ( please enter your trove account name ): </label>
            <input type="text" name="username" required></input>

            <label for="password">Password :</label>
            <input type="text" name="password" required></input>

            <input type="submit" name="submit" value="register">

        </form>
    </div>
    
</body>
</html>