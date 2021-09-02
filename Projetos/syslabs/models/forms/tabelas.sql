CREATE TABLE dados_gerais (
  id serial NOT NULL,
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
  apresentacao character varying(500) NOT NULL,
  CONSTRAINT dados_gerais_pkey PRIMARY KEY (siape)
)

CREATE TABLE extensao (
  id_extensao serial NOT NULL,
  id_siape character varying(100) NOT NULL,
  titulo character varying(200) NOT NULL,
  fomento character varying(100) NOT NULL,
  alunos_tecnico character varying(100) NOT NULL,
  alunos_graduacao character varying(100) NOT NULL,
  alunos_pos character varying(100) NOT NULL,
  CONSTRAINT extensao_pkey PRIMARY KEY (id_extensao)
)

CREATE TABLE pedidos_alteracao (
  id_siape_antigo character varying(100) NOT NULL,
  nome_antigo character varying(100) NOT NULL,
  id_novo_siape character varying(100) NOT NULL,
  novo_coordenador character varying(100) NOT NULL,
  nome_lab character varying(100) NOT NULL,
  nova_sigla character varying(100) NOT NULL,
  CONSTRAINT pedidos_alteracao_pkey PRIMARY KEY (id_siape_antigo)
)

CREATE TABLE professores (
  id serial NOT NULL,
  id_siape character varying(100) NOT NULL,
  nome character varying(100) NOT NULL,
  lattes_url character varying(100) NOT NULL,
  CONSTRAINT professores_pkey PRIMARY KEY (id)
)

CREATE TABLE projetos (
  id_pesquisa serial NOT NULL,
  id_siape character varying(100) NOT NULL,
  nome_projeto character varying(200),
  fomento character varying(100) NOT NULL,
  alunos_tecnico character varying(100) NOT NULL,
  alunos_graduacao character varying(100) NOT NULL,
  alunos_pos character varying(10) NOT NULL,
  CONSTRAINT projetos_pkey PRIMARY KEY (id_pesquisa)
)

CREATE TABLE quantidades (
  id serial NOT NULL,
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
  qtd_extensao_semfomento character varying(100) NOT NULL,
  CONSTRAINT quantidades_pkey PRIMARY KEY (id)
)


CREATE TABLE laboratorios_restantes
(
  id serial NOT NULL,
  siape character varying(20) NOT NULL,
  coordenador character varying(200) NOT NULL,
  eixo character varying(70) NOT NULL,
  laboratorio character varying(200) NOT NULL,
  CONSTRAINT laboratorios_restantes_pkey PRIMARY KEY (siape)
)
