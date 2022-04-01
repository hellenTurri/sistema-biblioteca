<?php
    session_start();
    include_once('valida-sessao-admin.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Sistema Admin</title>
</head>
<body>
    <div class="container-admin">
        <header class="navbar">
            <a href="sistema-admin.php">
                <span>Biblioteca virtual - Admin</span>
            </a>
            <nav>
                <ul class="nav-links">
                    <li><a href="listagem-usuarios.php">Usuários</a></li>
                    <li><a href="listagem-livros.php">Livros</a></li>
                    <li><a href="listagem-reservas.php">Reservas</a></li>
                </ul>
            </nav>
            <a class="user" href="logon.php"><button class="btn-logon">Sair</button></a>
        </header>
        <div class="admin-container-content">
            <a class="link-admin" href="listagem-usuarios.php">
                <div class="admin-content">
                    <img src="images/user.png" alt="usuários" width="60%">
                    <span>Usuários</span>
                </div>
            </a>
            <a class="link-admin" href="listagem-livros.php">
                <div class="admin-content">
                    <img src="images/book.png" alt="listagem de livros" width="60%">
                    <span>Livros</span>
                </div>
            </a>
            <a class="link-admin" href="listagem-reservas.php">
                <div class="admin-content">
                    <img src="images/calendar.png" alt="reservas de livros" width="60%">
                    <span>Reservas</span>
                </div>
            </a>
        </div>
    </div>

</body>
</html>