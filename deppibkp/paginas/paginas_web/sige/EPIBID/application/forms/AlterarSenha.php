<?php

class Application_Form_AlterarSenha extends Zend_Form {

    public function init() {
        $sessao = Zend_Auth::getInstance()->getIdentity();

        $idPessoa = $sessao["idPessoa"];

        $model_pessoa = new Application_Model_Pessoa();
        $pessoa = $model_pessoa->find($idPessoa);

        $login = $this->createElement('text', 'email', array('label' => 'Login/E-mail: '));
        $login->setRequired(true)
                ->addValidator('EmailAddress')
                ->setAttrib('readonly', 'readonly')
                ->setValue($pessoa[0]->email);

        $senhaAntiga = $this->createElement('password', 'senhaAntiga', array('label' => 'Senha Antiga: '));
        $senhaAntiga->addValidator('stringLength', false, array(6, 15))
                ->setRequired(true)
                ->addErrorMessage("Você digitou uma senha muito pequeno ou muito grande");

        $senhaNova = $this->createElement('password', 'senhaNova', array('label' => 'Senha Nova: '));
        $senhaNova->addValidator('stringLength', false, array(6, 15))
                ->setRequired(true)
                ->addErrorMessage("Você digitou uma senha muito pequeno ou muito grande");

        $senhaNovaRepeticao = $this->createElement('password', 'senhaNovaRepeticao', array('label' => 'Repita a Nova Senha: '));
        $senhaNovaRepeticao->addValidator('stringLength', false, array(6, 15))
                ->setRequired(true)
                ->addErrorMessage("Você digitou uma senha muito pequeno ou muito grande");

        $this->addElement($login)
                ->addElement($senhaAntiga)
                ->addElement($senhaNova)
                ->addElement($senhaNovaRepeticao);
        $botao = $this->createElement('submit', 'confimar')->removeDecorator('DtDdWrapper');
        $this->addElement($botao);
        $botao = $this->createElement('submit', 'cancelar')->removeDecorator('DtDdWrapper');
        $botao->setAttrib('class', 'submitCancelar');
        $this->addElement($botao);
    }

}
