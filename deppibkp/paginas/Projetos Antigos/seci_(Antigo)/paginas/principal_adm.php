<?php
session_start();
if (! isset($_SESSION['user_logged_in'])) {
    header('location:../index_login.php');
    exit();
}



include("../config_bd/conexao.php");
include("../config_bd/bd_principal_adm.php");
/*
if (! @($conexao = pg_connect("host=localhost dbname=avisos port=5432 user=postgres password=1"))) {
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    
    // Verificando se o usuário está cadastrado no banco
    $sql = pg_query("SELECT quantidade FROM qtd_avisos;") or die("Erro no comando SQL");
    
    // TABELA: quantidades
    if (! $sql) {
        echo "Consulta não foi executada!";
    }
    
    while ($row = pg_fetch_array($sql)) {
        $_SESSION['qtd_avisos'] = $row[0];
    }
    pg_close($conexao);
}*/
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

#upload {
	background-color: #dcdde1;
	padding: 6px 15px;
	width: 500px;
}

h4 {
	margin: 0 auto;
}

/*SlideShow Imagens - Início*/
a, img {
	border: none;
}

.trs {
	-webkit-transition: all ease-out 0.5s;
	-moz-transition: all ease-out 0.5s;
	-o-transition: all ease-out 0.5s;
	-ms-transition: all ease-out 0.5s;
	transition: all ease-out 0.5s;
}

#slider {
	position: relative;
	z-index: 1;
}

#slider a {
	position: absolute;
	top: 0;
	left: 0;
	opacity: 0;
	filter: alpha(opacity = 0);
}

.ativo {
	opacity: 1 !important;
	filter: alpha(opacity = 100) !important;
}

/*controladores*/
span {
	background: #0190EE;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity = 0);
	position: absolute;
	bottom: 40%;
	width: 43px;
	height: 43px;
	z-index: 5;
}

.next {
	right: 10px;
}

.next:before, .next:after {
	left: 21px;
}

.next:before {
	-webkit-transform: rotate(-42deg);
	top: 5px;
}

.next:after {
	-webkit-transform: rotate(-132deg);
	top: 19px;
}

.next:before, .next:after, .prev:before, .prev:after {
	content: "";
	height: 20px;
	background: #fff;
	width: 1px;
	position: absolute;
}

.prev {
	left: 10px;
}

.prev:before, .prev:after {
	left: 18px;
}

.prev:before {
	-webkit-transform: rotate(42deg);
	top: 5px;
}

.prev:after {
	-webkit-transform: rotate(132deg);
	top: 19px;
}

figure:hover span {
	opacity: 0.76;
	filter: alpha(opacity = 76);
}

figure {
	max-width: 400px;
	height: 250px;
	position: relative;
	overflow: hidden;
	/*margin: 0px auto;*/ /*Deixa centralizado*/
	margin: 0px 0px 0px 0px;
	background-image: url(../imagens/tv.png);
	background-size: 400px 250px;
	background-repeat: no-repeat;
}

figcaption {
	padding-left: 20px;
	color: #fff;
	font-family: "Kaushan Script", "Lato", "arial";
	font-size: 22px;
	background: rgba(1, 144, 238, 0.76);
	width: 100%;
	top: 169px;
	position: absolute;
	bottom: 0;
	left: 0;
	line-height: 55px;
	height: 55px;
	z-index: 5
}
/*SlideShow Imagens - Fim*/

/*Flutuar tv*/
#formulario {
	margin: -240px 10px 10px 490px;
}

/* container tv com pré-avisos*/
#container {
	/*position: absolute;*/
	top: 0px;
	right: 0px;
	bottom: 0px;
	left: 0px;
	width: 1330px;
	height: auto;
	margin: auto;
	/*box-shadow: 0px 0px 10px black;*/
	padding: 90px 150px 150px 160px;
	/*box-sizing: border-box;*/
}

input[type=text]:hover, textarea:hover {
	background: #ffffff;
	border: 1px solid #990000;
}


/*exibição mensagem aguarde...*/
#blanket, #aguarde {
	position: fixed;
	display: none;
}

#blanket {
	left: 0;
	top: 0;
	background-color: #f0f0f0;
	filter: alpha(opacity = 65);
	height: 100%;
	width: 100%;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=65)";
	opacity: 0.65;
	z-index: 9998;
}

#aguarde {
	width: auto;
	height: 30px;
	top: 40%;
	left: 45%;
	background: url('http://i.imgur.com/SpJvla7.gif') no-repeat 0 50%;
	line-height: 30px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	z-index: 9999;
	padding-left: 27px;
}

.container {
	margin: 0 auto;
	width: 940px;
}
</style>

<!--SlideShow Imagens - Fim -->


