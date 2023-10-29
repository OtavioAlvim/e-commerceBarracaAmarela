<?php
print_r($_FILES);

if($_FILES['arquivo_csv']['type'] == 'text/csv'){
    // echo "é o arquivo certo";
    if (isset($_FILES['arquivo_csv']) && $_FILES['arquivo_csv']['error'] === UPLOAD_ERR_OK) {
        $nome_original = $_FILES['arquivo_csv']['name'];
        $nome_temporario = $_FILES['arquivo_csv']['tmp_name'];
    
        // Especifique a pasta de destino e o novo nome do arquivo
        $pasta_destino = '../../arquivo_importado/';
        $novo_nome = 'implantacao.csv'; // Você pode gerar um nome dinamicamente se desejar
    
        // Verifique se a pasta de destino existe, se não, crie-a
        if (!is_dir($pasta_destino)) {
            mkdir($pasta_destino, 0777, true);
        }
    
        // Mova o arquivo para a pasta de destino com o novo nome
        $caminho_destino = $pasta_destino . $novo_nome;
        if (move_uploaded_file($nome_temporario, $caminho_destino)) {
            echo "Arquivo enviado com sucesso para $caminho_destino.";
            header("location: ./insere_implantacao.php");
        } else {
            echo "Falha ao enviar o arquivo.";
        }
    } else {
        echo "Erro no envio do arquivo.";
    }
}else{
    echo "é o arquivo errado";
}

// ?>