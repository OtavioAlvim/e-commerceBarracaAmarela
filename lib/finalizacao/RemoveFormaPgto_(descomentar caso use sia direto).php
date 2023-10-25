<?php
require_once '../conexao.php';


$id_pedido  = $_POST['id_pedido'];

$sql0 = "SELECT * FROM formaspgto f WHERE f.ID =:id";
$sql0 = $conexao->prepare($sql0);
$sql0->bindValue(':id',$id_forma);
$sql0->execute();
$nome_forma = $sql0->fetchAll(PDO::FETCH_ASSOC);

$sql = "UPDATE carrinho_ecommerce c SET c.FORMAPGTO = null,c.NOME_FORMA = null WHERE c.ID ={$id_pedido}";
$sql = $conexao->prepare($sql);

$sql->execute();
?>
