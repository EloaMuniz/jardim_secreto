<?php // Formulário de cadastro de usuária (usado em login/cadastrar.php) ?>
<form method="post" class="formulario">
    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>E-mail</label>
    <input type="email" name="email" required>

    <label>Senha</label>
    <input type="password" name="senha" required>

    <div class="acoes">
        <input type="submit" class="btn" value="Cadastrar">
        <a class="btn btn-secundario" href="login.php">Já tenho conta</a>
    </div>
</form>
