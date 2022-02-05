<?php
    session_start();
    require("session.php");
    CheckIfIsLog();
    $OrderSendMsg = "";

    if(isset($_POST['submit'])){
        if(!empty($_POST['checkFish'])) {    
            foreach($_POST['checkFish'] as $value){
                $date = date('Y-m-d H:i:s');
                $fish = $bdd->query("SELECT * FROM fishs WHERE name_fr = '".$value."'");
                $fish = $fish->fetch();
                $bdd->query("INSERT INTO `orders`(`user`, `fish_fr`, `fish_eng`, `price`, `date`) VALUES ('".$_SESSION["user"]."','".$value."', '".$fish['name_eng']."','".$fish['price']."','".$date."')");
            
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
        include "include/nav.php";
    ?>
    <form action="" method="post">

            <div class="fishs">
                <p class="OrderSendMsg"><?php echo $OrderSendMsg ?></p>
                <div class="water">
                    <table>
                        <tr>
                            <td colspan="7" class="tabHeader" onclick="switchShowFishs(this.innerText)">Water</td>
                        </tr>
                            
                        <?php

                            while($fishlist = $WaterFishs->fetch()){
                        ?>

                        <tr class="waterfishs">
                            <td>
                                <input type="checkbox" name="checkFish[]" value="<?php echo $fishlist['name_fr'] ?>" id="<?php echo $fishlist['name_fr'] ?>">
                            </td>
                            <td><img src="img/fish/water/<?php echo $fishlist['id'] ?>.png" alt="fish"></td>
                            <td><?php echo $fishlist['name_fr'] ?> / <?php echo $fishlist['name_eng'] ?></td>
                            <td><?php echo $fishlist['liquid'] ?></td>
                            <td><?php echo $fishlist['rarity'] ?></td>
                            <td><?php echo $fishlist['price'] ?></td>
                        </tr>

                        <?php
                            }
                        ?>
                    </table>
                </div>

                <div class="choco">
                    <table>
                        <tr>
                            <td colspan="7" class="tabHeader" onclick="switchShowFishs(this.innerText)">Choco</td>
                        </tr>
                            
                        <?php

                            while($fishlist = $ChocoFishs->fetch()){
                        ?>

                        <tr class="chocofishs">
                            <td>
                                <input type="checkbox" name="checkFish[]" value="<?php echo $fishlist['name_fr'] ?>" id="<?php echo $fishlist['name_fr'] ?>">
                            </td>
                            <td><img src="img/fish/choco/<?php echo $fishlist['id'] ?>.png" alt="fish"></td>
                            <td><?php echo $fishlist['name_fr'] ?> / <?php echo $fishlist['name_eng'] ?></td>
                            <td><?php echo $fishlist['liquid'] ?></td>
                            <td><?php echo $fishlist['rarity'] ?></td>
                            <td><?php echo $fishlist['price'] ?></td>
                        </tr>

                        <?php
                            }
                        ?>
                    </table>
                </div>

                <div class="lava">
                    <table>
                        <tr>
                            <td colspan="7" class="tabHeader" onclick="switchShowFishs(this.innerText)">Lava</td>
                        </tr>
                            
                        <?php

                            while($fishlist = $LavaFishs->fetch()){
                        ?>

                        <tr class="lavafishs">
                            <td>
                                <input type="checkbox" name="checkFish[]" value="<?php echo $fishlist['name_fr'] ?>" id="<?php echo $fishlist['name_fr'] ?>">
                            </td>
                            <td><img src="img/fish/lava/<?php echo $fishlist['id'] ?>.png" alt="fish"></td>
                            <td><?php echo $fishlist['name_fr'] ?> / <?php echo $fishlist['name_eng'] ?></td>
                            <td><?php echo $fishlist['liquid'] ?></td>
                            <td><?php echo $fishlist['rarity'] ?></td>
                            <td><?php echo $fishlist['price'] ?></td>
                        </tr>

                        <?php
                            }
                        ?>
                    </table>
                </div>

                <div class="plasma">
                    <table>
                        <tr>
                            <td colspan="7" class="tabHeader" onclick="switchShowFishs(this.innerText)">Plasma</td>
                        </tr>
                            
                        <?php

                            while($fishlist = $PlasmaFishs->fetch()){
                        ?>

                        <tr class="plasmafishs">
                            <td>
                                <input type="checkbox" name="checkFish[]" value="<?php echo $fishlist['name_fr'] ?>" id="<?php echo $fishlist['name_fr'] ?>">
                            </td>
                            <td><img src="img/fish/plasma/<?php echo $fishlist['id'] ?>.png" alt="fish"></td>
                            <td><?php echo $fishlist['name_fr'] ?> / <?php echo $fishlist['name_eng'] ?></td>
                            <td><?php echo $fishlist['liquid'] ?></td>
                            <td><?php echo $fishlist['rarity'] ?></td>
                            <td><?php echo $fishlist['price'] ?></td>
                        </tr>

                        <?php
                            }
                        ?>
                    </table>
                </div>

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