<?php
if(!@($conexao=pg_connect ("host=localhost dbname=avisos port=5432 user=postgres password=1"))) {
   print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
	
	//Entrada de Dados
	$login = $_POST['login'];
	$login = addslashes($login);
	$senha = md5($_POST['senha']); //Trasnforma em md5

	echo $login;

	//Verificando se o usuário está cadastrado no banco
	$sql = pg_query("SELECT usuario, senha FROM usuarios WHERE usuario = '$login' AND senha = '$senha'")
	or die ("Erro no comando SQL");
	
	//Verificamos as linhas afetadas pela consulta
	$row = pg_numrows($sql);	
  	 
	//Verificamos se retornou algo
	if($row == 0)
	//	echo "<b><center>Erro: Usuário ou Senha inválidos!!</b> <br><br> <a href=\"javascript: history.go(-1)\">Voltar Página Principal</a></center>";
	//Se $row é diferente de zero, retornou algo
	header("Location:../index_login.php");
	else{
		
		//$perfilBD = mysql_result($sql, 0, "perfil");
	
  		//Gravar os dados do usuario na sessao
		session_start();
		$_SESSION['user_login'] = $login;
		$_SESSION['user_logged_in']=true;

  		header("Location:./principal_adm.php");
	}

	pg_close ($conexao);
  	print "Conexão OK!"; 
}
?>
