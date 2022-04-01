<?php
    session_start();
    include_once('conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmSenha = $_POST['confirm-senha'];
    $erros = 0;

    if(empty($nome)){ //verificando se o campo nome está vazio
        $_SESSION['nome_vazio'] = "Campo nome é obrigatório";
        header('Location: cadastro.php');
        $erros++;
    } else {
        $_SESSION['nome_value'] = $nome;
    }

    if(empty($email)){ //verificando se o campo e-mail está vazio
        $_SESSION['email_vazio'] = "Campo e-mail é obrigatório";
        header('Location: cadastro.php');
        $erros++;
    } else {
        $_SESSION['email_value'] = $email;
    }

    if(empty($senha)){//verificando se o campo senha está vazio
        $_SESSION['senha_vazio'] = "Campo senha é obrigatório";
        header('Location: cadastro.php');
        $erros++;
    } else {
        $_SESSION['senha_value'] = $senha;
    }

    if(empty($confirmSenha)){//verificando se o campo senha está vazio
        $_SESSION['confirmSenha_vazio'] = "Campo confirmar senha é obrigatório";
        header('Location: cadastro.php');
        $erros++;
    } else {
        $_SESSION['confirmSenha_value'] = $confirmSenha;
    }

    if($erros == 0){
        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha,nivel) VALUES ('$nome','$email','$senha', 0)");
        header('Location: login.php');
    } 

?>
