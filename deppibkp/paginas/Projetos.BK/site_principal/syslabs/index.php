<?php
	// Verificação de Autenticação
	session_start();
	
	$codigo = $_GET['cod'];

	if( isset($_SESSION['id']) )
		header('Location: views/home/home.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <title>Plataforma de Gerenciamente de Laboratórios</title>
	    <link rel="icon" href="favicon.ico">

	    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="views/css/estilo.css" rel="stylesheet">
	    <link href="views/css/BodyIndex.css" rel="stylesheet">

	    <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
	</head>

	<body>
	    <!-- ------------------- Início ------------------- -->
	    <div class="container capa" id="inicio">
	    	<div class="row">
	    	<div class="col-sm-3"></div>
	      	<div class="col-sm-6">
	      		<div class="caixaLogin">
	      			<div class="titulo">
			      		Plataforma de Gerenciamente de Laboratórios
			      	</div>

			      	<form method="post" action="models/login/login.php">
	              		<label for="login">Siape</label>
	              		<input type="text" name="login" id="login" class="form-control">
	              		<br>
	              		<label for="senha">Senha</label>
	              		<input type="password" name="senha" id="senha" class="form-control">
	              		<br>
	              		<a data-toggle="modal" data-target="#janelaLogin">Clique aqui</a> para se cadastrar!
					    
					    <br>
					    <center><button type="submit" class="btn btn-success botao" >Entrar</button></center>
					</form>
	      		</div>
	      	</div>
	      	<div class="col-sm-3"></div>
		</div>

	        <!-- Janela: Login -->
	      	<div class="modal fade" id="janelaLogin">
		        <div class="modal-dialog modal-lg">
		          	<div class="modal-content">
		            
			            <!-- cabecalho -->
			            <div class="modal-header">
			              	<button type="button" class="close" data-dismiss="modal">
			                	<span>&times;</span>
			              	</button>
			              	<h3 class="modal-title">Cadastro</h3>
			            </div>

			            <!-- corpo -->
			            <div class="modal-body">
			              	<form method="post" action="models/login/cadastro.php">
			              		<label for="nome">Nome</label>
			              		<input type="text" name="nome" id="nome" class="form-control">
			              		<br>
			              		<label for="siape">SIAPE</label>
			              		<input type="text" name="siape" id="siape" class="form-control">
			              		<br>
			              		<label for="email">Email</label>
			              		<input type="text" name="email" id="email" class="form-control">
			              		<br>
			              		<label for="lattes">Lattes</label>
			              		<input type="text" name="lattes" id="lattes" class="form-control">
			              		<br>
			              		<label for="senha1">Senha</label>
			              		<input type="password" name="senha1" id="senha1" class="form-control">
			              		<br>
			              		<label for="senha2">Confirme a Senha</label>
			              		<input type="password" name="senha2" id="senha2" class="form-control">
			              		<br>
			            </div>

			            <!-- rodape -->
			            <div class="modal-footer">
			              	<center>
			              		<button type="button" class="btn btn-default botaoCadastro" data-dismiss="modal">Voltar</button>
			              		<button type="submit" class="btn btn-success botaoCadastro" >Cadastrar</button>
			              	</center>
			              	</form> <!-- Encerra o form -->
			            </div>

		          	</div>
		        </div>
	      	</div>

	    </div>
	</body>

	<script type="text/javascript">
		var codigo = <?= $codigo ?>;

		if(codigo == 0)
			alert("Erro no Login ou na Senha!");
		if(codigo == 1)
			alert("Sessão Encerrada! Entre com Login e Senha!");
		if(codigo == 2)
			alert("Usuário cadastrado com sucesso!");
		if(codigo == 3)
			alert("Siape já cadastrado! Entre em contato com o DEPPI");
		if(codigo == 4)
			alert("Email já cadastrado! Entre em contato com o DEPPI");
		if(codigo == 5)
			alert("Email não confirmado!");

		window.location.href = 'http://' + window.location.hostname + window.location.pathname;
	</script>

</html>