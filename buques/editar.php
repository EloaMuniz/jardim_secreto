<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_admin.php';

$id = (int)($_GET['id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_POST['imagem'] = salvar_imagem('foto', 'buque') ?? ($_POST['imagem_atual'] ?? '');
    atualizar_buque($conexao, $id, $_POST);
    header("Location: index.php");
    exit();
}

$buque = buscar_buque($conexao, $id);
if (!$buque) {
    header("Location: index.php");
    exit();
}

$titulo = "Editar buquê";
$raiz = "../";
include __DIR__ . '/../includes/header.php';
?>

<h2 class="titulo-pagina">Editar buquê</h2>
<?php include __DIR__ . '/../includes/form_buque.php'; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
