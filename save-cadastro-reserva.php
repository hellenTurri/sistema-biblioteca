<?php

    include_once('conexao.php');
    include_once('valida-sessao.php');

    if(isset($_POST['submit-reserva'])){

        $idlivro = $_POST['idlivro'];
        $datareserva = $_POST['datareserva'];

        $result = mysqli_query($conexao, "INSERT INTO reservas(datareserva,datadevolucao,idlivro_livros,idusuario_usuarios) 
        VALUES ('$datareserva',DATE_ADD('$datareserva', INTERVAL 15 DAY),'$idlivro','$idusuario')");

        header('Location: sistema-aluno.php');
    }
?>