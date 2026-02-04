<?php
require_once __DIR__ . '/../config/helpers.php';

$limite = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$pagina = ($pagina < 1) ? 1 : $pagina;

$offset = ($pagina - 1) * $limite;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesquisar - Empresa</title>
    <link rel="stylesheet" href="../CSS/cad.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">

</head>

<body>
    <?php
    $pesquisa = $_POST["busca"] ?? ' ';
    include "conexao.php";

   $sql = "SELECT * FROM pessoas 
        WHERE nome LIKE '%$pesquisa%' 
        ORDER BY cod_pessoa DESC 
        LIMIT $limite OFFSET $offset";
    $dados = mysqli_query($conn, $sql);
    ?>
    <style>
        body {
            background-color: #1c1b1bff;

        }

        #tit {
            color: whitesmoke;
        }

        th,
        td {
            background-color: #1c1b1bff !important;
            text-align: center;
        }
    </style>

    <div class="container" id="corpo1">
        <div class="row">
            <div class="col">
                <a href="home.php" class="btn btn-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                    </svg>
                </a>
                <br><br>
                <h1 id="tit">Pesquisar</h1>
                <nav class="navbar bg-body-dark">
                    <div class="container-fluid">
                        <form class="d-flex" role="search" action="pesquisa.php" method="POST">
                            <input class="form-control me-2 " type="search" placeholder="Nome" aria-label="Search"
                                name="busca" autofocus />
                            <button class="btn btn-outline-success" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </form>
                        <br><br><br>
                    </div>
                </nav>

                <div class="table-responsive table-bordered mt-3">
                    <table class="table table-dark table-hover" style="background-color: #1c1b1bff;">
                        <thead style="background-color: #1c1b1bff;">
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Data de Nascimento</th>
                                <th scope="col">Funções</th>
                            </tr>
                        </thead>

                        <tbody style="background-color: #1c1b1bff; border-radius: 16px;">
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $cod_pessoa = $linha['cod_pessoa'];
                                $nome = $linha['nome'];
                                $endereco = $linha['endereco'];
                                $telefone = $linha['telefone'];
                                $email = $linha['email'];
                                $data_nasc = mostra_data($linha['data_nasc']);
                                $foto = $linha['foto'];

                                echo "
                                <tr>
                                    <th scope='row'><img src='../img/$foto' style='width: 40px; border-radius: 70px;'></th>
                                    <th scope='row'>$nome</th>
                                    <td>$endereco</td>
                                    <td>$telefone</td>
                                    <td>$email</td>
                                    <td>$data_nasc</td>

                                    <td>
                                        <div class='d-grid gap-2 d-md-flex'>
                                            <a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-warning'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                                                </svg>
                                            </a>

                                            <a href='#'
                                                class='btn btn-danger'
                                                data-bs-toggle='modal'
                                                data-bs-target='#confirma'
                                                data-id='$cod_pessoa'
                                                data-nome='$nome'>
                                                
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                                    <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>";
                            }/*
                            M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5
                            */
                            ?>
                            
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center gap-2 mt-3">
    <?php if ($pagina > 1): ?>
        <a class="btn btn-outline-light"
           href="pesquisa.php?pagina=<?= $pagina - 1 ?>&busca=<?= urlencode($pesquisa) ?>">
            ⬅ Anterior
        </a>
    <?php endif; ?>

    <span class="btn btn-light disabled">
        Página <?= $pagina ?>
    </span>

    <?php if (mysqli_num_rows($dados) == $limite): ?>
        <a class="btn btn-outline-light"
           href="pesquisa.php?pagina=<?= $pagina + 1 ?>&busca=<?= urlencode($pesquisa) ?>">
            Próxima ➡
        </a>
    <?php endif; ?>
</div>

                    <br>
                </div>
            </div>
        </div>

        <!-- Modal de Confirmação -->
        <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Confirmação de Exclusão</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="excluir_script.php" method="POST">
                            <p>Deseja realmente excluir <b id="nome_pessoa_texto">Nome da pessoa</b>?</p>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>

                                <input type="hidden" name="id" id="cod_pessoa">
                                <input type="hidden" name="nome" id="nome_pessoa_input">

                                <input type="submit" class="btn btn-danger" value="Sim">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- SCRIPT DO MODAL -->
    <script type="text/javascript">
        const excluirModal = document.getElementById('confirma');

        excluirModal.addEventListener('show.bs.modal', function(event) {

            const botao = event.relatedTarget;

            const id = botao.getAttribute('data-id');
            const nome = botao.getAttribute('data-nome');

            document.getElementById('cod_pessoa').value = id;
            document.getElementById('nome_pessoa_input').value = nome;
            document.getElementById('nome_pessoa_texto').textContent = nome;
        });
    </script>

    <script src="../JS/bootstrap.bundle.min.js"></script>

</body>

</html>