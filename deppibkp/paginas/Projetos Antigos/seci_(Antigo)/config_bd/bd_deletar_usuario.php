<?php
include ("../config_bd/conexao.php");

$id = $_POST['id'];

$sql1 = pg_query("DELETE FROM usuarios WHERE id='$id';") or die("Erro no comando SQL");

header("Location:../paginas/usuarios.php");

?>