<?php

class Admin_EventoController extends Zend_Controller_Action {

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
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery-ui-1.8.16.custom.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery.ui.1.8.16.ie.css'));

        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery-ui-1.8.16.custom.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery.dataTables.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/admin/evento/index.js'));

        $tipoEventos = new Application_Model_TipoEvento();
        $this->view->tipoEvento = $tipoEventos->fetchAll();
    }

    public function detalhesAction() {
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/tabela_sort.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/screen.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/prettify.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/form.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery-ui-1.8.16.custom.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/jqueryui-bootstrap/jquery.ui.1.8.16.ie.css'));

        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery-migrate-1.2.1.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery-ui-1.8.16.custom.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/jquery.dataTables.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/prettify.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/init.prettify.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/admin/evento/detalhes.js'));

        $idEvento = $this->_request->getParam('id', 0);

        $evento = new Admin_Model_Evento();
        $evento_result = $evento->buscaEventoPessoa($idEvento);
        if (!$evento_result) {
            $this->_helper->flashMessenger->addMessage(array('error' =>
                'Evento não encontrado.'));
            return $this->_helper->redirector->goToRoute(array(
                        'module' => 'admin',
                        'controller' => 'evento',
                        'action' => 'index',
                            ), 'default');
        }
        $this->view->evento = $evento_result;

        if ($evento_result['validada']) {
            $this->view->url_situacao = "<a href=\"/admin/evento/invalidar/{$idEvento}\" 
                 class=\"no-bottom\"><i class=\"icon-remove\"></i> Invalidar</a>";
        } else {
            $this->view->url_situacao = "<a href=\"/admin/evento/validar/{$idEvento}\" 
                 class=\"no-bottom\"><i class=\"icon-ok\"></i> Validar</a>";
        }

        if ($evento_result['apresentado']) {
            $this->view->url_apresentado = "<a href='{$this->view->url(array('id' => $idEvento), 'evento_desfazer_apresentado', true)}' class='no-bottom'>
                  <i class='icon-eye-close'></i> Desfazer Apresentado</a>";
        } else {
            $this->view->url_apresentado = "<a href='{$this->view->url(array('id' => $idEvento), 'evento_apresentado', true)}' class='no-bottom'>
                  <i class='icon-eye-open'></i> Apresentado</a>";
        }

        $this->view->horarios = $evento->listarHorarios($idEvento);
        $this->view->outrosPalestrantes = $evento->listarOutrosPalestrantes($idEvento);
    }

    /**
     * Mapeada como:
     *    /admin/evento/validar/:id
     *    /admin/evento/invalidar/:id
     */
    public function situacaoAction() {
        $idEvento = $this->_getParam('id', 0);
        $validar = $this->_getParam('validar', 'f');

        $evento = new Application_Model_Evento();
        try {
            $sql = "UPDATE evento SET validada = ? WHERE id_evento = ?";
            $evento->getAdapter()->fetchAll($sql, array($validar, $idEvento));
        } catch (Exception $e) {
            $this->_helper->flashMessenger->addMessage(array('error' =>
                'Ocorreu um erro inesperado.<br/>Detalhes: ' . $e->getMessage()));
        }

        $this->_helper->redirector->goToRoute(array(
            'module' => 'admin',
            'controller' => 'evento',
            'action' => 'detalhes',
            'id' => $idEvento), 'default');
    }

    /**
     * Mapeada como
     *    /admin/evento/apresentado/:id
     *    /admin/evento/desfazer-apresentado/:id
     */
    public function situacaoPosEventoAction() {
        $idEvento = $this->_getParam('id', 0);
        $apresentado = $this->_getParam('apresentado', 'f');

        $evento = new Application_Model_Evento();
        try {
            $sql = "UPDATE evento SET apresentado = ? WHERE id_evento = ?";
            $evento->getAdapter()->fetchAll($sql, array($apresentado, $idEvento));
        } catch (Exception $e) {
            $this->_helper->flashMessenger->addMessage(array('error' =>
                'Ocorreu um erro inesperado.<br/>Detalhes: ' . $e->getMessage()));
        }

        $this->_helper->redirector->goToRoute(array(
            'module' => 'admin',
            'controller' => 'evento',
            'action' => 'detalhes',
            'id' => $idEvento), 'default');
    }

    public function ajaxBuscarAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
