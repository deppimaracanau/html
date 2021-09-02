<?php
	// Conexão com o banco de dados
	require_once('../bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
    	print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$consulta = pg_query($conexao, "SELECT * FROM trabalho");

		print '
			<br><br>
			<table style="width:100%; border: solid black 1px; background: white">
			<tr style=\"border: solid black 1px\">
				<th colspan="2" style="text-align:center; height: 35px">Avaliadores Cadastrados</th>
	  		</tr>
		';
		while ( $resultado = pg_fetch_array($consulta) ) {
			print "
				<tr style=\"border: solid black 1px;\">
					<th style=\"padding-left: 10px; width:7%; border: solid black 1px\">$resultado[0]</th>

	    			<th style=\"padding-left: 8px; height: 25px\">$resultado[1]</th>
	  			</tr>
	  		";
		}
		print '</table> <br><br><br><br><br>';

		pg_close ($conexao);

	}
?>