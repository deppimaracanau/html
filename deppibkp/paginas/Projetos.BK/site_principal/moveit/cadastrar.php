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

    <title>MoveIT - Cadastro</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="css/signin.css" rel="stylesheet">-->
    <link href="css/standard.css" rel="stylesheet">
  </head>

  <body>
    <?php
      //Apaga quaisquer dados salvos
      unset($_SESSION['id'],$_SESSION['nome'],$_SESSION['sobrenome'],$_SESSION['email'],$_SESSION['senha'],$_SESSION['nivelAcesso'],$_SESSION['cargo']);
    ?>
    <h2 id="mCad" class="hcontainer text-center">Cadastre-se</h2>
    <form method="POST" action="valida_cadastro.php" class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-6">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" name="nome" placeholder="Nome" required>
            </div>
            <div class="form-group col-md-6">
              <label for="sobrenome">Sobrenome</label>
              <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group col-md-6">
              <label for="senha">Password</label>
              <input type="password" class="form-control" name="senha" placeholder="Senha" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="cargo">Você é:</label>
              <select name="cargo" class="form-control">
                <option selected>Escolha</option>
                <option>Alunossssss</option>
                <option>Servidor</option>
                <option>Visitante</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="nivelAcesso">Credencial:</label>
              <select name="nivelAcesso" class="form-control">
                <option selected>Escolha</option>
                <option>Participante</option>
                <option>Palestrante</option>
              </select>
            </div>
          </div>
          <p class="text-center text-danger">
            <?php
              //Apagando string que seria impressa nesse <p>
              if(isset($_SESSION['errorSignUp'])){
                echo $_SESSION['errorSignUp'];
                unset($_SESSION['errorSignUp']);
              }
            ?>
          </p>         
          <button type="submit" class="btn btn-primary">Cadastre-se</button>
        </div>
      </div>
    </form>

     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
