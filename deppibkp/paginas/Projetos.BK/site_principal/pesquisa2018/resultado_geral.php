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

  <style>
    table {
      border-collapse: collapse;
      border: 1px solid black;
    } 

    th,td {
      border: 1px solid black;
    }

    table.a {
      table-layout: auto;
      width: 180px;    
    }

    table.b {
      table-layout: fixed;
      width: 180px;    
    }

    table.c {
      table-layout: auto;
      width: 100%;    
    }

    table.d {
      table-layout: fixed;
      width: 100%;    
    }


    /* part 02 */
    #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 80%;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f4f4f4;}


    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }


    .titulo-form {
      color: white;
      font-weight: 900;
      font-size: 40px;
      background: #0A2A0A;
      position: relative;
      left: -30px;
      border-radius: 0px 10px 10px 0px;
      padding-left: 20px;
    }

    .espaco {
     margin-left: 50px;
   }
 </style>

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
        <li> <a href="resultados_gerais.php">Resultados Gerais</a> </li>
        <li> <a href="resultados.php">Laboratórios</a> </li>
        <li> <a href="relatorio_pdf.php">Relatório</a> </li>
      </ul>
    </div>
  </div>
</nav>

<?php 
session_start(); 
header("Content-type: text/html; charset=utf-8");

$_SESSION["teste"] = "pedro";

if(!@($conexao=pg_connect ("host=localhost dbname=pesquisa port=5432 user=postgres password=1"))) {
  echo "Não foi possível estabelecer uma conexão com o banco de dados.";
} 

