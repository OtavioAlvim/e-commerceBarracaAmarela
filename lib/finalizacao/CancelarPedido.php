<?php
require_once '../conexao.php';


$id_pedido  = $_POST['id_pedido'];
var_dump($_POST);
$sql = "UPDATE carrinho_ecommerce c SET
c.`STATUS` = 'C' WHERE c.ID ={$id_pedido}";
$sql = $conexao->prepare($sql);

$sql->execute();

header("location: ../../public/pagina_inicial.php");
?>
