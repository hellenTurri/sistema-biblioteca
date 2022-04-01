<?php
    session_start();

    include_once('conexao.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    } 

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];

    $sql = "SELECT idusuario FROM usuarios WHERE email = '$email' and senha = '$senha'";
    $result = $conexao->query($sql);

    while($user_data = mysqli_fetch_assoc($result)){

        $idusuario = $user_data['idusuario'];

    }

?>