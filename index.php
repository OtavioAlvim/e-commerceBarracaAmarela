<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="./assets/img/padrao_sistema/favicon.ico" type="image/x-icon">
    <style>
        /* body {
            background-color: #EDAB3B;
        } */

        body {
            background-image: url('./assets/img/padrao_sistema/2.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-size: 100%;
            background-position: center;
        }

        .login-container {
            margin-top: 100px;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .centered-image {
            display: block;
            margin: 0 auto;
            width: 150px;
            /* Defina a largura desejada para a imagem */
        }

        .btn {
            background-color: #EDAB3B;
        }

        .btn:hover {
            background-color: #be8f3d;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <img src="./assets/img/padrao_sistema/logo.jpeg" alt="Logo" class="centered-image">
                <h2 class="text-center">Entrar</h2>
                <form action="./lib/login/UserValidation.php" method="post">
                    <div class="form-group">
                        <label for="username">Usuário:</label>
                        <input type="email" class="form-control" id="username" name="user" placeholder="Digite seu usuário" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control" id="password" name="pass" placeholder="Digite sua senha">
                    </div>
                    <button type="submit" class="btn btn-block">Entrar</button>
                    <br>
                    <!-- <P>Não tem cadastro? <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">clique aqui</a> </P> -->
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro de usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Razao Social/Nome</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Fantasia/Sobrenome</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>