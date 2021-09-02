<?php
  
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
	
     
      //img1
      $ext = strtolower(substr($_FILES['fileUpload1']['name'],-4)); //Pegando extensão do arquivo
      $nome =  $_POST['nomeImg1'];
      $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
      $dir = '../imagens/tipo03/'; //Diretório para uploads
      move_uploaded_file($_FILES['fileUpload1']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

		
		header("Location:../gerar_modelo03.php");
?>




