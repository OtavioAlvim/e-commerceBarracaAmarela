<?php
$pdo = new PDO('sqlite:../db/bancoImagens.db');
$pdo2 = new PDO('sqlite:../db/produto.db');

$descricao = $_POST['pesquisa'];
$sql = "SELECT * FROM produtos_integracao p WHERE p.DESCRICAO like '%{$descricao}%'";
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
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-5 align-items-start g-2">
        <?php

            foreach ($result as $result) { 
                
                $sql = $pdo->prepare("select * from imagens where coditem = :id_produto");
                $sql->bindValue(':id_produto', $result['CODITEM']);
                $sql->execute();
                $image = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($image as $image) {
                    
                }
                if(empty($image['patch_image'])): 
                    // echo 'não tem imagem'; 
                    $image_caminho = '../assets/img/padrao_sistema/sem_imagem.png';
                
                else: 
                    // echo 'tem imagem'; 
                    $image_caminho = '../assets/img/produto/' . $image['patch_image'];
                endif;
                $image_caminho    
            ?>
            <a href="./detalhes.php?item=<?php echo $result['CODITEM'] ?>">
                <div class="col">
                    <div class="card">
                        <img src="<?php echo $image_caminho ?>" class="card-img-top" alt="...">
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