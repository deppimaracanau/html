<?php
  
     
  	
      //alterando arquivo.txt
      $f = fopen("arquivo.txt", "r+");
      $text = 'a';
      fwrite($f, $text);
      fclose($f);
		header("Location:./principal_adm.php");

?>




