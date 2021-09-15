    <!-- Navigation -->
    <nav id="menup" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="imgs/moveit.png" width="117px" height="38px"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <!--<li class="nav-item">
              <a class="nav-link" href="index.php">Início</a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="index.php">Programação</a>
            </li>
            <?php
      				if(!(isset($_SESSION['nome']) && isset($_SESSION['sobrenome']) && isset($_SESSION['email']) && isset($_SESSION['senha']) && isset($_SESSION['cargo']) && isset($_SESSION['nivelAcesso']) && isset($_SESSION['id']))){
      					echo "
                <li class='nav-item'>
                  <a class='nav-link' href='login.php'>Entrar</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='cadastrar.php'>Cadastrar</a>
                </li>
      					";
      				}else{
      					echo "
                <li class='nav-item dropdown'>
                  <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownBlog' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                  		";
                echo $_SESSION['nome'];
                echo "</a>";
                echo"<div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownBlog'>
                      <a class='dropdown-item' href='meusDados.php'>Meus Dados</a>";

                if(($_SESSION['nivelAcesso']==1)||($_SESSION['nivelAcesso']==2)){
                  if($_SESSION['nivelAcesso']==1){
                    echo "
                      <a class='dropdown-item' href='usuarios.php'>Usuários</a>
                      <a class='dropdown-item' href='gerenciarPalestras.php'>Gerenciar Palestras</a>
                    ";
                  }
                  echo "
                    <a class='dropdown-item' href='minhasPalestras.php'>Minhas Palestras</a>
                    <a class='dropdown-item' href='meuCurriculo.php'>Meu Currículo</a>
                  ";
      				  }
      				  echo "<a class='dropdown-item' href='sair.php'>Sair</a></li>";
      				}
            ?>
          </ul>
        </div>
      </div>
    </nav>