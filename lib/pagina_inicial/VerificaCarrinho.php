<?php
$pdo2 = new PDO('sqlite:../db/carrinho.db');

$userid = $_GET['userid'];
$sql = "SELECT COALESCE(SUM(ic.TOTAL),0) AS total FROM carrinho_ecommerce c JOIN itens_carrinho_ecommerce ic on c.ID = ic.ID_CARRINHO_ECOMMERCE WHERE c.ID_CLIENTE ={$userid} AND c.`STATUS` = 'A'";
$sql = $pdo2->prepare($sql);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);

if ($results[0]['total'] == '0') {
    // <!-- não tem produtos no pedido -->
    // echo 'não tem nada';
    $dados = array('status' => 'nao_tem_itens');
} else {
    // <!-- pedido ja contem itens -->
    // echo ' tem itens';
    $dados = array('status' => 'tem_itens');
} 
echo json_encode($dados);
?>