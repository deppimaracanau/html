<?php

class Admin_CaravanaController extends Zend_Controller_Action {

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
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery-ui-1.8.16.custom.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery.ui.1.8.16.ie.css'));

        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery-ui-1.8.16.custom.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery.dataTables.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/admin/caravana/index.js'));
    }

    public function ajaxBuscarAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

//      $sessao = Zend_Auth :: getInstance()->getIdentity();
//      $idEncontro = $sessao["idEncontro"]; // UNSAFE
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];

        $termo = $this->_request->getParam("termo", "");
        $model = new Admin_Model_Caravana();

        $rs = $model->buscar($idEncontro, $termo);
        $json = new stdClass;
        $json->size = count($rs);
        $json->itens = array();

        foreach ($rs as $value) {
            if ($value['validada']) {
                $validada = "Sim";
                $url = '<a href="' . $this->view->url(array('id' => $value["id_caravana"]), 'invalidar_caravana', true)
                        . '" class="no-bottom"><i class="icon-remove"></i> Invalidar</a>';
            } else {
                $validada = "Não";
                $url = '<a href="' . $this->view->url(array('id' => $value["id_caravana"]), 'validar_caravana', true)
                        . '" class="no-bottom"><i class="icon-ok"></i> Validar</a>';
            }
            $json->itens[] = array(
                "{$value['nome_caravana']}",
                "{$value['apelido_caravana']}",
                "{$value['nome']}",
                "{$value['nome_municipio']}",
                "{$value['apelido_instituicao']}",
                "{$validada}",
                "{$value['num_h']}",
                "{$value['num_m']}",
                $url
            );
        }
        header("Pragma: no-cache");
        header("Cache: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-type: text/json");
        echo json_encode($json);
    }

    /**
     * Mapeada como
     * 	/c/validar/:id
     * 	/c/invalidar/:id
     */
    public function situacaoAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $id = $this->_getParam('id', 0);
        $validar = $this->_getParam('validar', 'f');

//        $sessao = Zend_Auth::getInstance()->getIdentity();
//        $idEncontro = $sessao["idEncontro"]; // UNSAFE
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];

        $model = new Application_Model_Caravana();
        try {
            $select = "UPDATE caravana_encontro SET validada = ? WHERE id_caravana = ? AND id_encontro = ?";
            $model->getAdapter()->fetchAll($select, array($validar, $id, $idEncontro));
            $this->_helper->flashMessenger->addMessage(
                    array('success' => 'Caravana atualizada com sucesso.'));
        } catch (Exception $ex) {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Ocorreu um erro inesperado.<br/>Detalhes: '
                        . $ex->getMessage()));
        }

        return $this->_helper->redirector->goToRoute(array(
                    'module' => 'admin',
                    'controller' => 'caravana',
                    'action' => 'index'), 'default', true);
    }

}
