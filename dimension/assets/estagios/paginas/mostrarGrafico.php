<?php
	// Verificação de Autenticação
	session_start();
	if( !isset($_SESSION['id']) )
		header('Location: ../index.php?cod=1');

	// Nome do usuário da sessão
	$nomeDiv = explode(" ", $_SESSION['nome']);
	$nome = strtoupper($nomeDiv[0]);

	// Conexão com o banco de dados
	require_once('../bd/bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();


	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$sql = " SELECT COUNT(*) FROM vagas";
		$consulta = pg_query($conexao, $sql);
		$qtdVagas = 0;
		if($consulta){
			$registro = pg_fetch_array($consulta);
			$qtdVagas = $registro[0];
		} else {
			echo 'Erro ao executar a query';
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Central de Estágios</title>
		<link rel="icon" href="../favicon.ico">

	    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../css/estilo.css" rel="stylesheet">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="../bootstrap/js/bootstrap.min.js"></script>
	</head>

	<!-- Resgate de Informações para o Gráfico -->
	<?php 
		// Conexão com o banco de dados
		require_once('../bd/bd.class.php');
		$bd = new bd();
		$conexao = $bd->estabelecerConexao();

		if($conexao == null) {
	        print "Não foi possível estabelecer uma conexão com o banco de dados.";

		} else {

			$consultaInterna = pg_query($conexao, "SELECT * FROM tipo_vaga WHERE id_tipo = $resultado[7]");
			$consultaInterna = pg_fetch_array($consultaInterna);
			$tipoPesquisa = $consultaInterna[1];

			$consultaInterna = pg_query($conexao, "SELECT * FROM area WHERE id_area = $resultado[8]");
			$consultaInterna = pg_fetch_array($consultaInterna);
			$areaPesquisa = $consultaInterna[1];





			$consultaEmpresa = pg_query($conexao, "SELECT * FROM empresa");
			$consultaArea = pg_query($conexao, "SELECT * FROM area");
			$consultaTipo = pg_query($conexao, "SELECT * FROM tipo_vaga");

			$empresas = "<option value=\"\">Selecione uma Empresa</option>";
			$areas = "<option value=\"\">Selecione uma Área</option>";
			$tipos = "<option value=\"\">Selecione um Tipo da Vaga</option>";

			while($row = pg_fetch_array($consultaEmpresa)) 
		    	$empresas .= "<option value=\"$row[0]\">$row[1]</option>";
			while($row = pg_fetch_array($consultaArea)) 
		    	$areas .= "<option value=\"$row[0]\">$row[1]</option>";
		    while($row = pg_fetch_array($consultaTipo)) 
		    	$tipos .= "<option value=\"$row[0]\">$row[1]</option>";
		  
		}
	?>

	<body onload="dados()">
		<!-- ------------------- Barra de Navegação ------------------- -->
	    <nav class="navbar navbar-default navbar-fixed-top barra">
		    <div class="container">
		        
		    	<div class="navbar-header">
		            <button type="button" class="navbar-toggle collapsed" 
		                  data-toggle="collapse" data-target="#barra-navegacao">
		            <span class="sr-only">Alternar Menu</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          	</button>
		        	<a href="home.php" class="navbar-brand"><span class="logo">IFCE</span></a>
		        </div>

		        <div class="collapse navbar-collapse" id="barra-navegacao">
					<ul class="nav navbar-nav navbar-right">
						<li><a>Logado como <?= $nome ?>, </a> </li>
						<li><a href="../bd/usuarioSair.php">LogOut</a> </li>
					</ul>
		        </div>
		    </div>
	    </nav>

	    <br><br><br><br><br><br>

		<div class="container">
			
			<div class="col-sm-2">
				<div class="panel panel-default">
	    			<div class="panel-body">
	    				<h3>MENU</h3>
	    				<hr>
	    				<li> <a href="home.php">Home</a> </li>
	    				<li> <a href="cadastrarEmpresa.php">Empresas</a> </li>
						<li> <a href="registrarVaga.php">Vagas</a> </li>
						<li> <a href="mostrarGrafico.php">Gráficos</a> </li>

						<br><br>

						<h3>Total</h3>
	    				<hr>
	    				<?= $qtdVagas ?> vagas
	    			</div>
	    		</div>
			</div>

			<div class="col-sm-7">
				<div class="panel panel-default">
	    			<div class="panel-body">
	    				<div id="grafico"></div>
	    			</div>
	    		</div>
			</div>

			<div class="col-sm-3">
				<div class="panel panel-default">
	    			<div class="panel-body">
	    				<h3>Filtros</h3>
	    				<hr>
	    				<form id="pesquisaFiltros" class="input-group">
	    					<select class="form-control" name="empresa"> <?= $empresas ?> </select> <br><br>
	    					<select class="form-control" name="area"> <?= $areas ?> </select> <br><br>
	    					<select class="form-control" name="tipo"> <?= $tipos ?> </select> <br><br><br>
	    					<center><button type="button" class="btn btn-default" id="pesquisaVaga">Pesquisar</button></center>
	    				</form>
	    			</div>
	    		</div>
			</div>

		</div>

	</body>

	<script type="text/javascript">

		$(document).ready( function(){

			function mostraVagas(){
				//carregar os tweets 

				$.ajax({
					url: '../bd/mostrarVagas.php',
					success: function(data) {
						$('#vagasRegistradas').html(data);
					}
				});
			}

			mostraVagas();

		});

		$('#pesquisaVaga').click( function() {

			$.ajax( {
				url: '../bd/mostrarVagasPesquisa.php',
				method: 'post',
				data: $('#pesquisaFiltros').serialize(),
				success: function(data) {
					$('#vagasRegistradas').html(data);
				}
			} );

		} );

	</script>

	<!-- Gráficos -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {packages: ['corechart', 'bar']});
		google.charts.setOnLoadCallback(drawTitleSubtitle);

		function plotarGrafico() {
			var laboratorio = "";
			var coordenador = "<?php print $_COOKIE['pesqNomeCoordenador']; ?>";

			var bolsistas = 0;
			var voluntarios = 1;
			var disciplinas = 2;

			// Gráfico dos Índices (Não está sendo plotado, sujeito a revisão)
			var data = new google.visualization.DataTable();
				data.addColumn('string', '');
				data.addColumn('number', 'Índice Alcançado');

			data.addRows([
				["Ensino",bolsistas],
				["Pesquisa",voluntarios],
				["Extensão",disciplinas]
			]);

			var options = {
				height: 500,
				chart: {
			    	title: 'ÍNDICE DE RENDIMENTO',
			    },

			};

			var materialChart = new google.charts.Bar(document.getElementById('grafico'));
	        materialChart.draw(data, options);
		}


		function dados() {
			window.setTimeout('plotarGrafico()', 500);
		}

	</script>
</html>