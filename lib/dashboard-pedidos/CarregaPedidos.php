<?php
require '../conexao.php';
$pdo2 = new PDO('sqlite:../db/carrinho.db');
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
        // recupera o id dos pedidos vindo da plataforma 
        $sqll = "select ID, 
        CASE
            WHEN STATUS = 'F' then 'FINALIZADO'
        end AS STATUS,
        ID_CLIENTE,
        NOME,
        total,
        EMISSAO from carrinho_ecommerce where STATUS = 'F'";
        $sqll = $pdo2->prepare($sqll);
        $sqll->execute();
        $id_pedidos = $sqll->fetchAll(PDO::FETCH_ASSOC);
        foreach ($id_pedidos as $id_pedidos) {
            $sql2 = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(p.OBSERVACAO,'*',2),'*',-1) AS id_pedido_ecommerce FROM prevenda p WHERE SUBSTRING_INDEX(SUBSTRING_INDEX(p.OBSERVACAO,'*',2),'*',-1) =:id_pedido";
            $sql2 = $conexao->prepare($sql2);
            $sql2->bindValue(':id_pedido', $id_pedidos['ID']);
            $sql2->execute();
            $pedidos = $sql2->fetchAll(PDO::FETCH_ASSOC);
            if (empty($pedidos)) {
                $sql2 = "SELECT p.ID_PEDIDOPALM FROM prevenda p WHERE p.ID_PEDIDOPALM =:id_pedido";
                $sql2 = $conexao->prepare($sql2);
                $sql2->bindValue(':id_pedido', $id_pedidos['ID']);
                $sql2->execute();
                $forca = $sql2->fetchAll(PDO::FETCH_ASSOC);
                if (empty($forca)) { ?>
                    <tr>
                        <th scope="row"><?php echo $id_pedidos['ID'] ?></th>
                        <td scope="row"><?php echo $id_pedidos['NOME'] ?></td>
                        <td>EFETUADO
                            <?php
                            $data = strtotime($id_pedidos['EMISSAO']);
                            echo date("d/m/Y ", $data) ?>
                        </td>
                        <td>
                            <p>R$: <?php echo  number_format($id_pedidos['TOTAL'], 2, ',', '') ?></p>
                        </td>
                        <td>
                            <p><?php echo $id_pedidos['STATUS'] ?></p>
                        </td>
                        <td>
                            <p><a type="button" class="btn btn-dark btn-sm" href="../../lib/dashboard-pedidos/exporta_pedido/exporta.php?pedido=<?php echo $id_pedidos['ID'] ?>">ENVIAR</button></a>
                        </td>
                    </tr>
        <?php
                }else{

                }

            }

        }
