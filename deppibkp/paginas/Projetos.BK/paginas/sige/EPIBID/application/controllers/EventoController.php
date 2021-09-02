<?php

class EventoController extends Zend_Controller_Action {

    public function init()
    {
        $sessao = Zend_Auth::getInstance()->getIdentity();
        $this->view->menu = new Application_Form_Menu($this->view, 'inicio', $sessao['administrador']);
    }

    private function _autenticacao()
    {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $session = new Zend_Session_Namespace();
            $session->setExpirationSeconds(60 * 60 * 1); // 1 minuto
            $session->url = $_SERVER['REQUEST_URI'];
            return $this->_helper->redirector->goToRoute(array(), 'login', true);
        }
    }

    /**
     * Mapeada como
     *    /submissao
     */
    public function indexAction()
    {
        $this->_autenticacao();
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/tabela_sort.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/tipsy.css'));

        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery.dataTables.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery.tipsy.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/evento/inicio.js'));


        $this->view->menu->setAtivo('submissao');
        $sessao = Zend_Auth :: getInstance()->getIdentity();
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];

        $idPessoa = $sessao["idPessoa"];
        // $idEncontro = $sessao["idEncontro"]; // UNSAFE

        $model_evento = new Application_Model_Evento();
        $this->view->meusEventos = $model_evento->listarEventosParticipante($idEncontro, $idPessoa);
        $model_artigo = new Application_Model_Artigo();
        $this->view->meusArtigos = $model_artigo->listarArtigosParticipante($idEncontro, $idPessoa);
    }

    public function ajaxBuscarAction()
    {
        $this->_autenticacao();
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $sessao = Zend_Auth::getInstance()->getIdentity();
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];
        $idPessoa = $sessao["idPessoa"];
