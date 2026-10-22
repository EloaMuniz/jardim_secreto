<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';

$flores = listar_flores($conexao);   // READ: busca todas as flores

$titulo = "Flores";
$raiz = "../";
include __DIR__ . '/../includes/header.php';
?>

<h2 class="titulo-pagina">Nossas flores</h2>

<?php if (eh_admin()): ?>
    <a class="btn" href="cadastrar.php">+ Nova flor</a>
<?php else: ?>
    <p>Escolha suas favoritas e monte o buquê em <a href="../personalizar/index.php">Montar buquê</a>.</p>
<?php endif; ?>

<div class="grade">
    <?php foreach ($flores as $f): ?>
        <article class="card">
            <div class="card-img"><?= mostrar_imagem($f['imagem'], $f['nome'], $raiz) ?></div>
            <div class="card-corpo">
                <h3><?= e($f['nome']) ?></h3>
                <span class="etiqueta"><?= e($f['tipo']) ?> &bull; <?= e($f['cor']) ?></span>
                <p><?= e($f['descricao']) ?></p>
                <p class="preco">R$ <?= number_format($f['preco'], 2, ',', '.') ?></p>
                <?php if (eh_admin()): ?>
                    <div class="acoes">
                        <a class="btn btn-pequeno" href="editar.php?id=<?= e($f['id']) ?>">Editar</a>
                        <a class="btn btn-pequeno btn-perigo" href="excluir.php?id=<?= e($f['id']) ?>"
                           onclick="return confirm('Excluir esta flor?')">Excluir</a>
                    </div>
                    <?= form_trocar_foto('foto.php', $f['id']) ?>
                <?php endif; ?>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
