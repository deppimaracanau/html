<?php 

	session_start();

	// Conexão com o banco de dados
	require_once('../bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
    	print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$cod = $_POST['cod'];

		$consulta = pg_query($conexao, "UPDATE usuario WHERE id_usuario = '$login'");

		$resultado = pg_fetch_array($consulta);

		// Verifica o login
		if($resultado == false) {
			header('Location: ../../index.php?cod=0');
			die();
		}

		// Verifica se email foi validado
		if($resultado['email_validado'] == 'false') {
			header('Location: ../../index.php?cod=5');
			die();
		}

		// Login efetuado com sucesso
		if( isset($resultado['id_usuario']) ) {
			$_SESSION['id'] = $resultado['id_usuario'];
			$_SESSION['nome'] = $resultado['nome'];
			$_SESSION['login'] = $resultado['email'];
		}

		pg_close ($conexao);

		header('Location: ../../views/home.php');
	}

?>