<?php

	// Conexão com o banco de dados
	require_once('../bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$nome = $_POST['nome'];
		$siape = $_POST['siape'];
		$email = $_POST['email'];
		$lattes = $_POST['lattes'];
		$senha1 = md5($_POST['senha1']);

		// Verificação de dualidades no Siape
		$consulta = pg_query($conexao, "SELECT * FROM usuario WHERE id_usuario = '$siape'");
		$siapeConsulta = pg_fetch_array($consulta);
		if($siapeConsulta != false) {
			print 'a';
			header("Location: ../../index.php?cod=3");
			die();
		}

		// Verificação de dualidades no Email
		$consulta = pg_query($conexao, "SELECT * FROM usuario WHERE email = '$email'");
		$emailConsulta = pg_fetch_array($consulta);
		if($emailConsulta != false) {
			print 'b';
			header("Location: ../../index.php?cod=4");
			die();
		}

		// Inserção dos dados
		$consulta = pg_query("INSERT INTO usuario (id_usuario, nome, email, senha, lattes) VALUES ('$siape', '$nome', '$email', '$senha1', '$lattes');")

		or die ("Erro no registro das informações!");

		pg_close ($conexao);

		header("Location: ../../index.php?cod=2");
	}
?>

