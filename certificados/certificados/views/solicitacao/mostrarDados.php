<?php

include("../../models/login/autenticacao.php");

$codigo = $_GET['cod'];

?>


<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate, Post-Check=0, Pre-Check=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta http-equiv="expires" content="0">
  <meta http-equiv="pragma" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Solicitação de Certificados</title>

  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="../../libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" type="text/css" href="../../libs/bootstrap/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../js/home.js"></script> 
  <script src="//cdn.ckeditor.com/4.11.1/basic/ckeditor.js"></script> <!-- Ckeditor -->
  <script src="../js/jquery.js"></script> <!-- Adaptador Ckeditor -->
  <script src="../../libs/bootstrap/js/bootstrap.min.js"></script>
  
  

</head>

<body>

  <!--Área da Navbar-->
  <nav class="navbar navbar-default">

    <div class="container">

      <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand font_text_simples">GERADOR DE CERTIFICADOS</a>
      </div>

      <div id="navbar" class="collapse navbar-collapse ">
        <ul class="nav navbar-nav navbar-right">
          <li><a><?php echo "<b>Olá, " . strtoupper($_SESSION['nome']) . "</b>" ?></a></li>
          <li><a href="../evento/evento.php">EVENTOS</a></li>
          <li><a href="../home/home.php">HOME</a></li>
          <li><a href='../../models/login/logout.php' class="nav-link" title="Clique para encerrar sessão">Encerrar Sessão</a></li>
        </ul>
      </div>

    </div>

  </nav>
  <!--Fim da Navbar-->

  <div class="container">


    <div class="col-xs-10 col-sm-10 col-md-10 card ContainerP">
      <!-- container é do bootstrap -->


      <h2>Solicitações</h2>
      <div class="row">
        <div class="col-md-12" id="solicitCert">


        </div>
      </div>



    </div>

  </div>

</body>

<script type="text/javascript">

  // function selecionaCert(n) {
  //   window.location.href = 'http://' + window.location.hostname + "/certificados/models/carregaSolicitacao.php" + '?id=' + n;
  // }
</script>


</html>