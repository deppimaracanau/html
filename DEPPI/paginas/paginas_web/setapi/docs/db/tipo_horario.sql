CREATE TABLE tipo_horario
(
  id_tipo_horario serial NOT NULL,
  intervalo_minutos integer NOT NULL,
  horario_inicial time without time zone NOT NULL,
  horario_final time without time zone NOT NULL,
  CONSTRAINT tipo_horario_pkey PRIMARY KEY (id_tipo_horario)
)
WITH (
  OIDS=FALSE
);

INSERT INTO tipo_horario(
            id_tipo_horario, intervalo_minutos, horario_inicial, horario_final)
    VALUES (1, 60, '07:00:00', '17:00:00');
