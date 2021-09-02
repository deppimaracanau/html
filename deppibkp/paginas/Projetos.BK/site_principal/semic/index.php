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

    <title>  </title>
    <link rel="icon" href="favicon.ico">

    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/index.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
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
        	<a href="index.php" class="navbar-brand">
			<span class="logo">IFCE</span></a>
        </div>

        <!--div class="collapse navbar-collapse" id="barra-navegacao">
			<ul class="nav navbar-nav navbar-right">
               	<li> <a href="index.php">INÍCIO</a> </li>
            </ul>
        </div-->   

      </div>

    </nav>
    
    <!-- ------------------- Conteúdo ------------------- -->
    <div class="container">
	    <div class="row">
	    	<div class="col-sm-3"></div>
	      	<div class="col-sm-6">
	      		<div class="caixaLogin">
	      			
	      			<br><br><br><br><br><br><br>

			      	<form method="post" action="models/login/login.php">
			      		<center>
			      			<img width="180px" src="views/imagens/logoSemic.png">
                            <h1>2018</h1>
				      		<br>
		              		<label for="codigo">Código de Identificação<br>do Avaliador de Trabalhos</label>
		              		<input type="text" name="codigo" id="codigo" class="form-control codigo" placeholder="0000">
		              		<script src="views/js/jquery.mask.js"></script>
							<script type="text/javascript">
								$('#codigo').mask('0000');
							</script>

		              		<br>
						    <br>
						    <button type="submit" class="btn btn-success botao" >Entrar</button>
						</center>
					</form>
	      		</div>
	    </div>

	    <div class="col-sm-3"></div>
    </div>
    
    <!-- ------------------- Rodapé ------------------- -->
    <footer class="rodape">
    	<div class="container">
        	<div class="row">
        		<h5>DEPPI - Departamento de Extensão, Pesquisa, Pós-Graduação e Inovação</h5>
        	</div>
        </div>
    </footer>

    <script type="text/javascript">
		var codigo = <?= $codigo ?>;

		if(codigo == 0)
			alert("Código inválido!");
		if(codigo == 1)
			alert("Sessão Encerrada! Entre com o Código!");
		if(codigo == 2)
			alert("Usuário cadastrado com sucesso!");
		if(codigo == 5)
			alert("Email não confirmado!");

		window.location.href = 'http://' + window.location.hostname + window.location.pathname;
	</script>

</body>

</html>
