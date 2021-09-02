<?php
	session_start();
	include_once('conexao.php');
	//Preparando algumas coisas
	$urlAnterior = $_POST['urlAnterior'];

	if((intval($_POST['horaInicioH'])>intval($_POST['horaTerminoH']))||((intval($_POST['horaInicioH'])==intval($_POST['horaTerminoH']))&&(intval($_POST['horaInicioM'])>=intval($_POST['horaTerminoM'])))){
		$_SESSION['msgErrorCreatePalestra'] = "Horário Inválido";
		header("location:".$urlAnterior);
	}else{
		$idPalestra = 0;
	    $result = mysqli_query($con,"SELECT id FROM palestras WHERE 1") or print mysql_error();
	    while($ids = mysqli_fetch_object($result)):
	    	$ar = (array)$ids;
	    	$aux = implode(",", $ar);
	    	if($aux>$idPalestra){
	    		$idPalestra = $aux;
	    	}
	    endwhile;
	    $idPalestra++;
		$horaInicio = $_POST['horaInicioH'].":".$_POST['horaInicioM'];
		$horaTermino = $_POST['horaTerminoH'].":".$_POST['horaTerminoM'];
		$estado = 0;
		$local = "A definir";
		if($_SESSION['nivelAcesso']==1){
			$estado = $_POST['estado']=="ON" ? 1 : 0;
		}
		$descricao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['descricao'])));
		$link_img = $_POST['link_img'] == "" ? "http://www.gravatar.com/avatar/29bb3e682ed402db108b63a7ce1c73a5?s=72&d=retro" : $_POST['link_img'];
		$qtVagas = 0;
		if(isset($qtVagas)&&($qtVagas!=NULL)){
			$qtVagas = $_POST['qtVagas'];
		}
		//$nomenclaturas = ['titulo','descricao','necessidades','qtVagas','horaInicio','horaTermino','data','estado','local','link_img'];
		//$dados = [$_POST['titulo'],$descricao,$_POST['necessidades'],$_POST['qtVagas'],$horaInicio,$horaTermino,$_SESSION['data'],$estado,$_POST['local'],$link_img];
		
		//Criando
		$sql = "INSERT INTO palestras VALUES ({$idPalestra},{$_SESSION['id']},{$estado},'{$_POST['titulo']}','{$descricao}','{$horaInicio}','{$horaTermino}','{$_POST['data']}','{$local}','{$_POST['necessidades']}',{$qtVagas},'{$link_img}')";
		$query = mysqli_query($con,$sql);
		//Fechando a conexão
		mysqli_close($con);
		$_SESSION['msgOkCreatePalestra'] = "Palestra criada com sucesso";
		//header("location:".$urlAnterior);
	}
?>