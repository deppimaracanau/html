<?php
ob_start();
	if((isset($_SESSION['id']))&&(isset($_SESSION['nome']))&&(isset($_SESSION['sobrenome']))&&(isset($_SESSION['email']))&&(isset($_SESSION['senha']))&&(isset($_SESSION['nivelAcesso']))&&(isset($_SESSION['cargo']))){
	  $dados = [$_SESSION['id'], $_SESSION['nome'], $_SESSION['sobrenome'], $_SESSION['email'], $_SESSION['senha'], $_SESSION['nivelAcesso'], $_SESSION['cargo']];
		foreach ($dados as $key) {
			if($key == "" || empty($key)){
				//Apaga quaisquer dados salvos
				unset($_SESSION['id'],$_SESSION['nome'],$_SESSION['sobrenome'],$_SESSION['email'],$_SESSION['senha'],$_SESSION['nivelAcesso'],$_SESSION['cargo'],$_SESSION['con']);
				//Redireciona para login, caso seja necessário
				$URI = explode('/',$_SERVER['REQUEST_URI']);
				if($URI[2]!='programacao.php'){
					header("Location: login.php");
					//Mensagem de Erro
					$_SESSION['errorLogin'] = "Área restrita para usuários cadastrados";
				}		
			}
		}		
	}else{
	//Redireciona para login, caso seja necessário
		$URI = explode('/',$_SERVER['REQUEST_URI']);
		if($URI[2]!='programacao.php'){
			header("Location: login.php");
			//Mensagem de Erro
			$_SESSION['errorLogin'] = "Área restrita para usuários cadastrados";
		}
	}
?>