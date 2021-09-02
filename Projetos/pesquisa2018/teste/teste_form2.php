<?php
	session_start(); //abrindo session
	header("Content-type: text/html; charset=utf-8");
	echo "SIAPE: ";
	echo "<br>";
	echo $_SESSION['siape'];
	echo "<br>";
	echo "<br>";
	echo $_SESSION['qtd_bolsa_extensao'];
	echo "<br>";
	echo "<br>";
	echo $_SESSION['qtd_voluntarios'];
	echo "<br>";
	echo "<br>";
	echo $_SESSION['qtd_professores'];
	echo "<br>";
	echo "<br>";

	$qtd_prof = $_SESSION['qtd_professores'];
	if($qtd_prof>0){
		 for ($i=1; $i <= $qtd_prof ; $i++) {
		 	echo $_SESSION['professor'.$i];
        	echo $_SESSION['lattesProf'.$i];
		 }
	}

	
	

	/*$qtd_projetos_p1 = intval($_SESSION['pesquisa1']);
	$qtd_projetos_p2 = intval($_SESSION['pesquisa2']);

    if( $qtd_projetos_p1 > 5){
         $qtd_projetos_p1 = 5;
    }

     if( $qtd_projetos_p2 > 5){
         $qtd_projetos_p2 = 5;
    }



  
    	echo "<br>";
    	echo '<b>Qtd_bolsa:</b>';
    	echo "<br>";
		echo  $_SESSION['qtd_bolsa_extensao'];
		echo "<br>";
    	echo '<b>Fomento:</b>';
    	echo "<br>";	 
		echo  $_SESSION['fomento'.$i];
		echo "<br>";
    	echo '<b>Graduação:</b>';
    	echo "<br>";	 
		echo  $_SESSION['alunosGraduacao1'.$i];
		echo "<br>";	
    	echo '<b>Pos:</b>';
    	echo "<br>"; 
		echo  $_SESSION['alunosPos1'.$i];
		echo "<br>";	
    	echo '<b>Resumo:</b>';
    	echo "<br>"; 
		echo  $_SESSION['resumo1'.$i];
		echo "<br>";

   	}

  	echo "<br>";
   	echo "<h3>Sem fomento</h3>";
   	echo "<br>";

   	 for ($i=1; $i <= $qtd_projetos_p2 ; $i++) {
    	echo "<br>";
    	echo '<b>Titulo:</b>';
    	echo "<br>";
		echo  $_SESSION['titulo2'.$i];	 
		echo "<br>";
    	echo '<b>Graduação:</b>';
    	echo "<br>";
		echo  $_SESSION['alunosGraduacao2'.$i];
		echo "<br>";	
    	echo '<b>Pos:</b>';
    	echo "<br>"; 	 
		echo  $_SESSION['alunosPos2'.$i];
		echo "<br>";	
    	echo '<b>Resumo:</b>';
    	echo "<br>";  
		echo  $_SESSION['resumo2'.$i];
		echo "<br>";

   	}

   	echo "<br>";
   	echo "<br>";
   	
   	echo "<a href='../forms/F3.html'>Próximo</a>";
	/*if($_SESSION['pesquisa1'] == "1"){
		echo "<br>";
		echo  $_SESSION['titulo11'];
		echo "<br>";	 
		echo  $_SESSION['fomento1'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao11'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos11'];
		echo "<br>";	 
		echo  $_SESSION['resumo11'];
		echo "<br>";
	}

	if($_SESSION['pesquisa1'] == "2"){

		echo "<br>";
		echo  $_SESSION['titulo11'];
		echo "<br>";	 
		echo  $_SESSION['fomento1'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao11'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos11'];
		echo "<br>";	 
		echo  $_SESSION['resumo11'];
		echo "<br>";

		echo "<br>";	 
		echo  $_SESSION['titulo12'];
		echo "<br>";	 
		echo  $_SESSION['fomento2'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao12'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos12'];
		echo "<br>";	 
		echo  $_SESSION['resumo12'];
		echo "<br>";	
	}

	if($_SESSION['pesquisa1'] == "3"){

		echo "<br>";
		echo  $_SESSION['titulo11'];
		echo "<br>";	 
		echo  $_SESSION['fomento1'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao11'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos11'];
		echo "<br>";	 
		echo  $_SESSION['resumo11'];
		echo "<br>";

		echo "<br>";	 
		echo  $_SESSION['titulo12'];
		echo "<br>";	 
		echo  $_SESSION['fomento2'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao12'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos12'];
		echo "<br>";	 
		echo  $_SESSION['resumo12'];
		echo "<br>";	

		echo "<br>";	 
		echo  $_SESSION['titulo13'];
		echo "<br>";	 
		echo  $_SESSION['fomento3'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao13'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos13'];
		echo "<br>";	 
		echo  $_SESSION['resumo13'];
		echo "<br>";	
	}

	if($_SESSION['pesquisa1'] == "4"){

		echo "<br>";
		echo  $_SESSION['titulo11'];
		echo "<br>";	 
		echo  $_SESSION['fomento1'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao11'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos11'];
		echo "<br>";	 
		echo  $_SESSION['resumo11'];
		echo "<br>";

		echo "<br>";	 
		echo  $_SESSION['titulo12'];
		echo "<br>";	 
		echo  $_SESSION['fomento2'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao12'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos12'];
		echo "<br>";	 
		echo  $_SESSION['resumo12'];
		echo "<br>";

		echo "<br>";	 
		echo  $_SESSION['titulo13'];
		echo "<br>";	 
		echo  $_SESSION['fomento3'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao13'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos13'];
		echo "<br>";	 
		echo  $_SESSION['resumo13'];
		echo "<br>";	

		echo "<br>";	 
		echo  $_SESSION['titulo14'];
		echo "<br>";	 
		echo  $_SESSION['fomento4'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao14'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos14'];
		echo "<br>";	 
		echo  $_SESSION['resumo14'];
		echo "<br>";		
	}


	if($_SESSION['pesquisa1'] == "5"){

			echo "<br>";
		echo  $_SESSION['titulo11'];
		echo "<br>";	 
		echo  $_SESSION['fomento1'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao11'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos11'];
		echo "<br>";	 
		echo  $_SESSION['resumo11'];
		echo "<br>";

		echo "<br>";	 
		echo  $_SESSION['titulo12'];
		echo "<br>";	 
		echo  $_SESSION['fomento2'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao12'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos12'];
		echo "<br>";	 
		echo  $_SESSION['resumo12'];
		echo "<br>";

		echo "<br>";	 
		echo  $_SESSION['titulo13'];
		echo "<br>";	 
		echo  $_SESSION['fomento3'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao13'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos13'];
		echo "<br>";	 
		echo  $_SESSION['resumo13'];
		echo "<br>";	

		echo "<br>";	 
		echo  $_SESSION['titulo14'];
		echo "<br>";	 
		echo  $_SESSION['fomento4'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao14'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos14'];
		echo "<br>";	 
		echo  $_SESSION['resumo14'];
		echo "<br>";	


		echo "<br>";	 
		echo  $_SESSION['titulo15'];
		echo "<br>";	 
		echo  $_SESSION['fomento5'];
		echo "<br>";	 
		echo  $_SESSION['alunosGraduacao15'];
		echo "<br>";	 
		echo  $_SESSION['alunosPos15'];
		echo "<br>";	 
		echo  $_SESSION['resumo15'];
		echo "<br>";		
	}*/
?>
