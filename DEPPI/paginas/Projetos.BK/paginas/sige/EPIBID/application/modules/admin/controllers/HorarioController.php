<?php

class Admin_HorarioController extends Zend_Controller_Action {

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

    public function criarAction() {
        $idEvento = $this->_request->getParam('id');

        $form = new Application_Form_Horarios();
        $form->cria();
        $this->view->form = $form;

        $model = new Application_Model_EventoRealizacao();
        $select = "
            SELECT 
                TO_CHAR(data, 'DD/MM/YYYY') as data, 
                TO_CHAR(hora_inicio, 'HH24:MI') as hora_inicio, 
                TO_CHAR(hora_fim, 'HH24:MI') as hora_fim 
            FROM evento_realizacao 
            WHERE id_evento = ?";

        $this->view->idEvento = $idEvento;
        $this->view->horariosEventos = $model->getAdapter()->fetchAll($select, $idEvento);

        $data = $this->getRequest()->getPost();
        if ($this->getRequest()->isPost() && $form->isValid($data)) {
            $data = $form->getValues();
            $data['id_evento'] = $idEvento;

            try {
//                $sessao = Zend_Auth::getInstance()->getIdentity();
//                $idEncontro = $sessao["idEncontro"]; // UNSAFE
                $cache = Zend_Registry::get('cache_common');
                $ps = $cache->load('prefsis');
                $idEncontro = (int) $ps->encontro["id_encontro"];
                $existe = $model->existeHorario(array(
                    $idEncontro,
                    $data['id_sala'],
                    $data['data'],
                    $data['hora_inicio'],
                    $data['hora_fim']
                ));

                if (!$existe) {
                    $model->criar($data);
                    return $this->_helper->redirector->goToRoute(array(
                                'module' => 'admin',
                                'controller' => 'evento',
                                'action' => 'detalhes',
                                'id' => $idEvento), 'default', true);
                } else {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Já existe um evento no mesmo dia, mesma sala e mesmo horário.'));
                }
            } catch (Exception $e) {
                $this->_helper->flashMessenger->addMessage(
                        array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                            . $e->getMessage()));
            }
        }
    }

    public function editarAction() {
        $form = new Application_Form_Horarios();
        $form->cria();
        $this->view->form = $form;

        $model = new Application_Model_EventoRealizacao();
        $evento = $this->_request->getParam('evento', 0);

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = $this->_request->getParam('id', 0);
                $data = $form->getValues();

                try {
                    $sessao = Zend_Auth::getInstance()->getIdentity();
                    $idEncontro = $sessao ["idEncontro"];
                    $existe = $model->existeHorario(array(
                        $idEncontro,
                        $data['id_sala'],
                        $data['data'],
                        $data['hora_inicio'],
                        $data['hora_fim']
                    ));

                    // se id for igual ao id existe, pode atualizar, pois se trata do mesmo evento
                    if (!$existe or ( $id == $existe)) {
                        $model->atualizar($data, $id);
                        return $this->_helper->redirector->goToRoute(array(
                                    'module' => 'admin',
                                    'controller' => 'evento',
                                    'action' => 'detalhes',
                                    'id' => $evento), 'default', true);
                    } else {
                        $this->_helper->flashMessenger->addMessage(
                                array('error' => 'Já existe um evento no mesmo dia, mesma sala e mesmo horário.'));
                    }
                } catch (Exception $e) {
                    $this->_helper->flashMessenger->addMessage(
                            array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                                . $e->getMessage()));
                }
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $form->populate($model->getAdapter()->fetchRow("SELECT evento, id_evento,
                  id_sala, TO_CHAR(data, 'DD/MM/YYYY') as data,
                  TO_CHAR(hora_inicio, 'HH24:MI') as hora_inicio,
                  TO_CHAR(hora_fim, 'HH24:MI') as hora_fim, descricao
               FROM evento_realizacao WHERE evento = " . $id));
            }
        }

        $select = "SELECT TO_CHAR(data, 'DD/MM/YYYY') as data, 
         TO_CHAR(hora_inicio, 'HH24:MI') as hora_inicio, 
         TO_CHAR(hora_fim, 'HH24:MI') as hora_fim FROM evento_realizacao 
         WHERE id_evento = ?";
        $this->view->idEvento = $evento;
        $this->view->horariosEventos = $model->getAdapter()->fetchAll($select, $evento);
    }

    public function deletarAction() {
        $model = new Admin_Model_EventoRealizacao();
        $evento = $this->_request->getParam('evento', 0);

        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            $id = (int) $this->getRequest()->getPost('id');
            if (!isset($id)) {
                $this->_helper->flashMessenger->addMessage(
                        array('error' => 'Horário não encontrado.'));
            } else if ($del == "confimar") {
                try {
                    $where = array(
                        "evento = ?" => $id
                    );
                    $model->delete($where);
                    $this->_helper->flashMessenger->addMessage(
                            array('success' => 'Horário deletado com sucesso.'));
                } catch (Zend_Db_Exception $e) {
                    if ($e->getCode() == 23503) {
                        $this->_helper->flashMessenger->addMessage(
                                array('error' => 'Esse hórario não pode ser removido, pois já existem participantes inscritos.'));
                    } else {
                        $this->_helper->flashMessenger->addMessage(
                                array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                                    . $e->getMessage()));
                    }
                }
            }
            return $this->_helper->redirector->goToRoute(array(
                        'module' => 'admin',
                        'controller' => 'evento',
                        'action' => 'detalhes',
                        'id' => $evento), 'default', true);
        } else {
            $id = $this->_getParam('id', 0);
            try {
                $this->view->horario = $model->ler($id);
            } catch (Exception $e) {
                $this->_helper->flashMessenger->addMessage(
                        array('error' => $e->getMessage()));
            }
        }
    }

}
