<?php

/* Pegando informações do formulário */
		$nome00 = $_POST['nome'];
		$email00 = $_POST['email'];
		header('Content-Type: text/html; charset=UTF-8');

		/*Código para enviar email, necessário permitir nas configurações do gmail*/
		require_once('PHPMailer/PHPMailerAutoload.php');

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'ssl://smtp.gmail.com';
		$mail->Port = '587';
		$mail->isHTML();
		$mail->Username = 'pedrovitor.projects@gmail.com';
		$mail->Password = 'PV12345PV';
		$mail->SetFrom('no-reply@howcode.org');
		//Converter texto para utf-8
		$subject = mb_convert_encoding('Formulário Pesquisa IFCE 2018',"auto", "UTF-8");
		$mail->Subject = $subject;
		$mail->Body = 'Olá, '.$nome00.' <br><br>Suas informações foram cadastradas com sucesso! O Resultado Parcial será divuldado no dia 23/03.<br><br>Att,';
		$mail->AddAddress($email00);
		
		if(!$mail->Send()) {
			 echo extension_loaded('openssl')? "OK" : "Nao tem";
		} else {
			echo 'Email enviado!';
		}
		 	
		
		
		 pg_close ($conexao);


?>