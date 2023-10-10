<?php
// Configurações do banco de dados
$servername = "127.0.0.1";
$username = "inoveh";
$password = "AxR256396dd";
// $dbname = "bancochicoalicate";
$dbname = "bdsia";

// Conexão com o banco de dados usando PDO
try {
    $conexao = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    die();
}