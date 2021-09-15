<?php
 
  //Cookie
  setcookie("nome", $_POST['nome'], time() + (86400 * 30), "/");
  setcookie("siape", $_POST['siape'], time() + (86400 * 30), "/");
  setcookie("email", $_POST['email'], time() + (86400 * 30), "/");
  setcookie("link_lattes", $_POST['link_lattes'], time() + (86400 * 30), "/");
  
  

  $eixo_tecnologico = $_POST['eixo']; 
    
  if($eixo_tecnologico == 1){
  	setcookie("eixo_tecnologico", "Química e Meio Ambiente", time() + (86400 * 30), "/");
  	setcookie("laboratorio", $_POST['op1'], time() + (86400 * 30), "/");
  } else if($eixo_tecnologico == 2){
  	setcookie("eixo_tecnologico", "Computação", time() + (86400 * 30), "/");
  	setcookie("laboratorio", $_POST['op2'], time() + (86400 * 30), "/");
  } else if($eixo_tecnologico == 3){
  	setcookie("eixo_tecnologico", "Indústria", time() + (86400 * 30), "/");
  	setcookie("laboratorio", $_POST['op3'], time() + (86400 * 30), "/"); 
  }

  setcookie("emailLab", $_POST['emailLab'], time() + (86400 * 30), "/");
  setcookie("telefoneLab", $_POST['telefoneLab'], time() + (86400 * 30), "/");
  setcookie("atualizacoes", $_POST['atualizacoes'], time() + (86400 * 30), "/");
  setcookie("novoCoordenador", $_POST['novoCoordenador'], time() + (86400 * 30), "/");
  setcookie("novoSiape", $_POST['novoSiape'], time() + (86400 * 30), "/");
  setcookie("novoNomeLab", $_POST['novoNomeLab'], time() + (86400 * 30), "/");
  setcookie("novaSiglaLab", $_POST['novaSiglaLab'], time() + (86400 * 30), "/");
  setcookie("areas", $_POST['areas'], time() + (86400 * 30), "/");
  setcookie("apresentacao", $_POST['apresentacao'], time() + (86400 * 30), "/");


 

   header("Location:../forms/F2.php");
     
  //Inserindo informações no banco
  //$sql = pg_query("INSERT INTO form1(nome,siape,email,link_lattes,eixo_tecnologico,laboratorio,nd_bolsa_extensao,nd_voluntarios,qtd_disciplinas) 
  //VALUES ('$nome','$siape','$email','$link_lattes','$eixo_tecnologico','$laboratorio','$nd_bolsa_extensao','$nd_voluntarios','$qtd_disciplinas')")
  // or die ("Erro no comando SQL");

  //header("Location:../teste/teste_form1.php");
  
  //fechando conexao
   
?>