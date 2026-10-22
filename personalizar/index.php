<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';

// Precisa ter casamento cadastrado para montar o buquê
$casamento = buscar_casamento($conexao, $_SESSION['id']);
if (!$casamento) {
    header("Location: ../casamento/cadastrar.php");
    exit();
}

// Quando enviar o formulário: percorre cada flor e salva (ou remove) a quantidade
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    foreach ($_POST['qtd'] as $flor_id => $quantidade) {
        $quantidade = (int)$quantidade;
        if ($quantidade > 0) {
            salvar_item($conexao, $casamento['id'], (int)$flor_id, $quantidade);
        } else {
            remover_item($conexao, $casamento['id'], (int)$flor_id);
        }
    }
    header("Location: meu_buque.php");
    exit();
}

$flores  = listar_flores($conexao);
$escolhidas = quantidades_escolhidas($conexao, $casamento['id']);   // [id_flor => quantidade]

$titulo = "Montar buquê";
$raiz = "../";
include __DIR__ . '/../includes/header.php';
?>

<h2 class="titulo-pagina">Monte o seu buquê</h2>

<div class="caixa">
    <strong>Sua paleta:</strong> <?= e($casamento['paleta_nome']) ?>
    <span class="cor" style="background:<?= e($casamento['cor_1']) ?>"></span>
    <span class="cor" style="background:<?= e($casamento['cor_2']) ?>"></span>
    <span class="cor" style="background:<?= e($casamento['cor_3']) ?>"></span>
    &mdash; estilo <?= e($casamento['estilo']) ?>
</div>
<p>Informe a quantidade de cada item. Deixe <strong>0</strong> para não usar.</p>

<form method="post">
    <div class="grade">
        <?php foreach ($flores as $f): ?>
            <article class="card">
                <div class="card-img"><?= mostrar_imagem($f['imagem'], $f['nome'], $raiz) ?></div>
                <div class="card-corpo">
                    <h3><?= e($f['nome']) ?></h3>
                    <span class="etiqueta"><?= e($f['tipo']) ?> &bull; <?= e($f['cor']) ?></span>
                    <p class="preco">R$ <?= number_format($f['preco'], 2, ',', '.') ?></p>
                    <label class="quantidade">Quantidade
                        <input type="number" min="0" name="qtd[<?= e($f['id']) ?>]"
                               value="<?= e($escolhidas[$f['id']] ?? 0) ?>">
                    </label>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
    <div class="acoes">
        <input type="submit" class="btn" value="Salvar meu buquê">
    </div>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
