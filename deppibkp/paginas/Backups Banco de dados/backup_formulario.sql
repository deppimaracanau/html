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
1	Inácio Cordeiro Alves	1622296	inacioalves@ifce.edu.br	https://wwws.cnpq.br/cvlattesweb/PKG_MENU.menu?f_cod=23F9E85E2ED5F4708F29B1755BA4F455#	Computação	LRC2 - Laboratório de Redes de Computadores 2					Técnico em Informática; Técnico em Redes; Ciência da Computação.	Não há pesquisa no laboratório, o mesmo é inerentemente de ensino.	Laboratório para práticas em redes de computadores através do uso de switchs e roteadores.
3	Otávio Alcântara de Lima Júnior	1612866	otavio.junior@gmail.com	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4779247D6	Computação	LSD - Laboratório de Sistemas Digitais		O LSD pode prestar serviços de desenvolvimento de sistemas embarcados baseados em microcontroladores, processadores e FPGAs para telemetria, telecomando, automação, IoT, dentre outras aplicações.	otavio.junior@gmail.com		Ciência da Computação.	Sistemas de Computação, Sistemas Embarcado, Projeto VLSI	O Laboratório de Sistemas Digitais (LSD) se dedica à pequisa e ao desenvolvimento de tecnologias inovadoras na área de Sistemas de Computação com ênfase em Sistemas Embarcados. O LSD possui expertise em projeto de sistemas embarcados com diversas arquiteturas de processadores e microcontroladores (ARM, PIC, DSPIC,...) bem como FPGAs. Além disso, o laboratório dá suporte a diversas disciplinas do bacharelado em ciência da computação, bem como dos programas de pós-graduação PPGER e PPGCC.
4	Fábio Timbó Brito	1641803	fabio@ifce.edu.edu	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4481929Z0	Indústria	LINC - Laboratório de Instrumentação e Controle	Desenvolvimento de software na área de protocolos de comunicação;\r\nDesenvolvimento de projetos e desenhos industriais com fabricação através de CNC router.	Desenvolvimento de projetos de pesquisa nas áreas afins do laboratório			Engenharia de Controle e Automação; Técnico em Automação Industrial; Engenharia Mecânica.	- Sensores industriais\r\n- Sistemas Supervisionados;\r\n- Sistemas embarcados e prototipagem;\r\n- Protocolos Industriais;\r\n- Automação residencial;\r\n- Energias renováveis\r\n\r\n\r\n	Nos moldes da indústria 4.0, o laboratório de instrumentação e Controle (LINC)  possui como objetivo principal  o desenvolvimento de projetos na área de instrumentação industrial e automação. Constructo de vários anos de pesquisa em projetos na área de automação, este laboratório possui recursos avançados como uma planta didática Industrial, uma ampla gama de instrumentos e transdutores além de uma estrutura para construção de protótipos e placas de circuito impresso.
7	José Ciro dos Santos	2706748	ciroifce@gmail.com	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4484070Y7	Indústria	LIA - Laboratório de Informática Aplicada					Engenharia de Controle e Automação; Engenharia Mecânica; Técnico em Automação Industrial.	Não são realizadas pesquisas especificas que envolvam o laboratório.	O LIA (Laboratório de Informática Aplicada) conta com 31 microcomputadores com processadores Core 2, utilizados pelos alunos dos cursos ofertados pelo departamento da industria. Os softwares utilizados contemplam o conteúdo de disciplinas como Desenho Auxiliado por Computador (CAD), Linguagem de programação e ainda simuladores utilizados nas disciplinas voltadas a eletrônica. 
9	JEAN MARCELO DA SILVA MACIEL	1674463	jeanmdsm@ifce.edu.br	http://lattes.cnpq.br/8688702796839717	Computação	LRSF - Laboratório de Redes Sem Fio					Técnico em Informática; Técnico em Redes; Ciência da Computação.	LABORATÓRIO DE AULA.	Laboratório de Redes sem Fio. Laboratório destinado a aulas em geral, mas principalmente para estudos relacionados aos aspectos de redes de computadores sem fio.
10	Anderson Lima	1674404	anderson@ifce.edu.br	http://lattes.cnpq.br/3329525385652048	Computação	LaTIM - Laboratório de Tecnologia e Inovação de Maracanaú			anderson@ifce.edu.br	8538786321	Ciência da Computação; Técnico em Informática; Técnico em Redes.	Projetos voltados para pesquisa em computação e de empreendedorismo envolvendo os 3 eixos, computação, industria e quimica e meio ambiente	O LATIM é um espaço reservado para abrigar pesquisas aplicadas e iniciativas de gerar produtos que gerarão benefícios a sociedade.
8	José Daniel de Alencar Santos	1442729	jdaniel@ifce.edu.br	http://lattes.cnpq.br/1123307163858590	Indústria	LAMSC - Laboratório de Aprendizagem de Máquinas e Simulações Computacionais					Engenharia de Controle e Automação; Engenharia Mecânica; Técnico em Automação Industrial.	- Aprendizagem de Máquinas\r\n- Inteligência Computacional Aplicada\r\n- Robótica\r\n- Processamento de Sinais	O LAMSC (Laboratório de Aprendizagem de Máquinas e Simulações Computacionais) tem como objetivo desenvolver atividades de iniciação científica e pesquisa aplicada nos campos de Aprendizagem de Máquinas, Inteligência Computacional Aplicada, Robótica e Processamento de Sinais, voltados para aplicações em automação, controle e identificação de sistemas.
18	VENCESLAU XAVIER DE LIMA FILHO	1544405	vxlfilho@gmail.com	 http://lattes.cnpq.br/0209565051697344	Indústria	LIAF - Laboratório de Inspeção e Análise de Falhas		Inspeção Industrial (termografia industrial, endoscopia industrial, partículas magnéticas, rugosidade superficial, ultrassonografia industrial, líquidos penetrantes) \r\nAnálise de falhas mecânicas\r\nDiagnóstico de degradação Tribológica\r\nAnálise química de materiais (fluorescência de raios-X portátil)	liaf.ifce@gmail.com	-	Engenharia de Controle e Automação; Engenharia Mecânica.	Inspeção industrial\r\nTribologia\r\nAnálise de Falhas	O Laboratório de Inspeção e Análise de Falhas do Departamento da Indústria do Campus Maracanaú possui experiência nas áreas de inspeção industrial, análise de falhas mecânicas e degradação tribológica de materiais, sendo suporte para as diversas disciplinas de graduação e pós graduação dos cursos do Campus Maracanaú. O LIAF possui também infraestrutura para atuar nas áreas de pesquisa acadêmica e aplicada, assim como na prestação de serviços tecnológicos e de consultoria para a indústria.    
11	Francisco Frederico dos Santos Matos	1666797	francisco.f.matos@gmail.com	http://lattes.cnpq.br/8204044573317813	Indústria	LTF - Laboratório de Máquinas Térmicas e de Fluxo	Turbinas Eólicas de Eixo Vertical, Turbinas Eólicas de Eixo Horizontal, Sistemas de Refrigeração por Absorção com Fonte Solar Térmica e Túneis de Vento.	O laboratório tem o objetivos de formalizar parcerias, onde possam ser contemplados os seguintes problemas:\r\n- Desenvolvimento de Pás de Turbinas Eólicas de Eixo Vertical e Eixo Horizontal;\r\n- Desenvolvimento de Turbinas Eólicas;\r\n- Desenvolvimento de Sistemas de Refrigeração por Absorção com Fonte Solar Térmica;\r\n- Desenvolvimento de Túneis de Vento para Calibração de Anemômetros.	francisco.f.matos@gmail.com	--	Engenharia Mecânica.	Energias Renováveis; Sistemas Térmicos; 	Laboratório cuja finalidade é propiciar aos alunos uma visualização prática do princípio de funcionamento das máquinas de fluxo e térmicas, entre elas as Turbinas Eólicas, Trocadores de Calor para Coleta de Energia Solar e etc. Além disso, contempla tanto disciplinas da graduação em Eng. Mecânica, como do mestrado em energias renováveis, a exemplo: Transf. de Calor e Mec. dos Fluidos Computacional, Máquinas Térmicas e de Fluxo, Refrigeração Industrial e Termodinâmica.\r\n
12	Wellington Albano	1548006	wellington@ifce.edu.br	http://lattes.cnpq.br/4309902638564502	Computação	LRC1 - Laboratório de Redes de Computadores 1					Ciência da Computação; Técnico em Informática; Técnico em Redes; Engenharia Ambiental e Sanitária.	Redes de Computadores	O laboratório de Redes de Computadores 1 é utilizado para atividades de ensino e pesquisa dos cursos do eixo de Computação: Técnico em Informática, Técnico em Redes de Computadores e Bacharelado em Ciência da Computação.
13	ROBERTO ALBUQUERQUE PONTES FILHO	0269968	roberto.consultorambiental@gmail.com	http://lattes.cnpq.br/9397867890436472	Química e Meio Ambiente	LT - Laboratório da Terra		Desenvolver projetos e implantação de áreas degradadas com resíduos orgânicos alternativos			Engenharia Ambiental e Sanitária.	Recuperação de áreas degradadas, especies arbóreas nativas, resíduos orgânicos alternativos para adubação e plantas oleaginosas para avaliação bioquímica	O laboratório é um telado agrícola que atua na área de pesquisa com especies arbóreas nativas, resíduos orgânicos para adubação, resíduos químicos de suplemento para soluções em recuperação de áreas degradadas e em parceria em estudos com plantas oleaginosas para avaliação bioquímica
14	SANDRO CESAR SILVEIRA JUCA	1473370	sandrojuca@ifce.edu.br	http://lattes.cnpq.br/0543232182796499	Computação	LAESE - Laboratório de Eletrônica e Sistemas Embarcados	Sistemas embarcados aplicados em monitoramento e controle IoT de geração de fontes renováveis de energia		laeseifce@hotmail.com	38786321	Ciência da Computação; Técnico em Informática; Técnico em Redes.	Eletrônica, sistemas embarcados, geração de fontes renováveis de Energia e robótica educacional. 	O Laboratório de Eletrônica e Sistemas Embarcados (LAESE) é ligado ao campus de Maracanaú e utilizado pelos cursos técnicos e superiores do eixo da computação do IFCE – Campus Maracanaú. Além disso, atua nas áreas de pesquisa de sistemas embarcados e de geração de fontes renováveis de energia junto ao PPGER e em parceria com o DEE da UFC, como também em educação profissional junto ao Mestrado ProfEPT. O LAESE é utilizado para ensino (graduação/técnico), pesquisa (graduação/mestrado) e inovação.
15	Francisco José dos Santos Oliveira	2635531	fjoliveira@ifce.edu.br	http://lattes.cnpq.br/3399911160895219	Indústria	LMAT - Laboratório de Materiais		Realização de ensaios mecânicos: Resistência à tração, Resistência à compressão, Dureza e Microdureza.\r\nRealização de tratamentos térmicos.\r\nRealização de metalografia com microscópio ótico.	fjoliveira7@gmail.com		Engenharia Mecânica; Engenharia de Controle e Automação; Engenharia Ambiental e Sanitária.	Propriedades Mecânicas e análises microestruturais dos Materiais	O laboratório de materiais do departamento da indústria do IFCE campus Maracanaú possui competência na área de caracterização microestrutural e determinação de propriedades mecânicas dos materiais, estando apto a dar suporte às disciplinas da área de materiais e processos de fabricação dos cursos deste departamento e da pós-graduação, assim como desenvolver pesquisa acadêmica e aplicada, contando com infraestrutura necessária para prestação de serviços e desenvolvimento tecnológico nestas áreas.
16	Adriano Holanda Pereira	1556624	prof.adrianohp@gmail.com	http://lattes.cnpq.br/9075415197983567	Indústria	LAMEP - Laboratório de Acionamento de Máquinas e Eletrônica de Potência			lamep.ifce@gmail.com		Engenharia Mecânica; Engenharia de Controle e Automação; Técnico em Automação Industrial.	Máquinas elétricas e eletrônica de potência	O laboratório de acionamentos de máquinas e eletrônica de potência- lamep, tem por objetivo auxiliar o aprendizado dos alunos através de ensaios relacionados a máquinas elétricas, partidas de motores e eletrônica de potência com materiais bastante didáticos. Através de ensaios práticos, compreender o funcionamento de máquinas elétricas e equipamentos de circuitos elétricos. 
17	Ajalmar Rego da Rocha Neto	1552727	ajalmar@gmail.com	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4700345J0	Computação	LabVICIA - Laboratório de Visão Computacional e Inteligência Artificial	Sistemas de otimização para alocação de recursos.	Desenvolvimento de sistemas inteligentes usando machine learnig, deep learning, visão computacional, técnicas de otimização, redes neurais artificiais.\r\nDesenvolvimento de sistemas inteligentes com ou sem dependência de API proprietárias (Watson, Tensor Flow, Hadoop, OpenCV, etc)\r\nDesenvolvimento de sistemas móveis (mobile), WEB e em nuvem; em geral, com grande volume de dados (big data).\r\n			Ciência da Computação; Técnico em Informática; Técnico em Redes.	Inteligência Artificial; Aprendizagem de Máquinas; Otimização; Deep Learning, Visão Computacional; Sistemas Inteligentes; Agentes Inteligentes 	O LabVICIA é um laboratório de pesquisa que visa desenvolver métodos, técnicas e sistemas na área de inteligência artificial. De uma forma mais específica, tem-se como foco as seguintes subáreas:  aprendizagem de máquinas, redes neurais artificiais, deep learning, otimização, visão computacional e agentes inteligentes. Além do desenvolvimento de novas técnicas na área de inteligência, no laboratório são também desenvolvidos sistemas WEB, mobile e em nuvem com grande volume de dados (big data).
19	Antonio Edson Oliveira Marques	1811881	edmarque@uol.com.br	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4703742P6	Química e Meio Ambiente	LMS - Laboratório de Mecânica dos Solos			laboratoriomecsolosifce@gmail.com		Engenharia Ambiental e Sanitária.	Caracterização e aplicação de solos e resíduos recicláveis para áreas degradadas, construção civil e pavimentação.	O Laboratório de Mecânica de Solos proporciona aos alunos do Instituto Federal do Ceará aulas práticas das disciplinas de Mecânica dos Solos, Geotecnia e materiais de construção, difundindo o conhecimento da área geotécnica, bem como auxiliando e contribuindo com o desenvolvimento de pesquisas sobre caracterização de solos e resíduos que possam ser reciclados para aplicação em áreas degradadas, obras de construção civil e pavimentação.
2	Pedro Henrique Augusto Medeiros	1811837	phamedeiros@ifce.edu.br	http://lattes.cnpq.br/4970091740105771	Química e Meio Ambiente	LH				33836370	Engenharia Ambiental e Sanitária.	Hidrologia e Recursos Hídricos	O Laboratório de Hidrologia (LABHIDRO) é vinculado ao Eixo de Química e Meio Ambiente do IFCE Campus Maracanaú , dando suporte aos cursos de bacharelado em Engenharia Ambiental e Sanitária e mestrado em Energias Renováveis. No LABHIDRO são desenvolvidas pesquisas científicas na área de recursos hídricos, com foco no monitoramento e na modelagem físico-matemática dos processos hidrológicos e sedimentológicos e na quantificação da disponibilidade hídrica no semiárido brasileiro.
5	FRANKLIN ARAGÃO GONDIM	1667576	ARAGAOFG@YAHOO.COM.BR	http://lattes.cnpq.br/4207075808724945	Química e Meio Ambiente	BIOQUÍMICA E FISIOLOGIA VEGETAL	APLICATIVO DE LIBRAS PARA O ENSINO DE QUÍMICA	PRESTA SERVIÇO AOS ALUNOS DO CURSO NAS ATIVIDADES QUE NECESSITAM DE COMPUTADOR PARA OS ALUNOS QUE NÃO TEM ACESSO: TCC; PROJETOS, ETC.			Licenciatura em Química.	BIOQUÍMICA E FISIOLOGIA VEGETAL, ECOFISIOLOGIA, ESTRESSES ABIÓTICOS EM PLANTAS, NUTRIÇÃO DE PLANTAS. 	O Laboratório de Bioquímica e Fisiologia Vegetal atua com ênfase na Ecofisiologia vegetal.  As espécies vegetais são nativas e /ou oleaginosas visto que o Laboratório está vinculado aos cursos de Graduação em Engenharia Ambiental e Sanitária e Mestrado em Energias Renováveis
20	MARIA CLEIDE DA SILVA BARROSO	1843014	ccleideifcemaraca@gmail.com	http://lattes.cnpq.br/6267402154400258	Química e Meio Ambiente	LAPP - Laboratório de Práticas Pedagógicas	A presente pesquisa pretende possibilitar a melhoria do ensino de química por meio da elaboração de sinais em libras vinculado à criação de um aplicativo de voz. No intuito de tratar da pesquisa em tela, destacamos como objetivo geral: Criar com recursos da programação de computadores e conhecimento em design gráfico, sinais de libras que possam ser utilizados em um aplicativo no ensino de química		lapp.ifce@gmail.com	38786348	Licenciatura em Química.	EDUCAÇÃO E ENSINO	A proposta do Laboratório de Práticas Pedagógicas - LAPP busca trazer para o centro do debate a temática da formação docente e a sua práxis. De acordo com esse pressuposto, e fundamentadas nos estudos e pesquisas de Aprendizagem, Ensinagem e Ensino de Ciências e Química, a proposta do LAPP visa, dentre outros aspectos, desenvolver a capacidade de reflexão acerca da realidade sócio educacional sob o ponto de vista de sua totalidade.
21	Francisco Nélio Costa Freitas	1467796	fneliocf@ifce.edu.br	http://lattes.cnpq.br/1834964619080647	Indústria	LMET - Laboratório de Metrologia Dimensional		Controle dimensional e engenharia reversa através de medições por coordenadas.	lmet.ifce@gmail.com	---	Engenharia Mecânica; Engenharia de Controle e Automação; Técnico em Automação Industrial.	Medição por coordenadas, engenharia reversa, processos de fabricação e engenharia de materiais.	O Laboratório de Metrologia Dimensional (LMET) do Campus Maracanaú do IFCE atua como suporte nas atividades de ensino do curso técnico em automação industrial, nos cursos de graduação em engenharia mecânica e engenharia de controle e automação e no curso de mestrado em energias renováveis, nas atividades de pesquisa nas áreas medição por coordenadas, engenharia reversa, processos de fabricação e engenharia de materiais e possui grande potencial na prestação de serviços de engenharia reversa.
26	Luiz Daniel S. Bezerra	1842966	daniel.bez.ifce@gmail.com	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4719381E3	Indústria	LPC  - Laboratório de Potência e Controle					Engenharia de Controle e Automação; Engenharia Mecânica; Técnico em Automação Industrial.	Projetos envolvendo eletrônica de potência; Inversores de potência; Conexão à rede elétrica de\nInversores; Fontes chaveadas; Conversores estáticos para processamento de energia elétrica;\nDesenvolvimento de controle de potência através de processamento digital de sinais (DSP); Projeto de\nmagnéticos e placas eletrônicas;	O LPC (Laboratório de Potência e Controle) possui a finalidade de auxiliar o aprimoramento na área\neducacional, através da participação de alunos e docentes, no estudo e desenvolvimento de projetos\naplicados na área de eletrônica de potência. Apresenta equipamentos, bancadas e material para a\nconcepção de circuitos eletrônicos nas diversas áreas que envolvem a conversão energética; o foco\nprincipal do laboratório está no desenvolvimento de inversores de potência (...)
27	Eugênio Barreto Sousa e Silva	1453960	eugenio@ifce.edu.br	http://lattes.cnpq.br/5492252517721394	Computação	LMD  - Laboratório de Mídias Digitais			eugenio@ifce.edu.br	85 3878-6321	Ciência da Computação; Técnico em Automação Industrial; Técnico em Informática.	Artes digitais e produção de conteúdo para educação à distância.	O laboratório de Mídias Digitais se propõe ser um espaço para o desenvolvimento de projetos de arte digital e conteúdo digital para educação.
30	daniel alencar barros tavares	1856850	daniel.alencar@ifce.edu.br	http://lattes.cnpq.br/0003687632164309	Computação	LI03 - Laboratório de Informática 03		Treinamento de informática básica para fábricas e empresas. 			Ciência da Computação.	ensino	Laboratório de ensino e para suporte aos alunos. 
32	BRUNO CESAR BARROSO SALGADO	1666904	brunocesar@ifce.edu.br	http://lattes.cnpq.br/0573677979512967	Química e Meio Ambiente	LTPA - Laboratório de Tecnologia em Processos Ambientais	Síntese de fotocatalisadores processos oxidativos avançados para conversão/degradação de substratos orgânicos	desenvolvimento de sistemas de degradação oxidativa de contaminantes orgânicos recalcitrantes\r\ndesenvolvimento e validação de métodos analíticos para quantificação de poluentes orgânicos e metais pesados	brunocesar@ifce.edu.br	8538786337	Engenharia Ambiental e Sanitária; Licenciatura em Química.	Processos Oxidativos Avançados (POAs) \r\nFotocatálise heterogênea na conversão seletiva de substratos orgânicos\r\nEstudo fitoquímico e farmacológico de plantas\r\nProdução de biodiesel/bioquerosene a partir de diferentes oleaginosas\r\nSíntese de adsorventes para remoção de contaminantes orgânicos e metais pesados\r\nDesenvolvimento e validação de métodos analíticos 	O Laboratório de Tecnologia em Processos Ambientais (LTPA) está vinculado ao Eixo de Química e Meio Ambiente do Campus Maracanaú, dando suporte a  atividades de ensino dos cursos de Engenharia Ambiental e Sanitária e Licenciatura em Química, dispondo de estrutura física para o desenvolvimento de pesquisa nos campos da química fina, catálise homogênea/heterogênea, processos adsortivos e química analítica, apoiando estudos realizados a nível de graduação e pós-graduação (Energias Renováveis-PPGER)
33	Antônio Olívio Silveira Britto Júnior	995006	olivio@ifce.edu.br	http://lattes.cnpq.br/3534055362942935	Química e Meio Ambiente	 LATACS - Laboratório de Tecnologia Alternativas de Convivência com o Semiárido	HIDROGEL DE FRALDAS DESCARTÁVEIS\r\n O hidrogel oriundo das fraldas descartáveis se torna uma alternativa excelente, visto que deixa o solo úmido proporcionando a absorção de nutrientes pelas plantas e possibilitando uma economia hídrica. \r\nBIODIGESTOR\r\nO subproduto final se torna uma alternativa excelente, visto que é rico em nutrientes para as plantas. \r\n	REUSO DE ÁGUA, COMPOSTAGEM E VERMICOMPOSTAGEM\r\n	gprsmifce@gmail.com	38786347	Engenharia Ambiental e Sanitária; Técnico em Meio Ambiente.	Desenvolvimento de Tecnologias Alternativas de Convivência com o Semiárido  	Laboratório de Tecnologias Alternativas de Convivência com o Semiárido atualmente está sendo desenvolvidos os seguintes projetos Biodigestor, Fossa Verde, Hidrogel de Fraldas Descartáveis, Compostagem dos Resíduos do Restaurante Acadêmico e o projeto Agrochuí em parceira com o Ministério da Saúde, que tem o foco na agroecologia e segurança alimentar capacitando grupos como estudantes, professores, agricultores, indígenas e pessoas que se interessem pela área.
34	ANTONIO BARBOSA DE SOUSA JUNIOR	2031223	antonio.barbosa@ifce.edu.br	http://lattes.cnpq.br/4260373627927424	Indústria	LPROT		Implementação de sistemas de controle.			Engenharia de Controle e Automação; Técnico em Automação Industrial.	robótica, sistemas de controle, acionamento de máquinas, eletrônica de potência.	Este laboratório visa o estudo e pesquisa de sistemas de controle aplicado à robótica móvel e de manipuladores, bem como o acionamento de máquinas elétricas como o motor de indução usando estratégias de controle de campo orientado.
\.


