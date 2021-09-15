<?php

// ############# Verificação de Senha ############# \\
session_start();

// Conexão com o banco de dados
require_once('bd.class.php');
$bd = new bd();
$conexao = $bd->estabelecerConexao();

if($conexao == null) {
	print "Não foi possível estabelecer uma conexão com o banco de dados.";

} else {
	$login = $_SESSION['nome'];
	$senha = md5($_POST['senha']);

	$consulta = pg_query($conexao, "SELECT * FROM usuario WHERE nome = '$login' AND senha = '$senha'");

	$resultado = pg_fetch_array($consulta);

	// Verifica o login
	if($resultado == false) {
		header('Location: ../views/home/home.php?cod=0');
		die();
	}

}



include("../libs/mpdf60/mpdf.php");
//include("../libs/PHPMailer/PHPMailerAutoload.php");


// ############# Envio de Certificado (Email) ############# \\
$envioEmail = $_POST['envioEmail'];



// ############# Criação dos Certificados ############# \\

// Variáveis do Formulário
//$email    = $_POST['email'];
$texto    = $_POST['texto'];
$nomes    = $_POST['nomes'];
$cidade   = "Maracanaú";

// Configurações de data
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );
$data = $cidade . strftime( ', %d de %B de %Y', strtotime( date( 'Y-m-d' ) ) );

// Conteúdo
$nomes = explode("\n", $nomes);
for ($i = 0; $i < count($nomes); $i++) { 

	$mpdf = new mPDF('utf-8', 'A4-L');
	
	// Edições no nome, remoção de espaços e tudo maiúsculo
	$encoding = mb_internal_encoding();
	$nome = mb_strtoupper($nomes[$i],$encoding);
	$nome = trim($nome);

	// Extração do email da variavel $nome
	if($envioEmail == true) {
		$nome = explode("|", $nome);
		$email = trim($nome[1]);
		$nome = $nome[0];
	}

	// Limpeza de formatação do texto (Quebra de linha do editor)
	$texto = str_replace("<p>", "", $texto);
	$texto = str_replace("</p>", "", $texto);
	$texto = trim($texto);

	// Corpo do Certificado
	$html = "
		<style>
			body {
				font-family: Arial;
				font-size: 22px;
			}
			.imagem {
	            position: absolute;
	            top: 0px;
	            left: 0px;
	            bottom: 0px;
	            right: 0px;
	         }
	         .tabela {
	            position: absolute; 
	            top: 270px; 
	            left: 60px; 
	            width: 100%;
	         }
		</style>
		<div class=\"imagem\">
			<img src=\"certificado.jpg\" class=\"imagem\"/>
		</div>

		<div class=\"tabela\">
			<table style=\"position: absolute;\" class=\"texto\">
				<tr>
					<td width=\"170px\"></td>
					<td width=\"840px\" style=\"text-align: justify;\">
						<p>
				 		Certificamos que <strong>$nome</strong> $texto
				 		</p>

				 		<br><br>
					</td>
				</tr>
				<tr>
					<td colspan=\"2\"  style=\"text-align: right;\">
		 			<p>
					 	$data
					</p>
				</td>
				</tr>
			</table>
		</div>
	";

	// Importação da Página HTML ao pdf
	$mpdf->WriteHTML($html);

	// Salva no diretório
	$diretorio = "/home/otavio/certificados/$nomes[$i].pdf";
	$mpdf->Output($diretorio, 'F');

	// Limpar documento
	$html = "";
	$mpdf->WriteHTML($html);





/*
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	//require 'vendor/autoload.php';
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	$mail = new PHPMailer(true); // Passing `true` enables exceptions
	print "teste";                             
	try {
	    //Server settings
	    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'formulario.pesquisa.2018.ifce@gmail.com';                 // SMTP username
	    $mail->Password = 'd3pp1d3pp12018';                           // SMTP password
	    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 465; 

	                                      // TCP port to connect to

	    //Recipients
	    $mail->setFrom('from@example.com', 'Mailer');
	    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
	    $mail->addAddress('ellen@example.com');               // Name is optional
	    $mail->addReplyTo('info@example.com', 'Information');
	    $mail->addCC('cc@example.com');
	    $mail->addBCC('bcc@example.com');
	    $mail->addAddress('diego-dlp@hotmail.com');

	    //Attachments
	    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Here is the subject';
	    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	    echo 'Message has been sent';
	} catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}




	$email = "diego-dlp@hotmail.com";
	header('Content-Type: text/html; charset=UTF-8');
	// Envio por email
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'ssl://smtp.gmail.com';
	$mail->Port = '465';
	$mail->isHTML();

	$mail->Username = 'formulario.pesquisa.2018.ifce@gmail.com';
	$mail->Password = 'd3pp1d3pp12018';
	//$mail->SetFrom('no-reply@howcode.org');
	$nome_email = mb_convert_encoding("IFCE Campus Maracanaú - DEPPI","auto", "UTF-8");

	$mail->SetFrom("formulario.pesquisa.2018.ifce@gmail.com", "$nome_email");
	//Converter texto para utf-8
	$subject = mb_convert_encoding('Formulário Pesquisa IFCE 2018',"auto", "UTF-8");
	$mail->Subject = $subject;
	$body = mb_convert_encoding('Olá, '.$nome.' <br><br>Suas informações foram cadastradas com sucesso! O Resultado Parcial será divulgado no dia 06/04.<br><br>Att,',"auto", "UTF-8");
	$mail->Body = $body;
	$mail->AddAddress($email);

	if(!$mail->Send()) {
		echo 'Erro:'.$mail->ErrorInfo;
	} else {
		echo 'Email enviado!';
	}
*/
}

//$mpdf->Output();




// ############# Arquivo ZIP (Download) ############# \\

// Criando o objeto
$nomeArquivo = $_POST['titulo'];
$zip = new ZipArchive();
$files = glob('certificados/*');

// Criando o pacote chamado "teste.zip"
$arquivo = $zip->open("$nomeArquivo.zip", ZipArchive::CREATE);
if ($arquivo === true) {
	// Excluir os arquivos criados
	foreach($files as $file) {
		$zip->addFile($file);
	}
	// Salvando o arquivo
	$zip->close();
   
} else {
   echo 'Erro: '.$arquivo;
}

// Download do arquivo
if(file_exists("$nomeArquivo.zip")){
	header('Content-type: application/zip');
	header("Content-disposition: attachment; filename=\"$nomeArquivo.zip\"");
	readfile("$nomeArquivo.zip");

	// Exclui o arquivo zip
	unlink("$nomeArquivo.zip");
}

// Excluir os arquivos criados
foreach($files as $file) {
	if(is_file($file))
		unlink($file);
}

header('Location: ../views/home/home.php');
?>