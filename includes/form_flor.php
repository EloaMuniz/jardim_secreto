<?php
// Formulário de flor usado em cadastrar.php (vazio) e editar.php (preenchido).
// $flor = dados da flor (ou vazio no cadastro)
$flor = $flor ?? [];
?>
<form method="post" class="formulario" enctype="multipart/form-data">
    <label>Nome</label>
    <input type="text" name="nome" value="<?= e($flor['nome'] ?? '') ?>" required>

    <label>Tipo</label>
    <select name="tipo">
        <?php foreach (['Flor', 'Folhagem', 'Acabamento'] as $t): ?>
            <option <?= (($flor['tipo'] ?? '') == $t) ? 'selected' : '' ?>><?= $t ?></option>
        <?php endforeach; ?>
    </select>

    <label>Cor</label>
    <input type="text" name="cor" value="<?= e($flor['cor'] ?? '') ?>">

    <label>Descrição</label>
    <textarea name="descricao" rows="3"><?= e($flor['descricao'] ?? '') ?></textarea>

    <label>Preço (R$)</label>
    <input type="number" step="0.01" min="0" name="preco" value="<?= e($flor['preco'] ?? '') ?>" required>

    <label>Foto</label>
    <?php if (!empty($flor['imagem'])): ?>
        <div class="foto-atual"><?= mostrar_imagem($flor['imagem'], $flor['nome'] ?? '', '../') ?></div>
        <small>Para trocar, escolha uma nova imagem abaixo.</small>
    <?php endif; ?>
    <input type="file" name="foto" accept="image/*">
    <input type="hidden" name="imagem_atual" value="<?= e($flor['imagem'] ?? '') ?>">

    <div class="acoes">
        <input type="submit" class="btn" value="Salvar">
        <a class="btn btn-secundario" href="index.php">Voltar</a>
    </div>
</form>
