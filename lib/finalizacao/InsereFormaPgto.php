<?php
require_once '../conexao.php';
$pdo2 = new PDO('sqlite:../db/carrinho.db');
$id_usuario = $_POST['userid'];
$id_pedido  = $_POST['id_pedido'];
$valor_pedido = $_POST['valor_pedido'];
$id_forma = $_POST['id_forma'];


$sql0 = "SELECT * FROM formaspgto f WHERE f.ID =:id";
$sql0 = $conexao->prepare($sql0);
$sql0->bindValue(':id',$id_forma);
$sql0->execute();
$nome_forma = $sql0->fetchAll(PDO::FETCH_ASSOC);

$sql = "UPDATE carrinho_ecommerce
SET TOTAL ='{$valor_pedido}',
FORMAPGTO ={$id_forma},
NOME_FORMA ='{$nome_forma[0]['DESCRICAO']}'
WHERE ID ={$id_pedido}";
$sql = $pdo2->prepare($sql);

$sql->execute();
?>