--
-- Name: dados_gerais_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.dados_gerais_id_seq', 34, true);


--
-- Data for Name: extensao; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.extensao (id_extensao, id_siape, titulo, fomento, alunos_tecnico, alunos_graduacao, alunos_pos) FROM stdin;
1	1612866	EMICRO - Escola de Microeletrônica do Nordeste	CAPES	0	10	0
2	1667576	PORTAL DO EDUCADOR-IFCE MARACANAÚ: UMA FERRAMENTA A SERVIÇO DO ENSINO	IFCE	0	1	0
3	1667576	USO DA QUÍMICA FORENSE COMO FERRAMENTA DE ENSINO DE QUÍMICA NAS ESCOLAS DE MARACANAÚ	IFCE	0	3	0
4	1674404	Corredores Digitais	SEM FOMENTO	3	6	0
5	1473370	Curso de extensão de robótica educacional como ferramenta de interdisciplinaridade	IFCE	0	3	0
6	1473370	 Inclusão digital, robótica e metareciclagem nas instituições de ensino	SEM FOMENTO	0	1	0
7	1843014	PORTAL DO EDUCADOR-IFCE MARACANAÚ: UMA FERRAMENTA A SERVIÇO DO ENSINO	IFCE	0	1	0
8	1843014	 I JOGOS PARA PESSOAS COM DEFICIÊNCIA/NAPNE - IFCE- CAMPUS MARACANAÚ	SEM FOMENTO	10	10	10
9	1666904	Produção de quitosana a partir dos resíduos da carcinicultura	SEM FOMENTO	0	1	0
10	1666904	Caracterização das Lagoas de Maracanaú quanto à concentração de metais pesados através do desenvolvimento de metodologia analítica envolvendo esferas de sílica modificada com pirrolidina	SEM FOMENTO	0	1	0
11	995006	Saneamento Ambiental: implantação de tecnologia ambiental de baixo custo em uma comunidade rural.	IFCE	0	1	0
12	995006	Saneamento Ambiental: implantação de tecnologia ambiental de baixo custo em uma comunidade rural.	SEM FOMENTO	0	1	0
\.


