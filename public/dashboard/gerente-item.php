<?php
require('./verificaLogin.php');

$id_produto = $_GET['PRODUTO'];
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <title>ITEM</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }

    a {
      text-decoration: none;
    }

    tr {
      background-color: red;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="./gerente.php">GERENTE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">MENU</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal">RECEBER CARGA DE PRODUTOS</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exportar">EXPORTAR PEDIDOS</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="./gerente_pedidos.php">PEDIDOS PENDENTES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="modal" data-bs-target="#planilha">IMPORTAR PLANILHA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./gerente-config.php">CONFIGURAÇÕES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../lib/login/logout.php">SAIR</a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>
  <br><br>
  <input type="hidden" name="id_produto" value="<?php echo $id_produto ?>" id="id_produto">
  <div class="container" id="conteudo">
    <!-- vira do banco dados  -->
  </div>

  <!-- div de carregamento -->
  <div id="loadingDiv" class="text-center" style="display: none;">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100vw; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; z-index: 999;">
      <img src="../../assets/img/padrao_sistema/carregamento.gif" alt="Carregando..." style="width: 182px; height: 182px;">
    </div>
  </div>



  <!-- Modal atualizar cadastros -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">ATUALIZAR CADASTROS</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4 class="text-center" style="color: red;">ATENÇÃO !!</h4>
          <p>Esse processo vai atualizar todo o preço do sistema com base nos valores cadastrados no Sia.</p>
          <p>Esse processo buscará tambem novos produtos cadastrados no Sia.</p>

          <div class="text-center" id="carregando" style="display: none;">
            <div class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">CANCELAR</button>
          <button type="button" class="btn btn-dark" id="busca_produto">ATUALIZAR CADASTROS</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal exportar pedido-->
  <div class="modal fade" id="exportar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">EXPORTAR PEDIDO</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Selecione um perido para exportação dos pedidos</p>
          <div class="row g-2">
            <div class="col-md">
              <div class="form-floating">
                <input type="date" class="form-control" id="floatingInputGrid">
                <label for="floatingInputGrid">Data inicial</label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <input type="date" class="form-control" id="floatingInputGrid">
                <label for="floatingInputGrid">Data inicial</label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">CANCELAR</button>
          <button type="button" class="btn btn-dark" id="busca_produto">ATUALIZAR CADASTROS</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal importar planilha -->
  <div class="modal fade" id="planilha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">ATUALIZAR CADASTROS</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="formFile" class="form-label">Selecione o arquivo para importacao</label>
            <input class="form-control" type="file" id="formFile">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">CANCELAR</button>
          <button type="button" class="btn btn-dark" id="busca_produto">ATUALIZAR CADASTROS</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../../assets/js/dashboard_itens.js"></script>

</body>

</html>