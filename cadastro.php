<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container-form">
        <div class="image">
            <span>Biblioteca virtual</span>
            <img src="images/imageLogin.png" alt="biblioteca" width="70%">
        </div>
        <div class="container">
            <div class="register">
                <p>Já possui uma conta?</p>
                <a href="login.php">Login</a>
            </div>
            <div class="form">
                <h2>Cadastro</h2>
                <form action="valida-cadastro.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="nome" id="nome" placeholder="Informe seu nome*"
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
                        <input type="email" name="email" id="email" placeholder="Informe seu e-mail*"
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
                    <div class="password">
                        <div class="input-field input-field-password">
                            <input type="password" name="senha" id="senha" placeholder="Crie uma senha*"
                            <?php
                                if(!empty($_SESSION['senha_value'])){ //verificando se o campo não está vazio
                                    echo "value='".$_SESSION['senha_value']."'"; //deixa fixo o valor digitado no input
                                    unset ($_SESSION['senha_value']); //destruindo variável
                                }
                            ?>
                            >
                            <div class="underline"></div>
                        </div>
                        <div class="input-field input-field-password">
                            <input type="password" name="confirm-senha" id="confirm-senha" placeholder="Confirmar senha*"
                            <?php
                                if(!empty($_SESSION['confirmSenha_value'])){ //verificando se o campo não está vazio
                                    echo "value='".$_SESSION['confirmSenha_value']."'"; //deixa fixo o valor digitado no input
                                    unset ($_SESSION['confirmSenha_value']); //destruindo variável
                                }
                            ?>
                            >
                            <div class="underline"></div>
                        </div>
                    </div>
                    <div class="mensagem-erro">
                        <?php
                            if(!empty($_SESSION['senha_vazio'])){ //verificando se o campo não está vazio
                                echo "<p style='color: #f00; font-size: 0.8rem; margin-top: -1.7rem; margin-bottom: 2rem;'>".$_SESSION['senha_vazio']; //informando mensagem de erro
                                unset ($_SESSION['senha_vazio']); //destruindo variável
                            }
                        ?>
                        <?php
                            if(!empty($_SESSION['confirmSenha_vazio'])){ //verificando se o campo não está vazio
                                echo "<p style='color: #f00; font-size: 0.8rem; margin-top: -1.7rem; margin-bottom: 2rem;'>".$_SESSION['confirmSenha_vazio']; //informando mensagem de erro
                                unset ($_SESSION['confirmSenha_vazio']); //destruindo variável
                            }
                        ?>
                    </div>
                    <input type="submit" name="submit" value="Cadastrar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>