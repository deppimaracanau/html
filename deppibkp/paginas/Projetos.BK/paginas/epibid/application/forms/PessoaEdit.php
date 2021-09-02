<?php

class Url_Validator extends Zend_Validate_Abstract {

    const INVALID_URL = 'invalidUrl';

    protected $_messageTemplates = array(
        self::INVALID_URL => "'%value%' is not a valid URL.",
    );

    public function isValid($value) {
        $valueString = (string) $value;
        $this->_setValue($valueString);

        if (!Zend_Uri::check($value)) {
            $this->_error(self::INVALID_URL);
            return false;
        }
        return true;
    }

}

class Application_Form_PessoaEdit extends Zend_Form {

    public function init() {

        $nome = $this->createElement('text', 'nome', array('label' => 'Nome: '));
        $nome->setRequired(true)
                ->addValidator('regex', false, array('/^[ a-zA-ZáéíóúàìòùãẽĩõũâêîôûäëïöüçÇÁÉÍÓÚ]*$/'))
                ->addValidator('stringLength', false, array(6, 255))
                ->addErrorMessage("Nome deve ter no mínimo 6 caracteres ou contém caracteres inválidos");

        /* $email = $this->createElement('text', 'email', array('label' => 'E-mail: '));
          $email->setRequired(true)
          ->addValidator('EmailAddress')
          ->setAttrib('readonly', true)
          ->addErrorMessage("E-mail inválido"); */

        $apelido = $this->createElement('text', 'apelido', array('label' => 'Apelido: '));
        $apelido->setRequired(true)
                ->addValidator('stringLength', false, array(6, 255))
                ->addErrorMessage("Apelido deve ter no mínimo 6 caracteres");

        $modelSexo = new Application_Model_Sexo();
        $rs = $modelSexo->fetchAll(null, 'id_sexo ASC');
        $sexo = $this->createElement('radio', 'id_sexo', array('label' => 'Sexo: '));
        $sexo->setRequired(true)
                ->setSeparator('');
        foreach ($rs as $row) {
            $sexo->addMultiOption($row->id_sexo, $row->descricao_sexo);
        }

        /* $twitter = $this->createElement('text', 'twitter', array('label' => 'Twitter: @'));
          $twitter->addValidator('regex', false, array('/^[A-Za-z0-9_]*$/'))
          ->addErrorMessage("Twitter inválido");

          $facebook = $this->createElement('text', 'facebook', array('label' => 'Facebook (E-mail): '));
          $facebook->addValidator('EmailAddress')
          ->addErrorMessage("Facebook inválido");

          $site = $this->createElement('text', 'endereco_internet', array('label' => 'Site: '));
          $site->addValidator(new Url_Validator)
          ->addErrorMessage("Site inválido"); */

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

        $anoNascimento = $this->createElement('select', 'nascimento', array('label' => 'Ano Nascimento: '));
        $anoNascimento->setAttrib("class", "select2");
        $date = new Zend_Date();
        $ano = (int) $date->toString('YYYY');
        for ($i = $ano; $i > 1899; $i--) {
            $anoNascimento->addMultiOptions(array("$i-01-01" => $i));
        }

        $this->addElement($nome)
                //->addElement($email)
                ->addElement($apelido)
                ->addElement($sexo)
                ->addElement($municipio)
                ->addElement($instituicao)
                ->addElement($anoNascimento)
                ->addElement($this->_bio());
        $botao = $this->createElement('submit', 'confimar')->removeDecorator('DtDdWrapper');
        $this->addElement($botao);
        $botao = $this->createElement('reset', 'cancelar')->removeDecorator('DtDdWrapper');
        $this->addElement($botao);

        // grupo para tab-1
        $this->addDisplayGroup(array(
            'nome',
            'email',
            'apelido',
            'id_sexo',
            'id_municipio',
            'id_instituicao',
            'nascimento',
            'bio'
                ), 'tab-1', array(
            'decorators' => array(
                'FormElements',
                array('HtmlTag', array('tag' => 'div', 'id' => 'tab-1'))
            )
        ));

        // grupo para tab-2
        $this->addElement($this->_twitter())
                ->addElement($this->_facebook())
                ->addElement($this->_slideshare())
                ->addElement($this->_website());
        $this->addDisplayGroup(array(
            'twitter',
            'facebook',
            'slideshare',
            'endereco_internet'
                ), 'tab-2', array(
            'decorators' => array(
                'FormElements',
                array('HtmlTag', array('tag' => 'div', 'id' => 'tab-2'))
            )
        ));

        // agrupar botoes
        $this->addDisplayGroup(array('confimar', 'cancelar'), 'form_actions', array(
            'decorators' => array(
                'FormElements',
                array('HtmlTag', array('tag' => 'div'))
            )
        ));
    }

    protected function _bio() {
        $e = new Zend_Form_Element_Textarea('bio');
        $e->setLabel('Bio:')
                ->setAttrib('rows', 10)
                ->setAttrib('placeholder', 'Fale um pouco sobre você...')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
        return $e;
    }

    private function _twitter() {
        $e = $this->createElement('text', 'twitter', array('label' => 'Twitter: @'));
        $e->addValidator('regex', false, array('/^[A-Za-z0-9_]*$/'))
                ->addErrorMessage("Twitter inválido");
        return $e;
    }

    private function _facebook() {
        $e = $this->createElement('text', 'facebook', array('label' => 'Facebook (E-mail): '));
        $e->addValidator('EmailAddress')
                ->addErrorMessage("Facebook inválido");
        return $e;
    }

    private function _website() {
        $e = $this->createElement('text', 'endereco_internet', array('label' => 'Site: '));
        $e->setAttrib("placeholder", "http://comsolid.org")
                ->addValidator(new Url_Validator)
                ->addErrorMessage("Site inválido (ex. http://comsolid.org)");
        return $e;
    }

    private function _slideshare() {
        $e = $this->createElement('text', 'slideshare', array('label' => 'Slideshare: '));
        $e->addValidator('regex', false, array('/^[A-Za-z0-9_]*$/'))
                ->addErrorMessage("Usuário slideshare inválido");
        return $e;
    }

}
