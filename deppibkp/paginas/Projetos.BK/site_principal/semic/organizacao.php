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

        <div class="collapse navbar-collapse" id="barra-navegacao">
			<ul class="nav navbar-nav navbar-right">
               	<li> <a href="views/cadastroAvaliador.php">Cadastrar Avaliador</a> </li>
			    <li> <a href="views/cadastroTrabalho.php">Cadastrar Trabalho</a> </li>
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

	      			<center>
		      			<img width="180px" src="views/imagens/logoSemic.png">
                        <h1>2018</h1>
			      		<br>
	              		<a class="btn btn-info" href="views/cadastroAvaliador.php">Cadastrar Avaliador</a><br><br>
			      		<a class="btn btn-info" href="views/cadastroTrabalho.php">Cadastrar Trabalho</a>
					</center>
			      	

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

</html>
