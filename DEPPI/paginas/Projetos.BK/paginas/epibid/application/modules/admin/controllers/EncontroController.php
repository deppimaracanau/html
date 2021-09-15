<?php

class Admin_EncontroController extends Zend_Controller_Action {

    public function init() {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $session = new Zend_Session_Namespace();
            $session->setExpirationSeconds(60 * 60 * 1); // 1 minuto
            $session->url = $_SERVER['REQUEST_URI'];
            return $this->_helper->redirector->goToRoute(array(), 'login', true);
        }

        $sessao = Zend_Auth::getInstance()->getIdentity();
        if (!$sessao["administrador"]) {
            return $this->_helper->redirector->goToRoute(array('controller' => 'participante',
                        'action' => 'index'), 'default', true);
        }
        $this->view->menu = new Application_Form_Menu($this->view, 'admin', true);
    }

    public function indexAction() {
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/tabela_sort.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/screen.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/prettify.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery-ui-1.8.16.custom.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery.ui.1.8.16.ie.css'));

        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery.dataTables.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/prettify.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/init.prettify.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/admin/encontro/index.js'));

        $model = new Admin_Model_Encontro();
        $this->view->lista = $model->listar();

        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'emailmsg');
        $this->view->confirmacao_inscricao = $config->email->confirmacao_inscricao;
        $this->view->recuperacao_senha = $config->email->recuperacao_senha;
        $this->view->confirmacao_submissao = $config->email->confirmacao_submissao;
    }

    public function criarAction() {
        $form = new Admin_Form_Encontro();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();

            if (isset($formData['cancelar'])) {
                return $this->_helper->redirector->goToRoute(array(
                            'module' => 'admin',
                            'controller' => 'encontro'
                                ), 'default', true);
            }

            if ($form->isValid($formData)) {
                $values = $form->getValues();
                $model = new Admin_Model_Encontro();
                $modelMensagem = new Admin_Model_MensagemEmail();

                $model->getAdapter()->beginTransaction();
                try {

                    $id = $model->criar($values);
                    $modelMensagem->criarMensagensPadrao(
                            $id, $values['apelido_encontro']
                    );
                    $model->getAdapter()->commit();
                    $this->_helper->flashMessenger->addMessage(
                            array('success' => 'Encontro criado com sucesso.'));
                    return $this->_helper->redirector->goToRoute(array(
                                'module' => 'admin',
                                'controller' => 'encontro',
                                'action' => 'index'), 'default', true);
                } catch (Exception $e) {
                    $model->getAdapter()->rollBack();
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                                . $e->getMessage()));
                }
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editarAction() {
        $form = new Admin_Form_Encontro();
        $this->view->form = $form;
        $model = new Admin_Model_Encontro();

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();

            if (isset($formData['cancelar'])) {
                return $this->_helper->redirector->goToRoute(array(
                            'module' => 'admin',
                            'controller' => 'encontro'
                                ), 'default', true);
            }

            if ($form->isValid($formData)) {
                $id_encontro = $this->getRequest()->getParam('id', 0);
                $values = $form->getValues();

                try {
                    $model->atualizar($values, $id_encontro);
                    $this->_helper->flashMessenger->addMessage(
                            array('success' => 'Encontro atualizado com sucesso.'));
                    return $this->_helper->redirector->goToRoute(array(
                                'module' => 'admin',
                                'controller' => 'encontro',
                                'action' => 'index'), 'default', true);
                } catch (Exception $e) {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                                . $e->getMessage()));
                }
            } else {
                $form->populate($formData);
            }
        } else {
            $id_encontro = $this->_getParam('id', 0);
            if ($id_encontro > 0) {
                $array = $model->ler($id_encontro);
                $form->populate($array);
            }
        }
    }

    public function editarMensagemEmailConfirmacaoAction() {
        $form = new Admin_Form_MensagemEmail();
        $this->view->form = $form;
        $model = new Admin_Model_MensagemEmail();

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();

            if (isset($formData['cancelar'])) {
                return $this->_helper->redirector->goToRoute(array(
                            'module' => 'admin',
                            'controller' => 'encontro'
                                ), 'default', true);
            }

            if ($form->isValid($formData)) {
                $data = array(
                    'mensagem' => $form->getValue('mensagem'),
                    'assunto' => $form->getValue('assunto'),
                    'link' => $form->getValue('link'),
                    'assinatura_email' => $form->getValue('assinatura_email'),
                    'assinatura_siteoficial' => $form->getValue('assinatura_siteoficial'),
                );
                $idEncontro = (int) $form->getValue('id_encontro');
                $idTipoMensagem = (int) $form->getValue('id_tipo_mensagem_email');
                try {
                    $model->update($data, "id_encontro = {$idEncontro}
                     AND id_tipo_mensagem_email = {$idTipoMensagem}");
                    $this->_helper->flashMessenger->addMessage(
                            array('success' => 'Mensagem atualizada com sucesso.'));
                    return $this->_helper->redirector->goToRoute(array(
                                'module' => 'admin',
                                'controller' => 'encontro',
                                'action' => 'index'), 'default', true);
                } catch (Exception $e) {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                                . $e->getMessage()));
                }
            } else {
                $form->populate($formData);
            }
        } else {
            $id = (int) $this->_getParam('id', 0);
            $id_tipo_mensagem = (int) $this->_getParam('id_tipo_mensagem', 0);
            if ($id > 0 and $id_tipo_mensagem > 0) {
                $row = $model->fetchRow("id_encontro = {$id} AND id_tipo_mensagem_email = {$id_tipo_mensagem}"); // TODO FIXME SQL Injection
                $form->populate($row->toArray());
            }
        }
    }

    public function editarMensagemCertificadoAction() {
        $tipo_mensagem = $this->_getParam('tipo_mensagem_certificado');
        switch ($tipo_mensagem) {
            case "certificados_template_participante_encontro":
                $this->view->titulo = "Template Participante Encontro";
                break;
            case "certificados_template_palestrante_evento":
                $this->view->titulo = "Template Palestrante Evento";
                break;
            case "certificados_template_participante_evento":
                $this->view->titulo = "Template Participante Evento";
                break;
            default:
                throw new Exception("Tipo de certificado desconhecido.");
        }

        $form = new Admin_Form_MensagemCertificado();
        $model_encontro = new Admin_Model_Encontro();

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();

            if (isset($formData['cancelar'])) {
                return $this->_helper->redirector->goToRoute(array(
                            'module' => 'admin',
                            'controller' => 'encontro'
                                ), 'default', true);
            }

            if ($form->isValid($formData)) {
                $id_encontro = (int) $form->getValue('id_encontro');
                $tipo_mensagem = $form->getValue('tipo_mensagem_certificado');

                if ($id_encontro < 1) {
                    throw new Exception("Encontro não detectado.");
                }

                $data = array(
                    $tipo_mensagem => $form->getValue("mensagem"),
                );

                try {
                    $model_encontro->update($data, "id_encontro = {$id_encontro}");
                    $this->_helper->flashMessenger->addMessage(
                            array('success' => 'Mensagem atualizada com sucesso.'));
                    return $this->_helper->redirector->goToRoute(array(
                                'module' => 'admin',
                                'controller' => 'encontro',
                                'action' => 'index'), 'default', true);
                } catch (Exception $e) {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                                . $e->getMessage()));
                }
            } else {
                $form->populate($formData);
            }
        } else {
            $id_encontro = (int) $this->_getParam('id_encontro');
            $tipo_mensagem = $this->_getParam('tipo_mensagem_certificado');
            if ($id_encontro > 0 and ! empty($tipo_mensagem)) {
                $row = $model_encontro->lerMensagemCertificado($id_encontro, $tipo_mensagem);
                $row["tipo_mensagem_certificado"] = $tipo_mensagem;
                $form->populate($row);
            }
        }
        $this->view->form = $form;
    }

}
