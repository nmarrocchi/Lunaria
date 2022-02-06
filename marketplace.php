<?php
    session_start();
    require("session.php");
    CheckIfIsLog();
    $OrderSendMsg = "";

    if(isset($_POST['submit'])){
        if(!empty($_POST['checkFish'])) {    
            foreach($_POST['checkFish'] as $fishname){
                $date = date('Y-m-d H:i:s');
                $fish = $bdd->query("SELECT * FROM fishs WHERE name_fr = '".$fishname."'");
                $fish = $fish->fetch();

                $bdd->query("INSERT INTO `orders`(`user`, `fish_fr`, `fish_eng`, `price`, `date`) VALUES ('".$_SESSION["user"]."','".$fishname."', '".$fish['name_eng']."','".$fish['price']."','".$date."')");
            
                $OrderSendMsg = "Your order has been sent, thank you for your purchase";
                
            }
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
    <link rel="stylesheet" href="style/marketplace.css">
    <title>Lunaria | Marketplace</title>
</head>
<body>

    <?php 
        $WaterFishs = $bdd->query("SELECT * FROM fishs WHERE liquid='water'");
        $ChocoFishs = $bdd->query("SELECT * FROM fishs WHERE liquid='choco'");
        $LavaFishs = $bdd->query("SELECT * FROM fishs WHERE liquid='lava'");
        $PlasmaFishs = $bdd->query("SELECT * FROM fishs WHERE liquid='plasma'");

        $liquids = $bdd->query("SELECT liquids FROM fishs_liquids ORDER BY id");
        include "include/nav.php";
    ?>

<form action="" method="post">

<div class="fishs">
    <p class="OrderSendMsg"><?php echo $OrderSendMsg ?></p>

    <?php
        $i = 0;
        while($liquid = $liquids->fetch()){
    ?>

        <div class="<?php echo $liquid[$i] ?>">
        <table class="fishsListDiv">
            <tr>
                <td colspan="7" class="tabHeader" onclick="switchShowFishs(this.innerText)"><?php echo $liquid[$i] ?></td>
            </tr>

            <?php
            if ($i == 0) { $liquidToFetch = $WaterFishs;}
            elseif ($i == 1) { $liquidToFetch = $ChocoFishs;}
            elseif ($i == 1) { $liquidToFetch = $LavaFishs;}
            elseif ($i == 1) { $liquidToFetch = $PlasmaFishs;}

                while($fishlist = $liquidToFetch->fetch()){
            ?>

                <tr class="waterfishs">
                    <td>
                        <input type="checkbox" name="checkFish[]" value="<?php echo $fishlist['name_fr'] ?>" id="<?php echo $fishlist['name_fr'] ?>">
                    </td>
                    <td><img src="img/fish/<?php echo $liquid[$i] ?>/<?php echo $fishlist['id'] ?>.png" alt="fish"></td>
                    <td><?php echo $fishlist['name_fr'] ?> / <?php echo $fishlist['name_eng'] ?></td>
                    <td><?php echo $fishlist['rarity'] ?></td>
                    <td><?php echo $fishlist['price'] ?></td>

                </tr>

                <?php
                    }
                ?>

        </table>

    </div>

    <?php
        }
    ?>


    <input type="submit" name="submit" id="submit_fishs" value="validate the purchase">
</div>

</form>

            <!-- Init all display -->
    <script>
        var elems = document.getElementsByClassName('waterfishs');
        for (var i=0;i<elems.length;i+=1){
            elems[i].style.display = 'none';
        }

        var elems = document.getElementsByClassName('chocofishs');
        for (var i=0;i<elems.length;i+=1){
            elems[i].style.display = 'none';
        }

        var elems = document.getElementsByClassName('lavafishs');
        for (var i=0;i<elems.length;i+=1){
            elems[i].style.display = 'none';
        }

        var elems = document.getElementsByClassName('plasmafishs');
        for (var i=0;i<elems.length;i+=1){
            elems[i].style.display = 'none';
        }
    </script>

    <script src="script/marketplace.js"></script>
        
    <div class="content">
    </div>
    
</body>
</html>