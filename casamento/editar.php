<?php
require_once __DIR__ . '../includes/functions.php';
require_once __DIR__ . '../login/verifica_user.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    atualizar_casamento($conexao, $_SESSION['id'], $_POST);
    header("Location: index.php");
    exit();
}

// Busca os dados atuais para preencher o formulário
$c = buscar_casamento($conexao, $_SESSION['id']);
if (!$c) {
    header("Location: cadastrar.php");
    exit();
}
$paletas = listar_paletas($conexao);

$titulo = "Editar casamento";
$raiz = "../";
include __DIR__ . '../includes/header.php';
?>

<h2 class="titulo-pagina">Editar casamento</h2>
<?php include '../includes/form_casamento.php'; ?>

<?php include __DIR__ . '../includes/footer.php'; ?>
