<?php

// Conexão com o banco de dados
require_once('bd.class.php');
$bd = new bd();
$conexao = $bd->estabelecerConexao();

if ($conexao == null) {
	print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
	//pega o ID do elemento html e joga numa variável que será tratada logo em seguida

    $id=$_POST['id'];
    
    $delete = "DELETE FROM evento WHERE id_even = '$id'";
    $consulta = pg_query($conexao, $delete);


	pg_close($conexao);
}
