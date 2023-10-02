<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>PAGINA INICIAL</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body class="p-0 m-0 border-0 bd-example m-0 border-0">

    <!-- Example Code -->

    <nav class="navbar navbar-expand-lg" id="detalhes">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../pagina_inicial.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Minha conta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Painel Gerente</a>
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
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">CADASTROS</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="person-tab" data-bs-toggle="tab" data-bs-target="#person-tab-pane" type="button" role="tab" aria-controls="person-tab-pane" aria-selected="false">CLIENTES</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="false">PRODUTOS</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">CONFIGURAÇÔES</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <br>
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="../../assets/img/padrao_sistema/produto.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal">PRODUTO</h5>
                                <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <img src="../../assets/img/padrao_sistema/forma_pgto.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal">FORMA DE PAGAMENTO</h5>
                                <!-- <p class="card-text">This is a short card.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="../../assets/img/padrao_sistema/grupo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal">GRUPO</h5>
                                <!-- <p class="card-text">This is a short card.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="../../assets/img/padrao_sistema/cliente.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal">GRUPO</h5>
                                <!-- <p class="card-text">This is a short card.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="person-tab-pane" role="tabpanel" aria-labelledby="person-tab" tabindex="0">...</div>
        </div>
    </div>


</body>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">CADASTRAR PRODUTO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="../../lib/gerente.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">cod integração</label>
                        <input type="number" name="cod_product" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-8">
                        <label for="inputPassword4" class="form-label">descricao</label>
                        <input type="text" name="description" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-md-12">
                        <label for="formFile" class="form-label">Imagem do produto</label>
                        <input class="form-control" name="image" type="file" id="formFile">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Tabela de preço</label>
                        <select id="inputState" class="form-select" name="option_table_money">
                            <option selected>CONSUMIDOR</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">valor</label>
                        <input type="text" name="value_money" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">GRUPO</label>
                        <select id="inputState" class="form-select" name="option_group">
                            <option selected>PADRAO</option>
                            <option>...</option>
                        </select>
                    </div>
                    <!-- <div class="modal-footer"> -->
                        <button type="button" class="btn" data-bs-dismiss="modal">CANCELAR</button>
                        <button type="submit" class="btn">CADASTRAR</button>
                    <!-- </div> -->
                </form>
            </div>

        </div>
    </div>
</div>

</html>