<?php
require_once './conexao.php';


$sql = "SELECT p.FAMILIA,p.NOMEFAMILIA FROM produtos_integracao p GROUP BY p.NOMEFAMILIA";
$sql = $conexao->prepare($sql);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
echo '<option value="9999999999" selected>SELECIONE UMA FAMILIA</option>';
foreach($result as $result){
?>

<option value="<?php echo $result['FAMILIA']?>"><?php echo $result['NOMEFAMILIA']?></option>

<?php }
?>