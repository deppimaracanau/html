<?php

class Admin_Form_Encontro extends Zend_Form {

    protected $modo_edicao = false;

    public function modoEdicao() {
        $this->modo_edicao = true;
    }

    public function init() {
        $this->setName('Encontro');

        $submit = $this->createElement('submit', 'confimar', array('label' => 'Confimar'))->removeDecorator('DtDdWrapper');

        $cancelar = $this->createElement('submit', 'cancelar', array('label' => 'Cancelar'))->removeDecorator('DtDdWrapper');
        $cancelar->setAttrib('class', 'submitCancelar');

        $this->addElements(array(
            $this->_nome_encontro(),
            $this->_apelido_encontro(),
            $this->_data_inicio(),
            $this->_data_fim(),
            $this->_periodo_submissao_inicio(),
            $this->_periodo_submissao_fim(),
            $this->_municipio(),
            $this->_id_tipo_horario(),
            $this->_certificados_liberados(),
            $submit,
            $cancelar
        ));
    }

    protected function _id_encontro() {
        $e = new Zend_Form_Element_Hidden('id_encontro');
        $e->addFilter('Int');
        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _municipio() {
        $e = new Zend_Form_Element_Select('id_municipio');
        $e->setLabel('* Município:');
        $e->setRequired();
        $e->addFilter('Int');
        $e->setAttrib("class", "select2");

        $model_municipio = new Application_Model_Municipio();
        $municipios = $model_municipio->fetchAll(null, 'nome_municipio');
        foreach ($municipios as $m) {
            $e->addMultiOptions(array($m->id_municipio => $m->nome_municipio));
        }

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _nome_encontro() {
        $e = new Zend_Form_Element_Text('nome_encontro');
        $e->setLabel('* Nome encontro:')
                ->setRequired(true)
                ->addValidator('StringLength', false, array(1, 255))
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttrib('class', 'large')
                ->setAttrib("placeholder", "I Encontro de Software Livre");

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _apelido_encontro() {
        $e = new Zend_Form_Element_Text('apelido_encontro');
        $e->setLabel('* Nome curto:')
                ->setRequired(true)
                ->addValidator('StringLength', false, array(1, 50))
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttrib('class', 'normal')
                ->setAttrib("placeholder", "I ESL");

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _data_inicio() {
        $e = new Zend_Form_Element_Text('data_inicio');
        $e->setLabel('* Data início:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttrib('class', 'date');

        if ($this->modo_edicao) {
            $e->setAttrib("disabled", "disabled");
        }

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _data_fim() {
        $e = new Zend_Form_Element_Text('data_fim');
        $e->setLabel('* Data fim:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttrib('class', 'date');

        if ($this->modo_edicao) {
            $e->setAttrib("disabled", "disabled");
        }

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _periodo_submissao_inicio() {
        $e = new Zend_Form_Element_Text('periodo_submissao_inicio');
        $e->setLabel('* Início Submissão:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttrib('class', 'date');

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _periodo_submissao_fim() {
        $e = new Zend_Form_Element_Text('periodo_submissao_fim');
        $e->setLabel('* Fim Submissão:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttrib('class', 'date');

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _id_tipo_horario() {
        $e = new Zend_Form_Element_Select('id_tipo_horario');
        $e->setLabel('* Tipo Horário:');
        $e->setRequired();
        $e->addFilter('Int');
        $e->setAttrib('class', 'select2');

        $model = new Admin_Model_TipoHorario();
        $rs = $model->getAdapter()->fetchAll("SELECT id_tipo_horario,
            intervalo_minutos, TO_CHAR(horario_inicial, 'HH24:MI') as horario_inicial,
            TO_CHAR(horario_final, 'HH24:MI') as horario_final
            FROM tipo_horario ORDER BY id_tipo_horario");
        foreach ($rs as $item) {
            $descricao = "Intervalo de {$item['intervalo_minutos']} min.,
                de {$item['horario_inicial']} até {$item['horario_final']}";
            $e->addMultiOptions(array($item['id_tipo_horario'] => $descricao));
        }

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    private function _certificados_liberados() {
        $e = new Zend_Form_Element_Checkbox('certificados_liberados');
        $e->setLabel("* Certificados liberados? ");
        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

}
