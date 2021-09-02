<?php
	// Verificação de Autenticação
	require_once('../../models/login/autenticacao.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>PGL - Plataforma de Gerenciamento de Laboratórios</title>
		<link rel="icon" href="../../favicon.ico">

	    <link href="../../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../css/home.css" rel="stylesheet">
	    <link href="../css/layout.css" rel="stylesheet">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="../../libs/bootstrap/js/bootstrap.min.js"></script>
	</head>

	<body>
		<?php require_once('../layout/navbar.php'); ?>

		<div class="container">
			
			<?php require_once('../layout/barraLateral.php'); ?>

			<div class="col-sm-8">
				<div class="panel panel-default">
	    			<div class="panel-body">
	    				<div class="tituloCentro">Notícias</div>
	    				<div id="noticias"></div>
	    			</div>
	    		</div>

	    		<div class="panel panel-default">
	    			<div class="panel-body">
	    				<div class="tituloCentro">Pesquisa</div>
	    				<center>
	    					<br>
		    				<div class="baloesDados">
			    				<a class="btn btn-default labDados">Dados Gerais</a>
			    				<a class="btn btn-default labDados">Publicações</a>
			    				<a class="btn btn-default labDados">Pesquisa</a>
			    				<a class="btn btn-default labDados">Extensão</a>
			    			</div>
			    			<br>
			    			<table>
			    				<tr>
			    					<th><div style="height: 12px;width: 12px; border-radius: 100%; background: red"></div></th>
			    					<th>&nbspPendente</th>
			    					<th>&nbsp&nbsp/&nbsp&nbsp</th>
			    					<th><div style="height: 12px;width: 12px; border-radius: 100%; background: green"></div></th>
			    					<th>&nbspPronto</th>
			    				</tr>
			    			</table>
			    			
			    			
			    			<br>
	    				</center>
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
					url: '../models/mostrarVagas.php',
					success: function(data) {
						$('#noticias').html(data);
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

</html>