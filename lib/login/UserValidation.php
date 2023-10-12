<?php
require_once '../conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'):
    session_start();
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $sql = "SELECT * FROM clientes c WHERE  c.SITE ='{$username}' AND c.SENHA_LIBERACAO_VENDA ={$password}";
    $sql = $conexao->prepare($sql);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    // caso a consulta do banco de dados retorne vazio
    if(empty($result)):
        header('location: ../../index.php');
        exit();
    endif;
    session_start();
    $_SESSION['username'] = "chico alicate";
    $_SESSION['razao'] = $result[0]['RAZAO'];
    $_SESSION['login_validado'] = true;
    // caso a consulta com o banco de dados retorne algo
    header('location: ../../public/pagina_inicial.php');
    
else:
    header('location: ../../index.php');
endif;
?>
