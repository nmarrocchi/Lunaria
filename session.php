<?php
    // - Init bdd

    $host = "mysql-lunaria.alwaysdata.net";
    $dbase = "lunaria_lunaria";
    $user = "lunaria";
    $password = "Manon_01-11-21";

    try
    {
        $BDD = new PDO('mysql:host='$host'; dbname='$dbase'; charset=utf8', $user, $password);
    }

    catch(Exception $e)
    {
        echo "J'ai eu un problème erreur :".$e->getMessage();
    }


    function check() {
        if($_SESSION && ( $_SESSION["Logged"] == true )) {
            return false;
        } else {
            return true;
        }
    }
?>