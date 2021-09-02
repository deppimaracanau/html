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
        var info = "<?php print $_COOKIE['extensao1']; ?>"; $("#extensao1").val(info);
        extensaoLaco1();
        var info = "<?php print $_COOKIE['titulo511']; ?>"; $("#titulo511").val(info);
        var info = "<?php print $_COOKIE['fomentoCond51']; ?>"; $("#fomento51").val(info);
        qual("<?php print $_COOKIE['fomentoCond51']; ?>",1);
        var info = "<?php print $_COOKIE['outroFomento51']; ?>"; $("#outroFomento51").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico511']; ?>"; $("#alunosTecnico511").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao511']; ?>"; $("#alunosGraduacao511").val(info);
        var info = "<?php print $_COOKIE['alunosPos511']; ?>"; $("#alunosPos511").val(info);

        var info = "<?php print $_COOKIE['titulo512']; ?>"; $("#titulo512").val(info);
        var info = "<?php print $_COOKIE['fomentoCond52']; ?>"; $("#fomento52").val(info);
        qual("<?php print $_COOKIE['fomentoCond52']; ?>",2);
        var info = "<?php print $_COOKIE['outroFomento52']; ?>"; $("#outroFomento52").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico512']; ?>"; $("#alunosTecnico512").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao512']; ?>"; $("#alunosGraduacao512").val(info);
        var info = "<?php print $_COOKIE['alunosPos512']; ?>"; $("#alunosPos512").val(info);

        var info = "<?php print $_COOKIE['titulo513']; ?>"; $("#titulo513").val(info);
        var info = "<?php print $_COOKIE['fomentoCond53']; ?>"; $("#fomento53").val(info);
        qual("<?php print $_COOKIE['fomentoCond53']; ?>",3);
        var info = "<?php print $_COOKIE['outroFomento53']; ?>"; $("#outroFomento53").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico513']; ?>"; $("#alunosTecnico513").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao513']; ?>"; $("#alunosGraduacao513").val(info);
        var info = "<?php print $_COOKIE['alunosPos513']; ?>"; $("#alunosPos513").val(info);

        var info = "<?php print $_COOKIE['titulo514']; ?>"; $("#titulo514").val(info);
        var info = "<?php print $_COOKIE['fomentoCond54']; ?>"; $("#fomento54").val(info);
        qual("<?php print $_COOKIE['fomentoCond54']; ?>",4);
        var info = "<?php print $_COOKIE['outroFomento54']; ?>"; $("#outroFomento54").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico514']; ?>"; $("#alunosTecnico514").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao514']; ?>"; $("#alunosGraduacao514").val(info);
        var info = "<?php print $_COOKIE['alunosPos514']; ?>"; $("#alunosPos514").val(info);

        var info = "<?php print $_COOKIE['titulo515']; ?>"; $("#titulo515").val(info);
        var info = "<?php print $_COOKIE['fomentoCond55']; ?>"; $("#fomento55").val(info);
        qual("<?php print $_COOKIE['fomentoCond55']; ?>",5);
        var info = "<?php print $_COOKIE['outroFomento55']; ?>"; $("#outroFomento55").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico515']; ?>"; $("#alunosTecnico515").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao515']; ?>"; $("#alunosGraduacao515").val(info);
        var info = "<?php print $_COOKIE['alunosPos515']; ?>"; $("#alunosPos515").val(info);

        var info = "<?php print $_COOKIE['extensao2']; ?>"; $("#extensao2").val(info); 
        extensaoLaco2();
        var info = "<?php print $_COOKIE['titulo521']; ?>"; $("#titulo521").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico521']; ?>"; $("#alunosTecnico521").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao521']; ?>"; $("#alunosGraduacao521").val(info);
        var info = "<?php print $_COOKIE['alunosPos521']; ?>"; $("#alunosPos521").val(info);

        var info = "<?php print $_COOKIE['titulo522']; ?>"; $("#titulo522").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico522']; ?>"; $("#alunosTecnico522").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao522']; ?>"; $("#alunosGraduacao522").val(info);
        var info = "<?php print $_COOKIE['alunosPos522']; ?>"; $("#alunosPos522").val(info);

        var info = "<?php print $_COOKIE['titulo523']; ?>"; $("#titulo523").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico523']; ?>"; $("#alunosTecnico523").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao523']; ?>"; $("#alunosGraduacao523").val(info);
        var info = "<?php print $_COOKIE['alunosPos523']; ?>"; $("#alunosPos523").val(info);

        var info = "<?php print $_COOKIE['titulo524']; ?>"; $("#titulo524").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico524']; ?>"; $("#alunosTecnico524").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao524']; ?>"; $("#alunosGraduacao524").val(info);
        var info = "<?php print $_COOKIE['alunosPos524']; ?>"; $("#alunosPos524").val(info);

        var info = "<?php print $_COOKIE['titulo525']; ?>"; $("#titulo525").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico525']; ?>"; $("#alunosTecnico525").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao525']; ?>"; $("#alunosGraduacao525").val(info);
        var info = "<?php print $_COOKIE['alunosPos525']; ?>"; $("#alunosPos525").val(info);
      }
      function form5() {
        if(document.all['extensao1'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['extensao1'].focus();
          return false;
        }
        var limite = document.all['extensao1'].value;
        if(limite>5) limite = 5;
        for (var i = 1; i <= limite; i++) {
            if(document.all['titulo51'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['titulo51'+i].focus();
              return false;
            }
            if(document.all['alunosTecnico51'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosTecnico51'+i].focus();
              return false;
            }
            if(document.all['alunosGraduacao51'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosGraduacao51'+i].focus();
              return false;
            }
            if(document.all['alunosPos51'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosPos51'+i].focus();
              return false;
            }
            if(document.all['fomento5'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['fomento5'+i].focus();
              return false;
            }
            if(document.all['fomento5'+i].value == 1) {
                if(document.all['outroFomento5'+i].value == "") {
                  alert('Por favor, preencha todos os campos!');
                  document.all['outroFomento5'+i].focus();
                  return false;
                }
            }
        }
        if(document.all['extensao2'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['extensao2'].focus();
          return false;
        }
        var limite = document.all['extensao2'].value;
        if(limite>5) limite = 5;
        for (var i = 1; i <= limite; i++) {
            if(document.all['titulo52'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['titulo52'+i].focus();
              return false;
            }
            if(document.all['alunosTecnico52'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosTecnico52'+i].focus();
              return false;
            }
            if(document.all['alunosGraduacao52'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosGraduacao52'+i].focus();
              return false;
            }
            if(document.all['alunosPos52'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosPos52'+i].focus();
              return false;
            }
        }
      }
    </script>

    <!-- ------------------- Formulário ------------------- -->
    <div class="container  back-form">

      <div class="row">

        <ol class="breadcrumb progressao">
          <span style="font-weight: 700">Progressão (4 de 4): </span>
          <li class="active">Informações Gerais</li>
          <li class="active">Publicações</li>
          <li class="active">Pesquisa</li>
          <li class="active">Projetos de Extensão</li>
        </ol>
        <div class="row proga">
          <div class="col-xs-2 prog atual" style="border-radius: 0px 0px 0px 3px;"></div>
          <div class="col-xs-2 prog atual"></div>
          <div class="col-xs-2 prog atual"></div>
          <div class="col-xs-2 prog atual"></div>
          <div class="col-xs-2 prog atual">84%</div>
          <div class="col-xs-2 prog"></div>
        </div>
        
        <form class="formulario" onsubmit="return form5();" method="post" action="../bd/dados_form5.php">

          <!-- ----------- Formulário: Parte 5 ----------- -->
          <div class="row">
            <div class="page-header"><div class="row titulo-form">Projetos de Extensão</h1></div></div>

              <div class="row perguntas"><label for="extensao1">Quantos projetos de extensão com fomento foram desenvolvidos no período entre 2015 e 2018?</label></div>
              <select class="form-control" onchange="extensaoLaco1()" name="extensao1" id="extensao1">
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
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">+15</option>
              </select>
              </br>
              <div id="p1"></div>

              <script type="text/javascript">
                function extensaoLaco1() {
                  var opcao = $("#extensao1 option:selected").val();
                  $('div#r1').remove();
                  $('div#sp1').remove();
                  var n = 1;
                  if (opcao>5){
                    opcao = 5;
                    var mais = '<div class="alert alert-info" id="sp1" style="font-size: 13px; margin: 0px 20px 20px 20px;"><button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button><strong>*Descreva somente os cinco principais.</strong></div>';
                    $('#p1').append(mais);
                  }
                  for(var k = 1; k <= opcao; k++){
                    var opcoes = '<div id="r1" class="form-group"><label>'+n+') Título:</label><input type="text" class="form-control" name="titulo51'+n+'" id="titulo51'+n+'" maxlenght="200">    <div class="row"><div class="col-sm-4"><label>Quant. de alunos do técnico:</label><select class="form-control" name="alunosTecnico51'+n+'" id="alunosTecnico51'+n+'"><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div><div class="col-sm-4"><label>Quant. de alunos graduação:</label><select class="form-control" name="alunosGraduacao51'+n+'" id="alunosGraduacao51'+n+'"><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div><div class="col-sm-4"><label>Quant. de alunos da pós-graduação:</label><select class="form-control" name="alunosPos51'+n+'" id="alunosPos51'+n+'"><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div></div><div class="row"><div class="col-xs-12"><label>Fonte do fomento:</label><select class="form-control" name="fomento5'+n+'" id="fomento5'+n+'" onchange="qual(this.value,'+n+')"><option  disabled selected value="">Selecione</option><option value="IFCE">IFCE</option><option value="FUNCAP">FUNCAP</option><option value="CAPES">CAPES</option><option value="CNPq">CNPq</option><option value="1">Outro</option></select></div></div><div class="row"><div class="col-xs-12"><div id="Q'+n+'"></div></div></div>';
                    $('#p1').append(opcoes);
                    n++;
                  }
                }

                function qual(cond,n){
                  switch(n){
                    case 1:
                      $('div#Qq1').remove(); break;
                    case 2:
                      $('div#Qq2').remove(); break;
                    case 3:
                      $('div#Qq3').remove(); break;
                    case 4:
                      $('div#Qq4').remove(); break;
                    case 5:
                      $('div#Qq5').remove(); break;
                  }

                  if(cond == 1){
                    var qual= '<div id="Qq'+n+'">Informe o fomento:<input type="text" class="form-control" name="outroFomento5'+n+'" id="outroFomento5'+n+'"></div>';
                    switch(n){
                      case 1:
                        $('#Q1').append(qual); break;
                      case 2:
                        $('#Q2').append(qual); break;
                      case 3:
                        $('#Q3').append(qual); break;
                      case 4:
                        $('#Q4').append(qual); break;
                      case 5:
                        $('#Q5').append(qual); break;
                    }
                  }  
                }

              </script>

            <div class="row perguntas"><label for="extensao2">Quantos projetos de extensão sem fomento foram desenvolvidos no período entre 2015 e 2018?</label></div>
            <select class="form-control" onchange="extensaoLaco2()" name="extensao2" id="extensao2">
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
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">+15</option>
            </select> </br>
            <div id="p2"></div>

              <script type="text/javascript">
                function extensaoLaco2() {
                  var opcao = $("#extensao2 option:selected").val();
                  $('div#r2').remove();
                  $('div#sp2').remove();
                  var n = 1;
                  if (opcao>5){
                    opcao = 5;
                    var mais = '<div class="alert alert-info" id="sp2" style="font-size: 13px; margin: 0px 20px 20px 20px;"><button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button><strong>*Descreva somente os cinco principais.</strong></div>';
                    $('#p2').append(mais);
                  }
                  for(var k = 1; k <= opcao; k++){
                    var opcoes = '<div id="r2" class="form-group"><label>'+n+') Título:</label><input type="text" class="form-control" name="titulo52'+n+'" id="titulo52'+n+'" maxlenght="200"><div class="row"><div class="col-sm-4"><label>Quant. de alunos do técnico:</label><select class="form-control" name="alunosTecnico52'+n+'" id="alunosTecnico52'+n+'"><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div><div class="col-sm-4"><label>Quant. de alunos graduação:</label><select class="form-control" name="alunosGraduacao52'+n+'" id="alunosGraduacao52'+n+'"><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div><div class="col-sm-4"><label>Quant. de alunos da pós-graduação:</label><select class="form-control" name="alunosPos52'+n+'" id="alunosPos52'+n+'"><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div></div></div>';
                    $('#p2').append(opcoes);
                    n++;
                  }
                }
              </script>

            <!--<a href="../index.html" class="btn btn-default">Próximo</a>-->
            <button type="submit" class="btn btn-success botao2">ENVIAR FORMULÁRIO</button>

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