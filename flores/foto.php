<?php
require_once __DIR__ . '../includes/functions.php';
require_once __DIR__ . '../login/verifica_admin.php';

// Troca só a foto de um item direto pelo card
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = (int)($_POST['id'] ?? 0);
    $nome = salvar_imagem('foto', 'flor');
    if ($id > 0 && $nome !== null) {
        atualizar_imagem($conexao, 'flores', $id, $nome);
    }
}
header("Location: index.php");
exit();
