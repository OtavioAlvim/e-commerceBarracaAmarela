<?php
require_once '../conexao.php';
session_start();

$coditem = $_POST['CODITEM'];
$codbarra  = $_POST['CODBARRA'];
$custo  = $_POST['CUSTO'];
$idcliente = $_POST['userid'];
$nome_usuario = $_POST['username'];
$quantidade = $_POST['quantidade_inserida'];
$nome_tabela_preco = $_POST['nome_tabela_preco'];


if ($quantidade == 0 or $quantidade = '') {
    $_SESSION['produto_sem_item'] = true;
    header("location: ../../public/pagina_inicial.php");
} else {
    // verifica se ja tem algum pedido em aberto para aquele cliente, e se tiver, ele vai pegar o id para poder inserir nos produtos
    $quantidade = $_POST['quantidade_inserida'];
    $sql = "SELECT * FROM carrinho_ecommerce c WHERE c.`STATUS` = 'A' AND c.ID_CLIENTE =:idcliente";
    $sql = $conexao->prepare($sql);
    $sql->bindValue(':idcliente', $idcliente);
    $sql->execute();
    $dados_pedido = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (empty($dados_pedido)) {
        // vai inserir um registro de inicio de pedido no banco de dados
        $sql2 = "INSERT INTO `carrinho_ecommerce` (`ID_CLIENTE`, `NOME`) VALUES (:codcli,:nomecliente)";
        $sql2 = $conexao->prepare($sql2);
        $sql2->bindValue(':codcli', $idcliente);
        $sql2->bindValue(':nomecliente', $nome_usuario);
        $sql2->execute();
    }
    $sql = "SELECT * FROM carrinho_ecommerce c WHERE c.`STATUS` = 'A' AND c.ID_CLIENTE =:idcliente";
    $sql = $conexao->prepare($sql);
    $sql->bindValue(':idcliente', $idcliente);
    $sql->execute();
    $id_pedido_carrinho = $sql->fetchAll(PDO::FETCH_ASSOC);
    $id_carrinho = $id_pedido_carrinho[0]['ID'];

    // busca os dados de unitario correspondente a tabela de preço
    $sql = "SELECT * FROM produtos_integracao p WHERE p.CODITEM =:idproduto";
    $sql = $conexao->prepare($sql);
    $sql->bindValue(':idproduto', $coditem);
    $sql->execute();
    $dados_produto = $sql->fetchAll(PDO::FETCH_ASSOC);

    if ($nome_tabela_preco == 'atacado') {
        $preco_produto = $dados_produto[0]['UNITARIOATACADO'];
    } else if ($nome_tabela_preco == 'revenda') {
        $preco_produto = $dados_produto[0]['PRECOREVENDA'];
    } else if ($nome_tabela_preco == 'promocao') {
        $preco_produto = $dados_produto[0]['PROMOCAO'];
    } else {
        $preco_produto = $dados_produto[0]['UNITARIO'];
    }
    $total = ($quantidade * $preco_produto);
    // echo $total;
    // com todos os dados ja pegos, agora só inserir no banco de dados
    $sql3 = "INSERT INTO `itens_carrinho_ecommerce` (`ID_CARRINHO_ECOMMERCE`, `CODBARRA`, `DESCRICAO`, `UNIDADE`, `QTDE`, `UNITARIO`, `TOTAL`, `ALIQUOTA`, `CUSTO`, `ID_PRODUTO`) VALUES (:id_pedido,:codbarra,:descricao,:unidade,:quantidade,:unitario,:total,:aliquota,:custo,:id_produto)";
    $sql3 = $conexao->prepare($sql3);

    $sql3->bindValue(':id_pedido', $id_carrinho);
    $sql3->bindValue(':codbarra', $codbarra);
    $sql3->bindValue(':descricao', $dados_produto[0]['DESCRICAO']);
    $sql3->bindValue(':unidade', $dados_produto[0]['UNIDADE']);
    $sql3->bindValue(':quantidade', $quantidade);
    $sql3->bindValue(':unitario', $preco_produto);
    $sql3->bindValue(':total', $total);
    $sql3->bindValue(':aliquota', $dados_produto[0]['ALIQUOTASAIDA']);
    $sql3->bindValue(':custo', $dados_produto[0]['CUSTO']);
    $sql3->bindValue(':id_produto', $coditem);
    $sql3->execute();

    $_SESSION['produto_inserido'] = true;
    header("location: ../../public/pagina_inicial.php");
}
