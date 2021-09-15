<?php

class ParticipanteController extends Zend_Controller_Action
{

    public function init()
    {
        $sessao = Zend_Auth::getInstance()->getIdentity();
        // if (!is_array($sessao) || !isset($sessao['administrador'])) {
        //     Zend_Auth::getInstance()->clearIdentity();
        //     $this->autenticacao();
        // }
        $this->view->menu = new Application_Form_Menu($this->view, 'inicio', $sessao['administrador']);
    }

    private function autenticacao()
    {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $session = new Zend_Session_Namespace();
            $session->setExpirationSeconds(60 * 60 * 1); // 1 minuto
            $session->url = $_SERVER['REQUEST_URI'];
            return $this->_helper->redirector->goToRoute(array(), 'login', true);
        }
    }

    public function indexAction()
    {
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/tabela_sort.css'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery.dataTables.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/participante/inicio.js'));

        $this->autenticacao();
        $sessao = Zend_Auth::getInstance()->getIdentity();
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];
        $idPessoa = $sessao["idPessoa"];
        // $idEncontro = $sessao["idEncontro"]; // UNSAFE

        $eventoDemanda = new Application_Model_EventoDemanda();
        $eventoParticipante = $eventoDemanda->listar(array($idEncontro, $idPessoa));
        $this->view->listaParticipanteEventoTabela = $eventoParticipante;
    }

    /**
     * Mapeada como /participar
     */
    public function criarAction()
    {
        $this->view->headScript()->appendFile($this->view->baseUrl('lib/select2/select2.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/parsley.i18n/messages.pt_br.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/parsley.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/participante/criar.js'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/form.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('lib/select2/select2.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/participante/criar.css'));

        $this->view->menu = "";
        $form = new Application_Form_Pessoa();
        $this->view->form = $form;
        $data = $this->getRequest()->getPost();

        if ($this->getRequest()->isPost() && $form->isValid($data)) {
            $data = $form->getValues();
            $pessoa = new Application_Model_Pessoa();
            $participante = new Application_Model_Participante();

            // $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'staging');
            // $idEncontro = $config->encontro->codigo;
            $cache = Zend_Registry::get('cache_common');
            $ps = $cache->load('prefsis');
            $idEncontro = (int) $ps->encontro["id_encontro"];

            $data2 = array(
                'id_encontro' => $idEncontro,
                'id_municipio' => $data['municipio'],
                'id_instituicao' => $data['instituicao']
            );
            unset($data['municipio']);
            unset($data['instituicao']);
            unset($data['captcha']);
            // inseri no banco ... e mantem uma trasacao
            $adapter = $pessoa->getAdapter();
            try {
                $adapter->beginTransaction();
                $idPessoa = $pessoa->insert($data);
                $data2['id_pessoa'] = $idPessoa;
                $participante->insert($data2);
            } catch (Zend_Db_Exception $ex) {
                $adapter->rollBack();
                $sentinela = 1;

                if ($ex->getCode() == 23505) {
                    $this->_helper->flashMessenger->addMessage(
                            array('alert' => 'Você já está cadastrado. '
                                . '<a href="'
                                . $this->view->url(array(
                                    'controller' => 'index',
                                    'action' => 'login',
                                        ), 'default', true)
                                . '">Entre</a> agora mesmo. <br/>'
                                . 'Caso não lembre da senha, tente <a href="'
                                . $this->view->url(array(
                                    'controller' => 'index',
                                    'action' => 'recuperar-senha',
                                        ), 'default', true)
                                . '">recuperar sua senha</a>.'));
                } else {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                                . $ex->getMessage()));
                }
                $form->populate($data);
                return $this->_helper->redirector->goToRoute(array(
                            'controller' => 'participante',
                            'action' => 'criar'
                ));
            }
            // codigo responsavel por enviar email para confirmacao
            try {
                if (!empty($idPessoa) and $idPessoa > 0) {
                    $mail = new Application_Model_EmailConfirmacao();
                    $mail->send($idPessoa, $idEncontro);
                    $data = array(
                        'email_enviado' => 'true'
                    );
                    $where = $pessoa->getAdapter()->quoteInto('id_pessoa = ?', $idPessoa);
                    $pessoa->update($data, $where);
                }
            } catch (Exception $ex) {
                $adapter->rollBack();
                $sentinela = 1;
                $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Ocorreu um erro inesperado ao enviar e-mail.<br/>Detalhes: '
                        . $ex->getMessage())
                );
            }

            if ($sentinela == 0) {
                $adapter->commit();
                return $this->_helper->redirector->goToRoute(array(
                            'controller' => 'participante',
                            'action' => 'sucesso'
                                ), 'default', true);
            }
        }
    }

    public function editarAction()
    {
        $this->autenticacao();
        $this->view->headScript()->appendFile($this->view->baseUrl('js/participante/jquery-ui-1.10.0.tabs-only.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('lib/select2/select2.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/participante/editar.js'));

        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/form.css'));

        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/screen.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery-ui-1.8.16.custom.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery.ui.1.8.16.ie.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('lib/select2/select2.css'));

        $sessao = Zend_Auth::getInstance()->getIdentity();
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];
        $idPessoa = $sessao["idPessoa"];
        // $idEncontro = $sessao["idEncontro"]; // UNSAFE
        $form = new Application_Form_PessoaEdit();
        $this->view->form = $form;

        $pessoa = new Application_Model_Pessoa();
        $participante = new Application_Model_Participante();

        $result = $pessoa->find($idPessoa);
        $linha = $result[0];

        $result = $participante->find($idPessoa, $idEncontro);
        $linha1 = $result[0];

        $form->populate(array_merge($linha->toArray(), $linha1->toArray()));

        $data = $this->getRequest()->getPost();

        if ($this->getRequest()->isPost() && $form->isValid($data)) {
            $data = $form->getValues();

            $data2 = array(
                'id_encontro' => $idEncontro,
                'id_municipio' => $data['id_municipio'],
                'id_instituicao' => $data['id_instituicao']
            );

            unset($data['id_municipio']);
            unset($data['id_instituicao']);
            //alterar no banco ... e mantem uma trasacao
            $sentinela = 0;
            $adapter = $pessoa->getAdapter();
            try {
                $adapter->beginTransaction();

                $where = $pessoa->getAdapter()->quoteInto('id_pessoa = ?', $idPessoa);
                $pessoa->update($data, $where);
                $data2['id_pessoa'] = $idPessoa;
                $where = $participante->getAdapter()
                                ->quoteInto('id_pessoa = ?', $idPessoa)
                        . $participante->getAdapter()
                                ->quoteInto(' AND id_encontro = ? ', $idEncontro);
                $participante->update($data2, $where);
                $adapter->commit();
            } catch (Zend_Db_Exception $ex) {
                $adapter->rollBack();
                $sentinela = 1;
                $form->getElement('email')->setAttrib('mensagem', 'e-mail invalido');
                $this->_helper->flashMessenger->addMessage(
                        array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                            . $ex->getMessage()));
            }

            // codigo responsavel por enviar email para confirmacao
            if ($sentinela == 0) {
                return $this->_helper->redirector->goToRoute(array(
                            'controller' => 'participante',
                            'action' => 'index'
                                ), 'default', true);
            }
        }
    }

    public function sucessoAction() {
        $this->view->menu = "";
    }

    public function alterarSenhaAction() {
        $this->autenticacao();
        $this->view->menu->setAtivo('alterarsenha');

        $form = new Application_Form_AlterarSenha();
        $this->view->form = $form;
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/form.css'));

        $data = $this->getRequest()->getPost();
        if (isset($data['cancelar'])) {
            return $this->_helper->redirector->goToRoute(array(
                        'controller' => 'participante'
                            ), 'default', true);
        }

        if ($this->getRequest()->isPost() && $form->isValid($data)) {
            $data = $form->getValues();

            $pessoa = new Application_Model_Pessoa();

            $resultadoConsulta = $pessoa->avaliaLogin($data['email'], $data['senhaAntiga']);

            if ($resultadoConsulta != null) {

                if ($resultadoConsulta['valido']) {

                    if ($data['senhaNova'] == $data['senhaNovaRepeticao']) {
                        $where = $pessoa->getAdapter()->quoteInto('id_pessoa = ?', $resultadoConsulta['id_pessoa']);

                        $novaSennha = array(
                            'senha' => md5($data['senhaNova'])
                        );
                        $pessoa->update($novaSennha, $where);

                        return $this->_helper->redirector->goToRoute(array(
                                    'controller' => 'participante'
                                        ), 'default', true);
                    } else {
                        $this->_helper->flashMessenger->addMessage(
                                array('error' => 'Nova senha não confere!'));
                    }
                } else {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Senha antiga incorreta!'));
                }
            }
        }
    }

    public function verAction() {
        $model = new Application_Model_Pessoa();
        $id = $this->_getParam('id', "");
        if (!empty($id)) {
            if (is_numeric($id)) {
                $sql = $model->getAdapter()->quoteInto('id_pessoa = ?', $id);
            } else {
                $sql = $model->getAdapter()->quoteInto('twitter = ?', $id);
            }
            $this->view->mostrarEditar = false;
        } else if (Zend_Auth::getInstance()->hasIdentity()) {
            $sessao = Zend_Auth::getInstance()->getIdentity();
            if (!empty($sessao["twitter"])) {
                $sql = $model->getAdapter()->quoteInto('twitter = ?', $sessao["twitter"]);
                $id = $sessao["twitter"];
            } else {
                $sql = $model->getAdapter()->quoteInto('id_pessoa = ?', $sessao["idPessoa"]);
                $id = $sessao["idPessoa"];
            }
            $this->view->mostrarEditar = true;
        } else {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Participante não encontrado.'));
            return;
        }
        $this->view->id = $id;
        $this->view->user = $model->fetchRow($sql);
        try {
            $this->view->slides = $model->listarSlideShare($this->view->user->slideshare);
        } catch (Exception $e) {
            $this->view->slideshareError = $e->getMessage();
        }
    }

    public function certificadosAction()
    {
        $this->autenticacao();
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/screen.css'));

        $sessao = Zend_Auth::getInstance()->getIdentity();
        // $cache = Zend_Registry::get('cache_common');
        // $ps = $cache->load('prefsis');
        $id_pessoa = $sessao["idPessoa"];
        $this->view->menu->setAtivo('certificados');

        $model = new Application_Model_Participante();
        $this->view->certsParticipanteEncontro = $model->listarCertificadosParticipanteEncontro($id_pessoa);
        $this->view->certsParticipanteEvento = $model->listarCertificadosParticipanteEvento($id_pessoa);
        // $this->view->certsParticipanteEvento = array();
        // $this->view->certsPalestrante = array_merge($model->listarCertificadosPalestrante($id_pessoa), $model->listarCertificadosPalestrantesOutros($id_pessoa), $model->listarCertificadosPalestrantesArtigos($id_pessoa));
        $this->view->certsPalestrante = array_merge($model->listarCertificadosPalestrante($id_pessoa), $model->listarCertificadosPalestrantesOutros($id_pessoa));
    }

    public function certificadoParticipanteEncontroAction()
    {
        $this->autenticacao();
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $sessao = Zend_Auth::getInstance()->getIdentity();
        // $cache = Zend_Registry::get('cache_common');
        // $ps = $cache->load('prefsis');
        $id_pessoa = $sessao["idPessoa"];
        $id_encontro = $this->_getParam('id_encontro', 0);

        $model = new Application_Model_Participante();
        $rs = $model->listarCertificadosParticipanteEncontro($id_pessoa, $id_encontro);

        if (is_null($rs)) {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Este certificado ainda não está disponível.'));
            return $this->_helper->redirector->goToRoute(array(
                        'controller' => 'participante',
                        'action' => 'certificados'), 'default', true);
        }

        try {
            $certificado = new Sige_Pdf_Certificado();
            $pdfData = $certificado->participanteEncontro(array(
                'nome' => $rs['nome'],
                'id_encontro' => $rs['id_encontro'], // serve para identificar o modelo
                'encontro' => $rs['nome_encontro'],
            ));
            $filename = "certificado_participante_"
                    . $this->_stringToFilename($rs["nome_encontro"])
                    . ".pdf";
            header("Content-Disposition: inline; filename={$filename}");
            header("Content-type: application/x-pdf");
            echo $pdfData;
        } catch (Exception $e) {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                        . $e->getMessage()));
            return $this->_helper->redirector->goToRoute(array(
                        'controller' => 'participante',
                        'action' => 'certificados'), 'default', true);
        }
    }

    // TODO
    public function certificadoParticipanteEventoAction()
    {
        $this->autenticacao();
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $sessao = Zend_Auth::getInstance()->getIdentity();
        // $cache = Zend_Registry::get('cache_common');
        // $ps = $cache->load('prefsis');
        $id_pessoa = $sessao["idPessoa"];
        $id_evento = $this->_getParam('id_evento', 0);

        $model = new Application_Model_Participante();
        $rs = $model->listarCertificadosParticipanteEvento($id_pessoa, $id_evento);

        if (is_null($rs)) {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Este certificado ainda não está disponível.'));
            return $this->_helper->redirector->goToRoute(array(
                        'controller' => 'participante',
                        'action' => 'certificados'), 'default', true);
        }

        try {
            $certificado = new Sige_Pdf_Certificado();
            $pdfData = $certificado->participanteEvento(array(
                'nome' => $rs['nome'],
                'id_encontro' => $rs['id_encontro'], // serve para identificar o modelo
                'encontro' => $rs['nome_encontro'],
                'nome_tipo_evento' => $rs['nome_tipo_evento'],
                'nome_evento' => $rs['nome_evento'],
                'carga_horaria' => $rs['carga_horaria'],
            ));
            $filename = "certificado_participante_"
                    . $this->_stringToFilename($rs["nome_encontro"])
                    . ".pdf";
            header("Content-Disposition: inline; filename={$filename}");
            header("Content-type: application/x-pdf");
            echo $pdfData;
        } catch (Exception $e) {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                        . $e->getMessage()));
            return $this->_helper->redirector->goToRoute(array(
                        'controller' => 'participante',
                        'action' => 'certificados'), 'default', true);
        }
    }

    public function certificadoPalestranteAction()
    {
        $this->autenticacao();
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $sessao = Zend_Auth::getInstance()->getIdentity();
        // $cache = Zend_Registry::get('cache_common');
        // $ps = $cache->load('prefsis');
        $id_pessoa = $sessao["idPessoa"];
        $id_evento = $this->_getParam('id', 0);

        $model = new Application_Model_Participante();
        $rs = $model->listarCertificadosPalestrante($id_pessoa, $id_evento);
        // palestrante em evento_palestrante
        if (is_null($rs)) {
            $rs = $model->listarCertificadosPalestrantesOutros($id_pessoa, $id_evento);
        }
        // if (is_null($rs)) {
        //     $rs = $model->listarCertificadosPalestrantesArtigos($id_pessoa, $id_evento);
        // }

        if (is_null($rs)) {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Este certificado ainda não está disponível.'));
            return $this->_helper->redirector->goToRoute(array(
                        'controller' => 'participante',
                        'action' => 'certificados'), 'default', true);
        }

        try {
            $certificado = new Sige_Pdf_Certificado();
            // Get PDF document as a string
            $pdfData = $certificado->palestranteEvento(array(
                'nome' => $rs['nome'],
                'id_encontro' => $rs['id_encontro'], // serve para identificar o modelo
                'encontro' => $rs['nome_encontro'],
                'tipo_evento' => $rs['nome_tipo_evento'],
                'nome_evento' => $rs['nome_evento'],
                'carga_horaria' => $rs['carga_horaria'],
            ));
            $filename = "certificado_palestrante_"
                    . $this->_stringToFilename($rs["nome_encontro"]) . "_"
                    . $this->_stringToFilename($rs["nome_evento"])
                    . ".pdf";
            header("Content-Disposition: inline; filename={$filename}");
            header("Content-type: application/x-pdf");
            echo $pdfData;
        } catch (Exception $e) {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                        . $e->getMessage()));
            return $this->_helper->redirector->goToRoute(array(
                        'controller' => 'participante',
                        'action' => 'certificados'), 'default', true);
        }
    }

    private function _utf8_remove_acentos($str)
    {
        $keys = array();
        $values = array();
        $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
        $to = "aaaaeeiooouucAAAAEEIOOOUUC";
        preg_match_all('/./u', $from, $keys);
        preg_match_all('/./u', $to, $values);
        $mapping = array_combine($keys[0], $values[0]);
        return strtr($str, $mapping);
    }

    private function _stringToFilename($str)
    {
        $str = strtolower($this->_utf8_remove_acentos($str));
        $str = preg_replace("/ /", "_", $str);
        $str = preg_replace("/[^a-zA-Z0-9_\s]/", "", $str);
        return $str;
    }

    private function fixObjectSession(&$object)
    {
        if (!is_object($object) && gettype($object) == 'object')
            return ($object = unserialize(serialize($object)));
        return $object;
    }
}
