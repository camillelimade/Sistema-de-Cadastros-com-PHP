<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Script do Cadastro</title>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <style>
        .mostra_foto {
            width: 150px;
            height: 150px;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }

        body {
            background-color: #1c1b1bff;
        }
    </style>
</head>

<body>
    <div class="container text-center mt-5">
        <?php
        include("conexao.php");
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $data_nascimento = $_POST["data_nascimento"];
        $foto = $_FILES["foto"];
        $nome_foto = $foto['name'];

        if (isset($foto) && $foto['error'] == 0) {
            $extensao = pathinfo($foto['name'], PATHINFO_EXTENSION);
            $nome_foto = date("YmdHis") . "." . $extensao;
            move_uploaded_file($foto['tmp_name'], "../img/" . $nome_foto);
        } else {
            $nome_foto = "sem_foto.jpg";
        }

        $sql = "INSERT INTO `pessoas` (`nome`, `endereco`, `telefone`, `email`, `data_nasc`, `foto`) 
                VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento', '$nome_foto')";

        $mensagem = "";
        $classe_alerta = "";

        if (mysqli_query($conn, $sql)) {
            $mensagem = "$nome cadastrado com sucesso!";
            $classe_alerta = "success";
        } else {
            $mensagem = "Não foi possível cadastrar $nome, tente novamente.";
            $classe_alerta = "danger";
        }
        ?>

        <!-- Botão invisível que dispara o modal -->
        <button type="button" id="abrirModal" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#resultadoModal">
            Abrir Modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="resultadoModal" tabindex="-1" aria-labelledby="resultadoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background-color: #181616ff;">
                    <div class="modal-header bg-<?php echo $classe_alerta; ?> text-white">
                        <h5 class="modal-title" id="resultadoModalLabel">
                            <?php echo ($classe_alerta == "success") ? "Sucesso!" : "Erro!"; ?>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="../img/<?php echo $nome_foto; ?>" alt="Foto" class="mostra_foto mb-3" style="border-radius: 50%;">
                        <div class="alert alert-<?php echo $classe_alerta; ?>">
                            <?php echo $mensagem; ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="home.php" class="btn btn-light">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../JS/bootstrap.bundle.min.js"></script>
    <script>
        // Abre o modal automaticamente após o carregamento da página
        window.addEventListener('DOMContentLoaded', function() {
            document.getElementById('abrirModal').click();
        });
       
    window.addEventListener('DOMContentLoaded', function () {
        document.getElementById('abrirModal').click();

        // Redireciona após 3 segundos se for sucesso
        <?php if ($classe_alerta == "success") { ?>
            setTimeout(function () {
                window.location.href = "home.php";
            }, 3000);
        <?php } ?>
    });

    </script>
</body>

</html>