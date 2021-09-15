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

		<meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate, Post-Check=0, Pre-Check=0">
		<meta http-equiv="expires" content="0">
		<meta http-equiv="pragma" content="no-cache">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<!-- CSS -->
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

	input[type=text]{   
    border-radius:4px;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    box-shadow: 1px 1px 2px #333333;    
    -moz-box-shadow: 1px 1px 2px #333333;
    -webkit-box-shadow: 1px 1px 2px #333333;
    background: #cccccc; 
    border:1px solid #000000;
    width:150px;
}
 
textarea{
    border: 1px solid #000000;
    background:#cccccc;
    width:150px;
    height:100px;
    border-radius:4px;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    box-shadow: 1px 1px 2px #333333;    
    -moz-box-shadow: 1px 1px 2px #333333;
    -webkit-box-shadow: 1px 1px 2px #333333;
}
 
input[type=text]:hover, textarea:hover{ 
         background: #ffffff; border:1px solid #990000;
}
 
input[type=submit]{
        background:#006699;
        color:#ffffff;
}


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

		/*SlideShow Imagens - Início*/

		a,img {border: none;}
		
		.trs {-webkit-transition:all ease-out 0.5s;
					-moz-transition:all ease-out 0.5s;
					-o-transition:all ease-out 0.5s;
					-ms-transition:all ease-out 0.5s;
					transition:all ease-out 0.5s;}
		
		#slider {position: relative; z-index: 1;}
				
		#slider a { position: absolute; top: 0; left: 0; opacity: 0;filter:alpha(opacity=0);}
		
		.ativo {opacity: 1!important; filter:alpha(opacity=100)!important;}
		
		/*controladores*/
		span {background: #0190EE; cursor: pointer; opacity: 0;filter:alpha(opacity=0); position: absolute; bottom: 40%; width: 43px; height: 43px; z-index: 5;}
				.next {right: 10px;}
				.next:before,.next:after {left: 21px;}
				.next:before {
					-webkit-transform: rotate(-42deg);
					top: 5px;
				}
				
		.next:after {
					-webkit-transform: rotate(-132deg);
					top: 19px;
				}
				
		.next:before,.next:after,.prev:before,.prev:after {content: "";
					height: 20px;
					background: #fff;
					width: 1px;
					position: absolute;
				}

		.prev {left: 10px;}
		
		.prev:before,.prev:after {left: 18px;}
				
		.prev:before {
					-webkit-transform: rotate(42deg);
					top: 5px;
				}
				
		.prev:after {
					-webkit-transform: rotate(132deg);
					top: 19px;
				}


		figure:hover span {opacity: 0.76;filter:alpha(opacity=76);}

		figure {
			
					max-width: 400px;
					height: 250px;
					position: relative;
					overflow: hidden;
					/*margin: 0px auto;*//*Deixa centralizado*/
					margin: 0px 0px 0px 0px;
					background-image:url(../imagens/tv.png);
					background-size: 400px 250px;
		 			background-repeat: no-repeat;

			
				}

		figcaption {padding-left: 20px;color: #fff; font-family: "Kaushan Script","Lato","arial"; font-size: 22px; background: rgba(1, 144, 238, 0.76); width: 100%; top: 169px; position: absolute; bottom: 0; left: 0; line-height: 55px; height: 55px; z-index: 5}



		/*SlideShow Imagens - Fim*/


		/*Flutuar tv*/

		#formulario {
			margin: -240px 10px 10px 490px;
		}
/*teste*/
#send, .loading {
    margin: 10px auto;
    width: 40%;
}

.loading > img {
    max-width: 1500px
}

.loading {
    visibility: hidden
}

/* teste*/
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

	<!-- JavaScript -->
	<script type="text/javascript">
		$(function(){
    
    var loading = $('.loading');
    
    // Supondo que seja o evento de submit
    $('#send').on('click', function(){
        
        $.ajax({
            url: 'http://pt.stackoverflow.com/',
            data: {stack:'overflow'},
            beforeSend: function(){
                loading.css('visibility', 'visible'); // exibe o div
					sleep(1000);
            },
            complete: function(){
                loading.css('visibility', 'hidden'); // esconde o div
						//sleep(1000);
            }
        });
    });
});
	</script>



		<!--SlideShow Imagens - Fim -->
	</head>
	
	<body>
		

	
		<header class="container" >
			<!-- Conteúdo do cabeçalho -->
			<h1><img src="../imagens/sga.png" alt="SECI" height=100px width=200px></h1>
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

		<section id="main">
			<!-- Conteúdo principal -->
			<!--<img src="./tv.png" >-->
			
			<div id="container">
			<!--SlideShow Imagens - Inicio -->
			<figure >
				<span class="trs next"></span>
				<span class="trs prev"></span>
				<div id="slider">
					<a href="#" class="trs"><img src="./uploads/img1.jpg" alt="Aviso 1" height=208px width=383px style="margin:8px"></a>
					<a href="#" class="trs"><img src="./uploads/img2.jpg" alt="Aviso 2" height=208px width=383px style="margin:8px" ></a>
				<a href="#" class="trs"><img src="./uploads/img3.jpg"alt="Aviso 3" height=208px width=383px style="margin:8px" ></a>
						<!--<a href="#" class="trs"><img src="./uploads/transition.gif"alt="Aviso 3" height=208px width=433px style="margin:8px" ></a>-->
					<a href="#" class="trs"><img src="./uploads/img4.jpg"  alt="Aviso 4" height=208px width=383px style="margin:8px"></a>

						<!--Novo-->
					<a href="#" class="trs"><img src="./uploads/img5.jpg"  alt="Aviso 5 " height=208px width=383px style="margin:8px"></a>
					<a href="#" class="trs"><img src="./uploads/img6.jpg"  alt="Aviso 6" height=208px width=383px style="margin:8px"></a>

				</div>
				<figcaption></figcaption>
			</figure>
		
			<div id="formulario">

			<h4>Modificar Avisos</h4>
				<form action="enviar.php" method="POST" enctype="multipart/form-data">
					Aviso 1: <input type="file" name="fileUpload1"><input type="hidden" name="nomeImg1" value="img1"><br>
					Aviso 2: <input type="file" name="fileUpload2"><input type="hidden" name="nomeImg2" value="img2"><br>
					Aviso 3: <input type="file" name="fileUpload3"><input type="hidden" name="nomeImg3" value="img3"><br>
					Aviso 4: <input type="file" name="fileUpload4"><input type="hidden" name="nomeImg4" value="img4"><br>

					<!--novo-->
					Aviso 5: <input type="file" name="fileUpload5"><input type="hidden" name="nomeImg5" value="img5"><br>
					Aviso 6: <input type="file" name="fileUpload6"><input type="hidden" name="nomeImg6" value="img6"><br>
					<input type="submit" style="width:150;height:30" id="send" value="Enviar">
					<!--Teste botao atualizar --> <input type="submit" style="width:150;height:30" id="send" value="Atualizar">
				</form>
			</div>
			</div>
		</section>
		
		<section id="destaques">
			<div class='loading'>
    			<center><img src='./aguarde2.gif' alt=''/></center>
			</div>
		</section>


		<footer id="footer">

     <center>
© Copyright 2017 DEPPI - Departamento de Extensão, Pesquisa, Pós-graduação e Inovação
				
		</center>
			</div>
		</footer>	
	</body>
</html>


