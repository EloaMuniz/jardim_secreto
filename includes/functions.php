<?php
// Todas as funções que falam com o banco ficam neste arquivo.
require_once __DIR__ . '/../database/connect.php';

/* ---------- FUNÇÕES AUXILIARES ---------- */

// Mostra um texto na tela com segurança (evita injetar HTML)
function e($valor)
{
    return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
}

// Retorna true se quem está logado é administradora
function eh_admin()
{
    return isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin';
}

// Mostra a imagem da pasta img/. Se o arquivo não existir, mostra um quadro com flor.
function mostrar_imagem($arquivo, $alt, $raiz)
{
    $nome = basename((string)$arquivo);
    if ($nome != '' && file_exists(__DIR__ . '/../img/' . $nome)) {
        return __DIR__ . '<img src="' . $raiz . __DIR__ . 'img/' . e($nome) . '" alt="' . e($alt) . '">';
    }
    return '<div class="sem-imagem">🌸</div>';
}

// Recebe o upload de uma imagem (campo <input type="file" name="...">) e salva na pasta img/.
// Retorna o nome do arquivo salvo, ou null se nenhuma imagem válida foi enviada.
function salvar_imagem($campo, $prefixo = 'img')
{
    if (!isset($_FILES[$campo]) || $_FILES[$campo]['error'] != UPLOAD_ERR_OK) {
        return null;
    }
    $arquivo = $_FILES[$campo];

    // Só aceita imagens de verdade, até 5 MB
    $permitidas = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'];
    $info = @getimagesize($arquivo['tmp_name']);
    if ($info === false || !isset($permitidas[$info['mime']]) || $arquivo['size'] > 5 * 1024 * 1024) {
        return null;
    }

    $pasta = __DIR__ . '/../img/';
    if (!is_dir($pasta)) {
        mkdir($pasta, 0755, true);
    }
    $nome = $prefixo . '_' . uniqid() . '.' . $permitidas[$info['mime']];
    if (move_uploaded_file($arquivo['tmp_name'], $pasta . $nome)) {
        return $nome;
    }
    return null;
}

// Troca só a imagem de uma flor ou de um buquê (usado no botão "Trocar foto" dos cards)
function atualizar_imagem($conexao, $tabela, $id, $arquivo)
{
    if (!in_array($tabela, ['flores', 'buques'])) {
        return;
    }
    $stmt = $conexao->prepare("UPDATE $tabela SET imagem = :imagem WHERE id = :id");
    $stmt->execute([':imagem' => $arquivo, ':id' => $id]);
}

// Formulário pequeno de "Trocar foto" que aparece nos cards para a administradora
function form_trocar_foto($acao, $id)
{
    return '<form method="post" action="' . e($acao) . '" enctype="multipart/form-data" class="form-foto">'
         . '<input type="hidden" name="id" value="' . (int)$id . '">'
         . '<input type="file" name="foto" accept="image/*" required>'
         . '<input type="submit" class="btn btn-pequeno" value="Enviar foto">'
         . '</form>';
}

/* ---------- USUÁRIOS E LOGIN ---------- */

function cadastrar_usuario($conexao, $nome, $email, $senha)
{
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':nome' => $nome, ':email' => $email, ':senha' => $senha]);
}

// Procura o usuário pelo e-mail e senha. Retorna os dados ou false.
function consulta_user($conexao, $email, $senha)
{
    $sql = "SELECT id, nome, tipo FROM usuarios WHERE email = :email AND senha = :senha";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':email' => $email, ':senha' => $senha]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/* ---------- FLORES (CRUD) ---------- */

function cadastrar_flor($conexao, $d)
{
    $sql = "INSERT INTO flores (nome, tipo, cor, descricao, preco, imagem)
            VALUES (:nome, :tipo, :cor, :descricao, :preco, :imagem)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':nome' => $d['nome'], ':tipo' => $d['tipo'], ':cor' => $d['cor'],
        ':descricao' => $d['descricao'], ':preco' => $d['preco'], ':imagem' => $d['imagem'],
    ]);
}

