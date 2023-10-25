<?php
require('../lib/login/verificaLogin.php');
$pdo2 = new PDO('sqlite:../lib/db/produto.db');
$pdo = new PDO('sqlite:../lib/db/bancoImagens.db');
$idproduto = $_GET['item'];
$sql = "SELECT * FROM produtos_integracao p WHERE p.CODITEM =:idproduto";
$sql = $pdo2->prepare($sql);
$sql->bindValue(':idproduto', $idproduto);
$sql->execute();
$result_id = $sql->fetchAll(PDO::FETCH_ASSOC);


$sql = $pdo->prepare("select * from imagens where coditem = :id_produto");
$sql->bindValue(':id_produto', $result_id[0]['CODITEM']);
$sql->execute();
$image = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($image as $image) {
}
if (empty($image['patch_image'])) :
    // echo 'não tem imagem'; 
    $image_caminho = '../assets/img/padrao_sistema/sem_imagem.png';

else :
    // echo 'tem imagem'; 
    $image_caminho = '../assets/img/produto/' . $image['patch_image'];
endif;
$image_caminho
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
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
    <br><br><br>
    <div class="container">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 g-2 align-items-start">
                <div class="col">
                    <img src="<?php echo $image_caminho ?>" class="img-thumbnail" alt="..." style="height: 60vh; width: 100%;">
                </div>
                <div class="col">
                    <div class="col">
                        <div class="mh-100" style="height: 70vh;">

                            <div class="container">
                                <h3 class="mt-2"><?php echo $result_id[0]['DESCRICAO'] ?></h3>
                                <hr>
                                <nav class="navbar fixed-bottom m-1">
                                    <form action="../lib/detalhes/InsereProduto.php" method="post">
                                        <input type="hidden" name="CODITEM" value="<?php echo $result_id[0]['CODITEM'] ?>">
                                        <input type="hidden" name="CODBARRA" value="<?php echo $result_id[0]['CODBARRA']  ?>">
                                        <input type="hidden" name="CUSTO" value="<?php echo $result_id[0]['CUSTO'] ?>">
                                        <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']  ?>">
                                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']  ?>">
                                        <input type="hidden" name="nome_tabela_preco" value="<?php echo $_SESSION['OBSERVACAO']  ?>">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="floatingInputGrid" placeholder="quantidade" value="1" name="quantidade_inserida">
                                                    <label for="floatingInputGrid">QUANTIDADE</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn" type="submit">ADICIONAR AO CARRINHO</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </nav>
                                <H4>R$ <?php 
                                $nome_preco = $_SESSION['OBSERVACAO'];
                                if($nome_preco == 'atacado'){
                                    echo number_format($result_id[0]['UNITARIOATACADO'], 2, ',', ' ');
                                }else if($nome_preco == 'revenda'){
                                    echo number_format($result_id[0]['PRECOREVENDA'], 2, ',', ' ');
                                }else if($nome_preco == 'promocao'){
                                    echo number_format($result_id[0]['PROMOCAO'], 2, ',', ' ');
                                }else{
                                    echo number_format($result_id[0]['UNITARIO'], 2, ',', ' ');
                                }
                                ?></H4>
                                <p><strong>FICHA TÉCNICA :</strong> <br> <?php echo $result_id[0]['OBSERVACOES'] ?></p>

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