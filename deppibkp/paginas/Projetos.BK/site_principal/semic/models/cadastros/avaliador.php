<?php
	session_start();

	// Conexão com o banco de dados
	require_once('../bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
    	print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$nome = $_POST['nome'];

		$consulta = pg_query($conexao, "INSERT INTO avaliador (nome) VALUES ('$nome');")

			or die ("Falha ao registrar avaliador, tente novamente");

		pg_close ($conexao);

		header('Location: ../../views/cadastroAvaliador.php?cod=1');

	}
?>