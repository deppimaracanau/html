<?php
if(!@($conexao=pg_connect ("host=localhost dbname=certificados port=5432 user=postgres password=1"))) {
   print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
	
	//Entrada de Dados
	$texto_certificado = $_POST['texto'];
	$lista_nomes = $_POST['nomes'];

	//Add texto
	$sql1 = pg_query("update texto_certificado set texto='$texto_certificado';") or die("Erro no comando SQL");

	$f = fopen("./nomes.txt", "w+"); // Abre para leitura e gravação; coloca o ponteiro no começo do arquivo.
	$text = $lista_nomes;
	fwrite($f, $text);
	fclose($f);


	header("Location:./dados_certificados.php");
}
?>