<?php
  session_start();
  include_once('seguranca.php');
  include_once('conexao.php');
  $_SESSION['con'] = $con;
  function listaUsuarios(){
    $s = "SELECT * FROM users WHERE 1 ORDER BY id";
    $sql = mysqli_query($_SESSION['con'],$s) or print mysql_error();
    if(mysqli_num_rows($sql)<1){
      echo "Não há inscritos";
    }else{
      while($r = mysqli_fetch_object($sql)):
        $dados = (array)$r;
        $arrayDados = array();
        foreach ($dados as $key) {
          $arrayDados[] = $key;
        }
        mostrarUsuario($arrayDados);
      endwhile;
    }
  }

  function mostrarUsuario($dados){
    $id = $dados[0];
    $nomeCompleto = $dados[1]." ".$dados[2];
    $email = $dados[3];
    $nivelAcesso = $dados[6];
    $nv1 = $nivelAcesso == 1 ? "selected" : "";
    $nv2 = $nivelAcesso == 2 ? "selected" : "";
    $nv3 = $nivelAcesso == 3 ? "selected" : "";
    $divUsuario = '    <form class="showUser row" method="POST" action="updateUser.php">
      <div class="form-group col-md col-1">
        <div class="col-sm-10">
          <p class="form-control-static">'.$id.'</p>
        </div>
      </div>
      <div class="form-group col-md col-5">
        <div class="col-sm-10">
          <p class="form-control-static">'.$nomeCompleto.'</p>
        </div>
      </div>
      <div class="form-group col-md col-5">
        <div class="col-sm-10">
          <p class="form-control-static">'.$email.'</p>
        </div>
      </div>
      <div class="form-group col-md col-1">
        <div class="col-sm-10">
          <select name="nivelAcesso" class="form-control">
            <option '.$nv1.'>1</option>
            <option '.$nv2.'>2</option>
            <option '.$nv3.'>3</option>
          </select>
        </div>
      </div>
      <input type="hidden" name="id" value='.$id.' />
      <button class="col-md-1 btn btn-lg btn-success btn-block" type="submit" name="submit">Salvar</button>
    </form>';
    

    echo $divUsuario;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>MoveIT - Usuarios</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="css/signin.css" rel="stylesheet">-->
    <link href="css/standard.css" rel="stylesheet">
  </head>

  <body>
    <?php
      include('menu.php');
    ?>
    <h2 id="hcUsers" class="hcontainer text-center">Usuarios</h2>
    <div id="users" class="container">
    <div class="showUser row">
      <div class="form-group col-md col-1">
        <label class="col-sm-2 col-form-label">Id</label>
      </div>
      <div class="form-group col-md col-5">
        <label class="col-sm-2 col-form-label">Nome</label>
      </div>
      <div class="form-group col-md col-5">
        <label class="col-sm-2 col-form-label">Email</label>
      </div>
      <div class="form-group col-md col-1">
        <label class="col-sm-2 col-form-label">Nível</label>
      </div>
    </div>
      <?php listaUsuarios();?>
    </div>
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
