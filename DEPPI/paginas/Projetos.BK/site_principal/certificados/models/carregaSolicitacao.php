<?php 

	session_start();

	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
    	print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$id_solicitacao = $_GET['id'];

		$consulta = pg_query($conexao, "SELECT * FROM solicitacao WHERE id_solicitacao = $id_solicitacao;");

		while( $resultado = pg_fetch_array($consulta) ) {
			
			$_SESSION['id_solicitacao'] = $resultado[0];
			$_SESSION['evento'] = $resultado[1];
			$_SESSION['texto'] = $resultado[7];
			$_SESSION['tipo'] = $resultado[4];

			$_SESSION['nomes'] = $resultado[8];

			//Juntar lista de nomes em uma string
			/*$nomes = '';
			$nomesLista = $resultado[8];
			$nomesLista = explode("\n", $nomesLista);
			for ($i = 0; $i < count($nomesLista); $i++) {
				$nomes .= $nomesLista[$i] . '+';
			}
			$nomes = str_replace('\n', '*', $nomes);
			$_SESSION['nomes'] = $nomes;*/

		}

		pg_close($conexao);

		header('Location: ../views/home/home.php?cod=1');

	}

?>