<?php
	session_start();

	//include_once('seguranca.php');
	if(isset($_GET['id'])){
    if(isset($res)){unset($res);}
 		include_once('conexao.php');
 		$sql = "SELECT * FROM palestras WHERE id = '{$_GET['id']}'";
 		$result = mysqli_query($con,$sql) or print mysql_error();
 		$res = mysqli_fetch_assoc($result);
    $np = mysqli_query($con,"SELECT users.nome,users.sobrenome FROM users,palestras WHERE users.id = palestras.id_palestrante AND palestras.id =".$_GET['id']);
    $nomeP = mysqli_fetch_assoc($np);
    $nomePalestrante = $nomeP['nome']." ".$nomeP['sobrenome'];

    $checkCadastrado = false;
    if(isset($_SESSION['id'])){
      $query = mysqli_query($con,"SELECT 'id' FROM inscritospalestras WHERE inscritospalestras.id_palestra = {$_GET['id']} AND inscritospalestras.id_participante ={$_SESSION['id']}");
      if(mysqli_num_rows($query)>0){
        $checkCadastrado = true;
      }
    }

    $a = "";
    $urlAnterior = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    if($checkCadastrado){
      $linkExcluirInscPalestra = "excluirInscPalestra.php?idPalestra=".$_GET['id']."&idParticipante=".$_SESSION['id']."&urlA=".$urlAnterior;
      $a = "<a class='btn btn-danger btn-lg' role='button' href='{$linkExcluirInscPalestra}'>Excluir Inscrição</a>";
    }else{
      $linkInscreverPalestra = isset($_SESSION['id']) ? "inscreverPalestra.php?idPalestra=".$_GET['id']."&idParticipante=".$_SESSION['id']."&urlA=".$urlAnterior : "inscreverPalestra.php";
      $a = "<a class='btn btn-primary btn-lg' role='button' href='{$linkInscreverPalestra}'>Inscreva-se</a>";
    }
 		mysqli_close($con);
	}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MoveIT - Ver Palestra</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/standard.css" rel="stylesheet">

  </head>

  <body>
    <?php
      include('menu.php');
      if(isset($_SESSION['msgInscPalestra'])){
        echo "<script>alert('".$_SESSION['msgInscPalestra']."');</script>";
        unset($_SESSION['msgInscPalestra']);
      }
      if(isset($_SESSION['msgExcPalestra'])){
        echo "<script>alert('".$_SESSION['msgExcPalestra']."');</script>";
        unset($_SESSION['msgExcPalestra']);
      }
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
      <div class="jumbotron">
        <h1 class="display-4"><?php echo $res['titulo']; ?></h1>
        <p class="lead">Ministrado por <?php echo $nomePalestrante; ?></p>
        <hr class="my-4">
        <p><?php echo $res['descricao'];?></p>
        <p class="lead">
         <?php echo $a;?>
        </p>
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
