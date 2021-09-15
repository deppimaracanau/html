 <?php
  

 	 $ext = strtolower(substr($_FILES['fileUpload1']['name'],-4)); //Pegando extensão do arquivo
      $nome =  $_POST['nomes'];
      $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
      $dir = './nomes'; //Diretório para uploads
      move_uploaded_file($_FILES['fileUpload1']['tmp_name'], $dir.'.txt');

      header("Location:./dados_certificados.php");

  ?>