<?php

    include_once('conexao.php');

    if(isset($_POST['update-user'])){//verificando se o botao de editar foi selecionado

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $nivel = $_POST["nivel"];
        $id = $_POST['idusuario'];

        
        $sqlInsert = "UPDATE usuarios SET nome='$nome', email='$email', nivel='$nivel' WHERE idusuario=$id";

        $result = $conexao->query($sqlInsert);

    }
    header('Location: listagem-usuarios.php');

?>