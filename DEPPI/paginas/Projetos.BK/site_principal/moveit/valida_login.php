<?php
	//Inicia a sessão
	session_start();

	//Pegando dados do formulário
	$email = $_POST['inputEmail'];
	$senha = md5($_POST['inputPassword']);

	//Chamando a conexão com o banco
	include_once("conexao.php");

	//Selecionando dados da tabela caso o email e senha informados deem match na BD
	$result = $con->query("SELECT * FROM users WHERE email='$email' AND senha='$senha' LIMIT 1");
	//Retorna uma matriz, no caso, de uma linha de $result
	$resultado = mysqli_fetch_assoc($result);
	
	//Salvando dados do usuário
	$_SESSION['id'] = $resultado['id'];
	$_SESSION['nome'] = $resultado['nome'];
	$_SESSION['sobrenome'] = $resultado['sobrenome'];
	$_SESSION['email'] = $resultado['email'];
	$_SESSION['senha'] = $resultado['senha'];
	$_SESSION['nivelAcesso'] = $resultado['nivelAcesso'];
	$_SESSION['cargo'] = $resultado['cargo'];


	//Caso não dê match...
	if(empty($resultado)){
		//Error Message
		$_SESSION['errorLogin'] = "Usuário ou senha inválido";

		//Redireciona usuário para login
		header("Location: login.php");
	}

	//Caso dê...
	else{
		header('Location: index.php');
	}

	//Fechando a conexão
	mysqli_close($con);
?>