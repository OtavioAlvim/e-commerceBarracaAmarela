<?php
require_once './conexao.php';
$nome_preco = $_GET['nome_perfil'];
ini_set('max_execution_time',0);
// echo $nome_preco;
$sql = "SELECT * FROM produtos_integracao";
$sql = $conexao->prepare($sql);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 align-items-start g-2">
    <?php
 foreach ($result as $result) { ?>
        <a href="./detalhes.php?item=<?php echo $result['CODITEM'] ?>">
            <div class="col">
                <div class="card">
                    <img src="data:image/jpg;base64, <?php echo base64_encode($result['FOTO_PRODUTO1']) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $result['DESCRICAO'] ?></h5>
                        <!-- <p class="card-text"><?php echo $result['OBSERVACOES'] ?></p> -->
                        <p>R$ <?php 
                        if($nome_preco == 'atacado'){
                            echo number_format($result['UNITARIOATACADO'], 2, ',', ' ');
                        }else if($nome_preco == 'revenda'){
                            echo number_format($result['PRECOREVENDA'], 2, ',', ' ');
                        }else if($nome_preco == 'promocao'){
                            echo number_format($result['PROMOCAO'], 2, ',', ' ');
                        }else{
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