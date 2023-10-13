<?php
require_once './conexao.php';

$userid = $_GET['userid'];
$sql = "SELECT COALESCE(SUM(ic.TOTAL),0) AS total FROM carrinho_ecommerce c JOIN itens_carrinho_ecommerce ic on c.ID = ic.ID_CARRINHO_ECOMMERCE WHERE c.ID_CLIENTE ={$userid}";
$sql = $conexao->prepare($sql);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
// printf($results);
if ($results[0]['total'] == '0') { ?>
    <p><strong>TOTAL DO PEDIDO R$ <?php echo number_format($results[0]['total'], 2, ',', ' '); ?></strong></p>
    <button type="button" class="btn" data-bs-dismiss="modal">CANCELAR</button>
<?php } else { ?>
    <p><strong>TOTAL DO PEDIDO R$ <?php echo number_format($results[0]['total'], 2, ',', ' '); ?></strong></p>
    <button type="button" class="btn" data-bs-dismiss="modal">CANCELAR</button>
    <a class="btn" href="./finalizacao.php" role="button">FINALIZAR</a>

<?php } ?>