function listar_flores($conexao)
{
    $stmt = $conexao->prepare("SELECT * FROM flores ORDER BY tipo, nome");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscar_flor($conexao, $id)
{
    $stmt = $conexao->prepare("SELECT * FROM flores WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function atualizar_flor($conexao, $id, $d)
{
    $sql = "UPDATE flores SET nome = :nome, tipo = :tipo, cor = :cor,
            descricao = :descricao, preco = :preco, imagem = :imagem
            WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':nome' => $d['nome'], ':tipo' => $d['tipo'], ':cor' => $d['cor'],
        ':descricao' => $d['descricao'], ':preco' => $d['preco'], ':imagem' => $d['imagem'],
        ':id' => $id,
    ]);
}

function deletar_flor($conexao, $id)
{
    $stmt = $conexao->prepare("DELETE FROM flores WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

/* ---------- BUQUÊS PRONTOS (CRUD) ---------- */

function cadastrar_buque($conexao, $d)
{
    $sql = "INSERT INTO buques (nome, descricao, flores_usadas, preco, imagem)
            VALUES (:nome, :descricao, :flores_usadas, :preco, :imagem)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':nome' => $d['nome'], ':descricao' => $d['descricao'], ':flores_usadas' => $d['flores_usadas'],
        ':preco' => ($d['preco'] !== '' ? $d['preco'] : null), ':imagem' => $d['imagem'],
    ]);
}

function listar_buques($conexao)
{
    $stmt = $conexao->prepare("SELECT * FROM buques ORDER BY id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscar_buque($conexao, $id)
{
    $stmt = $conexao->prepare("SELECT * FROM buques WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function atualizar_buque($conexao, $id, $d)
{
    $sql = "UPDATE buques SET nome = :nome, descricao = :descricao, flores_usadas = :flores_usadas,
            preco = :preco, imagem = :imagem
            WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':nome' => $d['nome'], ':descricao' => $d['descricao'], ':flores_usadas' => $d['flores_usadas'],
        ':preco' => ($d['preco'] !== '' ? $d['preco'] : null), ':imagem' => $d['imagem'],
        ':id' => $id,
    ]);
}

function deletar_buque($conexao, $id)
{
    $stmt = $conexao->prepare("DELETE FROM buques WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

/* ---------- PALETAS ---------- */

function listar_paletas($conexao)
{
    $stmt = $conexao->prepare("SELECT * FROM paletas ORDER BY id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/* ---------- CASAMENTO ---------- */

// Busca o casamento da usuária junto com os dados da paleta (JOIN)
function buscar_casamento($conexao, $usuario_id)
{
    $sql = "SELECT c.*, p.nome AS paleta_nome, p.cor_1, p.cor_2, p.cor_3
            FROM casamentos c
            LEFT JOIN paletas p ON p.id = c.paleta_id
            WHERE c.usuario_id = :usuario_id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':usuario_id' => $usuario_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function cadastrar_casamento($conexao, $usuario_id, $d)
{
    $sql = "INSERT INTO casamentos (usuario_id, data_casamento, local_casamento, estilo, paleta_id)
            VALUES (:usuario_id, :data, :local, :estilo, :paleta_id)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':usuario_id' => $usuario_id, ':data' => ($d['data_casamento'] ?: null),
        ':local' => $d['local_casamento'], ':estilo' => $d['estilo'], ':paleta_id' => $d['paleta_id'],
    ]);
}

function atualizar_casamento($conexao, $usuario_id, $d)
{
    $sql = "UPDATE casamentos SET data_casamento = :data, local_casamento = :local,
            estilo = :estilo, paleta_id = :paleta_id
            WHERE usuario_id = :usuario_id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':data' => ($d['data_casamento'] ?: null), ':local' => $d['local_casamento'],
        ':estilo' => $d['estilo'], ':paleta_id' => $d['paleta_id'], ':usuario_id' => $usuario_id,
    ]);
}

/* ---------- PERSONALIZAÇÃO DO BUQUÊ ---------- */

// Retorna as quantidades já escolhidas no formato [id_da_flor => quantidade]
function quantidades_escolhidas($conexao, $casamento_id)
{
    $stmt = $conexao->prepare("SELECT flor_id, quantidade FROM personalizacao WHERE casamento_id = :cid");
    $stmt->execute([':cid' => $casamento_id]);
    return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
}

// Se a flor já está no buquê, atualiza a quantidade; se não, insere
function salvar_item($conexao, $casamento_id, $flor_id, $quantidade)
{
    $sql = "UPDATE personalizacao SET quantidade = :qtd WHERE casamento_id = :cid AND flor_id = :fid";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':qtd' => $quantidade, ':cid' => $casamento_id, ':fid' => $flor_id]);

    if ($stmt->rowCount() == 0) {
        $sql = "INSERT INTO personalizacao (casamento_id, flor_id, quantidade) VALUES (:cid, :fid, :qtd)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([':cid' => $casamento_id, ':fid' => $flor_id, ':qtd' => $quantidade]);
    }
}

function remover_item($conexao, $casamento_id, $flor_id)
{
    $stmt = $conexao->prepare("DELETE FROM personalizacao WHERE casamento_id = :cid AND flor_id = :fid");
    $stmt->execute([':cid' => $casamento_id, ':fid' => $flor_id]);
}

// Lista as flores do buquê com o subtotal de cada uma (preço x quantidade)
function listar_meu_buque($conexao, $casamento_id)
{
    $sql = "SELECT f.id, f.nome, f.tipo, f.preco, f.imagem, pe.quantidade,
                   (f.preco * pe.quantidade) AS subtotal
            FROM personalizacao pe
            JOIN flores f ON f.id = pe.flor_id
            WHERE pe.casamento_id = :cid
            ORDER BY f.tipo, f.nome";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':cid' => $casamento_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
