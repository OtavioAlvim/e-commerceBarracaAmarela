<?php
require_once '../conexao.php';


$sql = "SELECT fc.ID_FORMAPGTO,fp.DESCRICAO FROM formaspgtocliente fc
JOIN formaspgto fp
ON fc.ID_FORMAPGTO = fp.ID
WHERE fc.ID_CLIENTE = 689";
$sql = $conexao->prepare($sql);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach($results as $results){
?>

<option value="<?php echo $results['ID_FORMAPGTO']?>"><?php echo $results['DESCRICAO']?></option>


<?php }?>