<?php

// Conexão com o banco de dados
require_once('bd.class.php');
$bd = new bd();
$conexao = $bd->estabelecerConexao();

if ($conexao == null) {
	print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
//pega o ID do elemento html e joga numa variável que será tratada logo em seguida
	$ano = $_POST['ano'];
	$produzido = $_POST['produzidos'];
	$cancelado = $_POST['cancelados'];

	$pesquisaSQL = "SELECT * FROM solicitacao WHERE id_solicitacao > 0";
	if ($empresa != '')
		$pesquisaSQL .= " AND ano_evento = '$ano'";
	if ($area != '')
		$pesquisaSQL .= " AND certificados_emitidos = '$produzido'";
	if ($tipo != '')
		$pesquisaSQL .= " AND solicitacao_negada = '$cancelado'";
	$pesquisaSQL .= " ORDER BY data_solicitacao DESC";

	$consulta = pg_query($conexao, $pesquisaSQL);

	while ($resultado = pg_fetch_array($consulta)) {

		echo "
				<div>
						Nome do Evento: $resultado[1] <br>
						Nome do Projeto/Conferência (Caso exista): $resultado[2] <br>
						Carga Horária: $resultado[3] <br>
						Tipo: $resultado[4] <br>
						Período(Dias/Meses): $resultado[5] <br>
						Local do evento: $resultado[6] <br>
						Texto: $resultado[7] <br>
						Lista de participantes: $resultado[8] <br>
						Ano: $resultado[9] <br>
						Quantidade de certificados: $resultado[10] <br>
						Certificados emitidos: $resultado[11] <br>
						negado(s/n?): $resultado[12] <br>
						Data de solicitação: $resultado[13] <br>
						Data de emissão: $resultado[14] <br>

						<button class=\"botao btn btn-primary\" type=\"button\" onclick=\"selecionaCert($resultado[0])\">Carregar Dados</button>
						<br><br>
						<hr>
					<br>
				</div>
			";
	}

	pg_close($conexao);
}
