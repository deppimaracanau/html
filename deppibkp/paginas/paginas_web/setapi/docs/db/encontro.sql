-- Table: encontro

-- DROP TABLE encontro;

CREATE TABLE encontro
(
  id_encontro serial NOT NULL,
  nome_encontro character varying(254) NOT NULL,
  apelido_encontro character varying(50) NOT NULL,
  data_inicio date NOT NULL,
  data_fim date NOT NULL,
  ativo boolean NOT NULL DEFAULT false,
  periodo_submissao_inicio date NOT NULL,
  periodo_submissao_fim date NOT NULL,
  certificados_liberados boolean NOT NULL DEFAULT false,
  certificados_template_participante_encontro text NOT NULL DEFAULT 'Certificamos que %s participou do(a) %s durante a I Semana de Integração Científica (SIC) do IFCE campus de Maracanaú no período de 15 a 19 de dezembro de 2014.'::text,
  certificados_template_palestrante_evento text NOT NULL DEFAULT 'Certificamos que %s apresentou o(a) %s: %s no(a) %s durante a I Semana de Integração Científica (SIC) do IFCE campus de Maracanaú no período de 15 a 19 de dezembro de 2014.'::text,
  certificados_template_participante_evento text NOT NULL DEFAULT 'Certificamos que %s participou do(a) %s: %s no(a) %s durante a I Semana de Integração Científica (SIC) do IFCE campus de Maracanaú no período de 15 a 19 de dezembro de 2014.'::text,
  id_municipio integer NOT NULL DEFAULT 101, -- Padrao Maracanau
  id_tipo_horario integer NOT NULL DEFAULT 1,
  CONSTRAINT encontro_pk PRIMARY KEY (id_encontro),
  CONSTRAINT encontro_id_tipo_horario_fkey FOREIGN KEY (id_tipo_horario)
      REFERENCES tipo_horario (id_tipo_horario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);

COMMENT ON COLUMN encontro.id_municipio IS 'Padrao Maracanau';
