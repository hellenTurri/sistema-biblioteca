<?php

    session_start();
    include_once('valida-sessao-admin.php');

    if(!empty($_GET['idusuario'])){

        include_once('conexao.php');

        $id = $_GET['idusuario'];

        $sqlSelect = "SELECT * FROM usuarios WHERE idusuario=$id";
        $result = $conexao->query($sqlSelect);


        if($result->num_rows > 0){//verificando se existe o id

            while($user_data = mysqli_fetch_assoc($result)){

                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $nivel = $user_data["nivel"];
            }

        } else {
            header('Location: listagem-usuarios.php');
        }
    } else {
        header('Location: listagem-usuarios.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Editar Usuario</title>
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
                <h2>Editar</h2>
                <form action="save-edit-user.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="nome" id="nome" value="<?php echo $nome?>" placeholder="Nome*"
                        <?php
                            if(!empty($_SESSION['nome_value'])){ //verificando se o campo não está vazio
                                echo "value='".$_SESSION['nome_value']."'"; //deixa fixo o valor digitado no input
                                unset ($_SESSION['nome_value']); //destruindo variável
                            }
                        ?>
                        >
                        <div class="underline"></div>
                    </div>
                    <?php
                        if(!empty($_SESSION['nome_vazio'])){ //verificando se o campo não está vazio
                            echo "<p style='color: #f00; font-size: 0.8rem; margin-top: -1.7rem; margin-bottom: 2rem;'>".$_SESSION['nome_vazio']; //informando mensagem de erro
                            unset ($_SESSION['nome_vazio']); //destruindo variável
                        }
                    ?>
                    <div class="input-field">
                        <input type="email" name="email" id="email" value="<?php echo $email?>" placeholder="E-mail*"
                        <?php
                            if(!empty($_SESSION['email_value'])){ //verificando se o campo não está vazio
                                echo "value='".$_SESSION['email_value']."'"; //deixa fixo o valor digitado no input
                                unset ($_SESSION['email_value']); //destruindo variável
                            }
                        ?>
                        >
                        <div class="underline"></div>
                    </div>
                    <?php
                        if(!empty($_SESSION['email_vazio'])){ //verificando se o campo não está vazio
                            echo "<p style='color: #f00; font-size: 0.8rem; margin-top: -1.7rem; margin-bottom: 2rem;'>".$_SESSION['email_vazio']; //informando mensagem de erro
                            unset ($_SESSION['email_vazio']); //destruindo variável
                        }
                    ?>
                    <div class="input-field">
                        <input type="nivel" name="nivel" id="nivel" value="<?php echo $nivel?>" placeholder="Nível de acesso*">
                        <div class="underline"></div>
                    </div>
                   <input type="hidden" name="idusuario" value="<?php echo $id?>">
                    <input type="submit" name="update-user" value="Editar" class="btn-edit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>