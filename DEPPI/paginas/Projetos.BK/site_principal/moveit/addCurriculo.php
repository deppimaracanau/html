<?php
	session_start();
	include_once("conexao.php");
  if((isset($_POST['curriculo']))&&($_POST['curriculo']!=null)&&($_POST['curriculo']!="")&&($_SESSION['curriculo']!=$_POST['curriculo'])){
  	if($_SESSION['curriculo']==""){
    	$id = 0;
    	$result = mysqli_query($con,"SELECT id FROM curriculopalestrante WHERE 1") or print mysql_error();
    	while($ids = mysqli_fetch_object($result)):
    		$ar = (array)$ids;
    		$aux = implode(",", $ar);
    		if($aux>$id){
    			$id = $aux;
    		}
    	endwhile;
    	$id++;
		$sql = "INSERT INTO curriculopalestrante (id,id_palestrante,curriculo) VALUES ({$id},{$_SESSION['id']},'{$_POST['curriculo']}')";
		$query = mysqli_query($con,$sql) or print mysql_error();
		echo $sql;
		$_SESSION['msgCurriculoOk'] = "Currículo inserido com sucesso";
  	}
  	else{
		$sql = "UPDATE curriculopalestrante SET curriculo='{$_POST['curriculo']}' WHERE id_palestrante={$_SESSION['id']}";
		$query = mysqli_query($con,$sql) or print mysql_error();
		echo $sql;
		$_SESSION['msgCurriculoOk'] = "Currículo atualizado com sucesso";
  	}
  	header("location: http://localhost/moveIT/meuCurriculo.php");
  }
?>