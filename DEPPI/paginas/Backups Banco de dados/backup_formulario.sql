--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;

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
-- Name: dados_gerais; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.dados_gerais (
    id integer NOT NULL,
    nome character varying(200) NOT NULL,
    siape character varying(20) NOT NULL,
    email character varying(70) NOT NULL,
    lattes_url character varying(200) NOT NULL,
    eixo character varying(70) NOT NULL,
    laboratorio character varying(200) NOT NULL,
    descricao_produto character varying(400) NOT NULL,
    descricao_servicos character varying(400),
    email_lab character varying(70) NOT NULL,
    telefone_lab character varying(70) NOT NULL,
    cursos character varying(300) NOT NULL,
    areas character varying(400) NOT NULL,
    apresentacao character varying(500) NOT NULL
);


ALTER TABLE public.dados_gerais OWNER TO postgres;

--
-- Name: dados_gerais_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.dados_gerais_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dados_gerais_id_seq OWNER TO postgres;

--
-- Name: dados_gerais_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.dados_gerais_id_seq OWNED BY public.dados_gerais.id;


--
-- Name: extensao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.extensao (
    id_extensao integer NOT NULL,
    id_siape character varying(100) NOT NULL,
    titulo character varying(200) NOT NULL,
    fomento character varying(100) NOT NULL,
    alunos_tecnico character varying(100) NOT NULL,
    alunos_graduacao character varying(100) NOT NULL,
    alunos_pos character varying(100) NOT NULL
);


ALTER TABLE public.extensao OWNER TO postgres;

--
-- Name: extensao_id_extensao_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.extensao_id_extensao_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.extensao_id_extensao_seq OWNER TO postgres;

--
-- Name: extensao_id_extensao_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.extensao_id_extensao_seq OWNED BY public.extensao.id_extensao;


--
-- Name: laboratorios_restantes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.laboratorios_restantes (
    id integer NOT NULL,
    siape character varying(20) NOT NULL,
    coordenador character varying(200) NOT NULL,
    eixo character varying(70) NOT NULL,
    laboratorio character varying(200) NOT NULL
);


ALTER TABLE public.laboratorios_restantes OWNER TO postgres;

--
-- Name: laboratorios_restantes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.laboratorios_restantes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.laboratorios_restantes_id_seq OWNER TO postgres;

--
-- Name: laboratorios_restantes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.laboratorios_restantes_id_seq OWNED BY public.laboratorios_restantes.id;


--
-- Name: pedidos_alteracao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.pedidos_alteracao (
    id_siape_antigo character varying(100) NOT NULL,
    nome_antigo character varying(100) NOT NULL,
    id_novo_siape character varying(100) NOT NULL,
    novo_coordenador character varying(100) NOT NULL,
    nome_lab character varying(100) NOT NULL,
    nova_sigla character varying(100) NOT NULL
);


ALTER TABLE public.pedidos_alteracao OWNER TO postgres;

--
-- Name: pesos_avaliativos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.pesos_avaliativos (
    id_peso integer NOT NULL,
    nome_peso character varying(30) NOT NULL,
    sigla_peso character varying(7) NOT NULL,
    valor_peso integer NOT NULL
);


ALTER TABLE public.pesos_avaliativos OWNER TO postgres;

--
-- Name: pesos_avaliativos_id_peso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pesos_avaliativos_id_peso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pesos_avaliativos_id_peso_seq OWNER TO postgres;

--
-- Name: pesos_avaliativos_id_peso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pesos_avaliativos_id_peso_seq OWNED BY public.pesos_avaliativos.id_peso;


--
-- Name: professores; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.professores (
    id integer NOT NULL,
    id_siape character varying(100) NOT NULL,
    nome character varying(100) NOT NULL,
    lattes_url character varying(100) NOT NULL
);


ALTER TABLE public.professores OWNER TO postgres;

--
-- Name: professores_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.professores_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.professores_id_seq OWNER TO postgres;

--
-- Name: professores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.professores_id_seq OWNED BY public.professores.id;


--
-- Name: projetos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.projetos (
    id_pesquisa integer NOT NULL,
    id_siape character varying(100) NOT NULL,
    nome_projeto character varying(200),
    fomento character varying(100) NOT NULL,
    alunos_tecnico character varying(100) NOT NULL,
    alunos_graduacao character varying(100) NOT NULL,
    alunos_pos character varying(10) NOT NULL
);


ALTER TABLE public.projetos OWNER TO postgres;

--
-- Name: projetos_id_pesquisa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.projetos_id_pesquisa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.projetos_id_pesquisa_seq OWNER TO postgres;

--
-- Name: projetos_id_pesquisa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.projetos_id_pesquisa_seq OWNED BY public.projetos.id_pesquisa;


--
-- Name: quantidades; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.quantidades (
    id integer NOT NULL,
    id_siape character varying(20) NOT NULL,
    qtd_bolsistas character varying(100) NOT NULL,
    qtd_voluntarios character varying(100) NOT NULL,
    qtd_disciplinas character varying(100) NOT NULL,
    qtd_professores character varying(100) NOT NULL,
    qtd_periodico character varying(100) NOT NULL,
    qtd_congresso character varying(100) NOT NULL,
    qtd_tcc character varying(100) NOT NULL,
    qtd_pesquisa_fomento character varying(100) NOT NULL,
    qtd_pesquisa_semfomento character varying(100) NOT NULL,
    qtd_extensao_fomento character varying(100) NOT NULL,
    qtd_extensao_semfomento character varying(100) NOT NULL
);


ALTER TABLE public.quantidades OWNER TO postgres;

--
-- Name: quantidades_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.quantidades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.quantidades_id_seq OWNER TO postgres;

--
-- Name: quantidades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.quantidades_id_seq OWNED BY public.quantidades.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dados_gerais ALTER COLUMN id SET DEFAULT nextval('public.dados_gerais_id_seq'::regclass);


