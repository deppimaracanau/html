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
        var info = "<?php print $_COOKIE['qtd_bolsa_extensao']; ?>"; $("#bol").val(info);
        var info = "<?php print $_COOKIE['qtd_voluntarios']; ?>"; $("#vol").val(info);

        var info = "<?php print $_COOKIE['qtd_professores']; ?>"; $("#professores").val(info);
        professoresMostrar();
        var info = "<?php print $_COOKIE['professor1']; ?>"; $("#professor1").val(info);
        var info = "<?php print $_COOKIE['lattesProf1']; ?>"; $("#lattesProf1").val(info);
        var info = "<?php print $_COOKIE['professor2']; ?>"; $("#professor2").val(info);
        var info = "<?php print $_COOKIE['lattesProf2']; ?>"; $("#lattesProf2").val(info);
        var info = "<?php print $_COOKIE['professor3']; ?>"; $("#professor3").val(info);
        var info = "<?php print $_COOKIE['lattesProf3']; ?>"; $("#lattesProf3").val(info);
        var info = "<?php print $_COOKIE['professor4']; ?>"; $("#professor4").val(info);
        var info = "<?php print $_COOKIE['lattesProf4']; ?>"; $("#lattesProf4").val(info);
        var info = "<?php print $_COOKIE['professor5']; ?>"; $("#professor5").val(info);
        var info = "<?php print $_COOKIE['lattesProf5']; ?>"; $("#lattesProf5").val(info);

        var info = "<?php print $_COOKIE['qtd_disciplinas']; ?>"; $("#dis").val(info);

        var info = "<?php print $_COOKIE['qtd_cursos']; ?>"; $("#cursos").val(info);
        cursosMostrar();
        var info = "<?php print $_COOKIE['curso1']; ?>"; $("#curso1").val(info);
        var info = "<?php print $_COOKIE['curso2']; ?>"; $("#curso2").val(info);
        var info = "<?php print $_COOKIE['curso3']; ?>"; $("#curso3").val(info);
        var info = "<?php print $_COOKIE['curso4']; ?>"; $("#curso4").val(info);
        var info = "<?php print $_COOKIE['curso5']; ?>"; $("#curso5").val(info);

        var info = "<?php print $_COOKIE['tcc']; ?>"; $("#tcc").val(info);

        var info = "<?php print $_COOKIE['tecnologias']; ?>"; $("#tecnologias").val(info);
        tecnologiasMostrar();
        var info = "<?php print $_COOKIE['desc_produto']; ?>"; $("#descricaoTecnologias").val(info);

        var info = "<?php print $_COOKIE['servicosTec']; ?>"; $("#servicosTec").val(info);
        servicosTecMostrar();
        var info = "<?php print $_COOKIE['descricaoServicos']; ?>"; $("#descricaoServicos").val(info);
      }

      function form2() {
        if(document.all['bolsistas'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['bolsistas'].focus();
          return false;
        }
        if(document.all['voluntarios'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['voluntarios'].focus();
          return false;
        }
        if(document.all['professores'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['professores'].focus();
          return false;
        }
        for (var i = 1; i <= document.all['professores'].value; i++) {
            if(document.all['professor'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['professor'+i].focus();
              return false;
            }
            if(document.all['lattesProf'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['lattesProf'+i].focus();
              return false;
            }
        }
        if(document.all['disciplinas'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['disciplinas'].focus();
          return false;
        }
        if(document.all['cursos'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['cursos'].focus();
          return false;
        }
        for (var i = 1; i <= document.all['cursos'].value; i++) {
            if(document.all['curso'+i].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['curso'+i].focus();
              return false;
            }
        }
        if(document.all['tcc'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['tcc'].focus();
          return false;
        }
        if(document.all['tecnologias'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['tecnologias'].focus();
          return false;
        }
        if(document.all['descricao'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['descricao'].focus();
          return false;
        }
        if(document.all['servicosTec'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['servicosTec'].focus();
          return false;
        }
        if(document.all['descricaoServicos'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['descricaoServicos'].focus();
          return false;
        }
      }
    </script>

    <!-- ------------------- Formulário ------------------- -->
    <div class="container back-form">

      <div class="row">

        <ol class="breadcrumb progressao">
          <span style="font-weight: 700">Progressão (1 de 4): </span>
          <li class="active">Informações Gerais</li>
        </ol>
        <div class="row proga">
          <div class="col-xs-2 prog atual" style="border-radius: 0px 0px 0px 3px;"></div>
          <div class="col-xs-2 prog atual">33%</div>
          <div class="col-xs-2 prog"></div>
          <div class="col-xs-2 prog"></div>
          <div class="col-xs-2 prog"></div>
          <div class="col-xs-2 prog"></div>
        </div>
        
        <form class="formulario" onsubmit="return form2();" method="post" action="../bd/dados_form2.php">

          <!-- ----------- Formulário: Parte 5 ----------- -->
          <div class="row">
            <div class="page-header"><div class="row titulo-form">Informações Gerais</div></div>
            
          <div class="row perguntas"><label for="bol">Quantos discentes atuam com bolsa de pesquisa ou extensão em seu laboratório?</label></div>
          <select class="form-control" name="bolsistas" id="bol">
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
          <br>

          <div class="row perguntas"><label for="vol">Quantos discentes atuam como voluntário em seu laboratório?</label></br></div>
          <select class="form-control" name="voluntarios" id="vol">
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
          <br>     


          <div class="row perguntas"><label for="professores">Quantos outros professores auxiliam nas atividades do laboratório?</label></div>
          <select class="form-control" onchange="professoresMostrar()" name="professores" id="professores">
                <option  disabled selected value="">Selecione</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
          </select>
          </br>
          <div id="p2"></div>

          <script type="text/javascript">
            function professoresMostrar() {
              var opcao = $("#professores option:selected").val();
              $('div#r2').remove();
              var n = 1;
              for(var k = 1; k <= opcao; k++){
                var opcoes = '<div id="r2" class="row form-group"><div class="col-sm-6"><label>'+n+') Nome:</label><input type="text" class="form-control" name="professor'+n+'" id="professor'+n+'"/> </div><div class="col-sm-6"><label>Lattes:</label><input type="url" class="form-control" maxlength="200" name="lattesProf'+n+'" id="lattesProf'+n+'"/></div></div>';
                $('#p2').append(opcoes);
                n++;
              }
            }
            
          </script>



            <div class="row perguntas"><label for="dis">Quantas disciplinas são parcialmente ou totalmente ministradas em seu laboratório?</label></div>
            <select class="form-control" name="disciplinas" id="dis">
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
            </select>
            </br>

            <div class="row perguntas"><label for="dis">Quantos e quais cursos são atendidos pelo laboratório?</label></div>
            <select class="form-control" onchange="cursosMostrar()" name="cursos" id="cursos">
                  <option  disabled selected value="">Selecione</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
            </select>
            </br>
            <div id="p1"></div>

            <script type="text/javascript">
              function cursosMostrar() {
                var opcao = $("#cursos option:selected").val();
                $('div#r1').remove();
                var n = 1;
                for(var k = 1; k <= opcao; k++){
                  var opcoes = '<div id="r1" class="row form-group"><label>'+n+') Curso:</label><select class="form-control" name="curso'+n+'" id="curso'+n+'"><option  disabled selected value="">Selecione</option><option value="Ciência da Computação">Ciência da Computação</option><option value="Engenharia Ambiental e Sanitária">Engenharia Ambiental e Sanitária</option><option value="Engenharia de Controle e Automação">Engenharia de Controle e Automação</option><option value="Engenharia Mecânica">Engenharia Mecânica</option><option value="Licenciatura em Química">Licenciatura em Química</option><option value="Técnico em Automação Industrial">Técnico em Automação Industrial</option><option value="Técnico em Meio Ambiente">Técnico em Meio Ambiente</option><option value="Técnico em Informática">Técnico em Informática</option><option value="Técnico em Redes">Técnico em Redes</option></select></div></div>';
                  $('#p1').append(opcoes);
                  n++;
                }
              }   
            </script>

            <div class="row perguntas"><label>Número de TCC desenvolvidos no período entre 2015 e 2018?</label></div>
            <select class="form-control" name="tcc" id="tcc">
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
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="+20">+20</option>
            </select> </br>

            <div class="row perguntas"><label>Existem tecnologias desenvolvidas em seu laboratório com potencial de transferência tecnológica?</label></div>
              <select class="form-control" onchange="tecnologiasMostrar()" name="tecnologias" id="tecnologias">
                  <option  disabled selected value="">Selecione</option>
                  <option value="0">Não</option>
                  <option value="1">Sim</option>
              </select>
              </br>
            <div id="p3"></div>

            <script type="text/javascript">
              function tecnologiasMostrar() {
                var opcao = $("#tecnologias option:selected").val();
                $('div#tec1').remove();
                for(var k = 1; k <= opcao; k++){
                  var opcoes = '<div id="tec1" class="form-group"><label for="descricaoTecnologias">Descrição:</label><textarea maxlength="400" class="form-control" rows="4" id="descricaoTecnologias" name="descricao"></textarea></div>';
                  $('#p3').append(opcoes);
                }
              }
            </script>

            <div class="row perguntas"><label>O laboratório tem interesse em realizar prestação de serviços tecnológicos?</label></div>
              <select class="form-control" onchange="servicosTecMostrar()" name="servicosTec" id="servicosTec">
                  <option  disabled selected value="">Selecione</option>
                  <option value="0">Não</option>
                  <option value="1">Sim</option>
              </select>
              </br>
            <div id="p4"></div>

            <script type="text/javascript">
                function servicosTecMostrar() {
                  var opcao = $("#servicosTec option:selected").val();
                  $('div#tec2').remove();
                  for(var k = 1; k <= opcao; k++){
                    var opcoes = '<div id="tec2" class="form-group"><label for="descricaoServicos">Descrição:</label><textarea maxlength="400" class="form-control" rows="4" id="descricaoServicos" name="descricaoServicos"></textarea></div>';
                    $('#p4').append(opcoes);
                  }
                }
            </script>

           <!-- <a href="F5.html" class="btn btn-default">Próximo</a>-->
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
