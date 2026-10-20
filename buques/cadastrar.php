<?php
require_once __DIR__ . '../includes/functions.php';
require_once __DIR__ . '../login/verifica_admin.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_POST['imagem'] = salvar_imagem('foto', 'buque') ?? '';
    cadastrar_buque($conexao, $_POST);
    header("Location: index.php");
    exit();
}

$titulo = "Cadastrar buquê";
$raiz = "../";
include __DIR__ . '../includes/header.php';
?>

<h2 class="titulo-pagina">Cadastrar buquê</h2>
<?php include '../includes/form_buque.php'; ?>

<?php include __DIR__ . '../includes/footer.php'; ?>

<head>
    <link rel="shortcut icon" href="/assets/Captura de tela 2026-09-29 140305.png" type="image/x-icon">
</head>