<?php
    session_start();
    include_once('valida-sessao-aluno.php');
    include_once('conexao.php');

    $sql = "SELECT * FROM livros ORDER BY idlivro DESC";

    $result = $conexao->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="estiloLivros.css">
    <title>Sistema aluno</title>
</head>
<body>
    <div class="container-admin">
        <header class="navbar">
            <a href="sistema-aluno.php">
                <span>Biblioteca virtual - Aluno</span>
            </a>
            <a class="user" href="logon.php"><button class="btn-logon">Sair</button></a>
        </header>
        <div class="list-book">
            <div class="container-livros flex-wrap">    
                <?php
                    while($user_data = mysqli_fetch_assoc($result)){//retorna todos os dados do bdd e retorna na tabela
                        echo "<div class='item-livro'>";
                        echo "<img src='images/itemLivro.png' alt='listagem de livros' height='30%'>";
                        echo "<span>".$user_data["nomelivro"]."-".$user_data["autorlivro"]."</span>";
                        echo "<p>".$user_data["descricaolivro"]."</p>";
                        echo "<a href='cadastro-reservas.php?idlivro=$user_data[idlivro]' class='btn btn-primary btn-reserva'>Reservar</a>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </div>

</body>
</html>