--
-- Name: extensao_id_extensao_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.extensao_id_extensao_seq', 12, true);


--
-- Data for Name: laboratorios_restantes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.laboratorios_restantes (id, siape, coordenador, eixo, laboratorio) FROM stdin;
1	1659388	Venicio Soares de Oliveira	Indústria	LSHIP - Laboratório de Sistemas Hidráulicos e Pneumáticos
2	1842966	Luís Daniel Santos Bezerra	Indústria	LEE - Laboratório de Eletroeletrônica
12	1674316	Cynara Reis Aguiar	Química e Meio Ambiente	LAQAMB - Laboratório de Química Analítica e Microbiologia Ambiental
14	6269422	Aristênio de Oliveira	Química e Meio Ambiente	Laboratório de Química Orgânica e Inorgânica
16	1795291	Daniel Silva Ferreira	Computação	Laboratório de Informática 01
17	1886204	Thiago Alves Rocha	Computação	Laboratório de Informática 02
19	1958500	Adriano Tavares de Freitas	Computação	LHARD - Laboratório de Hardware
\.


--
-- Name: laboratorios_restantes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.laboratorios_restantes_id_seq', 20, true);


--
-- Data for Name: pedidos_alteracao; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pedidos_alteracao (id_siape_antigo, nome_antigo, id_novo_siape, novo_coordenador, nome_lab, nova_sigla) FROM stdin;
2031223	ANTONIO BARBOSA DE SOUSA JUNIOR	2031223	antonio barbosa de souza júnior		
\.


