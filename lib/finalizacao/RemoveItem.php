<?php

$pdo2 = new PDO('sqlite:../db/carrinho.db');
session_start();
$id_produto = $_POST['id_produto'];
$sql = "DELETE FROM itens_carrinho_ecommerce WHERE  id =:id";
$sql = $pdo2->prepare($sql);
$sql->bindValue(':id',$id_produto);
$sql->execute();
header("location: ../../public/finalizacao2.php");

?>