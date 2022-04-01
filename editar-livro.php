<?php
    session_start();
    include_once('valida-sessao-admin.php');

    if(!empty($_GET['idlivro'])){

        include_once('conexao.php');

        $id = $_GET['idlivro'];

        $sqlSelect = "SELECT * FROM livros WHERE idlivro=$id";
        $result = $conexao->query($sqlSelect);


        if($result->num_rows > 0){//verificando se existe o id

            while($user_data = mysqli_fetch_assoc($result)){

                $nomelivro = $user_data['nomelivro'];
                $autorlivro = $user_data['autorlivro'];
                $descricaolivro = $user_data["descricaolivro"];
            }

        } else {
            header('Location: listagem-livros.php');
        }
    } else {
        header('Location: listagem-livros.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Editar livro</title>
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
                <h2>Editar livro</h2>
                <form action="save-edit-livro.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="nomelivro" id="nomelivro" value="<?php echo $nomelivro?>" placeholder="Nome livro*">
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <input type="text" name="autorlivro" id="autorlivro" value="<?php echo $autorlivro?>" placeholder="Autor do livro*">
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <input type="text" name="descricaolivro" id="descricaolivro" value="<?php echo $descricaolivro?>" placeholder="Descrição do livro">
                        <div class="underline"></div>
                    </div>
                    <input type="hidden" name="idlivro" value="<?php echo $id?>">
                    <input type="submit" name="update-livro" value="Editar" class="btn-edit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>