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
<link
	href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css"
	rel="stylesheet">
<!-- galeria -->
<!-- CSS -->
<style type="text/css">

/*galeria */

/* margen*/
.margin_test {
	margin-left: 160px;
	margin-top: 30px;
}
/* margen*/
.demo-gallery>ul {
	margin-bottom: 0;
}

.demo-gallery>ul>li {
	float: left;
	margin-bottom: 15px;
	margin-right: 20px;
	width: 200px;
	height: 100px;
}

.demo-gallery>ul>li a {
	border: 3px solid #FFF;
	border-radius: 3px;
	display: block;
	overflow: hidden;
	position: relative;
	float: left;
}

.demo-gallery>ul>li a>img {
	-webkit-transition: -webkit-transform 0.15s ease 0s;
	-moz-transition: -moz-transform 0.15s ease 0s;
	-o-transition: -o-transform 0.15s ease 0s;
	transition: transform 0.15s ease 0s;
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1);
	height: 100%;
	width: 100%;
}

.demo-gallery>ul>li a:hover>img {
	-webkit-transform: scale3d(1.1, 1.1, 1.1);
	transform: scale3d(1.1, 1.1, 1.1);
}

.demo-gallery>ul>li a:hover .demo-gallery-poster>img {
	opacity: 1;
}

.demo-gallery>ul>li a .demo-gallery-poster {
	background-color: rgba(0, 0, 0, 0.1);
	bottom: 0;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
	-webkit-transition: background-color 0.15s ease 0s;
	-o-transition: background-color 0.15s ease 0s;
	transition: background-color 0.15s ease 0s;
}

.demo-gallery>ul>li a .demo-gallery-poster>img {
	left: 50%;
	margin-left: -10px;
	margin-top: -10px;
	opacity: 0;
	position: absolute;
	top: 50%;
	-webkit-transition: opacity 0.3s ease 0s;
	-o-transition: opacity 0.3s ease 0s;
	transition: opacity 0.3s ease 0s;
}

.demo-gallery>ul>li a:hover .demo-gallery-poster {
	background-color: rgba(0, 0, 0, 0.5);
}

.demo-gallery .justified-gallery>a>img {
	-webkit-transition: -webkit-transform 0.15s ease 0s;
	-moz-transition: -moz-transform 0.15s ease 0s;
	-o-transition: -o-transform 0.15s ease 0s;
	transition: transform 0.15s ease 0s;
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1);
	height: 100%;
	width: 100%;
}

.demo-gallery .justified-gallery>a:hover>img {
	-webkit-transform: scale3d(1.1, 1.1, 1.1);
	transform: scale3d(1.1, 1.1, 1.1);
}

.demo-gallery .justified-gallery>a:hover .demo-gallery-poster>img {
	opacity: 1;
}

.demo-gallery .justified-gallery>a .demo-gallery-poster {
	background-color: rgba(0, 0, 0, 0.1);
	bottom: 0;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
	-webkit-transition: background-color 0.15s ease 0s;
	-o-transition: background-color 0.15s ease 0s;
	transition: background-color 0.15s ease 0s;
}

.demo-gallery .justified-gallery>a .demo-gallery-poster>img {
	left: 50%;
	margin-left: -10px;
	margin-top: -10px;
	opacity: 0;
	position: absolute;
	top: 50%;
	-webkit-transition: opacity 0.3s ease 0s;
	-o-transition: opacity 0.3s ease 0s;
	transition: opacity 0.3s ease 0s;
}

.demo-gallery .justified-gallery>a:hover .demo-gallery-poster {
	background-color: rgba(0, 0, 0, 0.5);
}

.demo-gallery .video .demo-gallery-poster img {
	height: 48px;
	margin-left: -24px;
	margin-top: -24px;
	opacity: 0.8;
	width: 48px;
}

.demo-gallery.dark>ul>li a {
	border: 3px solid #04070a;
}

.home .demo-gallery {
	padding-bottom: 80px;
}
/*galeria */
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


	<!-- GALERIA -->

	<!-- Conteúdo principal -->
	<div class="container">


		<div id="container">
			<h3>Galeria Avisos</h3>
			<hr>
			<center>
				<div class="demo-gallery">
					<ul id="lightgallery" class="list-unstyled row">
		
                    
                       <?php
                    $nome_arquivo = $_GET['nome'];
                    $dir = 'galeria_avisos';
                    if (! $nome_arquivo) {
                        $array_dir = scandir($dir);
                        foreach ($array_dir as $images) {
                            if ($images != "." && $images != "..") {
                                echo "<a href='galeria_avisos/$images'><img src='galeria_avisos/$images' width=270 height=140 /> </a>";
                                // echo "<a href=?nome=$images><img src='images/lixeira.jpg' border=0/></a>&nbsp;&nbsp;";
                            }
                        }
                    } else {
                        unlink($dir . $nome_arquivo);
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=nome_do_arquivo.php'>";
                    }
                    ?>
              
            </ul>
				</div>
			</center>
			<script
				src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
			<script
				src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
			<script
				src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
			<script
				src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
			<script
				src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
			<script
				src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
			<script
				src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
			<script
				src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
			<script>
            lightGallery(document.getElementById('lightgallery'));
        </script>
			<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
			<br> <br> <br> <br>
		</div>
	</div>
</body>

</html>

