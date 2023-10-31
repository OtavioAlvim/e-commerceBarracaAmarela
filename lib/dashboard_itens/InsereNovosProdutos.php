<?php
session_start();
require('../conexao.php');
$pdo2 = new PDO('sqlite:../db/produto.db');

$sql = "SELECT * FROM produtos_integracao_pda";
$sql = $conexao->prepare($sql);
$sql->execute();
$produto = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($produto as $produtos) {
    $sql = "select * from produtos_integracao p where p.CODITEM =:id_produto";
    $sql = $pdo2->prepare($sql);
    $sql->bindValue(':id_produto',$produtos['CODITEM']);
    $sql->execute();
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);
    if(empty($res)){
        // produto não tem, ele sera inserido
        $sqll = "INSERT INTO produtos_integracao (CODITEM, CODBARRA, DESCRICAO, ABREVIA, OBSERVACOES, GRUPO, NOMEGRUPO, CATEGORIA, NOMECATEGORIA, FAMILIA, NOMEFAMILIA, UNIDADE, CUSTO, UNITARIO, PROMOCAO, UNITARIOATACADO, PRECOREVENDA, ALIQUOTASAIDA, CFOPVENDAECF) VALUES (:id_produto,:codbarra,:descricao,:abrevia,:observacao,:grupo,:nome_grupo,:categoria,:nome_categoria,:familia,:nome_familia,:unidade,:custo,:unitario,:promocao,:atacado,:revenda,:aliquota,:cfop)";
        $sqll = $pdo2->prepare($sqll);
        $sqll->bindValue(':id_produto',$produtos['CODITEM']);
        $sqll->bindValue(':codbarra',$produtos['CODBARRA']);
        $sqll->bindValue(':descricao',$produtos['DESCRICAO']);
        $sqll->bindValue(':abrevia',$produtos['ABREVIA']);
        $sqll->bindValue(':observacao',$produtos['OBSERVACOES']);
        $sqll->bindValue(':grupo',$produtos['GRUPO']);
        $sqll->bindValue(':nome_grupo',$produtos['NOMEGRUPO']);
        $sqll->bindValue(':categoria',$produtos['CATEGORIA']);
        $sqll->bindValue(':nome_categoria',$produtos['NOMECATEGORIA']);
        $sqll->bindValue(':familia',$produtos['FAMILIA']);
        $sqll->bindValue(':nome_familia',$produtos['NOMEFAMILIA']);
        $sqll->bindValue(':unidade',$produtos['UNIDADE']);
        $sqll->bindValue(':custo',$produtos['CUSTO']);
        $sqll->bindValue(':unitario',$produtos['UNITARIO']);
        $sqll->bindValue(':promocao',$produtos['PROMOCAO']);
        $sqll->bindValue(':atacado',$produtos['UNITARIOATACADO']);
        $sqll->bindValue(':revenda',$produtos['PRECOREVENDA']);
        $sqll->bindValue(':aliquota',$produtos['ALIQUOTASAIDA']);
        $sqll->bindValue(':cfop',$produtos['CFOPVENDAECF']);
        $sqll->execute();
    }else{
        // produto ja tem, ele sera atualizado

        $sql2 = "update produtos_integracao 
        set
        CUSTO =:custo,
        UNITARIO =:unitario ,
        PROMOCAO =:promocao ,
        UNITARIOATACADO =:atacado ,
        PRECOREVENDA =:revenda where CODITEM =:id_produto ";
        $sql2 = $pdo2->prepare($sql2);
        $sql2->bindValue(':custo', $produtos['CUSTO']);
        $sql2->bindValue(':unitario', $produtos['UNITARIO']);
        $sql2->bindValue(':promocao', $produtos['PROMOCAO']);
        $sql2->bindValue(':atacado', $produtos['UNITARIOATACADO']);
        $sql2->bindValue(':revenda', $produtos['PRECOREVENDA']);
        $sql2->bindValue(':id_produto', $produtos['CODITEM']);
        $sql2->execute();
    }
}
$_SESSION['produtos_recuperados'] = true;

