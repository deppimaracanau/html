<?php

/**
 * Modelo para tabela "mensagem_email"
 * Trata do envio de e-mail usando Zend_Mail.
 */
class Application_Model_EmailConfirmacao extends Zend_Db_Table_Abstract {

    const MSG_CONFIRMACAO = 0;
    const MSG_RECUPERAR_SENHA = 1;
    const MSG_CONFIRMACAO_SUBMISSAO = 2;

    protected $_name = 'mensagem_email';
    protected $_primary = array('id_encontro', 'id_tipo_mensagem_email');
    private $config;

    public function __construct($config = array()) {
        parent::__construct($config);
        $this->config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'emailmsg');
    }

    /**
     * Obtem dados da mensagem de confirmação para e-mail.
     * @param int $idEncontro
     * @return Zend_Db_Table_Row_Abstract
     */
    public function getMsgConfirmacao($idEncontro) {
        return $this->find($idEncontro, $this->config->email->confirmacao_inscricao)->current();
    }

    /**
     * Obtem dados da mensagem de recuperação de senha para e-mail.
     * @param int $idEncontro
     * @return Zend_Db_Table_Row_Abstract
     */
    public function getMsgCorrecao($idEncontro) {
        return $this->find($idEncontro, $this->config->email->recuperacao_senha)->current();
    }

    /**
     * Obtem dados da mensagem de confirmação de submissão para e-mail.
     * @param int $idEncontro
     * @return Zend_Db_Table_Row_Abstract
     */
    public function getMsgConfirmacaoSubmissao($idEncontro) {
        return $this->find($idEncontro, $this->config->email->confirmacao_submissao)->current();
    }

    /**
     * Envia e-mail para usuário com dados iniciais, como username (e-mail) e senha.
     * @param int $id_pessoa
     * @param int $id_encontro
     * @param int $tipoMensagem use as constantes definidas acima [ MSG_CONFIRMACAO, MSG_RECUPERAR_SENHA ].
     * @throws Exception
     */
    public function send(
    $id_pessoa, $id_encontro, $tipoMensagem = Application_Model_EmailConfirmacao::MSG_CONFIRMACAO
    ) {

        $mail = new Zend_Mail();
        $pessoa = new Application_Model_Pessoa();
        $linha = $pessoa->find($id_pessoa)->current();
        $pessoa->email = $linha->email;
        $pessoa->gerarSenha();

        switch ($tipoMensagem) {
            case Application_Model_EmailConfirmacao::MSG_CONFIRMACAO:
                $emailText = $this->getMsgConfirmacao($id_encontro);
                break;
            case Application_Model_EmailConfirmacao::MSG_RECUPERAR_SENHA:
                $emailText = $this->getMsgCorrecao($id_encontro);
                break;
            case Application_Model_EmailConfirmacao::MSG_CONFIRMACAO_SUBMISSAO:
                $emailText = $this->getMsgConfirmacaoSubmissao($id_encontro);
                break;
            default:
                throw new Exception("Opção de envio de e-mail não definida.");
        }

        if (empty($emailText->link)) {
            $link = "#";
        } else {
            $link = $emailText->link;
        }
        $emailText->mensagem = str_replace('{nome}', $linha->nome, $emailText->mensagem);
        $emailText->mensagem = str_replace('{email}', $linha->email, $emailText->mensagem);
        $emailText->mensagem = str_replace('{senha}', $pessoa->senha, $emailText->mensagem);
        $emailText->mensagem = str_replace('{href_link}', $link, $emailText->mensagem);
        $emailText->mensagem = str_replace('{assinatura_siteoficial}', $emailText->assinatura_siteoficial, $emailText->mensagem);
        $emailText->mensagem = str_replace('{assinatura_email}', $emailText->assinatura_email, $emailText->mensagem);

        $mail->setBodyHtml(iconv(
                        $this->config->email->in_charset, $this->config->email->out_charset, $emailText->mensagem
        ));
        $mail->addTo($linha->email);
        // $mail->addBcc("sic.maracanau@ifce.edu.br");
        $mail->setSubject(iconv(
                        $this->config->email->in_charset, $this->config->email->out_charset, $emailText->assunto
        ));

        $mail->send();
    }

}
