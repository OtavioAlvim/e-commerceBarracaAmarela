<?php
$pdo = new PDO('sqlite:../db/bancoImagens.db');
$pdo2 = new PDO('sqlite:../db/produto.db');

$nome_preco = $_GET['nome_perfil'];
$sql = "SELECT * FROM produtos_integracao";
$sql = $pdo2->prepare($sql);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 align-items-start g-2">
    <?php
    foreach ($result as $result) {
        $sql = $pdo->prepare("select * from imagens where coditem = :id_produto");
        $sql->bindValue(':id_produto', $result['CODITEM']);
        $sql->execute();
        $image = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($image as $image) {
        }
        if (empty($image['patch_image'])) :
            // echo 'não tem imagem'; 
            $image_caminho = '../assets/img/padrao_sistema/sem_imagem.png';

        else :
            // echo 'tem imagem'; 
            $image_caminho = '../assets/img/produto/' . $image['patch_image'];
        endif;
        $image_caminho
    ?>
        <a href="./detalhes.php?item=<?php echo $result['CODITEM'] ?>">
            <div class="col">
                <div class="card">
                    <!-- <img src="data:image/jpg;base64, <?php echo base64_encode($result['FOTO_PRODUTO1']) ?>" class="card-img-top" alt="..."> -->
                    <img src="<?php echo $image_caminho ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $result['DESCRICAO'] ?></h5>
                        <!-- <p class="card-text"><?php echo $result['OBSERVACOES'] ?></p> -->
                        <p>R$ <?php
                                if ($nome_preco == 'atacado') {
                                    echo number_format($result['UNITARIOATACADO'], 2, ',', ' ');
                                } else if ($nome_preco == 'revenda') {
                                    echo number_format($result['PRECOREVENDA'], 2, ',', ' ');
                                } else if ($nome_preco == 'promocao') {
                                    echo number_format($result['PROMOCAO'], 2, ',', ' ');
                                } else {
                                    echo number_format($result['UNITARIO'], 2, ',', ' ');
                                }


                                ?>

                        </p>
                    </div>
                </div>
            </div>
        </a>
    <?php }
    ?>

</div>