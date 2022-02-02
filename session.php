<?php
    // - Init bdd

    try
    {
        $BDD = new PDO('mysql:host=mysql-lunaria.alwaysdata.net; dbname=lunaria_lunaria', 'lunaria', '0ver_Draw070902');  
    }

    catch(Exception $e)
    {
        echo "J ai eu un problème erreur :".$e->getMessage();
    }


/* Check if user is logged and if isn't, he can login */
function CheckIfCanBeLog(){
    if(isset($_SESSION['Logged'])){
        if($_SESSION['Logged'] == 1){
            header('Location: index.php');
        }
    }
}

?>