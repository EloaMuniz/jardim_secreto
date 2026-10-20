--
-- PostgreSQL database dump
--

\restrict 40VK1oiTHoSW1M5f6jQN5oqYFbJEJ6KGClJJbYQHPNbVDMLBrigrEpcN4dz2hHH

-- Dumped from database version 18.4 (Ubuntu 18.4-0ubuntu0.26.04.1)
-- Dumped by pg_dump version 18.4 (Ubuntu 18.4-0ubuntu0.26.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: buques; Type: TABLE; Schema: public; Owner: jardim_secreto
--

CREATE TABLE public.buques (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    descricao text,
    flores_usadas text,
    preco numeric(10,2),
    imagem character varying(100)
);


ALTER TABLE public.buques OWNER TO jardim_secreto;

--
-- Name: buques_id_seq; Type: SEQUENCE; Schema: public; Owner: jardim_secreto
--

CREATE SEQUENCE public.buques_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.buques_id_seq OWNER TO jardim_secreto;

--
-- Name: buques_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jardim_secreto
--

ALTER SEQUENCE public.buques_id_seq OWNED BY public.buques.id;


--
-- Name: casamentos; Type: TABLE; Schema: public; Owner: jardim_secreto
--

CREATE TABLE public.casamentos (
    id integer NOT NULL,
    usuario_id integer NOT NULL,
    data_casamento date,
    local_casamento character varying(150),
    estilo character varying(50),
    paleta_id integer
);


ALTER TABLE public.casamentos OWNER TO jardim_secreto;

--
-- Name: casamentos_id_seq; Type: SEQUENCE; Schema: public; Owner: jardim_secreto
--

CREATE SEQUENCE public.casamentos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.casamentos_id_seq OWNER TO jardim_secreto;

--
-- Name: casamentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jardim_secreto
--

ALTER SEQUENCE public.casamentos_id_seq OWNED BY public.casamentos.id;


--
-- Name: flores; Type: TABLE; Schema: public; Owner: jardim_secreto
--

CREATE TABLE public.flores (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    tipo character varying(30) NOT NULL,
    cor character varying(30),
    descricao text,
    preco numeric(10,2) NOT NULL,
    imagem character varying(100)
);


ALTER TABLE public.flores OWNER TO jardim_secreto;

--
-- Name: flores_id_seq; Type: SEQUENCE; Schema: public; Owner: jardim_secreto
--

CREATE SEQUENCE public.flores_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.flores_id_seq OWNER TO jardim_secreto;

--
-- Name: flores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jardim_secreto
--

ALTER SEQUENCE public.flores_id_seq OWNED BY public.flores.id;


--
-- Name: paletas; Type: TABLE; Schema: public; Owner: jardim_secreto
--

CREATE TABLE public.paletas (
    id integer NOT NULL,
    nome character varying(50) NOT NULL,
    cor_1 character varying(7) NOT NULL,
    cor_2 character varying(7) NOT NULL,
    cor_3 character varying(7) NOT NULL
);


ALTER TABLE public.paletas OWNER TO jardim_secreto;

--
-- Name: paletas_id_seq; Type: SEQUENCE; Schema: public; Owner: jardim_secreto
--

CREATE SEQUENCE public.paletas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.paletas_id_seq OWNER TO jardim_secreto;

--
-- Name: paletas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jardim_secreto
--

ALTER SEQUENCE public.paletas_id_seq OWNED BY public.paletas.id;


--
-- Name: personalizacao; Type: TABLE; Schema: public; Owner: jardim_secreto
--

CREATE TABLE public.personalizacao (
    id integer NOT NULL,
    casamento_id integer NOT NULL,
    flor_id integer NOT NULL,
    quantidade integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.personalizacao OWNER TO jardim_secreto;

--
-- Name: personalizacao_id_seq; Type: SEQUENCE; Schema: public; Owner: jardim_secreto
--

CREATE SEQUENCE public.personalizacao_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personalizacao_id_seq OWNER TO jardim_secreto;

--
-- Name: personalizacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jardim_secreto
--

ALTER SEQUENCE public.personalizacao_id_seq OWNED BY public.personalizacao.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: jardim_secreto
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    senha character varying(100) NOT NULL,
    tipo character varying(10) DEFAULT 'cliente'::character varying NOT NULL
);


ALTER TABLE public.usuarios OWNER TO jardim_secreto;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: jardim_secreto
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_seq OWNER TO jardim_secreto;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jardim_secreto
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- Name: buques id; Type: DEFAULT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.buques ALTER COLUMN id SET DEFAULT nextval('public.buques_id_seq'::regclass);


--
-- Name: casamentos id; Type: DEFAULT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.casamentos ALTER COLUMN id SET DEFAULT nextval('public.casamentos_id_seq'::regclass);


--
-- Name: flores id; Type: DEFAULT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.flores ALTER COLUMN id SET DEFAULT nextval('public.flores_id_seq'::regclass);


--
-- Name: paletas id; Type: DEFAULT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.paletas ALTER COLUMN id SET DEFAULT nextval('public.paletas_id_seq'::regclass);


--
-- Name: personalizacao id; Type: DEFAULT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.personalizacao ALTER COLUMN id SET DEFAULT nextval('public.personalizacao_id_seq'::regclass);


--
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- Data for Name: buques; Type: TABLE DATA; Schema: public; Owner: jardim_secreto
--

COPY public.buques (id, nome, descricao, flores_usadas, preco, imagem) FROM stdin;
1	Clássico Branco	Buquê redondo e atemporal	Rosa branca, Lisianthus, Eucalipto	180.00	buque_classico.jpg
2	Romance Rosé	Tons suaves de rosa	Peônia, Rosa rosé, Gipsófila	220.00	buque_romance.jpg
3	Campo Rústico	Visual leve e natural	Gipsófila, Eucalipto, Lisianthus	160.00	buque_campo.jpg
\.


--
-- Data for Name: casamentos; Type: TABLE DATA; Schema: public; Owner: jardim_secreto
--

COPY public.casamentos (id, usuario_id, data_casamento, local_casamento, estilo, paleta_id) FROM stdin;
1	2	2027-05-15	Sítio Bela Vista	Rústico	1
2	3	2026-10-20	americana	Clássico	1
\.


--
-- Data for Name: flores; Type: TABLE DATA; Schema: public; Owner: jardim_secreto
--

COPY public.flores (id, nome, tipo, cor, descricao, preco, imagem) FROM stdin;
1	Rosa branca	Flor	Branca	Clássica e delicada	8.50	rosa_branca.jpg
2	Rosa rosé	Flor	Rosa	Tom suave e romântico	8.50	rosa_rose.jpg
3	Peônia	Flor	Rosa	Volumosa, muito usada em buquês	18.00	peonia.jpg
4	Lisianthus	Flor	Branca	Pétalas leves, parece uma rosa aberta	7.00	lisianthus.jpg
5	Eucalipto	Folhagem	Verde	Folhas prateadas e aroma suave	4.00	eucalipto.jpg
6	Gipsófila	Flor	Branca	Florzinhas pequenas e de volume	5.00	gipsofila.jpg
7	Fita de cetim	Acabamento	Dourada	Laço para o cabo do buquê	6.00	fita_cetim.jpg
8	Papel rendado	Acabamento	Branca	Embalagem delicada	9.00	papel_rendado.jpg
\.


--
-- Data for Name: paletas; Type: TABLE DATA; Schema: public; Owner: jardim_secreto
--

COPY public.paletas (id, nome, cor_1, cor_2, cor_3) FROM stdin;
1	Rosé e dourado	#F4C2C2	#FFFFFF	#D4AF37
2	Branco e verde	#FFFFFF	#6B8E23	#C8E6C9
3	Lavanda e prata	#C8A2C8	#F5F5F5	#B0B0B0
4	Terracota e creme	#C96F4A	#FFF3E0	#8B5A2B
\.


--
-- Data for Name: personalizacao; Type: TABLE DATA; Schema: public; Owner: jardim_secreto
--

COPY public.personalizacao (id, casamento_id, flor_id, quantidade) FROM stdin;
1	1	2	6
2	1	5	3
3	1	7	1
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: jardim_secreto
--

COPY public.usuarios (id, nome, email, senha, tipo) FROM stdin;
1	Florista Admin	admin@jardim.com	123456	admin
2	Mariana Souza	mari@email.com	123456	cliente
3	eloa	eloa@gmail	123	cliente
\.


--
-- Name: buques_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jardim_secreto
--

SELECT pg_catalog.setval('public.buques_id_seq', 3, true);


--
-- Name: casamentos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jardim_secreto
--

SELECT pg_catalog.setval('public.casamentos_id_seq', 2, true);


--
-- Name: flores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jardim_secreto
--

SELECT pg_catalog.setval('public.flores_id_seq', 8, true);


--
-- Name: paletas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jardim_secreto
--

SELECT pg_catalog.setval('public.paletas_id_seq', 4, true);


--
-- Name: personalizacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jardim_secreto
--

SELECT pg_catalog.setval('public.personalizacao_id_seq', 3, true);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jardim_secreto
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 3, true);


