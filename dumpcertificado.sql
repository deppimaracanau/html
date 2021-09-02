--
-- PostgreSQL database dump
--

-- Dumped from database version 10.9 (Ubuntu 10.9-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 10.9 (Ubuntu 10.9-0ubuntu0.18.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cadastro; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cadastro (
    id_usuario integer NOT NULL,
    nome character varying(100),
    email character varying(100),
    senha character varying(255),
    lattes character varying(255)
);


ALTER TABLE public.cadastro OWNER TO postgres;

--
-- Name: solicitacao; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.solicitacao (
    id_solicitacao integer NOT NULL,
    nome_evento character varying(100) NOT NULL,
    nome_proj_conf character varying(100) NOT NULL,
    carga_horaria character varying(100) NOT NULL,
    tipo_certificado character varying(100) NOT NULL,
    periodo character varying(100) NOT NULL,
    local character varying(100) NOT NULL,
    texto_proprio character varying(255) NOT NULL,
    lista_nomes character varying(255) NOT NULL,
    ano_evento character varying(100) NOT NULL,
    qtd_certificados integer,
    qtd_emitidos integer,
    qtd_negados integer,
    data_solicitacao date DEFAULT CURRENT_DATE,
    data_emissao date DEFAULT CURRENT_DATE
);


ALTER TABLE public.solicitacao OWNER TO postgres;

--
-- Name: solicitacao_id_solicitacao_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.solicitacao_id_solicitacao_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.solicitacao_id_solicitacao_seq OWNER TO postgres;

--
-- Name: solicitacao_id_solicitacao_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.solicitacao_id_solicitacao_seq OWNED BY public.solicitacao.id_solicitacao;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id integer NOT NULL,
    nome character varying(100),
    senha character varying(255),
    admin boolean
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_seq OWNER TO postgres;

--
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;


--
-- Name: solicitacao id_solicitacao; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitacao ALTER COLUMN id_solicitacao SET DEFAULT nextval('public.solicitacao_id_solicitacao_seq'::regclass);


--
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);


--
-- Data for Name: cadastro; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cadastro (id_usuario, nome, email, senha, lattes) FROM stdin;
\.


--
-- Data for Name: solicitacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.solicitacao (id_solicitacao, nome_evento, nome_proj_conf, carga_horaria, tipo_certificado, periodo, local, texto_proprio, lista_nomes, ano_evento, qtd_certificados, qtd_emitidos, qtd_negados, data_solicitacao, data_emissao) FROM stdin;
4	segurança no trabalho 	teste de inserção de curso 	40hrs	1	de 10 a 20 de julho	IFCE Campus Maracanaú		paulo\r,joaquim\r,maria\r,penelope\r,tião\r,pedro,	2019	6	\N	\N	2019-07-15	2019-07-15
5						IFCE Campus Maracanaú	true	teste\r,teste1\r,teste2\r,teste3\r,teste4\r,teste5\r,teste6,		7	\N	\N	2019-07-15	2019-07-15
6						IFCE Campus Maracanaú	true	maria\r,meire\r,mauro\r,benevides,		4	\N	\N	2019-07-15	2019-07-15
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id, nome, senha, admin) FROM stdin;
2	deppi	81dc9bdb52d04dc20036dbd8313ed055	\N
\.


--
-- Name: solicitacao_id_solicitacao_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.solicitacao_id_solicitacao_seq', 6, true);


--
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_seq', 2, true);


--
-- Name: cadastro cadastro_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cadastro
    ADD CONSTRAINT cadastro_pkey PRIMARY KEY (id_usuario);


--
-- Name: solicitacao solicitacao_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitacao
    ADD CONSTRAINT solicitacao_pkey PRIMARY KEY (id_solicitacao);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

