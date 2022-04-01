<?php

    session_start();
    include_once('valida-sessao-admin.php');

    if(!empty($_GET['idreserva'])){

        include_once('conexao.php');

        $id = $_GET['idreserva'];

        $sqlSelect = "SELECT * FROM reservas WHERE idreserva=$id";
        $result = $conexao->query($sqlSelect);


        if($result->num_rows > 0){//verificando se existe o id

            while($user_data = mysqli_fetch_assoc($result)){

                $datareserva = $user_data['datareserva'];
                $datadevolucao = $user_data['datadevolucao'];
            }

        } else {
            header('Location: listagem-reservas.php');
        }
    } else {
        header('Location: listagem-reservas.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Editar reservas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container-admin">
        <header class="navbar">
            <a href="sistema-aluno.php">
                <span>Biblioteca virtual - Reserva</span>
            </a>
            <a class="user" href="logon.php"><button class="btn-logon">Sair</button></a>
        </header>
        <div class="container-edit">
        <div class="form-edit">
                <h2>Editar reserva</h2>
                <form action="save-edit-reserva.php" method="POST">
                    <div class="input-field">
                        <label>Data da reserva</label>
                        <input type="date" name="datareserva" id="datareserva" value="<?php echo $datareserva?>" required>
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <label>Data da devolução</label>
                        <input type="date" name="datadevolucao" id="datadevolucao" value="<?php echo $datadevolucao?>"required>
                        <div class="underline"></div>
                    </div>
                    <input type="hidden" name="idreserva" value="<?php echo $id?>">
                    <input type="submit" name="update-reserva" value="Editar reserva" class="btn-edit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>