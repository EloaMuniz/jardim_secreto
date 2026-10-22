<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_admin.php';

$id = (int)($_GET['id'] ?? 0);
if ($id > 0) {
    deletar_buque($conexao, $id);
}
header("Location: index.php");
exit();
