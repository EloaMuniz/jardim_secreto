<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';

// Remove UMA flor do buquê da usuária logada (WHERE casamento_id E flor_id)
$flor_id = (int)($_GET['id'] ?? 0);
$casamento = buscar_casamento($conexao, $_SESSION['id']);

if ($casamento && $flor_id > 0) {
    remover_item($conexao, $casamento['id'], $flor_id);
}
header("Location: meu_buque.php");
exit();
