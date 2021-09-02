<?php
	// Verificação de Autenticação
	session_start();
	
	$codigo = $_GET['cod'];

	if( isset($_SESSION['id']) )
		header('Location: paginas/home.php');

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Central de Estágios</title>
		<link rel="icon" href="favicon.ico">

	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/estilo.css" rel="stylesheet">
	    <link href="css/backgroundIndex.css" rel="stylesheet">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="bootstrap/js/bootstrap.min.js"></script>
	</head>

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
		        	<a href="index.php" class="navbar-brand"><span class="logo">IFCE</span></a>
		        </div>

		        <div class="collapse navbar-collapse" id="barra-navegacao">
					<ul class="nav navbar-nav navbar-right">

					</ul>
		        </div>
		    </div>
	    </nav>

	    <br><br><br><br><br><br>

		<div class="container capa" id="inicio">
			<div class="row">
				<div class="col-sm-8">
					<h1 class="titulo">Central de Estágios</h1>
					<p>Local reservado à gestão de vagas de estágio.</p>
					<br><br>
				</div>
				<div class="col-sm-4">
					<h2>Login</h2>
					<form method="post" action="bd/usuarioValidacao.php">
						<label for="login">Email</label>
						<input type="email" class="form-control" id="login" name="login">
						<br>
						<label for="senha">Senha</label>
						<input type="password" class="form-control" id="senha" name="senha">
						<br>
						<button type="submit" class="btn btn-info">Entrar</button>
					</form>
					<br>
					<p>
						<a data-toggle="modal" data-target="#janela">Clique aqui</a>
						para se cadastrar!
					</p>
				</div>
			</div>
		</div>

		<!-- ------------------- Janela ------------------- -->
		<div class="modal fade" id="janela">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

					<!-- cabecalho -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span>&times;</span>
						</button>
						<h2 class="modal-title">Cadastro de Usuário</h2>
					</div>

					<!-- corpo -->
					<form method="post" action="bd/usuarioCadastro.php">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-6">
								<img class="img-responsive" src="imagens/estagio.jpg">
							</div>
							<div class="col-sm-6">
								
									<label for="nome">Nome</label>
									<input type="text" class="form-control" id="nome" name="nome"> 
									<br>
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email">
									<br>
									<label for="senhaCad">Senha</label>
									<input type="password" class="form-control" id="senhaCad" name="senhaCad">
									<br>
							</div>
						</div>
					</div>

					<!-- rodape -->
					<div class="modal-footer">
						<center>
							<button type="button" class="btn btn-default" data-dismiss="modal" style="padding:7px 15px 7px 15px;">Voltar</button> 
							<button type="submit" class="btn btn-success">Cadastrar</button>
						</center>
					</div>
					</form>
				</div>
			</div>
		</div>

	</body>
</html>

<!-- Invalida o botão enter -->
<script type="text/javascript">
	$(document).ready(function () {
	   $('input').keypress(function (e) {
	        var code = null;
	        code = (e.keyCode ? e.keyCode : e.which);                
	        return (code == 13) ? false : true;
	   });
	});  	
</script>

<!-- Código de Verificação - recebido via GET -->
<script type="text/javascript">

	var codigo = <?= $codigo ?>;

	if(codigo == 1)
		alert("Sessão Encerrada! Entre com Login e Senha!");
	if(codigo == 2)
		alert("Usuário cadastrado com sucesso!");
	if(codigo == 3)
		alert("Email já cadastrado!");

	window.location.href = 'http://sic-maracanau.com.br/estagios/index.php';
	
</script>