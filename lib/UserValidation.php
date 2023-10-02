<?php
require_once './conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'):
    $username = $_POST['user'];
    $password = md5($_POST['pass']);
echo $password;
    $sql = 'SELECT * FROM users WHERE email_user =:user AND password =:pass';
    $sql = $conexao->prepare($sql);
    $sql->bindValue(':user',$username);
    $sql->bindValue(':pass',$password);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    // caso a consulta do banco de dados retorne vazio
    if(empty($result)):
        header('location: ../index.php');
        exit();
    endif;
    // caso a consulta com o banco de dados retorne algo
    header('location: ../public/pagina_inicial.php');
    
else:
    header('location: ../index.php');
endif;
?>
