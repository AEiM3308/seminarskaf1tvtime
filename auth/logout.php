<?php
/*
    starta session
    doloci prazen session array
    zbrise ceu session, zbrise vse podatke sessiona
    ko to naredi prestavi uporabnika na index.php, ki ga pol redirecta naprej
*/
    session_start();
    $_SESSION=array();
    session_destroy();
    header('Location: ../index.php');
?>
