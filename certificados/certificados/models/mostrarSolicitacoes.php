<?php

// Conexão com o banco de dados
require_once('bd.class.php');
$bd = new bd();
$conexao = $bd->estabelecerConexao();

if ($conexao == null) {
	print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
	//pega o ID do elemento html e joga numa variável que será tratada logo em seguida

	$pesquisaSQL = "SELECT * FROM solicitacao WHERE id_solicitacao > 0  AND status LIKE 'Pendente' ORDER BY data_solicitacao DESC";
	$consulta = pg_query($conexao, $pesquisaSQL);
	$valor = pg_num_rows($consulta);

	if ($valor != 0) {

		while ($resultado = pg_fetch_array($consulta)) {

			echo "
				<div id='SForm'>
					<img src='../../views/img/x-button.png' class='imgDelete' alt='$resultado[0]' style=\"float: right;cursor: pointer;\" >
					<form method='POST' action='../../models/carregaSolicitacao.php'>
					<h5>
						<b>Nome do Evento:</b> $resultado[1] <br>
						<b>Instituição:</b> $resultado[2] <br>
						<b>Carga Horária:</b> $resultado[3] <br>
						<b>Período(Dias/Meses):</b> $resultado[5] <br>
						<b>Local do evento:</b> $resultado[6] <br>
						<b>Ano:</b> $resultado[8] <br>
						<b>Quantidade de certificados:</b> $resultado[9] <br>
						<b>Data de solicitação:</b> $resultado[10] <br>
						<b>Lista de participantes:</b> $resultado[7] <br>
						<b>Email dos participantes:</b> $resultado[13] <br>
						
					</h5>
						<input type='hidden' name='id' value='$resultado[0]'>
						<input class='btn btn-primary btnS' type='submit' value='Carregar Dados'>
						<br>
					</form>
				</div>
				<hr>
			";
		}
	} else {
		echo '<div class="alert alert-danger" role="alert"><center><b>Nenhuma Solicitação!</b></center></div>';
	}

	pg_close($conexao);
}
