<?php

include ("../config_bd/conexao.php");

$nome = $_POST['nome'];

$sql1 = pg_query("INSERT INTO subcategoria(nome) values('$nome');") or die("Erro no comando SQL");

header("Location:../paginas/subcategorias.php");

?>