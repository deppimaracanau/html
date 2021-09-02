<?php
include ("../config_bd/conexao.php");

$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);
$admin = $_POST['tipo'];

if ($admin == 'administrador') {
    // pegando usuarios do banco de dados
    $sql1 = pg_query("INSERT INTO usuarios(nome,usuario,senha,admin) values('$nome','$usuario','$senha',true);") or die("Erro no comando SQL");
} else {
    // pegando usuarios do banco de dados
    $sql1 = pg_query("INSERT INTO usuarios(nome,usuario,senha,admin) values('$nome','$usuario','$senha',false);") or die("Erro no comando SQL");
}

header("Location:../paginas/usuarios.php");

?>