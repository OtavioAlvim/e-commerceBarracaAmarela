<?php 
include('../../db/conexao.php');
include('../../processamento/verifica_login.php'); 
session_start();
ini_set('max_execution_time',0);
$diretorio = "../../arquivo_importado/implantacao.csv";

$skipFirstLine = true;
if(file_exists($diretorio)){

    $handle = fopen("../../arquivo_importado/implantacao.csv", "r");
    while ($line = fgetcsv($handle, 1000, ";")) {


        if ($skipFirstLine) {
            $skipFirstLine = false;
            continue; // Pule a primeira linha
        }
        $sql = "SELECT COUNT(*)total FROM implantacoes i WHERE i.ticket =:ticket";
        $sql = $conexao->prepare($sql);
        $sql->bindValue(':ticket',$line[0]);
        $sql->execute();
        $resultado_ticket = $sql->fetchAll(PDO::FETCH_ASSOC);

        // print_r($resultado_ticket);
        foreach($resultado_ticket as $resultado_ticket){

        }
        if($resultado_ticket['total'] == 0){
            $sql = "INSERT INTO `implantacoes` (ticket,titulo,descricao,responsavel,status_do_ticket,data_de_entrada) VALUES (:ticket,:titulo,:descricao,:responsavel,:status_do_ticket,:data_de_entrada) ";
            $sql = $conexao->prepare($sql);
            $sql->bindValue(':ticket',$line[0]);
            $sql->bindValue(':titulo',$line[1]);
            $sql->bindValue(':descricao',$line[2]);
            $sql->bindValue(':responsavel',$line[3]);
            $sql->bindValue(':status_do_ticket',$line[4]);
            $sql->bindValue(':data_de_entrada',$line[5]);
            $sql->execute();
            // echo "falta inserir";
            // print_r($line);
            // echo "<br>";
        }
        // else{
        //     echo "ja foi inserido no banco de dados";
        //     echo "<br>";
        // }
    }
    $_SESSION['importacao-concluida'] = true;
    header('location: ../index.php');
    exit();
}else{
    $_SESSION['erro_exportados'] = true;
    header('location: exporta_pedido.php');
    exit();
}
