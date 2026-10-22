<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';

$casamento = buscar_casamento($conexao, $_SESSION['id']);
if (!$casamento) {
    header("Location: ../casamento/cadastrar.php");
    exit();
}

$itens = listar_meu_buque($conexao, $casamento['id']);   // READ das escolhas

// Soma o total do buquê
$total = 0;
foreach ($itens as $item) {
    $total += $item['subtotal'];
}

$titulo = "Meu buquê";
$raiz = "../";
include __DIR__ . '/../includes/header.php';
?>

<h2 class="titulo-pagina">Meu buquê</h2>

<?php if (count($itens) == 0): ?>
    <p>Você ainda não escolheu nenhuma flor.</p>
<?php else: ?>
    <table class="tabela">
        <tr><th>Item</th><th>Tipo</th><th>Preço</th><th>Qtd</th><th>Subtotal</th><th>Ação</th></tr>
        <?php foreach ($itens as $item): ?>
            <tr>
                <td><?= e($item['nome']) ?></td>
                <td><?= e($item['tipo']) ?></td>
                <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                <td><?= e($item['quantidade']) ?></td>
                <td>R$ <?= number_format($item['subtotal'], 2, ',', '.') ?></td>
                <td><a href="remover.php?id=<?= e($item['id']) ?>"
                       onclick="return confirm('Remover este item?')">Remover</a></td>
            </tr>
        <?php endforeach; ?>
        <tr class="linha-total">
            <td colspan="4">Total</td>
            <td colspan="2">R$ <?= number_format($total, 2, ',', '.') ?></td>
        </tr>
    </table>
<?php endif; ?>

<div class="acoes">
    <a class="btn" href="index.php">Alterar escolhas</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
