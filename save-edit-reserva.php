<?php

    include_once('conexao.php');

    if(isset($_POST['update-reserva'])){//verificando se o botao de editar foi selecionado

        $datareserva = $_POST['datareserva'];
        $datadevolucao = $_POST['datadevolucao'];
        $id = $_POST['idreserva'];

        
        $sqlInsert = "UPDATE reservas SET datareserva='$datareserva', datadevolucao='$datadevolucao' WHERE idreserva=$id";

        $result = $conexao->query($sqlInsert);

    }
    header('Location: listagem-reservas.php');

?>