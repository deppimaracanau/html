<?php
	session_start();
	include_once('conexao.php');
	$nomenclaturas = ['nome','sobrenome','email','senha'];
	//$dados = [$_POST['nome'],$_POST['sobrenome'],$_POST['email'],$_POST['senha']];
	//$count = 1;
	if(empty($_POST['senha'])){
		$_POST['senha'] = $_SESSION['senha'];
	}else{
		$_POST['senha'] = md5($_POST['senha']);
	}

	$sql="UPDATE users SET ";
	foreach ($nomenclaturas as $key) {
		if($_POST[$key]!=$_SESSION[$key]){
			//Altera dado
			$sql.=$key." = '".$_POST[$key]."' WHERE id = ".$_SESSION['id'];
			//Verifica se deu bug
			if(!($con->query($sql))){
				echo "Error ".$con->error;
			}
			$sql = "UPDATE users SET ";
			//$count++;
		}
	}
	//Fechando a conexão
	mysqli_close($con);
	header("Location: meusDados.php");
?>