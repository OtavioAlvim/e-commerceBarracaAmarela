<?php

require('../login/verificaLogin.php');
$pdo2 = new PDO('sqlite:../db/carrinho.db');
if($_POST['id_pedido'] == 0){
    $_SESSION['pedido_sem_itens'] = true;
    header("location: ../../public/finalizacao2.php");
}else{
    $id_pedido = $_POST['id_pedido'];
    $sql = "UPDATE carrinho_ecommerce  SET
    `STATUS` = 'C' WHERE ID ={$id_pedido}";
    $sql = $pdo2->prepare($sql);
    
    $sql->execute();
    $_SESSION['pedido_cancelado'] = true;
    header("location: ../../public/pagina_inicial.php");
}

?>
