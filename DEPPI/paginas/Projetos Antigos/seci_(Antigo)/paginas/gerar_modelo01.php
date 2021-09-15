<?php
session_start();
if (! isset($_SESSION['user_logged_in'])) {
    header('location:../index_login.php');
    exit();
}

include("../config_bd/conexao.php");
include("../config_bd/bd_categoria_subcategoria.php");


/*
if (! @($conexao = pg_connect("host=localhost dbname=avisos port=5432 user=postgres password=1"))) {
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    
    // pegando categorias do banco de dados
    $sql1 = pg_query("SELECT nome FROM categoria ORDER BY nome ASC;") or die("Erro no comando SQL");
    
    // pegando subcategorias do banco de dados
    $sql2 = pg_query("SELECT nome FROM subcategoria ORDER BY nome ASC;") or die("Erro no comando SQL");
    
    // TABELA: categoria
    if (! $sql1) {
        echo "Consulta não foi executada!";
    }
    
    // TABELA: subcategoria
    if (! $sql2) {
        echo "Consulta não foi executada!";
    }
    
   // $_SESSION['qtd_categoria'] = pg_num_rows($sql);
}*/

require_once ('func_image01.php');
// if form not submitted, show it and bail
if (! isset($_GET['title_text']) && ! isset($_GET['description_text'])) {
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

#parte01 {
	float: left;
	width: 50%;
	/*background-color: green;*/
	position: relative;
	top: 100px;
	padding: 15px;
}

#parte02 {
	float: left;
	width: 50%;
	/*background-color: black;*/
	position: relative;
	top: 75px;
	left: 20px;
	padding: 15px;
}

.container {
	margin: 0 auto;
	width: 940px;
}

.fundo {
	width: 940px;
	background-color: #dcdde1;
	margin-bottom: 20px;
}

input[type=text]:hover, textarea:hover {
	background: #ffffff;
	border: 1px solid #990000;
}



.cor1 {
	height: 45px;
	background-color: #520080;
	color: white;
	margin-top: 15px;
	padding: 7px;
	font-size: 17px;
}

.cor2 {
	height: 45px;
	background-color: #e59500;
	margin-top: 15px;
	padding: 7px;
	font-size: 17px;
}

.cor3 {
	height: 45px;
	background-color: #00bc98;
	margin-top: 15px;
	padding: 7px;
	font-size: 17px;
}

.cor4 {
	height: 45px;
	background-color: #a564ff;
	margin-top: 15px;
	padding: 7px;
	font-size: 17px;
}

.cor5 {
	height: 45px;
	background-color: 006fff;
	margin-top: 15px;
	padding: 7px;
	font-size: 17px;
}

