<?php
require('../lib/login/verificaLogin.php');
?>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./pagina_inicial.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pedidos/">Meus pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./sobrenos/">Sobre nós</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a href="../lib/login/logout.php">
                        <button type="button" class="btn btn-light position-relative border-0">
                            <?php echo $_SESSION['username'] ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                        </button></a>
                </span>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <input type="hidden" name="usuario" value="<?php echo $_SESSION['userid'] ?>" id="userid">
        <H3>Dados para finalização do pedido</H3>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        PRODUTOS
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body" id="itens">
                        <!-- aqui vem os dados do banco de dados -->
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        DADOS PARA ENTREGA
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form class="row g-3" id="entrega">
                            <!-- aqui vem os dados do banco de dados -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        FORMA DE PAGAMENTO
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelectGrid">
                                        <!-- vsalor vira do banco de dados -->
                                    </select>
                                    <label for="floatingSelectGrid">Forma de Pagamento</label>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="2" disabled>
                                    <label for="floatingInputGrid">Valor total</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <!-- <button type="button" class="btn btn-warning btn-lg">INSERIR</button> -->
                                    <div class="d-grid gap-2 m-1">
                                        <button class="btn btn-warning btn-lg" type="button">INSERIR</button>
                                        <!-- <button class="btn btn-primary" type="button">Button</button> -->
                                    </div>
                                </div>
                            </div>


                        </div><br>


                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">OBSERVAÇÂO</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-end">
            <br>
            <div class="d-grid gap-2 d-md-block">
                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancelar pedido</button>
                <button class="btn" type="button" id="salvarDados">Finalizar</button>
            </div>
        </div>
    </div>


    <!-- div de carregamento -->
    <div id="loadingDiv" class="text-center" style="display: none;">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100vw; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; z-index: 999;">
            <img src="../assets/img/padrao_sistema/carregamento.gif" alt="Carregando...">
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">CANCELAMENTO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">SAIR</button>
                    <button type="button" class="btn">CANCELAR PEDIDO</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../assets/js/finalizacao.js"></script>
</body>

</html>