<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se o arquivo foi enviado sem erros
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == 0) {
        $upload_dir = "caminho/para/salvar/as/imagens/";

        $file_name = $_FILES["imagem"]["name"];
        $file_size = $_FILES["imagem"]["size"];
        $file_tmp = $_FILES["imagem"]["tmp_name"];

        // Verifique o tamanho do arquivo
        if ($file_size <= 50000) { // 50 KB em bytes
            // Movendo o arquivo para o diretório de destino
            if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                echo "Imagem enviada com sucesso.";
            } else {
                echo "Erro ao enviar a imagem.";
            }
        } else {
            echo "A imagem excede o tamanho máximo permitido (50 KB).";
        }
    } else {
        echo "Erro ao fazer o upload da imagem.";
    }
}
?>