--
-- Data for Name: pesos_avaliativos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pesos_avaliativos (id_peso, nome_peso, sigla_peso, valor_peso) FROM stdin;
1	bolsistas 	bol	3
2	voluntarios	vol	2
3	disciplinas	dis	3
4	professores	prof	1
5	publicações per	per	3
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
2	1612866	Corneli Gomes Furtado Júnior	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4779447J6
3	1612866	Jonas Rodrigues Vieira dos Santos	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K8711160J3
4	1641803	Samuel Vieira Dias	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4278358P8
5	1641803	Venicio Soares de Oliveira	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4137475J4
11	2706748	José Ciro dos Santos	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4484070Y7
12	1442729	Luiz Daniel Santos Bezerra	http://lattes.cnpq.br/3261052136129353
13	1442729	Pedro Pedrosa Rebouças Filho	http://lattes.cnpq.br/4347965302097614
14	1442729	Francisco Nélio Costa Freitas	http://lattes.cnpq.br/1834964619080647
15	1442729	Antônio Barbosa de Souza Júnior	http://lattes.cnpq.br/4260373627927424
6	1667576	CAROLINE DE GOES SAMPAIO	http://lattes.cnpq.br/9870299456044346
7	1667576	MARIA CLEIDE DA SILVA BARROSO	http://lattes.cnpq.br/6267402154400258
10	1667576	SILVANY BASTOS SANTIAGO	http://lattes.cnpq.br/8128196166798668
9	1667576	NATALIA PARENTE DE LIMA VALENTE	http://lattes.cnpq.br/5054210419500350
8	1667576	FRANCISCA HELENA DE OLIVEIRA HOLANDA 	http://lattes.cnpq.br/1127779738600648
16	1548006	Wellington Albano	http://lattes.cnpq.br/4309902638564502
17	1548006	Jean Marcelo S. Maciel	http://lattes.cnpq.br/8688702796839717
18	1548006	Inácio Alves	http://lattes.cnpq.br/1022303386341552
19	0269968	Franklin Aragão Gondim	http://lattes.cnpq.br/4207075808724945
20	2635531	Venceslau Xavier de Lima Filho	http://lattes.cnpq.br/0209565051697344
21	1556624	Celso Rogério Schmidlin Júnior	http://lattes.cnpq.br/9279561215102176
22	1552727	Amauri de Sousa Junior	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4238049P3
23	1552727	Daniel Alencar Barros Tavares	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4290659J1
24	1544405	Rodrigo Freitas Guimarães	http://lattes.cnpq.br/1434906331576002
25	1811881	Erika da Justa Teixeira Rocha	http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4734401P5
26	1843014	MARIA CLEIDE DA SILVA BARROSO	http://lattes.cnpq.br/6267402154400258
27	1843014	SILVANY BASTOS SANTIAGO	http://lattes.cnpq.br/8128196166798668
28	1843014	CAROLINE DE GOES SAMPAIO	http://lattes.cnpq.br/9870299456044346
29	1843014	FRANCISCA HELENA DE OLIVEIRA HOLANDA	http://lattes.cnpq.br/1127779738600648
30	1843014	NATALIA PARENTE DE LIMA VALENTE	http://lattes.cnpq.br/5054210419500350
31	1467796	Rodrigo Freitas Guimarães	http://lattes.cnpq.br/1434906331576002
32	1467796	Venceslau Xavier de Lima Filho	http://lattes.cnpq.br/0209565051697344
33	1467796	Francisco José dos Santos Oliveira	http://lattes.cnpq.br/3399911160895219
34	1467796	Venício Soares de Oliveira	http://lattes.cnpq.br/3263289316174386
35	1666904	JOÃO CARLOS DA COSTA ASSUNÇÃO	http://lattes.cnpq.br/8873683560219910
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
1	1811837	Reuso de sedimento assoreado em açudes	CNPq	0	3	1
2	1811837	Sensoriamento remoto como estratégia para a gestão de águas no semiárido	CAPES	0	2	1
3	1811837	Disponíbilidade hídrica de pequenos açudes no semiárido cearense	IFCE	0	3	1
4	1811837	Gestão de pequenos açudes no semiárido	CNPq	0	2	2
9	1641803	Desenvolvimento de um seguidor solar microcontrolado baseado em visão omnidirecional - Edital Nº 05/2014-PRPI  PROINFRA/IFCE	IFCE	0	1	0
10	1641803	Dispositivo mecânico, microcontrolado e computacional para área de robótica pedagógica baseado na norma IEC 61131 - EDITAL Nº 03/2016 - PRPI	IFCE	0	1	0
11	1641803	Projeto de um seguidor solar microcontrolado baseado em visão omnidirecional - EDITAL Nº 01/2016 - PRPI	IFCE	0	1	0
12	1641803	Desenvolvimento de uma bancada educacional para área de robótica pedagógica baseado em FPGA e na norma IEC 61131 - Edital PIBIT Nº 08/2016 - PRPI	IFCE	0	1	0
6	1612866	Uma abordagem para geração de tráfego para avaliação de redes intra-chip	FUNCAP	0	1	0
5	1612866	Repositório de Objetos Educacionais para Rede EPT - ProEdu - Fase 2	SETEC-MEC	0	10	0
7	1612866	Geração de traços de comunicação cientes de dependências de pacotes através da análise de simulações de aplicações MPSoC	FUNCAP	0	1	0
8	1612866	 Implementação de um algoritmo de processamento de imagem embarcado em FPGA para segmentação de nozes de castanha de caju.	Sem Fomento	0	4	0
13	1667576	Remoção de metais pesados utilizando resíduos de alimentos	IFCE	0	1	0
17	1667576	AS EXPECTATIVAS DA AVALIAÇÃO DE SISTEMAS EDUCACIONAIS E A CATEGORIA QUALIDADE: UMA ANÁLISE DO CASO BRASILEIRO	IFCE	0	1	0
16	1667576	A UTILIZAÇÃO DE APLICATIVO DE LIBRAS NO ENSINO DE QUÍMICA	IFCE	0	1	0
15	1667576	ENSINO DE QUÍMICA POR MEIO DA LIBRAS: A UTILIZAÇÃO DE SOFTWARE EDUCACIONAL	IFCE	0	1	0
14	1667576	SISTEMAS DE AVALIAÇÕES NO BRASIL: UM ESTUDO DAS POLÍTICAS EDUCACIONAIS	IFCE	0	1	1
18	1674404	Repositório de Objetos Educacionais para Rede EPT - ProEdu - Fase 2	Secretaria de Tecnologia	0	10	0
19	1666797	Desenvolvimento de Turbinas Eólicas de Eixo Vertical	CNPq	0	1	1
20	1666797	Desenvolvimento de Túnel de Vento para Calibração de Anemômetros	CNPq	0	1	1
21	1666797	Sistema de Refrigeração por Absorção com Fonte Solar-Térmica	CNPq	0	1	1
22	1666797	Desenvolvimento de Turbina Eólica de Eixo Vertical com Suportes Inclinados Geradores de Torque	Sem Fomento	0	1	1
23	1666797	Desenvolvimento de Turbina Eólica de Eixo Horizontal	Sem Fomento	0	0	1
24	1548006	Gerenciamento de dispositivos em redes sem fio domésticas definidas por software	IFCE	0	1	0
25	0269968	ANÁLISE DE VIABILIDADE NO APROVEITAMENTO DE RESÍDUOS DE SUPLEMENTO ANIMAL COMO INSUMO PARA RECUPERAÇÃO DE SOLOS  DEGRADADOS	Sem Fomento	0	2	0
26	1473370	MONITORAMENTO E CONTROLE IOT DE CONSUMO DE CARGAS E DE MICROGERAÇÃO DE ENERGIA ELÉTRICA NO IFCE - CAMPUS MARACANAÚ	IFCE	0	1	0
27	1473370	SISTEMA EMBARCADO IOT APLICADO EM CLOUD COMPUTING PARA GERAÇÃO DESCENTRALIZADA DE ENERGIA	IFCE	0	1	0
28	1473370	ELABORAÇÂO DE FERRAMENTAS E REDES COLABORATIVAS PARA O ENSINO DE ROBÓTICA E METARECICLAGEM	IFCE	0	1	0
29	1473370	SISTEMAS EMBARCADOS LINUX PARA CONTROLE E MONITORAMENTO EM NUVEM DE PLANTAS DE MICROGERAÇÃO FOTOVOLTAICA	IFCE	0	1	0
30	1473370	SISTEMAS EMBARCADOS PARA CONTROLE E MONITORAMENTO DE MICROGERAÇÃO FOTOVOLTAICA CONECTADA À REDE ELÉTRICA	IFCE	0	2	0
31	2635531	Caracterização da Junta Soldada com Aço Inoxidável Supermartensítico	Sem Fomento	0	1	0
32	1552727	Sistema Inteligente de Monitoramento de Faixas Automáticas	EMBRAPII	0	6	3
33	1552727	Sistema Inteligente Direcionador de Conteúdo e Publicidade	EMBRAPII	0	6	4
34	1552727	Sistema Inteligente para Detecção de Próxima Funcionalidade e Fluxos de Trabalhos em Software Contábil com Múltiplas Funcionalidades	EMBRAPII	0	2	5
35	1552727	 Smart&Green: Um Arcabouço de Internet das Coisas para Agricultura Inteligente	CNPq	0	2	2
36	1552727	Redes Neurais RBF aplicadas ao Diagnóstico de Patologias da Coluna Vertebral	IFCE	0	1	0
37	1811881	ESTUDO INOVADOR DO APROVEITAMENTO DE RESÍDUOS DE CERÂMICA VERMELHA NA PRODUÇÃO DE TIJOLOS DE BAIXO IMPACTO AMBIENTAL	IFCE	0	2	0
38	1811881	CONSTRUÇÃO DE UM PROTÓTIPO DE CASA SUSTENTÁVEL COM TIJOLOS A BASE DE RESÍDUOS DE CERÂMICA VERMELHA E AVALIAÇÃO DO SEU CONFORTO TÉRMICO	IFCE	0	3	0
39	1811881	ESTUDO DA APLICABILIDADE DE RESÍDUOS DE CONSTRUÇÃO CIVIL RECICLADOS COMO AGREGADO PARA O USO EM CAMADAS BASES DE PAVIMENTOS	Sem Fomento	0	1	0
40	1843014	 SISTEMAS DE AVALIAÇÕES NO BRASIL: UM ESTUDO DAS POLÍTICAS EDUCACIONAIS	IFCE	0	1	0
41	1843014	Programa Institucional de Bolsas de Iniciação à Docência	CAPES	0	10	0
42	1843014	ENSINO DE QUÍMICA POR MEIO DA LIBRAS: A UTILIZAÇÃO DE SOFTWARE EDUCACIONAL	IFCE	0	1	0
43	1843014	AS EXPECTATIVAS DA AVALIAÇÃO DE SISTEMAS EDUCACIONAIS E A CATEGORIA QUALIDADE: UMA ANÁLISE DO CASO BRASILEIRO	IFCE	0	1	0
44	1843014	 I JOGOS PARA PESSOAS COM DEFICIÊNCIA/NAPNE - IFCE- CAMPUS MARACANAÚ	Sem Fomento	10	10	10
45	1467796	AVALIAÇÃO DA RECRISTALIZAÇÃO E SUA INFLUÊNCIA NO DESEMPENHO DE UM AÇO ELÉTRICO DE GRÃO NÃO ORIENTADO (GNO)	IFCE	0	1	1
46	1467796	AVALIAÇÃO DAS ALTERAÇÕES MICROESTRUTURAIS DE UM AÇO ELÉTRICO DE GRÃO NÃO ORIENTADO (GNO)	CNPq	0	1	1
47	1467796	DESENVOLVIMENTO DE MÉTODO COMPUTACIONAL BASEADO EM MOSAICO APLICADO À FOTOMICROGRAFIAS DE METAIS OBTIDAS POR MICROSCOPIA ÓPTICA	IFCE	0	1	1
48	1467796	CONSTRUÇÃO DE MOSAICO APLICADO À MICROSCOPIA ÓPTICA	CNPq	0	1	1
49	1467796	CONSTRUÇÃO DE MOSAICO APLICADO À MICROSCOPIA ÓPTICA	CNPq	0	1	1
50	1467796	Engenharia reversa de componentes mecânicos e eficiência energética em processos de manufatura	Sem Fomento	0	1	1
51	1467796	Engenharia reversa de componentes mecânicos através de medições por coordenadas	Sem Fomento	0	1	1
52	1467796	Caracterização microestrutural de silício policristalino utilizado em células de painéis fotovoltáicos	Sem Fomento	0	1	1
53	1467796	Parâmetros de processo e eficiência energética em processos de fabricação mecânica por usinagem	Sem Fomento	0	1	1
54	1842966	Desenvolvimento de uma plataforma de ensaio de inversor monofásico, grid-tie, para avaliação\nde aderência à normatização da ANEEL na produção individual de energia elétrica.	CNPq	0	3	0
55	1842966	Projeto de Geração Distribuída Solar-Fotovoltaica no Campus de Maracanaú	IFCE	1	0	0
56	1842966	Projeto de Geração Distribuída Solar-Fotovoltaica no Campus de Maracanaú	IFCE	1	0	0
57	1842966	Desenvolvimento de uma plataforma de inversor monofásico, grid-tie, atendendo a\nnormatização NT010 da COELCE para produção individual de energia elétrica.	IFCE	0	1	0
58	1842966	Gerador de Energia Plug and Play - Módulo CA - para Redes Inteligentes (Smart Grid)	IFCE/EMBRAPII/SEVENIA	0	1	0
59	1842966	Plataforma de Inversor Monofásico para Geração Distribuída	FUNCAP/INOVAFIT/SDG	0	1	0
65	1842966	Desenvolvimento de uma plataforma de ensaio de inversor monofásico, grid-tie, para avaliação\nde aderência à normatização da ANEEL na produção individual de energia elétrica.	Sem Fomento	0	1	0
66	1842966	CONVERSOR CC-CC ISOLADO EM ALTA FREQÜÊNCIA PARA APLICAÇÕES FOTO-\nVOLTAICAS	Sem Fomento	0	1	0
68	1842966	ESTUDO DE INTERFACE ELETRÔNICA PARA GERENCIAMENTO DE MOTOR A\nCOMBUSTÃO INTERNA	Sem Fomento	0	1	0
69	1842966	PROPOSTA DE CONVERSOR ESTÁTICO CC-CC RESSONANTE, AUTO-OSCILANTE\nPUSH-PULL ALIMENTADO EM CORRENTE PARA AQUECIMENTO INDUTIVO	Sem Fomento	0	1	0
70	1842966	CONVERSOR ESTÁTICO DE TOPOLOGIA CÙK PARA ACIONAMENTO DE LEDS EM\nAPLICAÇÕES AUTOMOTIVAS	Sem Fomento	0	1	0
71	1842966	PLATAFORMA MÓVEL PARA RASTREAMENTO SOLAR FOTOFOLTAICO	Sem Fomento	0	1	0
72	1666904	Esferas de quitosana modificadas com produtos naturais para a adsorção e pré-concentração de metais tóxicos de soluções aquosa	CNPq	0	1	0
73	1666904	4.\tBIOQUEROSE A PARTIR DA DESTILAÇÃO DO BIODIESEL DAS AMÊNDOAS DE Syagrus cearenses OBTIDO POR TRANSESTERIFICAÇÃO IN SITU MEDIADA POR MICROONDAS	FUNCAP	0	0	1
74	1666904	APLICAÇÃO DA FOTOCATÁLISE HETEROGÊNEA NA OXIDAÇÃO SELETIVA DO GLICEROL PARA PRODUTOS COMERCIALMENTE MAIS VALIOSOS	CAPES	0	1	1
75	1666904	DESENVOLVIMENTO DE SISTEMAS DE TRATAMENTO DESCENTRALIZADOS PARA VIABILIZAÇÃO DE FONTES DE ÁGUA SUBTERRÂNEA E SUPERFICIAL NO IFCE-MARACANAÚ	IFCE	0	1	0
76	1666904	1.\tESTUDO FITOQUÍMICA E DAS PROPRIEDADES FARMACOLÓGICAS DE PLANTAS DO CEARÁ	IFCE	0	1	0
77	1666904	SÍNTESE DE ESFERAS DE SÍLICA MODIFICADAS COM PIRROLIDINA -PARA ADSORÇÃO DE METAIS	Sem Fomento	0	1	0
78	995006	REAPROVEITAMENTO DE HIDROGEL PARA UTILIZAÇÃO AGRICULTURA FAMILIAR	IFCE	0	1	0
79	995006	REAPROVEITAMENTO DE RESÍDUOS SÓLIDOS PARA A PRODUÇÃO  DE GÁS EM UMA INSTITUIÇÃO DE ENSINO PÚBLICO	IFCE	0	1	0
80	995006	TRATAMENTO AERÓBIO DE RESÍDUOS SÓLIDOS ORGÂNICOS ATRAVÉS DA COMPOSTAGEM E COMPOSTAGEM ACELERADA.	IFCE	1	0	0
81	995006	PROJETO DE REÚSO DE ÁGUA DE BEBEDOUROS COLETIVOS, CONDICIONADORES DE AR E DESTILADORES DE UMA INSTITUIÇÃO PÚBLICA DE ENSINO.	IFCE	1	0	0
82	995006	Saneamento Ambiental: implantação de  tecnologia ambiental  de baixo em uma Instituição de ensino	IFCE	0	1	0
83	995006	POTENCIAL   DE   REÚSO   DE ÁGUAS   RESIDUÁRIASPARA   IRRIGAÇÃONO ENFRENTAMENTO DA SECA NO INTERIOR DO CEARÁ	Sem Fomento	0	1	0
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

