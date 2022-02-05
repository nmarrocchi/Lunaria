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

        <div class="fishs">
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
                            <input type="checkbox" name="<?php echo $fishlist['name_fr'] ?>" id="fish">
                        </td>
                        <td>Image</td>
                        <td><?php echo $fishlist['name_fr'] ?></td>
                        <td><?php echo $fishlist['name_eng'] ?></td>
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
                            <input type="checkbox" name="<?php echo $fishlist['name_fr'] ?>" id="fish">
                        </td>
                        <td>Image</td>
                        <td><?php echo $fishlist['name_fr'] ?></td>
                        <td><?php echo $fishlist['name_eng'] ?></td>
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
                            <input type="checkbox" name="<?php echo $fishlist['name_fr'] ?>" id="fish">
                        </td>
                        <td>Image</td>
                        <td><?php echo $fishlist['name_fr'] ?></td>
                        <td><?php echo $fishlist['name_eng'] ?></td>
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
                            <input type="checkbox" name="<?php echo $fishlist['name_fr'] ?>" id="fish">
                        </td>
                        <td>Image</td>
                        <td><?php echo $fishlist['name_fr'] ?></td>
                        <td><?php echo $fishlist['name_eng'] ?></td>
                        <td><?php echo $fishlist['liquid'] ?></td>
                        <td><?php echo $fishlist['rarity'] ?></td>
                        <td><?php echo $fishlist['price'] ?></td>
                    </tr>

                    <?php
                        }
                    ?>
                </table>
            </div>

            <input type="submit" id="submit_fishs" value="validate the purchase">
        </div>

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

        <!-- Js script to show/hide lists -->
        <script>
            function switchShowFishs(text){
                switch (text){

                    case "Water": 
                        var elems = document.getElementsByClassName('waterfishs');
                        if(elems[0].style.display == "none")
                        {
                            for (var i=0;i<elems.length;i+=1){
                                elems[i].style.display = 'inherit';
                            }
                        }
                        else{
                            for (var i=0;i<elems.length;i+=1){
                                elems[i].style.display = 'none';
                            }
                        }

                        break;

                    case "Choco": 
                        var elems = document.getElementsByClassName('chocofishs');
                        if(elems[0].style.display == "none")
                        {
                            for (var i=0;i<elems.length;i+=1){
                                elems[i].style.display = 'inherit';
                            }
                        }
                        else{
                            for (var i=0;i<elems.length;i+=1){
                                elems[i].style.display = 'none';
                            }
                        }
                        break;

                    case "Lava": 
                        var elems = document.getElementsByClassName('lavafishs');
                        if(elems[0].style.display == "none")
                        {
                            for (var i=0;i<elems.length;i+=1){
                                elems[i].style.display = 'inherit';
                            }
                        }
                        else{
                            for (var i=0;i<elems.length;i+=1){
                                elems[i].style.display = 'none';
                            }
                        }
                        break;

                    case "Plasma": 
                        var elems = document.getElementsByClassName('plasmafishs');
                        if(elems[0].style.display == "none")
                        {
                            for (var i=0;i<elems.length;i+=1){
                                elems[i].style.display = 'inherit';
                            }
                        }
                        else{
                            for (var i=0;i<elems.length;i+=1){
                                elems[i].style.display = 'none';
                            }
                        }
                        break;

                    default:
                        break;
                }
            }
        </script>
        
    <div class="content">
    </div>
    
</body>
</html>