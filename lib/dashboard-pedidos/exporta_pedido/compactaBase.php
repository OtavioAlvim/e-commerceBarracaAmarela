<?php
include('../../../public/dashboard/verificaLogin.php');
date_default_timezone_set("America/Sao_Paulo");
$zip = new ZipArchive();

//nome do arquivo que sera gerado
// $nome_arquivo = 'orderpack1.';
$Minha_data_hora = getdate(date("U"));
$minha_hora = "$Minha_data_hora[mday]"."$Minha_data_hora[mon]"."$Minha_data_hora[year]"."$Minha_data_hora[hours]"."$Minha_data_hora[minutes]"."$Minha_data_hora[seconds]";

$nome_arquivo = "orderpack".$_SESSION['VENDEDORPADRAO']."." . $minha_hora . ".zip";


$Spath = __DIR__;

$caminho = substr($Spath, 0, -37);

// diretorio onde o arquivo sera gerado junto com o nome
$diretorio_completo = $caminho . DIRECTORY_SEPARATOR . "ftp" .DIRECTORY_SEPARATOR. $nome_arquivo;
// echo $diretorio_completo;
if($zip->open($diretorio_completo, ZipArchive::CREATE)){
    $zip->addFile(
        $caminho . '/lib/db/banco_para_sia.db', 'tmppedidos'
    );
    $zip->close();
}
if(file_exists($diretorio_completo)){
    $_SESSION['pedidos_exportados'] = true;
    header('location: ../../../public/dashboard/gerente_pedidos.php');
    exit;
}else{
    echo "Arquivo não foi criado";
}


?>