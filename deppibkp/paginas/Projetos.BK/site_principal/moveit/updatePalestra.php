<?php
	session_start();
	include_once('conexao.php');
	//Preparando algumas coisas
	$urlAnterior = $_POST['urlAnterior'];
	$idPalestra = $_POST['idPalestra'];
	if((intval($_POST['horaInicioH'])>intval($_POST['horaTerminoH']))||((intval($_POST['horaInicioH'])==intval($_POST['horaTerminoH']))&&(intval($_POST['horaInicioM'])>=intval($_POST['horaTerminoM'])))){
		$_SESSION['msgErrorUpPalestra'] = "Horário Inválido";
		header("location:".$urlAnterior);
	}else{
		$horaInicio = $_POST['horaInicioH'].":".$_POST['horaInicioM'];
		$horaTermino = $_POST['horaTerminoH'].":".$_POST['horaTerminoM'];
		$estado = 0;
		$local = "";
		if($_SESSION['nivelAcesso']==1){
			$estado = $_POST['estado']=="ON" ? 1 : 0;
			$local = $_POST['local']!="A definir" ? $_POST['local'] : "";
		}
		$descricao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['descricao'])));
		$link_img = $_POST['link_img'] == "" ? "http://www.gravatar.com/avatar/29bb3e682ed402db108b63a7ce1c73a5?s=72&d=retro" : $_POST['link_img'];
		$nomenclaturas = ['titulo','descricao','necessidades','qtVagas','horaInicio','horaTermino','data','estado','local','link_img'];
		$dados = [$_POST['titulo'],$descricao,$_POST['necessidades'],$_POST['qtVagas'],$horaInicio,$horaTermino,$_SESSION['data'],$estado,$local,$link_img];
		
		//Pegando dados do BD
		$result = mysqli_query($con,"SELECT * FROM palestras WHERE id ='{$idPalestra}'");
		$resultado = mysqli_fetch_assoc($result);
		//Alterando
		$i = 0;
		$sql="UPDATE palestras SET ";
		foreach ($nomenclaturas as $key) {
			if($resultado[$key]!=$dados[$i]){
				//Altera dado
				$dado = "'".$dados[$i]."'";
				if($key=="qtVagas"){
					$dado = $dados[$i];
				}
				$sql.=$key."=".$dado." WHERE id = ".$idPalestra;
				echo $sql;
				//Verifica se deu bug
				if(!($con->query($sql))){
					echo "Error ".$con->error;
				}
				$sql = "UPDATE palestras SET ";
			}
			$i++;
		}
		//Fechando a conexão
		mysqli_close($con);
		$_SESSION['msgOkUpPalestra'] = "Palestra editada com sucesso";
		header("location:".$urlAnterior);
	}
?>