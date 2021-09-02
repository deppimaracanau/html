<?php
include ("../config_bd/conexao.php");

$qtd = $_POST['qtd'];

$sql1 = pg_query("UPDATE qtd_avisos SET quantidade ='$qtd';") or die("Erro no comando SQL");

// alterando arquivo.txt
$f = fopen("../paginas/arquivo.txt", "r+"); // Abre para leitura e gravação; coloca o ponteiro no começo do arquivo.
$text = 'b';
fwrite($f, $text);
fclose($f);

sleep(10); // Espera 10 segundos para dá tempo o raspberry atualizar os avisos, tempo muito pegueno pode não atualizar
           
// alterando arquivo.txt
$f = fopen("../paginas/arquivo.txt", "r+");
$text = 'a';
fwrite($f, $text);
fclose($f);
header("Location:../paginas/numero_avisos.php");

?>