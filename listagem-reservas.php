<?php
    session_start();
    include_once('valida-sessao-admin.php');
    include_once('conexao.php');

    $sql = "SELECT *
            FROM reservas r
            INNER JOIN livros as l ON l.idlivro = r.idlivro_livros
            INNER JOIN usuarios as u ON u.idusuario = r.idusuario_usuarios";

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
    <title>Reservas</title>
</head>
<body>
    <div class="container-admin">
        <header class="navbar">
            <a href="sistema-admin.php">
                <span>Biblioteca virtual - Reservas</span>
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
        <div class="table-list">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data reserva</th>
                        <th scope="col">Data devolução</th>
                        <th scope="col">Nome livro</th>
                        <th scope="col">Nome aluno</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($user_data = mysqli_fetch_assoc($result)){//retorna todos os dados do bdd e retorna na tabela
                            echo "<tr>";
                            echo "<td>".$user_data["idreserva"]."</td>";
                            echo "<td>".$user_data["datareserva"]."</td>";
                            echo "<td>".$user_data["datadevolucao"]."</td>";
                            echo "<td>".$user_data["nomelivro"]."</td>";
                            echo "<td>".$user_data["nome"]."</td>";
                            echo "<td>
                                    <a class='btn btn-sm btn-primary' href='editar-reserva.php?idreserva=$user_data[idreserva]' title='Editar'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                        </svg>
                                    </a>
                                    <a class='btn btn-sm btn-danger' href='delete-reserva.php?idreserva=$user_data[idreserva]' title='Excluir'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                                        </svg>
                                    </a>
                                </td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>