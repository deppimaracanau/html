<?php 

	session_start();

	// Conexão com o banco de dados
	require_once('../bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
    	print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$login = $_POST['login'];
		$senha = md5($_POST['senha']);

		$consulta = pg_query($conexao, "SELECT * FROM usuario WHERE nome = '$login' AND senha = '$senha'");

		$resultado = pg_fetch_array($consulta);

		// Verifica o login
		if($resultado == false) {
			header('Location: ../../index.php?cod=0');
			die();
		}

		// Login efetuado com sucesso
		if( isset($resultado['nome']) ) {
			$_SESSION['id'] = $resultado['id'];
			$_SESSION['nome'] = $resultado['nome'];
		}

		pg_close ($conexao);

		header('Location: ../../views/home/home.php');
	}

?>