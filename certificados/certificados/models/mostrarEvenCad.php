<?php

// Conexão com o banco de dados
require_once('bd.class.php');
$bd = new bd();
$conexao = $bd->estabelecerConexao();

if ($conexao == null) {
	print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
	//pega o ID do elemento html e joga numa variável que será tratada logo em seguida

	$pesquisaSQL = "SELECT * FROM evento WHERE id_even > 0";
	$consulta = pg_query($conexao, $pesquisaSQL);
	$valor = pg_num_rows($consulta);

	if ($valor != 0) {

		while ($resultado = pg_fetch_array($consulta)) {

			echo "
				<div id='SFormE'>
					<img src='../../views/img/x-button.png' class='imgDelete' alt='$resultado[0]' style=\"float: right;cursor: pointer;\" >
					<h5>
						<b>Nome do Evento:</b> $resultado[1] <br>
						<br> $resultado[2] <br>
					</h5>
				</div>
				<hr>
			";
		}
	} else {
		echo '<div class="alert alert-danger" role="alert"><center><b>Nenhum Evento!</b></center></div>';
	}

	pg_close($conexao);
}
