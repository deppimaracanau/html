<?php
	// Verificação de Autenticação
	require_once('../../models/login/autenticacao.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>PGL - Plataforma de gerenciamento de Laboratórios</title>
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
						<h2>Laboratório</h2>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="../../models/dados/laboratorio.php">
						
							<label for="email">Nome do Responsável</label>
							<input type="text" class="form-control" id="responsavel" name="responsavel">
							<br>
				            <select class="form-control" onchange="cursosMostrar()" name="cursos" id="cursos">
				                <option  disabled selected value="">Selecione a quantidade</option>
				                <option value="0">lab 0</option>
				                <option value="1">lab 1</option>
				                <option value="2">lab 2</option>
				                <option value="3">lab 3</option>
				                <option value="4">lab 4</option>
				                <option value="5">lab 5</option>
				            </select>
				            </br>
				            <div id="p1" style="padding: 0px 10px 0px 10px"></div>

				            <script type="text/javascript">
								function cursosMostrar() {
									var opcao = $("#cursos option:selected").val();
									$('div#r1').remove();
									var n = 1;
									for(var k = 1; k <= opcao; k++){
										var opcoes = '<div id="r1" class="form-group"><select class="form-control" name="curso'+n+'" id="curso'+n+'"><option  disabled selected value="">Selecione o curso '+n+'</option><option value="Ciência da Computação">Ciência da Computação</option><option value="Engenharia Ambiental e Sanitária">Engenharia Ambiental e Sanitária</option><option value="Engenharia de Controle e Automação">Engenharia de Controle e Automação</option><option value="Engenharia Mecânica">Engenharia Mecânica</option><option value="Licenciatura em Química">Licenciatura em Química</option><option value="Técnico em Automação Industrial">Técnico em Automação Industrial</option><option value="Técnico em Meio Ambiente">Técnico em Meio Ambiente</option><option value="Técnico em Informática">Técnico em Informática</option><option value="Técnico em Redes">Técnico em Redes</option></select></div>';
										$('#p1').append(opcoes);
										n++;
									}
								}
				            </script>



							<center> <br><br>
								<button type="submit" class="btn btn-success botao" id="botao">Ver Dados</button>
							</center>
						</form>
					</div>
				</div>
			</div>

		</div>

	</body>

</html>