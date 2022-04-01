<?php
    session_start();
    include_once('valida-sessao-admin.php');

    if(isset($_POST['submit-livro'])){

        include_once('conexao.php');

        $nomelivro = $_POST['nomelivro'];
        $autorlivro = $_POST['autorlivro'];
        $descricaolivro = $_POST['descricaolivro'];

        $result = mysqli_query($conexao, "INSERT INTO livros(nomelivro,autorlivro,descricaolivro) 
        VALUES ('$nomelivro','$autorlivro','$descricaolivro')");

        header('Location: listagem-livros.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Cadastro livros</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container-admin">
        <header class="navbar">
            <a href="sistema-admin.php">
                <span>Biblioteca virtual</span>
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
        <div class="container-edit">
            <div class="form-edit">
                <h2>Cadastrar livro</h2>
                <form action="cadastro-livros.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="nomelivro" id="nomelivro" placeholder="Nome do livro*" required>
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <input type="autorlivro" name="autorlivro" id="autorlivro" placeholder="Autor do livro*" required>
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <input type="descricaolivro" name="descricaolivro" id="descricaolivro" placeholder="Descrição do livro">
                        <div class="underline"></div>
                    </div>
                    <input type="submit" name="submit-livro" value="Cadastrar" class="btn-edit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>