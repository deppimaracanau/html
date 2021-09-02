CREATE TABLE laboratorio
(
  id serial NOT NULL,
  nome VARCHAR(200) NOT NULL,
  siape character varying(20) NOT NULL,
  email character varying(70) NOT NULL,
  lattes_url character varying(200) NOT NULL,
  eixo character varying(70) NOT NULL,
  laboratorio character varying(200) NOT NULL,
  qtd_pe character varying(100) NOT NULL,
  qtd_v character varying(100) NOT NULL,
  qtd_disci character varying(100) NOT NULL,
  desc_produto varchar(400) NOT NULL,
  qtd_congresso character varying(100) NOT NULL,
  qtd_tcc character varying(100) NOT NULL,
  CONSTRAINT laboratorio_pkey PRIMARY KEY (siape)
);

CREATE TABLE projetos (
	id_pesquisa serial NOT NULL,
	id_siape varchar(100) NOT NULL,
	nome_projeto varchar(200) NULL,
	fomento varchar(100) NOT NULL,
	qtd_graduacao varchar(100) NOT NULL,
	qtd_pros varchar(10) NOT NULL,
	resumo varchar(400) NOT NULL,
  	CONSTRAINT projetos_pkey PRIMARY KEY(id_pesquisa)
);

CREATE TABLE professores (
	id_professor serial NOT NULL,
	id_siape varchar(100) NOT NULL,
	nome VARCHAR(200)  NOT NULL,
	lattes_url character varying(200) NOT NULL,
	CONSTRAINT professores_pkey PRIMARY KEY(id_professor)
);


CREATE TABLE periodicos (
	id_periodico serial NOT NULL,
	id_siape varchar(100) NOT NULL,
	titulo varchar(100) NOT NULL,
	periodico varchar(100) NOT NULL,
	url_pub character varying(200) NOT NULL,
	CONSTRAINT periodicos_pkey PRIMARY KEY(id_periodico)
);

CREATE TABLE extensao (
	id_extensao serial NOT NULL,
	id_siape varchar(100) NOT NULL,
	titulo varchar(100) NOT NULL,
	fomento varchar(100) NOT NULL,
	alunosGraduacao varchar(100) NOT NULL,
	alunosPos varchar(100) NOT NULL,
	resumo varchar(400) NOT NULL,
	CONSTRAINT extensao_pkey PRIMARY KEY(id_extensao)
);


	

