<?php
include('../../../public/dashboard/verificaLogin.php');
$banco_carrinho = new PDO('sqlite:../../db/carrinho.db');
$banco_sia = new PDO('sqlite:../../db/banco_para_sia.db');


$pedido = $_GET['pedido'];
ini_set('max_execution_time', 0);

$limpa_base_capa = "DELETE FROM TMPPEDIDOS";
$banco_sia->exec($limpa_base_capa);

$limpa_base_item = "DELETE FROM TMPITENS_PEDIDO";
$banco_sia->exec($limpa_base_item);

$id_empresa = $_SESSION['ID_EMPRESA'];
$id_vendedor = $_SESSION['VENDEDORPADRAO'];
$id_tipopedido = $_SESSION['TIPOPEDIDODEFAULT'];
$plano_pagamento = $_SESSION['ID_PLANOCONTAPEDIDO'];
$razao = $_SESSION['RAZAO'];

//Consulta sql para recuperar os dados da capa do pedido

$sql = "select * from carrinho_ecommerce where id =:id_pedido";
$sql = $banco_carrinho->prepare($sql);
$sql->bindValue(':id_pedido', $pedido);
$sql->execute();
$capa_pedido = $sql->fetchAll(PDO::FETCH_ASSOC);

// insere os dados recuperados da capa para o banco de destino
// inserindo registro no banco de dado
$sqll = "INSERT INTO TMPPEDIDOS 
  (ID_PEDIDO,
  ID_VENDEDOR, 
  ID_CLIENTE, 
  ID_TIPOPEDIDO, 
  ID_PLANOPGTO, 
  ID_FORMAPGTO, 
  DATA, 
  DESCONTO, 
  TOTAL, 
  TRANSMITIDO, 
  JATRANSMITIDO, 
  RAZAO, 
  ID_EMPRESA, 
  FRETE, 
  ACRESCIMO, 
  OUTRO_DESC, 
  ENDERECO, 
  BAIRRO, 
  CIDADE, 
  ESTADO, 
  CEP, 
  TELEFONE, 
  ID_ROTA, 
  NUMERO, 
  COMPLEMENTO, 
  ENTREGAR, 
  NOVOENDERECO, 
  ID_CIDADE, 
  DESPESAS_BOLETO
  ) 
  VALUES ({$capa_pedido[0]['ID']},
  {$id_vendedor},
  {$capa_pedido[0]['ID_CLIENTE']}, 
  {$id_tipopedido}, 
  {$plano_pagamento}, 
  {$capa_pedido[0]['FORMAPGTO']}, 
  '{$capa_pedido[0]['EMISSAO']}', 
  '0',
  '{$capa_pedido[0]['TOTAL']}',
  'N',
  'N', 
  '{$razao}', 
  '{$id_empresa}',
  '0',
  '0.0', 
  '0.0',  
  '', 
  '', 
  '', 
  '', 
  '', 
  '', 
  '0',
  '',
  '',
  'N',
  'N',
  '0',
  '0'
  )
  ";
$sqll = $banco_sia->prepare($sqll);
$sqll->execute();

// insere os itens do pedido na tabela correspondente
$consulta = "select * from itens_carrinho_ecommerce where ID_CARRINHO_ECOMMERCE =:id_pedido";
$consulta = $banco_carrinho->prepare($consulta);
$consulta->bindValue(':id_pedido',$pedido);
$consulta->execute();
$produtos = $consulta->fetchAll(PDO::FETCH_ASSOC);

foreach($produtos as $produtos){
  // faz o loop para inserir os itens na tabela, quando a condição acabar ele continua a execução do bloco de comandos
  $sql_item = "INSERT INTO TMPITENS_PEDIDO (
    ID, 
    ID_PEDIDO, 
    ID_EMPRESA, 
    ID_PRODUTO, 
    QTD, 
    UNITARIO, 
    DESCONTO, 
    TOTAL, 
    DADOADICIONAL,
    DESCRICAO, 
    PRECOINICIAL, 
    ID_TONALIDADE, 
    UNITARIOBASE, 
    EMPROMOCAO, 
    DESPESAS_BOLETO)
      VALUES (
    {$produtos['id']}, 
    {$produtos['ID_CARRINHO_ECOMMERCE']}, 
    {$id_empresa}, 
    {$produtos['ID_PRODUTO']}, 
    {$produtos['QTDE']}, 
    {$produtos['UNITARIO']}, 
    '0',
    {$produtos['TOTAL']}, 
    '', 
    '{$produtos['DESCRICAO']}', 
    {$produtos['UNITARIO']}, 
    '0', 
    {$produtos['UNITARIO']}, 
    'N',
    '0')";
    $sql_item = $banco_sia->prepare($sql_item);
    $sql_item->execute();

}
header('location: ./compactaBase.php');