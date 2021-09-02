<?php
	session_start();

	include_once('seguranca.php');
  include_once('conexao.php');
  $_SESSION['curriculo']="";
 	$sql = "SELECT * FROM curriculopalestrante WHERE id_palestrante = '{$_SESSION['id']}'";
 	$query = mysqli_query($con,$sql) or print mysql_error();
 	if(mysqli_num_rows($query)<1){
 		$_SESSION['msgCurriculoError'] = "Você não inseriu seu currículo ainda";
  }else{
    $myCurriculo = mysqli_fetch_assoc($query);
    $_SESSION['curriculo'] = $myCurriculo['curriculo'];
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MoveIT - Meu Curriculo</title>

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
      <h2 class="hcontainer">Meu Currículo</h2>
      <p class="text-center text-danger">
        <?php
          //Apagando string que seria impressa nesse <p>
          if(isset($_SESSION['msgCurriculoError'])){
            echo $_SESSION['msgCurriculoError'];
            unset($_SESSION['msgCurriculoError']);
          }
        ?>
      </p>
        <p class="text-center text-success">
          <?php
            if(isset($_SESSION['msgCurriculoOk'])){
              echo $_SESSION['msgCurriculoOk'];
              unset($_SESSION['msgCurriculoOk']);
            }
          ?>
        </p> 
      <form method="POST" action="addCurriculo.php">
    		<div class="form-group">
    		    <label for="curriculo">Meu Currículo</label>
    		    <textarea class="form-control rounded-0" name="curriculo" rows="10" required><?php echo str_replace('<br />', "\n", $_SESSION['curriculo']);?></textarea>
    		</div>
        <button class="col-md-1 btn btn-lg btn-success btn-block" type="submit" name='submit'>Salvar</button>
      </form>
    </div>
    <!-- Footer -->
    <?php include_once('footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>
