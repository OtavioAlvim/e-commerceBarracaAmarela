<?php
require_once '../conexao.php';
session_start();

if (empty($_POST['user']) || empty($_POST['pass'])) {
    $_SESSION['erro'] == true;
    header("location: ../../index.php");
}
$username = $_POST['user'];
$password = $_POST['pass'];

if ($username == "gerente" && $password == "adm452864") {
    session_start();
    $_SESSION['username'] = "GERENTE";
    $_SESSION['ID_EMPRESA'] = 1;
    $_SESSION['VENDEDORPADRAO'] = 1 ;
    $_SESSION['TIPOPEDIDODEFAULT'] = 10 ;
    $_SESSION['ID_PLANOCONTAPEDIDO'] = 1 ;
    $_SESSION['RAZAO'] = "EMPRESA TESTE DE DESENVOLVIMENTO LTDA";
    header("location: ../../public/dashboard/gerente.php");
} else {
    if (!is_int($password)) {
        $_SESSION['erro'] == true;
        header("location: ../../index.php");
    }
    $sql = "SELECT * FROM clientes c JOIN perfilclientes p ON c.ID_PERFIL = p.ID_PERFIL WHERE  c.SITE ='{$username}' AND c.SENHA_LIBERACAO_VENDA ={$password}";
    $sql = $conexao->prepare($sql);
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $resultado) {
    }
    if (empty($resultado)) {
        $_SESSION['error'] = true;

        header('location: ../../index.php');
    } else {

        $sql = "SELECT i.TIPOPEDIDODEFAULT,i.TIPOPLANOPGDEFAULT,i.ID_PLANOCONTAPEDIDO,i.ID_BANCOPEDIDO,i.DEFAULTRETIRADOPOR FROM indices i";
        $sql = $conexao->prepare($sql);
        $sql->execute();
        $indices = $sql->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['ID_EMPRESA'] = 1;
        $_SESSION['RAZAO'] = "EMPRESA TESTE DE DESENVOLVIMENTO LTDA";
        $_SESSION['TIPOPEDIDODEFAULT'] = $indices[0]['TIPOPEDIDODEFAULT'];
        $_SESSION['VENDEDORPADRAO'] =  1;
        $_SESSION['TIPOPLANOPGDEFAULT'] =  $indices[0]['TIPOPLANOPGDEFAULT'];
        $_SESSION['ID_PLANOCONTAPEDIDO'] =  $indices[0]['ID_PLANOCONTAPEDIDO'];
        $_SESSION['ID_BANCOPEDIDO'] =  $indices[0]['ID_BANCOPEDIDO'];


        $_SESSION['username'] = $resultado['RAZAO'];
        $_SESSION['userid'] = $resultado['CODIGOCLI'];
        $_SESSION['idperfil'] = $resultado['ID_PERFIL'];
        $_SESSION['OBSERVACAO'] = $resultado['OBSERVACAO'];
        $_SESSION['login_validado'] = true;
        header("location: ../../public/pagina_inicial.php");
    };
}
