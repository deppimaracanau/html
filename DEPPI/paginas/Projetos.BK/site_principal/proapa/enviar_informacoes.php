 <?php
  header("Content-type: text/html; charset=utf-8");
  if(!@($conexao=pg_connect ("host=localhost dbname=proapa port=5432 user=postgres password=1"))) {
   print "Não foi possível estabelecer uma conexão com o banco de dados.";
  } 
  else {

    //Recebendo dados do formulário 
    $nome =  $_POST['nome'];
    $siape =  $_POST['siape'];
    $email = $_POST['email'];
    $area_tematica= $_POST['area']; 
    //$tmp_name = $_FILES['pesquisa']['tmp_name'];
    	
    //Criando pasta com nome do pesquisador onde ficará os documentos em pdf
    umask(0); mkdir("./documentos_em_pdf/$nome", 0777, true) or die(header("Location:./erro.html"));
	  $dir = "./documentos_em_pdf/$nome/"; //Erro no caminho era só a / no fim 
    $uploadfile = basename($_FILES['pesquisa']['name']);
    $uploadfile1 = basename($_FILES['curriculo']['name']);
    
    $doc1 = "PESQUISA_";
    $doc2 = "CURRICULO_";


    if (move_uploaded_file($_FILES['pesquisa']['tmp_name'],$dir.$doc1.$uploadfile) && move_uploaded_file($_FILES['curriculo']['tmp_name'],$dir.$doc2.$uploadfile1)) {
       header("Location:./confirmacao.html");
    } else {
        header("Location:./erro.html");
    }


    //Inserindo informações no banco
    $sql = pg_query("INSERT INTO pesquisador(nome,siape, email,area_tematica)values('$nome','$siape','$email','$area_tematica')")
  	or die ("Erro no comando SQL");
	
    //fechando conexao
	  pg_close ($conexao);

  }
?>