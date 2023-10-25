<?php
require_once '../conexao.php';

$id_usuario = $_POST['userid'];
$id_pedido  = $_POST['id_pedido'];
$valor_pedido = $_POST['valor_pedido'];
$id_forma = $_POST['id_forma'];


$sql0 = "SELECT * FROM formaspgto f WHERE f.ID =:id";
$sql0 = $conexao->prepare($sql0);
$sql0->bindValue(':id',$id_forma);
$sql0->execute();
$nome_forma = $sql0->fetchAll(PDO::FETCH_ASSOC);

$sql = "UPDATE carrinho_ecommerce c 
SET c.TOTAL ='{$valor_pedido}',
c.FORMAPGTO ={$id_forma},
c.NOME_FORMA ='{$nome_forma[0]['DESCRICAO']}'
WHERE c.ID ={$id_pedido}";
$sql = $conexao->prepare($sql);

$sql->execute();
?>
