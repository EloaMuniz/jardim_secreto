<?php
require_once __DIR__ . '../includes/functions.php';
require_once __DIR__ . '../login/verifica_admin.php';

// DELETE: recebe o ID, apaga SOMENTE essa flor (WHERE id) e volta para a lista
$id = (int)($_GET['id'] ?? 0);
if ($id > 0) {
    deletar_flor($conexao, $id);
}
header("Location: index.php");
exit();
