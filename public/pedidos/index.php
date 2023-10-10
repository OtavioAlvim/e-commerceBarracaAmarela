<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>PAGINA INICIAL</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/pedidos.css">
</head>

<body class="p-0 m-0 border-0 bd-example m-0 border-0">

    <!-- Example Code -->

    <nav class="navbar navbar-expand-lg" id="detalhes">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">Navbar w/ text</a> -->
            <span class="navbar-text">
                <button type="button" class="btn btn-outline-light position-relative border-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>

                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        2
                    </span>
                </button>
            </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./pagina_inicial.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/pedidos/index.php">Meus pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./gerente/gerente.php">Painel Gerente</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Bem vindo administrador
                </span>
            </div>
        </div>
    </nav>
    <br><br><br>

    <div class="container">
        <table class="table text-center">
            <thead>
                <tr>
                    <th class="col-1" scope="col">Pedido</th>
                    <th class="col-5" scope="col">Descrição</th>
                    <th class="col-4" scope="col">Status</th>
                    <th class="col-2" scope="col">Operações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1245</th>
                    <td>Pedido efetuado 21/10/2023</td>
                    <td  ><p id="aprovacao">aguardando aprovação...</p> </td>
                    <td class="d-flex"><p id="cancelar" >cancelar</p>  <p id="informacoes">informações</p>  </td>
                </tr>

            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>