else {
//TABELA: quantidades
  $consulta_quantidades_computacao = pg_query($conexao, "SELECT * FROM quantidades INNER JOIN dados_gerais ON quantidades.id_siape = dados_gerais.siape WHERE dados_gerais.eixo = 'Computação';");

     	 //TABELA: quantidades
  if (!$consulta_quantidades_computacao) {
   echo "Consulta não foi executada!";
 }
 if(pg_num_rows($consulta_quantidades_computacao) == 0) {
   echo "Dados do laboratório ainda não foram adicionados.";
 }

 $i = 0;
 while($row = pg_fetch_array($consulta_quantidades_computacao)) {

  $_SESSION['id'.$i] = $row[0];
  $_SESSION['siape'.$i] = $row[1];
  $_SESSION['qtd_bolsistas'.$i] = $row[2];
  $_SESSION['qtd_voluntarios'.$i] = $row[3];
  $_SESSION['qtd_disciplinas'.$i] = $row[4];
  $_SESSION['qtd_professores'.$i] = $row[5];
  $_SESSION['qtd_periodicos'.$i] = $row[6];
  $_SESSION['qtd_congresso'.$i] = $row[7];
  $_SESSION['qtd_tcc'.$i] = $row[8];
  $_SESSION['qtd_pesquisa_com_fomento'.$i] = $row[9];
  $_SESSION['qtd_pesquisas_sem_fomento'.$i] = $row[10];
  $_SESSION['qtd_extensao_com_fomento'.$i] = $row[11];
  $_SESSION['qtd_extensao_sem_fomento'.$i] = $row[12];
  $i++;
}

$_SESSION["num_linhas_quantidades_computacao"] = pg_num_rows($consulta_quantidades_computacao);


//TABELA: quantidades
$consulta_quantidades_industria = pg_query($conexao, "SELECT * FROM quantidades INNER JOIN dados_gerais ON quantidades.id_siape = dados_gerais.siape WHERE dados_gerais.eixo = 'Indústria';");

//TABELA: quantidades
if (!$consulta_quantidades_industria) {
  echo "Consulta não foi executada!";
}
if(pg_num_rows($consulta_quantidades_industria) == 0) {
  echo "Dados do laboratório ainda não foram adicionados.";
}

$i = 0;
while($row = pg_fetch_array($consulta_quantidades_industria)) {

  $_SESSION['id1'.$i] = $row[0];
  $_SESSION['siape1'.$i] = $row[1];
  $_SESSION['qtd_bolsistas1'.$i] = $row[2];
  $_SESSION['qtd_voluntarios1'.$i] = $row[3];
  $_SESSION['qtd_disciplinas1'.$i] = $row[4];
  $_SESSION['qtd_professores1'.$i] = $row[5];
  $_SESSION['qtd_periodicos1'.$i] = $row[6];
  $_SESSION['qtd_congresso1'.$i] = $row[7];
  $_SESSION['qtd_tcc1'.$i] = $row[8];
  $_SESSION['qtd_pesquisa_com_fomento1'.$i] = $row[9];
  $_SESSION['qtd_pesquisas_sem_fomento1'.$i] = $row[10];
  $_SESSION['qtd_extensao_com_fomento1'.$i] = $row[11];
  $_SESSION['qtd_extensao_sem_fomento1'.$i] = $row[12];
  $i++;
}

$_SESSION["num_linhas_quantidades_industria"] = pg_num_rows($consulta_quantidades_industria);

//TABELA: quantidades
$consulta_quantidades_quimica_meio = pg_query($conexao, "SELECT * FROM quantidades INNER JOIN dados_gerais ON quantidades.id_siape = dados_gerais.siape WHERE dados_gerais.eixo = 'Química e Meio Ambiente';");

//TABELA: quantidades
if (!$consulta_quantidades_quimica_meio) {
  echo "Consulta não foi executada!";
}
if(pg_num_rows($consulta_quantidades_quimica_meio) == 0) {
  echo "Dados do laboratório ainda não foram adicionados.";
}

$i = 0;
while($row = pg_fetch_array($consulta_quantidades_quimica_meio)) {

  $_SESSION['id2'.$i] = $row[0];
  $_SESSION['siape2'.$i] = $row[1];
  $_SESSION['qtd_bolsistas2'.$i] = $row[2];
  $_SESSION['qtd_voluntarios2'.$i] = $row[3];
  $_SESSION['qtd_disciplinas2'.$i] = $row[4];
  $_SESSION['qtd_professores2'.$i] = $row[5];
  $_SESSION['qtd_periodicos2'.$i] = $row[6];
  $_SESSION['qtd_congresso2'.$i] = $row[7];
  $_SESSION['qtd_tcc2'.$i] = $row[8];
  $_SESSION['qtd_pesquisa_com_fomento2'.$i] = $row[9];
  $_SESSION['qtd_pesquisas_sem_fomento2'.$i] = $row[10];
  $_SESSION['qtd_extensao_com_fomento2'.$i] = $row[11];
  $_SESSION['qtd_extensao_sem_fomento2'.$i] = $row[12];
  $i++;
}

$_SESSION["num_linhas_quantidades_quimica_meio"] = pg_num_rows($consulta_quantidades_quimica_meio);


//TABELA: TODOS
//$consulta_computacao = pg_query($conexao, "SELECT nome,laboratorio FROM quantidades INNER
//JOIN dados_gerais ON quantidades.id_siape = dados_gerais.siape;");

//TABELA: COMPUTACAO
$consulta_computacao = pg_query($conexao, "SELECT nome,laboratorio FROM quantidades INNER JOIN dados_gerais ON quantidades.id_siape = dados_gerais.siape WHERE dados_gerais.eixo = 'Computação';");

     	 //TABELA: 
if (!$consulta_computacao) {
 echo "Consulta não foi executada!";
}
if(pg_num_rows($consulta_computacao) == 0) {
 echo "Dados do laboratório ainda não foram adicionados.";
}


$i = 0;
while($row = pg_fetch_array($consulta_computacao)) {

  $_SESSION['rg_coordenador'.$i] = $row[0];
  $_SESSION['rg_lab'.$i] = $row[1];

  $i++;
}

$_SESSION["num_linhas_computacao"] = pg_num_rows($consulta_computacao);

//TABELA: Industria
$consulta_industria = pg_query($conexao, "SELECT nome,laboratorio FROM quantidades INNER JOIN dados_gerais ON quantidades.id_siape = dados_gerais.siape WHERE dados_gerais.eixo = 'Indústria';");


if (!$consulta_industria) {
 echo "Consulta não foi executada!";
}
if(pg_num_rows($consulta_industria) == 0) {
 echo "Dados do laboratório ainda não foram adicionados.";
}

$i = 0;
while($row = pg_fetch_array($consulta_industria)) {

  $_SESSION['rg_coordenador1'.$i] = $row[0];
  $_SESSION['rg_lab1'.$i] = $row[1];

  $i++;
}

$_SESSION["num_linhas_industria"] = pg_num_rows($consulta_industria);


//TABELA: Quimica meio
$consulta_quimica_meio = pg_query($conexao, "SELECT nome,laboratorio FROM quantidades INNER JOIN dados_gerais ON quantidades.id_siape = dados_gerais.siape WHERE dados_gerais.eixo = 'Química e Meio Ambiente';");

//TABELA: 
if (!$consulta_quimica_meio) {
  echo "Consulta não foi executada!";
}
if(pg_num_rows($consulta_quimica_meio) == 0) {
  echo "Dados do laboratório ainda não foram adicionados.";
}

$i = 0;
while($row = pg_fetch_array($consulta_quimica_meio)) {

  $_SESSION['rg_coordenador2'.$i] = $row[0];
  $_SESSION['rg_lab2'.$i] = $row[1];

  $i++;
}

$_SESSION["num_linhas_quimica_meio"] = pg_num_rows($consulta_quimica_meio);

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

    var data = new google.visualization.DataTable();
    data.addColumn('string', '');
    data.addColumn('number', 'Bolsistas');
    data.addColumn('number', 'Voluntários');
    data.addColumn('number', 'Disciplinas');
    data.addColumn('number', 'Professores');
    data.addColumn('number', 'Periódicos');
    data.addColumn('number', 'Publicações em congresso');
    data.addColumn('number', 'TCC');
    data.addColumn('number', 'Projetos de pesquisa com fomento');
    data.addColumn('number', 'Projetos de pesquisa sem fomento');
    data.addColumn('number', 'Projetos de extensão com fomento');
    data.addColumn('number', 'Projetos de extensão sem fomento');

    data.addRows([
      ["Quantidade",bolsistas,voluntarios,disciplinas,professores,periodicos,congresso,tcc,pesqFomento, pesquisa, extFomento, extensao]
      ]);

    var options = {
      height: 500,
      chart: {
        title: laboratorio,
        subtitle: coordenador
      },

    };

    var materialChart = new google.charts.Bar(document.getElementById('grafico'));
    materialChart.draw(data, options);
  }
