<?php
	session_start();
        if (!isset($_SESSION['user_logged_in'])) {

           header('location:../index_login.php');
            exit();
        }
?>



<html>
	<head>
		<title>SGA - Sistema Gerenciador de Avisos</title>
		<meta charset="UTF-8">
		<!-- galeria -->
		 <meta charset="utf-8">
        <title>jQuery lightGallery demo</title>
        <link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
		<!-- galeria -->
	</head>
	
	<style type="text/css">

/*galeria */

				/* margen*/
				.margin_test{
					margin-left: 160px; 
					margin-top: 30px;
				}
				/* margen*/

            .demo-gallery > ul {
                margin-bottom: 0;
            }
            .demo-gallery > ul > li {
                float: left;
                margin-bottom: 15px;
                margin-right: 20px;
                width: 200px;
					height: 100px;
            }
            .demo-gallery > ul > li a {
                border: 3px solid #FFF;
                border-radius: 3px;
                display: block;
                overflow: hidden;
                position: relative;
                float: left;
            }
            .demo-gallery > ul > li a > img {
                -webkit-transition: -webkit-transform 0.15s ease 0s;
                -moz-transition: -moz-transform 0.15s ease 0s;
                -o-transition: -o-transform 0.15s ease 0s;
                transition: transform 0.15s ease 0s;
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
                height: 100%;
                width: 100%;
            }
            .demo-gallery > ul > li a:hover > img {
                -webkit-transform: scale3d(1.1, 1.1, 1.1);
                transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
                opacity: 1;
            }
            .demo-gallery > ul > li a .demo-gallery-poster {
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
            .demo-gallery > ul > li a .demo-gallery-poster > img {
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
            .demo-gallery > ul > li a:hover .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .justified-gallery > a > img {
                -webkit-transition: -webkit-transform 0.15s ease 0s;
                -moz-transition: -moz-transform 0.15s ease 0s;
                -o-transition: -o-transform 0.15s ease 0s;
                transition: transform 0.15s ease 0s;
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
                height: 100%;
                width: 100%;
            }
            .demo-gallery .justified-gallery > a:hover > img {
                -webkit-transform: scale3d(1.1, 1.1, 1.1);
                transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
                opacity: 1;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster {
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
            .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
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
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .video .demo-gallery-poster img {
                height: 48px;
                margin-left: -24px;
                margin-top: -24px;
                opacity: 0.8;
                width: 48px;
            }
            .demo-gallery.dark > ul > li a {
                border: 3px solid #04070a;
            }
            .home .demo-gallery {
                padding-bottom: 80px;
            }
/*galeria */
		
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
		<section class="margin_test">
			<div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
					 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="galeria_avisos/img5.jpg 375, galeria_avisos/img5.jpg 480, galeria_avisos/img5.jpg 800" data-src="galeria_avisos/img5.jpg" data-sub-html="<h4>aviso</h4><p>aviso</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                    <a href="">
                        <img class="img-responsive" src="galeria_avisos/img5.jpg" alt="Thumb-1">
                    </a>
                </li>

<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="galeria_avisos/img6.jpg 375, galeria_avisos/img6.jpg 480, galeria_avisos/img6.jpg 800" data-src="galeria_avisos/img6.jpg" data-sub-html="<h4>aviso</h4><p>aviso</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                    <a href="">
                        <img class="img-responsive" src="galeria_avisos/img6.jpg" alt="Thumb-1">
                    </a>
                </li>

	<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="galeria_avisos/img7.jpg 375, galeria_avisos/img7.jpg 480, galeria_avisos/img7.jpg 800" data-src="galeria_avisos/img7.jpg" data-sub-html="<h4>aviso</h4><p>aviso</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                    <a href="">
                        <img class="img-responsive" src="galeria_avisos/img7.jpg" alt="Thumb-1">
                    </a>
                </li>

<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="galeria_avisos/img8.jpg 375, galeria_avisos/img8.jpg 480, galeria_avisos/img8.jpg 800" data-src="galeria_avisos/img8.jpg" data-sub-html="<h4>aviso</h4><p>aviso</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                    <a href="">
                        <img class="img-responsive" src="galeria_avisos/img8.jpg" alt="Thumb-1">
                    </a>
                </li>

                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="galeria_avisos/img1.jpg 375, galeria_avisos/img1.jpg 480, galeria_avisos/img1.jpg 800" data-src="galeria_avisos/img1.jpg" data-sub-html="<h4>aviso</h4><p>aviso</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                    <a href="">
                        <img class="img-responsive" src="galeria_avisos/img1.jpg" alt="Thumb-1">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="galeria_avisos/img2.jpg 375, galeria_avisos/img2.jpg 480, galeria_avisos/img2.jpg 800" data-src="galeria_avisos/img2.jpg" data-sub-html="<h4>aviso</h4><p>aviso</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                    <a href="">
                        <img class="img-responsive" src="galeria_avisos/img2.jpg" alt="Thumb-2">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="galeria_avisos/img3.jpg 375, galeria_avisos/img3.jpg 480, galeria_avisos/img3.jpg 800" data-src="galeria_avisos/img3.jpg" data-sub-html="<h4>aviso</h4><p>aviso</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                    <a href="">
                        <img class="img-responsive" src="galeria_avisos/img3.jpg" alt="Thumb-3">
                    </a>
                </li>
					 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="galeria_avisos/img4.jpg 375, galeria_avisos/img4.jpg 480, galeria_avisos/img4.jpg 800" data-src="galeria_avisos/img4.jpg" data-sub-html="<h4>aviso</h4><p>aviso</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                    <a href="">
                        <img class="img-responsive" src="galeria_avisos/img4.jpg" alt="Thumb-3">
                    </a>
                </li>
              
            </ul>
        </div>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
        <script>
            lightGallery(document.getElementById('lightgallery'));
        </script>
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
