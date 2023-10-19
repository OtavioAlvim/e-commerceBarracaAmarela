<?php
require('../lib/login/verificaLogin.php');

require('../lib/conexao.php');

$userid = $_SESSION['userid'];
$sql = "SELECT c.NOME_FORMA,ic.* FROM carrinho_ecommerce c JOIN itens_carrinho_ecommerce ic on c.ID = ic.ID_CARRINHO_ECOMMERCE WHERE c.ID_CLIENTE ={$userid} AND c.`STATUS` = 'A'";
$sql = $conexao->prepare($sql);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);



$sql = "SELECT fc.ID_FORMAPGTO,fp.DESCRICAO FROM formaspgtocliente fc
JOIN formaspgto fp
ON fc.ID_FORMAPGTO = fp.ID
WHERE fc.ID_CLIENTE = {$userid}";
$sql = $conexao->prepare($sql);
$sql->execute();
$resultss = $sql->fetchAll(PDO::FETCH_ASSOC);



$sql = "SELECT COALESCE(SUM(ic.TOTAL),0) AS total,c.NOME_FORMA,c.* FROM carrinho_ecommerce c JOIN itens_carrinho_ecommerce ic on c.ID = ic.ID_CARRINHO_ECOMMERCE WHERE c.ID_CLIENTE ={$userid} AND c.`STATUS` = 'A'";
$sql = $conexao->prepare($sql);
$sql->execute();
$formaPag = $sql->fetchAll(PDO::FETCH_ASSOC);
// print_r($formaPag);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Barraca Amarela</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .input-group-text {
            background-color: #EDAB3B;
        }

        .input-group-text:hover {
            background-color: #d8982a;
        }
    </style>
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
        <input type="hidden" name="ID_EMPRESA" value="<?php echo  $_SESSION['ID_EMPRESA'] ?>" id="id_empresa">
        <input type="hidden" name="TIPOPEDIDODEFAULT" value="<?php echo  $_SESSION['TIPOPEDIDODEFAULT'] ?>" id="tipopedido">
        <input type="hidden" name="VENDEDORPADRAO" value="<?php echo  $_SESSION['VENDEDORPADRAO'] ?>" id="vendedor">
        <input type="hidden" name="TIPOPLANOPGDEFAULT" value="<?php echo  $_SESSION['TIPOPLANOPGDEFAULT']  ?>" id="planopgto">
        <input type="hidden" name="ID_PLANOCONTAPEDIDO" value="<?php echo  $_SESSION['ID_PLANOCONTAPEDIDO'] ?>" id="planoconta">
        <input type="hidden" name="ID_BANCOPEDIDO" value="<?php echo  $_SESSION['ID_BANCOPEDIDO']  ?>" id="id_banco">
        <p><strong>DADOS PARA FINALIZAÇÃO DO PEDIDO</strong> </p>
        <hr>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        PRODUTOS
                    </button>
                </h2>

                <!-- para mostrar os produtos posso apenas colocar o show na classe : accordion-collapse collapse -->
                <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                    <div class="accordion-body" id="itens">


                        <table class="table table-hover text-center">
                            <input type="text" name="id_pedido" id="id_pedido" value="<?php echo $results[0]['ID_CARRINHO_ECOMMERCE'] ?>">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-1">ID</th>
                                    <th scope="col" class="col-7">DESCRICAO</th>
                                    <th scope="col" class="col-1">QTD</th>
                                    <th scope="col" class="col-1">TOTAL</th>
                                    <th scope="col" class="col-1">REMOVER</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 0;
                                foreach ($results as $results) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $n = $n + 1 ?></th>
                                        <td><?php echo $results['DESCRICAO'] ?></td>
                                        <td><?php echo number_format($results['QTDE'], 2, ',', ' ') ?></td>
                                        <td><?php echo number_format($results['TOTAL'], 2, ',', ' ') ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                </svg>
                                            </button>

                                        </td>
                                    </tr>
                                <?php } ?>
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
                        <form class="row g-3" id="entrega">
                            <!-- aqui vem os dados do banco de dados -->
                        </form>
                    </div>
                </div>
            </div>
        </div><br>



        <?php
        if (empty($formaPag[0]['FORMAPGTO'])) { ?>
            <!-- caso a forma de pagamento não tenha sido inserida -->
            <div class="row g-3" id="selecao_forma_pagamento">
                <p><strong>FORMA DE PAGAMENTO</strong></p>
                <div class="col-md-9" id="dados_pagamento">
                    <select class="form-select" aria-label="Default select example" id="forma_pagamento_inserido">
                        <option value="sem_valor">FORMA DE PAGAMENTO</option>
                        <?php
                        foreach ($resultss as $resultss) {
                        ?>
                            <option value="<?php echo $resultss['ID_FORMAPGTO'] ?>"><?php echo $resultss['DESCRICAO'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" aria-label="default input example" value=" R$: <?php echo number_format($formaPag[0]['total'], 2, ',', ' ') ?>" disabled>
                </div>
                <div class="col-md-1">

                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn" type="button" id="inserir_forma">INSERIR</button>
                    </div>
                </div>
            </div><br>

            <div class="row justify-content-end g-3 ">
                <div class="col-md-2">
                    <div class="d-grid gap-2 d-block">
                        <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancelar pedido</button>
                    </div>
                </div>

            </div><br>
        <?php

        } else { ?>
            <!-- caso a forma de pagamento ja foi inserido -->
            <div class="row g-3" id="forma_selecionada">
                <p>FORMA DE PAGAMENTO SELECIONADA</p>
                <div class="col-md-2">
                    <div class="input-group">
                        <div class="input-group-text"><button type="submit" class="btn-close" aria-label="Close" id="remover_forma"></button></div>
                        <input type="text" class="form-control" id="autoSizingInputGroup" value="<?php echo $formaPag[0]['NOME_FORMA'] ?>" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <div class="input-group-text">Total</button></div>
                        <input type="text" class="form-control" value=" R$: <?php echo number_format($formaPag[0]['total'], 2, ',', ' ')?>" disabled>
                    </div>
                </div>
            </div>

            <br>
            <div class="row justify-content-end g-3 ">
                <div class="col-md-2" id="finalizarr">
                    <div class="d-grid gap-2 d-block" id="finalizar">
                        <button class="btn" type="button" id="salvarDados">Finalizar</button>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="d-grid gap-2 d-block">
                        <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancelar pedido</button>
                    </div>
                </div>

            </div><br>
        <?php

        } ?>
        <br>
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
                    DESEJA CANCELAR ESSE PEDIDO?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">SAIR</button>
                    <form action="../lib/finalizacao/CancelarPedido.php" method="post">
                        <input type="hidden" name="id_pedido"  value="<?php echo $results['ID_CARRINHO_ECOMMERCE'] ?>">
                        <button type="submit" class="btn">CANCELAR PEDIDO</button>
                    </form>

                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../assets/js/finalizacao2.js"></script>


</body>

</html>