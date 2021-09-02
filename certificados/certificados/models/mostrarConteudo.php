<?php

// Conexão com o banco de dados
require_once('bd.class.php');
$bd = new bd();
$conexao = $bd->estabelecerConexao();

if ($conexao == null) {
	print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    //pega o ID do elemento html e joga numa variável que será tratada logo em seguida
    
    $valor = $_POST['valor'];


	$pesquisaSQL = "SELECT * FROM conteudo WHERE id_cont = $valor";
	$consulta = pg_query($conexao, $pesquisaSQL);
	$valor = pg_num_rows($consulta);

	if ($valor != 0) {

		while ($resultado = pg_fetch_array($consulta)) {

			echo $resultado[2];
		}
	} else {
		echo '<div class="alert alert-danger" role="alert"><center><b>Nenhum Conteudo!</b></center></div>';
	}

	pg_close($conexao);
}