</script>

<div style="margin-top: 100px;"><?php 

 echo "<br>";
 echo "<br>";

 $qtd_linhas = $_SESSION["num_linhas_computacao"];


 function html_table($data = array())
 {
  $rows = array();
  foreach ($data as $row) {
    $cells = array();
    foreach ($row as $cell) {
      $cells[] = "<td>{$cell}</td>";
    }
    $rows[] = "<tr>" . implode('', $cells) . "</tr>";
  }
  return "<table  id='customers'>" . implode('', $rows) . "</table>";
}

echo "<div class='espaco'>";
echo "<b>Laboratórios com informações já cadastradas: </b><br><br>";
echo "<h1 class='titulo-form'>Computação</h1>";
for ($i=0; $i < $qtd_linhas ; $i++) { 
  

  $data = array(
    array('1' => 'Bolsistas', '2' => 'Voluntários','3' => 'Disciplinas','4' => 'Professores','5' => 'Periódicos','6' => 'Publicações em congresso','7' => 'TCC','8' => 'Projetos de pesquisa com fomento','9' => 'Projetos de pesquisa sem fomento','10' => 'Projetos de extensão com fomento','11' => 'Projetos de extensão sem fomento'),
    array('1' => $_SESSION['qtd_bolsistas'.$i], '2' => $_SESSION['qtd_voluntarios'.$i],'3' => $_SESSION['qtd_disciplinas'.$i],'4' => $_SESSION['qtd_professores'.$i],'5' => $_SESSION['qtd_periodicos'.$i],'6' => $_SESSION['qtd_congresso'.$i],'7' => $_SESSION['qtd_tcc'.$i],'8' => $_SESSION['qtd_pesquisa_com_fomento'.$i],'9' =>  $_SESSION['qtd_pesquisas_sem_fomento'.$i],'10' => $_SESSION['qtd_extensao_com_fomento'.$i],'11' => $_SESSION['qtd_extensao_sem_fomento'.$i])

    );
  echo "<br>";
  echo "<b> Laboratório: </b>";
  echo $_SESSION[ 'rg_lab'.$i];
  echo "<b> Coordenador: </b>";
  echo $_SESSION['rg_coordenador'.$i];

  echo html_table($data);
}

