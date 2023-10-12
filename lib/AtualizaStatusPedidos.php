<?php
require_once './conexao.php';


$sql = "SELECT 
p.VENDA,
p.EMISSAO,
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
FROM prevenda p";
$sql = $conexao->prepare($sql);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-hover text-center">
    <thead>
        <tr>
            <th class="col" scope="col">PEDIDO</th>
            <th class="col" scope="col">DESCRIÇÃO</th>
            <th class="col" scope="col">STATUS</th>
            <!-- <th class="col-2" scope="col">Operações</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($results as $results) {
        ?>
            <tr>
                <th scope="row"><?php echo $results['VENDA'] ?></th>
                <td>PEDIDO EFETUADO DIA <?php echo $results['EMISSAO'] ?></td>
                <td>
                    <p id="aprovacao"><?php echo $results['resultado'] ?></p>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>