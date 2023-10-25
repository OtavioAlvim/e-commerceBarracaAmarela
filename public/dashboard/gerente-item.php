<?php
require('../../lib/login/verificaLogin.php');
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
    <link rel="stylesheet" href="../../assets/css/pedidos.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        a {
            text-decoration: none;
        }

        tr {
            background-color: red;
        }
    </style>
</head>

<body>

    <!-- Example Code -->
    <!-- <nav class="navbar fixed-top bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Fixed top</a>
      </div>
    </nav> -->
    <nav class="navbar fixed-top navbar-expand-lg" id="detalhes">
        <div class="container-fluid">
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
                        <a class="nav-link active" aria-current="page" href="../pagina_inicial.php">PRODUTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">ATUALIZAR CADASTROS</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="./index.php">Meus pedidos</a>
                    </li> -->
                </ul>
                <span class="navbar-text">
                    <span class="navbar-text">
                        <a href="../../lib/login/logout.php">
                            <button type="button" class="btn btn-light position-relative border-0">
                                <?php echo $_SESSION['username'] ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                            </button></a>
                    </span>
                </span>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="container">
        <br>
        <h4>PRODUTO: 10554</h4>

        <form class="row g-3">
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">DESCRIÇÃO</label>
                <input type="email" class="form-control" id="inputEmail4" value="CHICO ALICATE">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">IMAGEM DO PRODUTO</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">PROMOÇÃO</label>
                <input type="password" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-3">
                <label for="inputAddress" class="form-label">UNITARIO</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-md-3">
                <label for="inputAddress2" class="form-label">ATACADO</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-3">
                <label for="inputCity" class="form-label">REVENDA</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-12">
                <label for="exampleFormControlTextarea1" class="form-label">FICHA TÉCNICA DO PRODUTO</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn">INSERIR DADOS</button>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>