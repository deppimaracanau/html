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

    <form action="resultados_eixo.php" method="post">
      <div class="container  back-form">

      	<div class="row" style="margin-top: 20px">

            <div class="col-sm-8 form-group">
              <div class="row perguntas"><label for="eixo">Eixo Tecnológico:</label></div>
              <select class="form-control" onchange="eixoTec()" id="eixo" name="eixo">
                  <option  disabled selected value="">Selecione</option>
                  <option value="Química e Meio Ambiente">Química e Meio Ambiente</option>
                  <option value="Computação">Computação</option>
                  <option value="Indústria">Indústria</option>
              </select> 
            </div>

            <div class="col-sm-4 form-group" id="laboratorio">
            	<br>

            	<center><button type="submit"  class="btn btn-success" style="padding: 12px 9px 12px 9px;">CONSULTAR</button></center>
            </div>

      </div>
    </form>

    <?php 
      session_start(); 

      $eixo = $_POST['eixo'];
      $_SESSION['eixo'] = $_POST['eixo'];

      if(!@($conexao=pg_connect ("host=localhost dbname=pesquisa port=5432 user=postgres password=#D3pp1.2019/2.0"))) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";
      } 
      else {

        //TABELA: dados_gerais
        //Consulta para pegar dados de acordo com o laboratório, pegar variável com o nome do lab
        $consulta1 = pg_query($conexao, "SELECT * FROM dados_gerais WHERE eixo = '$eixo';");

         //TABELA: dados_gerais
        //Verificando se consulta deu erro ou se retornou nenhum registro
        if (!$consulta1) {
          echo "Consulta não foi executada!";
        }
        
        //TABELA: dados_gerais
        //pegando o siape, nome_lab;
        while($row = pg_fetch_array($consulta1)) {

            $_SESSION['re_siape'] = $row[2];

            $re_siape = $_SESSION['re_siape']; 

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
                $_SESSION['qtd_bolsistas'] += $row[2];
                $_SESSION['qtd_voluntarios'] += $row[3];
                $_SESSION['qtd_disciplinas'] += $row[4];
                $_SESSION['qtd_professores'] += $row[5];
                $_SESSION['qtd_periodicos'] += $row[6];
                $_SESSION['qtd_congresso'] += $row[7];
                $_SESSION['qtd_tcc'] += $row[8];
                $_SESSION['qtd_pesquisa_com_fomento'] += $row[9];
                $_SESSION['qtd_pesquisas_sem_fomento'] += $row[10];
                $_SESSION['qtd_extensao_com_fomento'] += $row[11];
                $_SESSION['qtd_extensao_sem_fomento'] += $row[12];      
            }
        }
        
      } // FIM do ELSE

      session_destroy();
    ?>


      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawTitleSubtitle);

        function plotarGrafico() {
          var laboratorio = "Eixo Tecnológico";
          var coordenador = "<?php print $_SESSION['eixo']; ?>";

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

      <br>
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