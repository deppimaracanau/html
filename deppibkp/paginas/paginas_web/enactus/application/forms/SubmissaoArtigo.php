<?php

class Application_Form_SubmissaoArtigo extends Zend_Form {

    public function init() {
        $this->setAttrib("data-validate", "parsley");
        $this->setName('SubmissaoArtigo');

        $this->addElements(array(
            $this->_nome_evento(),
            $this->_resumo(),
            $this->_arquivo(),
        ));

        $responsavel = $this->createElement('hidden', 'responsavel');
        $this->addElement($responsavel);

        $botao = $this->createElement('submit', 'confimar')->removeDecorator('DtDdWrapper');
        $this->addElement($botao);
        $botao = $this->createElement('submit', 'cancelar')->removeDecorator('DtDdWrapper');
        $botao->setAttrib('class', 'submitCancelar');
        $this->addElement($botao);
    }

    protected function _nome_evento() {
        $e = new Zend_Form_Element_Text('nome_evento');
        $e->setLabel('Título:')
                ->setRequired(true)
                ->addValidator('StringLength', false, array(1, 255))
                ->setAttrib("data-required", "true")
                ->setAttrib("data-rangelength", "[1,255]")
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

    protected function _resumo() {
        $e = new Zend_Form_Element_Textarea('resumo');
        $e->setLabel('Resumo:')
                ->setRequired(true)
                ->setAttrib('rows', 10)
                //->setAttrib("data-required", "true")
                ->addFilter('StringTrim')
                ->setAttrib('class', 'ckeditor')
                ->addValidator('stringLength', false, array(20))
                ->addFilter(new Sige_Filter_HTMLPurifier)
                ->addErrorMessage("Resumo com número insuficiente de caracteres (mín. 20).");

        $e->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array('HtmlTag', ''),
            array('Label', ''),
        ));
        return $e;
    }

    protected function _arquivo() {
        $e = new Zend_Form_Element_File('arquivo');
        $e->setLabel('Arquivo PDF:')
                ->setRequired(true)
                //->setDestination(BASE_PATH . '/uploads/artigos')
                // garante um unico arquivo
                ->addValidator('Count', false, 1)
                // limite de 5 MB
                ->addValidator('Size', false, 5242880) //
                ->setMaxFileSize(5242880)
                // somente extensao PDF
                ->addValidator('Extension', false, 'pdf')
                ->setValueDisabled(true);
        return $e;
    }

}