</head>
<body onload="exibir()">

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
	<!-- Conteúdo principal -->
	<!--<img src="./tv.png" >-->

	<div id="container">
		<!--SlideShow Imagens - Inicio -->
		<figure>
			<span class="trs next"></span>
			<span class="trs prev"></span>
			<div id="slider">

				<!--  
					<a href="#" class="trs"><img src="./uploads/img1.jpg" alt="Aviso 1" height=208px width=383px style="margin:8px"></a>
					<a href="#" class="trs"><img src="./uploads/img2.jpg" alt="Aviso 2" height=208px width=383px style="margin:8px"></a>
					<a href="#" class="trs"><img src="./uploads/img3.jpg" alt="Aviso 3" height=208px width=383px style="margin:8px"></a>
					<a href="#" class="trs"><img src="./uploads/img4.jpg" alt="Aviso 4" height=208px width=383px style="margin:8px"></a>
					<a href="#" class="trs"><img src="./uploads/img5.jpg" alt="Aviso 5" height=208px width=383px style="margin:8px"></a>
					<a href="#" class="trs"><img src="./uploads/img6.jpg" alt="Aviso 6" height=208px width=383px style="margin:8px"></a>
				-->
			</div>
			<figcaption></figcaption>
		</figure>

		<div class="container">

			<div id="blanket"></div>
			<div id="aguarde">Aguarde...</div>

			<form id="formulario" action="../config_bd/enviar.php" method="POST"
				enctype="multipart/form-data">

				<h4>Modificar Avisos</h4>
				<br>
				<div id="item"></div>
				<br> <input class="btn btn-primary fonte_menus" type="submit"
					onclick="javascript:document.getElementById('blanket').style.display = 'block';document.getElementById('aguarde').style.display = 'block';"
					style="width: 150;"  value="Enviar"> <input class="btn btn-primary fonte_menus" type="submit"
					onclick="javascript:document.getElementById('blanket').style.display = 'block';document.getElementById('aguarde').style.display = 'block';"
					style="width: 150;" value="Atualizar">
				<!--Teste botao atualizar -->
			</form>
		</div>

	</div>
</body>

</html>

<script type="text/javascript">

		var m=1;
		var var1 = <?php echo $_SESSION['qtd_avisos']?>;
		function exibir(){
			
			for ( i = 0; i < var1; i++) { 
		      var novoItem = '<a href="#" class="trs"><img src="./uploads/img'+m+'.jpg"  alt="Aviso '+m+'" height=208px width=383px style="margin:8px"></a>';
		      $("#slider").append(novoItem);
		    	m++;
			}
			
		}
		  
</script>

<!-- JavaScript -->
<script type="text/javascript">


				function setaImagem(){
					var settings = {
						primeiraImg: function(){
							elemento = document.querySelector("#slider a:first-child");
							elemento.classList.add("ativo");
							this.legenda(elemento);
						},

						slide: function(){
							elemento = document.querySelector(".ativo");

							if(elemento.nextElementSibling){
								elemento.nextElementSibling.classList.add("ativo");
								settings.legenda(elemento.nextElementSibling);
								elemento.classList.remove("ativo");
							}else{
								elemento.classList.remove("ativo");
								settings.primeiraImg();
							}

						},

						proximo: function(){
							clearInterval(intervalo);
							elemento = document.querySelector(".ativo");
					
							if(elemento.nextElementSibling){
								elemento.nextElementSibling.classList.add("ativo");
								settings.legenda(elemento.nextElementSibling);
								elemento.classList.remove("ativo");
							}else{
								elemento.classList.remove("ativo");
								settings.primeiraImg();
							}
							intervalo = setInterval(settings.slide,4000);
						},

						anterior: function(){
							clearInterval(intervalo);
							elemento = document.querySelector(".ativo");
					
							if(elemento.previousElementSibling){
								elemento.previousElementSibling.classList.add("ativo");
								settings.legenda(elemento.previousElementSibling);
								elemento.classList.remove("ativo");
							}else{
								elemento.classList.remove("ativo");						
								elemento = document.querySelector("a:last-child");
								elemento.classList.add("ativo");
								this.legenda(elemento);
							}
							intervalo = setInterval(settings.slide,4000);
						},

						legenda: function(obj){
							var legenda = obj.querySelector("img").getAttribute("alt");
							document.querySelector("figcaption").innerHTML = legenda;
						}

					}


					//chama o slide
					settings.primeiraImg();

					//chama a legenda
					settings.legenda(elemento);

					//chama o slide à um determinado tempo
					var intervalo = setInterval(settings.slide,4000);
					document.querySelector(".next").addEventListener("click",settings.proximo,false);
					document.querySelector(".prev").addEventListener("click",settings.anterior,false);

				}

				window.addEventListener("load",setaImagem,false);
</script>


<script type="text/javascript">

    		var n=1;
    		
    		$(document).ready(function() {
    			for (i = 0; i < <?php echo $_SESSION['qtd_avisos']?>; i++) { 
    		      var novoItem = 'Aviso '+n+':<div id="upload"><input type="file" name="fileUpload'+n+'"><input type="hidden" name="nomeImg'+n+'" value="img'+n+'"></div>';
    		      $("#item").append(novoItem);
    		    	n++;
    			}
    		  });
  		  
		</script>