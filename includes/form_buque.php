<?php
// Formulário de buquê pronto usado em cadastrar.php e editar.php.
$buque = $buque ?? [];
?>
<form method="post" class="formulario" enctype="multipart/form-data">
    <label>Nome do buquê</label>
    <input type="text" name="nome" value="<?= e($buque['nome'] ?? '') ?>" required>

    <label>Descrição</label>
    <textarea name="descricao" rows="3"><?= e($buque['descricao'] ?? '') ?></textarea>

    <label>Flores usadas (ex: Rosa branca, Eucalipto)</label>
    <input type="text" name="flores_usadas" value="<?= e($buque['flores_usadas'] ?? '') ?>">

    <label>Preço (R$)</label>
    <input type="number" step="0.01" min="0" name="preco" value="<?= e($buque['preco'] ?? '') ?>">

    <label>Foto</label>
    <?php if (!empty($buque['imagem'])): ?>
        <div class="foto-atual"><?= mostrar_imagem($buque['imagem'], $buque['nome'] ?? '', '../') ?></div>
        <small>Para trocar, escolha uma nova imagem abaixo.</small>
    <?php endif; ?>
    <input type="file" name="foto" accept="image/*">
    <input type="hidden" name="imagem_atual" value="<?= e($buque['imagem'] ?? '') ?>">

    <div class="acoes">
        <input type="submit" class="btn" value="Salvar">
        <a class="btn btn-secundario" href="index.php">Voltar</a>
    </div>
</form>
