<?php

class Application_Model_Dh extends Zend_Db_Table_Abstract {
	
	public function updateCounter($page) {
		$sql = "UPDATE dh SET counter = counter + 1 WHERE page = ? AND conference = ?";
		$config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'staging');
        $idEncontro = $config->encontro->codigo;
		$this->getAdapter()->fetchAll($sql, array(str_replace("/", "", $page), $idEncontro));
	}
}
