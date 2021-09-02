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
						<h2>Dados do Usuário</h2>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="../../models/dados/laboratorio.php">
							<label for="nomeEmpresa">Nome</label>
							<input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa">
							<input type="number" class="hide" id="idEmpresa" name="idEmpresa">
							<br>
							<label for="ruaEmpresa">Email</label>
							<input type="text" class="form-control" id="ruaEmpresa" name="ruaEmpresa">
							<br>
							<label for="complemento">Lattes</label>
							<input type="text" class="form-control" id="complemento" name="complemento">
  							<br>
  							<input type="checkbox" id="novaSenha"> Definir nova senha
  							<br><br>
  							<div id="camposNvSenha">
								<label for="sAtual">Senha Atual</label>
								<input type="text" class="form-control" id="sAtual" name="sAtual">
								<br>
								<label for="sNova">Nova Senha</label>
								<input type="text" class="form-control" id="sNova" name="sNova">
								<br>
								<label for="sRepete">Nova Senha Novamente</label>
								<input type="text" class="form-control" id="sRepete" name="sRepete">
							</div>
							<br>
							<center> <br><br>
								<button type="submit" class="btn btn-success botao" id="botao">Atualizar</button>
							</center>
						</form>
					</div>
				</div>
			</div>

		</div>

	</body>

	<!-- Adicionar campos para nova senha -->
	<script type="text/javascript">
		$('#novaSenha').ready(function() {
			$('#camposNvSenha').hide();
		});

		$('#novaSenha').click(function() {
			if( $("#novaSenha").is(":checked") == true ) {
				$('#camposNvSenha').show();
			} else {
				$('#camposNvSenha').hide();
			}
		});
	</script>

</html>