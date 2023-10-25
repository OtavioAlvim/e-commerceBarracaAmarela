<?php
require('../login/verificaLogin.php');
require_once '../conexao.php';
if($_POST['id_pedido'] == 0){
    $_SESSION['pedido_sem_itens'] = true;
    header("location: ../../public/finalizacao2.php");
}else{
    $id_pedido = $_POST['id_pedido'];
    $sql = "UPDATE carrinho_ecommerce c SET
    c.`STATUS` = 'C' WHERE c.ID ={$id_pedido}";
    $sql = $conexao->prepare($sql);
    
    $sql->execute();
    $_SESSION['pedido_cancelado'] = true;
    header("location: ../../public/pagina_inicial.php");
}

?>