//        $idEncontro = $sessao["idEncontro"]; // UNSAFE

        $eventos = new Application_Model_Evento();
        $data = array(
            $idEncontro,
            $idPessoa,
            $idPessoa,
            $this->_request->getParam("data"),
            intval($this->_request->getParam("id_tipo_evento")),
            $this->_request->getParam("termo")
        );
        $rs = $eventos->buscaEventos($data);

        $json = new stdClass;
        $json->size = count($rs);
        $json->itens = array();

        foreach ($rs as $value) {
            $descricao = $value['nome_evento'];
            if (!empty($value['descricao'])) {
                $descricao = "{$descricao} ({$value['descricao']})";
            }

            $json->itens[] = array(
                "{$value['nome_tipo_evento']}",
                "{$descricao}",
                "{$value['data']}",
                "{$value['h_inicio']} - {$value['h_fim']}",
                "<a id=\"{$value['evento']}\" class=\"marcar no-bottom\">
                  <i class=\"icon-bookmark\"></i> Marcar</a>"
            );
        }

        header("Pragma: no-cache");
        header("Cache: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-type: text/json");
        echo json_encode($json);
    }

    public function ajaxInteresseAction()
    {
        $this->_autenticacao();
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $sessao = Zend_Auth::getInstance()->getIdentity();
        $idPessoa = $sessao["idPessoa"];

        $json = new stdClass;
        try {
            $eventoDemanda = new Application_Model_EventoDemanda();
            $data = array(
                'evento' => intval($this->_request->getParam("id")),
                'id_pessoa' => $idPessoa
            );
            $eventoDemanda->insert($data);
            $json->ok = true;
        } catch (Zend_Db_Exception $ex) {
            $json->ok = false;
            $json->erro = "Ocorreu um erro inesperado ao marcar interesse em evento.<br/>Detalhes"
                    . $ex->getMessage();
        }
        header("Pragma: no-cache");
        header("Cache: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-type: text/json");
        echo json_encode($json);
    }

    public function submeterAction()
    {
        $this->_autenticacao();

        $sessao = Zend_Auth::getInstance()->getIdentity();
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $id_encontro = (int) $ps->encontro["id_encontro"];
        $id_pessoa = intval($sessao["idPessoa"]);
        // $id_encontro = intval($sessao["idEncontro"]);
        $admin = $sessao["administrador"]; // boolean

        $encontro = new Application_Model_Encontro();
        $rs = $encontro->isPeriodoSubmissao($id_encontro);
        if (($rs['liberar_submissao'] == null || $rs['liberar_submissao'] == FALSE) and ! $admin) {
            $this->_helper->flashMessenger->addMessage(
                    array('notice' => "O Período de inscrição "
                        . "vai de {$rs['periodo_submissao_inicio']} até {$rs['periodo_submissao_fim']}."));
            return $this->_helper->redirector->goToRoute(array(
                        'controller' => 'evento'), 'default', true);
        }

        switch ($this->getRequest()->getParam("t")) {
            case "evento":
                $tipo = "evento";
                $form = new Application_Form_Evento();
                $evento = new Application_Model_Evento();
                break;
            default:
                $tipo = null;
                $form = null;
                break;
        }

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if (isset($formData['cancelar'])) {
                return $this->_helper->redirector->goToRoute(array(), 'submissao', true);
            }
            try {
                if ($form->isValid($formData)) {
                    $uploadedData = $form->getValues();

                    $uploadedData['id_encontro'] = $id_encontro;
                    $uploadedData['responsavel'] = $id_pessoa;
                    $evento->insert($uploadedData);

                    $this->_helper->flashMessenger->addMessage(
                            array('success' => 'Trabalho submetido. Aguarde contato por e-mail.'));
                    return $this->_helper->redirector->goToRoute(array(
                                'controller' => 'evento'
                                    ), null, true);
                } else {
                    $form->populate($formData);
                }
            } catch (Zend_Db_Exception $ex) {
                $this->_helper->flashMessenger->addMessage(
                        array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                            . $ex->getMessage()));
            }
        }
        $this->view->menu->setAtivo('submissao');
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/form-evento.css'));
        $this->view->tipo = $tipo;
        $this->view->form = $form;
    }

    public function enviarArtigoAction()
    {
        $this->_autenticacao();

        $sessao = Zend_Auth::getInstance()->getIdentity();
        $id_pessoa = intval($sessao["idPessoa"]);
        // $id_encontro = intval($sessao["idEncontro"]); UNSAFE
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $id_encontro = (int) $ps->encontro["id_encontro"];
        $admin = $sessao["administrador"]; // boolean

        $encontro = new Application_Model_Encontro();
        $rs = $encontro->isPeriodoSubmissao($id_encontro);
        if ($rs['liberar_submissao'] == null and ! $admin) {
            $this->_helper->flashMessenger->addMessage(
                    array('notice' => "O Período de inscrição "
                        . "vai de {$rs['periodo_submissao_inicio']} até {$rs['periodo_submissao_fim']}."));
            return $this->_helper->redirector->goToRoute(array(
                        'controller' => 'evento'), 'default', true);
        }

        $form = new Application_Form_SubmissaoArtigo();
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if (isset($formData['cancelar'])) {
                return $this->_helper->redirector->goToRoute(array(), 'submissao', true);
            }
            if ($form->isValid($formData)) {
                $uploadedData = $form->getValues();
                try {
                    $uploadedData['id_encontro'] = $id_encontro;
                    $uploadedData['responsavel'] = $id_pessoa;
                    $uploadedData["id_tipo_evento"] = 4; // tipo artigo cientifico no db | TODO fazer define
                    $titulo = $uploadedData['nome_evento'];

                    // Salvando PDF na tabela artigo
                    $artigos_ids = $this->_artigoSalvaPdf(
                            $form->arquivo, $id_pessoa, $id_encontro, $titulo);

                    // Enviando artigo por email
                    $this->_artigoCriarEmail();
                    // Salvando o evento
                    $evento = new Application_Model_Evento();
                    $uploadedData["id_artigo"] = array_pop($artigos_ids);
                    unset($uploadedData["arquivo"]);
                    $evento->insert($uploadedData);
                    $this->_helper->flashMessenger->addMessage(
                            array('success' => 'Artigo enviado. '
                                . 'Aguarde contato por e-mail.'));
                    $this->_helper->redirector->goToRoute(array(
                        'controller' => 'evento'
                            ), null, true);
                } catch (Exception $ex) {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Ocorreu um erro inesperado. '
                                . 'Seu artigo <b>NÃO</b> foi submetido.<br/>'
                                . 'Detalhes: ' . $ex->getMessage()));
                }
            } else {
                $form->populate($formData);
            }
        }
        $this->view->menu->setAtivo('submissao');
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/form-evento.css'));
        $this->view->form = $form;
    }

    public function editarAction()
    {
        $this->_autenticacao();

        $sessao = Zend_Auth::getInstance()->getIdentity();
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $id_encontro = (int) $ps->encontro["id_encontro"];
        // $id_encontro = $sessao["idEncontro"]; // UNSAFE
        $admin = $sessao["administrador"]; // boolean
        $idPessoa = $sessao["idPessoa"];

        $encontro = new Application_Model_Encontro();
        $rs = $encontro->isPeriodoSubmissao($id_encontro);
        if ($rs['liberar_submissao'] == null and ! $admin) {
            $this->_helper->flashMessenger->addMessage(
                    array('notice' => "O Período de inscrição "
                        . "vai de {$rs['periodo_submissao_inicio']} até {$rs['periodo_submissao_fim']}."));
            return $this->_helper->redirector->goToRoute(array(
                        'controller' => 'evento'), 'default', true);
        }

        $this->view->menu->setAtivo('submissao');
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/tabela_sort.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/form-evento.css'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery.dataTables.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/evento/editar.js'));

        $data = $this->getRequest()->getPost();

        $idEvento = $this->_request->getParam('id', 0);
        $form = new Application_Form_Evento();
        $this->view->form = $form;

        $evento = new Application_Model_Evento();
        $evento_realizacao = new Application_Model_EventoRealizacao();

        $select = $evento->select();
        $select_realizacao = $evento_realizacao->select();

        /* lista de horários */
        $this->view->realizacao = array();
        $linhas_realizacao = $evento_realizacao->fetchAll($select_realizacao->where('id_evento = ?', $idEvento));

        foreach ($linhas_realizacao as $linha) {
            $sala = $linha->findDependentRowset('Application_Model_Sala')->current();
            $linha->data = date('d/m/Y', strtotime($linha->data));
            $concatena = array_merge($linha->toArray(), $sala->toArray());
            $this->view->realizacao[] = $concatena;
        }

        if (isset($data['cancelar'])) {
            return $this->_redirecionar($admin, $idEvento);
        }

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($data)) {
                $data = $form->getValues();
                $select = $evento->getAdapter()->quoteInto('id_evento = ?', $idEvento);
                try {
                    if ($idPessoa != $data['responsavel'] and ! $admin) {
                        $this->_helper->flashMessenger->addMessage(
                                array('error' => 'Somente o autor pode editar o Evento.'));
                        return $this->_redirecionar();
                    } else {
                        $evento->update($data, $select);
                        $this->_helper->flashMessenger->addMessage(
                                array('success' => 'Evento atualizado com sucesso.'));
                        return $this->_redirecionar($admin, $idEvento);
                    }
                } catch (Zend_Db_Exception $ex) {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                                . $ex->getMessage()));
                }
            } else {
                $form->populate($data);
            }
        } else {
            $row = $evento->fetchRow($select->where('id_evento = ?', $idEvento));
            if (!is_null($row)) {
                $array = $row->toArray();
                // verificar se ao editar o id_pessoa da sessão é o mesmo do evento
                // e se não é admin, sendo admin é permitido editar
                if ($idPessoa != $array['responsavel'] and ! $admin) {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Somente o autor pode editar o Evento.'));
                    return $this->_redirecionar();
                } else {
                    $form->populate($row->toArray());
                }
            } else {
                $this->_helper->flashMessenger->addMessage(
                        array('error' => 'Evento não encontrado.'));
                return $this->_redirecionar($admin, $idEvento);
            }
        }
    }

    public function programacaoAction()
    {
        // $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'staging');
        // $idEncontro = $config->encontro->codigo;
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];

        $evento_model = new Application_Model_Evento();
        $encontro_model = new Application_Model_Encontro();
        $isPeriodoSubmissao = $encontro_model->isPeriodoSubmissao($idEncontro);

        $this->view->menu->setAtivo('programacao');
        $this->view->lista = $evento_model->programacao($idEncontro);
        $this->view->isPeriodoSubmissao = true;
