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


--
-- Name: funcgerarsenha(character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.funcgerarsenha(codemail character varying) RETURNS character varying
    LANGUAGE plpgsql
    AS $$

/*

Criador: Siqueira, Robson.

Data: 05/08/2011.

DESCRIÇÃO: 

  A partir de um email válido, gera uma senha de 10 caracteres com letras maiúsculas e números.

  Se o email estiver incorreto, gera uma exceção.

  A senha já é armazenada no BD com criptografia MD5.

*/

DECLARE

  codPessoa INTEGER;

  codSenha VARCHAR(100);

BEGIN

  SELECT id_pessoa INTO codPessoa

  FROM pessoa

  WHERE email = codEmail;

  IF NOT FOUND THEN

    RAISE EXCEPTION 'Email Inválido';

  END IF;

  codSenha = (((random() * (100000000000000)::double precision))::bigint)::character varying;

  SELECT UPPER(md5(codSenha)::varchar(10)) INTO codSenha;

  UPDATE pessoa 

  SET senha = md5(codSenha)

  WHERE id_pessoa = codPessoa;

  RETURN codSenha;

END;

$$;


ALTER FUNCTION public.funcgerarsenha(codemail character varying) OWNER TO postgres;

--
-- Name: funcvalidaevento(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.funcvalidaevento() RETURNS trigger
    LANGUAGE plpgsql
    AS $$

BEGIN

IF NEW.validada = 'T' THEN

    NEW.data_validacao = now();

  END IF;

  RETURN NEW;

END;

$$;


ALTER FUNCTION public.funcvalidaevento() OWNER TO postgres;

--
-- Name: funcvalidausuario(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.funcvalidausuario() RETURNS trigger
    LANGUAGE plpgsql
    AS $$

BEGIN

IF NEW.cadastro_validado = 'T' THEN

--    SELECT now() INTO NEW.data_validacao_cadastro;

    NEW.data_validacao_cadastro = now();

  END IF;

  RETURN NEW;

END;

$$;


ALTER FUNCTION public.funcvalidausuario() OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: caravana; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.caravana (
    id_caravana integer NOT NULL,
    nome_caravana character varying(255) NOT NULL,
    apelido_caravana character varying(20) NOT NULL,
    id_municipio integer NOT NULL,
    id_instituicao integer,
    criador integer NOT NULL,
    id_conferencia integer NOT NULL,
    validada boolean DEFAULT false NOT NULL
);


ALTER TABLE public.caravana OWNER TO postgres;

--
-- Name: caravana_id_caravana_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.caravana_id_caravana_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.caravana_id_caravana_seq OWNER TO postgres;

--
-- Name: caravana_id_caravana_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.caravana_id_caravana_seq OWNED BY public.caravana.id_caravana;


--
-- Name: conferencia_participante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.conferencia_participante (
    id_conferencia integer NOT NULL,
    id_pessoa integer NOT NULL,
    id_instituicao integer,
    id_municipio integer NOT NULL,
    id_caravana integer,
    id_tipo_usuario integer DEFAULT 3 NOT NULL,
    validado boolean DEFAULT false NOT NULL,
    data_validacao timestamp without time zone,
    data_cadastro timestamp without time zone DEFAULT now() NOT NULL,
    confirmado boolean DEFAULT false NOT NULL,
    data_confirmacao timestamp without time zone
);


ALTER TABLE public.conferencia_participante OWNER TO postgres;

--
-- Name: municipio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.municipio (
    id_municipio integer NOT NULL,
    nome_municipio character varying(40) NOT NULL,
    id_estado integer NOT NULL
);


ALTER TABLE public.municipio OWNER TO postgres;

--
-- Name: comsolid6_inscricoes_por_municipio; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.comsolid6_inscricoes_por_municipio AS
 SELECT m.nome_municipio,
    count(*) AS count
   FROM public.conferencia_participante ep,
    public.municipio m
  WHERE ((ep.id_conferencia = 4) AND (ep.id_municipio = m.id_municipio))
  GROUP BY m.nome_municipio
  ORDER BY m.nome_municipio;


ALTER TABLE public.comsolid6_inscricoes_por_municipio OWNER TO postgres;

--
-- Name: conferencia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.conferencia (
    id_conferencia integer NOT NULL,
    data_inicio date NOT NULL,
    data_fim date NOT NULL,
    encerrado boolean DEFAULT false NOT NULL,
    nome_conferencia character varying(300) NOT NULL,
    sigla character varying(10),
    descricao_certificado text DEFAULT 'Certificamos que %s participou da V Semana de Integração Científica (SIC) do IFCE Campus Maracanaú, que foi ocorreu no período de 15 a 19 de novembro de 2018.'::text NOT NULL
);


ALTER TABLE public.conferencia OWNER TO postgres;

--
-- Name: conferencia_encontro; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.conferencia_encontro (
    id_conferencia_encontro integer NOT NULL,
    id_encontro integer NOT NULL,
    id_conferencia integer NOT NULL,
    data_inicio date NOT NULL,
    data_fim date NOT NULL,
    ativo boolean DEFAULT false NOT NULL,
    periodo_submissao_inicio date NOT NULL,
    periodo_submissao_fim date NOT NULL,
    certificados_liberados boolean DEFAULT false NOT NULL,
    certificados_template_palestrante_evento text DEFAULT 'Certificamos que %s apresentou o(a) %s: %s no(a) %s durante a V Semana de Integração Científica (SIC) do IFCE Campus Maracanaú no período de 15 a 19 de dezembro de 2018.'::text NOT NULL,
    certificados_template_participante_encontro text DEFAULT 'Certificamos que %s participou do(a) %s durante a V Semana de Integração Científica (SIC) do IFCE Campus Maracanaú no período de 15 a 19 de dezembro de 2018.'::text NOT NULL,
    id_tipo_horario integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.conferencia_encontro OWNER TO postgres;

--
-- Name: conferencia_encontro_id_conferencia_encontro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.conferencia_encontro_id_conferencia_encontro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.conferencia_encontro_id_conferencia_encontro_seq OWNER TO postgres;

--
-- Name: conferencia_encontro_id_conferencia_encontro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.conferencia_encontro_id_conferencia_encontro_seq OWNED BY public.conferencia_encontro.id_conferencia_encontro;


--
-- Name: conferencia_id_conferencia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.conferencia_id_conferencia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.conferencia_id_conferencia_seq OWNER TO postgres;

--
-- Name: conferencia_id_conferencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.conferencia_id_conferencia_seq OWNED BY public.conferencia.id_conferencia;


--
-- Name: dh; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.dh (
    id integer NOT NULL,
    page character varying(255) NOT NULL,
    counter bigint DEFAULT 0 NOT NULL,
    conference integer NOT NULL
);


ALTER TABLE public.dh OWNER TO postgres;

--
-- Name: dh_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.dh_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dh_id_seq OWNER TO postgres;

--
-- Name: dh_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.dh_id_seq OWNED BY public.dh.id;


--
-- Name: dificuldade_evento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.dificuldade_evento (
    id_dificuldade_evento integer NOT NULL,
    descricao_dificuldade_evento character varying(15) NOT NULL
);


ALTER TABLE public.dificuldade_evento OWNER TO postgres;

--
-- Name: TABLE dificuldade_evento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.dificuldade_evento IS 'Mostra o nível de dificuldade do Evento.

Básico

Intermediário

Avançado';


--
-- Name: encontro; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.encontro (
    id_encontro integer NOT NULL,
    nome_encontro character varying(254) NOT NULL,
    apelido_encontro character varying(50) NOT NULL
);


ALTER TABLE public.encontro OWNER TO postgres;

--
-- Name: encontro_horario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.encontro_horario (
    id_encontro_horario integer NOT NULL,
    descricao character varying(20) NOT NULL,
    hora_inicial time without time zone NOT NULL,
    hora_final time without time zone NOT NULL,
    CONSTRAINT encontro_horario_check CHECK ((hora_inicial < hora_final))
);


ALTER TABLE public.encontro_horario OWNER TO postgres;

--
-- Name: encontro_horario_id_encontro_horario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.encontro_horario_id_encontro_horario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.encontro_horario_id_encontro_horario_seq OWNER TO postgres;

--
-- Name: encontro_horario_id_encontro_horario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.encontro_horario_id_encontro_horario_seq OWNED BY public.encontro_horario.id_encontro_horario;


--
-- Name: encontro_id_encontro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.encontro_id_encontro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.encontro_id_encontro_seq OWNER TO postgres;

--
-- Name: encontro_id_encontro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.encontro_id_encontro_seq OWNED BY public.encontro.id_encontro;


--
-- Name: encontro_participante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.encontro_participante (
    id_conferencia_encontro integer NOT NULL,
    id_pessoa integer NOT NULL
);


ALTER TABLE public.encontro_participante OWNER TO postgres;

--
-- Name: estado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.estado (
    id_estado integer NOT NULL,
    nome_estado character varying(30) NOT NULL,
    codigo_estado character(2) NOT NULL
);


ALTER TABLE public.estado OWNER TO postgres;

--
-- Name: estado_id_estado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estado_id_estado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estado_id_estado_seq OWNER TO postgres;

--
-- Name: estado_id_estado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estado_id_estado_seq OWNED BY public.estado.id_estado;


--
-- Name: evento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.evento (
    id_evento integer NOT NULL,
    nome_evento character varying(255) NOT NULL,
    id_tipo_evento integer NOT NULL,
    id_conferencia_encontro integer NOT NULL,
    validada boolean DEFAULT false NOT NULL,
    resumo text NOT NULL,
    responsavel integer NOT NULL,
    data_validacao timestamp without time zone,
    data_submissao timestamp without time zone DEFAULT now() NOT NULL,
    id_dificuldade_evento integer DEFAULT 1 NOT NULL,
    perfil_minimo text DEFAULT 'Perfil Mínimo do Participante'::text NOT NULL,
    preferencia_horario text,
    apresentado boolean DEFAULT false NOT NULL,
    tecnologias_envolvidas text,
    id_palestrante integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.evento OWNER TO postgres;

--
-- Name: TABLE evento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.evento IS 'Evento é qualquer tipo de atividade no Encontro: Palestra, Minicurso, Oficina.';


--
-- Name: COLUMN evento.validada; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.evento.validada IS 'O administrador deve indicar qual o evento aprovado.';


--
-- Name: COLUMN evento.apresentado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.evento.apresentado IS 'indica que o palestrante realmente veio e participou';


--
-- Name: evento_arquivo_id_evento_arquivo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.evento_arquivo_id_evento_arquivo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.evento_arquivo_id_evento_arquivo_seq OWNER TO postgres;

--
-- Name: evento_arquivo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.evento_arquivo (
    id_evento_arquivo integer DEFAULT nextval('public.evento_arquivo_id_evento_arquivo_seq'::regclass) NOT NULL,
    id_evento integer NOT NULL,
    nome_arquivo character varying(255) NOT NULL,
    arquivo oid NOT NULL,
    nome_arquivo_md5 character varying(255) DEFAULT md5(((((random() * (1000)::double precision))::integer)::character varying)::text) NOT NULL
);


ALTER TABLE public.evento_arquivo OWNER TO postgres;

--
-- Name: evento_demanda; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.evento_demanda (
    evento integer NOT NULL,
    id_pessoa integer NOT NULL,
    data_solicitacao date DEFAULT now() NOT NULL
);


ALTER TABLE public.evento_demanda OWNER TO postgres;

--
-- Name: evento_id_evento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.evento_id_evento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.evento_id_evento_seq OWNER TO postgres;

--
-- Name: evento_id_evento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.evento_id_evento_seq OWNED BY public.evento.id_evento;


--
-- Name: evento_palestrante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.evento_palestrante (
    id_evento integer NOT NULL,
    id_pessoa integer NOT NULL,
    confirmado boolean DEFAULT false NOT NULL
);


ALTER TABLE public.evento_palestrante OWNER TO postgres;

--
-- Name: evento_participacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.evento_participacao (
    id_pessoa integer NOT NULL,
    id_evento_realizacao integer NOT NULL,
    evento integer NOT NULL
);


ALTER TABLE public.evento_participacao OWNER TO postgres;

--
-- Name: evento_participacao_evento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.evento_participacao_evento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.evento_participacao_evento_seq OWNER TO postgres;

--
-- Name: evento_participacao_evento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.evento_participacao_evento_seq OWNED BY public.evento_participacao.evento;


--
-- Name: evento_realizacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.evento_realizacao (
    evento integer NOT NULL,
    id_evento integer NOT NULL,
    id_sala integer NOT NULL,
    data date NOT NULL,
    hora_inicio time without time zone,
    hora_fim time without time zone,
    descricao character varying(100) NOT NULL,
    CONSTRAINT check_horario CHECK ((hora_fim > hora_inicio))
);


ALTER TABLE public.evento_realizacao OWNER TO postgres;

--
-- Name: evento_realizacao_evento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.evento_realizacao_evento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.evento_realizacao_evento_seq OWNER TO postgres;

--
-- Name: evento_realizacao_evento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.evento_realizacao_evento_seq OWNED BY public.evento_realizacao.evento;


--
-- Name: evento_realizacao_multipla; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.evento_realizacao_multipla (
    evento_realizacao_multipla integer NOT NULL,
    evento integer NOT NULL,
    data date NOT NULL,
    hora_inicio time without time zone NOT NULL,
    hora_fim time without time zone NOT NULL,
    CONSTRAINT evento_realizacao_multipla_check CHECK ((hora_fim > hora_inicio))
);


ALTER TABLE public.evento_realizacao_multipla OWNER TO postgres;

--
-- Name: evento_realizacao_multipla_evento_realizacao_multipla_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.evento_realizacao_multipla_evento_realizacao_multipla_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.evento_realizacao_multipla_evento_realizacao_multipla_seq OWNER TO postgres;

--
-- Name: evento_realizacao_multipla_evento_realizacao_multipla_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.evento_realizacao_multipla_evento_realizacao_multipla_seq OWNED BY public.evento_realizacao_multipla.evento_realizacao_multipla;


--
-- Name: evento_tags; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.evento_tags (
    id_evento integer NOT NULL,
    id_tag integer NOT NULL
);


ALTER TABLE public.evento_tags OWNER TO postgres;

--
-- Name: instituicao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.instituicao (
    id_instituicao integer NOT NULL,
    nome_instituicao character varying(100) NOT NULL,
    apelido_instituicao character varying(50) NOT NULL
);


ALTER TABLE public.instituicao OWNER TO postgres;

--
-- Name: TABLE instituicao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.instituicao IS 'Instituição de origem da pessoa. Escola, Comunidade.';


--
-- Name: COLUMN instituicao.apelido_instituicao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.instituicao.apelido_instituicao IS 'EEMF Adauto Bezerra.

Essa informação pode estar no CRACHÁ.';


--
-- Name: instituicao_id_instituicao_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.instituicao_id_instituicao_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.instituicao_id_instituicao_seq OWNER TO postgres;

--
-- Name: instituicao_id_instituicao_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.instituicao_id_instituicao_seq OWNED BY public.instituicao.id_instituicao;


--
-- Name: mensagem_email; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.mensagem_email (
    id_conferencia_encontro integer NOT NULL,
    id_tipo_mensagem_email integer NOT NULL,
    mensagem text NOT NULL,
    assunto character varying(200) NOT NULL,
    link character varying(70),
    assinatura_email character varying(255),
    assinatura_siteoficial character varying(255)
);


ALTER TABLE public.mensagem_email OWNER TO postgres;

--
-- Name: municipio_id_municipio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.municipio_id_municipio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.municipio_id_municipio_seq OWNER TO postgres;

--
-- Name: municipio_id_municipio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.municipio_id_municipio_seq OWNED BY public.municipio.id_municipio;


--
-- Name: palestrante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.palestrante (
    id_palestrante integer NOT NULL,
    nome character varying(200) NOT NULL,
    email character varying(100) NOT NULL,
    telefone character varying(16),
    id_sexo integer DEFAULT 0 NOT NULL,
    data_cadastro timestamp without time zone DEFAULT now()
);


ALTER TABLE public.palestrante OWNER TO postgres;

--
-- Name: palestrante_id_palestrante_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.palestrante_id_palestrante_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.palestrante_id_palestrante_seq OWNER TO postgres;

--
-- Name: palestrante_id_palestrante_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.palestrante_id_palestrante_seq OWNED BY public.palestrante.id_palestrante;


--
-- Name: pessoa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.pessoa (
    id_pessoa integer NOT NULL,
    nome character varying(255) NOT NULL,
    email character varying(100) NOT NULL,
    apelido character varying(20) NOT NULL,
    twitter character varying(32),
    endereco_internet character varying(100),
    senha character varying(255) DEFAULT md5(((((random() * (1000)::double precision))::integer)::character varying)::text),
    cadastro_validado boolean DEFAULT false NOT NULL,
    data_validacao_cadastro timestamp without time zone,
    data_cadastro timestamp without time zone DEFAULT now(),
    id_sexo integer DEFAULT 0 NOT NULL,
    nascimento date NOT NULL,
    telefone character varying(16),
    administrador boolean DEFAULT false NOT NULL,
    facebook character varying(50),
    email_enviado boolean DEFAULT false NOT NULL,
    bio text,
    slideshare character varying(32)
);


ALTER TABLE public.pessoa OWNER TO postgres;

--
-- Name: COLUMN pessoa.nome; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.pessoa.nome IS 'Nome completo e em letra Maiúscula';


--
-- Name: COLUMN pessoa.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.pessoa.email IS 'email em letra minúscula';


--
-- Name: COLUMN pessoa.endereco_internet; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.pessoa.endereco_internet IS 'Um endereço começando com http:// indicando onde estão as informações da pessoa.

Pode ser um blog, página do facebook, site...';


--
-- Name: COLUMN pessoa.senha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.pessoa.senha IS 'Senha do usuário usando criptografia md5 do comsolid.

Valor padrão vai ser o próprio nome do usuário.';


--
-- Name: COLUMN pessoa.email_enviado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.pessoa.email_enviado IS 'Indica se o sistema conseguiu conectar a um servidor de email e validar o email.';


--
-- Name: pessoa_arquivo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.pessoa_arquivo (
    id_pessoa integer NOT NULL,
    foto oid NOT NULL
);


ALTER TABLE public.pessoa_arquivo OWNER TO postgres;

--
-- Name: pessoa_id_pessoa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pessoa_id_pessoa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pessoa_id_pessoa_seq OWNER TO postgres;

--
-- Name: pessoa_id_pessoa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pessoa_id_pessoa_seq OWNED BY public.pessoa.id_pessoa;


--
-- Name: sala; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.sala (
    id_sala integer NOT NULL,
    nome_sala character varying(150) NOT NULL
);


ALTER TABLE public.sala OWNER TO postgres;

--
-- Name: sala_id_sala_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sala_id_sala_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sala_id_sala_seq OWNER TO postgres;

--
-- Name: sala_id_sala_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sala_id_sala_seq OWNED BY public.sala.id_sala;


--
-- Name: sexo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.sexo (
    id_sexo integer NOT NULL,
    descricao_sexo character varying(15) NOT NULL,
    codigo_sexo character(1) NOT NULL
);


ALTER TABLE public.sexo OWNER TO postgres;

--
-- Name: tags; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.tags (
    id integer NOT NULL,
    descricao character varying(30) NOT NULL
);


ALTER TABLE public.tags OWNER TO postgres;

--
-- Name: tags_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tags_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tags_id_seq OWNER TO postgres;

--
-- Name: tags_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tags_id_seq OWNED BY public.tags.id;


--
-- Name: tipo_evento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.tipo_evento (
    id_tipo_evento integer NOT NULL,
    nome_tipo_evento character varying(20) NOT NULL
);


ALTER TABLE public.tipo_evento OWNER TO postgres;

--
-- Name: TABLE tipo_evento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tipo_evento IS 'Tipos de Eventos: Palestra, Minicurso, Oficina.';


--
-- Name: tipo_evento_id_tipo_evento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_evento_id_tipo_evento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_evento_id_tipo_evento_seq OWNER TO postgres;

--
-- Name: tipo_evento_id_tipo_evento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipo_evento_id_tipo_evento_seq OWNED BY public.tipo_evento.id_tipo_evento;


--
-- Name: tipo_horario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.tipo_horario (
    id_tipo_horario integer NOT NULL,
    intervalo_minutos integer NOT NULL,
    horario_inicial time without time zone NOT NULL,
    horario_final time without time zone NOT NULL
);


ALTER TABLE public.tipo_horario OWNER TO postgres;

--
-- Name: tipo_horario_id_tipo_horario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_horario_id_tipo_horario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_horario_id_tipo_horario_seq OWNER TO postgres;

--
-- Name: tipo_horario_id_tipo_horario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipo_horario_id_tipo_horario_seq OWNED BY public.tipo_horario.id_tipo_horario;


--
-- Name: tipo_mensagem_email; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.tipo_mensagem_email (
    id_tipo_mensagem_email integer NOT NULL,
    descricao_tipo_mensagem_email character varying(30) NOT NULL
);


ALTER TABLE public.tipo_mensagem_email OWNER TO postgres;

--
-- Name: tipo_usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.tipo_usuario (
    id_tipo_usuario integer NOT NULL,
    descricao_tipo_usuario character varying(15) NOT NULL
);


ALTER TABLE public.tipo_usuario OWNER TO postgres;

--
-- Name: id_caravana; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caravana ALTER COLUMN id_caravana SET DEFAULT nextval('public.caravana_id_caravana_seq'::regclass);


--
-- Name: id_conferencia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conferencia ALTER COLUMN id_conferencia SET DEFAULT nextval('public.conferencia_id_conferencia_seq'::regclass);


--
-- Name: id_conferencia_encontro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conferencia_encontro ALTER COLUMN id_conferencia_encontro SET DEFAULT nextval('public.conferencia_encontro_id_conferencia_encontro_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dh ALTER COLUMN id SET DEFAULT nextval('public.dh_id_seq'::regclass);


--
-- Name: id_encontro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.encontro ALTER COLUMN id_encontro SET DEFAULT nextval('public.encontro_id_encontro_seq'::regclass);


--
-- Name: id_encontro_horario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.encontro_horario ALTER COLUMN id_encontro_horario SET DEFAULT nextval('public.encontro_horario_id_encontro_horario_seq'::regclass);


--
-- Name: id_estado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado ALTER COLUMN id_estado SET DEFAULT nextval('public.estado_id_estado_seq'::regclass);


--
-- Name: id_evento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento ALTER COLUMN id_evento SET DEFAULT nextval('public.evento_id_evento_seq'::regclass);


--
-- Name: evento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_participacao ALTER COLUMN evento SET DEFAULT nextval('public.evento_participacao_evento_seq'::regclass);


--
-- Name: evento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_realizacao ALTER COLUMN evento SET DEFAULT nextval('public.evento_realizacao_evento_seq'::regclass);


--
-- Name: evento_realizacao_multipla; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_realizacao_multipla ALTER COLUMN evento_realizacao_multipla SET DEFAULT nextval('public.evento_realizacao_multipla_evento_realizacao_multipla_seq'::regclass);


--
-- Name: id_instituicao; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instituicao ALTER COLUMN id_instituicao SET DEFAULT nextval('public.instituicao_id_instituicao_seq'::regclass);


--
-- Name: id_municipio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipio ALTER COLUMN id_municipio SET DEFAULT nextval('public.municipio_id_municipio_seq'::regclass);


--
-- Name: id_palestrante; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.palestrante ALTER COLUMN id_palestrante SET DEFAULT nextval('public.palestrante_id_palestrante_seq'::regclass);


--
-- Name: id_pessoa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pessoa ALTER COLUMN id_pessoa SET DEFAULT nextval('public.pessoa_id_pessoa_seq'::regclass);


--
-- Name: id_sala; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sala ALTER COLUMN id_sala SET DEFAULT nextval('public.sala_id_sala_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tags ALTER COLUMN id SET DEFAULT nextval('public.tags_id_seq'::regclass);


--
-- Name: id_tipo_evento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_evento ALTER COLUMN id_tipo_evento SET DEFAULT nextval('public.tipo_evento_id_tipo_evento_seq'::regclass);


--
-- Name: id_tipo_horario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_horario ALTER COLUMN id_tipo_horario SET DEFAULT nextval('public.tipo_horario_id_tipo_horario_seq'::regclass);


--
-- Name: caravana_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.caravana
    ADD CONSTRAINT caravana_pk PRIMARY KEY (id_caravana);


--
-- Name: conferencia_encontro_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.conferencia_encontro
    ADD CONSTRAINT conferencia_encontro_pkey PRIMARY KEY (id_conferencia_encontro);


--
-- Name: conferencia_participante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.conferencia_participante
    ADD CONSTRAINT conferencia_participante_pkey PRIMARY KEY (id_conferencia, id_pessoa);


--
-- Name: conferencia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.conferencia
    ADD CONSTRAINT conferencia_pkey PRIMARY KEY (id_conferencia);


--
-- Name: dh_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.dh
    ADD CONSTRAINT dh_pkey PRIMARY KEY (id);


--
-- Name: dificuldade_evento_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.dificuldade_evento
    ADD CONSTRAINT dificuldade_evento_pk PRIMARY KEY (id_dificuldade_evento);


--
-- Name: encontro_horario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.encontro_horario
    ADD CONSTRAINT encontro_horario_pkey PRIMARY KEY (id_encontro_horario);


--
-- Name: encontro_participante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.encontro_participante
    ADD CONSTRAINT encontro_participante_pkey PRIMARY KEY (id_conferencia_encontro, id_pessoa);


--
-- Name: encontro_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.encontro
    ADD CONSTRAINT encontro_pk PRIMARY KEY (id_encontro);


--
-- Name: estado_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.estado
    ADD CONSTRAINT estado_pk PRIMARY KEY (id_estado);


--
-- Name: evento_arquivo_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.evento_arquivo
    ADD CONSTRAINT evento_arquivo_pk PRIMARY KEY (id_evento_arquivo);


--
-- Name: evento_demanda_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.evento_demanda
    ADD CONSTRAINT evento_demanda_pk PRIMARY KEY (evento, id_pessoa);


--
-- Name: evento_palestrante_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.evento_palestrante
    ADD CONSTRAINT evento_palestrante_pk PRIMARY KEY (id_evento, id_pessoa);


--
-- Name: evento_participacao_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.evento_participacao
    ADD CONSTRAINT evento_participacao_pkey PRIMARY KEY (evento);


--
-- Name: evento_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.evento
    ADD CONSTRAINT evento_pk PRIMARY KEY (id_evento);


--
-- Name: evento_realizacao_multipla_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.evento_realizacao_multipla
    ADD CONSTRAINT evento_realizacao_multipla_pkey PRIMARY KEY (evento_realizacao_multipla);


--
-- Name: evento_realizacao_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.evento_realizacao
    ADD CONSTRAINT evento_realizacao_pk PRIMARY KEY (evento);


--
-- Name: evento_tags_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.evento_tags
    ADD CONSTRAINT evento_tags_pkey PRIMARY KEY (id_evento, id_tag);


--
-- Name: instituicao_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.instituicao
    ADD CONSTRAINT instituicao_pk PRIMARY KEY (id_instituicao);


--
-- Name: mensagem_email_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.mensagem_email
    ADD CONSTRAINT mensagem_email_pk PRIMARY KEY (id_conferencia_encontro, id_tipo_mensagem_email);


--
-- Name: municipio_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.municipio
    ADD CONSTRAINT municipio_pk PRIMARY KEY (id_municipio);


--
-- Name: palestrantes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.palestrante
    ADD CONSTRAINT palestrantes_pkey PRIMARY KEY (id_palestrante);


--
-- Name: pessoa_arquivo_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.pessoa_arquivo
    ADD CONSTRAINT pessoa_arquivo_pk PRIMARY KEY (id_pessoa);


--
-- Name: pessoa_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.pessoa
    ADD CONSTRAINT pessoa_email_key UNIQUE (email);


--
-- Name: pessoa_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.pessoa
    ADD CONSTRAINT pessoa_pk PRIMARY KEY (id_pessoa);


--
-- Name: sala_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.sala
    ADD CONSTRAINT sala_pk PRIMARY KEY (id_sala);


--
-- Name: sexo_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.sexo
    ADD CONSTRAINT sexo_pk PRIMARY KEY (id_sexo);


--
-- Name: tags_descricao_uidx; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tags
    ADD CONSTRAINT tags_descricao_uidx UNIQUE (descricao);


--
-- Name: tags_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tags
    ADD CONSTRAINT tags_pk PRIMARY KEY (id);


--
-- Name: tipo_evento_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tipo_evento
    ADD CONSTRAINT tipo_evento_pk PRIMARY KEY (id_tipo_evento);


--
-- Name: tipo_horario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tipo_horario
    ADD CONSTRAINT tipo_horario_pkey PRIMARY KEY (id_tipo_horario);


--
-- Name: tipo_mensagem_email_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tipo_mensagem_email
    ADD CONSTRAINT tipo_mensagem_email_pk PRIMARY KEY (id_tipo_mensagem_email);


--
-- Name: tipo_usuario_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tipo_usuario
    ADD CONSTRAINT tipo_usuario_pk PRIMARY KEY (id_tipo_usuario);


--
-- Name: email_uidx; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX email_uidx ON public.pessoa USING btree (email);


--
-- Name: evento_arquivomd5_uidx; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX evento_arquivomd5_uidx ON public.evento_arquivo USING btree (nome_arquivo_md5);


--
-- Name: evento_realizacaomultipla_uidx; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX evento_realizacaomultipla_uidx ON public.evento_realizacao_multipla USING btree (evento, data, hora_inicio, hora_fim);


--
-- Name: instituicao_indx_unq; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX instituicao_indx_unq ON public.instituicao USING btree (apelido_instituicao);


--
-- Name: trgrvalidaevento; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER trgrvalidaevento BEFORE UPDATE ON public.evento FOR EACH ROW EXECUTE PROCEDURE public.funcvalidaevento();


--
-- Name: trgrvalidausuario; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER trgrvalidausuario BEFORE UPDATE ON public.pessoa FOR EACH ROW EXECUTE PROCEDURE public.funcvalidausuario();


--
-- Name: caravana_criador_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caravana
    ADD CONSTRAINT caravana_criador_fkey FOREIGN KEY (criador) REFERENCES public.pessoa(id_pessoa);


--
-- Name: caravana_id_conferencia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caravana
    ADD CONSTRAINT caravana_id_conferencia_fkey FOREIGN KEY (id_conferencia) REFERENCES public.conferencia(id_conferencia);


--
-- Name: conferencia_encontro_id_conferencia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conferencia_encontro
    ADD CONSTRAINT conferencia_encontro_id_conferencia_fkey FOREIGN KEY (id_conferencia) REFERENCES public.conferencia(id_conferencia);


--
-- Name: conferencia_encontro_id_encontro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conferencia_encontro
    ADD CONSTRAINT conferencia_encontro_id_encontro_fkey FOREIGN KEY (id_encontro) REFERENCES public.encontro(id_encontro);


--
-- Name: conferencia_encontro_id_tipo_horario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conferencia_encontro
    ADD CONSTRAINT conferencia_encontro_id_tipo_horario_fkey FOREIGN KEY (id_tipo_horario) REFERENCES public.tipo_horario(id_tipo_horario);


--
-- Name: conferencia_participante_id_caravana_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conferencia_participante
    ADD CONSTRAINT conferencia_participante_id_caravana_fkey FOREIGN KEY (id_caravana) REFERENCES public.caravana(id_caravana);


--
-- Name: conferencia_participante_id_conferencia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conferencia_participante
    ADD CONSTRAINT conferencia_participante_id_conferencia_fkey FOREIGN KEY (id_conferencia) REFERENCES public.conferencia(id_conferencia);


--
-- Name: conferencia_participante_id_instituicao_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conferencia_participante
    ADD CONSTRAINT conferencia_participante_id_instituicao_fkey FOREIGN KEY (id_instituicao) REFERENCES public.instituicao(id_instituicao);


--
-- Name: conferencia_participante_id_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conferencia_participante
    ADD CONSTRAINT conferencia_participante_id_municipio_fkey FOREIGN KEY (id_municipio) REFERENCES public.municipio(id_municipio);


--
-- Name: conferencia_participante_id_pessoa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conferencia_participante
    ADD CONSTRAINT conferencia_participante_id_pessoa_fkey FOREIGN KEY (id_pessoa) REFERENCES public.pessoa(id_pessoa);


--
-- Name: conferencia_participante_id_tipo_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conferencia_participante
    ADD CONSTRAINT conferencia_participante_id_tipo_usuario_fkey FOREIGN KEY (id_tipo_usuario) REFERENCES public.tipo_usuario(id_tipo_usuario);


--
-- Name: dificuldade_evento_evento_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento
    ADD CONSTRAINT dificuldade_evento_evento_fk FOREIGN KEY (id_dificuldade_evento) REFERENCES public.dificuldade_evento(id_dificuldade_evento);


--
-- Name: encontro_participante_id_conferencia_encontro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.encontro_participante
    ADD CONSTRAINT encontro_participante_id_conferencia_encontro_fkey FOREIGN KEY (id_conferencia_encontro) REFERENCES public.conferencia_encontro(id_conferencia_encontro);


--
-- Name: estado_municipio_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipio
    ADD CONSTRAINT estado_municipio_fk FOREIGN KEY (id_estado) REFERENCES public.estado(id_estado);


--
-- Name: evento_evento_palestrante_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_palestrante
    ADD CONSTRAINT evento_evento_palestrante_fk FOREIGN KEY (id_evento) REFERENCES public.evento(id_evento);


--
-- Name: evento_evento_realizacao_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_realizacao
    ADD CONSTRAINT evento_evento_realizacao_fk FOREIGN KEY (id_evento) REFERENCES public.evento(id_evento);


--
-- Name: evento_id_conferencia_encontro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento
    ADD CONSTRAINT evento_id_conferencia_encontro_fkey FOREIGN KEY (id_conferencia_encontro) REFERENCES public.conferencia_encontro(id_conferencia_encontro);


--
-- Name: evento_id_palestrante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento
    ADD CONSTRAINT evento_id_palestrante_fkey FOREIGN KEY (id_palestrante) REFERENCES public.palestrante(id_palestrante);


--
-- Name: evento_participacao_id_evento_realizacao_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_participacao
    ADD CONSTRAINT evento_participacao_id_evento_realizacao_fkey FOREIGN KEY (id_evento_realizacao) REFERENCES public.evento_realizacao(evento) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: evento_realizacao_evento_demanda_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_demanda
    ADD CONSTRAINT evento_realizacao_evento_demanda_fk FOREIGN KEY (evento) REFERENCES public.evento_realizacao(evento);


--
-- Name: evento_realizacao_multipla_evento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_realizacao_multipla
    ADD CONSTRAINT evento_realizacao_multipla_evento_fkey FOREIGN KEY (evento) REFERENCES public.evento_realizacao(evento);


--
-- Name: evento_responsavel_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento
    ADD CONSTRAINT evento_responsavel_fkey FOREIGN KEY (responsavel) REFERENCES public.pessoa(id_pessoa);


--
-- Name: evento_tags_id_evento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_tags
    ADD CONSTRAINT evento_tags_id_evento_fkey FOREIGN KEY (id_evento) REFERENCES public.evento(id_evento);


--
-- Name: evento_tags_id_tag_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_tags
    ADD CONSTRAINT evento_tags_id_tag_fkey FOREIGN KEY (id_tag) REFERENCES public.tags(id);


--
-- Name: instituicao_caravana_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caravana
    ADD CONSTRAINT instituicao_caravana_fk FOREIGN KEY (id_instituicao) REFERENCES public.instituicao(id_instituicao);


--
-- Name: mensagem_email_id_conferencia_encontro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mensagem_email
    ADD CONSTRAINT mensagem_email_id_conferencia_encontro_fkey FOREIGN KEY (id_conferencia_encontro) REFERENCES public.conferencia_encontro(id_conferencia_encontro);


--
-- Name: municipio_caravana_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caravana
    ADD CONSTRAINT municipio_caravana_fk FOREIGN KEY (id_municipio) REFERENCES public.municipio(id_municipio);


--
-- Name: palestrante_id_sexo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.palestrante
    ADD CONSTRAINT palestrante_id_sexo_fkey FOREIGN KEY (id_sexo) REFERENCES public.sexo(id_sexo);


--
-- Name: pessoa_encontro_participante_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.encontro_participante
    ADD CONSTRAINT pessoa_encontro_participante_fk FOREIGN KEY (id_pessoa) REFERENCES public.pessoa(id_pessoa);


--
-- Name: pessoa_evento_demanda_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_demanda
    ADD CONSTRAINT pessoa_evento_demanda_fk FOREIGN KEY (id_pessoa) REFERENCES public.pessoa(id_pessoa);


--
-- Name: pessoa_evento_palestrante_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_palestrante
    ADD CONSTRAINT pessoa_evento_palestrante_fk FOREIGN KEY (id_pessoa) REFERENCES public.pessoa(id_pessoa);


--
-- Name: pessoa_evento_participacao_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_participacao
    ADD CONSTRAINT pessoa_evento_participacao_fk FOREIGN KEY (id_pessoa) REFERENCES public.pessoa(id_pessoa);


--
-- Name: sala_evento_realizacao_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento_realizacao
    ADD CONSTRAINT sala_evento_realizacao_fk FOREIGN KEY (id_sala) REFERENCES public.sala(id_sala);


--
-- Name: sexo_pessoa_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pessoa
    ADD CONSTRAINT sexo_pessoa_fk FOREIGN KEY (id_sexo) REFERENCES public.sexo(id_sexo);


--
-- Name: tipo_evento_evento_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento
    ADD CONSTRAINT tipo_evento_evento_fk FOREIGN KEY (id_tipo_evento) REFERENCES public.tipo_evento(id_tipo_evento);


--
-- Name: tipo_mensagem_email_mensagem_email_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mensagem_email
    ADD CONSTRAINT tipo_mensagem_email_mensagem_email_fk FOREIGN KEY (id_tipo_mensagem_email) REFERENCES public.tipo_mensagem_email(id_tipo_mensagem_email);


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