select {
	background-color: gray;
	border: 1px solid gray;
	font-size: 16px;
	height: 25px;
	width: 268px;
	color: white;
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



	<div id="main" class="container">
		<!-- Conteúdo principal -->

		<form>
			<div id="parte01" class="fundo">

				<h5>Categorias</h5>
				<select name="category_text">
				
					<!-- Categorias valores do banco de dados -->
    				<?php
                        $i = 0;
                        while ($row = pg_fetch_array($sql1)) {
                    ?>
    					<option><?php echo $_SESSION['categoria'.$i] = $row[0]; ?></option>
       				<?php
                        $i++;
                        }
                    ?>
      
       				<!-- Categorias direto no html -->
					<!-- 
					
					<option>DIREÇÃO GERAL/DIRAP</option>
					<option>DIREN</option>
					<option>ENSINO</option>
					<option>ESTÁGIO</option>
					<option>EXTENSÃO</option>
					<option>PESQUISA</option>
					
					-->
				</select>

				<h5>Sub-categorias</h5>
				<select name="sub_category_text">
				
					<!-- Subategorias valores do banco de dados -->
					<?php
                        $i = 0;
                        while ($row = pg_fetch_array($sql2)) {
                    ?>
    					<option><?php echo $_SESSION['subcategoria'.$i] = $row[0]; ?></option>
       				<?php
                        $i++;
                        }
                    ?>
					
					<!-- Subategorias direto no html -->
					<!--  
					
					<option>Auxílios</option>
					<option>Avisos</option>
					<option>Calendário Acadêmico</option>
					<option>Cardápio</option>
					<option>Cursos</option>
					<option>Informações Acadêmicas</option>
					<option>Editais Internos</option>
					<option>Editais Externos</option>
					<option>Eixo/ Meio Ambiente</option>
					<option>Eixo/ Indústria</option>
					<option>Eixo/ Computação</option>
					<option>Esporte</option>
					<option>Eventos</option>
					<option>Feriados</option>
					<option>Imprensa</option>
					<option>Infraestrutura</option>
					<option>Jardineira</option>
					<option>Mestrado</option>
					<option>Monitoria</option>
					<option>Pagamento de bolsas/auxílios</option>
					<option>Pedagogia</option>
					<option>Pesquisa</option>
					<option>Programas</option>
					<option>Projetos</option>
					<option>Pontos Facultativos</option>
					<option>Recesso Escolar</option>
					<option>Restaurante Acadêmico</option>
					<option>Saúde</option>
					<option>Site</option>
					<option>Superior</option>
					<option>Técnico</option>
					<option>Outros</option>
					
					-->
				</select>

				<h5>Tema <span id="charNumTema">/ 60 caracteres</span></h5>
				<textarea id="field" onkeyup="countCharTema(this)" wrap="hard" rows="2" cols="27" maxlength="60"
					name="title_text" /></textarea>
				

				<h5>Descrição <span id="charNumDescricao">/ 140 caracteres</span></h5>
				<textarea  onkeyup="countCharDescricao(this)" wrap="hard" rows="3" cols="45" maxlength="140"
					name="description_text" /></textarea>
				<br> <br> <input class="btn btn-primary fonte_menus" type="submit" style="width: 150;"
					value="Gerar Imagem" />


			</div>
		</form>


		<div id="parte02">
			<h5>Cor de fundo</h5>

			<div class="cor1">DIREÇÃO GERAL/DIRAP</div>
			<div class="cor2">DIREN</div>
			<div class="cor1">ENSINO</div>
			<div class="cor4">ESTÁGIO</div>
			<div class="cor3">EXTENSÃO</div>
			<div class="cor5">PESQUISA</div>

		</div>

	</div>


</body>
</html>

 <script>
      function countCharTema(val) {
        var len = val.value.length;
        if (len > 60) {
          val.value = val.value.substring(0, 60);
        } else {
          $('#charNumTema').text('/ '+(60 - len)+' caracteres');
        }
      };

      function countCharDescricao(val) {
          var len = val.value.length;
          if (len > 140) {
            val.value = val.value.substring(0, 140);
          } else {
            $('#charNumDescricao').text('/ '+(140 - len)+' caracteres');
          }
        };
</script>

<?php
    die();
}

// get form submission (or defaults)
$category_text = isset($_GET['category_text']) ? $_GET['category_text'] : 'IFCE - Maracanau';
$sub_category_text = isset($_GET['sub_category_text']) ? $_GET['sub_category_text'] : 'IFCE - Maracanau';
$title_text = isset($_GET['title_text']) ? $_GET['title_text'] : 'IFCE - Maracanau';
$description_text = isset($_GET['description_text']) ? $_GET['description_text'] : 'IFCE - Maracanau';
// $filename = memegen_sanitize( $description_text ? $description_text : $title_text );

$args = array(
    'category_text' => $category_text,
    'sub_category_text' => $sub_category_text,
    'title_text' => $title_text,
    'description_text' => $description_text,
    'filename' => $filename,
    'font' => dirname(__FILE__) . '/font/OpenSans-ExtraBold.ttf',
    'font_sub' => dirname(__FILE__) . '/font/OpenSans-Light.ttf', // '/sans.ttf',
    'imagebase' => dirname(__FILE__) . '/imagens/imagem_gerada.jpg',
    'sub_category_textsize' => 24,
    'title_textsize' => 75,
    'descrition_textsize' => 48,
    'textfit' => true,
    'padding' => 70,
    'margin' => 10
);

// create and output image
generate_image($args);

?>