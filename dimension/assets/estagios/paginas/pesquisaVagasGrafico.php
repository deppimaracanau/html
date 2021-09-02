<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Central de Estágios</title>
		<link rel="icon" href="favicon.ico">

	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/estilo.css" rel="stylesheet">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="bootstrap/js/bootstrap.min.js"></script>
	</head>

	<?php
		if(!@($conexao=pg_connect ("host=localhost dbname=estagios port=5432 user=postgres password=1"))) {
              print "Não foi possível estabelecer uma conexão com o banco de dados.";

		} else {
			session_start();

			$consultaVaga = pg_query($conexao, "SELECT * FROM vaga");
			$consultaEmpresa = pg_query($conexao, "SELECT * FROM empresa");
			$consultaTipo = pg_query($conexao, "SELECT * FROM tipo_vaga");
			$consultaArea = pg_query($conexao, "SELECT * FROM area");

			$vagas= "";
			$empresas = "";
			$tipos = "";
			$areas = "";

			while($row = pg_fetch_array($consultaVaga)) 
		    	$vagas .= "<option value=\"$row[0]\">$row[1]</option>";
			while($row = pg_fetch_array($consultaEmpresa)) 
		    	$empresas .= "<option value=\"$row[0]\">$row[1]</option>";
			while($row = pg_fetch_array($consultaTipo)) 
		    	$tipos .= "<option value=\"$row[0]\">$row[1]</option>";
		    while($row = pg_fetch_array($consultaArea)) 
		    	$areas .= "<option value=\"$row[0]\">$row[1]</option>";

		    $_SESSION['vagas'] = $vagas;
		    $_SESSION['empresas'] = $empresas;
		    $_SESSION['tipos'] = $tipos;
		    $_SESSION['areas'] = $areas;
		  
		}
	?>

	<body>
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
		        	<a href="index.html" class="navbar-brand"><span class="logo">IFCE</span></a>
		        </div>

		        <div class="collapse navbar-collapse" id="barra-navegacao">
					<ul class="nav navbar-nav navbar-right">
						<li> <a href="#inicio" class="scrollSuave">INÍCIO</a> </li>
						<li> <a href="#saiba" class="scrollSuave">SAIBA MAIS</a> </li>
						<li> <a href="#calendario" class="scrollSuave">CALENDÁRIO</a> </li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							RESULTADO<span class="caret"></span>
							</a>
							<ul class="dropdown-menu  dropStyle">
								<li> <a href="resultados_gerais.php">Resultado Geral</a> </li>
								<li> <a href="resultados_eixo.php">Resultado por Eixo</a> </li>
								<li> <a href="resultados.php">Resultados Individuais</a> </li>
								<li> <a href="relatorio_pdf.php">Relatório (PDF)</a> </li>
							</ul>
						</li>
					</ul>
		        </div>
		    </div>
	    </nav>

	    <br><br><br><br><br><br>

		<div class="container">
			<center>
				<div class="row">
					<div id="grafico"></div>
				</div>
			</center>
		</div>
	</body>
</html>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
	google.charts.load('current', {packages: ['corechart', 'bar']});
	google.charts.setOnLoadCallback(drawTitleSubtitle);

	function plotarGrafico() {
		var laboratorio = "";
		var coordenador = "<?php print $_COOKIE['pesqNomeCoordenador']; ?>";

		var bolsistas = <?php print $_SESSION['qtd_bolsistas']; ?>;
		var voluntarios = <?php print $_SESSION['qtd_voluntarios']; ?>;
		var disciplinas = <?php print $_SESSION['qtd_disciplinas']; ?>;
		var professores = <?php print $_SESSION['qtd_professores']; ?>;
		var periodicos = <?php print $_SESSION['qtd_periodicos']; ?>;
		var congresso = <?php print $_SESSION['qtd_congresso']; ?>;
		var tcc = <?php print $_SESSION['qtd_tcc']; ?>;
		var pesqFomento = <?php print $_SESSION['qtd_pesquisa_com_fomento']; ?>;
		var pesquisa = <?php print $_SESSION['qtd_pesquisas_sem_fomento']; ?>;
		var extFomento = <?php print $_SESSION['qtd_extensao_com_fomento']; ?>;
		var extensao = <?php print $_SESSION['qtd_extensao_sem_fomento']; ?>;

		var MedIES = <?php print $_SESSION['mediaEnsino']; ?>;
		var MedIEX = <?php print $_SESSION['mediaPesquisa']; ?>;
		var MedIPE = <?php print $_SESSION['mediaExtensao']; ?>;

		var IES = <?php print $_SESSION['IES']; ?>;
		var IPE = <?php print $_SESSION['IPE']; ?>;
		var IEX = <?php print $_SESSION['IEX']; ?>;


		// Gráfico dos Índices (Não está sendo plotado, sujeito a revisão)
		var data = new google.visualization.DataTable();
			data.addColumn('string', '');
			data.addColumn('number', 'Índice Alcançado');
			data.addColumn('number', 'Média do Campus');

		data.addRows([
			["Ensino",IES,MedIES],
			["Pesquisa",IPE,MedIEX],
			["Extensão",IEX,MedIPE]
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