//        $this->view->isPeriodoSubmissao = $isPeriodoSubmissao["liberar_submissao"];
    }

    public function programacaoTvAction() {
        $this->_helper->layout->setLayout('full-page');
    }

    public function ajaxProgramacaoAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
//        $sessao = Zend_Auth::getInstance()->getIdentity();
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $id_encontro = (int) $ps->encontro["id_encontro"];

        $evento_model = new Application_Model_Evento();
        $json = new stdClass;
        $json->results = $evento_model->programacaoTv($id_encontro);

        header("Pragma: no-cache");
        header("Cache: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-type: text/json");
        echo json_encode($json);
    }

    public function ajaxProgramacaoTimelineAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $id_encontro = (int) $ps->encontro["id_encontro"];

        $evento_model = new Application_Model_Evento();
        $json = new stdClass;
        $json->results = $evento_model->programacaoTimeline($id_encontro);

        header("Pragma: no-cache");
        header("Cache: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-type: text/json");
        echo json_encode($json);
    }

    public function timelineAction() {
        $this->_helper->layout->setLayout("timeline");
    }

    public function timelineStaticAction() {
        $this->_helper->layout->setLayout("timeline");
    }

    public function interesseAction() {
        $this->_autenticacao();
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/tabela_sort.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/screen.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery-ui-1.8.16.custom.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery.ui.1.8.16.ie.css'));

        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery-ui-1.8.16.custom.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery.dataTables.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/evento/busca_evento.js'));

        $sessao = Zend_Auth::getInstance()->getIdentity();
//        $idEncontro = $sessao["idEncontro"]; // UNSAFE
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];
        $idPessoa = $sessao["idPessoa"];

        $eventos = new Application_Model_Evento();
        // usada para mostrar dias que possuem eventos
        $this->view->diasEncontro = $eventos->listarDiasDoEncontro($idEncontro);
        $this->view->idEncontro = $idEncontro;
        $this->view->idPessoa = $idPessoa;

        $tipoEventos = new Application_Model_TipoEvento();
        $this->view->tipoEvento = $tipoEventos->fetchAll();

        $eventoRealizacao = new Application_Model_EventoRealizacao();
        $eventoRealizacao = $eventoRealizacao->fetchAll();

        $this->view->eventosTabela = array();
        foreach ($eventoRealizacao as $item) {

            $eventoItem = $item->findDependentRowset('Application_Model_Evento')->current();
            $tipoItem = $eventoItem->findDependentRowset('Application_Model_TipoEvento')->current();

            $this->view->eventosTabela[] = array_merge($item->toArray(), $eventoItem->toArray(), $tipoItem->toArray());
        }

        $form = new Application_Form_PessoaAddEvento();
        $this->view->form = $form;

        $form->criarFormulario($this->view->eventosTabela);

        $data = $this->getRequest()->getPost();

        if ($this->getRequest()->isPost() && $form->isValid($data)) {
            $data = $form->getValues();
        }
    }

    public function desfazerInteresseAction() {
        $this->_autenticacao();
        $sessao = Zend_Auth::getInstance()->getIdentity();
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];
        $idPessoa = $sessao["idPessoa"];

        $model = new Application_Model_EventoDemanda();

        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            $id = (int) $this->getRequest()->getPost('id');

            if (!isset($id) || $id == 0) {
                $this->_helper->flashMessenger->addMessage(
                        array('error' => 'Evento não encontrado.'));
                $this->_helper->redirector->goToRoute(array(
                    'controller' => 'participante',
                    'action' => 'index'), 'default', true);
            } else if ($del == "confimar") {

                try {
                    $where = array(
                        "evento = ?" => $id,
                        "id_pessoa = ?" => $idPessoa);
                    $model->delete($where);
                    $this->_helper->flashMessenger->addMessage(
                            array('success' => 'Evento desmarcado com sucesso.'));
                } catch (Exception $e) {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                                . $e->getMessage()));
                }
            }
            $this->_helper->redirector->goToRoute(array(
                'controller' => 'participante',
                'action' => 'index'), 'default', true);
        } else {
            $id = $this->_getParam('id', 0);
            if ($id == 0) {
                $this->_helper->flashMessenger->addMessage(
                        array('error' => 'Evento não encontrado.'));
                $this->_helper->redirector->goToRoute(array(
                    'controller' => 'participante',
                    'action' => 'index'), 'default', true);
            } else {
//                $idEncontro = $sessao["idEncontro"]; // UNSAFE
                $where = array($idEncontro, $idPessoa, $id);
                try {
                    $this->view->evento = $model->lerEvento($where);
                } catch (Exception $e) {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                                . $e->getMessage()));
                    $this->_helper->redirector->goToRoute(array(
                        'controller' => 'participante',
                        'action' => 'index'), 'default', true);
                }
            }
        }
    }

    /**
     * Mapeada como
     *    /e/:id
     */
    public function verAction() {
        $this->view->menu->setAtivo('programacao');

        try {
            $idEvento = $this->_request->getParam('id', 0);
            $evento = new Application_Model_Evento();
            $data = $evento->buscaEventoPessoa($idEvento);
            if ($data == null) {
                $this->_helper->flashMessenger->addMessage(
                        array('notice' => 'Evento não encontrado.'));
                return $this->_helper->redirector->goToRoute(array(), 'programacao', true);
            } else {
                $this->view->evento = $data;
                $this->view->outros = $evento->buscarOutrosPalestrantes($idEvento);

                $modelTags = new Application_Model_EventoTags();
                $this->view->tags = $modelTags->listarPorEvento($idEvento);
            }
        } catch (Exception $e) {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                        . $e->getMessage()));
        }
    }

    public function outrosPalestrantesAction() {
        $this->view->menu->setAtivo('submissao');

        $evento = new Application_Model_Evento();
        $idEvento = $this->_request->getParam('id', 0);

        $cancelar = $this->getRequest()->getPost('cancelar');
        if (isset($cancelar)) {
            return $this->_helper->redirector->goToRoute(array(), 'submissao', true);
        }

        if ($this->getRequest()->isPost()) {
            $submit = $this->getRequest()->getPost('submit');
            if ($submit == "confimar") {
                $array_id_pessoas = explode(",", $this->getRequest()->getPost('array_id_pessoas'));

                if (count($array_id_pessoas) == 1 && empty($array_id_pessoas[0])) {
                    $this->_helper->flashMessenger->addMessage(
                            array('notice' => 'Nenhum palestrante foi selecionado.'));
                } else {
                    try {
                        $numParticipantes = 0;
                        foreach ($array_id_pessoas as $value) {
                            $value = intval($value);
                            $numParticipantes += $evento->adicionarPalestranteEvento($idEvento, $value);
                        }
                        $this->_helper->flashMessenger->addMessage(
                                array('success' => "{$numParticipantes} palestrante(s) adicionado(s) ao evento com sucesso."));
                    } catch (Zend_Db_Exception $ex) {
                        if ($ex->getCode() == 23505) {
                            $this->_helper->flashMessenger->addMessage(
                                    array('error' => 'Palestrante(s) já existe(m) no evento.'));
                        } else {
                            $this->_helper->flashMessenger->addMessage(
                                    array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                                        . $ex->getMessage()));
                        }
                    }
                }
            }
        }

        // listar palestrantes
        try {
            $data = $evento->buscaEventoPessoa($idEvento);
            if (empty($data)) {
                $this->_helper->flashMessenger->addMessage(
                        array('notice' => 'Evento não encontrado.'));
            } else {
                $this->view->evento = $data;

                // checa as permissão do usuário, para editar somente seus eventos
                $sessao = Zend_Auth::getInstance()->getIdentity();
                if ($this->view->evento['id_pessoa'] != $sessao['idPessoa']) {
                    $this->_helper->flashMessenger->addMessage(
                            array('notice' => 'Você não tem permissão de editar este evento.'));
                    return $this->_helper->redirector->goToRoute(array(), 'submissao', true);
                }
            }

            $palestrantes = $evento->getAdapter()->fetchAll("SELECT p.id_pessoa,
                  p.nome, p.email
           FROM evento_palestrante ep
           INNER JOIN pessoa p ON ep.id_pessoa = p.id_pessoa
           WHERE ep.id_evento = ?", array($idEvento));
            $this->view->palestrantes = $palestrantes;
        } catch (Exception $e) {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                        . $e->getMessage()));
        }
    }

    public function ajaxBuscarParticipanteAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $sessao = Zend_Auth::getInstance()->getIdentity();
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];
        $idPessoa = $sessao["idPessoa"];
