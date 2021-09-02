create table dados_gerais(
	nome varchar(100) NOT NULL,
	siape int NOT NULL PRIMARY KEY,
	email varchar(255) NOT NULL,
	lattes_url varchar(255) NOT NULL,
	eixo varchar(255) NOT NULL,
	laboratorio varchar(255) NOT NULL,
	descricao_produto varchar(255) NOT NULL, 
	descricao_servicos varchar(255) NOT NULL, 
	email_lab varchar(255) NOT NULL, 
	telefone_lab int NOT NULL, 
	cursos varchar(255) NOT NULL, 
	areas varchar(255) NOT NULL, 
	apresentacao varchar(255) NOT NULL,
	criado TIMESTAMP NOT NULL,
    lst_login TIMESTAMP
);