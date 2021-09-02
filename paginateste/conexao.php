<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

	$servidor = "localhost";
	$usuario = "root";
	$senha = "root";
	$dbname = "sistemateste";
	
	//Criar a conexao
	$conn = new mysqli($servidor, $usuario, $senha, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	  }
	  echo "Connected successfully";
	  ?>