<?php
    session_start();
    include_once('conexao.php');

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        
        include_once('conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";      
        $result = $conexao->query($sql);

        while($user_data = mysqli_fetch_assoc($result)){
            $nivel = $user_data['nivel'];
            $idusuario = $user_data['idusuario'];
        }


        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
            
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['nivel'] = $nivel;
            $_SESSION['idusuario'] = $idusuario;

            if($_SESSION['nivel'] == 1){
                header('Location: sistema-admin.php');
            } else {
                header('Location: sistema-aluno.php');
            }           
        }

    } else {
        header('Location: login.php');
    }
?>