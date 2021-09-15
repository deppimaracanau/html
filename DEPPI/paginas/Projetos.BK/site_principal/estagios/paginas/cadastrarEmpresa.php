<?php
	// Verificação de Autenticação
	session_start();
	if( !isset($_SESSION['id']) )
		header('Location: ../index.php?cod=1');

	// Nome do usuário da sessão
	$nomeDiv = explode(" ", $_SESSION['nome']);
	$nome = strtoupper($nomeDiv[0]);

	// Conexão com o banco de dados
	require_once('../bd/bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();


	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$sql = " SELECT COUNT(*) FROM vagas";
		$consulta = pg_query($conexao, $sql);
		$qtdVagas = 0;
		if($consulta){
			$registro = pg_fetch_array($consulta);
			$qtdVagas = $registro[0];
		} else {
			echo 'Erro ao executar a query';
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Cadastrar Empresa</title>
		<link rel="icon" href="../favicon.ico">

	    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../css/estilo.css" rel="stylesheet">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="../bootstrap/js/bootstrap.min.js"></script>
	</head>

	<?php 
		// Conexão com o banco de dados
		require_once('../bd/bd.class.php');
		$bd = new bd();
		$conexao = $bd->estabelecerConexao();

		if($conexao == null) {
	        print "Não foi possível estabelecer uma conexão com o banco de dados.";

		} else {
			session_start();

			$consultaEmpresa = pg_query($conexao, "SELECT * FROM empresa");
			$consultaMunicipio = pg_query($conexao, "SELECT * FROM municipio");
			$consultaBairro = pg_query($conexao, "SELECT * FROM bairro");

			$empresas = "";
			$municipios = "";
			$bairros = "";

			while($row = pg_fetch_array($consultaEmpresa)) 
		    	$empresas .= "<option value=\"$row[0]\">$row[1]</option>";
			while($row = pg_fetch_array($consultaMunicipio)) 
		    	$municipios .= "<option value=\"$row[0]\">$row[1]</option>";
		    while($row = pg_fetch_array($consultaBairro)) 
		    	$bairros .= "<option value=\"$row[0]\">$row[1]</option>";

		    $_SESSION['empresas'] = $empresas;
		    $_SESSION['municipios'] = $municipios;
		    $_SESSION['bairros'] = $bairros;
		  
		}
	?>

	<?php
		$empresa = $_POST['atualizarEmpresa'];
		if($empresa != '')
			
			if($conexao == null) {
			    print "Não foi possível estabelecer uma conexão com o banco de dados.";

			} else {
				session_start();

				$consultaEmpresaAtualiza = pg_query($conexao, "SELECT * FROM empresa WHERE id_empresa = $empresa");

				$empresa = "";

				while($row = pg_fetch_array($consultaEmpresaAtualiza)) {
					$_SESSION['empresaId'] = $row[0];
					$_SESSION['empresaNome'] = $row[1];
					$_SESSION['empresaRua'] = $row[2];
					$_SESSION['empresaComplemento'] = $row[3];
					$_SESSION['empresaBairro'] = $row[4];
					$_SESSION['empresaEmail'] = $row[5];
					$_SESSION['empresaTelefone'] = $row[6];
					$_SESSION['empresaResponsavel'] = $row[7];
				}
			  
			}
	?>

	<body onload="carregarCampos()">
		<!-- ------------------- Barra de Navegação ------------------- -->
	    <nav class="navbar navbar-default navbar-fixed-top barra">
		    <div class="container">
		        
		    	<div class="navbar-header">
		            <button type="button" class="navbar-toggle collapsed" 
		                  data-toggle="collapse" data-target="#barra-navegacao">
		            <span class="sr-only">Alternar Menu</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          	</button>
		        	<a href="home.php" class="navbar-brand"><span class="logo">IFCE</span></a>
		        </div>

		        <div class="collapse navbar-collapse" id="barra-navegacao">
					<ul class="nav navbar-nav navbar-right">
						<li><a>Logado como <?= $nome ?>, </a> </li>
						<li><a href="../bd/usuarioSair.php">LogOut</a> </li>
					</ul>
		        </div>

		    </div>
	    </nav>

	    <br><br><br><br><br><br>

		<div class="container">
			<div class="col-sm-2">
				<div class="panel panel-default">
	    			<div class="panel-body">
	    				<h3>MENU</h3>
	    				<hr>
	    				<li> <a href="home.php">Home</a> </li>
	    				<li> <a href="cadastrarEmpresa.php">Empresas</a> </li>
						<li> <a href="registrarVaga.php">Vagas</a> </li>
						<li> <a href="mostrarGrafico.php">Gráficos</a> </li>

						<br><br>

						<h3>Total</h3>
	    				<hr>
	    				<?= $qtdVagas ?> vagas
	    			</div>
	    		</div>
			</div>

			<div class="col-sm-10">
				<div class="row">
					<form method="POST" action="">
						<div class="col-sm-9">
							<label for="atualizarEmpresa">Selecione a empresa que se deseja editar os dados:</label>
							<select class="form-control" id="atualizarEmpresa" name="atualizarEmpresa">
								<option value="" selected disabled="">Selecione uma opção</option>
								<?php echo $_SESSION['empresas']; ?>
							</select>
						</div>
						<div class="col-sm-3">
							<center> <br>
								<button type="submit" class="btn btn-info botao">Carregar Dados</button>
							</center>
						</div>
						
					</form>
				</div>

				<div class="row">
					<form method="POST" action="../bd/empresa.php">
						<label for="nomeEmpresa">Nome da Empresa:</label>
						<input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa">
						<input type="number" class="hide" id="idEmpresa" name="idEmpresa">

						<label for="ruaEmpresa">Endereço:</label>
						<input type="text" class="form-control" id="ruaEmpresa" name="ruaEmpresa">

						<label for="complemento">Complemento:</label>
						<input type="text" class="form-control" id="complemento" name="complemento">


						<label for="municipio">Município:</label>
						<select class="form-control" id="municipio" name="municipio">
							<option value="" selected disabled="">Selecione uma opção</option>
							<?php echo $_SESSION['municipios']; ?>
						</select>

						<label for="bairro">Bairro:</label>
						<select class="form-control" id="bairro" name="bairro">
							<option value="" selected disabled="">Selecione uma opção</option>
							<?php echo $_SESSION['bairros']; ?>
						</select>

						<label for="emailEmpresa">Email:</label>
						<input type="email" class="form-control" id="emailEmpresa" name="emailEmpresa">

						<label for="telefone">Telefone:</label>
						<input type="text" class="form-control" id="telefone" name="telefone">

						<label for="responsavel">Responsavel:</label>
						<input type="text" class="form-control" id="responsavel" name="responsavel">

						<center> <br><br>
							<button type="submit" class="btn btn-success botao" id="botao">Cadastrar</button>
						</center>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			function carregarCampos() {
				if("<?php print $_POST['atualizarEmpresa']; ?>" != "")
	        		window.setTimeout('carregarCamposAction()', 500);
	        }
	        
			function carregarCamposAction() {
				document.getElementById('botao').innerHTML = "Atualizar Dados";

				var empresa = document.getElementById('atualizarEmpresa');
				var idEmpresa = document.getElementById('idEmpresa');
				var campo1 = document.getElementById('nomeEmpresa');
				var campo2 = document.getElementById('ruaEmpresa');
				var campo3 = document.getElementById('complemento');
				var campo4 = document.getElementById('bairro');
				var campo5 = document.getElementById('emailEmpresa');
				var campo6 = document.getElementById('telefone');
				var campo7 = document.getElementById('responsavel');

				empresa.value = "<?php print $_SESSION['empresaId']; ?>";
				idEmpresa.value = "<?php print $_SESSION['empresaId']; ?>";
				campo1.value = "<?php print $_SESSION['empresaNome']; ?>";
				campo2.value = "<?php print $_SESSION['empresaRua']; ?>";
				campo3.value = "<?php print $_SESSION['empresaComplemento']; ?>";
				campo4.value = "<?php print $_SESSION['empresaBairro']; ?>";
				campo5.value = "<?php print $_SESSION['empresaEmail']; ?>";
				campo6.value = "<?php print $_SESSION['empresaTelefone']; ?>";
				campo7.value = "<?php print $_SESSION['empresaResponsavel']; ?>";
			}
		</script>

	</body>
</html>