<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formulário de Atividades de Extensão, Pesquisa e Inovação</title>

    <link rel="icon" href="../favicon.ico">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/BodyForm.css" rel="stylesheet">

    <script language="javascript" src="../js/javascript.js"></script>
    <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
  </head>
  
  <body onload="resgatarCookie()">
    <!-- ------------------- Barra de Navegação ------------------- -->
    <nav class="navbar navbar-default navbar-fixed-top barra">
      <div class="container">
        
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" 
                  data-toggle="collapse" data-target="#barra-navegacao">
            <span class="sr-only">Alternar Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="../index.html" class="navbar-brand"><span class="logo">IFCE</span></a>
        </div>

        <div class="collapse navbar-collapse" id="barra-navegacao">
          <ul class="nav navbar-nav navbar-right">
            <li> <a href="#">Informações Gerais</a> </li>
            <li> <a href="#">Publicações</a> </li>
            <li> <a href="#">Pesquisa</a> </li>
            <li> <a href="#">Extensão</a> </li>
          </ul>
        </div>
      </div>
    </nav>

    <script type="text/javascript">
      function resgatarCookie(){
        var info = "<?php print $_COOKIE['publicacoes1']; ?>"; $("#publicacoes1").val(info);
        var info = "<?php print $_COOKIE['publicacoes2']; ?>"; $("#publicacoes2").val(info);
      }
      function form3() {
        if(document.all['publicacoes1'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['publicacoes1'].focus();
          return false;
        }
        if(document.all['publicacoes2'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['publicacoes2'].focus();
          return false;
        } 
      }
    </script>

    <!-- ------------------- Formulário ------------------- -->
   	<div class="container back-form">

   		<div class="row">
        <ol class="breadcrumb progressao">
          <span style="font-weight: 700">Progressão (2 de 4): </span>
          <li class="active">Informações Gerais</li>
          <li class="active">Publicações</li>
        </ol>

        <div class="row proga">
          <div class="col-xs-2 prog atual" style="border-radius: 0px 0px 0px 3px;"></div>
          <div class="col-xs-2 prog atual"></div>
          <div class="col-xs-2 prog atual">50%</div>
          <div class="col-xs-2 prog"></div>
          <div class="col-xs-2 prog"></div>
          <div class="col-xs-2 prog"></div>
        </div>
        
 				<form class="formulario" onsubmit="return form3();" method="post" action="../bd/dados_form3.php">

          <!-- ----------- Formulário: Parte 3 ----------- -->
          <div class="row">
            <div class="page-header"><div class="row titulo-form">Publicações</div></div>

              <div class="row perguntas"><label>Quantas publicações em periódicos científicos com Qualis A ou B foram realizadas entre 2015 e 2018?</label></div>
              <select class="form-control" name="publicacoes1" id="publicacoes1" >
                  <option  disabled selected value="">Selecione</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">+10</option>
              </select>
              </br>

              <div class="row perguntas"><label>Quantas publicações em congressos apoiados por sociedades científicas foram realizadas entre 2015 e 2018?</label></div>
              <select class="form-control" name="publicacoes2" id="publicacoes2" >
                  <option  disabled selected value="">Selecione</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">+10</option>
              </select>
              </br>
              
            <!--<a href="F4.html" class="btn btn-default">Próximo</a>-->
            <button type="submit" class="btn btn-default botao2">PRÓXIMO</button>

          </div>

 				</form>
   		</div>
   	</div> 

    <!-- ------------------- Rodapé ------------------- -->
    <footer class="rodape" style="margin-top: 30px">
      <div class="container">
        <div class="row">
          <h5>DEPPI - Departamento de Extensão, Pesquisa, Pós-Graduação e Inovação</h5>
        </div>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
