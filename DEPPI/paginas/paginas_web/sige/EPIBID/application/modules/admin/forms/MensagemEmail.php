<?php

class Admin_Form_MensagemEmail extends Zend_Form {

    public function init() {
        $submit = $this->createElement('submit', 'confimar', array('label' => 'Confimar'))->removeDecorator('DtDdWrapper');

        $cancelar = $this->createElement('submit', 'cancelar', array('label' => 'Cancelar'))->removeDecorator('DtDdWrapper');
        $cancelar->setAttrib('class', 'submitCancelar');

        $this->addElements(array(
            $this->_id_encontro(),
            $this->_id_tipo_mensagem_email(),
            $this->_mensagem(),
            $this->_assunto(),
            $this->_link(),
            $this->_assinatura_siteoficial(),
            $this->_assinatura_email(),
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

    protected function _id_tipo_mensagem_email() {
        $e = new Zend_Form_Element_Hidden('id_tipo_mensagem_email');
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

    protected function _mensagem() {
        $e = new Zend_Form_Element_Textarea('mensagem');
        $e->setLabel('Mensagem:')
                ->setRequired(true)
                ->setAttrib('rows', 10)
                ->addFilter('StringTrim');

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _assunto() {
        $e = new Zend_Form_Element_Text('assunto');
        $e->setLabel('Assunto:')
                ->setRequired(true)
                ->addValidator('StringLength', false, array(1, 200))
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttrib('class', 'large');

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _link() {
        $e = new Zend_Form_Element_Text('link');
        $e->setLabel('Link para login:')
                ->addValidator('StringLength', false, array(1, 70))
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttrib('class', 'large')
                ->setAttrib('placeholder', 'ex. http://www.esl.org/login');

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _assinatura_siteoficial() {
        $e = new Zend_Form_Element_Text('assinatura_siteoficial');
        $e->setLabel('Link para site oficial (assinatura):')
                ->addValidator('StringLength', false, array(1, 70))
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttrib('class', 'large')
                ->setAttrib('placeholder', 'ex. http://www.esl.org/');

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _assinatura_email() {
        $e = new Zend_Form_Element_Text('assinatura_email');
        $e->setLabel('E-mail da assinatura:')
                ->addValidator('StringLength', false, array(1, 70))
                ->addValidator('EmailAddress', TRUE)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttrib('class', 'large')
                ->setAttrib('placeholder', 'ex. seuemail@host.com.br');

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
