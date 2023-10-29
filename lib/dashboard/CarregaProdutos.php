<?php

$pdo2 = new PDO('sqlite:../db/produto.db');

$sql = "SELECT * FROM produtos_integracao";
$sql = $pdo2->prepare($sql);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th class="col text-center" scope="col">ID</th>
            <th scope="col">DESCRICAO</th>
            <th class="col text-center" scope="col">UNIDADE</th>
            <th class="col text-center" scope="col">EDITAR</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($result as $result) {
        ?>
            <tr>
                <th scope="row"><?php echo $result['CODITEM']?></th>
                <td><?php echo $result['DESCRICAO']?></td>
                <td><?php echo $result['UNIDADE']?></td>
                <td>
                        <a type="submit" class="btn btn-dark btn-sm" href="./gerente-item.php?PRODUTO=<?php echo $result['CODITEM']?>">EDITAR</a>
                </td>
            </tr>
        <?php }
        ?>

        </div>



    </tbody>
</table>