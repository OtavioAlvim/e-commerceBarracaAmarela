<?php
require_once './conexao.php';

$descricao = $_POST['pesquisa'];
$sql = "SELECT * FROM produtos_integracao p WHERE p.DESCRICAO like '%{$descricao}%'";
$sql = $conexao->prepare($sql);
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
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-5 align-items-start g-2">
        <?php

            foreach ($result as $result) { ?>
            <a href="./detalhes.php?item=<?php echo $result['CODITEM'] ?>">
                <div class="col">
                    <div class="card">
                        <img src="data:image/jpg;base64, <?php echo base64_encode($result['FOTO_PRODUTO1']) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $result['DESCRICAO'] ?></h5>
                            <p>R$ <?php echo number_format($result['UNITARIO'], 2, ',', ' ') ?></p>
                        </div>
                    </div>
                </div>
            </a>
    <?php }
        }
    ?>
    </div>