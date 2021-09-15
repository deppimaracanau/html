<?php
  
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
	
     
      //img1
      $ext = strtolower(substr($_FILES['fileUpload1']['name'],-4)); //Pegando extensão do arquivo
      $nome =  $_POST['nomeImg1'];
      $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
      $dir = 'uploads/'; //Diretório para uploads
      move_uploaded_file($_FILES['fileUpload1']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

		//Salvando cópia da imagem na galeria
		$um = "1";
		$new_name_gallery = date("Y.m.d-H.i.s").$um.$ext; 
		$dir_gallery = 'galeria_avisos/'; 
		copy($dir.$new_name, $dir_gallery.$new_name_gallery);


      //img2
      $ext = strtolower(substr($_FILES['fileUpload2']['name'],-4)); //Pegando extensão do arquivo
      $nome =  $_POST['nomeImg2'];
      $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
      $dir = 'uploads/'; //Diretório para uploads
      move_uploaded_file($_FILES['fileUpload2']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

		//Salvando cópia da imagem na galeria
		$dois = "2";
		$new_name_gallery = date("Y.m.d-H.i.s").$dois.$ext; 
		$dir_gallery = 'galeria_avisos/'; 
		copy($dir.$new_name, $dir_gallery.$new_name_gallery);

      //img3
      $ext = strtolower(substr($_FILES['fileUpload3']['name'],-4)); //Pegando extensão do arquivo
      $nome =  $_POST['nomeImg3'];
      $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
      $dir = 'uploads/'; //Diretório para uploads
      move_uploaded_file($_FILES['fileUpload3']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

		//Salvando cópia da imagem na galeria
		$tres = "3";
		$new_name_gallery = date("Y.m.d-H.i.s").$tres.$ext; 
		$dir_gallery = 'galeria_avisos/'; 
		copy($dir.$new_name, $dir_gallery.$new_name_gallery);

      //img4
      $ext = strtolower(substr($_FILES['fileUpload4']['name'],-4)); //Pegando extensão do arquivo
      $nome =  $_POST['nomeImg4'];
      $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
      $dir = 'uploads/'; //Diretório para uploads
      move_uploaded_file($_FILES['fileUpload4']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
  	
		//Salvando cópia da imagem na galeria
		$quatro = "4";
		$new_name_gallery = date("Y.m.d-H.i.s").$quatro.$ext; 
		$dir_gallery = 'galeria_avisos/'; 
		copy($dir.$new_name, $dir_gallery.$new_name_gallery);

      //Novo
      //img5
      $ext = strtolower(substr($_FILES['fileUpload5']['name'],-4)); //Pegando extensão do arquivo
      $nome =  $_POST['nomeImg5'];
      $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
      $dir = 'uploads/'; //Diretório para uploads
      move_uploaded_file($_FILES['fileUpload5']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
      
            //Salvando cópia da imagem na galeria
            $cinco = "5";
            $new_name_gallery = date("Y.m.d-H.i.s").$cinco.$ext; 
            $dir_gallery = 'galeria_avisos/'; 
            copy($dir.$new_name, $dir_gallery.$new_name_gallery);

      //img6
      $ext = strtolower(substr($_FILES['fileUpload6']['name'],-4)); //Pegando extensão do arquivo
      $nome =  $_POST['nomeImg6'];
      $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
      $dir = 'uploads/'; //Diretório para uploads
      move_uploaded_file($_FILES['fileUpload6']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
      
            //Salvando cópia da imagem na galeria
            $seis = "6";
            $new_name_gallery = date("Y.m.d-H.i.s").$seis.$ext; 
            $dir_gallery = 'galeria_avisos/'; 
            copy($dir.$new_name, $dir_gallery.$new_name_gallery);


      //alterando arquivo.txt
      $f = fopen("arquivo.txt", "r+"); //Abre para leitura e gravação; coloca o ponteiro no começo do arquivo.
      $text = 'b';
      fwrite($f, $text);
      fclose($f);

		sleep(10); // Espera 10 segundos para dá tempo o raspberry atualizar os avisos, tempo muito pegueno pode não atualizar
		
		//alterando arquivo.txt
		$f = fopen("arquivo.txt", "r+");
      $text = 'a';
      fwrite($f, $text);
      fclose($f);
		header("Location:./principal_adm.php");
?>




