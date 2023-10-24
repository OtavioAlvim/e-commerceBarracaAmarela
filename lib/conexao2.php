<?php
$banco = 'bancoImagens.db';

try {
    // Conectar ao banco de dados SQLite
    $pdo = new PDO("sqlite:$banco");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão SQLite bem-sucedida.";
} catch (PDOException $e) {
    die("Erro na conexão SQLite: " . $e->getMessage());
}
?>
