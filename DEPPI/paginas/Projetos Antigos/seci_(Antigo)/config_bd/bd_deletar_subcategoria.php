<?php
include ("../config_bd/conexao.php");

$id = $_POST['id'];

$sql1 = pg_query("DELETE FROM subcategoria WHERE id='$id';") or die("Erro no comando SQL");

header("Location:../paginas/subcategorias.php");

?>