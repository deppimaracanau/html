<?php
  session_start();
        if (!isset($_SESSION['user_logged_in'])) {

           header('location:./index.html');
            exit();
        }
?>


<!DOCTYPE html>
<html>
<head>
	  <title>SIC - Gerador de Certificados</title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <meta charset="UTF-8">
</head>
<body>
 <!-- Conteúdo do cabeçalho -->
     <header>
      	<?php
          echo "Olá, ".$_SESSION['user_login']; 
        ?><a href="logout.php">Encerrar Sessão</a>
      </header>
      <!-- Conteúdo do cabeçalho -->
      <section >
        <h2>Insira o restante do texto do certificado</h2>
        <form>
         Certificamos que João João<br> <textarea  type="textarea" name="texto" rows="4" cols="50"></textarea>
         <br><button type="submit">Enviar texto</button>
        </form>
      </section>
      <footer >
         <span class="fonte_menus">© Copyright 2017 DEPPI - Departamento de Extensão, Pesquisa, Pós-graduação e Inovação</span>
      </footer>
</body>
</html>