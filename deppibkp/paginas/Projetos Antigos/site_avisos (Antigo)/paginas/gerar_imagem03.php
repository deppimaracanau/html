<?php
	session_start();
    if (!isset($_SESSION['user_logged_in'])) {
		header('location:../index_login.php');
        exit();
    }

	require_once( 'func_image03.php' );
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

			h4 {
				background-color: #9a9595;
				width:200%;
				padding: 5px;
			}

			#parte00 {
				width:43%;
				/*background-color: green;*/
				position: relative;
				top: 50px;
				left: 50px;
			}

			#parte01 {
				float: left;
				width:43%;
				/*background-color: green;*/
				position: relative;
				top: 50px;
				left: 50px;
			}

			#parte02 {
				float: left;
				width:33%;
				/*background-color: black;*/
				position: relative;
				top: 50px;
				left: 180px;
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

		<div id="main" class="container">
		<!-- Conteúdo principal -->

			<div id="parte00">
			<h4>Passo 01 - Enviar imagem do painel</h4>
			<form action="./gerar_image_03/enviar03.php" method="POST" enctype="multipart/form-data">
				Imagem JPG: <input type="file" name="fileUpload1"><input type="hidden" name="nomeImg1" value="imagem"><br>
				<input type="submit" style="width:150;height:30" id="send" value="Enviar">
			</form>
			</div><br><br>
			<form>
				<div id="parte01">
			<h4>Passo 02 - Configurar Imagem</h4>


					<select name="category_text">
						<option>DIREÇÃO GERAL/DIRAP</option>
						<option>DIREN</option>
						<option>ENSINO</option>
						<option>ESTÁGIO</option>
						<option>EXTENSÃO</option>
						<option>PESQUISA</option>
					</select>

					<select name="sub_category_text">
						<option>Auxílios</option>
						<option>Avisos</option>
						<option>Calendário Acadêmico</option>
						<option>Cardápio</option>
						<option>Cursos</option>
						<option>Informações Acadêmicas</option>
						<option>Editais Internos</option>
						<option>Editais Externos</option>
						<option>Eixo/ Meio Ambiente</option>
						<option>Eixo/ Indústria</option>
						<option>Eixo/ Computação</option>
						<option>Esporte</option>
						<option>Eventos</option>
						<option>Feriados</option>
						<option>Imprensa</option>
						<option>Infraestrutura</option>
						<option>Jardineira</option>
						<option>Mestrado</option>
						<option>Monitoria</option>
						<option>Pagamento de bolsas/auxílios</option>
						<option>Pedagogia</option>
						<option>Pesquisa</option>
						<option>Programas</option>
						<option>Projetos</option>
						<option>Pontos Facultativos</option>
						<option>Recesso Escolar</option>
						<option>Restaurante Acadêmico</option>
						<option>Saúde</option>
						<option>Site</option>
						<option>Superior</option>
						<option>Técnico</option>
						<option>Outros</option>
					</select>

					<!--<p>Título da Vaga:<br /><input name="sub_category_text" /></p>-->
					<p>Título:<br /><textarea wrap="hard" rows="1" cols="35" maxlength="34" name="title_text" /></textarea></p>
					<p>Descrição:<br /><textarea wrap="hard" rows="3" cols="50" maxlength="155" name="description_text" /></textarea></p>
					<p><input type="submit" style="width:150;height:30" value="Gerar Imagem"/></p>

				</div>
			</form>
		
	
			<div id="parte02">
				<br><br><br>Imagem de plano de fundo:<br><br>
				<img width="400" height="250" src="fundos.png" />
			</div>
		
		</div>
		
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
	'title_textsize'    => 55,
	'descrition_textsize'    => 38,
	'textfit'     => true,
	'padding'     => 70,
	'margin'      => 10,	
);

// create and output image 
generate_image( $args );

?>
