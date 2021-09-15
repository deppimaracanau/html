<?php

class Application_Model_Pessoa extends Zend_Db_Table_Abstract {

    protected $_name = 'pessoa';
    protected $_primary = 'id_pessoa';
    protected $_referenceMap = array(
        array('refTableClass' => 'Application_Model_Participante',
            'refColumns' => 'id_pessoa',
            'columns' => 'id_pessoa',
            'onDelete' => self::CASCADE,
            'onUpdate' => self::RESTRICT),
        array('refTableClass' => 'Application_Model_Evento',
            'refColumns' => 'responsavel',
            'columns' => 'id_pessoa',
            'onDelete' => self::CASCADE,
            'onUpdate' => self::RESTRICT),
        array('refTableClass' => 'Application_Model_EventoDemanda',
            'refColumns' => 'id_pessoa',
            'columns' => 'id_pessoa',
            'onDelete' => self::CASCADE,
            'onUpdate' => self::RESTRICT),
    );

    public function gerarSenha() {
        try {
            $qryIsValid = $this->getAdapter()->quoteInto("SELECT funcGerarSenha(?) AS c ", $this->email);
            $senha = $this->getAdapter()->query($qryIsValid)->fetch();
            $this->senha = $senha['c'];

            return $senha['c'];
        } catch (Exception $ex) {
            
        }
    }

    /**
     * Utilização
     * 	/login
     * 	/participante/alterar-senha
     */
    public function avaliaLogin($login, $senha) {
        $sql = "select id_pessoa, administrador, apelido, (senha = md5(?)) as valido,
         twitter, cadastro_validado
         from pessoa where email = ? ";
        $where = array($senha, $login);
        $result = $this->getAdapter()->fetchRow($sql, $where);

        return $result;
    }

    public function buscaPessoas($data, $col_order = "p.nome", $limit = 20) {
        $sql = "
            SELECT p.id_pessoa, p.nome, p.cadastro_validado, apelido, email, twitter,
                   nome_municipio, apelido_instituicao, nome_caravana, ep.confirmado
            FROM encontro_participante ep 
            INNER JOIN pessoa p ON (ep.id_pessoa = p.id_pessoa)
            LEFT OUTER JOIN instituicao i ON (ep.id_instituicao = i.id_instituicao)
            INNER JOIN municipio m ON (ep.id_municipio = m.id_municipio)
            LEFT OUTER JOIN caravana c ON (ep.id_caravana = c.id_caravana)
            WHERE id_encontro = ? 
        ";

        if (isset($data[2])) {
            if ($data[2] == "nome") {
                if ($data[1] != NULL) {
                    $data[1] = "%" . $data[1] . "%";
                    $sql .= ' AND p.nome ilike ? ';
                } else {
                    unset($data[1]);
                }
            } else if ($data[2] == "municipio") {
                if ($data[1] != NULL) {
                    $data[1] = $data[1] . "%";
                    $sql .= ' AND nome_municipio ilike ? ';
                } else {
                    unset($data[1]);
                }
            } else if ($data[2] == "caravana") {
                if ($data[1] != NULL) {
                    $data[1] = $data[1] . "%";
                    $sql .= ' AND nome_caravana ilike ? ';
                } else {
                    unset($data[1]);
                }
            } else if ($data[2] == "instituicao") {
                if ($data[1] != NULL) {
                    $data[1] = $data[1] . "%";
                    $sql .= ' AND apelido_instituicao ilike ? ';
                } else {
                    unset($data[1]);
                }
            } else {
                if ($data[1] != NULL) {
                    $data[1] = $data[1] . "%";
                    $sql .= ' AND p.email ilike ? ';
                } else {
                    unset($data[1]);
                }
            }
            unset($data[2]);
        }

        if (!empty($col_order)) {
            $sql .= ' ORDER BY ' . $this->getOrderAcentos($col_order);
        }
        if (!empty($limit)) {
            $sql .= ' LIMIT ' . $limit;
        }
        return $this->getAdapter()->fetchAll($sql, $data);
    }

    public function buscaPessoasCoordenacao($data) {
        $select = "SELECT p.id_pessoa, nome, apelido, email FROM encontro_participante ep
			INNER JOIN pessoa p ON (ep.id_pessoa = p.id_pessoa)
			WHERE id_encontro = ? AND id_tipo_usuario = 1"; // 1: coordenação
        return $this->getAdapter()->fetchAll($select, $data);
    }

    public function buscaPessoasOrganizacao($data) {
        $select = "SELECT p.id_pessoa, nome, apelido, email FROM encontro_participante ep
			INNER JOIN pessoa p ON (ep.id_pessoa = p.id_pessoa)
			WHERE id_encontro = ? AND id_tipo_usuario = 2"; // 2: organização
        return $this->getAdapter()->fetchAll($select, $data);
    }

    public function verificaEncontro($id_encontro, $id_pessoa) {
        $select = "SELECT id_pessoa from encontro_participante where id_encontro = ? AND id_pessoa= ?";
        $resp = $this->getAdapter()->fetchAll($select, array($id_encontro, $id_pessoa));
        if (sizeof($resp) == 0) {
            return false;
        }
        return true;
    }

