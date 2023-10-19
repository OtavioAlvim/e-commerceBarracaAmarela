<?php
require('../lib/login/verificaLogin.php');
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
    <title>PAGINA INICIAL</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body{
        font-family: 'Roboto', sans-serif;
        }
    </style>

</head>

<body class="p-0 m-0 border-0 bd-example m-0 border-0">
    <nav class="navbar navbar-expand-lg" id="detalhes">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">Navbar w/ text</a> -->
            <span class="navbar-text">
                <button type="button" class="btn btn-outline-light position-relative border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>

                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="qtdItensCarrinho">

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
        <input type="hidden" name="idperfil" value="<?php echo $_SESSION['idperfil'] ?>" id="idperfil">
        <input type="hidden" name="nome_perfil" value="<?php echo $_SESSION['OBSERVACAO'] ?>" id="nome_perfil">

        <div class="container" id="conteudo">


        </div>
    </div>

    <!-- End Example Code -->

    <!-- div de carregamento -->
    <div id="loadingDiv" class="text-center" style="display: none;">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100vw; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; z-index: 999;">
            <img src="../assets/img/padrao_sistema/carregamento.gif" alt="Carregando..." style="width: 182px; height: 182px;">
        </div>
    </div>

        <!-- div de carregamento -->
        <!-- <div id="loadingDiv" class="text-center" style="display: none;">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100vw; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; z-index: 999;">
            <img src="../assets/img/padrao_sistema/carregamento3.gif" alt="Carregando..." style="width: 350px; height: 350px;">
        </div>
    </div> -->




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">CARRINHO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" name="usuario" value="<?php echo $_SESSION['userid'] ?>" id="userid">
                <div class="modal-body" id="itens">


                </div>
                <div class="modal-footer" id="totCarrinho">
                    <!-- total vira do banco de dados -->
                    <!-- <p>total vira do banco de dados</p>
                    <button type="button" class="btn" data-bs-dismiss="modal">CANCELAR</button>
                    <a class="btn" href="./finalizacao.php" role="button">FINALIZAR</a> -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/pagina-inicial.js"></script>


    <!-- <?php
            if (isset($_SESSION['login_validado'])) :
            ?>
        <script>
            Swal.fire({
                //   position: 'top-end',
                icon: 'success',
                title: 'Seja Bem vindo!',
                showConfirmButton: false,
                timer: 1000
            })
        </script>
    <?php
            endif;
            unset($_SESSION['login_validado']);
    ?> -->



    <?php
    if (isset($_SESSION['pedido_finalizado'])) :
    ?>
        <script>
            Swal.fire({
                //   position: 'top-end',
                icon: 'success',
                title: 'Pedido finalizado com sucesso!',
                showConfirmButton: false,
                timer: 1000
            })
        </script>
    <?php
    endif;
    unset($_SESSION['pedido_finalizado']);
    ?>

    <?php
    if (isset($_SESSION['produto_inserido'])) :
    ?>
        <script>
            Swal.fire({
                //   position: 'top-end',
                icon: 'success',
                title: 'Produto Inserido com sucesso!',
                showConfirmButton: false,
                timer: 1000
            })
        </script>
    <?php
    endif;
    unset($_SESSION['produto_inserido']);
    ?>
</body>

</html>