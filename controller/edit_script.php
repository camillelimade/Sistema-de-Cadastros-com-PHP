<?php
require_once __DIR__ . '/../config/helpers.php';
require_once __DIR__ . '/conexao.php';

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alteração de Cadastro</title>
    <link rel="stylesheet" href="../CSS/cad.css">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body{
        background-color: #1c1b1bff;
    }
    h1, label,text {
        color: whitesmoke;
    }
</style>
<body>
    <div class="container" id="corpo1">
        <div class="row">
            <?php
            include "conexao.php";
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $endereco = $_POST["endereco"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];
            $data_nasc = $_POST["data_nasc"];

            // $sql = "INSERT INTO `pessoas` ( `nome`, `endereco`, `telefone`, `email`, `data_nasc`) VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento')";
            $sql =
                "UPDATE `pessoas` set 
            `nome` = '$nome', 
            `endereco` = '$endereco', 
            `telefone` = '$telefone', 
            `email` = '$email',
            `data_nasc` = '$data_nasc'
            WHERE cod_pessoa = $id";

            if (mysqli_query($conn, $sql)) {
                mensagem("$nome alterado com sucesso!", 'success');
            } else {
                mensagem("Não foi possível alterar $nome, tente novamente.", 'danger');
            }

            ?>
            <a href="home.php" class="btn btn-success">Voltar</a>
        </div>

    </div>
    <script src="../JS/bootstrap.bundle.min.js">
        </script>
</body>

</html>