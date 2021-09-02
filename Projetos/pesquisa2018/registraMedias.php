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
        if(!@($conexao=pg_connect ("host=localhost dbname=pesquisa port=5432 user=postgres password=#D3pp1.2019/2.0"))) {  
          print "Não foi possível estabelecer uma conexão com o banco de dados.";

        } else {
          //TABELA: pesos_avaliativos
          //Consulta para pegar dados de acordo com o laboratório, pegar variável com o nome do lab
          $consulta1 = pg_query($conexao, "SELECT valor_peso FROM pesos_avaliativos ORDER BY id_peso ASC;");
          $consulta2 = pg_query($conexao, "SELECT * FROM quantidades WHERE id_siape =  '$re_siape';");

           //TABELA: pesos_avaliativos
          //Verificando se consulta deu erro ou se retornou nenhum registro
          if (!$consulta1) {
            echo "Consulta não foi executada!";
          }
          if(pg_num_rows($consulta1) == 0) {
            echo "Dados do laboratório ainda não foram adicionados.";
          }

          //TABELA: pesos_avaliativos
          $k = 0;
          while( $row = pg_fetch_array($consulta1) ) {
            $pesos[$k] = $row[0];
            print $pesos[$k] . "\n";
            $k++;
          }

              
          //TABELA: quantidades
          //Consulta para pegar dados de acordo com o laboratório, pegar variável com o nome do lab
          $consulta2 = pg_query($conexao, "SELECT * FROM quantidades;");

           //TABELA: quantidades
          //Verificando se consulta deu erro ou se retornou nenhum registro
          if (!$consulta2) {
            echo "Consulta não foi executada!";
          }
          if(pg_num_rows($consulta2) == 0) {
            echo "Dados do laboratório ainda não foram adicionados.";
          }

          //TABELA: quantidades
          while($row = pg_fetch_array($consulta2)) {
              $siape = $row[1];

              $qtd_bolsistas = $row[2];
              $qtd_voluntarios = $row[3];
              $qtd_disciplinas = $row[4];
              $qtd_professores = $row[5];
              $qtd_periodicos = $row[6];
              $qtd_congresso = $row[7];
              $qtd_tcc = $row[8];
              $pesquisa_com = $row[9];
              $pesquisas_sem = $row[10];
              $extensao_com = $row[11];
              $extensao_sem = $row[12];

              $mediaEnsino = ($qtd_disciplinas*$pesos[2] + $qtd_professores*$pesos[3] + $qtd_tcc*$pesos[6]) / ($pesos[2]+$pesos[3]+$pesos[6]);

              $mediaPesquisa = ($qtd_bolsistas*$pesos[0] + $qtd_voluntarios*$pesos[1] + $qtd_periodicos*$pesos[4] + $qtd_congresso*$pesos[5] + $pesquisa_com*$pesos[7] + $pesquisas_sem*$pesos[8]) / ($pesos[0]+$pesos[1]+$pesos[4]+$pesos[5]+$pesos[7]+$pesos[8]);

              $mediaExtensao = ($extensao_com*$pesos[9] + $extensao_sem*$pesos[10]) / ($pesos[9]+$pesos[10]);

              print $siape;
              print "-";
              print $mediaEnsino;
              print "-";
              print $mediaPesquisa;
              print "-";
              print $mediaExtensao;
              print " ";
              $sql = pg_query($conexao,"UPDATE quantidades SET media_ensino = ROUND($mediaEnsino,2) WHERE id_siape = '$siape';") or die ("Erro 1");
              $sql = pg_query($conexao,"UPDATE quantidades SET media_pesquisa = ROUND($mediaPesquisa,2) WHERE id_siape = '$siape';") or die ("Erro 2");
              $sql = pg_query($conexao,"UPDATE quantidades SET media_extensao = ROUND($mediaExtensao,2) WHERE id_siape = '$siape';") or die ("Erro 3");

              
          }
        
        }
      ?>




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