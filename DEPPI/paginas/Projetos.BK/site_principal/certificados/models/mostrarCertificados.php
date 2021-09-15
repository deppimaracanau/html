<?php 

	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {

		$ano = $_POST['ano'];
		$produzido = $_POST['produzidos'];
		$cancelado = $_POST['cancelados'];

		$pesquisaSQL = "SELECT * FROM solicitacao WHERE id_solicitacao > 0";
		if($empresa != '')
			$pesquisaSQL.= " AND ano_evento = '$ano'";
		if($area != '')
			$pesquisaSQL.= " AND certificados_emitidos = '$produzido'";
		if($tipo != '')
			$pesquisaSQL.= " AND solicitacao_negada = '$cancelado'";
		$pesquisaSQL.= " ORDER BY data_solicitacao DESC";

		$consulta = pg_query($conexao, $pesquisaSQL);

		while( $resultado = pg_fetch_array($consulta) ) {
			
			echo "
				<div>
						Título: $resultado[0] <br>
						Descrição: $resultado[1] <br>
						Salário: $resultado[2] <br>
						Horário: $resultado[3] <br>
						Email: $resultado[4] <br>
						Empresa: $resultado[5] <br>
						Tipo: $resultado[6] <br>
						Área: $resultado[7] <br>
						Data Limite: $resultado[8] <br>
						Data Registro: $resultado[9] <br>
						$resultado[10] <br>
						$resultado[11] <br>
						$resultado[12] <br>
						$resultado[13] <br>
						$resultado[14] <br>

						<button class=\"botao btn btn-primary\" type=\"button\" onclick=\"selecionaCert($resultado[0])\">Carregar Dados</button>
						<br><br>
						<hr>
					<br>
				</div>
			";
		}

		pg_close ($conexao);

	}
?>


