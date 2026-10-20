<?php
require_once __DIR__ . '/includes/functions.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Mostra só os 3 primeiros buquês prontos na página inicial
$buques = array_slice(listar_buques($conexao), 0, 3);

$titulo = "Início";
$raiz = "";
include __DIR__ . '/includes/header.php';
?>

<section class="destaque">
    <h1>Jardim Secreto</h1>
    <p>Flores e buquês pensados para o dia mais especial da sua vida.<br>
       Conte-nos como será o seu casamento e crie o buquê com a sua paleta de cores.</p>
    <?php if (isset($_SESSION['id'])): ?>
        <a class="btn" href="/jardim_secreto/personalizar/index.php">Montar meu buquê</a>
    <?php else: ?>
        <a class="btn" href="/jardim_secreto/login/cadastrar.php">Quero criar meu buquê</a>
        <a class="btn btn-secundario" href="/jardim_secreto/login/login.php">Já tenho conta</a>
    <?php endif; ?>
</section>

<h2 class="titulo-pagina">Buquês para se inspirar</h2>
<div class="grade">
    <?php foreach ($buques as $b): ?>
        <article class="card">
            <div class="card-img"><?= mostrar_imagem($b['imagem'], $b['nome'], $raiz) ?></div>
            <div class="card-corpo">
                <h3><?= e($b['nome']) ?></h3>
                <p><?= e($b['descricao']) ?></p>
                <span class="etiqueta">Flores: <?= e($b['flores_usadas']) ?></span>
            </div>
        </article>
    <?php endforeach; ?>
</div>
<p><a class="btn btn-secundario" href="/jardim_secreto/buques/index.php">Ver todos os buquês</a></p>

<h2 class="titulo-pagina">Como funciona</h2>
<ol class="passos">
    <li>Crie sua conta e entre no sistema.</li>
    <li>Informe a data, o local, o estilo e a paleta do seu casamento.</li>
    <li>Escolha as flores e a quantidade de cada uma.</li>
    <li>Confira o seu buquê e o valor total.</li>
</ol>

<?php include __DIR__ . '/includes/footer.php'; ?>
