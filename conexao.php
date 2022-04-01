<?php //criando a conexao com o banco de dados
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = 'root';
    $dbName = 'sistema';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

?>