--
-- Name: buques buques_pkey; Type: CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.buques
    ADD CONSTRAINT buques_pkey PRIMARY KEY (id);


--
-- Name: casamentos casamentos_pkey; Type: CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.casamentos
    ADD CONSTRAINT casamentos_pkey PRIMARY KEY (id);


--
-- Name: casamentos casamentos_usuario_id_key; Type: CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.casamentos
    ADD CONSTRAINT casamentos_usuario_id_key UNIQUE (usuario_id);


--
-- Name: flores flores_pkey; Type: CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.flores
    ADD CONSTRAINT flores_pkey PRIMARY KEY (id);


--
-- Name: paletas paletas_pkey; Type: CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.paletas
    ADD CONSTRAINT paletas_pkey PRIMARY KEY (id);


--
-- Name: personalizacao personalizacao_casamento_id_flor_id_key; Type: CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.personalizacao
    ADD CONSTRAINT personalizacao_casamento_id_flor_id_key UNIQUE (casamento_id, flor_id);


--
-- Name: personalizacao personalizacao_pkey; Type: CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.personalizacao
    ADD CONSTRAINT personalizacao_pkey PRIMARY KEY (id);


--
-- Name: usuarios usuarios_email_key; Type: CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_email_key UNIQUE (email);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: casamentos casamentos_paleta_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.casamentos
    ADD CONSTRAINT casamentos_paleta_id_fkey FOREIGN KEY (paleta_id) REFERENCES public.paletas(id);


--
-- Name: casamentos casamentos_usuario_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.casamentos
    ADD CONSTRAINT casamentos_usuario_id_fkey FOREIGN KEY (usuario_id) REFERENCES public.usuarios(id) ON DELETE CASCADE;


--
-- Name: personalizacao personalizacao_casamento_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.personalizacao
    ADD CONSTRAINT personalizacao_casamento_id_fkey FOREIGN KEY (casamento_id) REFERENCES public.casamentos(id) ON DELETE CASCADE;


--
-- Name: personalizacao personalizacao_flor_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: jardim_secreto
--

ALTER TABLE ONLY public.personalizacao
    ADD CONSTRAINT personalizacao_flor_id_fkey FOREIGN KEY (flor_id) REFERENCES public.flores(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

\unrestrict 40VK1oiTHoSW1M5f6jQN5oqYFbJEJ6KGClJJbYQHPNbVDMLBrigrEpcN4dz2hHH

