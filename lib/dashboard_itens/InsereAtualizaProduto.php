<?php
$pdo = new PDO('sqlite:../db/bancoImagens.db');
$pdo2 = new PDO('sqlite:../db/produto.db');


// recebe os dados do formulario do tipo post
$id_produto = $_POST['id_produto'];
$descricao = $_POST['descricao'];
$promocao = $_POST['PROMOCAO'];
$unitario = $_POST['UNITARIO'];
$revenda = $_POST['PRECOREVENDA'];
$atacado = $_POST['UNITARIOATACADO'];
$observacao = $_POST['OBSERVACAO'];



if (!empty($_FILES['FOTO_PRODUTO']['name'])) {

    $upload_dir = "../../assets/img/produto/";
    $file_name = $_FILES["FOTO_PRODUTO"]["name"];
    $file_size = $_FILES["FOTO_PRODUTO"]["size"];
    $file_tmp = $_FILES["FOTO_PRODUTO"]["tmp_name"];
    $file_type = $_FILES["FOTO_PRODUTO"]["type"];
    $file_extension = explode('/', $file_type);


    if ($file_type == "image/png" || $file_type == "image/jpeg" && $file_size <= 90000) {
        echo "arquivo valido";
        // move o arquivo para o caminho de destino
        move_uploaded_file($file_tmp, $upload_dir . $id_produto . "." . $file_extension[1]);
        // insere o caminho no banco de dados

        $sql = "INSERT INTO `imagens` (coditem, patch_image) VALUES (:id_produto,:nome_imagem)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id_produto', $id_produto);
        $sql->bindValue(':nome_imagem', $id_produto . "." . $file_extension[1]);
        $sql->execute();
    } else {
        echo "Arquivo invalido";
        // deve voltar para a pagina de edição de produtos e dar uma mensagem que o produto é invalido 
    }
}
    // atualiza os dados da tabela com base nos dados recuperados do formulario post
    $sql2 = "update produtos_integracao 
    set DESCRICAO =:descricao ,
    OBSERVACOES =:observacoes ,
    UNITARIO =:unitario ,
    PROMOCAO =:promocao ,
    UNITARIOATACADO =:atacado ,
    PRECOREVENDA =:revenda where CODITEM =:id_produto ";
    $sql2 = $pdo2->prepare($sql2);
    $sql2->bindValue(':descricao', $descricao);
    $sql2->bindValue(':observacoes', $observacao);
    $sql2->bindValue(':unitario', $unitario);
    $sql2->bindValue(':promocao', $promocao);
    $sql2->bindValue(':atacado', $atacado);
    $sql2->bindValue(':revenda', $revenda);
    $sql2->bindValue(':id_produto', $id_produto);


    $id_produto = $_POST['id_produto'];
    $descricao = $_POST['descricao'];
    $promocao = $_POST['PROMOCAO'];
    $unitario = $_POST['UNITARIO'];
    $revenda = $_POST['PRECOREVENDA'];
    $atacado = $_POST['UNITARIOATACADO'];
    $observacao = $_POST['OBSERVACAO'];
    $sql2->execute();
header("location: ../../public/dashboard/gerente.php");