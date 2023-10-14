<?php 
require_once '../conexao.php';
// print_r($_POST);

$coditem = $_POST['CODITEM'];
$codbarra  = $_POST['CODBARRA'];
$custo  = $_POST['CUSTO'];
$idcliente = $_POST['userid'];
$nome_usuario = $_POST['username'];
$quantidade = $_POST['quantidade_inserida'];
$nome_tabela_preco = $_POST['nome_tabela_preco'];
// verifica se ja tem algum pedido em aberto para aquele cliente, e se tiver, ele vai pegar o id para poder inserir nos produtos

$sql = "SELECT * FROM carrinho_ecommerce c WHERE c.`STATUS` = 'A' AND c.ID_CLIENTE = 689";
$sql = $conexao->prepare($sql);
$sql->execute();
$dados_pedido = $sql->fetchAll(PDO::FETCH_ASSOC);
if(empty($dados_pedido)){
    // vai inserir um registro de inicio de pedido no banco de dados
    echo 'tem nada';
    $sql2 = "INSERT INTO `carrinho_ecommerce` (`ID`, `ID_CLIENTE`, `NOME`, `TOTAL`, `STATUS`, `FORMAPGTO`, `NOME_FORMA`) VALUES (1, 689, 'INOVEH SOLUCOES AUTOMACAO COMERCIAL LTDA. - ME', 30.00, 'A', 1, 'DINHEIRO')";







}
$id_carrinho = $dados_pedido[0]['ID'];

// busca os dados de unitario correspondente a tabela de preço
$sql = "SELECT * FROM produtos_integracao p WHERE p.CODITEM =:idproduto";
$sql = $conexao->prepare($sql);
$sql->bindValue(':idproduto', $coditem);
$sql->execute();
$dados_produto = $sql->fetchAll(PDO::FETCH_ASSOC);

if($nome_tabela_preco == 'atacado'){
    $preco_produto = number_format($dados_produto[0]['UNITARIOATACADO'], 2, ',', ' ');
}else if($nome_tabela_preco == 'revenda'){
    $preco_produto = number_format($dados_produto[0]['PRECOREVENDA'], 2, ',', ' ');
}else if($nome_tabela_preco == 'promocao'){
    $preco_produto = number_format($dados_produto[0]['PROMOCAO'], 2, ',', ' ');
}else{
    $preco_produto = number_format($dados_produto[0]['UNITARIO'], 2, ',', ' ');
}

// com todos os dados ja pegos, agora só inserir no banco de dados
$sql3 = "INSERT INTO `itens_carrinho_ecommerce` (`id`, `ID_CARRINHO_ECOMMERCE`, `CODBARRA`, `DESCRICAO`, `UNIDADE`, `QTDE`, `UNITARIO`, `TOTAL`, `ALIQUOTA`, `CUSTO`, `ID_PRODUTO`) VALUES (2, 1, '2147483647', 'EMBALAGEM - G 742M/200UN - POTE REDONDO MILLENIUM ', 'UN', 1.000, 15.000, 15.000, 11, 5.000, 3)";
?>