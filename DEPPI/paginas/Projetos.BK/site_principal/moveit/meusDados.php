<?php
	session_start();
	include_once('seguranca.php');
  include_once("conexao.php");

  //Selecionando dados da tabela caso o email e senha informados deem match na BD
  $result = $con->query("SELECT * FROM users WHERE id = '".$_SESSION['id']."' LIMIT 1");
  //Retorna uma matriz, no caso, de uma linha de $result
  $resultado = mysqli_fetch_assoc($result);
  
  //Salvando dados do usuário
  $_SESSION['id'] = $resultado['id'];
  $_SESSION['nome'] = $resultado['nome'];
  $_SESSION['sobrenome'] = $resultado['sobrenome'];
  $_SESSION['email'] = $resultado['email'];
  $_SESSION['senha'] = $resultado['senha'];
  $_SESSION['nivelAcesso'] = $resultado['nivelAcesso'];
  $_SESSION['cargo'] = $resultado['cargo'];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MoveIT - Meus Dados</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/standard.css" rel="stylesheet">
    <!--Custom-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/standard.css">
  </head>

  <body>
    <?php
      include_once("menu.php");
    ?>
    <div class="container">
      <h1 class="text-center hcontainer">Meus Dados</h1>
      <form method="POST" action="updateDados.php">
        <div class="form-group row">
          <label for="nome" class="col-2 col-form-label">Nome:</label>
          <div class="col-10">
            <input class="form-control" name="nome" value="<?php echo $_SESSION['nome'];?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="sobrenome" class="col-2 col-form-label">Sobrenome:</label>
          <div class="col-10">
            <input class="form-control" name="sobrenome" value="<?php echo $_SESSION['sobrenome'];?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-2 col-form-label">Email</label>
          <div class="col-10">
            <input class="form-control" name="email" value="<?php echo $_SESSION['email'];?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="senha" class="col-2 col-form-label">Senha</label>
          <div class="col-10 input-group">
            <input type="password" name="senha" class="form-control pwd">
            <span class="input-group-btn">
              <button class="btn btn-default reveal btn-pass" type="button"><i id="gly_eye" class="far fa-eye-slash"></i></button>
            </span>
          </div>
        </div>
        <button class="col-md-1 btn btn-lg btn-success btn-block" type="submit" name='submit'>Salvar</button>
      </form>
    </div>
    <!-- Footer -->
    <?php include_once('footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/hideShowPass.js"></script>
  </body>

</html>