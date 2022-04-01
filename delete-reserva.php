<?php

    if(!empty($_GET['idreserva'])){

        include_once('conexao.php');

        $id = $_GET['idreserva'];

        $sqlSelect = "SELECT *  FROM reservas WHERE idreserva=$id";
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            $sqlDelete = "DELETE FROM reservas WHERE idreserva=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: listagem-reservas.php');

?>