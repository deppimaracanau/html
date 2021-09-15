<?php
	// Verificação de Autenticação
	require_once('../models/login/autenticacao.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>PGL - Plataforma de gerenciamento de Laboratórios</title>
		<link rel="icon" href="../favicon.ico">

	    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/home.css" rel="stylesheet">
	    <link href="css/layout.css" rel="stylesheet">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="../libs/bootstrap/js/bootstrap.min.js"></script>
	</head>

	<body>
		<?php require_once('layout/navbar.php'); ?>

		<div class="container">
			
			<?php require_once('layout/barraLateral.php'); ?>

			<div class="col-sm-8">
				
			</div>

		</div>

	</body>

</html>