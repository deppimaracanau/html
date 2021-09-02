<?php
	
	/* script configurado para funcionar com o serviço de smtp do gmail */
	/* cuidado para não expor seus dados de usuário e senha de email */
	/* o gmail implementa uma segurança para permitir ou não o acesso ao seu e-mail através de aplicativos menos seguros (como é caso), ao efetuar o teste de envio de e-mail consulte sua caixa de mensagem, caso esta configuração esteja desabilitada você receberá um e-mail do google questionando se deve ou não habilitar tal acesso */

	$nome = "nome";
$email = "email";
$mensagem = "mensagem";
	
	require 'PHPMailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPDebug = false;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->Username = 'formulario.pesquisa.2018.ifce@gmail.com';
$mail->Password = 'd3pp1d3pp12018';

$mail->SetFrom('formulario.pesquisa.2018.ifce@gmail.com', '####');
$mail->addAddress('diego-dlp@hotmail.com', '####');
$mail->Subject = ("Email de contato");
$mail->msgHTML("<html>De: {$nome}<br/>Email: {$email}<br/>Mensagem: {$mensagem}</html>");
$mail->AltBody = 'De: {$nome}\nEmail: {$email}\nMensagem: {$mensagem}';

if ($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso!";
    header("Location: index.php");
}  else {
    $_SESSION["danger"] = "Erro o enviar a mensagem " . $mail->ErrorInfo;
    header("Location: contato.php");
}
?>