--
-- Name: id_extensao; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.extensao ALTER COLUMN id_extensao SET DEFAULT nextval('public.extensao_id_extensao_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laboratorios_restantes ALTER COLUMN id SET DEFAULT nextval('public.laboratorios_restantes_id_seq'::regclass);


--
-- Name: id_peso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pesos_avaliativos ALTER COLUMN id_peso SET DEFAULT nextval('public.pesos_avaliativos_id_peso_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.professores ALTER COLUMN id SET DEFAULT nextval('public.professores_id_seq'::regclass);


--
-- Name: id_pesquisa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projetos ALTER COLUMN id_pesquisa SET DEFAULT nextval('public.projetos_id_pesquisa_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.quantidades ALTER COLUMN id SET DEFAULT nextval('public.quantidades_id_seq'::regclass);


--
-- Data for Name: dados_gerais; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dados_gerais (id, nome, siape, email, lattes_url, eixo, laboratorio, descricao_produto, descricao_servicos, email_lab, telefone_lab, cursos, areas, apresentacao) FROM stdin;
1	In??cio Cordeiro Alves	1622296	inacioalves@ifce.edu.br	https://wwws.cnpq.br/cvlattesweb/PKG_MENU.menu?f_cod=23F9E85E2ED5F4708F29B1755BA4F455#	Computa????o	LRC2 - Laborat??rio de Redes de Computadores 2					T??cnico em Inform??tica; T??cnico em Redes; Ci??ncia da Computa????o.	N??o h?? pesquisa no laborat??rio, o mesmo ?? inerentemente de ensino.	Laborat??rio para pr??ticas em redes de computadores atrav??s do uso de switchs e roteadores.
3	Ot??vio Alc??ntara de Lima J??nior	1612866	otavio.junior@gmail.com	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4779247D6	Computa????o	LSD - Laborat??rio de Sistemas Digitais		O LSD pode prestar servi??os de desenvolvimento de sistemas embarcados baseados em microcontroladores, processadores e FPGAs para telemetria, telecomando, automa????o, IoT, dentre outras aplica????es.	otavio.junior@gmail.com		Ci??ncia da Computa????o.	Sistemas de Computa????o, Sistemas Embarcado, Projeto VLSI	O Laborat??rio de Sistemas Digitais (LSD) se dedica ?? pequisa e ao desenvolvimento de tecnologias inovadoras na ??rea de Sistemas de Computa????o com ??nfase em Sistemas Embarcados. O LSD possui expertise em projeto de sistemas embarcados com diversas arquiteturas de processadores e microcontroladores (ARM, PIC, DSPIC,...) bem como FPGAs. Al??m disso, o laborat??rio d?? suporte a diversas disciplinas do bacharelado em ci??ncia da computa????o, bem como dos programas de p??s-gradua????o PPGER e PPGCC.
4	F??bio Timb?? Brito	1641803	fabio@ifce.edu.edu	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4481929Z0	Ind??stria	LINC - Laborat??rio de Instrumenta????o e Controle	Desenvolvimento de software na ??rea de protocolos de comunica????o;\r\nDesenvolvimento de projetos e desenhos industriais com fabrica????o atrav??s de CNC router.	Desenvolvimento de projetos de pesquisa nas ??reas afins do laborat??rio			Engenharia de Controle e Automa????o; T??cnico em Automa????o Industrial; Engenharia Mec??nica.	- Sensores industriais\r\n- Sistemas Supervisionados;\r\n- Sistemas embarcados e prototipagem;\r\n- Protocolos Industriais;\r\n- Automa????o residencial;\r\n- Energias renov??veis\r\n\r\n\r\n	Nos moldes da ind??stria 4.0, o laborat??rio de instrumenta????o e Controle (LINC)  possui como objetivo principal  o desenvolvimento de projetos na ??rea de instrumenta????o industrial e automa????o. Constructo de v??rios anos de pesquisa em projetos na ??rea de automa????o, este laborat??rio possui recursos avan??ados como uma planta did??tica Industrial, uma ampla gama de instrumentos e transdutores al??m de uma estrutura para constru????o de prot??tipos e placas de circuito impresso.
7	Jos?? Ciro dos Santos	2706748	ciroifce@gmail.com	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4484070Y7	Ind??stria	LIA - Laborat??rio de Inform??tica Aplicada					Engenharia de Controle e Automa????o; Engenharia Mec??nica; T??cnico em Automa????o Industrial.	N??o s??o realizadas pesquisas especificas que envolvam o laborat??rio.	O LIA (Laborat??rio de Inform??tica Aplicada) conta com 31 microcomputadores com processadores Core 2, utilizados pelos alunos dos cursos ofertados pelo departamento da industria. Os softwares utilizados contemplam o conte??do de disciplinas como Desenho Auxiliado por Computador (CAD), Linguagem de programa????o e ainda simuladores utilizados nas disciplinas voltadas a eletr??nica. 
9	JEAN MARCELO DA SILVA MACIEL	1674463	jeanmdsm@ifce.edu.br	http://lattes.cnpq.br/8688702796839717	Computa????o	LRSF - Laborat??rio de Redes Sem Fio					T??cnico em Inform??tica; T??cnico em Redes; Ci??ncia da Computa????o.	LABORAT??RIO DE AULA.	Laborat??rio de Redes sem Fio. Laborat??rio destinado a aulas em geral, mas principalmente para estudos relacionados aos aspectos de redes de computadores sem fio.
10	Anderson Lima	1674404	anderson@ifce.edu.br	http://lattes.cnpq.br/3329525385652048	Computa????o	LaTIM - Laborat??rio de Tecnologia e Inova????o de Maracana??			anderson@ifce.edu.br	8538786321	Ci??ncia da Computa????o; T??cnico em Inform??tica; T??cnico em Redes.	Projetos voltados para pesquisa em computa????o e de empreendedorismo envolvendo os 3 eixos, computa????o, industria e quimica e meio ambiente	O LATIM ?? um espa??o reservado para abrigar pesquisas aplicadas e iniciativas de gerar produtos que gerar??o benef??cios a sociedade.
8	Jos?? Daniel de Alencar Santos	1442729	jdaniel@ifce.edu.br	http://lattes.cnpq.br/1123307163858590	Ind??stria	LAMSC - Laborat??rio de Aprendizagem de M??quinas e Simula????es Computacionais					Engenharia de Controle e Automa????o; Engenharia Mec??nica; T??cnico em Automa????o Industrial.	- Aprendizagem de M??quinas\r\n- Intelig??ncia Computacional Aplicada\r\n- Rob??tica\r\n- Processamento de Sinais	O LAMSC (Laborat??rio de Aprendizagem de M??quinas e Simula????es Computacionais) tem como objetivo desenvolver atividades de inicia????o cient??fica e pesquisa aplicada nos campos de Aprendizagem de M??quinas, Intelig??ncia Computacional Aplicada, Rob??tica e Processamento de Sinais, voltados para aplica????es em automa????o, controle e identifica????o de sistemas.
18	VENCESLAU XAVIER DE LIMA FILHO	1544405	vxlfilho@gmail.com	 http://lattes.cnpq.br/0209565051697344	Ind??stria	LIAF - Laborat??rio de Inspe????o e An??lise de Falhas		Inspe????o Industrial (termografia industrial, endoscopia industrial, part??culas magn??ticas, rugosidade superficial, ultrassonografia industrial, l??quidos penetrantes) \r\nAn??lise de falhas mec??nicas\r\nDiagn??stico de degrada????o Tribol??gica\r\nAn??lise qu??mica de materiais (fluoresc??ncia de raios-X port??til)	liaf.ifce@gmail.com	-	Engenharia de Controle e Automa????o; Engenharia Mec??nica.	Inspe????o industrial\r\nTribologia\r\nAn??lise de Falhas	O Laborat??rio de Inspe????o e An??lise de Falhas do Departamento da Ind??stria do Campus Maracana?? possui experi??ncia nas ??reas de inspe????o industrial, an??lise de falhas mec??nicas e degrada????o tribol??gica de materiais, sendo suporte para as diversas disciplinas de gradua????o e p??s gradua????o dos cursos do Campus Maracana??. O LIAF possui tamb??m infraestrutura para atuar nas ??reas de pesquisa acad??mica e aplicada, assim como na presta????o de servi??os tecnol??gicos e de consultoria para a ind??stria.    
11	Francisco Frederico dos Santos Matos	1666797	francisco.f.matos@gmail.com	http://lattes.cnpq.br/8204044573317813	Ind??stria	LTF - Laborat??rio de M??quinas T??rmicas e de Fluxo	Turbinas E??licas de Eixo Vertical, Turbinas E??licas de Eixo Horizontal, Sistemas de Refrigera????o por Absor????o com Fonte Solar T??rmica e T??neis de Vento.	O laborat??rio tem o objetivos de formalizar parcerias, onde possam ser contemplados os seguintes problemas:\r\n- Desenvolvimento de P??s de Turbinas E??licas de Eixo Vertical e Eixo Horizontal;\r\n- Desenvolvimento de Turbinas E??licas;\r\n- Desenvolvimento de Sistemas de Refrigera????o por Absor????o com Fonte Solar T??rmica;\r\n- Desenvolvimento de T??neis de Vento para Calibra????o de Anem??metros.	francisco.f.matos@gmail.com	--	Engenharia Mec??nica.	Energias Renov??veis; Sistemas T??rmicos; 	Laborat??rio cuja finalidade ?? propiciar aos alunos uma visualiza????o pr??tica do princ??pio de funcionamento das m??quinas de fluxo e t??rmicas, entre elas as Turbinas E??licas, Trocadores de Calor para Coleta de Energia Solar e etc. Al??m disso, contempla tanto disciplinas da gradua????o em Eng. Mec??nica, como do mestrado em energias renov??veis, a exemplo: Transf. de Calor e Mec. dos Fluidos Computacional, M??quinas T??rmicas e de Fluxo, Refrigera????o Industrial e Termodin??mica.\r\n
12	Wellington Albano	1548006	wellington@ifce.edu.br	http://lattes.cnpq.br/4309902638564502	Computa????o	LRC1 - Laborat??rio de Redes de Computadores 1					Ci??ncia da Computa????o; T??cnico em Inform??tica; T??cnico em Redes; Engenharia Ambiental e Sanit??ria.	Redes de Computadores	O laborat??rio de Redes de Computadores 1 ?? utilizado para atividades de ensino e pesquisa dos cursos do eixo de Computa????o: T??cnico em Inform??tica, T??cnico em Redes de Computadores e Bacharelado em Ci??ncia da Computa????o.
13	ROBERTO ALBUQUERQUE PONTES FILHO	0269968	roberto.consultorambiental@gmail.com	http://lattes.cnpq.br/9397867890436472	Qu??mica e Meio Ambiente	LT - Laborat??rio da Terra		Desenvolver projetos e implanta????o de ??reas degradadas com res??duos org??nicos alternativos			Engenharia Ambiental e Sanit??ria.	Recupera????o de ??reas degradadas, especies arb??reas nativas, res??duos org??nicos alternativos para aduba????o e plantas oleaginosas para avalia????o bioqu??mica	O laborat??rio ?? um telado agr??cola que atua na ??rea de pesquisa com especies arb??reas nativas, res??duos org??nicos para aduba????o, res??duos qu??micos de suplemento para solu????es em recupera????o de ??reas degradadas e em parceria em estudos com plantas oleaginosas para avalia????o bioqu??mica
14	SANDRO CESAR SILVEIRA JUCA	1473370	sandrojuca@ifce.edu.br	http://lattes.cnpq.br/0543232182796499	Computa????o	LAESE - Laborat??rio de Eletr??nica e Sistemas Embarcados	Sistemas embarcados aplicados em monitoramento e controle IoT de gera????o de fontes renov??veis de energia		laeseifce@hotmail.com	38786321	Ci??ncia da Computa????o; T??cnico em Inform??tica; T??cnico em Redes.	Eletr??nica, sistemas embarcados, gera????o de fontes renov??veis de Energia e rob??tica educacional. 	O Laborat??rio de Eletr??nica e Sistemas Embarcados (LAESE) ?? ligado ao campus de Maracana?? e utilizado pelos cursos t??cnicos e superiores do eixo da computa????o do IFCE ??? Campus Maracana??. Al??m disso, atua nas ??reas de pesquisa de sistemas embarcados e de gera????o de fontes renov??veis de energia junto ao PPGER e em parceria com o DEE da UFC, como tamb??m em educa????o profissional junto ao Mestrado ProfEPT. O LAESE ?? utilizado para ensino (gradua????o/t??cnico), pesquisa (gradua????o/mestrado) e inova????o.
15	Francisco Jos?? dos Santos Oliveira	2635531	fjoliveira@ifce.edu.br	http://lattes.cnpq.br/3399911160895219	Ind??stria	LMAT - Laborat??rio de Materiais		Realiza????o de ensaios mec??nicos: Resist??ncia ?? tra????o, Resist??ncia ?? compress??o, Dureza e Microdureza.\r\nRealiza????o de tratamentos t??rmicos.\r\nRealiza????o de metalografia com microsc??pio ??tico.	fjoliveira7@gmail.com		Engenharia Mec??nica; Engenharia de Controle e Automa????o; Engenharia Ambiental e Sanit??ria.	Propriedades Mec??nicas e an??lises microestruturais dos Materiais	O laborat??rio de materiais do departamento da ind??stria do IFCE campus Maracana?? possui compet??ncia na ??rea de caracteriza????o microestrutural e determina????o de propriedades mec??nicas dos materiais, estando apto a dar suporte ??s disciplinas da ??rea de materiais e processos de fabrica????o dos cursos deste departamento e da p??s-gradua????o, assim como desenvolver pesquisa acad??mica e aplicada, contando com infraestrutura necess??ria para presta????o de servi??os e desenvolvimento tecnol??gico nestas ??reas.
16	Adriano Holanda Pereira	1556624	prof.adrianohp@gmail.com	http://lattes.cnpq.br/9075415197983567	Ind??stria	LAMEP - Laborat??rio de Acionamento de M??quinas e Eletr??nica de Pot??ncia			lamep.ifce@gmail.com		Engenharia Mec??nica; Engenharia de Controle e Automa????o; T??cnico em Automa????o Industrial.	M??quinas el??tricas e eletr??nica de pot??ncia	O laborat??rio de acionamentos de m??quinas e eletr??nica de pot??ncia- lamep, tem por objetivo auxiliar o aprendizado dos alunos atrav??s de ensaios relacionados a m??quinas el??tricas, partidas de motores e eletr??nica de pot??ncia com materiais bastante did??ticos. Atrav??s de ensaios pr??ticos, compreender o funcionamento de m??quinas el??tricas e equipamentos de circuitos el??tricos. 
17	Ajalmar Rego da Rocha Neto	1552727	ajalmar@gmail.com	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4700345J0	Computa????o	LabVICIA - Laborat??rio de Vis??o Computacional e Intelig??ncia Artificial	Sistemas de otimiza????o para aloca????o de recursos.	Desenvolvimento de sistemas inteligentes usando machine learnig, deep learning, vis??o computacional, t??cnicas de otimiza????o, redes neurais artificiais.\r\nDesenvolvimento de sistemas inteligentes com ou sem depend??ncia de API propriet??rias (Watson, Tensor Flow, Hadoop, OpenCV, etc)\r\nDesenvolvimento de sistemas m??veis (mobile), WEB e em nuvem; em geral, com grande volume de dados (big data).\r\n			Ci??ncia da Computa????o; T??cnico em Inform??tica; T??cnico em Redes.	Intelig??ncia Artificial; Aprendizagem de M??quinas; Otimiza????o; Deep Learning, Vis??o Computacional; Sistemas Inteligentes; Agentes Inteligentes 	O LabVICIA ?? um laborat??rio de pesquisa que visa desenvolver m??todos, t??cnicas e sistemas na ??rea de intelig??ncia artificial. De uma forma mais espec??fica, tem-se como foco as seguintes sub??reas:  aprendizagem de m??quinas, redes neurais artificiais, deep learning, otimiza????o, vis??o computacional e agentes inteligentes. Al??m do desenvolvimento de novas t??cnicas na ??rea de intelig??ncia, no laborat??rio s??o tamb??m desenvolvidos sistemas WEB, mobile e em nuvem com grande volume de dados (big data).
19	Antonio Edson Oliveira Marques	1811881	edmarque@uol.com.br	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4703742P6	Qu??mica e Meio Ambiente	LMS - Laborat??rio de Mec??nica dos Solos			laboratoriomecsolosifce@gmail.com		Engenharia Ambiental e Sanit??ria.	Caracteriza????o e aplica????o de solos e res??duos recicl??veis para ??reas degradadas, constru????o civil e pavimenta????o.	O Laborat??rio de Mec??nica de Solos proporciona aos alunos do Instituto Federal do Cear?? aulas pr??ticas das disciplinas de Mec??nica dos Solos, Geotecnia e materiais de constru????o, difundindo o conhecimento da ??rea geot??cnica, bem como auxiliando e contribuindo com o desenvolvimento de pesquisas sobre caracteriza????o de solos e res??duos que possam ser reciclados para aplica????o em ??reas degradadas, obras de constru????o civil e pavimenta????o.
2	Pedro Henrique Augusto Medeiros	1811837	phamedeiros@ifce.edu.br	http://lattes.cnpq.br/4970091740105771	Qu??mica e Meio Ambiente	LH				33836370	Engenharia Ambiental e Sanit??ria.	Hidrologia e Recursos H??dricos	O Laborat??rio de Hidrologia (LABHIDRO) ?? vinculado ao Eixo de Qu??mica e Meio Ambiente do IFCE Campus Maracana?? , dando suporte aos cursos de bacharelado em Engenharia Ambiental e Sanit??ria e mestrado em Energias Renov??veis. No LABHIDRO s??o desenvolvidas pesquisas cient??ficas na ??rea de recursos h??dricos, com foco no monitoramento e na modelagem f??sico-matem??tica dos processos hidrol??gicos e sedimentol??gicos e na quantifica????o da disponibilidade h??drica no semi??rido brasileiro.
5	FRANKLIN ARAG??O GONDIM	1667576	ARAGAOFG@YAHOO.COM.BR	http://lattes.cnpq.br/4207075808724945	Qu??mica e Meio Ambiente	BIOQU??MICA E FISIOLOGIA VEGETAL	APLICATIVO DE LIBRAS PARA O ENSINO DE QU??MICA	PRESTA SERVI??O AOS ALUNOS DO CURSO NAS ATIVIDADES QUE NECESSITAM DE COMPUTADOR PARA OS ALUNOS QUE N??O TEM ACESSO: TCC; PROJETOS, ETC.			Licenciatura em Qu??mica.	BIOQU??MICA E FISIOLOGIA VEGETAL, ECOFISIOLOGIA, ESTRESSES ABI??TICOS EM PLANTAS, NUTRI????O DE PLANTAS. 	O Laborat??rio de Bioqu??mica e Fisiologia Vegetal atua com ??nfase na Ecofisiologia vegetal.  As esp??cies vegetais s??o nativas e /ou oleaginosas visto que o Laborat??rio est?? vinculado aos cursos de Gradua????o em Engenharia Ambiental e Sanit??ria e Mestrado em Energias Renov??veis
20	MARIA CLEIDE DA SILVA BARROSO	1843014	ccleideifcemaraca@gmail.com	http://lattes.cnpq.br/6267402154400258	Qu??mica e Meio Ambiente	LAPP - Laborat??rio de Pr??ticas Pedag??gicas	A presente pesquisa pretende possibilitar a melhoria do ensino de qu??mica por meio da elabora????o de sinais em libras vinculado ?? cria????o de um aplicativo de voz. No intuito de tratar da pesquisa em tela, destacamos como objetivo geral: Criar com recursos da programa????o de computadores e conhecimento em design gr??fico, sinais de libras que possam ser utilizados em um aplicativo no ensino de qu??mica		lapp.ifce@gmail.com	38786348	Licenciatura em Qu??mica.	EDUCA????O E ENSINO	A proposta do Laborat??rio de Pr??ticas Pedag??gicas - LAPP busca trazer para o centro do debate a tem??tica da forma????o docente e a sua pr??xis. De acordo com esse pressuposto, e fundamentadas nos estudos e pesquisas de Aprendizagem, Ensinagem e Ensino de Ci??ncias e Qu??mica, a proposta do LAPP visa, dentre outros aspectos, desenvolver a capacidade de reflex??o acerca da realidade s??cio educacional sob o ponto de vista de sua totalidade.
21	Francisco N??lio Costa Freitas	1467796	fneliocf@ifce.edu.br	http://lattes.cnpq.br/1834964619080647	Ind??stria	LMET - Laborat??rio de Metrologia Dimensional		Controle dimensional e engenharia reversa atrav??s de medi????es por coordenadas.	lmet.ifce@gmail.com	---	Engenharia Mec??nica; Engenharia de Controle e Automa????o; T??cnico em Automa????o Industrial.	Medi????o por coordenadas, engenharia reversa, processos de fabrica????o e engenharia de materiais.	O Laborat??rio de Metrologia Dimensional (LMET) do Campus Maracana?? do IFCE atua como suporte nas atividades de ensino do curso t??cnico em automa????o industrial, nos cursos de gradua????o em engenharia mec??nica e engenharia de controle e automa????o e no curso de mestrado em energias renov??veis, nas atividades de pesquisa nas ??reas medi????o por coordenadas, engenharia reversa, processos de fabrica????o e engenharia de materiais e possui grande potencial na presta????o de servi??os de engenharia reversa.
26	Luiz Daniel S. Bezerra	1842966	daniel.bez.ifce@gmail.com	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4719381E3	Ind??stria	LPC  - Laborat??rio de Pot??ncia e Controle					Engenharia de Controle e Automa????o; Engenharia Mec??nica; T??cnico em Automa????o Industrial.	Projetos envolvendo eletr??nica de pot??ncia; Inversores de pot??ncia; Conex??o ?? rede el??trica de\nInversores; Fontes chaveadas; Conversores est??ticos para processamento de energia el??trica;\nDesenvolvimento de controle de pot??ncia atrav??s de processamento digital de sinais (DSP); Projeto de\nmagn??ticos e placas eletr??nicas;	O LPC (Laborat??rio de Pot??ncia e Controle) possui a finalidade de auxiliar o aprimoramento na ??rea\neducacional, atrav??s da participa????o de alunos e docentes, no estudo e desenvolvimento de projetos\naplicados na ??rea de eletr??nica de pot??ncia. Apresenta equipamentos, bancadas e material para a\nconcep????o de circuitos eletr??nicos nas diversas ??reas que envolvem a convers??o energ??tica; o foco\nprincipal do laborat??rio est?? no desenvolvimento de inversores de pot??ncia (...)
27	Eug??nio Barreto Sousa e Silva	1453960	eugenio@ifce.edu.br	http://lattes.cnpq.br/5492252517721394	Computa????o	LMD  - Laborat??rio de M??dias Digitais			eugenio@ifce.edu.br	85 3878-6321	Ci??ncia da Computa????o; T??cnico em Automa????o Industrial; T??cnico em Inform??tica.	Artes digitais e produ????o de conte??do para educa????o ?? dist??ncia.	O laborat??rio de M??dias Digitais se prop??e ser um espa??o para o desenvolvimento de projetos de arte digital e conte??do digital para educa????o.
30	daniel alencar barros tavares	1856850	daniel.alencar@ifce.edu.br	http://lattes.cnpq.br/0003687632164309	Computa????o	LI03 - Laborat??rio de Inform??tica 03		Treinamento de inform??tica b??sica para f??bricas e empresas. 			Ci??ncia da Computa????o.	ensino	Laborat??rio de ensino e para suporte aos alunos. 
32	BRUNO CESAR BARROSO SALGADO	1666904	brunocesar@ifce.edu.br	http://lattes.cnpq.br/0573677979512967	Qu??mica e Meio Ambiente	LTPA - Laborat??rio de Tecnologia em Processos Ambientais	S??ntese de fotocatalisadores processos oxidativos avan??ados para convers??o/degrada????o de substratos org??nicos	desenvolvimento de sistemas de degrada????o oxidativa de contaminantes org??nicos recalcitrantes\r\ndesenvolvimento e valida????o de m??todos anal??ticos para quantifica????o de poluentes org??nicos e metais pesados	brunocesar@ifce.edu.br	8538786337	Engenharia Ambiental e Sanit??ria; Licenciatura em Qu??mica.	Processos Oxidativos Avan??ados (POAs) \r\nFotocat??lise heterog??nea na convers??o seletiva de substratos org??nicos\r\nEstudo fitoqu??mico e farmacol??gico de plantas\r\nProdu????o de biodiesel/bioquerosene a partir de diferentes oleaginosas\r\nS??ntese de adsorventes para remo????o de contaminantes org??nicos e metais pesados\r\nDesenvolvimento e valida????o de m??todos anal??ticos 	O Laborat??rio de Tecnologia em Processos Ambientais (LTPA) est?? vinculado ao Eixo de Qu??mica e Meio Ambiente do Campus Maracana??, dando suporte a  atividades de ensino dos cursos de Engenharia Ambiental e Sanit??ria e Licenciatura em Qu??mica, dispondo de estrutura f??sica para o desenvolvimento de pesquisa nos campos da qu??mica fina, cat??lise homog??nea/heterog??nea, processos adsortivos e qu??mica anal??tica, apoiando estudos realizados a n??vel de gradua????o e p??s-gradua????o (Energias Renov??veis-PPGER)
33	Ant??nio Ol??vio Silveira Britto J??nior	995006	olivio@ifce.edu.br	http://lattes.cnpq.br/3534055362942935	Qu??mica e Meio Ambiente	 LATACS - Laborat??rio de Tecnologia Alternativas de Conviv??ncia com o Semi??rido	HIDROGEL DE FRALDAS DESCART??VEIS\r\n O hidrogel oriundo das fraldas descart??veis se torna uma alternativa excelente, visto que deixa o solo ??mido proporcionando a absor????o de nutrientes pelas plantas e possibilitando uma economia h??drica. \r\nBIODIGESTOR\r\nO subproduto final se torna uma alternativa excelente, visto que ?? rico em nutrientes para as plantas. \r\n	REUSO DE ??GUA, COMPOSTAGEM E VERMICOMPOSTAGEM\r\n	gprsmifce@gmail.com	38786347	Engenharia Ambiental e Sanit??ria; T??cnico em Meio Ambiente.	Desenvolvimento de Tecnologias Alternativas de Conviv??ncia com o Semi??rido  	Laborat??rio de Tecnologias Alternativas de Conviv??ncia com o Semi??rido atualmente est?? sendo desenvolvidos os seguintes projetos Biodigestor, Fossa Verde, Hidrogel de Fraldas Descart??veis, Compostagem dos Res??duos do Restaurante Acad??mico e o projeto Agrochu?? em parceira com o Minist??rio da Sa??de, que tem o foco na agroecologia e seguran??a alimentar capacitando grupos como estudantes, professores, agricultores, ind??genas e pessoas que se interessem pela ??rea.
34	ANTONIO BARBOSA DE SOUSA JUNIOR	2031223	antonio.barbosa@ifce.edu.br	http://lattes.cnpq.br/4260373627927424	Ind??stria	LPROT		Implementa????o de sistemas de controle.			Engenharia de Controle e Automa????o; T??cnico em Automa????o Industrial.	rob??tica, sistemas de controle, acionamento de m??quinas, eletr??nica de pot??ncia.	Este laborat??rio visa o estudo e pesquisa de sistemas de controle aplicado ?? rob??tica m??vel e de manipuladores, bem como o acionamento de m??quinas el??tricas como o motor de indu????o usando estrat??gias de controle de campo orientado.
\.


--
-- Name: dados_gerais_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.dados_gerais_id_seq', 34, true);


--
-- Data for Name: extensao; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.extensao (id_extensao, id_siape, titulo, fomento, alunos_tecnico, alunos_graduacao, alunos_pos) FROM stdin;
1	1612866	EMICRO - Escola de Microeletr??nica do Nordeste	CAPES	0	10	0
2	1667576	PORTAL DO EDUCADOR-IFCE MARACANA??: UMA FERRAMENTA A SERVI??O DO ENSINO	IFCE	0	1	0
3	1667576	USO DA QU??MICA FORENSE COMO FERRAMENTA DE ENSINO DE QU??MICA NAS ESCOLAS DE MARACANA??	IFCE	0	3	0
4	1674404	Corredores Digitais	SEM FOMENTO	3	6	0
5	1473370	Curso de extens??o de rob??tica educacional como ferramenta de interdisciplinaridade	IFCE	0	3	0
6	1473370	 Inclus??o digital, rob??tica e metareciclagem nas institui????es de ensino	SEM FOMENTO	0	1	0
7	1843014	PORTAL DO EDUCADOR-IFCE MARACANA??: UMA FERRAMENTA A SERVI??O DO ENSINO	IFCE	0	1	0
8	1843014	 I JOGOS PARA PESSOAS COM DEFICI??NCIA/NAPNE - IFCE- CAMPUS MARACANA??	SEM FOMENTO	10	10	10
9	1666904	Produ????o de quitosana a partir dos res??duos da carcinicultura	SEM FOMENTO	0	1	0
10	1666904	Caracteriza????o das Lagoas de Maracana?? quanto ?? concentra????o de metais pesados atrav??s do desenvolvimento de metodologia anal??tica envolvendo esferas de s??lica modificada com pirrolidina	SEM FOMENTO	0	1	0
11	995006	Saneamento Ambiental: implanta????o de tecnologia ambiental de baixo custo em uma comunidade rural.	IFCE	0	1	0
12	995006	Saneamento Ambiental: implanta????o de tecnologia ambiental de baixo custo em uma comunidade rural.	SEM FOMENTO	0	1	0
\.


--
-- Name: extensao_id_extensao_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.extensao_id_extensao_seq', 12, true);


--
-- Data for Name: laboratorios_restantes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.laboratorios_restantes (id, siape, coordenador, eixo, laboratorio) FROM stdin;
1	1659388	Venicio Soares de Oliveira	Ind??stria	LSHIP - Laborat??rio de Sistemas Hidr??ulicos e Pneum??ticos
2	1842966	Lu??s Daniel Santos Bezerra	Ind??stria	LEE - Laborat??rio de Eletroeletr??nica
12	1674316	Cynara Reis Aguiar	Qu??mica e Meio Ambiente	LAQAMB - Laborat??rio de Qu??mica Anal??tica e Microbiologia Ambiental
14	6269422	Arist??nio de Oliveira	Qu??mica e Meio Ambiente	Laborat??rio de Qu??mica Org??nica e Inorg??nica
16	1795291	Daniel Silva Ferreira	Computa????o	Laborat??rio de Inform??tica 01
17	1886204	Thiago Alves Rocha	Computa????o	Laborat??rio de Inform??tica 02
19	1958500	Adriano Tavares de Freitas	Computa????o	LHARD - Laborat??rio de Hardware
\.


--
-- Name: laboratorios_restantes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.laboratorios_restantes_id_seq', 20, true);


--
-- Data for Name: pedidos_alteracao; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pedidos_alteracao (id_siape_antigo, nome_antigo, id_novo_siape, novo_coordenador, nome_lab, nova_sigla) FROM stdin;
2031223	ANTONIO BARBOSA DE SOUSA JUNIOR	2031223	antonio barbosa de souza j??nior		
\.


--
-- Data for Name: pesos_avaliativos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pesos_avaliativos (id_peso, nome_peso, sigla_peso, valor_peso) FROM stdin;
1	bolsistas 	bol	3
2	voluntarios	vol	2
3	disciplinas	dis	3
4	professores	prof	1
5	publica????es per	per	3
\.


--
-- Name: pesos_avaliativos_id_peso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pesos_avaliativos_id_peso_seq', 5, true);


--
-- Data for Name: professores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.professores (id, id_siape, nome, lattes_url) FROM stdin;
1	1811837	Adriana Marques Rocha	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4762860Z2
2	1612866	Corneli Gomes Furtado J??nior	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4779447J6
3	1612866	Jonas Rodrigues Vieira dos Santos	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K8711160J3
4	1641803	Samuel Vieira Dias	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4278358P8
5	1641803	Venicio Soares de Oliveira	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4137475J4
11	2706748	Jos?? Ciro dos Santos	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4484070Y7
12	1442729	Luiz Daniel Santos Bezerra	http://lattes.cnpq.br/3261052136129353
13	1442729	Pedro Pedrosa Rebou??as Filho	http://lattes.cnpq.br/4347965302097614
14	1442729	Francisco N??lio Costa Freitas	http://lattes.cnpq.br/1834964619080647
15	1442729	Ant??nio Barbosa de Souza J??nior	http://lattes.cnpq.br/4260373627927424
6	1667576	CAROLINE DE GOES SAMPAIO	http://lattes.cnpq.br/9870299456044346
7	1667576	MARIA CLEIDE DA SILVA BARROSO	http://lattes.cnpq.br/6267402154400258
10	1667576	SILVANY BASTOS SANTIAGO	http://lattes.cnpq.br/8128196166798668
9	1667576	NATALIA PARENTE DE LIMA VALENTE	http://lattes.cnpq.br/5054210419500350
8	1667576	FRANCISCA HELENA DE OLIVEIRA HOLANDA 	http://lattes.cnpq.br/1127779738600648
16	1548006	Wellington Albano	http://lattes.cnpq.br/4309902638564502
17	1548006	Jean Marcelo S. Maciel	http://lattes.cnpq.br/8688702796839717
18	1548006	In??cio Alves	http://lattes.cnpq.br/1022303386341552
19	0269968	Franklin Arag??o Gondim	http://lattes.cnpq.br/4207075808724945
20	2635531	Venceslau Xavier de Lima Filho	http://lattes.cnpq.br/0209565051697344
21	1556624	Celso Rog??rio Schmidlin J??nior	http://lattes.cnpq.br/9279561215102176
22	1552727	Amauri de Sousa Junior	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4238049P3
23	1552727	Daniel Alencar Barros Tavares	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4290659J1
24	1544405	Rodrigo Freitas Guimar??es	http://lattes.cnpq.br/1434906331576002
25	1811881	Erika da Justa Teixeira Rocha	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4734401P5
26	1843014	MARIA CLEIDE DA SILVA BARROSO	http://lattes.cnpq.br/6267402154400258
27	1843014	SILVANY BASTOS SANTIAGO	http://lattes.cnpq.br/8128196166798668
28	1843014	CAROLINE DE GOES SAMPAIO	http://lattes.cnpq.br/9870299456044346
29	1843014	FRANCISCA HELENA DE OLIVEIRA HOLANDA	http://lattes.cnpq.br/1127779738600648
30	1843014	NATALIA PARENTE DE LIMA VALENTE	http://lattes.cnpq.br/5054210419500350
31	1467796	Rodrigo Freitas Guimar??es	http://lattes.cnpq.br/1434906331576002
32	1467796	Venceslau Xavier de Lima Filho	http://lattes.cnpq.br/0209565051697344
33	1467796	Francisco Jos?? dos Santos Oliveira	http://lattes.cnpq.br/3399911160895219
34	1467796	Ven??cio Soares de Oliveira	http://lattes.cnpq.br/3263289316174386
35	1666904	JO??O CARLOS DA COSTA ASSUN????O	http://lattes.cnpq.br/8873683560219910
36	1666904	CAROLINE DE GOES SAMPAIO	http://lattes.cnpq.br/9870299456044346
37	1666904	MARIA DO SOCORRO PINHEIRO DA SILVA	http://lattes.cnpq.br/6084997567682180
38	995006	Ana Karine Pessoa Bastos	http://lattes.cnpq.br/4714692754970254
\.


--
-- Name: professores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.professores_id_seq', 38, true);


--
-- Data for Name: projetos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.projetos (id_pesquisa, id_siape, nome_projeto, fomento, alunos_tecnico, alunos_graduacao, alunos_pos) FROM stdin;
1	1811837	Reuso de sedimento assoreado em a??udes	CNPq	0	3	1
2	1811837	Sensoriamento remoto como estrat??gia para a gest??o de ??guas no semi??rido	CAPES	0	2	1
3	1811837	Dispon??bilidade h??drica de pequenos a??udes no semi??rido cearense	IFCE	0	3	1
4	1811837	Gest??o de pequenos a??udes no semi??rido	CNPq	0	2	2
9	1641803	Desenvolvimento de um seguidor solar microcontrolado baseado em vis??o omnidirecional - Edital N?? 05/2014-PRPI  PROINFRA/IFCE	IFCE	0	1	0
10	1641803	Dispositivo mec??nico, microcontrolado e computacional para ??rea de rob??tica pedag??gica baseado na norma IEC 61131 - EDITAL N?? 03/2016 - PRPI	IFCE	0	1	0
11	1641803	Projeto de um seguidor solar microcontrolado baseado em vis??o omnidirecional - EDITAL N?? 01/2016 - PRPI	IFCE	0	1	0
12	1641803	Desenvolvimento de uma bancada educacional para ??rea de rob??tica pedag??gica baseado em FPGA e na norma IEC 61131 - Edital PIBIT N?? 08/2016 - PRPI	IFCE	0	1	0
6	1612866	Uma abordagem para gera????o de tr??fego para avalia????o de redes intra-chip	FUNCAP	0	1	0
5	1612866	Reposit??rio de Objetos Educacionais para Rede EPT - ProEdu - Fase 2	SETEC-MEC	0	10	0
7	1612866	Gera????o de tra??os de comunica????o cientes de depend??ncias de pacotes atrav??s da an??lise de simula????es de aplica????es MPSoC	FUNCAP	0	1	0
8	1612866	 Implementa????o de um algoritmo de processamento de imagem embarcado em FPGA para segmenta????o de nozes de castanha de caju.	Sem Fomento	0	4	0
13	1667576	Remo????o de metais pesados utilizando res??duos de alimentos	IFCE	0	1	0
17	1667576	AS EXPECTATIVAS DA AVALIA????O DE SISTEMAS EDUCACIONAIS E A CATEGORIA QUALIDADE: UMA AN??LISE DO CASO BRASILEIRO	IFCE	0	1	0
16	1667576	A UTILIZA????O DE APLICATIVO DE LIBRAS NO ENSINO DE QU??MICA	IFCE	0	1	0
15	1667576	ENSINO DE QU??MICA POR MEIO DA LIBRAS: A UTILIZA????O DE SOFTWARE EDUCACIONAL	IFCE	0	1	0
14	1667576	SISTEMAS DE AVALIA????ES NO BRASIL: UM ESTUDO DAS POL??TICAS EDUCACIONAIS	IFCE	0	1	1
18	1674404	Reposit??rio de Objetos Educacionais para Rede EPT - ProEdu - Fase 2	Secretaria de Tecnologia	0	10	0
19	1666797	Desenvolvimento de Turbinas E??licas de Eixo Vertical	CNPq	0	1	1
20	1666797	Desenvolvimento de T??nel de Vento para Calibra????o de Anem??metros	CNPq	0	1	1
21	1666797	Sistema de Refrigera????o por Absor????o com Fonte Solar-T??rmica	CNPq	0	1	1
22	1666797	Desenvolvimento de Turbina E??lica de Eixo Vertical com Suportes Inclinados Geradores de Torque	Sem Fomento	0	1	1
23	1666797	Desenvolvimento de Turbina E??lica de Eixo Horizontal	Sem Fomento	0	0	1
24	1548006	Gerenciamento de dispositivos em redes sem fio dom??sticas definidas por software	IFCE	0	1	0
25	0269968	AN??LISE DE VIABILIDADE NO APROVEITAMENTO DE RES??DUOS DE SUPLEMENTO ANIMAL COMO INSUMO PARA RECUPERA????O DE SOLOS  DEGRADADOS	Sem Fomento	0	2	0
26	1473370	MONITORAMENTO E CONTROLE IOT DE CONSUMO DE CARGAS E DE MICROGERA????O DE ENERGIA EL??TRICA NO IFCE - CAMPUS MARACANA??	IFCE	0	1	0
27	1473370	SISTEMA EMBARCADO IOT APLICADO EM CLOUD COMPUTING PARA GERA????O DESCENTRALIZADA DE ENERGIA	IFCE	0	1	0
28	1473370	ELABORA????O DE FERRAMENTAS E REDES COLABORATIVAS PARA O ENSINO DE ROB??TICA E METARECICLAGEM	IFCE	0	1	0
29	1473370	SISTEMAS EMBARCADOS LINUX PARA CONTROLE E MONITORAMENTO EM NUVEM DE PLANTAS DE MICROGERA????O FOTOVOLTAICA	IFCE	0	1	0
30	1473370	SISTEMAS EMBARCADOS PARA CONTROLE E MONITORAMENTO DE MICROGERA????O FOTOVOLTAICA CONECTADA ?? REDE EL??TRICA	IFCE	0	2	0
31	2635531	Caracteriza????o da Junta Soldada com A??o Inoxid??vel Supermartens??tico	Sem Fomento	0	1	0
32	1552727	Sistema Inteligente de Monitoramento de Faixas Autom??ticas	EMBRAPII	0	6	3
33	1552727	Sistema Inteligente Direcionador de Conte??do e Publicidade	EMBRAPII	0	6	4
34	1552727	Sistema Inteligente para Detec????o de Pr??xima Funcionalidade e Fluxos de Trabalhos em Software Cont??bil com M??ltiplas Funcionalidades	EMBRAPII	0	2	5
35	1552727	 Smart&Green: Um Arcabou??o de Internet das Coisas para Agricultura Inteligente	CNPq	0	2	2
36	1552727	Redes Neurais RBF aplicadas ao Diagn??stico de Patologias da Coluna Vertebral	IFCE	0	1	0
37	1811881	ESTUDO INOVADOR DO APROVEITAMENTO DE RES??DUOS DE CER??MICA VERMELHA NA PRODU????O DE TIJOLOS DE BAIXO IMPACTO AMBIENTAL	IFCE	0	2	0
38	1811881	CONSTRU????O DE UM PROT??TIPO DE CASA SUSTENT??VEL COM TIJOLOS A BASE DE RES??DUOS DE CER??MICA VERMELHA E AVALIA????O DO SEU CONFORTO T??RMICO	IFCE	0	3	0
39	1811881	ESTUDO DA APLICABILIDADE DE RES??DUOS DE CONSTRU????O CIVIL RECICLADOS COMO AGREGADO PARA O USO EM CAMADAS BASES DE PAVIMENTOS	Sem Fomento	0	1	0
40	1843014	 SISTEMAS DE AVALIA????ES NO BRASIL: UM ESTUDO DAS POL??TICAS EDUCACIONAIS	IFCE	0	1	0
41	1843014	Programa Institucional de Bolsas de Inicia????o ?? Doc??ncia	CAPES	0	10	0
42	1843014	ENSINO DE QU??MICA POR MEIO DA LIBRAS: A UTILIZA????O DE SOFTWARE EDUCACIONAL	IFCE	0	1	0
43	1843014	AS EXPECTATIVAS DA AVALIA????O DE SISTEMAS EDUCACIONAIS E A CATEGORIA QUALIDADE: UMA AN??LISE DO CASO BRASILEIRO	IFCE	0	1	0
44	1843014	 I JOGOS PARA PESSOAS COM DEFICI??NCIA/NAPNE - IFCE- CAMPUS MARACANA??	Sem Fomento	10	10	10
45	1467796	AVALIA????O DA RECRISTALIZA????O E SUA INFLU??NCIA NO DESEMPENHO DE UM A??O EL??TRICO DE GR??O N??O ORIENTADO (GNO)	IFCE	0	1	1
46	1467796	AVALIA????O DAS ALTERA????ES MICROESTRUTURAIS DE UM A??O EL??TRICO DE GR??O N??O ORIENTADO (GNO)	CNPq	0	1	1
47	1467796	DESENVOLVIMENTO DE M??TODO COMPUTACIONAL BASEADO EM MOSAICO APLICADO ?? FOTOMICROGRAFIAS DE METAIS OBTIDAS POR MICROSCOPIA ??PTICA	IFCE	0	1	1
48	1467796	CONSTRU????O DE MOSAICO APLICADO ?? MICROSCOPIA ??PTICA	CNPq	0	1	1
49	1467796	CONSTRU????O DE MOSAICO APLICADO ?? MICROSCOPIA ??PTICA	CNPq	0	1	1
50	1467796	Engenharia reversa de componentes mec??nicos e efici??ncia energ??tica em processos de manufatura	Sem Fomento	0	1	1
51	1467796	Engenharia reversa de componentes mec??nicos atrav??s de medi????es por coordenadas	Sem Fomento	0	1	1
52	1467796	Caracteriza????o microestrutural de sil??cio policristalino utilizado em c??lulas de pain??is fotovolt??icos	Sem Fomento	0	1	1
53	1467796	Par??metros de processo e efici??ncia energ??tica em processos de fabrica????o mec??nica por usinagem	Sem Fomento	0	1	1
54	1842966	Desenvolvimento de uma plataforma de ensaio de inversor monof??sico, grid-tie, para avalia????o\nde ader??ncia ?? normatiza????o da ANEEL na produ????o individual de energia el??trica.	CNPq	0	3	0
55	1842966	Projeto de Gera????o Distribu??da Solar-Fotovoltaica no Campus de Maracana??	IFCE	1	0	0
56	1842966	Projeto de Gera????o Distribu??da Solar-Fotovoltaica no Campus de Maracana??	IFCE	1	0	0
57	1842966	Desenvolvimento de uma plataforma de inversor monof??sico, grid-tie, atendendo a\nnormatiza????o NT010 da COELCE para produ????o individual de energia el??trica.	IFCE	0	1	0
58	1842966	Gerador de Energia Plug and Play - M??dulo CA - para Redes Inteligentes (Smart Grid)	IFCE/EMBRAPII/SEVENIA	0	1	0
59	1842966	Plataforma de Inversor Monof??sico para Gera????o Distribu??da	FUNCAP/INOVAFIT/SDG	0	1	0
65	1842966	Desenvolvimento de uma plataforma de ensaio de inversor monof??sico, grid-tie, para avalia????o\nde ader??ncia ?? normatiza????o da ANEEL na produ????o individual de energia el??trica.	Sem Fomento	0	1	0
66	1842966	CONVERSOR CC-CC ISOLADO EM ALTA FREQ????NCIA PARA APLICA????ES FOTO-\nVOLTAICAS	Sem Fomento	0	1	0
68	1842966	ESTUDO DE INTERFACE ELETR??NICA PARA GERENCIAMENTO DE MOTOR A\nCOMBUST??O INTERNA	Sem Fomento	0	1	0
69	1842966	PROPOSTA DE CONVERSOR EST??TICO CC-CC RESSONANTE, AUTO-OSCILANTE\nPUSH-PULL ALIMENTADO EM CORRENTE PARA AQUECIMENTO INDUTIVO	Sem Fomento	0	1	0
70	1842966	CONVERSOR EST??TICO DE TOPOLOGIA C??K PARA ACIONAMENTO DE LEDS EM\nAPLICA????ES AUTOMOTIVAS	Sem Fomento	0	1	0
71	1842966	PLATAFORMA M??VEL PARA RASTREAMENTO SOLAR FOTOFOLTAICO	Sem Fomento	0	1	0
72	1666904	Esferas de quitosana modificadas com produtos naturais para a adsor????o e pr??-concentra????o de metais t??xicos de solu????es aquosa	CNPq	0	1	0
73	1666904	4.\tBIOQUEROSE A PARTIR DA DESTILA????O DO BIODIESEL DAS AM??NDOAS DE Syagrus cearenses OBTIDO POR TRANSESTERIFICA????O IN SITU MEDIADA POR MICROONDAS	FUNCAP	0	0	1
74	1666904	APLICA????O DA FOTOCAT??LISE HETEROG??NEA NA OXIDA????O SELETIVA DO GLICEROL PARA PRODUTOS COMERCIALMENTE MAIS VALIOSOS	CAPES	0	1	1
75	1666904	DESENVOLVIMENTO DE SISTEMAS DE TRATAMENTO DESCENTRALIZADOS PARA VIABILIZA????O DE FONTES DE ??GUA SUBTERR??NEA E SUPERFICIAL NO IFCE-MARACANA??	IFCE	0	1	0
76	1666904	1.\tESTUDO FITOQU??MICA E DAS PROPRIEDADES FARMACOL??GICAS DE PLANTAS DO CEAR??	IFCE	0	1	0
77	1666904	S??NTESE DE ESFERAS DE S??LICA MODIFICADAS COM PIRROLIDINA -PARA ADSOR????O DE METAIS	Sem Fomento	0	1	0
78	995006	REAPROVEITAMENTO DE HIDROGEL PARA UTILIZA????O AGRICULTURA FAMILIAR	IFCE	0	1	0
79	995006	REAPROVEITAMENTO DE RES??DUOS S??LIDOS PARA A PRODU????O  DE G??S EM UMA INSTITUI????O DE ENSINO P??BLICO	IFCE	0	1	0
80	995006	TRATAMENTO AER??BIO DE RES??DUOS S??LIDOS ORG??NICOS ATRAV??S DA COMPOSTAGEM E COMPOSTAGEM ACELERADA.	IFCE	1	0	0
81	995006	PROJETO DE RE??SO DE ??GUA DE BEBEDOUROS COLETIVOS, CONDICIONADORES DE AR E DESTILADORES DE UMA INSTITUI????O P??BLICA DE ENSINO.	IFCE	1	0	0
82	995006	Saneamento Ambiental: implanta????o de  tecnologia ambiental  de baixo em uma Institui????o de ensino	IFCE	0	1	0
83	995006	POTENCIAL   DE   RE??SO   DE ??GUAS   RESIDU??RIASPARA   IRRIGA????ONO ENFRENTAMENTO DA SECA NO INTERIOR DO CEAR??	Sem Fomento	0	1	0
\.


--
-- Name: projetos_id_pesquisa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.projetos_id_pesquisa_seq', 83, true);


--
-- Data for Name: quantidades; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.quantidades (id, id_siape, qtd_bolsistas, qtd_voluntarios, qtd_disciplinas, qtd_professores, qtd_periodico, qtd_congresso, qtd_tcc, qtd_pesquisa_fomento, qtd_pesquisa_semfomento, qtd_extensao_fomento, qtd_extensao_semfomento) FROM stdin;
2	1811837	1	3	0	1	8	9	11	4	0	0	0
3	1612866	4	6	2	2	3	9	1	3	1	1	0
4	1641803	1	2	5	2	0	1	1	4	0	0	0
6	2706748	0	1	4	1	0	0	0	0	0	0	0
7	1442729	4	5	1	4	4	2	1	0	0	0	0
8	1674463	0	0	5	0	0	0	0	0	0	0	0
9	1674404	10	0	0	0	0	0	0	1	0	0	1
10	1666797	2	4	2	0	4	2	1	3	2	0	0
11	1548006	1	0	7	3	0	0	1	1	0	0	0
5	1667576	2	5	4	5	3	7	9	13	0	4	1
1	1622296	0	0	6	0	0	0	0	0	0	0	0
12	0269968	0	2	1	1	4	3	7	0	1	0	0
13	1473370	5	6	4	0	3	11	13	6	0	1	1
14	2635531	0	2	7	1	2	2	4	0	1	0	0
15	1556624	0	1	2	1	1	1	0	0	0	0	0
16	1552727	11	0	0	2	11	11	6	11	0	0	0
17	1544405	0	2	4	1	2	2	0	0	0	0	0
18	1811881	1	3	3	1	2	2	10	2	1	0	0
19	1843014	3	2	4	5	4	4	18	4	1	1	1
20	1467796	3	2	6	4	4	1	3	5	4	0	0
25	1842966	3	2	2	3	0	0	3	7	6	0	0
26	1453960	0	0	3	0	0	0	0	0	0	0	0
27	1856850	0	2	2	0	0	0	0	0	0	0	0
28	1666904	9	1	5	3	9	5	8	14	1	0	2
29	995006	4	1	2	1	0	11	6	8	1	1	1
30	2031223	0	0	2	0	0	0	0	0	0	0	0
\.


--
-- Name: quantidades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.quantidades_id_seq', 30, true);


--
-- Name: dados_gerais_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.dados_gerais
    ADD CONSTRAINT dados_gerais_pkey PRIMARY KEY (siape);


--
-- Name: extensao_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.extensao
    ADD CONSTRAINT extensao_pkey PRIMARY KEY (id_extensao);


--
-- Name: laboratorios_restantes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.laboratorios_restantes
    ADD CONSTRAINT laboratorios_restantes_pkey PRIMARY KEY (siape);


--
-- Name: pedidos_alteracao_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.pedidos_alteracao
    ADD CONSTRAINT pedidos_alteracao_pkey PRIMARY KEY (id_siape_antigo);


--
-- Name: pesos_avaliativos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.pesos_avaliativos
    ADD CONSTRAINT pesos_avaliativos_pkey PRIMARY KEY (id_peso);


--
-- Name: professores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.professores
    ADD CONSTRAINT professores_pkey PRIMARY KEY (id);


--
-- Name: projetos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.projetos
    ADD CONSTRAINT projetos_pkey PRIMARY KEY (id_pesquisa);


--
-- Name: quantidades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.quantidades
    ADD CONSTRAINT quantidades_pkey PRIMARY KEY (id);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

