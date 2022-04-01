<?php

    if(!empty($_GET['idusuario'])){

        include_once('conexao.php');

        $id = $_GET['idusuario'];

        $sqlSelect = "SELECT *  FROM usuarios WHERE idusuario=$id";
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            $sqlDelete = "DELETE FROM usuarios WHERE idusuario=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: listagem-usuarios.php');

?>