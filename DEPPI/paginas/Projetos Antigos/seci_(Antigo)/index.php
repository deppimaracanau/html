<html>
	<head>
		<title>SECI - Sistema Eletrônico de Comunicação Interna</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css"> <!-- link para o bootstrap -->

		<!-- css interno -->
		<style type="text/css">
			
			html, body, span, p, form, img, a, ul, ol, li, table, tr, td, div {
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
				background-image: url(imagens/fundo.jpg);
			    background-size:1300px;	
			}

			#container {
				top: 50px;
				right: 0px;
				bottom: 0px;
				left: 0px;
				width: 450px;
				height: 700px;
				margin: auto;
				margin-top:70px;
				box-shadow: 0px 0px 10px black;
				padding: 40px;
				box-sizing: border-box;
				background-color:#dcdde1;
				background-repeat: no-repeat;
			}

			/*Fontes*/
			.fonte_menus{
				font-family:Algerian;
				font-size: 20px;
			}
			
            input[type="text"]{
                border: 2px solid #cccccc;
                height: 40px;
                width:100%;
                border-radius: 0px;
            }
            
            input[type="text"]:hover{
                border: 2px solid #b5b6bc;
            }
            
            input[type="password"]{
                border: 2px solid #cccccc;
                height: 40px;
                width:100%;
                border-radius: 0px;  
            }
            
            input[type="password"]:hover{
                border: 2px solid #b5b6bc;
            }

            input[type="submit"]{
                height: 40px;
                width:100%;
                border-radius: 0px;
                margin-top:80px;
            }
            
		</style>

	</head>
	<body>

		<header>
			<!-- Cabeçalho - sem -->
		</header>	
		
		<!-- Conteúdo principal -->
		<div >
			<form method="post" action="./config_bd/seguranca.php">
				<div id="container">
				
    				<center>
    					<img src="./imagens/seci.png" width="365px"><br><br><br><br>
    				</center>		
	
					<div class="col-xs-15">
		  				<span class="fonte_menus">Usuário</span><input type="text" name="login" maxlength="30" required/>
					</div>
					
					 <div class="col-xs-15">
		 					<span class="fonte_menus">Senha</span><input type="password" name="senha" maxlength="30" required/><br>
		 					<input  class="btn btn-primary fonte_menus" type="submit" value="Entrar"/>	
					</div>
					
				</div>
				<br>
			
			</form>
		</div>
		
		<br><br>
		
		<footer>
			<!-- Rodapé - sem -->
		</footer>
	</body>
</html>

<!-- Pedro V S Guimarães -->
