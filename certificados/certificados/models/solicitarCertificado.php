<?php

session_start();

// Conexão com o banco de dados
require_once('bd.class.php');
$bd = new bd();

$conexao = $bd->estabelecerConexao();

if ($conexao == null) {
	print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
	$nome_evento = $_POST['evento'];
	$instituicao = $_POST['instituicao'];
	$carga_horaria = $_POST['carga'];
	$tipo_certificado = $_POST['tipo'];
	$periodo = $_POST['periodo'];
	$ano_evento = $_POST['ano'];
	$local = $_POST['local'];



	$lista_nomes = $_POST['nomes'];
	$lista_emails = $_POST['emails'];


	$nomes = explode("\n", $lista_nomes);
	$emails = explode("\n", $lista_emails);


	$lista_nomes = '';
	$lista_emails = '';
	$qtd_certificados = 0;



	for ($i = 0; $i < count($nomes); $i++) {
		if ($nomes[$i] != "\r" && verficarP($nomes[$i]) != 1) {
			$lista_nomes .= $nomes[$i] . ',';
			$qtd_certificados++;
		}
	}

	for ($i = 0; $i < count($emails); $i++) {
		if ($emails[$i] != "\r" && verficarP($emails[$i]) != 1) {
			$lista_emails .= $emails[$i] . ',';
		}
	}




	$consulta = pg_query($conexao, "INSERT INTO solicitacao (nome_evento,instituicao,carga_horaria,tipo_certificado,periodo,local,lista_nomes,ano_evento,qtd_certificados,status,emails) VALUES ('$nome_evento','$instituicao','$carga_horaria','$tipo_certificado','$periodo','$local','$lista_nomes','$ano_evento','$qtd_certificados','Pendente','$lista_emails');")
		or die("<meta charset=\"utf-8\"><br><center><h1>Erro no registro da solicitação, por favor, reveja as informações repassadas ou entre em contato com o DEPPI.</h1></center>");


	header('Location: ../views/solicitacao/solicitacao.php?cod=0');
}

// Função de tratamento para a nome lista de nomes
function verficarP($string)
{

	$array = str_split($string);

	if ($array[0] == " " && $array[1] == " " || $array[0] == " " && $array[1] == "\r" || $array[0] == " " && $array[1] == "\n") {
		return 1;
	} else {
		return 0;
	}
}
