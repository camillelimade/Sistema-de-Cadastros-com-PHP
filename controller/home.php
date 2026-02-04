<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Empresa</title>
    <link rel="stylesheet" href="../CSS/cad.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
</head>
<style>
    body{
        text-align: center;
        background-color: #1c1b1bff;
    }#corpo1{
        height: 500px;
        width:500px;
        padding-top: 55px;
    }
    h1, p, hr{
        color: whitesmoke;
    }
    .nav-item{
        border: solid 0.5px #fff;
        border-radius: 10px;
        margin: 6px;
    }
</style>
<body>
    <!-- <nav class="navbar navbar-dark fixed-top" style="background-color: #181616ff;">
  <div class="container-fluid">
     <a class="navbar-brand" href="home.php">Painel de Cadastros</a> 
     <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation" style="background-color: #181616ff;">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <!-- <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel" >
      <div class="offcanvas-header" style="background-color: #181616ff;">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Lista de Ferramentas</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body" style="background-color: #1c1b1bff;">
        <ul class="navbar-nav justify-content-left flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pesquisa.php">Pesquisar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div> 
  </div>
</nav> -->
    <div class="container" id="corpo1">
        <div class="row">
            <div class="col">
                <div class="container">
                    <h1>CadSys</h1>
                    <hr class="my-4">
                    <p>Acesse nossos serviços.</p>
                    <button data-bs-toggle="modal" data-bs-target="#cadastroModal" id="abrirCadastro" class="btn btn-outline-light btn-lg">Cadastrar</button>
                    <a href="pesquisa.php" class="btn btn-outline-light btn-lg">Pesquisar</a>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="cadastroModal" tabindex="-1">
     <div class="modal-dialog modal-dk modal-dialog-centered">
    <div class="modal-content" style="background-color: #181616ff;">
      <div class="modal-header text-white" style="background-color: #181616ff;">
        <h5 class="modal-title" style="border: none;">Formulário de Cadastro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="conteudoModal" style="background-color: #181616ff; border-radius: 10px;">
       
      </div>
    </div>
  </div>
</div>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("abrirCadastro").addEventListener("click", function(){
            fetch("cad.php")
            .then(res => res.text())
            .then(html => {
                document.getElementById("conteudoModal").innerHTML = html;
            });
        });
    </script>
</body>
</html>