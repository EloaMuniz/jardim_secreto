<?php
require_once __DIR__ . '../includes/functions.php';
// Esta página é pública: NÃO usa verifica_user.php (senão ninguém conseguiria se cadastrar)

$erro = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        cadastrar_usuario($conexao, $_POST['nome'], $_POST['email'], $_POST['senha']);
        header("Location: login.php?cadastro=ok");
        exit();
    } catch (PDOException $ex) {
        // O e-mail é UNIQUE: se já existir, cai aqui
        $erro = "Não foi possível cadastrar. Esse e-mail já está em uso?";
    }
}

$titulo = "Cadastre-se";
$raiz = "../";
include __DIR__ . '../includes/header.php';
?>

<h2 class="titulo-pagina">Crie sua conta</h2>

<?php if ($erro): ?>
    <p class="alerta alerta-erro"><?= e($erro) ?></p>
<?php endif; ?>

<?php include __DIR__ . '../includes/form_usuario.php'; ?>

<?php include __DIR__ . '../includes/footer.php'; ?>
