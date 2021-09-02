<?php
session_start();
if (! isset($_SESSION['user_logged_in'])) {
    header('location:../index_login.php');
    exit();
}


include("../config_bd/conexao.php");
include("../config_bd/bd_subcategorias.php");


/*
if (! @($conexao = pg_connect("host=localhost dbname=avisos port=5432 user=postgres password=1"))) {
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    
    // pegando usuarios do banco de dados
    $sql1 = pg_query("SELECT id,nome FROM subcategoria ORDER BY nome ASC;") or die("Erro no comando SQL");
    
    
    
    // TABELA: usuarios
    if (! $sql1) {
        echo "Consulta não foi executada!";
    }
    
    $_SESSION['qtd_subcategorias'] = pg_numrows($sql1);
    
    $i = 0;
    while ($row = pg_fetch_array($sql1)) {
        $_SESSION['id'.$i] = $row[0];
        $_SESSION['nome'.$i] = $row[1];
        $i++;
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
#container1{
 padding: 90px 0px 0px 40px;
 margin: 0 auto;
	width: 940px;
 
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

	<div id="container1">
	
		<a href="./subcategoria_nova.php"class="pull-right">+ Adicionar nova subcategoria</a><br><br>
		<table class="table">
		
			
			<thead >
				<tr>
					
					<th scope="col">Subcategoria</th>
				
					<th scope="col">Ação</th>
				</tr>
			</thead>
			<tbody>
			
			
			
				
						<!-- Categorias valores do banco de dados -->
    				<?php
                        $i = 0;
                        while ($i< $_SESSION['qtd_subcategorias']) {
                    ?>
                    <form method="post" action="../config_bd/bd_deletar_subcategoria.php">
    					<tr>
    					<input type='hidden' name='id' value='<?php echo $_SESSION['id'.$i];  ?>'>
    					<td><?php echo $_SESSION['nome'.$i]; ?></td>
    					
    					<td>
    					
    					<input  class="btn btn-primary fonte_menus" type="submit" value="Excluir"/></td>
    					</form>
    					</tr>
       				<?php
                        $i++;
                        }
                    ?>
      
				
				
			</tbody>
		</table>
		
		
	</div>
</body>

</html>