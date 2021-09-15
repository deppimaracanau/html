<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formulário de Atividades de Extensão, Pesquisa e Inovação</title>

    <link rel="icon" href="favicon.ico">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/BodyForm.css" rel="stylesheet">

    <script language="javascript" src="js/javascript.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

    <script type="text/javascript" src="js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/JSCharting.js"></script>
  </head>
  <body onload="dados()">
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
          <a href="index.html" class="navbar-brand"><span class="logo">IFCE</span></a>
        </div>

        <div class="collapse navbar-collapse" id="barra-navegacao">
          <ul class="nav navbar-nav navbar-right">
            <li> <a href="index.html#inicio" class="scrollSuave">INÍCIO</a> </li>
            <li> <a href="index.html#saiba" class="scrollSuave">SAIBA MAIS</a> </li>
            <li> <a href="index.html#calendario" class="scrollSuave">CALENDÁRIO</a> </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                RESULTADO<span class="caret"></span>
              </a>
              <ul class="dropdown-menu dropStyle">
                <li> <a href="resultados_gerais.php">Resultado Geral</a> </li>
                <li> <a href="resultados_eixo.php">Resultado por Eixo</a> </li>
                <li> <a href="resultados.php">Resultados Individuais</a> </li>
                <li> <a href="relatorio_pdf.php">Relatório (PDF)</a> </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- ------------------- Formulário ------------------- -->

    <form action="resultados.php" method="post">
      <div class="container  back-form">

      	<div class="row" style="margin-top: 20px">

            <div class="col-sm-5 form-group">
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
                  var opcoes = '<select class="form-control"  onchange="funcLAB()" name="op1" id="laboratorioEixo"><option disabled selected value="">Selecione</option><option value="LTPA - Laboratório de Tecnologia em Processos Ambientais">LTPA - Laboratório de Tecnologia em Processos Ambientais</option><option value="LQOI - Laboratório de Química Orgânica e Inorgânica">LQOI - Laboratório de Química Orgânica e Inorgânica</option><option value="LAPP - Laboratório de Práticas Pedagógicas">LAPP - Laboratório de Práticas Pedagógicas</option><option value="Laboratório de Hidrologia">Laboratório de Hidrologia</option><option value="LBFV - Laboratório de Bioquímica e Fisiologia Vegetal"> LBFV - Laboratório de Bioquímica e Fisiologia Vegetal</option><option value="LT - Laboratório da Terra">LT - Laboratório da Terra</option><option value="LMS - Laboratório de Mecânica dos Solos">Laboratório de Mecânica dos Solos</option><option value="Laboratório de Tecnologias">Laboratório de Tecnologias</option><option value="LAQAMB - Laboratório de química analítica e microbiologia ambiental">LAQAMB - Laboratório de química analítica e microbiologia ambiental</option><option value="LATACS - Laboratório de Tecnologia Alternativas de Convivência com o Semiárido">LATACS - Laboratório de Tecnologia Alternativas de Convivência com o Semiárido</option><option value="Laboratório de Geotecnologias">Laboratório de Geotecnologias</option></select>';
                }else if(opcao == 2){
                  $('#laboratorio select').remove();
                  $('#laboratorioEixo select').remove();
                  var opcoes = '<select class="form-control"  onchange="funcLAB()" name="op2" id="laboratorioEixo"><option disabled selected value="">Selecione</option><option value="LI01 - Laboratório de Informática 01">LI01 - Laboratório de Informática 01</option><option value="LI02 - Laboratório de Informática 02">LI02 - Laboratório de Informática 02</option><option value="LI03 - Laboratório de Informática 03">LI03 - Laboratório de Informática 03</option><option value="LECOMP - Laboratório de Eletroeletrônica para Computação">LECOMP - Laboratório de Eletroeletrônica para Computação</option><option value="LSD - Laboratório de Sistemas Digitais">LSD - Laboratório de Sistemas Digitais</option><option value="LAESE - Laboratório de Eletrônica e Sistemas Embarcados">LAESE - Laboratório de Eletrônica e Sistemas Embarcados</option><option value="LabVICIA - Laboratório de Visão Computacional e Inteligência Artificial">LabVICIA - Laboratório de Visão Computacional e Inteligência Artificial</option><option value="LaTIM - Laboratório de Tecnologia e Inovação de Maracanaú">LaTIM - Laboratório de Tecnologia e Inovação de Maracanaú</option><option value="LHARD - Laboratório de Hardware">LHARD - Laboratório de Hardware</option><option value="LRC1 - Laboratório de Redes de Computadores 1">LRC1 - Laboratório de Redes de Computadores 1</option><option value="LRC2 - Laboratório de Redes de Computadores 2">LRC2 - Laboratório de Redes de Computadores 2</option><option value="LRSF - Laboratório de Redes Sem Fio">LRSF - Laboratório de Redes Sem Fio</option><option value="LMD  - Laboratório de Mídias Digitais">LMD - Laboratório de Mídias Digitais</option></select>';
                }else if(opcao == 3){
                  $('#laboratorio select').remove();
                  $('#laboratorioEixo select').remove();
                  var opcoes = '<select class="form-control" onchange="funcLAB()" name="op3" id="laboratorioEixo"><option disabled selected value="">Selecione</option><option value="LSHIP - Laboratório de Sistemas Hidráulicos e Pneumáticos">LSHIP - Laboratório de Sistemas Hidráulicos e Pneumáticos</option><option value="LINC - Laboratório de Instrumentação e Controle">LINC - Laboratório de Instrumentação e Controle</option><option value="LAMEP - Laboratório de Acionamento de Máquinas e Eletrônica de Potência">LAMEP - Laboratório de Acionamento de Máquinas e Eletrônica de Potência</option><option value="LEE - Laboratório de Eletroeletrônica">LEE - Laboratório de Eletroeletrônica</option><option value="LPROT - Laboratório de Protótipos">LPROT - Laboratório de Protótipos</option><option value="LPC  - Laboratório de Potência e Controle">LPC - Laboratório de Potência e Controle</option><option value="LAMSC - Laboratório de Aprendizagem de Máquinas e Simulações Computacionais">LAMSC - Laboratório de Aprendizagem de Máquinas e Simulações Computacionais</option><option value="LIA - Laboratório de Informática Aplicada">LIA - Laboratório de Informática Aplicada</option><option value="LTF - Laboratório de Máquinas Térmicas e de Fluxo">LTF - Laboratório de Máquinas Térmicas e de Fluxo</option><option value="LMET - Laboratório de Metrologia Dimensional">LMET - Laboratório de Metrologia Dimensional</option><option value="LIAF - Laboratório de Inspeção e Análise de Falhas">LIAF - Laboratório de Inspeção e Análise de Falhas</option><option value="LMAT - Laboratório de Materiais">LMAT - Laboratório de Materiais</option></select>';
                }
                $('#laboratorio').append(opcoes);
              }
              var info = "<?php print $_COOKIE['laboratorio']; ?>"; $("#laboratorio").val(info);
              
              
            </script>

            <div class="col-sm-5 form-group" id="laboratorio">
              <div class="row perguntas"><label for="laboratorio">Laboratório:</label></div>
              <select class="form-control" id="laboratorio" >
                  <option disabled selected>Selecione o eixo</option>
              </select>
            </div>

            <div class="col-sm-2 form-group" id="laboratorio">
            	<br>

            	<center><button type="submit"  class="btn btn-success" style="padding: 12px 9px 12px 9px;">CONSULTAR</button></center>
            </div>

      </div>
    </form>

    <?php 
      session_start(); 

        $var = $_POST['LAB'];


        $eixo_tecnologico = $_POST['eixo']; 
        
      if($eixo_tecnologico == 1){
          $var = $_POST['op1'];
      } else if($eixo_tecnologico == 2){
         $var = $_POST['op2'];
      } else if($eixo_tecnologico == 3){
        $var = $_POST['op3'];
      }


        if(!@($conexao=pg_connect ("host=localhost dbname=pesquisa port=5432 user=postgres password=1"))) {
          print "Não foi possível estabelecer uma conexão com o banco de dados.";
        } 
        else {

          //TABELA: dados_gerais
          //Consulta para pegar dados de acordo com o laboratório, pegar variável com o nome do lab
          $consulta1 = pg_query($conexao, "SELECT * FROM dados_gerais WHERE laboratorio = '$var';");

           //TABELA: dados_gerais
          //Verificando se consulta deu erro ou se retornou nenhum registro
          if (!$consulta1) {
            echo "Consulta não foi executada!";
          }
          if(pg_num_rows($consulta1) == 0) {
            echo "Dados do laboratório ainda não foram adicionados. ";
          }
          //TABELA: dados_gerais
          //pegando o siape, nome_lab;
          while($row = pg_fetch_array($consulta1)) {
               //echo "Siape: $id = $row[2];";
              $_SESSION['re_nome_coordenador'] = $row[1];
              $_SESSION['re_siape'] = $row[2];
              $_SESSION['re_nome_coordenador'] = $row[1];
              $_SESSION['re_nome_lab'] = $row[6];
              // echo "Nome lab: $id = $row[6];";
              // Salvando dados no cookie
              //setcookie("re_siape", $row[2], time() + (86400 * 30), "/");
              //setcookie("re_nome_lab", $row[6], time() + (86400 * 30), "/");
              //echo $_SESSION['re_siape']; 
              echo "<b>Laboratório: </b>";
              echo $_SESSION['re_nome_lab']; 
              echo "<b> Coordenador: </b>";
              echo $_SESSION['re_nome_coordenador'];

              $re_siape = $_SESSION['re_siape']; 
              $re_nome_lab = $_SESSION['re_nome_lab']; 
          }

          //TABELA: quantidades
          $consulta2 = pg_query($conexao, "SELECT * FROM quantidades WHERE id_siape =  '$re_siape';");

          //TABELA: quantidades
          if (!$consulta2) {
            echo "Consulta não foi executada!";
          }
          if(pg_num_rows($consulta2) == 0) {
            //echo "Dados do laboratório ainda não foram adicionados.";
          }

          //TABELA: quantidades
          //pegando valores da tabela
          while($row = pg_fetch_array($consulta2)) {
              $_SESSION['qtd_bolsistas'] = $row[2];
              $_SESSION['qtd_voluntarios'] = $row[3];
              $_SESSION['qtd_disciplinas'] = $row[4];
              $_SESSION['qtd_professores'] = $row[5];
              $_SESSION['qtd_periodicos'] = $row[6];
              $_SESSION['qtd_congresso'] = $row[7];
              $_SESSION['qtd_tcc'] = $row[8];
              $_SESSION['qtd_pesquisa_com_fomento'] = $row[9];
              $_SESSION['qtd_pesquisas_sem_fomento'] = $row[10];
              $_SESSION['qtd_extensao_com_fomento'] = $row[11];
              $_SESSION['qtd_extensao_sem_fomento'] = $row[12];
              
              $_SESSION['IES'] = $row[13];
              $_SESSION['IPE'] = $row[14];
              $_SESSION['IEX'] = $row[15];          
          }
          

          
          //Médias Globais
          $mediaEnsino = pg_query($conexao, "SELECT AVG(media_ensino) FROM quantidades;");
          while($row = pg_fetch_array($mediaEnsino))
            $_SESSION['mediaEnsino'] = $row[0];

          $mediaPesquisa = pg_query($conexao, "SELECT AVG(media_pesquisa) FROM quantidades;");
          while($row = pg_fetch_array($mediaPesquisa))
            $_SESSION['mediaPesquisa'] = $row[0];

          $mediaExtensao = pg_query($conexao, "SELECT AVG(media_extensao) FROM quantidades;");
          while($row = pg_fetch_array($mediaExtensao))
            $_SESSION['mediaExtensao'] = $row[0];

        }

        session_destroy();
    ?>


      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawTitleSubtitle);

        function plotarGrafico() {
          var laboratorio = "";
          var coordenador = "<?php print $_COOKIE['pesqNomeCoordenador']; ?>";

          var bolsistas = <?php print $_SESSION['qtd_bolsistas']; ?>;
          var voluntarios = <?php print $_SESSION['qtd_voluntarios']; ?>;
          var disciplinas = <?php print $_SESSION['qtd_disciplinas']; ?>;
          var professores = <?php print $_SESSION['qtd_professores']; ?>;
          var periodicos = <?php print $_SESSION['qtd_periodicos']; ?>;
          var congresso = <?php print $_SESSION['qtd_congresso']; ?>;
          var tcc = <?php print $_SESSION['qtd_tcc']; ?>;
          var pesqFomento = <?php print $_SESSION['qtd_pesquisa_com_fomento']; ?>;
          var pesquisa = <?php print $_SESSION['qtd_pesquisas_sem_fomento']; ?>;
          var extFomento = <?php print $_SESSION['qtd_extensao_com_fomento']; ?>;
          var extensao = <?php print $_SESSION['qtd_extensao_sem_fomento']; ?>;

          var MedIES = <?php print $_SESSION['mediaEnsino']; ?>;
          var MedIEX = <?php print $_SESSION['mediaPesquisa']; ?>;
          var MedIPE = <?php print $_SESSION['mediaExtensao']; ?>;

          var IES = <?php print $_SESSION['IES']; ?>;
          var IPE = <?php print $_SESSION['IPE']; ?>;
          var IEX = <?php print $_SESSION['IEX']; ?>;


          // Gráfico dos Índices (Não está sendo plotado, sujeito a revisão)
          var data = new google.visualization.DataTable();
            data.addColumn('string', '');
            data.addColumn('number', 'Índice Alcançado');
            data.addColumn('number', 'Média do Campus');

          data.addRows([
            ["Ensino",IES,MedIES],
            ["Pesquisa",IPE,MedIEX],
            ["Extensão",IEX,MedIPE]
          ]);

          var options = {
            height: 500,
            chart: {
                title: 'ÍNDICE DE RENDIMENTO',
              },

          };

          //var materialChart = new google.charts.Bar(document.getElementById('grafico'));
          //materialChart.draw(data, options);


          // Gráfico das Quantidades
          var qtd = new google.visualization.DataTable();
          qtd.addColumn('string', '');
          qtd.addColumn('number', 'Bolsistas');
          qtd.addColumn('number', 'Voluntários');
          qtd.addColumn('number', 'Disciplinas');
          qtd.addColumn('number', 'Professores');
          qtd.addColumn('number', 'Periódicos');
          qtd.addColumn('number', 'Publicações em congresso');
          qtd.addColumn('number', 'TCC');
          qtd.addColumn('number', 'Projetos de pesquisa com fomento');
          qtd.addColumn('number', 'Projetos de pesquisa sem fomento');
          qtd.addColumn('number', 'Projetos de extensão com fomento');
          qtd.addColumn('number', 'Projetos de extensão sem fomento');

          qtd.addRows([
            ["Quantidade",bolsistas,voluntarios,disciplinas,professores,periodicos,congresso,tcc,pesqFomento, pesquisa, extFomento, extensao]
          ]);

          var options2 = {
            height: 500,
            chart: {
                title: laboratorio,
                subtitle: coordenador
              },

          };

          var materialChart = new google.charts.Bar(document.getElementById('grafico2'));
          materialChart.draw(qtd, options2);
        }


        function dados() {
          window.setTimeout('plotarGrafico()', 500);
        }
        
      </script>

      <!-- <div class="row" id="grafico" style="background: white; padding: 20px; margin-top: 15px;"> </div> -->
      <div class="row" id="grafico2" style="background: white; padding: 20px; margin-bottom: 60px;"> </div> 

      <br>

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
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
