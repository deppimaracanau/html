<?php
/**
 * Example
 */
session_start();
        if (!isset($_SESSION['user_logged_in'])) {

           header('location:../index_login.php');
            exit();
        }
require_once( 'func_image.php' );

// if form not submitted, show it and bail
if ( ! isset( $_GET['title_text'] ) && ! isset( $_GET['description_text'] ) ) {
	?>
	
<html>
	<head>
	  	<title>SGA - Sistema Gerenciador de Avisos</title>
		<meta charset="UTF-8">
		
		<style type="text/css">
	
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

			.menu-opcoes ul {
				font-size: 15px;
			}
			.menu-opcoes a {
				color: #003366;
			}

			body {
				color: #333333;
				font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				/*background: url(tv.png);*/
			}

			.menu-opcoes ul li {
				display: inline;
				margin-left: 20px;
			}
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

			.menu-opcoes {
				position: absolute;
				bottom: 0;
				right: 0;
			}

			/*menu*/
		</style>

		
	</head>
	<body>
		
		<!-- Conteúdo do cabeçalho -->
		<header class="container" >
	
			<h1><img src="./imagens/sga.png" alt="Mirror Fashion" height=100px width=200px></h1>
			<p class="user">
				<?php
					echo "Olá, ".$_SESSION['user_login']; 
				?><br><a href="logout.php">Encerrar Sessão</a>
			</p>
			
			<nav class="menu-opcoes">
				<ul>
					<li><a href="./principal_adm.php">Página  inicial</a></li>
					<li><a href="./gerar_imagem.php">Criar avisos</a></li>
					<li><a href="./sobre.html">Sobre</a></li>
					<li><a href="./ajuda.html">Ajuda</a></li>
				</ul>
			</nav>

		</header>
		<!-- Conteúdo do cabeçalho -->

		<section id="main">
		<!-- Conteúdo principal -->

			<form>
				<div id="parte01">

					<select name="category_text">
						<option>ENSINO</option>
						<option>DEPPI</option>
						<option>TRANSPORTE</option>
					</select>

					<!--<p>Título da Vaga:<br /><input name="category_text" /></p>-->
					<p>Título:<br /><textarea wrap="hard" rows="2" cols="27" maxlength="60" name="title_text" /></textarea></p>
					<p>Descrição:<br /><textarea wrap="hard" rows="3" cols="45" maxlength="140"name="description_text" /></textarea></p>
					<p><input type="submit" value="Gerar Imagem"/></p>

				</div>
			</form>
		
			<div id="parte02">
				Imagem de plano de fundo:<br><br>
				<img width="400" height="250" src="imagem_gerada.jpg" />
			</div>
		</section>
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
		<footer>
		<!-- Conteúdo do rodapé -->
			<center>
				<span class="fonte_menus">© Copyright 2017 DEPPI - Departamento de Extensão, Pesquisa, Pós-graduação e Inovação</span>
			</center>
		</footer>
	</body>
</html>

<?php
	die();
}

// get form submission (or defaults)
$category_text    = isset( $_GET['category_text'] )    ? $_GET['category_text']    : 'IFCE - Maracanau'; 
$title_text    	= isset( $_GET['title_text'] )    ? $_GET['title_text']    : 'IFCE - Maracanau'; 
$description_text = isset( $_GET['description_text'] ) ? $_GET['description_text'] : 'IFCE - Maracanau'; 
//$filename    		= memegen_sanitize( $description_text ? $description_text : $title_text );

$args = array(
	'category_text'    => $category_text,
	'title_text'    => $title_text,
	'description_text' => $description_text,
	'filename'    => $filename,
	'font'        => dirname(__FILE__) .'/OpenSans-ExtraBold.ttf',
	'font_sub'    => dirname(__FILE__) .'/OpenSans-Light.ttf',//'/sans.ttf',
	'imagebase'    => dirname(__FILE__) .'/imagem_gerada.jpg',
	'category_textsize'    => 24,
	'title_textsize'    => 75,
	'descrition_textsize'    => 48,
	'textfit'     => true,
	'padding'     => 70,
	'margin'      => 10,	
);

// create and output image 
generate_image( $args );

?>
