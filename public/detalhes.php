<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Barraca Amarela</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
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
                        <a class="nav-link active" aria-current="page" href="#">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Minha conta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre nós</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    BARRACA AMARELA
                </span>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="container">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 g-2 align-items-start">
            <div class="col">
                    <!-- <img src="./img/1077c3a2-0a88-11ec-be8a-0242ac120002.jpeg" alt=""> -->
                    <img src="../assets/img/1d1d1cb0-47d2-11ec-a274-0242ac120006.jpeg" class="img-thumbnail" alt="..." style="height: 60vh;">
                </div>
                <div class="col">
                    <div class="col">
                        <div class="mh-100" style="height: 70vh;">

                            <div class="container">
                                <h3 class="mt-2">SAGRADO ALICATE</h3>
                                <hr>
                                <nav class="navbar fixed-bottom m-1">
                                    <div class="row g-2">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingInputGrid" placeholder="quantidade" value="1">
                                                <label for="floatingInputGrid">QUANTIDADE</label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <div class="d-grid gap-2">
                                                    <button class="btn" type="button">ADICIONAR AO CARRINHO</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </nav>
                                <p><strong>FICHA TÉCNICA :</strong>  <br> Produto feito e desenvolvido por Chico Alicate e Aagrado alicate LTDA</p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

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
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">CANCELAR</button>
                    <button type="button" class="btn">FINALIZAR</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>