//        $sessao = Zend_Auth::getInstance()->getIdentity();
//        $idEncontro = $sessao["idEncontro"]; // UNSAFE
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];

        $eventos = new Application_Model_Evento();
        $data = array(
            intval($idEncontro), $this->_request->getParam("termo"),
            intval($this->_request->getParam("tipo")),
            intval($this->_request->getParam("situacao"))
        );

        $rs = $eventos->buscaEventosAdmin($data);
        $json = new stdClass;
        $json->size = count($rs);
        $json->itens = array();

        foreach ($rs as $value) {
            if ($value['validada']) {
                $validada = "Sim";
            } else {
                $validada = "Não";
            }

            $date = new Zend_Date($value['data_submissao']);

            $url = '<a href='
                    . $this->view->baseUrl('/admin/evento/detalhes/id/' . $value["id_evento"])
                    . ' class="no-bottom"><i class="icon-plus"></i> Detalhes</a>';
            $json->itens[] = array(
                substr($value['nome_tipo_evento'], 0, 1),
                "{$value['nome_evento']}",
                "{$validada}",
                "{$date->toString("dd/MM/YYYY HH:mm")}",
                "{$value['nome']}",
                $url
            );
        }

        header("Pragma: no-cache");
        header("Cache: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-type: text/json");
        echo json_encode($json);
    }

    public function outrosPalestrantesAction() {
        $idPessoa = $this->_getParam('pessoa', 0);
        $idEvento = $this->_getParam('evento', 0);
        $confirmado = $this->_getParam('confirmar', 'f');
        $model = new Admin_Model_Evento();
        try {
            $sql = "UPDATE evento_palestrante SET confirmado = ? WHERE id_evento = ?
            AND id_pessoa = ?";
            $model->getAdapter()->fetchAll($sql, array($confirmado, $idEvento, $idPessoa));
            if ($confirmado == "f") {
                $msg = "Desfazer confirmação palestrante executada com sucesso.";
            } else {
                $msg = "Confirmação palestrante executada com sucesso.";
            }
            $this->_helper->flashMessenger->addMessage(
                    array('success' => $msg));
        } catch (Exception $e) {
            $this->_helper->flashMessenger->addMessage(array('error' =>
                'Ocorreu um erro inesperado.<br/>Detalhes: ' . $e->getMessage()));
        }

        $this->_helper->redirector->goToRoute(array(
            'module' => 'admin',
            'controller' => 'evento',
            'action' => 'detalhes',
            'id' => $idEvento), 'default');
    }

    public function programacaoParcialAction() {
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'staging');
        $id_encontro = $config->encontro->codigo;
        $model = new Admin_Model_Evento();
        $this->view->lista = $model->programacaoParcial($id_encontro);
    }

    public function downloadLoteArtigosAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();

        $sessao = Zend_Auth::getInstance()->getIdentity();
        $admin = $sessao["administrador"];

        // Verifica se tem permissao
        if (!$admin) {
            $this->_helper->flashMessenger->addMessage(
                    array('error' => 'Você não tem permissão para executar esta ação.'));
            return $this->_redirecionar();
        }

        $ano = (int) $this->getRequest()->getParam("ano", 0);
        $encontro = (int) $this->getRequest()->getParam("encontro", 0);
        $status = $this->getRequest()->getParam("status", "todos");

        $model_encontro = new Application_Model_Encontro();
        if ($ano < 1980 && $encontro > 0) {
            // busca por encontro
            $encontros = array($model_encontro->buscaEncontro($encontro));
        } elseif ($ano > 1980 && $encontro < 1) {
            // busca por ano
            $encontros = $model_encontro->buscaEncontrosPorAno($ano);
        } else {
            // erro
            $this->_helper->flashMessenger->addMessage(array(
                'error' => "Parâmetro(s) inválido(s). Utilize <b>ano</b> ou <b>encontro</b>."));
            return $this->_helper->redirector->goToRoute(array(), 'default', true);
        }

        if (empty($encontros)) {
            $this->_helper->flashMessenger->addMessage(
                    array('warning' => "Nenhum encontro cadastrado."));
            return $this->_helper->redirector->goToRoute(array(
                        'module' => 'admin',
                        'controller' => 'relatorios',
                        'action' => 'index'), 'default', true);
        }

        // Compativel com PHP < 5.5
        $id_encontros_array = array();
        foreach ($encontros as $encontro) {
            array_push($id_encontros_array, $encontro["id_encontro"]);
        }
        // PHP >= 5.5
