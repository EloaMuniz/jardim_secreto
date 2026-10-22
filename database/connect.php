<?php
// Conexão com o PostgreSQL (os dados ficam em config.php)
$host = "192.168.10.17";
$dbname = "jardim_secreto";
$user = "jardim_secreto";
$pass = "jardim_secreto";   // troque pela senha do seu PostgreSQL

try {
    // Cria a conexão usando PDO
    $conexao = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);

    // Mostra erros de SQL na tela (ajuda a descobrir problemas)
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conexao;
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage() . "<br><br>Se as tabelas ainda não existem, abra <a href='instalar.php'>instalar.php</a>.");
}
