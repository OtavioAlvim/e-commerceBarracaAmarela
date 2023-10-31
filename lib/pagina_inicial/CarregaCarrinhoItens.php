<?php
$pdo2 = new PDO('sqlite:../db/carrinho.db');

$userid = $_GET['userid'];
$sql = "SELECT ic.* FROM carrinho_ecommerce c JOIN itens_carrinho_ecommerce ic on c.ID = ic.ID_CARRINHO_ECOMMERCE WHERE c.ID_CLIENTE =:idcliente AND c.`STATUS` = 'A'";
$sql = $pdo2->prepare($sql);
$sql->bindValue(':idcliente', $userid);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" class="col-1">ID</th>
            <th scope="col" class="col-7">DESCRICAO</th>
            <th scope="col" class="col-1">QTD</th>
            <th scope="col" class="col-2">TOTAL</th>
            <th scope="col" class="col-1">REMOVER</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $n = 0;
        foreach ($results as $results) {
        ?>
            <tr>
                <th scope="row"><?php echo $n = $n + 1 ?></th>
                <td><?php echo $results['DESCRICAO'] ?></td>
                <td><?php echo number_format($results['QTDE'], 2, ',', ' ') ?></td>
                <td><?php echo number_format($results['TOTAL'], 2, ',', ' ') ?></td>

                <td class="text-center">
                    <form action="../lib/carrinho/ExcluiProduto.php" method="post">
                        <input type="hidden" name="id_produto" value="<?php echo $results['id'] ?>">
                        <button type="submit" class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg>
                        </button>
                    </form>


                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>