    public function buscarUltimoEncontro($id_pessoa) {
        //$select =  "SELECT id_encontro, id_pessoa, id_instituicao, id_municipio, id_caravana, 
        $select = "SELECT id_encontro, id_pessoa, id_instituicao, id_municipio,
				id_tipo_usuario FROM encontro_participante
				WHERE id_pessoa = ? ORDER BY id_encontro DESC LIMIT 1";

        // "select * from encontro_participante where id_pessoa = ? order by id_pessoa desc limit 1";
        $rs = $this->getAdapter()->fetchAll($select, $id_pessoa);
        if (count($rs) > 0) {
            return $rs[0];
        }
        return null;
    }

    /**
     * @deprecated
     */
    public function atualizaEncontro($encontro) {
        $select = "insert into encontro_participante(id_encontro, id_pessoa,id_instituicao,id_municipio,id_caravana,id_tipo_usuario)
			values(?,?,?,?,?,?)";
        return $this->getAdapter()->fetchAll($select, $encontro);
    }

    public function buscarPermissaoUsuarios($id_encontro, $termo = "", $buscar_por = "nome", $tipo_usuario = 0) {

        $sql = "SELECT p.id_pessoa, p.nome, p.apelido,
               p.email, p.administrador, tu.id_tipo_usuario, tu.descricao_tipo_usuario
         FROM encontro_participante ep
         INNER JOIN pessoa p ON ep.id_pessoa = p.id_pessoa
         INNER JOIN tipo_usuario tu ON ep.id_tipo_usuario = tu.id_tipo_usuario
         WHERE ep.id_encontro = ? ";
        $where = array($id_encontro);
        if (!empty($termo)) {
            if ($buscar_por == "nome") {
                $sql .= " AND p.nome ILIKE ? ";
                $where[] = "%{$termo}%";
            } else if ($buscar_por == "email") {
                $sql .= " AND p.email ILIKE ? ";
                $where[] = "%{$termo}%";
            } else if ($buscar_por == "id_pessoa") {
                $sql .= " AND p.id_pessoa = ? ";
                $where[] = (int) $termo;
            }
        }

        if ($tipo_usuario > 0) {
            $sql .= " AND tu.id_tipo_usuario = ? ";
            $where[] = $tipo_usuario;
        }

        $sql .= " ORDER BY p.nome LIMIT 50 ";
        return $this->getAdapter()->fetchAll($sql, $where);
    }

    public function listarSlideShare($slideshareUsername) {
        if (empty($slideshareUsername)) {
            return null;
        }

        try {
            $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'staging');
            $api_key = $config->slideshare->api_key;
            $shared_secret = $config->slideshare->shared_secret;

            // Caso o slideshare não esteja configurado retorna null.
            // TODO: jogar exceção para melhor mostrar ao usuário o que realmente
            // aconteceu. Do modo que está agora mostra como se o usuário
            // não tivesse configurado sua conta no slideshare!
            if (empty($api_key) || empty($shared_secret)) {
                return null;
            }

            $service = new Zend_Service_SlideShare($api_key, $shared_secret);
            $offset = 0;
            $limit = 10;
            $slides = $service->getSlideShowsByUsername($slideshareUsername, $offset, $limit);
            return $slides;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function buscaParticipantes($id_encontro, $where = null, $col_order = "p.nome", $limit = null) {
        $sql = "
            SELECT 
                p.id_pessoa, UPPER(p.nome) as nome, p.cadastro_validado, 
                apelido, LOWER(email) as email, twitter, nome_municipio, 
                apelido_instituicao, nome_caravana, ep.confirmado
            FROM encontro_participante ep 
            INNER JOIN pessoa p ON (ep.id_pessoa = p.id_pessoa)
            LEFT OUTER JOIN instituicao i ON (ep.id_instituicao = i.id_instituicao)
            INNER JOIN municipio m ON (ep.id_municipio = m.id_municipio)
            LEFT OUTER JOIN caravana c ON (ep.id_caravana = c.id_caravana)
            WHERE id_encontro = ? 
        ";

        if (!empty($where)) {
            $sql .= 'AND ' . $where;
        }

        if (!empty($col_order)) {
            $sql .= ' ORDER BY ' . $this->getOrderAcentos($col_order);
        }

        if (!empty($limit)) {
            $sql .= ' LIMIT ' . $limit;
        }
        return $this->getAdapter()->fetchAll($sql, array($id_encontro));
    }

    // order desconsiderando acentos diacrílicos
    // http://valdeka.wordpress.com/2009/12/07/dicas-postgresql/
    public function getOrderAcentos($coluna = "p.nome", $asc = true) {
        $s = "lower(translate({$coluna}, 'ÁÀÂÃÄáàâãäÉÈÊËéèêëÍÌÎÏíìîïÓÒÕÔÖóòôõöÚÙÛÜúùûüÇç', 'AAAAAaaaaaEEEEeeeeIIIIiiiiOOOOOoooooUUUUuuuuCc')) ";
        $asc ? $s.= "ASC" : $s .= "DESC";
        return $s;
    }

    /**
     * Verifica se a pessoa existe.
     */
    public function existe($id_pessoa) {
        $sql = "
            SELECT EXIST(
                SELECT *
                FROM pessoa
                WHERE id_pessoa = ?
            )";
        return $this->getAdapter()->fetchOne($sql, array($id_pessoa));
    }

    public function isAdmin($id_pessoa) {
        $sql = "
            SELECT EXIST(
                SELECT *
                FROM pessoa
                WHERE id_pessoa = ? AND administrador = 't'
            )";
        return $this->getAdapter()->fetchOne($sql, array($id_pessoa));
    }

}