$qtd_linhas = $_SESSION["num_linhas_industria"];
echo "<h1 class='titulo-form'>Indústria</h1>";
for ($i=0; $i < $qtd_linhas ; $i++) { 


  $data = array(
    array('1' => 'Bolsistas', '2' => 'Voluntários','3' => 'Disciplinas','4' => 'Professores','5' => 'Periódicos','6' => 'Publicações em congresso','7' => 'TCC','8' => 'Projetos de pesquisa com fomento','9' => 'Projetos de pesquisa sem fomento','10' => 'Projetos de extensão com fomento','11' => 'Projetos de extensão sem fomento'),
    array('1' => $_SESSION['qtd_bolsistas1'.$i], '2' => $_SESSION['qtd_voluntarios1'.$i],'3' => $_SESSION['qtd_disciplinas1'.$i],'4' => $_SESSION['qtd_professores1'.$i],'5' => $_SESSION['qtd_periodicos1'.$i],'6' => $_SESSION['qtd_congresso1'.$i],'7' => $_SESSION['qtd_tcc1'.$i],'8' => $_SESSION['qtd_pesquisa_com_fomento1'.$i],'9' =>  $_SESSION['qtd_pesquisas_sem_fomento1'.$i],'10' => $_SESSION['qtd_extensao_com_fomento1'.$i],'11' => $_SESSION['qtd_extensao_sem_fomento1'.$i])

    );
  echo "<br>";
  echo "<b> Laboratório: </b>";
  echo $_SESSION[ 'rg_lab1'.$i];
  echo "<b> Coordenador: </b>";
  echo $_SESSION['rg_coordenador1'.$i];

  echo html_table($data);
}


$qtd_linhas = $_SESSION["num_linhas_quimica_meio"];
echo "<h1 class='titulo-form'>Química e Meio Ambiente</h1>";
for ($i=0; $i < $qtd_linhas ; $i++) { 
 

  $data = array(
    array('1' => 'Bolsistas', '2' => 'Voluntários','3' => 'Disciplinas','4' => 'Professores','5' => 'Periódicos','6' => 'Publicações em congresso','7' => 'TCC','8' => 'Projetos de pesquisa com fomento','9' => 'Projetos de pesquisa sem fomento','10' => 'Projetos de extensão com fomento','11' => 'Projetos de extensão sem fomento'),
    array('1' => $_SESSION['qtd_bolsistas2'.$i], '2' => $_SESSION['qtd_voluntarios2'.$i],'3' => $_SESSION['qtd_disciplinas2'.$i],'4' => $_SESSION['qtd_professores2'.$i],'5' => $_SESSION['qtd_periodicos2'.$i],'6' => $_SESSION['qtd_congresso2'.$i],'7' => $_SESSION['qtd_tcc2'.$i],'8' => $_SESSION['qtd_pesquisa_com_fomento2'.$i],'9' =>  $_SESSION['qtd_pesquisas_sem_fomento2'.$i],'10' => $_SESSION['qtd_extensao_com_fomento2'.$i],'11' => $_SESSION['qtd_extensao_sem_fomento2'.$i])

    );
  echo "<br>";
  echo "<b> Laboratório: </b>";
  echo $_SESSION[ 'rg_lab2'.$i];
  echo "<b> Coordenador: </b>";
  echo $_SESSION['rg_coordenador2'.$i];

  echo html_table($data);

}


echo "</div>";
?>
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
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
