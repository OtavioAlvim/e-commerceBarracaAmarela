<?php
require_once '../conexao.php';

$idCliente = $_GET['userid'];
$sql = "SELECT 
p.VENDA,
p.EMISSAO,
p.VLRTOTAL,
p.NOMECLI,
p.SITUACAO,
p.APROVADO,
p.`STATUS`,
case
	when (p.SITUACAO = 'N' AND p.APROVADO = 'N' AND p.`STATUS` = 1 AND p.CANCELADO = 'N') then 'NOVO' 
	when (p.SITUACAO = 'S' AND p.APROVADO = 'S' AND p.`STATUS` = 2) then 'APROVADO' 
	when (p.SITUACAO = 'S' AND p.APROVADO = 'S' AND p.`STATUS` = 3) then 'FATURADO' 
	when p.CANCELADO = 'S' then 'CANCELADO' 
END AS resultado
FROM prevenda p
WHERE p.CODIGOCLI = {$idCliente}";
$sql = $conexao->prepare($sql);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
if (empty($results)) { ?>
<br><br><br><br>
    <div class="d-flex justify-content-center align-items-center">
        <img src="../../assets/img/padrao_sistema/carrinho.png" alt="imagem sem pedidos no sistema...">
    </div>
    <p class="text-center">Nenhum pedido efetuado, clique <a href="../../public/pagina_inicial.php"> Aqui </a>para iniciar um novo pedido</p>
<?php } else { ?>
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="col" scope="col">PEDIDO</th>
                <th class="col" scope="col">DESCRIÇÃO</th>
                <th class="col" scope="col">TOTAL</th>
                <th class="col" scope="col">STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($results as $results) {
            ?>
                <tr>
                    <th scope="row"><?php echo $results['VENDA'] ?></th>
                    <td><a href="../pedidos/detalhes.php?id_pedido=<?php echo $results['VENDA'] ?> ">PEDIDO EFETUADO DIA
                            <?php
                            $data = strtotime($results['EMISSAO']);
                            echo date("d/m/Y ", $data) ?></a>
                    </td>
                    <td>
                        <p>R$: <?php echo  number_format($results['VLRTOTAL'], 2, ',', '') ?></p>
                    </td>
                    <td>
                        <p id="aprovacao"><?php echo $results['resultado'] ?></p>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php }
?>