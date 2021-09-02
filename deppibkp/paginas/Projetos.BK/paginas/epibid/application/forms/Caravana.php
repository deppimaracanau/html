<?php

class Application_Form_Caravana extends Zend_Form {

    public function init() {

        $nome_caravana = $this->createElement('text', 'nome_caravana', array('label' => 'Caravana: '));
        $nome_caravana->setRequired(true)
                ->addValidator('regex', false, array('/^[ a-zA-Z á é í ó ú à ì ò ù ã ẽ ĩ õ ũ â ê î ô û ä ë ï ö ü ç .]*$/'))
                ->addValidator('stringLength', false, array(1, 255))
                ->addErrorMessage("Você digitou um nome muito pequeno (min. 1) ou contém caracteres inválidos");

        $apelido_caravana = $this->createElement('text', 'apelido_caravana', array('label' => 'Apelido: '));
        $apelido_caravana->setRequired(true)
                ->addValidator('stringLength', false, array(1, 255))
                ->addErrorMessage("Apelido muito pequeno (min. 1)");


        $cidade = new Application_Model_Municipio();
        $listaCiddades = $cidade->fetchAll(null, 'nome_municipio');

        $municipio = $this->createElement('select', 'id_municipio', array('label' => 'Município: '));
        $municipio->setAttrib("class", "select2");
        foreach ($listaCiddades as $item) {
            $municipio->addMultiOptions(array($item->id_municipio => $item->nome_municipio));
        }

        $ins = new Application_Model_Instituicao();
        $listaIns = $ins->fetchAll(null, 'nome_instituicao');

        $instituicao = $this->createElement('select', 'id_instituicao', array('label' => 'Instituição: '));
        $instituicao->setAttrib("class", "select2");
        foreach ($listaIns as $item) {
            $instituicao->addMultiOptions(array($item->id_instituicao => $item->nome_instituicao));
        }


        $submit = $this->createElement('submit', 'confimar', array('label' => 'Confimar'))->removeDecorator('DtDdWrapper');

        $cancelar = $this->createElement('submit', 'cancelar', array('label' => 'Cancelar'))->removeDecorator('DtDdWrapper');
        $cancelar->setAttrib('class', 'submitCancelar');

        $this->addElement($nome_caravana)
                ->addElement($apelido_caravana)
                ->addElement($municipio)
                ->addElement($instituicao)
                ->addElement($submit)
                ->addElement($cancelar);
    }

}

?>
