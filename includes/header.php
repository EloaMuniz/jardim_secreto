<?php
// Topo comum a todas as páginas.
// Antes de incluir, a página define:  $titulo (título da aba)  e  $raiz (caminho até a pasta principal)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($titulo) ?> | Jardim Secreto</title>
    <link rel="stylesheet" href="/jardim_secreto/style/style.css">
</head>
<body>

<header class="topo">
    <a class="logo" href="/jardim_secreto/index.php">🌸 Jardim Secreto</a>
    <nav class="menu">
        <a href="/jardim_secreto/index.php">Início</a>
        <a href="/jardim_secreto/buques/index.php">Buquês prontos</a>
        <?php if (isset($_SESSION['id'])): ?>
            <a href="/jardim_secreto/flores/index.php">Flores</a>
            <?php if (!eh_admin()): ?>
                <a href="<?= $raiz ?>casamento/index.php">Meu casamento</a>
                <a href="<?= $raiz ?>personalizar/index.php">Montar buquê</a>
                <a href="<?= $raiz ?>personalizar/meu_buque.php">Meu buquê</a>
            <?php endif; ?>
            <a href="<?= $raiz ?>login/logout.php">Sair (<?= e($_SESSION['nome']) ?>)</a>
        <?php else: ?>
            <a href="<?= $raiz ?>login/cadastrar.php">Cadastre-se</a>
            <a href="<?= $raiz ?>login/login.php">Entrar</a>
        <?php endif; ?>
    </nav>
</header>

<main class="conteudo">