//        $idEncontro = $sessao["idEncontro"]; // UNSAFE

        $model = new Application_Model_Pessoa();
        $termo = $this->_request->getParam("termo", "");

        $json = new stdClass;
        $json->results = array();

        $rs = $model->getAdapter()->fetchAll(
                "SELECT p.id_pessoa,
               p.email
         FROM pessoa p
         INNER JOIN encontro_participante ep ON p.id_pessoa = ep.id_pessoa
         WHERE p.email LIKE lower(?)
         AND p.id_pessoa <> ?
         AND ep.id_encontro = ?
         AND ep.validado = true ", array("{$termo}%", $idPessoa, $idEncontro));
        $json->size = count($rs);
        foreach ($rs as $value) {
            $obj = new stdClass;
            $obj->id = "{$value['id_pessoa']}";
            $obj->text = "{$value['email']}";
            array_push($json->results, $obj);
        }

        header("Pragma: no-cache");
        header("Cache: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-type: text/json");
        echo json_encode($json);
    }

    public function deletarArtigoAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $id_artigo = $this->_getParam('artigo', 0);
        $id_evento = $this->_getParam('evento', 0);
        $model_pessoa = new Application_Model_Pessoa();
        $model_evento = new Application_Model_Evento();

        try {
            if ($id_artigo < 1 || $id_evento < 1) {
                throw new Exception("Parâmetros inválidos. Tente novamente do início ou contate o administrador.");
            }

            $this->_autenticacao();
            $sessao = Zend_Auth::getInstance()->getIdentity();
            $id_pessoa_sessao = $sessao["idPessoa"];
            $id_pessoa_db = $model_evento->getResponsavel($id_evento);
            if ($id_pessoa_db != $id_pessoa_sessao && !$model_pessoa->isAdmin()) {
                throw new Exception("Você não é administrador para executar esta ação.");
            }
            $model_evento->deletarEvento($id_evento);
            $this->_helper->flashMessenger->addMessage(
                    array('success' => 'Artigo removido com sucesso.'));
        } catch (Exception $e) {
            $model_evento->getAdapter()->rollBack();
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Ocorreu erro. ' . $e->getMessage()));
        }
        $this->_helper->redirector->goToRoute(array(
            'controller' => 'evento',
            'action' => 'index',
                ), 'default', true);
    }

    public function deletarEventoAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $id_evento = $this->_getParam('evento', 0);
        $model_pessoa = new Application_Model_Pessoa();
        $model_evento = new Application_Model_Evento();

        try {
            if ($id_evento < 1) {
                throw new Exception("Parâmetros inválidos. Tente novamente do início ou contate o administrador.");
            }

            $this->_autenticacao();
            $sessao = Zend_Auth::getInstance()->getIdentity();
            $id_pessoa_sessao = $sessao["idPessoa"];
            $id_pessoa_db = $model_evento->getResponsavel($id_evento);
            if ($id_pessoa_db != $id_pessoa_sessao && !$model_pessoa->isAdmin()) {
                throw new Exception("Você não é administrador para executar esta ação.");
            }
            $model_evento->deletarEvento($id_evento);
            $this->_helper->flashMessenger->addMessage(
                    array('success' => 'Evento removido com sucesso.'));
        } catch (Exception $e) {
            if ($e->getCode() == 23503) {
                $this->_helper->flashMessenger->addMessage(
                        array(
                            'alert' => 'Você não pode deletar este evento, por um dos seguintes motivos:<br>'.
                        '<ul><li>um horário está marcado, ou seja, está na programação;</li>'.
                        '<li>um outro palestrante foi adicionado.</li></ul>'));
            } else {
                $this->_helper->flashMessenger->addMessage(
                        array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                            . $e->getMessage()));
            }
        }
        $this->_helper->redirector->goToRoute(array(
            'controller' => 'evento',
            'action' => 'index',
                ), 'default', true);
    }

    public function deletarPalestranteAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $pessoa = $this->_getParam('pessoa', 0);
        $evento = $this->_getParam('evento', 0);
        if ($pessoa > 0 and $evento > 0) {
            $model = new Application_Model_Evento();
            try {
                $model->getAdapter()->delete("evento_palestrante", "id_pessoa = {$pessoa} AND id_evento = {$evento}");
                $this->_helper->flashMessenger->addMessage(
                        array('success' => 'Palestrante removido do evento com sucesso.'));
            } catch (Exception $e) {
                $this->_helper->flashMessenger->addMessage(
                        array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                            . $e->getMessage()));
            }
        } else {
            $this->_helper->flashMessenger->addMessage(
                    array('notice' => 'Nenhum palestrante foi selecionado.'));
        }
        $this->_helper->redirector->goToRoute(array('controller' => 'evento',
            'action' => 'outros-palestrantes', 'id' => $evento), 'default', true);
    }

    public function tagsAction() {
        $this->view->menu->setAtivo('submissao');
        $model = new Application_Model_EventoTags();
        $idEvento = $this->_getParam('id', 0);
        $this->view->tags = $model->listarPorEvento($idEvento);

        $evento = new Application_Model_Evento();
        $data = $evento->buscaEventoPessoa($idEvento);
        if (empty($data)) {
            $this->_helper->flashMessenger->addMessage(
                    array('notice' => 'Evento não encontrado.'));
            return $this->_helper->redirector->goToRoute(array(), 'submissao', true);
        } else {
            $this->view->evento = $data;
        }
    }

    public function ajaxBuscarTagsAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $model = new Application_Model_EventoTags();
        $termo = $this->_getParam('termo', "");
        $rs = $model->listarTags($termo);

        $json = new stdClass;
        $json->itens = array();
        foreach ($rs as $value) {
            $obj = new stdClass;
            $obj->id = "{$value['id']}";
            $obj->text = "{$value['descricao']}";
            array_push($json->itens, $obj);
        }

        header("Pragma: no-cache");
        header("Cache: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-type: text/json");
        echo json_encode($json);
    }

    public function ajaxSalvarTagAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $model = new Application_Model_EventoTags();
        $json = new stdClass;
        try {
            $id_tag = $this->_getParam('id', 0);
            $id_evento = $this->_getParam('id_evento', 0);
            $id = $model->insert(array('id_tag' => $id_tag, 'id_evento' => $id_evento));
            if ($id > 0) {
                $json->ok = true;
                $json->msg = "Tag adicionada com sucesso.";
            } else {
                $json->ok = false;
                $json->erro = "Ocorreu um erro inesperado ao salvar <b>tag</b>.";
            }
        } catch (Exception $e) {
            if ($e->getCode() == 23505) {
                $json->erro = "Tag já existe.";
            } else {
                $json->erro = "Ocorreu um erro inesperado ao salvar <b>tag</b>.<br/>Detalhes"
                        . $e->getMessage();
            }
            $json->ok = false;
        }

        header("Pragma: no-cache");
        header("Cache: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-type: text/json");
        echo json_encode($json);
    }

    public function ajaxCriarTagAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $model = new Application_Model_EventoTags();
        $json = new stdClass;
        try {
            $descricao = $this->_getParam('descricao', "");
            $model->getAdapter()->insert("tags", array('descricao' => $descricao));
            $json->ok = true;
            $json->id = $model->getAdapter()->lastSequenceId("tags_id_seq");
        } catch (Exception $e) {
            if ($e->getCode() == 23505) {
                $json->erro = "Tag já existe.";
            } else {
                $json->erro = "Ocorreu um erro inesperado ao criar <b>tag</b>.<br/>Detalhes"
                        . $e->getMessage();
            }
            $json->ok = false;
        }

        header("Pragma: no-cache");
        header("Cache: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-type: text/json");
        echo json_encode($json);
    }

    public function ajaxDeletarTagAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $model = new Application_Model_EventoTags();
        $json = new stdClass;
        try {
            $id = $this->_getParam('id', 0);
            $id_evento = $this->_getParam('id_evento', 0);
            $affected = $model->delete("id_tag = {$id} AND id_evento = {$id_evento}");
            if ($affected > 0) {
                $json->ok = true;
                $json->msg = "Tag removida com sucesso.";
            } else {
                $json->erro = "Tag não encontrada.";
                $json->ok = false;
            }
        } catch (Exception $e) {
            $json->erro = "Ocorreu um erro inesperado ao deletar <b>tag</b>.<br/>Detalhes"
                    . $e->getMessage();
            $json->ok = false;
        }

        header("Pragma: no-cache");
        header("Cache: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-type: text/json");
        echo json_encode($json);
    }

    private function _redirecionar($admin = false, $id = 0) {
        if ($admin) {
            $this->_helper->redirector->goToRoute(array(
                'module' => 'admin',
                'controller' => 'evento',
                'action' => 'detalhes',
                'id' => $id), 'default', true);
        } else {
            $this->_helper->redirector->goToRoute(array(), 'submissao', true);
        }
    }

    public function downloadArtigoAction() {
        $this->_autenticacao();
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();

        $sessao = Zend_Auth::getInstance()->getIdentity();
        $idPessoa = $sessao["idPessoa"];
        $admin = $sessao["administrador"];

        $id_artigo = (int) $this->getRequest()->getParam("artigo", 0);
        if ($id_artigo < 1) {
            return $this->_redirecionar($admin);
        }

        $model_artigo = new Application_Model_Artigo();
        $result = $model_artigo->getArtigo($id_artigo);

        if ($result != NULL) {
            // Verifica se tem permissao
            if (!$admin && $result["responsavel"] != $idPessoa) {
                $this->_helper->flashMessenger->addMessage(
                        array('error' => 'Este artigo não lhe pertence. Você não tem permissão para ler artigos alheios.'));
                return $this->_redirecionar();
            }

            $pdf = $result['dados'];
            header('Content-type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $result['nomearquivo_original'] . '"');

            try {
                echo base64_decode($pdf);
            } catch (Zend_Pdf_Exception $e) {
                $this->_helper->flashMessenger->addMessage(
                        array('error' => 'O arquivo não é um documento pdf válido.<br/>Detalhes: '
                            . $e->getMessage()));
            }
        } else {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Não foi possível carregar o Artigo.'));
            return $this->_helper->redirector->goToRoute(array(
                        'module' => 'evento',
                        'controller' => 'index'), 'default', false);
        }
    }

    private function _artigoSalvaPdf($p_arquivo, $responsavel, $id_encontro, $titulo) {
        $files = $p_arquivo->getFileInfo();
        $artigos = array();
        foreach ($files as $fileInfo) {
            try {
                $source = $fileInfo['tmp_name'];
                $nome = $fileInfo['name'];
                $tamanho = $fileInfo['size'];

//            Zend_Debug::dump($p_arquivo, '$p_arquivo');
//            Zend_Debug::dump($fileInfo);
//            exit;

                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $source);
                if (strcmp($mime, 'application/pdf') == 0) {
                    $data = file_get_contents($source);
                    $escaped = bin2hex($data);

                    $model = new Application_Model_Artigo();
                    $id_artigo = $model->inserirDocumento($escaped, $nome, $tamanho, $responsavel, $id_encontro, $titulo);
                    array_push($artigos, $id_artigo);
                } else {
                    throw new Exception("Este arquivo PDF pode estar corrompido. "
                    . "Por favor, verifique se o arquivo é realmente um PDF válido.");
                }
            } catch (Zend_Db_Exception $e) {
                throw $e;
            } catch (Exception $e) {
                throw $e;
            }
        }
        return $artigos;
    }

    private function _artigoCriarEmail() {
        // TODO
    }

}
