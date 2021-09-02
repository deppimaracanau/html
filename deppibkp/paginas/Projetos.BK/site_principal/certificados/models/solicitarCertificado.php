<?php 

	session_start();

	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
    	print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$nome_evento = $_POST['evento'];
		$nome_proj_conf = $_POST['nomePC'];
		$carga_horaria = $_POST['carga'];
		$tipo_certificado = $_POST['tipo'];
		$periodo = $_POST['periodo'];
		$ano_evento = $_POST['ano'];
		$local = $_POST['local'];
		$texto_proprio = $_POST['texto'];
		$lista_nomes = $_POST['nomes'];


		$nomes = explode("\n", $lista_nomes);
		$lista_nomes = '';

		for ($i = 0; $i < count($nomes); $i++) {
			$lista_nomes .= $nomes[$i] . '+';
		}

		$qtd_certificados = sizeof($nomes);


		$consulta = pg_query($conexao, "INSERT INTO solicitacao (nome_evento,nome_proj_conf,carga_horaria,tipo_certificado,periodo,local,texto_proprio,lista_nomes,ano_evento,qtd_certificados) VALUES ('$nome_evento','$nome_proj_conf','$carga_horaria','$tipo_certificado','$periodo','$local','$texto_proprio','$lista_nomes','$ano_evento','$qtd_certificados');")
		or die ("<meta charset=\"utf-8\"><br><center><h1>Erro no registro da solicitação, por favor, reveja as informações repassadas ou entre em contato com o DEPPI.</h1></center>");

		header('Location: ../views/solicitacao/solicitacao.php?cod=0');
	}

?>