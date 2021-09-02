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

		<title>Registrar Vaga</title>
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

			$consultaVaga = pg_query($conexao, "SELECT * FROM vaga");
			$consultaEmpresa = pg_query($conexao, "SELECT * FROM empresa");
			$consultaTipo = pg_query($conexao, "SELECT * FROM tipo_vaga");
			$consultaArea = pg_query($conexao, "SELECT * FROM area");

			$vagas= "";
			$empresas = "";
			$tipos = "";
			$areas = "";

			while($row = pg_fetch_array($consultaVaga)) 
		    	$vagas .= "<option value=\"$row[0]\">$row[1]</option>";
			while($row = pg_fetch_array($consultaEmpresa)) 
		    	$empresas .= "<option value=\"$row[0]\">$row[1]</option>";
			while($row = pg_fetch_array($consultaTipo)) 
		    	$tipos .= "<option value=\"$row[0]\">$row[1]</option>";
		    while($row = pg_fetch_array($consultaArea)) 
		    	$areas .= "<option value=\"$row[0]\">$row[1]</option>";

		    $_SESSION['vagas'] = $vagas;
		    $_SESSION['empresas'] = $empresas;
		    $_SESSION['tipos'] = $tipos;
		    $_SESSION['areas'] = $areas;
		  
		}
	?>

	<body>
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
					<form method="POST" action="../bd/vaga.php">
						<div class="col-sm-9">
							<label for="atualizarEmpresa">Selecione a vaga que se deseja editar os dados:</label>
							<select class="form-control" id="atualizarEmpresa" name="atualizarEmpresa">
								<option value="" selected disabled="">Selecione uma opção</option>
								<?php echo $_SESSION['vagas']; ?>
							</select>
						</div>
						<div class="col-sm-3">
							<center> <br>
								<button type="submit" class="btn btn-success botao">Carregar Dados</button>
							</center>
						</div>
						
					</form>
				</div>

				<div class="row">
					<form method="POST" action="../bd/vaga.php">
						<label for="nomeVaga">Título da Vaga:</label>
						<input type="text" class="form-control" id="nomeVaga" name="nomeVaga">

						<label for="descricaoVaga">Descrição da Vaga:</label>
						<textarea type="text" class="form-control" id="descricaoVaga" name="descricaoVaga"> </textarea>

						<label for="salario">Salario:</label>
						<input type="text" class="form-control" id="salario" name="salario">

						<label for="horario">Horario:</label>
						<input type="text" class="form-control" id="horario" name="horario">

						<label for="idEmpresa">Empresa:</label>
						<select class="form-control" id="idEmpresa" name="idEmpresa">
							<option value="" selected disabled="">Selecione uma opção</option>
							<?= $_SESSION['empresas']; ?>
						</select>

						<label for="idTipo">Tipo da Vaga:</label>
						<select class="form-control" id="idTipo" name="idTipo">
							<option value="" selected disabled="">Selecione uma opção</option>
							<?= $_SESSION['tipos']; ?>
						</select>

						<label for="idArea">Área:</label>
						<select class="form-control" id="idArea" name="idArea">
							<option value="" selected disabled="">Selecione uma opção</option>
							<?= $_SESSION['areas']; ?>
						</select>

						<label for="emailContato">Email:</label>
						<input type="email" class="form-control" id="emailContato" name="emailContato">

						<label for="dataLimite">Data Limite:</label>
						<input type="text" class="form-control" id="dataLimite" name="dataLimite">

						<center> <br><br>
							<button type="submit" class="btn btn-success botao">Cadastrar</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

<!-- -- Mostrador de data -- -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
	$( function() {
		$( "#dataLimite" ).datepicker();
	} );
</script>