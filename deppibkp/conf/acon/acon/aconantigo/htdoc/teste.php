<?php
session_start();
//método para imprimir todos os membros de uma equipe


require "conexão.php";
 
$con = new conexao();

	$usuario = $con->query("SELECT id from equipe where id_capitao = 2");
	$id = array_values($con->getRetorno());
	print_r($id[0]);
	echo "<br>";
	$usuario = $con->query("SELECT nick from membros where id_equipe = ".$id[0]."");
	$usuario = array_values($con->getRetorno());
		
	$cont = $con->contador();

	print_r($usuario[0]);

	$usuario = $con->query("SELECT * from membros where id_equipe = ".$id[0]."");

	for($i = 1; $i <= $cont - 1; $i++){
			$j = $i - 1;
		$usuario = array_values($con->RetornoAll());
		echo "<br>";
		print_r($usuario[$j][4]);
		


	}


?>

