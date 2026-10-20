<?php
require_once __DIR__ . '../includes/functions.php';
session_start();

$erro = '';

// Quando o formulário é enviado, confere e-mail e senha ANTES de escrever o HTML
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usuario = consulta_user($conexao, $_POST['email'], $_POST['senha']);

    if ($usuario) {
        // Guarda os dados na sessão
        $_SESSION['id']   = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['tipo'] = $usuario['tipo'];

        // Admin vai para as flores; cliente vai para o casamento
        if ($usuario['tipo'] == 'admin') {
            header("Location: ../flores/index.php");
        } else {
            header("Location: ../casamento/index.php");
        }
        exit();
    }
    $erro = "E-mail ou senha incorretos.";
}

$titulo = "Entrar";
$raiz = "../";
include __DIR__ . '../includes/header.php';
?>

<h2 class="titulo-pagina">Entrar</h2>

<?php if (isset($_GET['cadastro'])): ?>
    <p class="alerta alerta-ok">Cadastro realizado! Faça seu login.</p>
<?php endif; ?>
<?php if ($erro): ?>
    <p class="alerta alerta-erro"><?= e($erro) ?></p>
<?php endif; ?>

<form method="post" class="formulario">
    <label>E-mail</label>
    <input type="email" name="email" required>

    <label>Senha</label>
    <input type="password" name="senha" required>

    <div class="acoes">
        <input type="submit" class="btn" value="Entrar">
        <a class="btn btn-secundario" href="cadastrar.php">Criar conta</a>
    </div>
</form>

<?php include __DIR__ . '../includes/footer.php'; ?>
