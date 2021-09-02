<?php 
	
	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		// Atualização dos dados da empresa
		if($_POST['idEmpresa'] != "") { 
			$idEmpresa = $_POST['idEmpresa'];
			$nomeEmpresa = $_POST['nomeEmpresa'];
			$ruaEmpresa = $_POST['ruaEmpresa'];
			$complemento = $_POST['complemento'];
			$bairro = $_POST['bairro'];
			$emailEmpresa = $_POST['emailEmpresa'];
			$telefone = $_POST['telefone'];
			$responsavel = $_POST['responsavel'];

			$sql = prepare("UPDATE empresa SET nome_empresa = '$nomeEmpresa', rua = '$ruaEmpresa', complemento = '$complemento', id_bairro = '$bairro', email_empresa = '$emailEmpresa', telefone_empresa = '$telefone', responsavel = '$responsavel' WHERE id_empresa = '$idEmpresa';")

			or die ("Atualização não realizada");

		// Criação de uma nova empresa
		} else { 
			$nomeEmpresa = $_POST['nomeEmpresa'];
			$ruaEmpresa = $_POST['ruaEmpresa'];
			$complemento = $_POST['complemento'];
			$bairro = $_POST['bairro'];
			$emailEmpresa = $_POST['emailEmpresa'];
			$telefone = $_POST['telefone'];
			$responsavel = $_POST['responsavel'];

			$sql = pg_query("INSERT INTO empresa (nome_empresa, rua, complemento, id_bairro, email_empresa,telefone_empresa, responsavel) VALUES ('$nomeEmpresa', '$ruaEmpresa', '$complemento', '$bairro', '$emailEmpresa', '$telefone', '$responsavel');")

			or die ("Falha ao registrar empresa, tente novamente");

		}


		header("Location: ../paginas/home.php");

	}
?>