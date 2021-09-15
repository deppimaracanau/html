<?php

	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senhaCad = md5($_POST['senhaCad']);

		$emailConsulta = pg_query($conexao, "SELECT * FROM usuario WHERE email = '$email'");
		$emailConsulta = pg_fetch_array($emailConsulta);

		if($emailConsulta == false) {
			$sql = pg_query("INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senhaCad');")

			or die ("Erro no registro das informações, por favor, entre em contato pelo email: formulario.pesquisa.2018.ifce@gmail.com");

			pg_close ($conexao);

			header("Location: ../index.php?cod=2");
		} else {
			header("Location: ../index.php?cod=3");
		}
	}
?>

