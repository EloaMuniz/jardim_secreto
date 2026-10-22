<?php
// Coloque este arquivo no topo das páginas que só a administradora pode usar.
require_once __DIR__ . '/verifica_user.php';

// Se está logada mas não é admin, volta para a página inicial
if ($_SESSION['tipo'] != 'admin') {
    header("Location: ../index.php");
    exit();
}
