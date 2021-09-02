<?php
	
	session_start();

	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$nomeVaga = $_POST['nomeVaga'];
		$descricaoVaga = $_POST['descricaoVaga'];
		$salario = $_POST['salario'];
		$horario = $_POST['horario'];
		$idEmpresa = $_POST['idEmpresa'];
		$idTipo = $_POST['idTipo'];
		$idArea = $_POST['idArea'];
		$emailContato = $_POST['emailContato'];
		$dataLimite = $_POST['dataLimite'];
		// Ajuste da data
		$dataLimite = split("/", $dataLimite);
		$dataLimite = $dataLimite[2] . "-" . $dataLimite[0] . "-" . $dataLimite[1];
		print $dataLimite;

		$idUsuario = $_SESSION['id'];

		$sql = pg_query("INSERT INTO vagas (nome_vaga, descricao, salario, horario, id_empresa, id_tipo, id_area, email_contato, data_limite, ativo, id_usuario) VALUES ('$nomeVaga', '$descricaoVaga', '$salario', '$horario', '$idEmpresa', '$idTipo', '$idArea', '$emailContato', '$dataLimite', 'false', '$idUsuario');")

		or die ("Erro no registro das informações");

		pg_close ($conexao);

		header("Location: ../paginas/home.php");
	}
?>