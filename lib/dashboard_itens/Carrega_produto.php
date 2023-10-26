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
        <form class="row g-3">
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">DESCRIÇÃO</label>
                <input type="email" class="form-control" id="inputEmail4" value="<?php echo $produto['DESCRICAO'] ?>">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">IMAGEM DO PRODUTO (maximo tamanho permitido 50kb ou 400 x 400px)</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">PROMOÇÃO</label>
                <input type="number" class="form-control" id="inputPassword4" value="<?php echo number_format($produto['PROMOCAO'], 2) ?>">
            </div>
            <div class="col-md-3">
                <label for="inputAddress" class="form-label">UNITARIO</label>
                <input type="number" class="form-control" id="inputAddress" value="<?php echo number_format($produto['UNITARIO'], 2) ?>">
            </div>
            <div class="col-md-3">
                <label for="inputAddress2" class="form-label">ATACADO</label>
                <input type="number" class="form-control" id="inputAddress2" value="<?php echo number_format($produto['UNITARIOATACADO'], 2) ?>">
            </div>
            <div class="col-md-3">
                <label for="inputCity" class="form-label">REVENDA</label>
                <input type="number" class="form-control" id="inputCity" value="<?php echo number_format($produto['PRECOREVENDA'], 2) ?>">
            </div>
            <div class="col-md-12">
                <label for="exampleFormControlTextarea1" class="form-label">FICHA TÉCNICA DO PRODUTO</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $produto['OBSERVACOES'] ?></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn">INSERIR DADOS</button>
                <a type="button" class="btn" href="./gerente.php">CANCELAR</a>
            </div>
        </form>
<?php }
?>