<?php
session_start(); //abrindo session
	header("Content-type: text/html; charset=utf-8");
	echo "SIAPE: ";
	echo "<br>";
	echo $_SESSION['siape'];
	echo "<br>";
	echo "<br>";
	
	

	$qtd_extensao_p1 = intval($_SESSION['extensao1']);
    $qtd_extensao_p2 = intval($_SESSION['extensao2']);

    if( $qtd_extensao_p1 > 5){
         $qtd_extensao_p1 = 5;
    }

    if( $qtd_extensao_p2 > 5){
         $qtd_extensao_p2 = 5;
    }


    echo "<br>";
   	echo "<h3>Com fomento</h3>";
   	echo "<br>";

    for ($i=1; $i <= $qtd_extensao_p1 ; $i++) {
    	echo "<br>";	
    	echo '<b>Titulo:</b>';
    	echo "<br>"; 
		echo  $_SESSION['titulo51'.$i];
		echo "<br>";	
    	echo '<b>Fomento:</b>';
    	echo "<br>"; 
		echo  $_SESSION['fomento5'.$i];
		echo "<br>";	
    	echo '<b>Graducao:</b>';
    	echo "<br>"; 	 
		echo  $_SESSION['alunosGraduacao51'.$i];
		echo "<br>";	
    	echo '<b>Pos:</b>';
    	echo "<br>"; 	 
		echo  $_SESSION['alunosPos51'.$i];
		echo "<br>";	
    	echo '<b>Resumo:</b>';
    	echo "<br>"; 	echo "<br>";
		echo  $_SESSION['resumo51'.$i];
		echo "<br>";
   	}

   	echo "<br>";
   	echo "<h3>Sem fomento</h3>";
   	echo "<br>";

    for ($i=1; $i <= $qtd_extensao_p2 ; $i++) {
    	echo "<br>";	
    	echo '<b>Titulo:</b>';
    	echo "<br>"; 
		echo  $_SESSION['titulo52'.$i];
		echo "<br>";	
    	echo '<b>Graducao:</b>';
    	echo "<br>"; 	 	 
		echo  $_SESSION['alunosGraduacao52'.$i];
		echo "<br>";	
    	echo '<b>Pos:</b>';
    	echo "<br>"; 	 
		echo  $_SESSION['alunosPos52'.$i];
		echo "<br>";	
    	echo '<b>resumo:</b>';
    	echo "<br>"; 
		echo  $_SESSION['resumo52'.$i];
		echo "<br>";
   	}
?>