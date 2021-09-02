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
        var info = "<?php print $_COOKIE['pesquisa1']; ?>"; $("#pesquisa1").val(info);
        pesquisaLaco1();
        var info = "<?php print $_COOKIE['titulo11']; ?>"; $("#titulo11").val(info);
        var info = "<?php print $_COOKIE['fomentoCond1']; ?>"; $("#fomento1").val(info);
        qual("<?php print $_COOKIE['fomentoCond1']; ?>",1);
        var info = "<?php print $_COOKIE['outroFomento1']; ?>"; $("#outroFomento1").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico11']; ?>"; $("#alunosTecnico11").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao11']; ?>"; $("#alunosGraduacao11").val(info);
        var info = "<?php print $_COOKIE['alunosPos11']; ?>"; $("#alunosPos11").val(info);

        var info = "<?php print $_COOKIE['titulo12']; ?>"; $("#titulo12").val(info);
        var info = "<?php print $_COOKIE['fomentoCond2']; ?>"; $("#fomento2").val(info);
        qual("<?php print $_COOKIE['fomentoCond2']; ?>",2);
        var info = "<?php print $_COOKIE['outroFomento2']; ?>"; $("#outroFomento2").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico12']; ?>"; $("#alunosTecnico12").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao12']; ?>"; $("#alunosGraduacao12").val(info);
        var info = "<?php print $_COOKIE['alunosPos12']; ?>"; $("#alunosPos12").val(info);

        var info = "<?php print $_COOKIE['titulo13']; ?>"; $("#titulo13").val(info);
        var info = "<?php print $_COOKIE['fomentoCond3']; ?>"; $("#fomento3").val(info);
        qual("<?php print $_COOKIE['fomentoCond3']; ?>",3);
        var info = "<?php print $_COOKIE['outroFomento3']; ?>"; $("#outroFomento3").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico13']; ?>"; $("#alunosTecnico13").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao13']; ?>"; $("#alunosGraduacao13").val(info);
        var info = "<?php print $_COOKIE['alunosPos13']; ?>"; $("#alunosPos13").val(info);

        var info = "<?php print $_COOKIE['titulo14']; ?>"; $("#titulo14").val(info);
        var info = "<?php print $_COOKIE['fomentoCond4']; ?>"; $("#fomento4").val(info);
        qual("<?php print $_COOKIE['fomentoCond4']; ?>",4);
        var info = "<?php print $_COOKIE['outroFomento4']; ?>"; $("#outroFomento4").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico14']; ?>"; $("#alunosTecnico14").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao14']; ?>"; $("#alunosGraduacao14").val(info);
        var info = "<?php print $_COOKIE['alunosPos14']; ?>"; $("#alunosPos14").val(info);

        var info = "<?php print $_COOKIE['titulo15']; ?>"; $("#titulo15").val(info);
        var info = "<?php print $_COOKIE['fomentoCond5']; ?>"; $("#fomento5").val(info);
        qual("<?php print $_COOKIE['fomentoCond5']; ?>",5);
        var info = "<?php print $_COOKIE['outroFomento5']; ?>"; $("#outroFomento5").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico15']; ?>"; $("#alunosTecnico15").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao15']; ?>"; $("#alunosGraduacao15").val(info);
        var info = "<?php print $_COOKIE['alunosPos15']; ?>"; $("#alunosPos15").val(info);

        var info = "<?php print $_COOKIE['pesquisa2']; ?>"; $("#pesquisa2").val(info);
        pesquisaLaco2();
        var info = "<?php print $_COOKIE['titulo21']; ?>"; $("#titulo21").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico21']; ?>"; $("#alunosTecnico21").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao21']; ?>"; $("#alunosGraduacao21").val(info);
        var info = "<?php print $_COOKIE['alunosPos21']; ?>"; $("#alunosPos21").val(info);

        var info = "<?php print $_COOKIE['titulo22']; ?>"; $("#titulo22").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico22']; ?>"; $("#alunosTecnico22").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao22']; ?>"; $("#alunosGraduacao22").val(info);
        var info = "<?php print $_COOKIE['alunosPos22']; ?>"; $("#alunosPos22").val(info);

        var info = "<?php print $_COOKIE['titulo23']; ?>"; $("#titulo23").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico23']; ?>"; $("#alunosTecnico23").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao23']; ?>"; $("#alunosGraduacao23").val(info);
        var info = "<?php print $_COOKIE['alunosPos23']; ?>"; $("#alunosPos23").val(info);

        var info = "<?php print $_COOKIE['titulo24']; ?>"; $("#titulo24").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico24']; ?>"; $("#alunosTecnico24").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao24']; ?>"; $("#alunosGraduacao24").val(info);
        var info = "<?php print $_COOKIE['alunosPos24']; ?>"; $("#alunosPos24").val(info);

        var info = "<?php print $_COOKIE['titulo25']; ?>"; $("#titulo25").val(info);
        var info = "<?php print $_COOKIE['alunosTecnico25']; ?>"; $("#alunosTecnico25").val(info);
        var info = "<?php print $_COOKIE['alunosGraduacao25']; ?>"; $("#alunosGraduacao25").val(info);
        var info = "<?php print $_COOKIE['alunosPos25']; ?>"; $("#alunosPos25").val(info);
      }
      function form4() {
        if(document.all['pesquisa1'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['pesquisa1'].focus();
          return false;
        }
        var limite = document.all['pesquisa1'].value;
        if(limite>5) limite = 5;
        for (var i = 1; i <= limite; i++) {
            if(document.all['titulo1'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['titulo1'+i].focus();
              return false;
            }
            if(document.all['alunosTecnico1'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosTecnico1'+i].focus();
              return false;
            }
            if(document.all['alunosGraduacao1'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosGraduacao1'+i].focus();
              return false;
            }
            if(document.all['alunosPos1'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosPos1'+i].focus();
              return false;
            }
            if(document.all['fomento'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['fomento'+i].focus();
              return false;
            }
            if(document.all['fomento'+i].value == 1) {
                if(document.all['outroFomento'+i].value == "") {
                  alert('Por favor, preencha todos os campos!');
                  document.all['outroFomento'+i].focus();
                  return false;
                }
            }
        }
        if(document.all['pesquisa2'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['pesquisa2'].focus();
          return false;
        } 
        var limite = document.all['pesquisa2'].value;
        if(limite>5) limite = 5;
        for (var i = 1; i <= limite; i++) {
            if(document.all['titulo2'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['titulo2'+i].focus();
              return false;
            }
            if(document.all['alunosTecnico2'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosTecnico2'+i].focus();
              return false;
            }
            if(document.all['alunosGraduacao2'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosGraduacao2'+i].focus();
              return false;
            }
            if(document.all['alunosPos2'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['alunosPos2'+i].focus();
              return false;
            }
        }
      }
    </script>

    <!-- ------------------- Formulário ------------------- -->
    <div class="container back-form">

   		<div class="row">
        <ol class="breadcrumb progressao">
          <span style="font-weight: 700">Progressão (3 de 4): </span>
          <li class="active">Informações Gerais</li>
          <li class="active">Publicações</li>
          <li class="active">Pesquisa</li>
        </ol>
        
        <div class="row proga">
          <div class="col-xs-2 prog atual" style="border-radius: 0px 0px 0px 3px;"></div>
          <div class="col-xs-2 prog atual"></div>
          <div class="col-xs-2 prog atual"></div>
          <div class="col-xs-2 prog atual">66%</div>
          <div class="col-xs-2 prog"></div>
          <div class="col-xs-2 prog"></div>
        </div>
        
 				<form class="formulario" onsubmit="return form4();" method="post" action="../bd/dados_form4.php">

          <!-- ----------- Formulário: Parte 2 ----------- -->
          <div class="row">
            <div class="page-header"><div class="row titulo-form">Projetos de Pesquisa</div></div>

              <div class="row perguntas"><label for="pesquisa1">Quantos projetos de pesquisa com fomento foram desenvolvidos no período entre 2015 e 2018?</label></div>
              <select class="form-control" onchange="pesquisaLaco1()" name="pesquisa1" id="pesquisa1" >
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
                function pesquisaLaco1() {
                var opcao = $("#pesquisa1 option:selected").val();
                $('div#r1').remove();
                $('div#sp1').remove();
                var n = 1;
                if (opcao>5){
                  opcao = 5;
                  var mais = '<div class="alert alert-info" id="sp1" style="font-size: 13px; margin: 0px 20px 20px 20px;"><button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button><strong>*Descreva somente os cinco principais.</strong></div>';
                  $('#p1').append(mais);
                }
                for(var k = 1; k <= opcao; k++){
                  var opcoes = '<div id="r1" class="form-group"><label>'+n+') Título:</label><input type="text" class="form-control" name="titulo1'+n+'" id="titulo1'+n+'" maxlenght="200">    <div class="row"><div class="col-sm-4"><label>Quant. de alunos do técnico:</label><select class="form-control" name="alunosTecnico1'+n+'" id="alunosTecnico1'+n+'" ><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div><div class="col-sm-4"><label>Quant. de alunos graduação:</label><select class="form-control" name="alunosGraduacao1'+n+'" id="alunosGraduacao1'+n+'" ><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div><div class="col-sm-4"><label>Quant. de alunos da pós-graduação:</label><select class="form-control" name="alunosPos1'+n+'" id="alunosPos1'+n+'" ><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div></div><div class="row"><div class="col-xs-12"><label>Fonte do fomento:</label><select class="form-control" name="fomento'+n+'" id="fomento'+n+'" onchange="qual(this.value,'+n+')" ><option  disabled selected value="">Selecione</option><option value="IFCE">IFCE</option><option value="FUNCAP">FUNCAP</option><option value="CAPES">CAPES</option><option value="CNPq">CNPq</option><option value="1">Outro</option></select></div></div><div class="row"><div class="col-xs-12"><div id="Q'+n+'"></div></div></div>';
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
                    var qual= '<div id="Qq'+n+'">Informe o fomento:<input type="text" class="form-control" name="outroFomento'+n+'"   id="outroFomento'+n+'" ></div>';
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

              <div class="row perguntas"><label for="pesquisa2">Quantos projetos de pesquisa sem fomento foram desenvolvidos no período entre 2015 e 2018?</label></div>
              <select class="form-control" onchange="pesquisaLaco2()" name="pesquisa2" id="pesquisa2" >
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
                function pesquisaLaco2() {
                  var opcao = $("#pesquisa2 option:selected").val();
                  $('div#r2').remove();
                  $('div#sp2').remove();
                  var n = 1;
                  if (opcao>5){
                    opcao = 5;
                    var mais = '<div class="alert alert-info" id="sp2" style="font-size: 13px; margin: 0px 20px 20px 20px;"><button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button><strong>*Descreva somente os cinco principais.</strong></div>';
                    $('#p2').append(mais);
                  }
                  for(var k = 1; k <= opcao; k++){
                    var opcoes = '<div id="r2" class="form-group"><label>'+n+') Título:</label><input type="text" class="form-control" name="titulo2'+n+'" id="titulo2'+n+'" maxlenght="200"><div class="row"><div class="col-sm-4"><label>Quant. de alunos do técnico:</label><select class="form-control" name="alunosTecnico2'+n+'" id="alunosTecnico2'+n+'" ><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div><div class="col-sm-4"><label>Quant. de alunos graduação:</label><select class="form-control" name="alunosGraduacao2'+n+'" id="alunosGraduacao2'+n+'" ><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div><div class="col-sm-4"><label>Quant. de alunos da pós-graduação:</label><select class="form-control" name="alunosPos2'+n+'" id="alunosPos2'+n+'" ><option  disabled selected value="">Selecione</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div></div></div>';
                    $('#p2').append(opcoes);
                    n++;
                  }
                }
              </script>

            <!--<a href="F3.html" class="btn btn-default">Próximo</a>-->
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
