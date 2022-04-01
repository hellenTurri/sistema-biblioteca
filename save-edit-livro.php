<?php

    include_once('conexao.php');

    if(isset($_POST['update-livro'])){//verificando se o botao de editar foi selecionado

        $nomelivro = $_POST['nomelivro'];
        $autorlivro = $_POST['autorlivro'];
        $descricaolivro = $_POST["descricaolivro"];
        $id = $_POST['idlivro'];

        
        $sqlInsert = "UPDATE livros SET nomelivro='$nomelivro', autorlivro='$autorlivro', descricaolivro='$descricaolivro' WHERE idlivro=$id";

        $result = $conexao->query($sqlInsert);

    }
    header('Location: listagem-livros.php');

?>