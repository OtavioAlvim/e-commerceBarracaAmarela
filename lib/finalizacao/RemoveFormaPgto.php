<?php
require_once '../conexao.php';
$pdo2 = new PDO('sqlite:../db/carrinho.db');

$id_pedido  = $_POST['id_pedido'];

$sql0 = "SELECT * FROM formaspgto f WHERE f.ID =:id";
$sql0 = $conexao->prepare($sql0);
$sql0->bindValue(':id',$id_forma);
$sql0->execute();
$nome_forma = $sql0->fetchAll(PDO::FETCH_ASSOC);

$sql = "UPDATE carrinho_ecommerce SET FORMAPGTO = null,NOME_FORMA = null WHERE ID ={$id_pedido}";
$sql = $pdo2->prepare($sql);

$sql->execute();
?>
