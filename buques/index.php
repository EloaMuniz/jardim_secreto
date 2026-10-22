<?php
require_once __DIR__ . '/../includes/functions.php';
// Página pública: qualquer visitante pode ver os buquês prontos
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$buques = listar_buques($conexao);   // READ

$titulo = "Buquês prontos";
$raiz = "../";
include __DIR__ . '/../includes/header.php';
?>

<h2 class="titulo-pagina">Buquês prontos</h2>
<p>Inspire-se nas nossas combinações.</p>

<?php if (eh_admin()): ?>
    <a class="btn" href="cadastrar.php">+ Novo buquê</a>
<?php endif; ?>

<div class="grade">
    <?php foreach ($buques as $b): ?>
        <article class="card">
            <div class="card-img"><?= mostrar_imagem($b['imagem'], $b['nome'], $raiz) ?></div>
            <div class="card-corpo">
                <h3><?= e($b['nome']) ?></h3>
                <p><?= e($b['descricao']) ?></p>
                <span class="etiqueta">Flores: <?= e($b['flores_usadas']) ?></span>
                <?php if ($b['preco'] !== null): ?>
                    <p class="preco">R$ <?= number_format($b['preco'], 2, ',', '.') ?></p>
                <?php endif; ?>
                <?php if (eh_admin()): ?>
                    <div class="acoes">
                        <a class="btn btn-pequeno" href="editar.php?id=<?= e($b['id']) ?>">Editar</a>
                        <a class="btn btn-pequeno btn-perigo" href="excluir.php?id=<?= e($b['id']) ?>"
                           onclick="return confirm('Excluir este buquê?')">Excluir</a>
                    </div>
                    <?= form_trocar_foto('foto.php', $b['id']) ?>
                <?php endif; ?>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
