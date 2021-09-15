<?php
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
	 	<title>SECI - Sistema Eletrônico de Comunicação Interna</title>
		<meta charset="UTF-8">
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

			input[type=submit]{
			        background:#006699;
			        color:#ffffff;
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
/*
			.menu-opcoes {
				position: absolute;
				bottom: 0;
				right: 0;
			}*/

			/*menu*/


			#container {
				/*position: absolute;*/
				top: 50px;
				right: 0px;
				bottom: 0px;
				left: 0px;
				width: 930px;
				height: auto;
				margin: auto;
				box-shadow: 0px 0px 10px black;
				padding: 40px;
				box-sizing: border-box;
			}

		</style>

		
	</head>
	<body>
		
		<!-- Conteúdo do cabeçalho -->
		<header class="container" >
	
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
		<!-- Conteúdo do cabeçalho -->

		<section id="main">
		<!-- Conteúdo principal -->
		
			<!--<a href="gerar_imagem01.php">Gerar imagem tipo 01</a><br>
			<a href="gerar_imagem02.php">Gerar imagem tipo 02</a>-->
			
			<div id="container">
			<p>Modelo 01</p>
			<a href="gerar_imagem01.php">
			<img border="0" alt="aviso01" src="./imagens/aviso01.jpg" width="200" height="100">
			</a>

			<p>Modelo 02</p>
			<a href="gerar_imagem02.php">
			<img border="0" alt="aviso02" src="./imagens/aviso02.jpg" width="200" height="100">
			</a>

			<p>Modelo 03</p>
			<a href="gerar_imagem03.php">
			<img border="0" alt="aviso03" src="./imagens/aviso03.jpg" width="200" height="100">
			</a>
			</div>
		
		
		</section>
		
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<footer id="footer">
		 
     <center>
				<span class="fonte_menus">© Copyright 2017 DEPPI - Departamento de Extensão, Pesquisa, Pós-graduação e Inovação</span>
		</center>
			</div>
		</footer>	
	</body>
</html>

<?php
	die();
}

// get form submission (or defaults)
$category_text    = isset( $_GET['category_text'] )    ? $_GET['category_text']    : 'IFCE - Maracanau'; 
$sub_category_text    = isset( $_GET['sub_category_text'] )    ? $_GET['sub_category_text']    : 'IFCE - Maracanau'; 
$title_text    	= isset( $_GET['title_text'] )    ? $_GET['title_text']    : 'IFCE - Maracanau'; 
$description_text = isset( $_GET['description_text'] ) ? $_GET['description_text'] : 'IFCE - Maracanau'; 
//$filename    		= memegen_sanitize( $description_text ? $description_text : $title_text );

$args = array(
	'category_text'    => $category_text,
	'sub_category_text'    => $sub_category_text,
	'title_text'    => $title_text,
	'description_text' => $description_text,
	'filename'    => $filename,
	'font'        => dirname(__FILE__) .'/OpenSans-ExtraBold.ttf',
	'font_sub'    => dirname(__FILE__) .'/OpenSans-Light.ttf',//'/sans.ttf',
	'imagebase'    => dirname(__FILE__) .'/imagem_gerada.jpg',
	'sub_category_textsize'    => 24,
	'title_textsize'    => 75,
	'descrition_textsize'    => 48,
	'textfit'     => true,
	'padding'     => 70,
	'margin'      => 10,	
);

// create and output image 
generate_image( $args );

?>
