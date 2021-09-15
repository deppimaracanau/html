<?php
	
	session_start();

	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$login = $_POST['login'];
		$senha = md5($_POST['senha']);

		$consulta = pg_query($conexao, "SELECT * FROM usuario WHERE email = '$login' AND senha = '$senha'");

		$resultado = pg_fetch_array($consulta);

		if( isset($resultado['id_usuario']) ) {
			$_SESSION['id'] = $resultado['id_usuario'];
			$_SESSION['nome'] = $resultado['nome'];
			$_SESSION['login'] = $resultado['email'];
		}

		pg_close ($conexao);

		header("Location: ../paginas/home.php");
	}
?>