<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Login Form</title>
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
                <p>Ainda não possui  uma conta?</p>
                <a href="cadastro.php">Cadastrar-se</a>
            </div>
            <div class="form">
                <h2>Login</h2>
                <form action="verificacao-login.php" method="POST">
                    <div class="input-field">
                        <input type="email" name="email" id="email"
                            placeholder="Informe seu e-mail">
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <input type="password" name="senha" id="senha"
                            placeholder="Informe sua senha">
                        <div class="underline"></div>
                    </div>
                    <input type="submit" name="submit" value="Entrar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>