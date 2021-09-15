<?php
session_start();
if (! isset($_SESSION['user_logged_in'])) {
    header('location:../index_login.php');
    exit();
}
?>

<html>
<head>
<title>SECI - Sistema Eletrônico de Comunicação Interna</title>
<meta charset="UTF-8">
<meta http-equiv="cache-control"
	content="no-store, no-cache, must-revalidate, Post-Check=0, Pre-Check=0">
<meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
<!-- link para bootstrap CSS -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!-- CSS -->
<style type="text/css">
body {
	background-color: white;
}

header {
	width: 100%;
	height: 80px;
	background-color: #1482b0; /* aplicando transparência no menu */
	z-index: 2; /* colocando na frente da imagem */
	position: relative;
}

header #logotipo {
	position: absolute;
	width: 252px;
	height: 102px;
	top: 10px;
	border: 3px solid white;
}

header .header-black {
	background-color: #dcdde1;
	height: 40px;
}

/* MENU - INÍCIO */
#menu-opcoes ul {
	padding: 0px;
	margin: 0px;
	background-color: #1482b0;
	list-style: none;
}

#menu-opcoes ul li {
	display: inline;
}

#menu-opcoes ul li a {
	padding: 6px 15px;
	display: inline-block;
	font-size: 20px;
	/* visual do link */
	background-color: #1482b0;
	color: white;
	text-decoration: none;
	border-bottom: 3px solid #1482b0;
	height: 40px;
}

#menu-opcoes ul li a:hover {
	background-color: #1d9bcf;
	color: white;
	border-bottom: 3px solid white;
}

.header-black {
	padding-top: 10px;
}

/*menu*/
#container {
	width: 100%;
	height: auto;
	margin: auto;
	/*box-shadow: 0px 0px 10px black;*/
	padding: 90px 0px 0px 0px;
}

.container {
	margin: 0 auto;
	width: 940px;
}

.modelo {
	width: 940px;
	height: 160px;
	background-color: #dcdde1;
	margin-bottom: 20px;
}

ul {
	padding-left: 300px;
}

h4 {
	padding-top: 15px;
	padding-left: 300px;
}
</style>
</head>
<body>

	<!-- Cabeçalho -->
	<header>

		<div class="header-black">
			<div class="container">
				<!-- container é do bootstrap -->
				<div class="pull-right">
					<!-- alinha informação para direita, até limites do container -->
                		<?php
                echo "Olá, " . $_SESSION['user_login'] . " | <a href='logout.php'>Encerrar Sessão</a>";
                ?>
                	</div>
			</div>
		</div>

		<div class="container">
			<!-- container é do bootstrap -->

			<div class="row">
				<nav id="menu-opcoes" class="pull-right">
					<ul>
						<li><a href="./principal_adm.php">Página Inicial</a></li>
						<li><a href="./modelos.php">Criar avisos</a></li>
						<li><a href="./galeria.php">Galeria</a></li>
						<li><a href="./configuracao.php">Configuração</a></li>
					</ul>
				</nav>

			</div>

		</div>

		<div class="container">
			<!-- logo -->
			<img id="logotipo" src="../imagens/logo.png" alt="logotipo">
		</div>

	</header>

	<div class="container">

		<div id="container">


			<a href="gerar_modelo01.php">
				<div class="modelo">
					<img border="0" alt="aviso01" src="./imagens/aviso01.jpg"
						width="260" height="160"
						style="border: 2px solid #7f8fa6; float: left;">
					<h4>Modelo 01</h4>
					<ul>
						<li>Possui um tema principal com duas linhas.</li>
						<li>Descrição com três linhas.</li>
					</ul>


				</div>
			</a> <a href="gerar_modelo02.php">
				<div class="modelo">
					<img border="0" alt="aviso02" src="./imagens/aviso02.jpg"
						width="260" height="160"
						style="border: 2px solid #7f8fa6; float: left;">
					<h4>Modelo 02</h4>
					<ul>
						<li>Necessário o upload de uma imagem para compor o painel</li>
						<li>Possui um tema principal com duas linhas.</li>
						<li>Descrição com uma linha.</li>
					</ul>
				</div>

			</a> <a href="gerar_modelo03.php">
				<div class="modelo">
					<img border="0" alt="aviso03" src="./imagens/aviso03.jpg"
						width="260" height="160"
						style="border: 2px solid #7f8fa6; float: left;">
					<h4>Modelo 03</h4>
					<ul>
						<li>Necessário o upload de uma imagem para compor o painel</li>
						<li>Possui um tema principal com uma linha.</li>
						<li>Descrição com três linhas.</li>
					</ul>
				</div>
			</a>

		</div>
	</div>
</body>
</html>
