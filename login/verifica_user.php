<?php
// Coloque este arquivo no topo das páginas que exigem login.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Se não existe sessão, a pessoa não fez login: manda para a tela de login
if (!isset($_SESSION['id'])) {
    header("Location: ../login/login.php");
    exit();
}
