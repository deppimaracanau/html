<?php

    $codigo = $_GET['cod'];

?>

<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>  </title>
    <link rel="icon" href="../favicon.ico">

    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.min.js"></script>
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

        <div class="collapse navbar-collapse" id="barra-navegacao">
            <ul class="nav navbar-nav navbar-right">
                <li> <a href="../organizacao.php">Inicio</a> </li>
                <li> <a href="cadastroAvaliador.php">Cadastrar Avaliador</a> </li>
                <li> <a href="cadastroTrabalho.php">Cadastrar Trabalho</a> </li>
            </ul>
        </div>   

      </div>

    </nav>
    
    <!-- ------------------- Conteúdo ------------------- -->
    <div class="container">
	    <div class="row">
	    	<div class="col-sm-3"></div>
	      	<div class="col-sm-6">
	      		<div class="caixaLogin">
	      			
	      			<br><br><br><br><br><br><br>

			      	<form method="post" action="../models/cadastros/trabalho.php">
			      		<center>
			      			<img width="180px" src="imagens/logoSemic.png">
                            <h1>2018</h1>
				      		<br>
		              		<h2>Cadastro de Trabalho</h2>
		              		<label for="nome">Nome do Trabalho:</label>
		              		<input type="text" name="nome" id="nome" class="form-control">

						    <br>
						    <button type="submit" class="btn btn-success botao" >Cadastrar</button>
						</center>
					</form>
	      		</div>

                <div id="listagem">
                    
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

</body>

<script type="text/javascript">
    $(document).ready( function() {
        $.ajax({
            url: '../models/mostrarRegistros/trabalhos.php',
            success: function(data) {
                $('#listagem').html(data);
            }
        });
    });
</script>

<script type="text/javascript">
    var codigo = <?= $codigo ?>;

    if(codigo == 1)
        alert("Cadastrado com sucesso!");

    window.location.href = 'http://' + window.location.hostname + window.location.pathname;
</script>

</html>
