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
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <H3>Pedido numero #22504</H3>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        PRODUTOS
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-1">ID</th>
                                    <th scope="col" class="col-6">DESCRICAO</th>
                                    <th scope="col" class="col-1">QTD</th>
                                    <th scope="col" class="col-2">UNIT</th>
                                    <th scope="col" class="col-2">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>PASOKAR 200 GR</td>
                                    <td>1</td>
                                    <td>R$ 10,00</td>
                                    <td>R$ 10,00</td>
                                </tr>
                            </tbody>
                        </table>
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
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-md-5">
                                <label for="inputPassword4" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="inputPassword4">
                            </div>
                            <div class="col-md-1">
                                <label for="inputPassword4" class="form-label">Numero</label>
                                <input type="text" class="form-control" id="inputPassword4">
                            </div>
                            <div class="col-8">
                                <label for="inputAddress" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="CHICO ALICATE HOUSE">
                            </div>
                            <div class="col-4">
                                <label for="inputAddress2" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="37550-030">
                            </div>
                            <div class="col-md-8">
                                <label for="inputCity" class="form-label">OBSERVAÇÂO</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
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
                                        <option selected>DINHEIRO</option>
                                        <option value="1">BOLETO</option>
                                        <option value="2">CHEQUE</option>
                                        <option value="3">PIX</option>
                                    </select>
                                    <label for="floatingSelectGrid">Forma de Pagamento</label>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
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
                <button class="btn" type="button">Cancelar pedido</button>
                <button class="btn" type="button">Finalizar</button>
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