<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>MoveIT - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <?php
      //Apaga quaisquer dados salvos
      unset($_SESSION['id'],$_SESSION['nome'],$_SESSION['sobrenom'],$_SESSION['email'],$_SESSION['senha'],$_SESSION['nivelAcesso'],$_SESSION['cargo']);
    ?>

    <form class="form-signin" method="POST" action="valida_login.php">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      <p class="text-center text-danger">
        <?php
          //Apagando string que seria impressa nesse <p>
          if(isset($_SESSION['errorLogin'])){
            echo $_SESSION['errorLogin'];
            unset($_SESSION['errorLogin']);
          }
        ?>
      </p>
        <p class="text-center text-success">
          <?php
            //Apagando string que seria impressa nesse <p>
            if(isset($_SESSION['signUpOk'])){
              echo $_SESSION['signUpOk'];
              unset($_SESSION['signUpOk']);
            }
          ?>
        </p> 
      <p><a href="cadastrar.php" class="text-center">Cadastrar</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
