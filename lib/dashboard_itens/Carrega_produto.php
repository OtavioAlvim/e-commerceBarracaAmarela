<?php
$pdo = new PDO('sqlite:../db/bancoImagens.db');
$pdo2 = new PDO('sqlite:../db/produto.db');

$id_produto = $_GET['id_produto'];
$sql = "select * from produtos_integracao where CODITEM =:id_produto";
$sql = $pdo2->prepare($sql);
$sql->bindValue(':id_produto',$id_produto);
$sql->execute();
$produto = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach($produto as $produto){?>
        <br>
        <h4>PRODUTO: <?php echo $produto['CODITEM'] ?></h4>
        <form class="row g-3"  action="../../lib/dashboard_itens/InsereAtualizaProduto.php" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">DESCRIÇÃO</label>
                <input type="text" class="form-control" id="inputEmail4" value="<?php echo $produto['DESCRICAO'] ?>" name="descricao">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">IMAGEM DO PRODUTO (maximo tamanho permitido 90kb ou 400 x 400px)</label>
                <input class="form-control" type="file" id="formFile" name="FOTO_PRODUTO">
            </div>
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">PROMOÇÃO</label>
                <input type="number" class="form-control" id="inputPassword4" name="PROMOCAO" value="<?php echo number_format($produto['PROMOCAO'], 2) ?>">
            </div>
            <div class="col-md-3">
                <label for="inputAddress" class="form-label">UNITARIO</label>
                <input type="number" class="form-control" id="inputAddress" name="UNITARIO" value="<?php echo number_format($produto['UNITARIO'], 2) ?>">
            </div>
            <div class="col-md-3">
                <label for="inputAddress2" class="form-label">ATACADO</label>
                <input type="number" class="form-control" id="inputAddress2" name="UNITARIOATACADO" value="<?php echo number_format($produto['UNITARIOATACADO'], 2) ?>">
            </div>
            <div class="col-md-3">
                <label for="inputCity" class="form-label">REVENDA</label>
                <input type="number" class="form-control" id="inputCity" name="PRECOREVENDA" value="<?php echo number_format($produto['PRECOREVENDA'], 2) ?>">
            </div>
            <div class="col-md-12">
                <label for="exampleFormControlTextarea1" class="form-label">FICHA TÉCNICA DO PRODUTO</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="OBSERVACAO"><?php echo $produto['OBSERVACOES'] ?></textarea>
            </div>
            <div class="col-12">
                <input type="hidden" name="id_produto" value="<?php echo $produto['CODITEM'] ?>">
                <button type="submit" class="btn">INSERIR DADOS</button>
                <a type="button" class="btn" href="./gerente.php">CANCELAR</a>
            </div>
        </form>
<?php }
?>
