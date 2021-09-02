<?php
	session_start();
        if (!isset($_SESSION['user_logged_in'])) {

         header('location:../index_login.php');
            exit();
        }
?>



<html>
	<head>
		<title>SECI - Sistema Eletrônico de Comunicação Interna</title>
		<meta charset="UTF-8">
	</head>
	
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

		#parte01 {
				float: left;
				width:33%;
				/*background-color: green;*/
				position: relative;
				top: 50px;
				left: 205px;
			}

			#parte02 {
				float: left;
				width:33%;
				/*background-color: black;*/
				position: relative;
				top: 50px;
				left: 205px;
			}

			/*menu*/


 /* MENU - INÍCIO */
#menu-opcoes ul {
				padding:0px;
				margin:0px;
				background-color:#1482b0;
				list-style:none;
			}
			
			#menu-opcoes ul li { 
				display: inline; 
			}
			
			#menu-opcoes ul li a {
					padding: 6px 15px;
				display: inline-block;

				/* visual do link */
				background-color:#1482b0;
				color: white;
				text-decoration: none;
				border-bottom:3px solid #1482b0;
			}


			#menu-opcoes ul li a:hover {
				background-color:#1d9bcf;
				color: white;
				border-bottom:3px solid white;
			}
/*MENU -  FIM */

/* rodapé*/
 		#footer {
        height: 30px;
			padding: 20px;
      }
      #footer {
        background-color: #f5f5f5;
      }

	 
    
/* rodapé */
			.user {
				font-size: 14px;
				padding-right: 35px;
				text-align: right;
				width: 140px;
				position: absolute;
				top: 0;
				right: 0;
			}

			header {
				position: relative;
			}

			.container {
				margin: 0 auto;
				width: 940px;
			}

			/*.menu-opcoes ul {
				font-size: 15px;
			}
			.menu-opcoes a {
				color: #003366;
			}*/

			body {
				color: #333333;
				font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				/*background: url(tv.png);*/
			}

			/*.menu-opcoes ul li {
				display: inline;
				margin-left: 20px;
			}*/
			.sacola {
				padding-top: 8px;
			}

			.container {
				margin: 0 auto;
				width: 940px;
			}

			.logotipo {
				position: relative;
				top: 20px;
				left: 50px;
			}

			/*.menu-opcoes {
				position: absolute;
				bottom: 0;
				right: 0;
			}*/

			/*menu*/
	</style>
	
	
	<body>
		
		<!-- Conteúdo do cabeçalho -->
		<header class="container">
			
			<h1><img src="./imagens/sga.png" alt="SECI" height=100px width=200px></h1>
			<p class="user">
				<?php
					echo "Olá, ".$_SESSION['user_login']; 
				?><br><a href="logout.php">Encerrar Sessão</a>
			</p>
			
			<nav id="menu-opcoes">
				<ul>
					<li><a href="./principal_adm.php">Página  inicial</a></li>
					<li><a href="./gerar_imagem.php">Criar avisos</a></li>
					<li><a href="./galeria.php">Galeria</a></li>
					<li><a href="./ajuda.php">Ajuda</a></li>
				</ul>
			</nav>

		</header>
		
		<!-- Conteúdo principal -->
		<section>
			<br><br><center>Tutorial de funcionamento SECI: <a href="enucomp_anaisX_2017-525-532.pdf">Artigo publicado sobre SECI<a></center>
		</section>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<footer id="footer">
		 
     <center>
				<span class="fonte_menus">© Copyright 2017 DEPPI - Departamento de Extensão, Pesquisa, Pós-graduação e Inovação</span>
		</center>
			</div>
		</footer>	
	</body>
</html>
