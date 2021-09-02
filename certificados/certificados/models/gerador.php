<?php

// ############# Verificação de Senha ############# \\
session_start();

// Conexão com o banco de dados
require_once('bd.class.php');
include("../libs/emailC.php");


$bd = new bd();
$conexao = $bd->estabelecerConexao();

if ($conexao == null) {
	print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
	$login = $_SESSION['nome'];
	$senha = md5($_POST['senha']);

	$consulta = pg_query($conexao, "SELECT * FROM usuario WHERE nome = '$login' AND senha = '$senha'");

	$resultado = pg_fetch_array($consulta);

	// Verifica o login
	if ($resultado == false) {
		header('Location: ../views/home/home.php?cod=1');
		die();
	}
}

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

$texto    = $_POST['texto'];
$evento    = $_POST['titulo'];
$nomes    = $_POST['nomes'];
$emails    = $_POST['emails'];
$cidade   = "Maracanaú";



// hj 24 09

// if (isset($_POST['contProg'])) {
// 	$prog = $_POST['contProg'];

// 	$pesquisaSQL = "SELECT * FROM evento WHERE id_even = '$prog'";
// 	$consulta = pg_query($conexao, $pesquisaSQL);
// 	$valor = pg_num_rows($consulta);

// 	while ($resultado = pg_fetch_array($consulta)) {
// 		$conteudo = $resultado[2];
// 	}
// } else {
// 	$prog = null;
// 	$conteudo = "";
// }



//Configuração da data e caracteres

setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data = $cidade . strftime(', %d de %B de %Y', strtotime(date('Y-m-d')));

// Create an instance of the class:

$nomes = explode("\n", $nomes);
$emails = explode("\n", $emails);



