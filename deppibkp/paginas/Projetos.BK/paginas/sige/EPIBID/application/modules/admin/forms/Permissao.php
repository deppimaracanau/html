<?php

class Admin_Form_Permissao extends Zend_Form {

    public function init() {

        $submit = $this->createElement('submit', 'confimar', array('label' => 'Confimar'))->removeDecorator('DtDdWrapper');

        $cancelar = $this->createElement('submit', 'cancelar', array('label' => 'Cancelar'))->removeDecorator('DtDdWrapper');
        $cancelar->setAttrib('class', 'submitCancelar');

        $this->addElement($this->_admin())
                ->addElement($this->_tipo_usuario())
                ->addElement($submit)
                ->addElement($cancelar);
    }

    private function _admin() {
        $e = new Zend_Form_Element_Checkbox('admin');
        $e->setLabel("É administrador?:");
        return $e;
    }

    private function _tipo_usuario() {
        $e = new Zend_Form_Element_Select('id_tipo_usuario');
        $e->setRequired(true)
                ->setLabel("Tipo usuário:")
                ->setAttrib('class', 'select2');
        $model = new Application_Model_TipoUsuario();
        $rs = $model->fetchAll();
        foreach ($rs as $row) {
            $e->addMultiOption($row->id_tipo_usuario, $row->descricao_tipo_usuario);
        }
        return $e;
    }

}
