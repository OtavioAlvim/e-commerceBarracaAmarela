<?php
require_once './conexao.php';

$descricao = $_POST['pesquisa'];
$sql = "SELECT p.FOTO_PRODUTO1 as imagem,p.* FROM produto p where p.FAMILIA IN (2,3,4,5,6,8,9)  and p.descricao like '%{$descricao}%'";
$sql = $conexao->prepare($sql);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">
    <p>RESULTADO DA PESQUISA : <?php echo $descricao?></p>
</div>
<div class="row row-cols-1 row-cols-md-1 row-cols-lg-4 align-items-start g-2">
    <?php
    foreach ($result as $result) { ?>
        <a href="./detalhes.php">
            <div class="col">
                <div class="card">
                    <img src="data:image/jpg;base64, <?php echo base64_encode($result['FOTO_PRODUTO1']) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $result['ABREVIA'] ?></h5>
                        <p class="card-text"><?php echo $result['OBSERVACOES'] ?></p>
                        <p>R$ <?php echo $result['UNITARIO'] ?></p>
                    </div>
                </div>
            </div>
        </a>
    <?php }
    ?>
</div>