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
                <button type="button" class="btn btn-light position-relative border-0">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                    </svg>
                </button>
            </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../pagina_inicial.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Meus pedidos</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Sobre nós</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="./gerente/gerente.php">Painel Gerente</a>
                    </li> -->
                </ul>
                <span class="navbar-text">
                    <span class="navbar-text">
                        <button type="button" class="btn btn-light position-relative border-0">
                            ADMINISTRADOR
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>

                            <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                2
                            </span> -->
                        </button>
                    </span>
                </span>
            </div>
        </div>
    </nav>
    <br><br><br>

    <div class="container">
        <table class="table text-center">
            <thead>
                <tr>
                    <th class="col" scope="col">Pedido</th>
                    <th class="col" scope="col">Descrição</th>
                    <th class="col" scope="col">Status</th>
                    <!-- <th class="col-2" scope="col">Operações</th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1245</th>
                    <td>Pedido efetuado 21/10/2023</td>
                    <td>
                        <p id="aprovacao">aguardando aprovação...</p>
                    </td>
                    <!-- <td class="d-flex"><p id="cancelar" >cancelar</p>  <p id="informacoes">informações</p>  </td> -->
                </tr>

            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../assets/js/pedidos.js"></script>

</body>

</html>