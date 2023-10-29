<?php
require '../conexao.php';
$pdo2 = new PDO('sqlite:../db/carrinho.db');


// recupera o id dos pedidos vindo da plataforma 
$sqll = "select id from carrinho_ecommerce";
$sqll = $pdo2->prepare($sqll);
$sqll->execute();;
$id_pedidos = $sqll->fetchAll(PDO::FETCH_ASSOC);
// print_r($id_pedidos);
foreach ($id_pedidos as $id_pedidos) {
    $sql2 = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(p.OBSERVACAO,'*',2),'*',-1) AS id_pedido_ecommerce FROM prevenda p WHERE SUBSTRING_INDEX(SUBSTRING_INDEX(p.OBSERVACAO,'*',2),'*',-1) =:id_pedido";
    $sql2 = $conexao->prepare($sql2);
    $sql2->bindValue(':id_pedido',$id_pedidos['ID']);
    $sql2->execute();
    $pedidos = $sql2->fetchAll(PDO::FETCH_ASSOC);

    if(empty($pedidos)){?>

        <p>Pedido numero {$id_pedidos}</p>
        <!-- echo $id_pedidos['ID']; -->
        <!-- echo '<br>'; -->
    <?php }
}

$sql = "select
ID, 
CASE
	WHEN STATUS = 'F' then 'FINALIZADO'
end AS STATUS,
ID_CLIENTE,
NOME,
total,
EMISSAO
from carrinho_ecommerce where STATUS = 'F'";
$sql = $pdo2->prepare($sql);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-hover text-center">
    <thead>
        <tr>
            <th class="col" scope="col">PEDIDO</th>
            <th class="col" scope="col">DESCRIÇÃO</th>
            <th class="col" scope="col">EMISSAO</th>
            <th class="col" scope="col">TOTAL</th>
            <th class="col" scope="col">STATUS</th>
            <th class="col" scope="col">OPERACAO</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($results as $results) {
        ?>
            <tr>
                <th scope="row"><?php echo $results['ID'] ?></th>
                <td scope="row"><?php echo $results['NOME'] ?></td>
                <td>EFETUADO
                    <?php
                    $data = strtotime($results['EMISSAO']);
                    echo date("d/m/Y ", $data) ?>
                </td>
                <td>
                    <p>R$: <?php echo  number_format($results['TOTAL'], 2, ',', '') ?></p>
                </td>
                <td>
                    <p><?php echo $results['STATUS'] ?></p>
                </td>
                <td>
                    <p><a type="button" class="btn btn-dark btn-sm" href="../../lib/dashboard-pedidos/exporta_pedido/exporta.php?pedido=<?php echo $results['ID'] ?>">ENVIAR</button></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>