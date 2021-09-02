<?php 

	session_start();

	// Conexão com o banco de dados
	require_once('../bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
    	print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$codigo = $_POST['codigo'];

		$consulta = pg_query($conexao, "SELECT * FROM avaliador WHERE id_avaliador = '$codigo'");

		$resultado = pg_fetch_array($consulta);

		// Verifica o login
		if($resultado == false) {
			header('Location: ../../index.php?cod=0');
			die();
		}

		// Login efetuado com sucesso
		if( isset($resultado['id_avaliador']) ) {
			$_SESSION['id'] = $resultado['id_avaliador'];
			$_SESSION['nome'] = $resultado['nome'];
		}

		pg_close ($conexao);

		header('Location: ../../views/home/home.php');
	}

?>