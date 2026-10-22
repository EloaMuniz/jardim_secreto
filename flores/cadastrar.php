<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_admin.php';

// CREATE: se o formulário foi enviado, grava no banco e volta para a lista
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_POST['imagem'] = salvar_imagem('foto', 'flor') ?? '';
    cadastrar_flor($conexao, $_POST);
    header("Location: index.php");
    exit();
}

$titulo = "Cadastrar flor";
$raiz = "../";
include __DIR__ . '/../includes/header.php';
?>

<h2 class="titulo-pagina">Cadastrar flor</h2>
<?php include __DIR__ . '/../includes/form_flor.php'; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