if ($emails[1] == "" || $emails[1] == " " || $emails[1] == "\r") {




	// variavel auxiliar para nome no texto
	$aux = "[nome]";

	for ($i = 0; $i < count($nomes); $i++) {

		// logica condicional para string vazia \r

		if ($nomes[$i] != "\r" && $nomes[$i] != "" && $nomes[$i] != " " && verficarP($nomes[$i]) != 1) {
		





			// Edições no nome, remoção de espaços e tudo maiúsculo
			$encoding = mb_internal_encoding();
			$nomes[$i] = mb_strtoupper($nomes[$i], $encoding);
			$nomes[$i] = trim($nomes[$i]);



			// Limpeza de formatação do texto (Quebra de linha do editor)
			$texto = str_replace("<p>", "", $texto);
			$texto = str_replace("</p>", "", $texto);

			$texto = str_replace($aux, '<strong>' . $nomes[$i] . '</strong>', $texto);
			$aux = $nomes[$i];

			$texto = trim($texto);


			$mpdf = new \Mpdf\Mpdf([
				'mode' => 'utf-8',
				'format' => 'A4-L',
				'tempDir' =>  '/home/bolsista/gerados/'
			]);


			// Corpo do Certificado c/ <img src=\"certificado.jpg\" template básico do certificado 
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
				white-space: normal;
	         }
		</style>
		<div class=\"imagem\"> 
			<img src=\"../views/img/certificado.jpg\" class=\"imagem\"/>
		</div>

		<div class=\"tabela\">
			<table style=\"position: absolute;\" class=\"texto\">
				<tr>
					<td width=\"170px\"></td>
					<td width=\"840px\" style=\"text-align: justify;\">
						
				 		<nobr>$texto</nobr>
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

			
			$mpdf->AddPage(); //somente é necessário se for gerar diretamente no navegador
			$mpdf->WriteHTML($html);




			// adcionado hj 24 09


	// 		$html = "
	// 	<style>
	// 		body {
	// 			font-family: Arial;
	// 			font-size: 22px;
	// 		}
	// 		.imagem {
	//             position: absolute;
	//             top: 0px;
	//             left: 0px;
	//             bottom: 0px;
	//             right: 0px;
	// 		 }
	// 		 .tabela {
	//             position: absolute; 
	//             top: 120px; 
	//             left: 10%; 
	// 			width: 100%;
	// 			white-space: normal;
	// 		 }
	// 		 table td {
	// 			 border: 1px solid black;
	// 			 padding-left: 3%;
	// 			 padding-right: 3%;
	// 			 margin-bottom:10px;
	// 			 font-family: \"Avantgarde\", \"TeX Gyre Adventor\", URW Gothic L, sans-serif;
	// 			 font-style: italic;
	// 		 }
	// 	</style>
	// 	<div class=\"imagem\"> 
	// 		<img src=\"../views/img/verso.png\" class=\"imagem\"/>
	// 	</div>

	// 	<div class=\"tabela\">
	// 	<table style=\"position: absolute;width: 80%;\">
	// 	<thead>
	// 		<tr>
	// 		<td><center><h2>$evento </h2></center></td>
	// 		</tr>
	// 	</thead>
	// 	<tbody>
	// 		<tr>
	// 		<td style=\"padding-top: 4%;padding-bottom: 4%;\"><nobr>$conteudo</nobr></td>
	// 		</tr>
	// 		<tr>
	// 		<td><center><b>Instituto Federal do Ceará - Campus Maracanaú <br> Instituto Federal de Educacao, Ciência e Técnologia do Ceará <br> CNPJ 10.744.098/0009-00</b></center></td>
	// 		</tr>
	// 	</tbody>
	// 	</table>
	// 	</div>
	// ";
	// 		$mpdf->WriteHTML($html);







			// Salva no diretório
			$directory = "/home/bolsista/gerados/$nomes[$i].pdf";
			$mpdf->Output($directory, 'F');




			
		}

		// Output a PDF file directly to the browser
		//$mpdf->Output(); //não é necessário uma vez que está sendo enviando diretamente para a pasta de certificados
	}

	SendEmail($emails[0], $nomes, $nomes, $evento,0);
	
} else {

	// variavel auxiliar para nome no texto
	$aux = "[nome]";

	for ($i = 0; $i < count($nomes); $i++) {

		// logica condicional para string vazia \r

		if ($nomes[$i] != "\r" && $nomes[$i] != "" && $nomes[$i] != " " && verficarP($nomes[$i]) != 1) {
		




			// Edições no nome, remoção de espaços e tudo maiúsculo
			$encoding = mb_internal_encoding();
			$nomes[$i] = mb_strtoupper($nomes[$i], $encoding);
			$nomes[$i] = trim($nomes[$i]);



			// Limpeza de formatação do texto (Quebra de linha do editor)
			$texto = str_replace("<p>", "", $texto);
			$texto = str_replace("</p>", "", $texto);

			$texto = str_replace($aux, '<strong>' . $nomes[$i] . '</strong>', $texto);
			$aux = $nomes[$i];

			$texto = trim($texto);


			$mpdf = new \Mpdf\Mpdf([
				'mode' => 'utf-8',
				'format' => 'A4-L',
				'tempDir' =>  '/home/bolsista/gerados/'
			]);


			// Corpo do Certificado c/ <img src=\"certificado.jpg\" template básico do certificado 
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
				white-space: normal;
	         }
		</style>
		<div class=\"imagem\"> 
			<img src=\"../views/img/certificado.jpg\" clas/home/bolsista/gerados/s=\"imagem\"/>
		</div>

		<div class=\"tabela\">
			<table style=\"position: absolute;\" class=\"texto\">
				<tr>
					<td width=\"170px\"></td>
					<td width=\"840px\" style=\"text-align: justify;\">
						
				 		<nobr>$texto</nobr>
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

			
			$mpdf->AddPage(); //somente é necessário se for gerar diretamente no navegador
			$mpdf->WriteHTML($html);




			// adcionado hj 24 09


	// 		$html = "
	// 	<style>
	// 		body {
	// 			font-family: Arial;$status
	//             left: 0px;
	//             bottom: 0px;
	//             right: 0px;
	// 		 }
	// 		 .tabela {
	//             position: absolute; 
	//             top: 120px; 
	//             left: 10%; 
	// 			width: 100%;
	// 			white-space: normal;
	// 		 }
	// 		 table td {
	// 			 border: 1px solid black;
	// 			 padding-left: 3%;
	// 			 padding-right: 3%;
	// 			 margin-bottom:10px;$status
	// 	</style>
	// 	<div class=\"imagem\"> 
	// 		<img src=\"../views/img/verso.png\" class=\"imagem\"/>
	// 	</div>

	// 	<div class=\"tabela\">
	// 	<table style=\"position: absolute;width: 80%;\">
	// 	<thead>
	// 		<tr>
	// 		<td><center><h2>$evento </h2></center></td>
	// 		</tr>
	// 	</thead>
	// 	<tbody>
	// 		<tr>
	// 		<td style=\"padding-top: 4%;padding-bottom: 4%;\"><nobr>$conteudo</nobr></td>
	// 		</tr>
	// 		<tr>
	// 		<td><center><b>Instituto Federal do Ceará - Campus Maracanaú <br> Instituto Federal de Educacao, Ciência e Técnologia do Ceará <br> CNPJ 10.744.098/0009-00</b></center></td>
	// 		</tr>
	// 	</tbody>
	// 	</table>
	// 	</div>
	// ";
	// 		$mpdf->WriteHTML($html);







			// Salva no diretório
			$directory = "/home/bolsista/gerados/$nomes[$i].pdf";
			$mpdf->Output($directory, 'F');




			SendEmail($emails[$i], $nomes[$i], $nomes[$i], $evento,1);
		}

		// Output a PDF file directly to the browser
		//$mpdf->Output(); //não é necessário uma vez que está sendo enviando diretamente para a pasta de certificados
	}
}


