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
        var info = "<?php print $_COOKIE['nome']; ?>"; $("#nome").val(info);
        var info = "<?php print $_COOKIE['siape']; ?>"; $("#siape").val(info);
        var info = "<?php print $_COOKIE['email']; ?>"; $("#email").val(info);
        var info = "<?php print $_COOKIE['link_lattes']; ?>"; $("#lattes").val(info);

        if("<?php print $_COOKIE['eixo_tecnologico']; ?>" == "Química e Meio Ambiente")
          var info = "1";
        else if("<?php print $_COOKIE['eixo_tecnologico']; ?>" == "Computação")
          var info = "2";
        else if("<?php print $_COOKIE['eixo_tecnologico']; ?>" == "Indústria")
          var info = "3";
        $("#eixo").val(info);
        
        eixoTec();
        var info = "<?php print $_COOKIE['laboratorio']; ?>"; $("#laboratorioEixo").val(info);
        
        var info = "<?php print $_COOKIE['emailLab']; ?>"; $("#emailLab").val(info);
        var info = "<?php print $_COOKIE['telefoneLab']; ?>"; $("#telefoneLab").val(info);

        var info = "<?php print $_COOKIE['atualizacoes']; ?>"; $("#atualizacoes").val(info);
        atualiza();
        var info = "<?php print $_COOKIE['novoCoordenador']; ?>"; $("#novoCoordenador").val(info);
        var info = "<?php print $_COOKIE['novoSiape']; ?>"; $("#novoSiape").val(info);
        var info = "<?php print $_COOKIE['novoNomeLab']; ?>"; $("#novoNomeLab").val(info);
        var info = "<?php print $_COOKIE['novaSiglaLab']; ?>"; $("#novaSiglaLab").val(info);
        
        var info = "<?php print $_COOKIE['areas']; ?>"; $("#areas").val(info);
        var info = "<?php print $_COOKIE['apresentacao']; ?>"; $("#apresentacao").val(info);
      }

      function form1() {
        if(document.all['nome'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['nome'].focus();
          return false;
        }
        if(document.all['siape'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['siape'].focus();
          return false;
        }
        if(document.all['email'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['email'].focus();
          return false;
        }
        if(document.all['link_lattes'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['link_lattes'].focus();
          return false;
        }
        if(document.all['eixo'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['eixo'].focus();
          return false;
        }
        if(document.all['eixo'].value == 1) {
          if(document.all['op1'].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['op1'].focus();
              return false;
            }
        } else if(document.all['eixo'].value == 2) {
          if(document.all['op2'].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['op2'].focus();
              return false;
            }
        } else if(document.all['eixo'].value == 3) {
          if(document.all['op3'].value == "") {
              alert('Por favor, preencha todos os campos!');
              document.all['op3'].focus();
              return false;
            }
        }
        if(document.all['atualizacoes'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['atualizacoes'].focus();
          return false;
        }
        if(document.all['areas'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['areas'].focus();
          return false;
        }
        if(document.all['apresentacao'].value == "") {
          alert('Por favor, preencha todos os campos!');
          document.all['apresentacao'].focus();
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
          <div class="col-xs-2 prog atual" style="border-radius: 0px 0px 0px 3px;">16%</div>
          <div class="col-xs-2 prog"></div>
          <div class="col-xs-2 prog"></div>
          <div class="col-xs-2 prog"></div>
          <div class="col-xs-2 prog"></div>
          <div class="col-xs-2 prog"></div>
        </div>

 				<form class="formulario" onsubmit="return form1();" enctype="multipart/form-data" method="post" action="../bd/dados_form1.php">
 					
          <!-- ----------- Formulário: Parte 1 ----------- -->
          <div class="row">
            <div class="page-header"><div class="row titulo-form">Informações Gerais</div></div>

            <div class="col-md-6 form-group">
   						<div class="row perguntas"><label for="nome">Nome:</label></div>
   						<input type="text" class="form-control" id="nome" name="nome" maxlenght="200">
   					</div>

            <div class="col-md-6 form-group">
              <div class="row perguntas"><label for="siape">SIAPE:</label></div>
              <input type="text" class="form-control" id="siape" name="siape">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-group">
              <div class="row perguntas"><label for="email">E-mail:</label></div>
              <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="col-md-6 form-group">
              <div class="row perguntas"><label for="lattes">Link do Lattes:</label></div>
              <input type="url" maxlength="200" class="form-control" id="lattes" name="link_lattes">
            </div>
          </div>

          <div class="row">

            <div class="col-md-6 form-group">
              <div class="row perguntas"><label for="eixo">Eixo Tecnológico:</label></div>
              <select class="form-control" onchange="eixoTec()" id="eixo" name="eixo">
                  <option  disabled selected value="">Selecione</option>
                  <option value="1">Química e Meio Ambiente</option>
                  <option value="2">Computação</option>
                  <option value="3">Indústria</option>
              </select> 
            </div>

            <script type="text/javascript">
              function eixoTec() {
                var opcao = $("#eixo option:selected").val();
                if(opcao == 1){
                  $('#laboratorio select').remove();
                  $('#laboratorioEixo select').remove();
                  var opcoes = '<select class="form-control" name="op1" id="laboratorioEixo"><option disabled selected value="">Selecione</option><option value="LTPA - Laboratório de Tecnologia em Processos Ambientais">LTPA - Laboratório de Tecnologia em Processos Ambientais</option><option value="LQOI - Laboratório de Química Orgânica e Inorgânica">LQOI - Laboratório de Química Orgânica e Inorgânica</option><option value="LAPP - Laboratório de Práticas Pedagógicas">LAPP - Laboratório de Práticas Pedagógicas</option><option value=""Laboratório de Hidrologia"">Laboratório de Hidrologia</option><option value="LBFV - Laboratório de Bioquímica e Fisiologia Vegetal"> LBFV - Laboratório de Bioquímica e Fisiologia Vegetal</option><option value="LT - Laboratório da Terra">LT - Laboratório da Terra</option><option value="LMS - Laboratório de Mecânica dos Solos">Laboratório de Mecânica dos Solos</option><option value="Laboratório de Tecnologias">Laboratório de Tecnologias</option><option value="LAQAMB - Laboratório de química analítica e microbiologia ambiental">LAQAMB - Laboratório de química analítica e microbiologia ambiental</option><option value="LATACS - Laboratório de Tecnologia Alternativas de Convivência com o Semiárido">LATACS - Laboratório de Tecnologia Alternativas de Convivência com o Semiárido</option><option value="Laboratório de Geotecnologias">Laboratório de Geotecnologias</option></select>';
                  		
                }else if(opcao == 2){
                  $('#laboratorio select').remove();
                  $('#laboratorioEixo select').remove();
                  var opcoes = '<select class="form-control" name="op2" id="laboratorioEixo"><option disabled selected value="">Selecione</option><option value="LI01 - Laboratório de Informática 01">LI01 - Laboratório de Informática 01</option><option value="LI02 - Laboratório de Informática 02">LI02 - Laboratório de Informática 02</option><option value="LI03 - Laboratório de Informática 03">LI03 - Laboratório de Informática 03</option><option value="LECOMP - Laboratório de Eletroeletrônica para Computação">LECOMP - Laboratório de Eletroeletrônica para Computação</option><option value="LSD - Laboratório de Sistemas Digitais">LSD - Laboratório de Sistemas Digitais</option><option value="LAESE - Laboratório de Eletrônica e Sistemas Embarcados">LAESE - Laboratório de Eletrônica e Sistemas Embarcados</option><option value="LabVICIA - Laboratório de Visão Computacional e Inteligência Artificial">LabVICIA - Laboratório de Visão Computacional e Inteligência Artificial</option><option value="LaTIM - Laboratório de Tecnologia e Inovação de Maracanaú">LaTIM - Laboratório de Tecnologia e Inovação de Maracanaú</option><option value="LHARD - Laboratório de Hardware">LHARD - Laboratório de Hardware</option><option value="LRC1 - Laboratório de Redes de Computadores 1">LRC1 - Laboratório de Redes de Computadores 1</option><option value="LRC2 - Laboratório de Redes de Computadores 2">LRC2 - Laboratório de Redes de Computadores 2</option><option value="LRSF - Laboratório de Redes Sem Fio">LRSF - Laboratório de Redes Sem Fio</option><option value="LMD  - Laboratório de Mídias Digitais">LMD - Laboratório de Mídias Digitais</option></select>';
                }else if(opcao == 3){
                  $('#laboratorio select').remove();
                  $('#laboratorioEixo select').remove();
                  var opcoes = '<select class="form-control" name="op3" id="laboratorioEixo"><option disabled selected value="">Selecione</option><option value="LSHIP - Laboratório de Sistemas Hidráulicos e Pneumáticos">LSHIP - Laboratório de Sistemas Hidráulicos e Pneumáticos</option><option value="LINC - Laboratório de Instrumentação e Controle">LINC - Laboratório de Instrumentação e Controle</option><option value="LAMEP - Laboratório de Acionamento de Máquinas e Eletrônica de Potência">LAMEP - Laboratório de Acionamento de Máquinas e Eletrônica de Potência</option><option value="LEE - Laboratório de Eletroeletrônica">LEE - Laboratório de Eletroeletrônica</option><option value="LPROT - Laboratório de Protótipos">LPROT - Laboratório de Protótipos</option><option value="LPC  - Laboratório de Potência e Controle">LPC - Laboratório de Potência e Controle</option><option value="LAMSC">LAMSC - Laboratório de Aprendizagem de Máquinas e Simulações Computacionais</option><option value="LIA - Laboratório de Informática Aplicada">LIA - Laboratório de Informática Aplicada</option><option value="LTF - Laboratório de Máquinas Térmicas e de Fluxo">LTF - Laboratório de Máquinas Térmicas e de Fluxo</option><option value="LMET - Laboratório de Metrologia Dimensional">LMET - Laboratório de Metrologia Dimensional</option><option value="LIAF - Laboratório de Inspeção e Análise de Falhas">LIAF - Laboratório de Inspeção e Análise de Falhas</option><option value="LMAT - Laboratório de Materiais">LMAT - Laboratório de Materiais</option><option value="LCC - Laboratório de CAD/CNC">LCC - Laboratório de CAD/CNC</option><option value="LSOL - Laboratório de Soldagem">LSOL - Laboratório de Soldagem</option><option value="LED - Laboratório de Eletrônica Digital">LED - Laboratório de Eletrônica Digital</option><option value="LPF - Laboratório de Processos de Fabricação">LPF - Laboratório de Processos de Fabricação</option></select>';
                }
                $('#laboratorio').append(opcoes);
              }
              var info = "<?php print $_COOKIE['laboratorio']; ?>"; $("#laboratorio").val(info);
            </script>

            <div class="col-md-6 form-group" id="laboratorio">
              <div class="row perguntas"><label for="laboratorio">Laboratório:</label></div>
              <select class="form-control" id="laboratorio" >
                  <option disabled selected>Selecione o eixo</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-group">
              <div class="row perguntas"><label for="contato">Email do Laboratório:</label></div>
              <input type="email" class="form-control" id="emailLab" name="emailLab">
            </div>
            <div class="col-md-6 form-group">
              <div class="row perguntas"><label for="contato">Telefone do Laboratório:</label></div>
              <input type="text" class="form-control" id="telefoneLab" name="telefoneLab">
            </div>
          </div>

          <div class="row perguntas"><label for="areas">Existem solicitações de atualizações da portaria de coordenação de laboratório?</label></div>
          <select class="form-control" name="atualizacoes" onchange="atualiza()" id="atualizacoes">
                  <option  disabled selected value="">Selecione</option>
                  <option value="0">Não</option>
                  <option value="1">Sim</option>
              </select>
              </br>
            <div id="p4"></div>

            <script type="text/javascript">
                function atualiza() {
                  var opcao = $("#atualizacoes option:selected").val();
                  $('div#r1').remove();
                  for(var k = 1; k <= opcao; k++){
                    var opcoes = '<div id="r1" class="form-group"><div class="row"><div class="col-md-6"><label>Alteração do Coordenador:</label><input  class="form-control" type="text" name="novoCoordenador" id="novoCoordenador"></div><div class="col-md-6"><label>SIAPE:</label><input  class="form-control" type="text" name="novoSiape" id="novoSiape"></div></div><br><div class="row"><div class="col-md-6"><label>Alteração do Nome do Laboratório:</label><input  class="form-control" type="text" name="novoNomeLab" id="novoNomeLab"></div><div class="col-md-6"><label>Sigla do Laboratório:</label><input  class="form-control" type="text" name="novaSiglaLab" id="novaSiglaLab"></div></div></div></div>';
                    $('#p4').append(opcoes);
                  }
                }
            </script>

          <div class="row perguntas"><label for="areas">Área(s) de pesquisa do laboratório:</label></div>
          <textarea class="form-control" maxlength="400" rows="2" id="areas" name="areas"></textarea>
          <br>

          <div class="row perguntas"><label for="apresentacao">Apresentação do laboratório (Será posta no site do IFCE):</label></div>
          <textarea class="form-control" maxlength="500" rows="5" id="apresentacao" name="apresentacao"></textarea>
              
          <!--<a href="F2.html" class="btn btn-default">Próximo</a>-->
          <button type="submit" class="btn btn-default botao2">PRÓXIMO</button>

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
