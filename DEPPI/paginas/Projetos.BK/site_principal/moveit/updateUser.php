<?php
session_start();
include_once("seguranca.php");
include_once("conexao.php");
if($_SESSION['nivelAcesso']==1){
	$sql = "UPDATE users SET nivelAcesso={$_POST['nivelAcesso']} WHERE id={$_POST['id']}";
	$query = mysqli_query($con,$sql);
	header("location:usuarios.php");
}else{
	//Apaga quaisquer dados salvos
	unset($_SESSION['id'],$_SESSION['nome'],$_SESSION['sobrenome'],$_SESSION['email'],$_SESSION['senha'],$_SESSION['nivelAcesso'],$_SESSION['cargo'],$_SESSION['con']);
	session_destroy();
	header("location:index.php");
}
?>