// // ############# Arquivo ZIP (Download) ############# \\

//  // Criando o objeto
// 	$nomeArquivo = $_POST['titulo'];
// 	$zip = new ZipArchive();
// 	$files = glob('certificados/*'); //alterando esse caminho dentro do parênteses ele para de gerar os pdfs

// 	// Criando o pacote chamado "teste.zip"
// 	$arquivo = $zip->open("$nomeArquivo.zip", ZipArchive::CREATE);

// 	if ($arquivo === true) {
// 		// Excluir os arquivos criados
// 		foreach($files as $file) {
// 			$zip->addFile($file);
// 		}
// 		// && $array[1] == "\r"{
// 	echo 'Erro: '.$arquivo;
// 	}

// 	// Download do arquivo
// 	if (file_exists("$nomeArquivo".zip)){
// 		header('Content-Type: application/zip');
// 		header('Content-disposition: attachment; filename='.$nomeArquivo);
// 		header('Content-Length: ' . filesize($nomeArquivo));
// 		readfile($zipname);

// 	//exclusão do arquivo zip
// 		unlink("$nomeArquivo".zip);
// 	}

// 	// Excluir os arquivos criados
// 	foreach($files as $file) {
// 		if(is_file($file))
// 			unlink($file);
// 	}

// header('Location: ../views/home/home.php');





// função de tratamento de erro de envio dos pdfs

function verficarP($string)
{

	$array = str_split($string);

	if ($array[0] == " " && $array[1] == " " || $array[0] == " " && $array[1] == "\r" || $array[0] == " " && $array[1] == "\n") {
		return 1;
	} else {
		return 0;
	}
}



// $aux="[nome]";
// for ($i = 0; $i < 10; $i++) {
// 	$texto = str_replace($aux, '<strong>' .$i . '</strong>', $texto);
// 	$aux=$i;
// 	echo $texto."<br>";
	
// }
