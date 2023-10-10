<?php
require_once './conexao.php';


$sql = "SELECT f.CODIGO,f.DESCRICAO FROM produto p JOIN familias f ON p.FAMILIA = f.CODIGO where p.FAMILIA IN (2,3,4,5,6,8,9) GROUP BY f.CODIGO";
$sql = $conexao->prepare($sql);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
echo '<option selected>SELECIONE UMA FAMILIA</option>';
foreach($result as $result){
?>

<option value="<?php echo $result['CODIGO']?>"><?php echo $result['DESCRICAO']?></option>

<?php }
?>