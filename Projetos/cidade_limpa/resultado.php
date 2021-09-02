<?php 
  session_start();
  header("Content-type: text/html; charset=utf-8");


  if(!@($conexao=pg_connect ("host=localhost dbname=cidade_limpa port=5432 user=postgres password=#D3pp1.2019/2.0"))) {
      print "Não foi possível estabelecer uma conexão com o banco de dados.";
    } 
    else {

function parseToXML($htmlStr){
  $xmlStr=str_replace('<','&lt;',$htmlStr);
  $xmlStr=str_replace('>','&gt;',$xmlStr);
  $xmlStr=str_replace('"','&quot;',$xmlStr);
  $xmlStr=str_replace("'",'&#39;',$xmlStr);
  $xmlStr=str_replace("&",'&amp;',$xmlStr);
  return $xmlStr;
}


      //TABELA: marcador
     $consulta_marcador = pg_query($conexao, "select * from marcador;");

      //TABELA: marcador
      if (!$consulta_marcador) {
          echo "Consulta não foi executada!";
      }
      if(pg_num_rows($consulta_marcador) == 0) {
         echo "Tabela sem dados";
      }
header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

    
        while($row = pg_fetch_array($consulta_marcador)) {
          echo "Pedro";
      

           echo '<marker ';
  echo 'name="' . parseToXML($row[1]) . '" ';
  echo 'address="' . parseToXML("Rua 14") . '" ';
  echo 'lat="' . $row[3] . '" ';
  echo 'lng="' . $row[2] . '" ';
  echo 'type="' . $row[4] . '" ';
  echo '/>';

      }

      // End XML file
echo '</markers>';
    }
?>
