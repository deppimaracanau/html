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
  <body onload="plotarGrafico()">
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
            <li> <a href="resultado_geral.php">Preenchidos</a> </li>
            <li> <a href="resultado_lab_pendentes.php">Pendentes</a> </li>
            <li> <a href="resultados.php">Resultados</a> </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- ------------------- Formulário ------------------- -->
    <div class="container  back-form">

        <div class="row">
            <div class="col-sm-6 form-group" id="laboratorio">
             <br>
             <center><button type="button" onclick="plotarGrafico()" class="btn btn-success" style="width: 150px;,padding: 12px 9px 12px 9px;">Mostrar Dados</button></center>
            </div>

            <div class="col-sm-6 form-group" id="laboratorio">
              <br>
              <center><a href="./resultados.php"><button type="button"  class="btn btn-success" style="width: 150px;,padding: 12px 9px 12px 9px;">Voltar</button></a></center>
            </div>
        </div>
















        <?php 
            session_start(); 

            $var = "LSD - Laboratório de Sistemas Digitais";

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


            // Gráfico dos Índices
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

            var chart_div1 = document.getElementById('chart_div1');
            var chart = new google.visualization.ColumnChart(chart_div1);

            // Wait for the chart to finish drawing before calling the getImageURI() method.
            google.visualization.events.addListener(chart, 'ready', function () {
              chart_div1.innerHTML = '<img src="' + chart.getImageURI() + '">';
              console.log(chart_div1.innerHTML);
            });

            chart.draw(data, options);



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

            var options = {
              height: 500,
              chart: {
                  title: 'ÍNDICE DE RENDIMENTO',
                },
            };

            var chart_div2 = document.getElementById('chart_div2');
            var chart = new google.visualization.ColumnChart(chart_div2);

            // Wait for the chart to finish drawing before calling the getImageURI() method.
            google.visualization.events.addListener(chart, 'ready', function () {
              chart_div2.innerHTML = '<img src="' + chart.getImageURI() + '">';
              console.log(chart_div2.innerHTML);
            });

            chart.draw(qtd, options);
            
          }
        </script>

        <div id='chart_div1'></div>
        <div id='chart_div2'></div>

















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
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>