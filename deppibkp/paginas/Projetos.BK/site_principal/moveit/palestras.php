
<?php
	function excluirPalestra(){
		if(isset($_GET['id'])&&isset($_GET['excluir'])&&($_GET['excluir']==true)&&(($_SESSION['nivelAcesso']==1)||($_SESSION['nivelAcesso']==2))){
	 		$where = ["id={$_GET['id']}","id_palestra={$_GET['id']}"];
	 		$table = ["palestras","inscritosPalestras"];
	 		for ($i=0; $i < 2; $i++) {
	 			$sql = "DELETE FROM ".$table[$i]." WHERE ".$where[$i];
		 		if($_SESSION['nivelAcesso']==2){
		 			$sql.=" AND id_palestrante={$_SESSION['id']}";
		 		}
	 			$result = mysqli_query($_SESSION['con'],$sql) or print mysql_error();
	 		}
		}
	}
	function mostrarPalestra($dados){
		$data = substr($dados[7],8,9)."/".substr($dados[7],-5,-3)."/".substr($dados[7],0,4);
		$urlAtual = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$status = $dados[2]==1 ? "<span style='color:#28a745'>On</span>" : "<span style='color:#dc3545'>Off</span>";
		$local = $dados[8]=='' ? "A Definir" : $dados[8];
		$editar = '<div class="col-md-4" style="opacity:0 !important; cursor: default !important"><a" class="btn btn-primary" style="cursor: default !important">Texto</a></div>';
		$excluir = '<div class="col-md-4" style="opacity:0 !important"><a" class="btn btn-primary" style="cursor: default !important">Texto</a></div>';
		if(($dados[1]==$_SESSION['id'])||$_SESSION['nivelAcesso']==1){
			$editar = '<div class="col-md-4 col-4"><a href="editarPalestra.php?id='.$dados[0].'" class="btn btn-primary">Editar</a></div>';
			$excluir = '<div class="col-md-4 col-4"><a href="'.$urlAtual.'?id='.$dados[0].'&excluir=true" class="btn btn-danger">Excluir</a></div>';
		}
		$divPalestra = '
		  <div class="col-md-5">
		    <div class="card">
		      <div class="card-header">
		      	<div class="row">
		      	<div class="col-4">'.$data.'</div>
		      	<div class="col-8 text-right">'.$dados[5].' ás '.$dados[6].'</div>
		      	</div>
		      </div>
		      <div class="card-body">
		      	<div class="row align-items-center">
		      		<div class="col-md-4 col-4">
		      			<img src="'.$dados[11].'" class="rounded-circle" alt="Cinque Terre" width="100" height="100"> 
		      		</div>
		      		<div class="col-md-8 col-8 text-center">
				        <p class="card-text"><a href="verPalestra.php?id='.$dados[0].'">'.$dados[3].'</a></p>
		        	</div>
		      	</div>
		      	<div class="row align-items-center">'.$editar.$excluir.'</div>
		      </div>
		      <div class="card-footer">
			      <div class="row">
			      	<div class="col-md-7 col-7">Local: '.$local.'</div>
			      	<div class="col-md-5 col-5 text-right">Status: '.$status.'</div>
			      </div>
		      </div>
		    </div>
		  </div>
		';

		echo $divPalestra;
	}
	function listarPalestras($opt){
		//Se op1 == 1 (Listar Programação), se 2 (Listar Minhas Palestras), se 3 (Gerenciar Palestras)
		$where = "";
		$errorMsg = "";
		if($opt==1){
			$where = "estado =1";
			$errorMsg = "Não existem palestras a serem exibidas";
		}else if($opt==2){
			$where = "id_palestrante =".$_SESSION['id'];
			$errorMsg = "Você não possui palestras";
		}else if($opt==3){
			$where = "1=1";
		}
		$sql = mysqli_query($_SESSION['con'],"SELECT * FROM palestras WHERE ".$where) or print mysql_error();
		if(mysqli_num_rows($sql)<1){
			echo $errorMsg;
		}else{
	    	while($r = mysqli_fetch_object($sql)):
	    		$dadosPalestra = (array)$r;
				$arrayDadosPalestra = array();
				foreach ($dadosPalestra as $key) {
					$arrayDadosPalestra[] = $key;
				}
				mostrarPalestra($arrayDadosPalestra);
	    	endwhile;
	    }
		if(isset($_SESSION['nivelAcesso'])&&($_SESSION['nivelAcesso'])<3){
			echo '
		  <div class="col-md-5">
		    <div class="card">
		      <div class="card-header">
		      	<div class="row">
		      	<div class="col-4">Criar</div>
		      	<div class="col-8 text-right"></div>
		      	</div>
		      </div>
		      <div class="card-body">
		      	<p class="card-text text-center"><a href="criarPalestra.php">Criar Palestra</a></p>
		      </div>
		      <div class="card-footer">
			      <div class="row">
			      	<div class="col-md-7 col-7" style="color:white">--</div>
			      	<div class="col-md-5 col-5 text-right"></div>
			      </div>
		      </div>
		    </div>
		  </div>
		';
		}
	}
	excluirPalestra();
?>