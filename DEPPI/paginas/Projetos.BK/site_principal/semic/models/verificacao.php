<?php
	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
    	print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$codigo = $_POST['codigo'];

		$consulta = pg_query($conexao, "SELECT * FROM trabalho WHERE id_trabalho = '$codigo'");

		$resultado = pg_fetch_array($consulta);

		print $resultado['nome'];

		pg_close ($conexao);

	}
?>