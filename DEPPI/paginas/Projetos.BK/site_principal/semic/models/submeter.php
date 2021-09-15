<?php
	session_start();

	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
    	print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$codigoTrab = $_POST['codigo'];
		$codigoAv = $_SESSION['id'];

		$nota1 = $_POST['nota1'];
		$nota2 = $_POST['nota2'];
		$nota3 = $_POST['nota3'];
		$nota4 = $_POST['nota4'];

		print $codigoTrab;
		print $codigoAv;

		print $nota1;
		print $nota2;
		print $nota3;
		print $nota4;

		$consulta = pg_query($conexao, "INSERT INTO trabalho_avaliador (id_trabalho,id_avaliador,nota1,nota2,nota3,nota4) VALUES ('$codigoTrab','$codigoAv','$nota1','$nota2','$nota3','$nota4');")

		/*$sql = pg_query("INSERT INTO trabalho_avaliador (id_avaliador,id_trabalho,nota1,nota2,nota3,nota4) VALUES ('$codigoTrab','$codigoAv','$_POST['nota1']','$_POST['nota2']','$_POST['nota3']','$_POST['nota4']');")*/

			or die ("Falha ao registrar, tente novamente");

		pg_close ($conexao);

		header('Location: ../views/home/home.php?cod=1');

	}
?>