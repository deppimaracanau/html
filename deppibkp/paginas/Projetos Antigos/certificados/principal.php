<?php
session_start();
if (! isset($_SESSION['user_logged_in'])) { //não permite usuário padrão acessar essa página
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
  </header>
    <div class="container">
      <!-- container é do bootstrap -->
          
         <form method="post" action="./gerar_certificados.php">
            Certificamos que 
            <textarea rows="10" cols="150" name="texto"></textarea><br>
            Lista de Nomes
            <textarea rows="10" cols="150" name="nomes"></textarea>

            <button type="submit">Gerar Certificado</button>
          </form>
      </div>
</body>
</html>