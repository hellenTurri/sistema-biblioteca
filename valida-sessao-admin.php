<?php

    session_start();

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true) or ($_SESSION['nivel'] != 1)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    } 
?>
