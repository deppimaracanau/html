<?php
session_start();
if (! isset($_SESSION['user_logged_in'])) {
    header('location:../index_login.php');
    exit();
}


include("../config_bd/conexao.php");
include("../config_bd/bd_numero_avisos.php");

/*if (! @($conexao = pg_connect("host=localhost dbname=avisos port=5432 user=postgres password=1"))) {
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    
    // pegando usuarios do banco de dados
    $sql1 = pg_query("SELECT quantidade FROM qtd_avisos;") or die("Erro no comando SQL");
    
    
    
    // TABELA: usuarios
    if (! $sql1) {
        echo "Consulta não foi executada!";
    }
    
    $_SESSION['qtd_usuarios'] = pg_numrows($sql1);
    
   
    while ($row = pg_fetch_array($sql1)) {
        $_SESSION['qtd'] = $row[0];
       
   
    }
}*/
?>

<html>
<head>
<title>SECI - Sistema Eletrônico de Comunicação Interna</title>
<meta charset="UTF-8">
<meta http-equiv="cache-control"
	content="no-store, no-cache, must-revalidate, Post-Check=0, Pre-Check=0">
<meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
<!-- link para bootstrap CSS -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!-- CSS -->
<style type="text/css">
body {
	background-color: white;
}

header {
	width: 100%;
	height: 80px;
	background-color: #1482b0; /* aplicando transparência no menu */
	z-index: 2; /* colocando na frente da imagem */
	position: relative;
}

header #logotipo {
	position: absolute;
	width: 252px;
	height: 102px;
	top: 10px;
	border: 3px solid white;
}

header .header-black {
	background-color: #dcdde1;
	height: 40px;
}

/* MENU - INÍCIO */
#menu-opcoes ul {
	padding: 0px;
	margin: 0px;
	background-color: #1482b0;
	list-style: none;
}

#menu-opcoes ul li {
	display: inline;
}

#menu-opcoes ul li a {
	padding: 6px 15px;
	display: inline-block;
	font-size: 20px;
	/* visual do link */
	background-color: #1482b0;
	color: white;
	text-decoration: none;
	border-bottom: 3px solid #1482b0;
	height: 40px;
}

#menu-opcoes ul li a:hover {
	background-color: #1d9bcf;
	color: white;
	border-bottom: 3px solid white;
}

.header-black {
	padding-top: 10px;
}

.container {
	margin: 0 auto;
	width: 940px;
}

#container1 {
	padding: 90px 0px 0px 40px;
	margin: 0 auto;
	width: 940px;
}

.modelo {
	width: 50%;
	height: 188px;
	background-color: #dcdde1;
	margin-bottom: 20px;
	padding: 25px 25px 25px 25px;
}

select {
	background-color: gray;
	border: 1px solid gray;
	font-size: 16px;
	height: 25px;
	width: 150px;
	color: white;
}

/*exibição mensagem aguarde...*/
#blanket, #aguarde {
	position: fixed;
	display: none;
}

#blanket {
	left: 0;
	top: 0;
	background-color: #f0f0f0;
	filter: alpha(opacity = 65);
	height: 100%;
	width: 100%;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=65)";
	opacity: 0.65;
	z-index: 9998;
}

#aguarde {
	width: auto;
	height: 30px;
	top: 40%;
	left: 45%;
	background: url('http://i.imgur.com/SpJvla7.gif') no-repeat 0 50%;
	line-height: 30px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	z-index: 9999;
	padding-left: 27px;
}

.qtd{
    text-color: black;
    border: 1px solid gray;
    font-size: 18px;
    padding: 4px 4px 4px 4px;
}

</style>
</head>
<body>

	<!-- Cabeçalho -->
	<header>

		<div class="header-black">
			<div class="container">
				<!-- container é do bootstrap -->
				<div class="pull-right">
					<!-- alinha informação para direita, até limites do container -->
                		<?php
                echo "Olá, " . $_SESSION['user_login'] . " | <a href='logout.php'>Encerrar Sessão</a>";
                ?>
                	</div>
			</div>
		</div>

		<div class="container">
			<!-- container é do bootstrap -->

			<div class="row">
				<nav id="menu-opcoes" class="pull-right">
					<ul>
						<li><a href="./principal_adm.php">Página Inicial</a></li>
						<li><a href="./modelos.php">Criar avisos</a></li>
						<li><a href="./galeria.php">Galeria</a></li>
						<li><a href="./configuracao.php">Configuração</a></li>
					</ul>
				</nav>

			</div>

		</div>

		<div class="container">
			<!-- logo -->
			<img id="logotipo" src="../imagens/logo.png" alt="logotipo">
		</div>

	</header>
		<div id="container1" >
		
		<div id="blanket"></div>
			<div id="aguarde">Aguarde...</div>
			
			<form method="post" action="../config_bd/bd_mudar_qtd_avisos.php" class="modelo">
			
			Quantidade atual de avisos: <span class="qtd"><b><?php echo $_SESSION['qtd'];?></b></span><br><br>
			Mudar quantidade de avisos:<br>
				<select name="qtd">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
				</select><br><br>
			<input onclick="javascript:document.getElementById('blanket').style.display = 'block';document.getElementById('aguarde').style.display = 'block';" class="btn btn-primary fonte_menus" type="submit" value="Alterar"/>
			</form>
		</div>


</body>
</html>