<?php 
  session_start();
  header("Content-type: text/html; charset=utf-8");


  if(!@($conexao=pg_connect ("host=localhost dbname=cidade_limpa port=5432 user=postgres password=#D3pp1.2019/2.0"))) {
      print "Não foi possível estabelecer uma conexão com o banco de dados.";
    } 
    else {


      //TABELA: marcador
     $consulta_marcador = pg_query($conexao, "select * from marcador;");

      //TABELA: marcador
      if (!$consulta_marcador) {
          echo "Consulta não foi executada!";
      }
      if(pg_num_rows($consulta_marcador) == 0) {
         echo "Tabela sem dados";
      }

      $i = 0;
        while($row = pg_fetch_array($consulta_marcador)) {
          
          $_SESSION['titulo'.$i] = $row[1];
          $_SESSION['longitude'.$i] = $row[2];
          $_SESSION['latitude'.$i] = $row[3];
          $_SESSION['descricao'.$i] = $row[4];
          $_SESSION['link'.$i] = $row[4];
          $i++;
      }

       $_SESSION["num_linhas_marcador"] = pg_num_rows($consulta_marcador);
    }
?>

<!DOCTYPE html>
<html>
  <head>

    <title>Cidade Limpa</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
       #map {
        height: 700px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <header>
    <br>
    <div class="font_tema">Projeto Cidade Limpa</div>
    

    <form method="post" action="./seguranca.php">
       <div class="col-xs-3">
        <span class="font_text_simples">Usuário</span><input class="form-control" width=60px type="text" name="login" required>
      </div>
       <div class="col-xs-3">
        <span class="font_text_simples">Senha</span><input class="form-control" type="password" name="senha" required>
      </div><br>
       <div><button class="btn btn-primary" type="submit">Entrar</button></div>
      
    </form>
    
  </header>

    
    <div id="map"></div>
    <script>


      function initMap() {

      var i;

  
        var uluru = {lat: -3.8716656, lng: -38.6111584};
        var uluru1 = {lat: -3.8714600, lng: -38.6004500};
        var uluru2 = {lat: -3.8728683, lng: -38.6155829};
        var uluru3 = {lat: -3.8668946, lng: -38.6274004};
        var uluru4 = {lat: -3.8753082, lng: -38.611173};
        var uluru5 = {lat: -3.8632599, lng: -38.6139924};
        var uluru6 = {lat: -3.8658573, lng: -38.608387};
        var uluru7 = {lat: -3.86757, lng: -38.6176755};
        var uluru8 = {lat: -3.8752236, lng: -38.6197354};


        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });

      var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">IFCE - Campus Maracanaú</h1>'+
      '<div id="bodyContent">'+
      '<p>A velocidade do desenvolvimento industrial do país e a penetração gradual de tecnologia de ponta ' +
      'demandam a formação de especialistas de diversos níveis, '+
      'impondo um persistente reestudo na formação desses profissionais. '+
      'Deste reestudo, nascem os CEFETs, os Centros Federais de Educação Tecnológica, '+
      'tendo por objetivo ministrar ensino em nível superior de graduação e pós-graduação, '+
      'visando à formação de profissionais em engenharia civil, industrial e tecnológica, '+
      'a formação de professores e especialistas para o ensino médio e de formação profissional, '+
      'formação de técnicos, promoção de cursos de extensão, aperfeiçoamento, '+
      'atualização profissional e realização de pesquisas na área técnico-industrial.</p> '+
      '<p>Saiba mais <a href="http://ifce.edu.br/maracanau">'+
      'http://ifce.edu.br/maracanau</a> '+
      '</p>'+
      '</div>'+
      '</div>';

       var contentString1 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Vicunha Têxtil - Responsabilidade Ambiental</h1>'+
      '<div id="bodyContent">'+
      '<p>O cuidado com a preservação do meio ambiente é um dos compromissos assumidos pela Vicunha Têxtil. ' +
      'Suas Unidades operam seguindo um rigoroso Sistema de Gestão Ambiental (SGA), '+
      'que têm como princípios fundamentais a preservação do meio ambiente, '+
      'a melhoria contínua de seu desempenho ambiental e o respeito à legislação aplicável às atividades da empresa</p> '+
      '<p>Saiba mais <a href="http://www.vicunha.com.br/institucional.php?id=3">'+
      'http://www.vicunha.com.br/institucional.php?id=3</a> '+
      '</p>'+
      '</div>'+
      '</div>';


       var contentString2 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Escola Chapeuzinho Vermelho</h1>'+
      '<div id="bodyContent">'+
      '<p>Com objetivo de conscientizar as crianças e seus familiares sobre a importância da preservação do meio ambiente, ' +
      'a Escola Municipal de Educação Infantil (Emei) Chapeuzinho Vermelho está desenvolvendo o Projeto Do lixo ao luxo!, '+
      'que tem como tema Reciclar é preciso. A iniciativa tem como objetivo implantar bons hábitos e cuidados, '+
      'visando a uma melhor qualidade de vida, transformando o lixo,</p> '+
      '<p>Saiba mais <a href="http://sic-maracanau.com.br/cidade_limpa/pagina.php">'+
      'http://sic-maracanau.com.br/cidade_limpa/pagina.php</a> '+
      '</p>'+
      '</div>'+
      '</div>';

      var infowindow = new google.maps.InfoWindow({
        content: contentString
      });

      var infowindow1 = new google.maps.InfoWindow({
        content: contentString1
      });

      var infowindow2 = new google.maps.InfoWindow({
        content: contentString1
      });

      var infowindow3 = new google.maps.InfoWindow({
        content: contentString1
      });

      var infowindow4 = new google.maps.InfoWindow({
        content: contentString1
      });

      var infowindow5 = new google.maps.InfoWindow({
        content: contentString1
      });

       var infowindow6 = new google.maps.InfoWindow({
        content: contentString2
      });

       var infowindow7 = new google.maps.InfoWindow({
        content: contentString1
      });

        var infowindow8 = new google.maps.InfoWindow({
        content: contentString1
      });
        
      var marker = new google.maps.Marker({
        position: uluru,
        map: map,
        title:"IFCE",
        icon:"./img/ifce.png"	
      });
      marker.addListener('click', function() {
        infowindow.open(map, marker);
      });
      
      var marker1 = new google.maps.Marker({
        position: uluru1,
        map: map,
        title:"IFCE",
        icon:"./img/reciclagem.png"	
      });
   
      marker1.addListener('click', function() {
        infowindow1.open(map, marker1);
      });

       var marker2 = new google.maps.Marker({
        position: uluru2,
        map: map,
        title:"IFCE",
        icon:"./img/reciclagem.png" 
      });
   
      marker2.addListener('click', function() {
        infowindow2.open(map, marker2);
      });

       var marker3 = new google.maps.Marker({
        position: uluru3,
        map: map,
        title:"IFCE",
        icon:"./img/reciclagem.png" 
      });
   
      marker3.addListener('click', function() {
        infowindow3.open(map, marker3);
      });


       var marker4 = new google.maps.Marker({
        position: uluru4,
        map: map,
        title:"IFCE",
        icon:"./img/reciclagem.png" 
      });
   
      marker4.addListener('click', function() {
        infowindow4.open(map, marker4);
      });

       var marker5 = new google.maps.Marker({
        position: uluru5,
        map: map,
        title:"IFCE",
        icon:"./img/reciclagem.png" 
      });
   
      marker5.addListener('click', function() {
        infowindow5.open(map, marker5);
      });

       var marker6 = new google.maps.Marker({
        position: uluru6,
        map: map,
        title:"IFCE",
        icon:"./img/tree.png" 
      });
   
      marker6.addListener('click', function() {
        infowindow6.open(map, marker6);
      });

       var marker7 = new google.maps.Marker({
        position: uluru7,
        map: map,
        title:"IFCE",
        icon:"./img/tree.png" 
      });
   
      marker7.addListener('click', function() {
        infowindow7.open(map, marker7);
      });

       var marker8 = new google.maps.Marker({
        position: uluru8,
        map: map,
        title:"IFCE",
        icon:"./img/tree.png" 
      });
   
      marker8.addListener('click', function() {
        infowindow8.open(map, marker8);
      });

    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbHr8kqhnzhY01i_QoJA-jNHtwWQWPcXI&callback=initMap">
    </script>

   <!-- <footer>
    <div class="container">
      <dir class="row">
        <div class="col-md-4 col-logo text-center">
          <ul class="list-unstyled">
            <li><h1>IFCE</h1></li>
          </ul>
        </div>
        <div class="col-md-4 col-deppi text-center">
          <ul class="list-unstyled">
            <ul class="list-unstyled">
            <li><h1>Cidade Limpa</h1></li>
          </ul>
          
        </div>
        <div class="col-md-4 col-contatos text-center">
             <ul class="list-unstyled">
            <li><h1>IFCE</h1></li>
          </ul>
        </div>
      </dir>
    </div>
  </footer>-->
  </body>
</html>
