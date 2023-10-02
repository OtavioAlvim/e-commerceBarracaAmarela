
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="./assets/img/padrao_sistema/favicon.ico" type="image/x-icon">
    <style>
        /* body {
            background-color: #EDAB3B;
        } */

        body {
            /* background-image: url(../images/Pedidos.png); */
            /* background-image: url(../images/imagem-fundo/fundo.png); */
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
                <form action="./lib/UserValidation.php" method="post">
                    <div class="form-group">
                        <label for="username">Usuário:</label>
                        <input type="email" class="form-control" id="username" name="user" placeholder="Digite seu usuário">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control" id="password" name="pass" placeholder="Digite sua senha">
                    </div>
                    <button type="submit" class="btn btn-block">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>