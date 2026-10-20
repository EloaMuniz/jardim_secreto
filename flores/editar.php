<?php
require_once __DIR__ . '../includes/functions.php';
require_once __DIR__ . '../login/verifica_admin.php';

// Pega o ID que veio na URL (editar.php?id=3)
$id = (int)($_GET['id'] ?? 0);

// UPDATE: se o formulário foi enviado, atualiza e volta para a lista
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_POST['imagem'] = salvar_imagem('foto', 'flor') ?? ($_POST['imagem_atual'] ?? '');
    atualizar_flor($conexao, $id, $_POST);
    header("Location: index.php");
    exit();
}

// Busca a flor pelo ID para preencher o formulário
$flor = buscar_flor($conexao, $id);
if (!$flor) {
    header("Location: index.php");
    exit();
}

$titulo = "Editar flor";
$raiz = "../";
include __DIR__ . '../includes/header.php';
?>

<h2 class="titulo-pagina">Editar flor</h2>
<?php include '../includes/form_flor.php'; ?>

<?php include __DIR__ . '../includes/footer.php'; ?>
