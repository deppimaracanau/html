<?php
	session_start();
	include_once("conexao.php");
	if(!(isset($_GET['idPalestra'])&&isset($_GET['idParticipante'])&&isset($_GET['urlA']))){
		$_SESSION['errorLogin'] = "Efetue login primeiro";
		echo $_SESSION['errorLogin'];
		header("location: login.php");
	}else{
		$idParticipante = $_GET['idParticipante'];
		$idPalestra = $_GET['idPalestra'];
		$urlAnterior = $_GET['urlA'];
		$msg = "&msg=";

		$sql = "SELECT 'id' FROM inscritospalestras WHERE id_palestra ={$idPalestra} AND id_participante={$idParticipante}";
		$query = mysqli_query($con,$sql);
		if(mysqli_num_rows($query)<1){
			$msg="Você não está cadastrado";
		}else{
			$sql = "DELETE FROM inscritospalestras WHERE id_palestra={$idPalestra} AND id_participante={$idParticipante}";
			echo $sql;
			$query = mysqli_query($con,$sql);
			$msg="Exclusão efetuada com sucesso";
		}

		$_SESSION['msgExcPalestra'] = $msg;
    	$urlPalestra = explode("&msg",$urlAnterior);
    	$urlLimpa = $urlPalestra[0];
		header("location:".$urlLimpa);
	}
?>