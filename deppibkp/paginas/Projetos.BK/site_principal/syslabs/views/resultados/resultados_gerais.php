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

    <?php 
      	session_start();

        if(!@($conexao=pg_connect ("host=localhost dbname=pesquisa port=5432 user=postgres password=1"))) {
          print "Não foi possível estabelecer uma conexão com o banco de dados.";
        } 
        else {

          //TABELA: quantidades
          //Consulta para pegar dados de acordo com o laboratório, pegar variável com o nome do lab
          $consulta = pg_query($conexao, "SELECT * FROM quantidades;");

           //TABELA: quantidades
          //Verificando se consulta deu erro ou se retornou nenhum registro
          if (!$consulta) {
            echo "Consulta não foi executada!";
          }
          if(pg_num_rows($consulta) == 0) {
            echo "Dados do laboratório ainda não foram adicionados. ";
          }
          //TABELA: quantidades
          while($row = pg_fetch_array($consulta)) {
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

          session_destroy();
        }
    ?>


      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawTitleSubtitle);

        function plotarGrafico() {
          // Variáveis
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

          var options = {
            height: 610,
            chart: {
                title: "DADOS GERAIS DA PESQUISA",
                subtitle: "Quantidades totais"
              },

          };

          var materialChart = new google.charts.Bar(document.getElementById('grafico'));
          materialChart.draw(qtd, options);
        }


        function dados() {
          window.setTimeout('plotarGrafico()', 500);
        }
        
      </script>

      <div class="container  back-form">

          <div class="row" id="grafico" style="background: white; padding: 20px; margin: 15px;">
      	
      		</div>
          
          <br> <br>

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