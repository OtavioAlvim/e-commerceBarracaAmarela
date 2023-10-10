
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>PAGINA INICIAL</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="p-0 m-0 border-0 bd-example m-0 border-0">
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
                    <strong> Bem vindo administrador</strong>
                </span>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="row g-3" id="consulta_produto">
                        <div class="col">
                            <label for="inputPassword2" class="visually-hidden">Password</label>
                            <input type="text" class="form-control" id="descricao_prod" placeholder="Pesquise o Produto" autofocus>
                        </div>
                    </form>
                </div><br>
            </div>

            <div class="row">
                <div class="col">

                </div>
                <div class="col-sm-4">
                    <br>
                    <select class="form-select form-select-sm" aria-label="Small select example" id="opcoes">
                    </select><br>
                </div>
            </div>
        </div>

        <div class="container" id="conteudo">


        </div>
    </div>

    <!-- End Example Code -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">CARRINHO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <p>1 - Amendoin caradomelo R$10,00</p> -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="col-1">ID</th>
                                <th scope="col" class="col-7">DESCRICAO</th>
                                <th scope="col" class="col-1">QTD</th>
                                <th scope="col" class="col-1">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Amendoin caradomelo</td>
                                <td>4</td>
                                <td>10,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <p><strong>TOTAL DO PEDIDO R$ 00,00</strong> </p>
                    <button type="button" class="btn" data-bs-dismiss="modal">CANCELAR</button>
                    <button type="button" class="btn">FINALIZAR</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/pagina-inicial.js"></script>

</body>

</html>