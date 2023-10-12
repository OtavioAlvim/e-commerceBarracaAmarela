<?php
require_once './conexao.php';


$sql = "SELECT f.CODIGO,f.DESCRICAO FROM produto p JOIN familias f ON p.FAMILIA = f.CODIGO where p.FAMILIA IN (2,3,4,5,6,8,9) GROUP BY f.CODIGO limit 1";
$sql = $conexao->prepare($sql);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<h1><?php print_r($results['0']['DESCRICAO']) ?></h1>