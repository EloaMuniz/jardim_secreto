<?php
// index.php - Página inicial do Jardim Secreto

// 1. Carrega as funções (e, mostrar_imagem, listar_buques...) e a conexão com o banco.
//    Sem esta linha, o PHP não conhece $conexao nem as funções e dá erro.
require_once __DIR__ . '/includes/functions.php';

// 2. Inicia a sessão ANTES de qualquer HTML (senão o PHP avisa "headers already sent")
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 3. Caminho até a pasta principal do projeto.
//    O index.php está na raiz, então o caminho é vazio.
//    (Páginas dentro de uma pasta, como flores/, usam "../")
$raiz = "";

// 4. Busca os três primeiros buquês prontos.
//    O "?: []" evita erro caso a consulta não devolva nada.
$lista_completa = listar_buques($conexao) ?: [];
$buques = array_slice($lista_completa, 0, 3);

// 5. Título da aba (o header.php usa esta variável)
$titulo = "Início";

// 6. O header.php já abre o HTML (<!DOCTYPE>, <head>, <body>) e o menu
include __DIR__ . '/includes/header.php';
?>

<section class="destaque">
    <h1>Jardim Secreto</h1>

    <p>
        Flores e buquês pensados para o dia mais especial da sua vida.<br>
        Conte-nos como será o seu casamento e personalize seu buquê
        de acordo com a sua paleta de cores.
    </p>

    <?php if (isset($_SESSION['id'])): ?>

        <a class="btn" href="<?= $raiz ?>personalizar/index.php">
            Montar meu buquê
        </a>

    <?php else: ?>

        <a class="btn" href="<?= $raiz ?>login/cadastrar.php">
            Quero criar meu buquê
        </a>

        <a class="btn btn-secundario" href="<?= $raiz ?>login/login.php">
            Já tenho conta
        </a>

    <?php endif; ?>
</section>

<h2 class="titulo-pagina">Buquês para se inspirar</h2>

<div class="grade">

    <?php foreach ($buques as $b): ?>

        <article class="card">

            <div class="card-img">
                <?= mostrar_imagem($b['imagem'], $b['nome'], $raiz) ?>
            </div>

            <div class="card-corpo">

                <h3><?= e($b['nome']) ?></h3>

                <p><?= e($b['descricao']) ?></p>

                <span class="etiqueta">
                    Flores: <?= e($b['flores_usadas']) ?>
                </span>

            </div>

        </article>

    <?php endforeach; ?>

</div>

<p>
    <a class="btn btn-secundario" href="<?= $raiz ?>buques/index.php">
        Ver todos os buquês
    </a>
</p>

<h2 class="titulo-pagina">Como funciona</h2>

<ol class="passos">
    <li>Crie sua conta e entre no sistema.</li>
    <li>Informe a data, o local, o estilo e a paleta de cores do seu casamento.</li>
    <li>Escolha as flores e a quantidade de cada uma para montar seu buquê.</li>
    <li>Confira o resultado da personalização e o valor total.</li>
</ol>

<?php
// O footer.php fecha o <main>, mostra o rodapé e fecha o </body> e o </html>
include __DIR__ . '/includes/footer.php';
?>