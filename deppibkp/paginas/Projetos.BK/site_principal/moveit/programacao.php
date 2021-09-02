<?php
	session_start();

  //Não exibe notices
  error_reporting(0);
  ini_set(“display_errors”, 0 );

  //Exibe notices
 // error_reporting(E_ALL);
  //ini_set(“display_errors”, 1 );
	//include_once('seguranca.php');
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

    <title>Programação</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

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
      <h2>Programação</h2>

      <div class="row">
      	<?php listarPalestras(1)?>;
      </div>
    </div>
        <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>