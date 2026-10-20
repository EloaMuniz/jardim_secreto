CREATE TABLE usuarios (
    id    SERIAL PRIMARY KEY,
    nome  VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    tipo  VARCHAR(10) NOT NULL DEFAULT 'cliente'   -- 'cliente' ou 'admin'
);

CREATE TABLE paletas (
    id    SERIAL PRIMARY KEY,
    nome  VARCHAR(50) NOT NULL,
    cor_1 VARCHAR(7) NOT NULL,     
    cor_2 VARCHAR(7) NOT NULL,
    cor_3 VARCHAR(7) NOT NULL
);

CREATE TABLE casamentos (
    id              SERIAL PRIMARY KEY,
    usuario_id      INT NOT NULL UNIQUE REFERENCES usuarios(id) ON DELETE CASCADE,
    data_casamento  DATE,
    local_casamento VARCHAR(150),
    estilo          VARCHAR(50),
    paleta_id       INT REFERENCES paletas(id)
);

CREATE TABLE flores (
    id        SERIAL PRIMARY KEY,
    nome      VARCHAR(100) NOT NULL,
    tipo      VARCHAR(30) NOT NULL,         
    cor       VARCHAR(30),
    descricao TEXT,
    preco     NUMERIC(10,2) NOT NULL,
    imagem    VARCHAR(100)                   
);

CREATE TABLE buques (
    id            SERIAL PRIMARY KEY,
    nome          VARCHAR(100) NOT NULL,
    descricao     TEXT,
    flores_usadas TEXT,
    preco         NUMERIC(10,2),
    imagem        VARCHAR(100)
);

CREATE TABLE personalizacao (
    id           SERIAL PRIMARY KEY,
    casamento_id INT NOT NULL REFERENCES casamentos(id) ON DELETE CASCADE,
    flor_id      INT NOT NULL REFERENCES flores(id) ON DELETE CASCADE,
    quantidade   INT NOT NULL DEFAULT 1,
    UNIQUE (casamento_id, flor_id)           
);


INSERT INTO usuarios (nome, email, senha, tipo) VALUES
('Florista Admin', 'admin@jardim.com', '123456', 'admin'),
('Mariana Souza',  'mari@email.com',   '123456', 'cliente');

INSERT INTO paletas (nome, cor_1, cor_2, cor_3) VALUES
('Rosé e dourado',    '#F4C2C2', '#FFFFFF', '#D4AF37'),
('Branco e verde',    '#FFFFFF', '#6B8E23', '#C8E6C9'),
('Lavanda e prata',   '#C8A2C8', '#F5F5F5', '#B0B0B0'),
('Terracota e creme', '#C96F4A', '#FFF3E0', '#8B5A2B');

INSERT INTO casamentos (usuario_id, data_casamento, local_casamento, estilo, paleta_id)
VALUES (2, '2027-05-15', 'Sítio Bela Vista', 'Rústico', 1);

INSERT INTO flores (nome, tipo, cor, descricao, preco, imagem) VALUES
('Rosa branca',   'Flor',       'Branca',  'Clássica e delicada',                     8.50, 'rosa_branca.jpg'),
('Rosa rosé',     'Flor',       'Rosa',    'Tom suave e romântico',                   8.50, 'rosa_rose.jpg'),
('Peônia',        'Flor',       'Rosa',    'Volumosa, muito usada em buquês',        18.00, 'peonia.jpg'),
('Lisianthus',    'Flor',       'Branca',  'Pétalas leves, parece uma rosa aberta',   7.00, 'lisianthus.jpg'),
('Eucalipto',     'Folhagem',   'Verde',   'Folhas prateadas e aroma suave',          4.00, 'eucalipto.jpg'),
('Gipsófila',     'Flor',       'Branca',  'Florzinhas pequenas e de volume',         5.00, 'gipsofila.jpg'),
('Fita de cetim', 'Acabamento', 'Dourada', 'Laço para o cabo do buquê',               6.00, 'fita_cetim.jpg'),
('Papel rendado', 'Acabamento', 'Branca',  'Embalagem delicada',                      9.00, 'papel_rendado.jpg');

INSERT INTO buques (nome, descricao, flores_usadas, preco, imagem) VALUES
('Clássico Branco', 'Buquê redondo e atemporal', 'Rosa branca, Lisianthus, Eucalipto', 180.00, 'buque_classico.jpg'),
('Romance Rosé',    'Tons suaves de rosa',       'Peônia, Rosa rosé, Gipsófila',       220.00, 'buque_romance.jpg'),
('Campo Rústico',   'Visual leve e natural',     'Gipsófila, Eucalipto, Lisianthus',   160.00, 'buque_campo.jpg');

INSERT INTO personalizacao (casamento_id, flor_id, quantidade) VALUES
(1, 2, 6), (1, 5, 3), (1, 7, 1);

SELECT * FROM usuarios;
