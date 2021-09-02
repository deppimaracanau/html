<?php

/* script configurado para funcionar com o servi�o de smtp do gmail */
/* cuidado para n�o expor seus dados de usu�rio e senha de email */
/* o gmail implementa uma seguran�a para permitir ou n�o o acesso ao seu e-mail atrav�s de aplicativos menos seguros (como � caso), ao efetuar o teste de envio de e-mail consulte sua caixa de mensagem, caso esta configura��o esteja desabilitada voc� receber� um e-mail do google questionando se deve ou n�o habilitar tal acesso */


require 'PHPMailer/PHPMailerAutoload.php';


$nome = $_POST['nome'];
$email = $_POST['email'];
$titulo = $_POST['titulo'];
$mensagem = $_POST['mensagem'];

echo $nome . "<br>";
echo $email . "<br>";
echo $titulo . "<br>";
echo $mensagem . "<br>";

SendEmailD($email, $nome, $titulo, $mensagem);
SendEmailR($email, $nome);


function SendEmailD($email, $nome, $titulo, $mensagem)
{



	//configura��es b�sicas de endere�o e protoloco 
	$mail = new PHPMailer; //faz a inst�ncia do objeto PHPMailer
	//$mail->SMTPDebug = true; //habilita o debug se par�metro for true
	$mail->isSMTP(); //seta o tipo de protocolo
	$mail->Host = "ssl://smtp.gmail.com"; //define o servidor smtp
	$mail->SMTPAuth = true; //habilita a autentica��o via smtp
	//$mail->SMTPOptions = [ 'ssl' => [ 'verify_peer' => false ] ];
	$mail->SMTPSecure = 'tls'; //tipo de seguran�a
	$mail->Port = 465; //porta de conex�o

	// Tentando Corrigir
	$mail->SMTPKeepAlive = true;
	$mail->Mailer = "smtp";
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);

	//dados de autentica��o no servidor smtp
	$mail->Username = 'deppi.maracanau@ifce.edu.br'; //usu�rio do smtp (email cadastrado no servidor)
	$mail->Password = 'abcd1234'; //senha ****CUIDADO PARA N�O EXPOR ESSA INFORMA��O NA INTERNET OU NO F�RUM DE D�VIDAS DO CURSO****

	//dados de envio de e-mail
	// $mail->setFrom('deppi.maracanau@ifce.edu.br','DEPPI IFCE Maracanau');
	// $mail->addAddress($email, $nome); //e-mails que receberam a mesagem
	// $mail->setFrom($email, $nome);
	$mail->Sender = $email;
	$mail->From = $email; // email
	$mail->FromName = $nome; // nome
	// $mail->setFrom('vitorsantosferreira10@gmail.com', $nome);
	$mail->addAddress('deppi.maracanau@ifce.edu.br', 'Deppi'); //e-mails que receberam a mesagem


	// $mail->addAttachment('/home/vitor/teste/'.$nomeArquivo.'.pdf');         // Add attachments

	//configura��o da mensagem
	$mail->isHTML(true); //formato da mensagem de e-mail
	$mail->Subject = $titulo; //assunto
	$mail->Body    = "<b><i>Nome:</i></b> ".$nome."<br>"."<b><i>Email:</i></b> ".$email . "<br><br>" . $mensagem; //Se o formato da mensagem for HTML voc� poder� utilizar as tags do HTML no corpo do e-mail
	$mail->AltBody = "Nome:".$nome . " " ."Email:".$email . " " . $mensagem; //texto alternativo caso o html n�o seja suportado

	//envio e testes
	if (!$mail->send()) { //Neste momento duas a��es s�o feitas, primeiro o send() (envio da mensagem) que retorna true ou false, se retornar false (n�o enviado) juntamente com o operador de nega��o "!" entra no bloco if.
		echo 'A mensagem n�o pode ser enviada ';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'A mensagem foi enviada com sucesso!';
	}
}


function SendEmailR($email, $nome)
{



	//configura��es b�sicas de endere�o e protoloco 
	$mail = new PHPMailer; //faz a inst�ncia do objeto PHPMailer
	//$mail->SMTPDebug = true; //habilita o debug se par�metro for true
	$mail->isSMTP(); //seta o tipo de protocolo
	$mail->Host = "ssl://smtp.gmail.com"; //define o servidor smtp
	$mail->SMTPAuth = true; //habilita a autentica��o via smtp
	//$mail->SMTPOptions = [ 'ssl' => [ 'verify_peer' => false ] ];
	$mail->SMTPSecure = 'tls'; //tipo de seguran�a
	$mail->Port = 465; //porta de conex�o

	// Tentando Corrigir
	$mail->SMTPKeepAlive = true;
	$mail->Mailer = "smtp";
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);

	//dados de autentica��o no servidor smtp
	$mail->Username = 'deppi.maracanau@ifce.edu.br'; //usu�rio do smtp (email cadastrado no servidor)
	$mail->Password = 'abcd1234'; //senha ****CUIDADO PARA N�O EXPOR ESSA INFORMA��O NA INTERNET OU NO F�RUM DE D�VIDAS DO CURSO****

	//dados de envio de e-mail
	$mail->setFrom('deppi.maracanau@ifce.edu.br','DEPPI IFCE Maracanau');
	// $mail->addAddress($email, $nome); //e-mails que receberam a mesagem
	// $mail->setFrom('vitorsantosferreira10@gmail.com', $nome);
	$mail->addAddress($email, $nome); //e-mails que receberam a mesagem


	// $mail->addAttachment('/home/vitor/teste/'.$nomeArquivo.'.pdf');         // Add attachments

	//configura��o da mensagem
	$mail->isHTML(true); //formato da mensagem de e-mail
	$mail->Subject = "Mensagem Recebida!"; //assunto
	$mail->Body    = "Ola ".$nome." recebemos sua mensagem, em breve a responderemos.<br><br>Atenciosamente;<br>Departamento de Extenção, Pesquisa, Pós-Graduação e Inovação - <b>DEPPI<b> IFCE Campus de Maracanaú.</p>"; //Se o formato da mensagem for HTML voc� poder� utilizar as tags do HTML no corpo do e-mail
	$mail->AltBody = "recebemos sua mensagem, em breve a responderemos."; //texto alternativo caso o html n�o seja suportado

	//envio e testes
	if (!$mail->send()) { //Neste momento duas a��es s�o feitas, primeiro o send() (envio da mensagem) que retorna true ou false, se retornar false (n�o enviado) juntamente com o operador de nega��o "!" entra no bloco if.
		echo 'A mensagem n�o pode ser enviada ';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'A mensagem foi enviada com sucesso!';
	}

	header('Location:../index.html');
}
