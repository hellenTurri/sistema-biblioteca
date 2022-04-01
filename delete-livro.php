<?php

if(!empty($_GET['idlivro'])){

    include_once('conexao.php');

    $id = $_GET['idlivro'];

    $sqlSelect = "SELECT *  FROM livros WHERE idlivro=$id";
    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0){

        $sqlDelete = "DELETE FROM livros WHERE idlivro=$id";
        $resultDelete = $conexao->query($sqlDelete);
    }
}
header('Location: listagem-livros.php');

?>