<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';

// Busca o casamento da usuária logada
$casamento = buscar_casamento($conexao, $_SESSION['id']);

// Se ainda não cadastrou, vai para o formulário
if (!$casamento) {
    header("Location: cadastrar.php");
    exit();
}

$titulo = "Meu casamento";
$raiz = "../";
include __DIR__ . '/../includes/header.php';
?>

<h2 class="titulo-pagina">Meu casamento</h2>

<div class="caixa">
    <p><strong>Data:</strong> <?= $casamento['data_casamento'] ? date('d/m/Y', strtotime($casamento['data_casamento'])) : 'não informada' ?></p>
    <p><strong>Local:</strong> <?= e($casamento['local_casamento']) ?></p>
    <p><strong>Estilo:</strong> <?= e($casamento['estilo']) ?></p>
    <p><strong>Paleta:</strong> <?= e($casamento['paleta_nome']) ?>
        <span class="cor" style="background:<?= e($casamento['cor_1']) ?>"></span>
        <span class="cor" style="background:<?= e($casamento['cor_2']) ?>"></span>
        <span class="cor" style="background:<?= e($casamento['cor_3']) ?>"></span>
    </p>
    <div class="acoes">
        <a class="btn" href="editar.php">Editar informações</a>
        <a class="btn btn-secundario" href="../personalizar/index.php">Montar meu buquê</a>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
