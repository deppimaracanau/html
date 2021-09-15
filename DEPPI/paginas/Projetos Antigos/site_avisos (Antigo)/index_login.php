<html>
	<head>
		<title>SECI - Sistema Eletrônico de Comunicação Interna</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css"><!-- link para o bootstrap -->

		<!-- css interno -->
		<style type="text/css">
			
			html, body, span, p, form, img, a, ul, ol, li, table, tr, td, div{
				margin: 0;
				padding: 0; 
				border:none; 
				outline:none;
				list-style-type:none;
			}
	
			div {
				margin:0; 
				padding:0
			}

			body {
				position: fixed;
				top: 0px;
				right: 0px;
				bottom: 0px;
				left: 0px;
				margin: 0px;
				padding: 0px;
				/*background-image: url(imagens/fundo.jpg);*/
			}
			
			#container {
				/*position: absolute;*/
				top: 50px;
				right: 0px;
				bottom: 0px;
				left: 0px;
				width: 300px;
				height: 250px;
				margin: auto;
				box-shadow: 0px 0px 10px black;
				padding: 40px;
				box-sizing: border-box;
			}
			
			/*Fontes*/
			.fonte_titulos{
				font-family: "Times", serif;
				font-size: 25px;
			}

			.fonte_menus{
				font-family: "Times", serif;
				font-size: 16px;
			}

			.border {
    			border-style: solid;
    			border-width:1px;
				padding: 3px;
				background-color: #be4b49;
				
			}
		</style>
	</head>
	<body>

		<section id="main">
		<!-- Conteúdo principal -->
		<br><br>
			<center>
				<img src="./imagens/sga.png"><br><br><br><br>
				<!--<span class="fonte_titulos">Sistema Gerenciador de Avisos</span><br><br><br>-->
			</center>
			
			<center>
				<span class="fonte_menus border" style="color:white;">O usuário ou a senha não corresponde a nenhuma conta.</span>
			</center>	
		<br><br>
			<form method="post" action="./paginas/seguranca.php">
				<div id="container">
					 <div class="col-xs-15">
				 		
		  					<span class="fonte_menus">Usuário</span><input class="form-control" type="text" name="login" maxlength="30" required/>
						</div>
					
					 <div class="col-xs-15">
				  		
		 					<span class="fonte_menus">Senha</span><input class="form-control" type="password" name="senha" maxlength="30" required/><br>
		 					<span class="fonte_menus"><input  class="btn btn-primary" type="submit" value="Entrar"/></span>	
					</div>
					
				</div>
				<br>
			</form>
		</section>
		
		<section id="destaques">
			<!-- Painéis com destaques -->
		</section>
			
		<br><br><br><br><br><br>
		<footer>
			<!-- Conteúdo do rodapé -->
			<center>
				<span class="fonte_menus">© Copyright 2017 DEPPI - Departamento de Extensão, Pesquisa, Pós-graduação e Inovação</span>
			</center>
		</footer>
	</body>
</html>
