<?php

session_start();

// Conexão com o banco de dados
require_once('bd.class.php');
$bd = new bd();
$conexao = $bd->estabelecerConexao();

if ($conexao == null) {
	print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
	$id_solicitacao = $_POST['id'];

	$consulta = pg_query($conexao, "SELECT * FROM solicitacao as S join conteudo as C on tipo_certificado = tipo WHERE id_solicitacao = $id_solicitacao;");

	while ($resultado = pg_fetch_array($consulta)) {


		$conteudo =  $resultado[17];
		$conteudo = str_replace("[evento]", $resultado[1], $conteudo);
		$conteudo = str_replace("[instituição]", $resultado[2], $conteudo);
		$conteudo = str_replace("[cidade]", $resultado[6], $conteudo);
		$conteudo = str_replace("[período]", $resultado[5], $conteudo);
		$conteudo = str_replace("[carga horaria]", $resultado[3], $conteudo);




		// $nomesLista = str_replace(',','<br>', $resultado[8]);

		$nomesLista = explode(',', $resultado[7]);
		$emailsLista = explode(',', $resultado[13]);


		// strip_tags ($nomesLista);
		$ArrayS = '{"id":' . $resultado[0] . ',"evento":"' . $resultado[1] . '","tipo":' . $resultado[4] . ',"conteudo":"' . $conteudo . '"}';


		// $ArraySolicit = array();
		// $ArraySolicit[0]= $resultado[0];
		// $ArraySolicit[1]= $resultado[1];
		// $ArraySolicit[2]= $resultado[4];
		// $ArraySolicit[3]= $nomesLista;

		// $ArrayS = json_encode($ArraySolicit);

		$_SESSION["arrayS"] = $ArrayS;
		$_SESSION["listaS"] = $nomesLista;
		$_SESSION["emailsS"] = $emailsLista;
	}

	pg_close($conexao);

	header('Location: ../views/home/home.php?cod=1');
}
