<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';

// Cada cliente tem apenas UM casamento: se já existe, vai para a página dele
if (buscar_casamento($conexao, $_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    cadastrar_casamento($conexao, $_SESSION['id'], $_POST);
    header("Location: index.php");
    exit();
}

$paletas = listar_paletas($conexao);   // para a lista de paletas do formulário

$titulo = "Cadastrar casamento";
$raiz = "../";
include __DIR__ . '/../includes/header.php';
?>

<h2 class="titulo-pagina">Conte-nos sobre o seu casamento</h2>
<?php include __DIR__ . '/../includes/form_casamento.php'; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
