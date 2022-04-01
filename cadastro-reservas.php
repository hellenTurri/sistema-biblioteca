<?php

    session_start();
    include_once('valida-sessao-aluno.php');
    
    if(!empty($_GET['idlivro'])){

        include_once('conexao.php');
        $idlivro = $_GET['idlivro'];

        $sqlSelect = "SELECT * FROM livros WHERE idlivro=$idlivro";
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result)){

                $nomelivro = $user_data['nomelivro'];
                $autorlivro = $user_data['autorlivro'];
                $descricaolivro = $user_data["descricaolivro"];
            }
            
        } else {
            header('Location: sistema-aluno.php');
        }
    } else {
        header('Location: sistema-aluno.php');
    }
     
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Cadastro reservas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container-admin">
        <header class="navbar">
            <a href="sistema-aluno.php">
                <span>Biblioteca virtual - Reservar</span>
            </a>
            <a class="user" href="logon.php"><button class="btn-logon">Sair</button></a>
        </header>
        <div class="container-edit">
            <div class="form-edit">
                <h2>Reservar livro</h2>
                <form action="save-cadastro-reserva.php" method="POST">
                    <div class="input-field">
                        <label>Nome livro:</label>
                        <input type="text" name="nomelivro" id="nomelivro" value="<?php echo $nomelivro?>">
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <label>Autor:</label>
                        <input type="text" name="autorlivro" id="autorlivro" value="<?php echo $autorlivro?>">
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <label>Descrição:</label>
                        <input type="text" name="descricaolivro" id="descricaolivro" value="<?php echo $descricaolivro?>">
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <label>Data da reserva</label>
                        <input type="date" name="datareserva" id="datareserva" required>
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <label name="datadevolucao" id="datadevolucao" style="color: red;">Data da devolução: 15 dias após a reserva</label>
                        <div class="underline"></div>
                    </div>
                    <input type="hidden" name="idlivro" value="<?php echo $idlivro?>">
                    <input type="submit" name="submit-reserva" value="Reservar" class="btn-edit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>