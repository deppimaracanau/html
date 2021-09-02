<?php
// Verificação de Autenticação
session_start();

$codigo = $_GET['cod'];

if (isset($_SESSION['id']))
	header('Location: views/home/mostrarDados.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>Gerador de Certificados</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="views/css/style.css">



</head>

<body>
	<div class="container">

		
		
		<div class="col-sm-4 fundoLogin">
			<div class="titulo">Gerador de Certificados</div>

			<form method="post" action="models/login/login.php">
				<label>Nome:</label>
				<span class="font_text_simples">Usuário</span>
				<input class="form-control" type="text" name="login" required>

				<label>Senha:</label>
				<span class="font_text_simples">Senha</span>
				<input class="form-control" type="password" name="senha" required>
				<br>

				<button class="btn btn-primary form-btn" type="submit">Entrar</button>



			</form>
			<a href="views/solicitacao/solicitacao.php"><button class="btn btn-primary form-btn" type="submit">Solicitar Certificado</button></a>

		</div>
	</div>


</body>

<script type="text/javascript">
	var codigo = <?= $codigo ?>;

	if (codigo == 0)
		alert("Erro no Login ou na Senha!");
	if (codigo == 1)
		alert("Sessão Encerrada! Entre com Login e Senha!");
	if (codigo == 2)
		alert("Usuário cadastrado com sucesso!");
	if (codigo == 3)
		alert("Siape já cadastrado! Entre em contato com o DEPPI");
	if (codigo == 4)
		alert("Email já cadastrado! Entre em contato com o DEPPI");
	if (codigo == 5)
		alert("Email não confirmado!");

	window.location.href = 'http://' + window.location.hostname + window.location.pathname;
</script>



</html>