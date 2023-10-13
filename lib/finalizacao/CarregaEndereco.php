<?php
require_once '../conexao.php';

$userid = $_GET['userid'];
$sql = "SELECT c.ENDERCLI,c.BAIRROCLI,c.NUMERO,c.CIDADECLI,c.CEPCLI,c.FONECLI,c.OBSERVACAO FROM clientes c WHERE c.CODIGOCLI = {$userid}";
$sql = $conexao->prepare($sql);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="col-md-6">
    <label for="inputEmail4" class="form-label">Endereço</label>
    <input type="text" class="form-control" id="inputEmail4" value="<?php echo $results[0]['ENDERCLI']?>" disabled>
</div>
<div class="col-md-5">
    <label for="inputPassword4" class="form-label">Bairro</label>
    <input type="text" class="form-control" id="inputPassword4" value="<?php echo $results[0]['BAIRROCLI']?>" disabled>
</div>
<div class="col-md-1">
    <label for="inputPassword4" class="form-label">Numero</label>
    <input type="text" class="form-control" id="inputPassword4" value="<?php echo $results[0]['NUMERO']?>" disabled>
</div>
<div class="col-8">
    <label for="inputAddress" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="inputAddress" value="<?php echo $results[0]['CIDADECLI']?>" disabled>
</div>
<div class="col-4">
    <label for="inputAddress2" class="form-label">CEP</label>
    <input type="text" class="form-control" id="inputAddress2" value="<?php echo $results[0]['CEPCLI']?>" disabled>
</div>
<div class="col-md-8">
    <label for="inputCity" class="form-label">OBSERVAÇÂO</label>
    <input type="text" class="form-control" id="inputCity" value="<?php echo $results[0]['OBSERVACAO']?>" disabled>
</div>
<div class="col-md-4">
    <label for="inputCity" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="inputCity" value="<?php echo $results[0]['FONECLI']?>" disabled>
</div>
<div class="form-floating">
    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
    <label for="floatingTextarea2">CASO USE UM ENDEREÇO PERSONALIZADO PARA ESSA ENTREGA, INFORMAR ABAIXO</label>
</div>