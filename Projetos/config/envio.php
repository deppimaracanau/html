<?php 
 //Carrega as classes do PHPMailer
 include("./config/phpmailer/PHPMailer.php"); 
 include("./config/phpmailer/SMTP.php"); 

 error_reporting(E_ALL);
 error_reporting(E_STRICT);


 $mail = new PHPMailer();
 $mail->IsSMTP(); 
 $mail->CharSet = 'UTF-8';
 $mail->True;
 $mail->Host = "smtp.gmail.com"; // Servidor SMTP ssl://smtp.gmail.com


 $mail->SMTPSecure = "tls"; // conexão segura com TLS
 $mail->Port = 587; 
 //$Email->SMTPSecure = "ssl";
 //$mail->Port = 465;
 $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação

 $mail->Username = "deppi.maracanau@ifce.edu.br"; // SMTP username
 $mail->Password = "abcd1234"; // SMTP password


 $mail->From = "deppi.maracanau@ifce.edu.br"; // de
 $mail->FromName = "Deppi - campus maracanau" ; // Nome de quem envia o email
 $mail->AddAddress($mailDestino, $nome); // Email e nome de quem receberá //Responder
 $mail->WordWrap = 50; // Definir quebra de linha
 $mail->IsHTML = true ; // Enviar como HTML
 $mail->Subject = $assunto ; // Assunto
 $mail->Body = '<br/>' . $mensagem . '<br/>' ; //Corpo da mensagem caso seja HTML
 $mail->AltBody = "$mensagem" ; //PlainText, para caso quem receber o email não aceite o corpo HTML

 if(!$Email->Send()) {
    echo "A mensagem não foi enviada.";
    echo "Mensagem de erro: " . $Email->ErrorInfo;
  } else {
    echo "window.location='$exibir_apos_envio'";
  }



 if ($_POST) 
 {

 
 //envia o e-mail para o visitante do site
 $mailDestino = $_POST['email']; 
 $nome = $_POST['name']; 
 $mensagem = $_POST['retorno'];
 $assunto = "Obrigado pelo seu contato em breve retornaremos";

 
 //envia o e-mail para o administrador do site
 $mailDestino = 'deppi.maracanau@ifce.edu.br'; 
 $nome = $_POST['name']; 
 $assunto = $_POST['subject'];
 $mensagem = $_POST['message'];
}
?>
