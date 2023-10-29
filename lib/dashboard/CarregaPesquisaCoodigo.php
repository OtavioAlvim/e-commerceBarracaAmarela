<?php
$pdo2 = new PDO('sqlite:../db/produto.db');

$descricao = $_POST['pesquisa'];
$sql = "SELECT * FROM produtos_integracao p WHERE p.CODITEM like '{$descricao}%'";
$sql = $pdo2->prepare($sql);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="container">
    <p>RESULTADO DA PESQUISA : <?php echo strtoupper($descricao) ?></p>
</div><?php
        if (empty($result)) { ?>
    <h1>NENHUM RESULTADO ENCONTRADO PARA: <?php echo strtoupper($descricao) ?></h1>
<?php
        } else { ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="col-1 text-center" scope="col">ID</th>
                <th class="col-9" scope="col">DESCRICAO</th>
                <th class="col-1 text-center" scope="col">UNIDADE</th>
                <th class="col-1 text-center" scope="col">EDITAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $result) {
            ?>
                <tr>
                    <th class="text-center" scope="row"><?php echo $result['CODITEM'] ?></th>
                    <td><?php echo $result['DESCRICAO'] ?></td>
                    <td class="text-center"><?php echo $result['UNIDADE'] ?></td>
                    <td class="text-center">
                        <a type="submit" class="btn btn-dark btn-sm" href="./gerente-item.php?PRODUTO=<?php echo $result['CODITEM']?>">EDITAR</a>
                </td>
                </tr>
            <?php }
            ?>

            </div>
        </tbody>
    </table>

<?php }
?>