//        $id_encontros_array = array_column($encontros, "id_encontro"); 

        $model_artigo = new Application_Model_Artigo();
        $rel = $model_artigo->buscaArtigos($id_encontros_array, $status);
        if (empty($rel)) {
            $this->_helper->flashMessenger->addMessage(
                    array("alert" => "Não há registros a serem mostrados."));
            return $this->_helper->redirector->goToRoute(array(
                        'module' => 'admin',
                        'controller' => 'relatorios',
                        'action' => 'index'), 'default', true);
        }
        $this->_exportLoteZip($rel);
    }

    /**
     * Força o download de um arquivo zip contendo o(s) arquivo(s) gerado(s).
     * @throws Exception
     */
    private function _exportLoteZip($dados_array) {
        $timenow = time();
        $str_date_filename = date("Y-m-d_His", $timenow);
        $str_date_comment = date("d/m/Y H:i:s", $timenow);
        $filepath = tempnam("tmp", "zip");
        $dir = dirname($filepath);

        if (!is_writable($dir)) {
            throw new Exception("Não foi possível escrever em " . $dir);
        }

        try {
            $zip = new ZipArchive();
            $res = $zip->open($filepath, ZipArchive::CREATE);
            if ($res !== TRUE) {
                throw new Exception("Erro ao criar arquivo zip. Código " . $res);
            }
            $zip->setArchiveComment("Gerado pelo SiGE <https://github.com/comsolid/sige> em "
                    . $str_date_comment);
            foreach ($dados_array as $dados) {
                $zipfilename = "artigo_"
                        . preg_replace("/ /", "_", strtolower($this->_utf8_remove_acentos($dados["nome"])))
                        . "_" . $dados["id_artigo"]
                        . ".pdf";
                $zip->addFromString($zipfilename, base64_decode($dados["dados"]));
            }
            if (!$zip->close()) {
                throw new Exception("Não foi possível fechar o arquivo " . $filepath);
            }

            if (!is_readable($filepath)) {
                throw new Exception("Não foi possível ler o arquivo " . $filepath);
            }

            $filesize = filesize($filepath);
            if (!$filesize) {
                throw new Exception("Não foi possível calcular o tamanho do arquivo " . $filepath);
            }
            $zipfilename = "artigos_sige_"
                    . preg_replace("/ /", "_", strtolower($this->_utf8_remove_acentos($dados["apelido_encontro"])))
                    . "_{$str_date_filename}.zip";
            header("Content-Type: application/zip");
            header("Content-Length: " . $filesize);
            header("Content-Disposition: attachment; filename=\"{$zipfilename}\"");
            readfile($filepath);

            unlink($filepath);
            clearstatcache();
        } catch (Exception $exc) {
            // código repetido devido ao php 5.4 ou < não suportar finally 
            unlink($filepath);
            clearstatcache();

            throw new Exception("Ocorreu o seguinte erro ao gerar o zip: " . $exc->getMessage());
        }
    }

    private function _utf8_remove_acentos($str) {
        $keys = array();
        $values = array();
        $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
        $to = "aaaaeeiooouucAAAAEEIOOOUUC";
        preg_match_all('/./u', $from, $keys);
        preg_match_all('/./u', $to, $values);
        $mapping = array_combine($keys[0], $values[0]);
        return strtr($str, $mapping);
    }

}
