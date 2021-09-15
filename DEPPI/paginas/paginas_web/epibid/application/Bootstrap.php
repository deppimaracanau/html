<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    private $_acl = null;

    public function _initRoutes() {
        $frontController = Zend_Controller_Front::getInstance();
        $router = $frontController->getRouter();

        $route = new Zend_Controller_Router_Route_Static(
                '/', array(
            'controller' => 'index',
            'action' => 'index'
                )
        );
        $router->addRoute('index', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/inscricoes', array(
            'module' => 'admin',
            'controller' => 'participante',
            'action' => 'index'
                )
        );
        $router->addRoute('inscricoes', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/admin', array(
            'module' => 'admin',
            'controller' => 'participante',
            'action' => 'index'
                )
        );
        $router->addRoute('admin', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/login', array(
            'controller' => 'index',
            'action' => 'login'
                )
        );
        $router->addRoute('login', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/logout', array(
            'controller' => 'index',
            'action' => 'logout'
                )
        );
        $router->addRoute('logout', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/sobre', array(
            'controller' => 'index',
            'action' => 'sobre'
                )
        );
        $router->addRoute('sobre', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/ajuda', array(
            'controller' => 'index',
            'action' => 'ajuda'
                )
        );
        $router->addRoute('ajuda', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/submissao', array(
            'controller' => 'evento',
            'action' => 'index'
                )
        );
        $router->addRoute('submissao', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/participar', array(
            'controller' => 'participante',
            'action' => 'criar'
                )
        );
        $router->addRoute('participar', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/recuperar-senha', array(
            'controller' => 'index',
            'action' => 'recuperar-senha'
                )
        );
        $router->addRoute('recuperar-senha', $route);

        $route = new Zend_Controller_Router_Route(
                '/u/:id', array(
            'controller' => 'participante',
            'action' => 'ver'
                )
        );
        $router->addRoute('ver', $route);

        $route = new Zend_Controller_Router_Route(
                '/certificados', array(
            'controller' => 'participante',
            'action' => 'certificados'
                )
        );
        $router->addRoute('certificados', $route);

        $route = new Zend_Controller_Router_Route(
                '/mobile/u/:id', array(
            'module' => 'mobile',
            'controller' => 'participante',
            'action' => 'ver'
                )
        );
        $router->addRoute('mobile_ver', $route);

        $route = new Zend_Controller_Router_Route(
                '/u/confirmar/:id', array(
            'module' => 'admin',
            'controller' => 'participante',
            'action' => 'presenca',
            'confirmar' => 't'
                )
        );
        $router->addRoute('confirmar_participante', $route);

        $route = new Zend_Controller_Router_Route(
                '/u/desfazer-confirmar/:id', array(
            'module' => 'admin',
            'controller' => 'participante',
            'action' => 'presenca',
            'confirmar' => 'f'
                )
        );
        $router->addRoute('des_confirmar_participante', $route);

        $route = new Zend_Controller_Router_Route(
                '/admin/evento/validar/:id', array(
            'module' => 'admin',
            'controller' => 'evento',
            'action' => 'situacao',
            'validar' => 't'
                )
        );
        $router->addRoute('validar_evento', $route);

        $route = new Zend_Controller_Router_Route(
                '/admin/evento/invalidar/:id', array(
            'module' => 'admin',
            'controller' => 'evento',
            'action' => 'situacao',
            'validar' => 'f'
                )
        );
        $router->addRoute('invalidar_evento', $route);

        $route = new Zend_Controller_Router_Route(
                '/admin/evento/apresentado/:id', array(
            'module' => 'admin',
            'controller' => 'evento',
            'action' => 'situacao-pos-evento',
            'apresentado' => 't'
                )
        );
        $router->addRoute('evento_apresentado', $route);

        $route = new Zend_Controller_Router_Route(
                '/admin/evento/desfazer-apresentado/:id', array(
            'module' => 'admin',
            'controller' => 'evento',
            'action' => 'situacao-pos-evento',
            'apresentado' => 'f'
                )
        );
        $router->addRoute('evento_desfazer_apresentado', $route);

        $route = new Zend_Controller_Router_Route(
                '/admin/evento/outros-palestrantes/confirmar/:pessoa/:evento', array(
            'module' => 'admin',
            'controller' => 'evento',
            'action' => 'outros-palestrantes',
            'confirmar' => 't'
                )
        );
        $router->addRoute('confirmar_outro_palestrante', $route);

        $route = new Zend_Controller_Router_Route(
                '/admin/evento/outros-palestrantes/desfazer/:pessoa/:evento', array(
            'module' => 'admin',
            'controller' => 'evento',
            'action' => 'outros-palestrantes',
            'confirmar' => 'f'
                )
        );
        $router->addRoute('des_confirmar_outro_palestrante', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/programacao', array(
            'controller' => 'evento',
            'action' => 'programacao'
                )
        );
        $router->addRoute('programacao', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/tv', array(
            'controller' => 'evento',
            'action' => 'programacao-tv'
                )
        );
        $router->addRoute('tv', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/timeline', array(
            'controller' => 'evento',
            'action' => 'timeline'
                )
        );
        $router->addRoute('timeline', $route);

        $route = new Zend_Controller_Router_Route(
                '/c/validar/:id', array(
            'module' => 'admin',
            'controller' => 'caravana',
            'action' => 'situacao',
            'validar' => 't'
                )
        );
        $router->addRoute('validar_caravana', $route);

        $route = new Zend_Controller_Router_Route(
                '/c/invalidar/:id', array(
            'module' => 'admin',
            'controller' => 'caravana',
            'action' => 'situacao',
            'validar' => 'f'
                )
        );
        $router->addRoute('invalidar_caravana', $route);

        $route = new Zend_Controller_Router_Route(
                '/e/:id', array(
            'controller' => 'evento',
            'action' => 'ver'
                )
        );
        $router->addRoute('ver_evento', $route);

        $route = new Zend_Controller_Router_Route(
                '/mobile/e/:id', array(
            'module' => 'mobile',
            'controller' => 'evento',
            'action' => 'ver'
                )
        );
        $router->addRoute('mobile_ver_evento', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/mobile', array(
            'module' => 'mobile',
            'controller' => 'participante',
            'action' => 'index'
                )
        );
        $router->addRoute('mobile', $route);

        $route = new Zend_Controller_Router_Route_Regex(
                '(daft-punk|daftpunk)', array(
            'module' => 'application',
            'controller' => 'index',
            'action' => 'daft-punk'
                ), array()
        );
        $router->addRoute('daft-punk', $route);

        $route = new Zend_Controller_Router_Route_Static(
                '/safe', array(
            'module' => 'application',
            'controller' => 'index',
            'action' => 'safe'
                )
        );
        $router->addRoute('safe', $route);

        $route = new Zend_Controller_Router_Route_Regex(
                '(forever-free|foreverfree)', array(
            'module' => 'application',
            'controller' => 'index',
            'action' => 'forever-free'
                ), array()
        );
        $router->addRoute('forever-free', $route);

        /* Not so easy answers */
        $route = new Zend_Controller_Router_Route_Regex(
                '(heart-bleed|heartbleed|heart-bleed-bug|heartbleed-bug)', array(
            'module' => 'application',
            'controller' => 'index',
            'action' => 'not-so-easy'
                ), array()
        );
        $router->addRoute('not-so-easy', $route);
    }

    public function _initTranslate() {
        $translator = new Zend_Translate(array(
            'adapter' => 'array',
            'content' => '../resources/languages',
            'locale' => 'pt_BR',
            'scan' => Zend_Translate::LOCALE_DIRECTORY));
        Zend_Validate_Abstract::setDefaultTranslator($translator);
    }

    public function _initTimeZone() {
        date_default_timezone_set('America/Fortaleza');
    }

    /**
     * Initializes the cache.
     * referência: http://wolfulus.wordpress.com/2011/12/26/zend-framework-xml-based-acl-part-3/
     */
    protected function _initCache() {
        $cache_dir = APPLICATION_PATH . '/cache/common';
        $frontendOptions = array('lifetime' => 7200, 'automatic_serialization' => true);
        $backendOptions = array('cache_dir' => $cache_dir);
        if (!file_exists($cache_dir)) {
            if (!\mkdir($cache_dir, 0777, true)) {
                echo "<h2>Crie a pasta $cache_dir com permissão de escrita para o servidor web.</h2>";
                exit;
            }
        }
        $appcache = Zend_Cache::factory('Core', 'File', $frontendOptions, $backendOptions);
        Zend_Registry::set('cache_common', $appcache);
    }

    protected function _initPreferenciaSistema() {
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        if ($ps === false) {
            $ps = new Sige_PreferenciaSistema();
            $cache->save($ps, 'prefsis');
        }
        Zend_Controller_Front::getInstance()->registerPlugin($ps);
    }


//    public function _initClearAllSessions() {
//// Finds all server sessions
////        session_start();
//// Stores in Array
//        $_SESSION = array();
//// Swipe via memory
//        if (ini_get("session.use_cookies")) {
//            // Prepare and swipe cookies
//            $params = session_get_cookie_params();
//            // clear cookies and sessions
//            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
//            );
//        }
//// Just in case.. swipe these values too
//        ini_set('session.gc_max_lifetime', 0);
//        ini_set('session.gc_probability', 1);
//        ini_set('session.gc_divisor', 1);
//// Completely destory our server sessions..
//        session_destroy();
//    }

}
