<?php
$pdo2 = new PDO('sqlite:../db/carrinho.db');

$userid = $_GET['userid'];
$sql = "SELECT COALESCE(SUM(ic.TOTAL),0) AS total FROM carrinho_ecommerce c JOIN itens_carrinho_ecommerce ic on c.ID = ic.ID_CARRINHO_ECOMMERCE WHERE c.ID_CLIENTE ={$userid} AND c.`STATUS` = 'A'";
$sql = $pdo2->prepare($sql);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<p><strong>TOTAL DO PEDIDO R$ <?php echo number_format($results[0]['total'], 2, ',', ' '); ?></strong></p>
