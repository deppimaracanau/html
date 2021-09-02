<?php
	
	echo "<h3>Vagas Registradas</h3>";

	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$cont = 0;
		$empresa = $_POST['empresa'];
		$area = $_POST['area'];
		$tipo = $_POST['tipo'];

		$pesquisaSQL = "SELECT * FROM vagas WHERE id_vaga > 0";

		if($empresa != '')
			$pesquisaSQL.= " AND id_empresa = '$empresa'";
		if($area != '')
			$pesquisaSQL.= " AND id_area = '$area'";
		if($tipo != '')
			$pesquisaSQL.= " AND id_tipo = '$tipo'";

		$pesquisaSQL.= " ORDER BY data_registro DESC";

		$consulta = pg_query($conexao, $pesquisaSQL);

		while( $resultado = pg_fetch_array($consulta) AND $cont != 10 ) {
			$consultaInterna = pg_query($conexao, "SELECT * FROM empresa WHERE id_empresa = $resultado[6]");
			$consultaInterna = pg_fetch_array($consultaInterna);
			$empresaPesquisa = $consultaInterna[1];

			$consultaInterna = pg_query($conexao, "SELECT * FROM tipo_vaga WHERE id_tipo = $resultado[7]");
			$consultaInterna = pg_fetch_array($consultaInterna);
			$tipoPesquisa = $consultaInterna[1];

			$consultaInterna = pg_query($conexao, "SELECT * FROM area WHERE id_area = $resultado[8]");
			$consultaInterna = pg_fetch_array($consultaInterna);
			$areaPesquisa = $consultaInterna[1];
			
			echo "
				<div>
					<br>
						Título: $resultado[1] <br>
						Descrição: $resultado[2] <br>
						Salário: $resultado[3] <br>
						Horário: $resultado[4] <br>
						Email: $resultado[5] <br>
						Empresa: $empresaPesquisa <br>
						Tipo: $tipoPesquisa <br>
						Área: $areaPesquisa <br>
						Data Limite: $resultado[9] <br>
						Data Registro: $resultado[10] <br>
					<br>
				</div>
			";
			$cont++;
		}

		pg_close ($conexao);

	}
?>