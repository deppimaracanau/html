<?php
	session_start(); //abrindo session
	header("Content-type: text/html; charset=utf-8");
	echo "SIAPE: ";
	echo "<br>";
	echo $_SESSION['siape'];
	echo "<br>";
	echo "<br>";
	
	

	$qtd_publicacoes_p1 = intval($_SESSION['publicacoes1']);
    $qtd_publicacoes_p2 = intval($_SESSION['publicacoes2']);

    if( $qtd_publicacoes_p1 > 5){
         $qtd_publicacoes_p1 = 5;
    }

    if( $qtd_publicacoes_p2 > 5){
         $qtd_publicacoes_p2 = 5;
    }


   	echo "<br>";
   	echo "<h3>Periodico</h3>";
   	echo "<br>";

    for ($i=1; $i <= $qtd_publicacoes_p1 ; $i++) {
    	echo "<br>";	
    	echo '<b>Titulo:</b>';
    	echo "<br>"; 
		echo  $_SESSION['titulo3'.$i];
		echo "<br>";	
    	echo '<b>Periodico:</b>';
    	echo "<br>";  
		echo  $_SESSION['periodico'.$i];
	   echo "<br>";  
     echo $_SESSION['linkPub'.$i];
	
		echo "<br>";
   	}

   	echo "<br>";
   	echo "<h3>QTD_Pesquisa</h3>";
    echo $qtd_publicacoes_p2;
   	echo "<br>";

   	 echo $_SESSION['desc_produto'];

   	echo "<br>";
   	echo "<br>";

   	echo "<a href='../forms/F4.html'>Próximo</a>";


 ?>