-- Table: evento_participacao

DROP TABLE evento_participacao;

CREATE TABLE evento_participacao
(
  id_pessoa integer NOT NULL,
  id_evento_realizacao integer NOT NULL,
  evento serial NOT NULL,
  CONSTRAINT evento_participacao_pkey PRIMARY KEY (evento),
  CONSTRAINT evento_participacao_id_evento_realizacao_fkey FOREIGN KEY (id_evento_realizacao)
      REFERENCES evento_realizacao (evento) MATCH SIMPLE
      ON UPDATE RESTRICT ON DELETE RESTRICT,
  CONSTRAINT pessoa_evento_participacao_fk FOREIGN KEY (id_pessoa)
      REFERENCES pessoa (id_pessoa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
