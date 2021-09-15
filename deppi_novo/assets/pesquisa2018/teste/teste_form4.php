<?php
	session_start(); //abrindo session
	header("Content-type: text/html; charset=utf-8");
	echo "SIAPE: ";
	echo "<br>";
	echo $_SESSION['siape'];
	echo "<br>";
	echo "<br>";	
   	echo '<b>TCC:</b>';
   	echo "<br>"; 
	echo $_SESSION['tcc'];
	echo "<br>";
	echo "<a href='../forms/F5.html'>Próximo</a>";

?>
