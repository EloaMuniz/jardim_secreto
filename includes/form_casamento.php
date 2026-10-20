<?php
// Formulário do casamento usado em cadastrar.php e editar.php.
// $c = dados do casamento (ou vazio)   $paletas = lista de paletas do banco
$c = $c ?? [];
?>
<form method="post" class="formulario">
    <label>Data do casamento</label>
    <input type="date" name="data_casamento" value="<?= e($c['data_casamento'] ?? '') ?>">

    <label>Local</label>
    <input type="text" name="local_casamento" value="<?= e($c['local_casamento'] ?? '') ?>">

    <label>Estilo</label>
    <select name="estilo">
        <?php foreach (['Clássico', 'Rústico', 'Boho', 'Moderno', 'Romântico', 'Praia'] as $s): ?>
            <option <?= (($c['estilo'] ?? '') == $s) ? 'selected' : '' ?>><?= $s ?></option>
        <?php endforeach; ?>
    </select>

    <label>Paleta de cores</label>
    <div class="lista-paletas">
        <?php foreach ($paletas as $p): ?>
            <label class="opcao-paleta">
                <input type="radio" name="paleta_id" value="<?= e($p['id']) ?>"
                    <?= (($c['paleta_id'] ?? '') == $p['id']) ? 'checked' : '' ?> required>
                <span class="cor" style="background:<?= e($p['cor_1']) ?>"></span>
                <span class="cor" style="background:<?= e($p['cor_2']) ?>"></span>
                <span class="cor" style="background:<?= e($p['cor_3']) ?>"></span>
                <?= e($p['nome']) ?>
            </label>
        <?php endforeach; ?>
    </div>

    <div class="acoes">
        <input type="submit" class="btn" value="Salvar">
        <a class="btn btn-secundario" href="index.php">Voltar</a>
    </div>
</form>
