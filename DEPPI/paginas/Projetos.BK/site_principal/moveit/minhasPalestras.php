<?php
	session_start();

	include_once('seguranca.php');
	include_once('conexao.php');
	$_SESSION['con'] = $con;
	include_once('palestras.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MoveIT - Minhas Palestras</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/standard.css" rel="stylesheet">

  </head>

  <body>

    <?php
      include('menu.php');
    ?>

 

    <!-- Page Content -->
    <!--<div class="container">
      <h2>Minhas Palestras</h2>

      <div class="row">
      	<?php //listarPalestras();?>
      </div>
    </div>-->
    <div class="container">

      <!-- Portfolio Section -->
      <h2 class="hcontainer">Minhas Palestras</h2>

      <div class="row">
      	<?php listarPalestras(2)?>
      </div>
    </div>
    <!-- Footer -->
    <?php include_once('footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>